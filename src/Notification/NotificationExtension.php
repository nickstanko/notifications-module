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
     * The notification event.
     *
     * @var null|string
     */
    public $event = null;

    /**
     * Return a new notification.
     *
     * @param $event
     * @throws \Exception
     */
    abstract public function newNotification($event);
}
