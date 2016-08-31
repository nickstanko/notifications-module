<?php namespace Anomaly\NotificationsModule\Subscription\Listener;

use Anomaly\Streams\Platform\Notification\Event\Transmission;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

class TransmitNotification
{
    public function handle(Transmission $event)
    {
        app(UserRepositoryInterface::class)->first()->notify($event->getNotification());
    }
}
