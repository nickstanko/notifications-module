<?php namespace Anomaly\NotificationsModule\Notification;

use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionInterface;
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
     * Supported drivers.
     *
     * @var array
     */
    protected $supported = [];

    /**
     * The notification event.
     *
     * @var null|string
     */
    public $event = null;

    /**
     * The subscription instance.
     *
     * @var SubscriptionInterface
     */
    protected $subscription = null;

    /**
     * Return a new notification.
     *
     * @param $event
     * @throws \Exception
     */
    abstract public function newNotification($event);

    /**
     * Get the subscription.
     *
     * @return SubscriptionInterface
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * Set the subscription.
     *
     * @param SubscriptionInterface $subscription
     * @return $this
     */
    public function setSubscription(SubscriptionInterface $subscription)
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * Get the supported drivers.
     *
     * @return array
     */
    public function getSupported()
    {
        return $this->supported;
    }
}
