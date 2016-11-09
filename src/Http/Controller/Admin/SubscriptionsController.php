<?php namespace Anomaly\NotificationsModule\Http\Controller\Admin;

use Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormBuilder;
use Anomaly\NotificationsModule\Channel\ChannelCollection;
use Anomaly\NotificationsModule\Channel\ChannelExtension;
use Anomaly\NotificationsModule\Notification\Form\NotificationFormBuilder;
use Anomaly\NotificationsModule\Notification\NotificationExtension;
use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionInterface;
use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionRepositoryInterface;
use Anomaly\NotificationsModule\Subscription\Form\SubscriptionFormBuilder;
use Anomaly\NotificationsModule\Subscription\Table\SubscriptionTableBuilder;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SubscriptionsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SubscriptionsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param SubscriptionTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SubscriptionTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a selection of notifications.
     *
     * @param ExtensionCollection $extensions
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function notification(ExtensionCollection $extensions)
    {
        $notifications = $extensions->search('anomaly.module.notifications::notification.*');

        return $this->view->make(
            'anomaly.module.notifications::admin/subscriptions/notification',
            [
                'notifications' => $notifications->enabled(),
            ]
        );
    }

    /**
     * Return a selection of channels.
     *
     * @param ExtensionCollection $extensions
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function channel(ExtensionCollection $extensions)
    {
        /* @var NotificationExtension $notification */
        $channels     = $extensions->search('anomaly.module.notifications::channel.*');
        $notification = $extensions->get($this->request->get('notification'));

        $drivers = $notification->getSupported();

        return $this->view->make(
            'anomaly.module.notifications::admin/subscriptions/channel',
            [
                'channels' => $channels
                    ->enabled()
                    ->filter(
                        function ($channel) use ($drivers) {

                            /* @var ChannelExtension $channel */
                            return in_array($channel->via(), $drivers);
                        }
                    ),
            ]
        );
    }

    /**
     * Create a new entry.
     *
     * @param NotificationFormBuilder $form
     * @param SubscriptionFormBuilder $subscription
     * @param ExtensionCollection     $extensions
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        NotificationFormBuilder $form,
        SubscriptionFormBuilder $subscription,
        ExtensionCollection $extensions
    ) {
        $channel      = app(ConfigurationFormBuilder::class);
        $notification = app(ConfigurationFormBuilder::class);

        $channel
            ->setEntry($this->request->get('channel'))
            ->on(
                'saving',
                \Closure::bind(
                    function () use ($subscription) {

                        /* @var ConfigurationFormBuilder $this */
                        $this->setScope($subscription->getFormEntryId());
                    },
                    $channel
                )
            );

        $notification
            ->setEntry($this->request->get('notification'))
            ->on(
                'saving',
                \Closure::bind(
                    function () use ($subscription) {

                        /* @var ConfigurationFormBuilder $this */
                        $this->setScope($subscription->getFormEntryId());
                    },
                    $notification
                )
            );

        $subscription->setChannel($extensions->get($this->request->get('channel')));
        $subscription->setNotification($extensions->get($this->request->get('notification')));

        $form->addForm('subscription', $subscription);

        $form->addForm('channel', $channel);
        $form->addForm('notification', $notification);

        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param SubscriptionFormBuilder $form
     * @param                         $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(
        NotificationFormBuilder $form,
        SubscriptionFormBuilder $subscription,
        SubscriptionRepositoryInterface $subscriptions
    ) {
        $channel      = app(ConfigurationFormBuilder::class);
        $notification = app(ConfigurationFormBuilder::class);

        $subscription->setEntry($this->route->getParameter('id'));

        /* @var SubscriptionInterface $entry */
        $entry = $subscriptions->find($this->route->getParameter('id'));

        $channel
            ->setEntry($entry->getChannel()->getNamespace())
            ->setScope($entry->getId());

        $notification
            ->setEntry($entry->getNotification()->getNamespace())
            ->setScope($entry->getId());

        $form->addForm('channel', $channel);
        $form->addForm('notification', $notification);
        $form->addForm('subscription', $subscription);

        return $form->render();
    }
}
