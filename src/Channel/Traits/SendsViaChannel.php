<?php namespace Anomaly\NotificationsModule\Channel\Traits;

use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionInterface;

/**
 * Class SendsViaChannel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
trait SendsViaChannel
{

    /**
     * Get the notification's delivery channels.
     *
     * @param SubscriptionInterface $notifiable
     * @return array
     */
    public function via(SubscriptionInterface $notifiable)
    {
        return [$notifiable->via()];
    }
}
