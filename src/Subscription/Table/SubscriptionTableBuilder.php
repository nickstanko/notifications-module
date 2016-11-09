<?php namespace Anomaly\NotificationsModule\Subscription\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class SubscriptionTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SubscriptionTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'notification',
        'channel',
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'notification' => [
            'wrapper' => '
                <strong>{value.title}</strong><br>
                <span class="text-muted">{value.description}</span>
                ',
            'value'   => [
                'title'       => 'entry.notification.title',
                'description' => 'entry.notification.description',
            ],
        ],
        'entry.channel.title',
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];
}
