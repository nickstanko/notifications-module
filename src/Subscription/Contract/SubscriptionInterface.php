<?php namespace Anomaly\NotificationsModule\Subscription\Contract;

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
     * Get the notification.
     *
     * @return NotificationExtension
     */
    public function getNotification();
}
