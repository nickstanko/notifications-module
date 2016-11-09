<?php namespace Anomaly\NotificationsModule\Notification\Table;

use Anomaly\NotificationsModule\Notification\NotificationModel;

/**
 * Class NotificationTableColumns
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NotificationTableColumns
{

    /**
     * Handle the columns.
     *
     * @param NotificationTableBuilder $builder
     */
    public function handle(NotificationTableBuilder $builder)
    {
        $builder->setColumns(
            [
                [
                    'wrapper' => '{value.read}: {value.message}',
                    'value'   => function (NotificationModel $entry) {
                        return [
                            'read'    => $entry->read_at ? 'Read' : 'Unread',
                            'message' => json_encode($entry->data),
                        ];
                    },
                ],
            ]
        );
    }
}
