<?php namespace Anomaly\NotificationsModule\Channel;

use Anomaly\NotificationsModule\Notification\NotificationExtension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;

/**
 * Class ChannelCollection
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ChannelCollection extends ExtensionCollection
{

    /**
     * Return only channels that support the notification.
     *
     * @param NotificationExtension $notification
     * @return ChannelCollection
     */
    public function supports(NotificationExtension $notification)
    {
        $drivers = $notification->getSupported();

        return $this->filter(
            function ($channel) use ($drivers) {

                /* @var ChannelExtension $channel */
                return in_array($channel->via(), $drivers);
            }
        );
    }
}
