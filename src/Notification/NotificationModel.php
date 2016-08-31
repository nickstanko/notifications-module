<?php namespace Anomaly\NotificationsModule\Notification;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;
use Anomaly\NotificationsModule\Notification\Contract\NotificationInterface;
use Anomaly\Streams\Platform\Model\Notifications\NotificationsNotificationsEntryModel;

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
