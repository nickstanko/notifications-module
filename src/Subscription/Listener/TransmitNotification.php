<?php namespace Anomaly\NotificationsModule\Subscription\Listener;

use Anomaly\Streams\Platform\Notification\Event\Transmission;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class TransmitNotification
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TransmitNotification
{

    /**
     * Handle the event.
     *
     * @param Transmission $event
     */
    public function handle(Transmission $event)
    {
        app(UserRepositoryInterface::class)->first()->notify($event->getNotification());
    }
}
