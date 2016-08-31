<?php namespace Anomaly\NotificationsModule\Notification\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\Guard;

class NotificationTableBuilder extends TableBuilder
{

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'entry.notifiable.email',
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'read' => [
            'type' => 'success',
            'icon' => 'check',
        ],
    ];

    /**
     * Fired just before querying.
     *
     * @param Builder $query
     * @param Guard   $auth
     *
     * @return
     */
    public function onQuerying(Builder $query, Guard $auth)
    {
        $user = $auth->user();

        $query->where('notifiable_type', get_class($user));
        $query->where('notifiable_id', $user->getId());
    }
}
