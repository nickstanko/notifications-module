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
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/notifications'              => 'Anomaly\NotificationsModule\Http\Controller\Admin\SubscriptionsController@index',
        'admin/notifications/notification' => 'Anomaly\NotificationsModule\Http\Controller\Admin\SubscriptionsController@notification',
        'admin/notifications/channel'      => 'Anomaly\NotificationsModule\Http\Controller\Admin\SubscriptionsController@channel',
        'admin/notifications/create'       => 'Anomaly\NotificationsModule\Http\Controller\Admin\SubscriptionsController@create',
        'admin/notifications/edit/{id}'    => 'Anomaly\NotificationsModule\Http\Controller\Admin\SubscriptionsController@edit',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        SubscriptionRepositoryInterface::class => SubscriptionRepository::class,
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
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
