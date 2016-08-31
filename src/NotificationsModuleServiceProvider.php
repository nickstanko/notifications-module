<?php namespace Anomaly\NotificationsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class NotificationsModuleServiceProvider extends AddonServiceProvider
{
    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\Streams\Platform\Notification\Event\NotificationHasBeenDispatched' => [
            'Anomaly\NotificationsModule\Subscription\Listener\TransmitNotification',
        ],
    ];
    protected $routes = [];
}
