<?php namespace Anomaly\NotificationsModule\Notification\Command;

use Anomaly\NotificationsModule\Notification\Listener\SendNotifications;
use Anomaly\NotificationsModule\Notification\NotificationExtension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Illuminate\Contracts\Events\Dispatcher;

/**
 * Class RegisterListeners
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RegisterListeners
{

    /**
     * Handle the command.
     *
     * @param ExtensionCollection $extensions
     * @param Dispatcher          $events
     */
    public function handle(ExtensionCollection $extensions, Dispatcher $events)
    {
        $notifications = $extensions->search('anomaly.module.notifications::notification.*');

        /* @var NotificationExtension $notification */
        foreach ($notifications->enabled() as $notification) {
            $events->listen($notification->event, SendNotifications::class);
        }
    }
}
