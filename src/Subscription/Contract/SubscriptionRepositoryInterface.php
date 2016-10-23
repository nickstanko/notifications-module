<?php namespace Anomaly\NotificationsModule\Subscription\Contract;

use Anomaly\NotificationsModule\Subscription\SubscriptionCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface SubscriptionRepositoryInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface SubscriptionRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find many subscription it's the event.
     *
     * @param $event
     * @return SubscriptionCollection
     */
    public function findManyByEvent($event);
}
