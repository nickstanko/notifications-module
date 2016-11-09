<?php namespace Anomaly\NotificationsModule\Subscription\Form;

use Anomaly\NotificationsModule\Channel\ChannelExtension;
use Anomaly\NotificationsModule\Notification\NotificationExtension;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class SubscriptionFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SubscriptionFormBuilder extends FormBuilder
{

    /**
     * The channel extension.
     *
     * @var null|ChannelExtension
     */
    protected $channel = null;

    /**
     * The notification extension.
     *
     * @var null|NotificationExtension
     */
    protected $notification = null;

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'event',
        'channel',
        'notification',
    ];

    /**
     * Fire just before saving.
     */
    public function onSaving()
    {
        $entry        = $this->getFormEntry();
        $channel      = $this->getChannel();
        $notification = $this->getNotification();

        if ($channel && $notification) {

            $entry->setAttribute('event', $notification->event);

            $entry->setAttribute('channel', $channel);
            $entry->setAttribute('notification', $notification);
        }
    }

    /**
     * Get the channel.
     *
     * @return ChannelExtension|null
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set the channel.
     *
     * @param ChannelExtension $channel
     * @return $this
     */
    public function setChannel(ChannelExtension $channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get the notification.
     *
     * @return NotificationExtension|null
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set the notification.
     *
     * @param NotificationExtension $notification
     * @return $this
     */
    public function setNotification(NotificationExtension $notification)
    {
        $this->notification = $notification;

        return $this;
    }
}
