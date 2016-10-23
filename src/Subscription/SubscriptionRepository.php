<?php namespace Anomaly\NotificationsModule\Subscription;

use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class SubscriptionRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SubscriptionRepository extends EntryRepository implements SubscriptionRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var SubscriptionModel
     */
    protected $model;

    /**
     * Create a new SubscriptionRepository instance.
     *
     * @param SubscriptionModel $model
     */
    public function __construct(SubscriptionModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find many subscription it's the event.
     *
     * @param $event
     * @return SubscriptionCollection
     */
    public function findManyByEvent($event)
    {
        return $this->model->where('event', $event)->get();
    }
}
