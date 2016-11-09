<?php namespace Anomaly\NotificationsModule\Subscription;

use Anomaly\NotificationsModule\Channel\ChannelExtension;
use Anomaly\NotificationsModule\Notification\NotificationExtension;
use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionInterface;
use Anomaly\Streams\Platform\Model\Notifications\NotificationsSubscriptionsEntryModel;
use Illuminate\Notifications\Notifiable;

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
        $this
            ->notify(
                $this
                    ->notification()
                    ->newNotification($event)
            );
    }

    /**
     * Return the sending methods.
     *
     * @return array
     */
    public function via()
    {
        return $this->channel()->via();
    }

    /**
     * Format the notification.
     *
     * @return mixed
     */
    public function format($notification)
    {
        return $this->channel()->format($notification);
    }

    /**
     * Return the channel.
     *
     * @return ChannelExtension
     */
    public function channel()
    {
        $channel = $this->getChannel();

        return $channel->setSubscription($this);
    }

    /**
     * Return the notification.
     *
     * @return NotificationExtension
     */
    public function notification()
    {
        $notification = $this->getNotification();

        return $notification->setSubscription($this);
    }

    /**
     * Get the channel.
     *
     * @return ChannelExtension
     */
    public function getChannel()
    {
        return $this->channel;
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
     * Delegate notification routing information
     * to the channel that the subscription uses.
     *
     * @param  string $driver
     * @return mixed
     */
    public function routeNotificationFor($driver)
    {
        return $this
            ->channel()
            ->route();
    }
}
