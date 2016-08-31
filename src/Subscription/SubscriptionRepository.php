<?php namespace Anomaly\NotificationsModule\Subscription;

use Anomaly\NotificationsModule\Subscription\Contract\SubscriptionRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

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
}
