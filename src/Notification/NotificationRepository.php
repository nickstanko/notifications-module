<?php namespace Anomaly\NotificationsModule\Notification;

use Anomaly\NotificationsModule\Notification\Contract\NotificationRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class NotificationRepository extends EntryRepository implements NotificationRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var NotificationModel
     */
    protected $model;

    /**
     * Create a new NotificationRepository instance.
     *
     * @param NotificationModel $model
     */
    public function __construct(NotificationModel $model)
    {
        $this->model = $model;
    }
}
