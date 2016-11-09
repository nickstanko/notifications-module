<?php namespace Anomaly\NotificationsModule\Channel;

use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Illuminate\Notifications\Notifiable;

/**
 * Class ChannelExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
abstract class ChannelExtension extends Extension
{

    /**
     * The channel driver.
     *
     * @var string
     */
    protected $driver = null;

    /**
     * The subscription instance.
     *
     * @var SubscriptionInterface
     */
    protected $subscription = null;

    /**
     * Return the sending methods.
     *
     * @return string
     */
    public function via()
    {
        return $this->driver;
    }

    /**
     * Return the notification
     * route information.
     *
     * @return mixed
     */
    abstract public function route();

    /**
     * Format the notification.
     *
     * @return mixed
     */
    public function format($notification)
    {
        return $notification;
    }

    /**
     * Get the subscription.
     *
     * @return SubscriptionInterface|Notifiable
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
     * Get the subscription ID.
     *
     * @return int
     */
    public function getSubscriptionId()
    {
        $subscription = $this->getSubscription();

        return $subscription->getId();
    }
}
