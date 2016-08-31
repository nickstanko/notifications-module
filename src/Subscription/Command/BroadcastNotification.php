<?php namespace Anomaly\NotificationsModule\Subscription\Command;

use Illuminate\Notifications\Notification;

class BroadcastNotification
{
    /**
     * The notification instsance.
     *
     * @var Notification
     */
    protected $notification;

    /**
     * Create a new BroadcastNotification instance.
     *
     * @param Notification $notification [description]
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function handle()
    {
        dd('Test');
    }
}
