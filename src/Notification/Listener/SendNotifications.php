<?php namespace Anomaly\NotificationsModule\Notification\Listener;

use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionInterface;
use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionRepositoryInterface;

/**
 * Class SendNotifications
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SendNotifications
{

    /**
     * The subscription repository.
     *
     * @var SubscriptionRepositoryInterface
     */
    protected $subscriptions;

    /**
     * Create a new SendNotifications instance.
     *
     * @param SubscriptionRepositoryInterface $subscriptions
     */
    public function __construct(SubscriptionRepositoryInterface $subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * Handle the event.
     *
     * @param $event
     */
    public function handle($event)
    {
        $subscriptions = $this->subscriptions->findManyByEvent(get_class($event));

        /* @var SubscriptionInterface $subscription */
        foreach ($subscriptions as $subscription) {
            $subscription->send($event);
        }
    }
}
