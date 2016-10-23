<?php namespace Anomaly\NotificationsModule\Notification;

use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class NotificationExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
abstract class NotificationExtension extends Extension
{

    /**
     * The event name.
     *
     * @var null|string
     */
    public static $event = null;

    /**
     * Return a new notification.
     *
     * @param $event
     * @throws \Exception
     */
    abstract public function newNotification($event);
}
