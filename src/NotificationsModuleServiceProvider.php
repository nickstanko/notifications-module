<?php namespace Anomaly\NotificationsModule;

use Anomaly\NotificationsModule\Notification\Command\RegisterListeners;
use Anomaly\NotificationsModule\Notification\Contract\NotificationRepositoryInterface;
use Anomaly\NotificationsModule\Notification\NotificationModel;
use Anomaly\NotificationsModule\Notification\NotificationRepository;
use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionRepositoryInterface;
use Anomaly\NotificationsModule\Subscription\SubscriptionModel;
use Anomaly\NotificationsModule\Subscription\SubscriptionRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Notifications\NotificationsSubscriptionsEntryModel;
use Illuminate\Notifications\DatabaseNotification;

/**
 * Class NotificationsModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NotificationsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        NotificationRepositoryInterface::class => NotificationRepository::class,
        SubscriptionRepositoryInterface::class => SubscriptionRepository::class,
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        DatabaseNotification::class                 => NotificationModel::class,
        NotificationsSubscriptionsEntryModel::class => SubscriptionModel::class,
    ];

    /**
     * Boot the addon.
     */
    public function boot()
    {
        $this->dispatch(new RegisterListeners());
    }
}
