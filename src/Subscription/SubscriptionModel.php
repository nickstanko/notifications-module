<?php namespace Anomaly\NotificationsModule\Subscription;

use Anomaly\NotificationsModule\Notification\NotificationExtension;
use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionInterface;
use Anomaly\Streams\Platform\Model\Notifications\NotificationsSubscriptionsEntryModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

/**
 * Class SubscriptionModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SubscriptionModel extends NotificationsSubscriptionsEntryModel implements SubscriptionInterface
{

    use Notifiable;

    /**
     * Send the notifications.
     *
     * @param $event
     */
    public function send($event)
    {
        $notification = $this->getNotification();

        $this->notify($notification->newNotification($event));
    }

    /**
     * Get the notification.
     *
     * @return NotificationExtension
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Get the notification routing information for the given driver.
     *
     * @param  string $driver
     * @return mixed
     */
    public function routeNotificationFor($driver)
    {
        if (method_exists($this, $method = 'routeNotificationFor' . Str::studly($driver))) {
            return $this->{$method}();
        }

        switch ($driver) {
            case 'database':
                return $this->notifications();
            case 'mail':
                return $this->email;
            case 'nexmo':
                return $this->phone_number;
        }
    }

    public function routeNotificationForMail()
    {
        return 'ryan@pyrocms.com';
    }
}
