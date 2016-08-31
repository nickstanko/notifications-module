<?php namespace Anomaly\NotificationsModule\Subscription\Listener;

use Anomaly\Streams\Platform\Notification\Event\NotificationHasBeenDispatched;

class TransmitNotification
{
    public function handle(NotificationHasBeenDispatched $event)
    {
        dd($event->getNotification());
    }
}
