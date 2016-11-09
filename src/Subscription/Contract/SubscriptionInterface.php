<?php namespace Anomaly\NotificationsModule\Subscription\Contract;

use Anomaly\NotificationsModule\Channel\ChannelExtension;
use Anomaly\NotificationsModule\Notification\NotificationExtension;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface SubscriptionInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface SubscriptionInterface extends EntryInterface
{

    /**
     * Send the notifications.
     *
     * @param $event
     */
    public function send($event);

    /**
     * Return the sending methods.
     *
     * @return array
     */
    public function via();

    /**
     * Format the notification.
     *
     * @return mixed
     */
    public function format($notification);

    /**
     * Return the channel.
     *
     * @return ChannelExtension
     */
    public function channel();

    /**
     * Return the notification.
     *
     * @return NotificationExtension
     */
    public function notification();

    /**
     * Get the channel.
     *
     * @return ChannelExtension
     */
    public function getChannel();

    /**
     * Get the notification.
     *
     * @return NotificationExtension
     */
    public function getNotification();

    /**
     * Delegate notification routing information
     * to the channel that the subscription uses.
     *
     * @param  string $driver
     * @return mixed
     */
    public function routeNotificationFor($driver);
}
