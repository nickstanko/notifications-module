<?php namespace Anomaly\NotificationsModule\Notification\Table;

use Anomaly\NotificationsModule\Notification\NotificationModel;
use Anomaly\NotificationsModule\Notification\Table\Handler\MarkAsRead;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class NotificationTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NotificationTableBuilder extends TableBuilder
{

    /**
     * The table model.
     *
     * @var string
     */
    protected $model = NotificationModel::class;

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
        'read' => [
            'handler' => MarkAsRead::class,
            'type'    => 'success',
            'icon'    => 'check',
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
        /* @var UserInterface $user */
        if (!$user = $auth->user()) {
            return;
        }

//        $query->where('notifiable_type', get_class($user));
//        $query->where('notifiable_id', $user->getId());
    }
}
