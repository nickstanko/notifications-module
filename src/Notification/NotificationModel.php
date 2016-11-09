<?php namespace Anomaly\NotificationsModule\Notification;

use Anomaly\NotificationsModule\Notification\Contract\NotificationInterface;
use Anomaly\Streams\Platform\Model\Notifications\NotificationsNotificationsEntryModel;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;

/**
 * Class NotificationModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NotificationModel extends DatabaseNotification implements NotificationInterface
{

    /**
     * Return the related notifiable.
     *
     * @return Notifiable
     */
    public function getNotifiable()
    {
        return $this->notifiable;
    }
}
