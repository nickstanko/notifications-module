<?php namespace Anomaly\NotificationsModule\Notification\Table\Handler;

use Anomaly\NotificationsModule\Notification\Table\NotificationTableBuilder;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Ui\Table\Component\Action\ActionHandler;

/**
 * Class MarkAsRead
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class MarkAsRead extends ActionHandler
{

    /**
     * Handle the action.
     *
     * @param NotificationTableBuilder $builder
     * @param array                    $selected
     * @throws \Exception
     */
    public function handle(NotificationTableBuilder $builder, array $selected)
    {
        $model = $builder->getTableModel();

        /* @var EloquentModel $entry */
        foreach ($selected as $id) {

            if (!$entry = $model->find($id)) {
                continue;
            }

            $entry->markAsRead();
        }
    }
}
