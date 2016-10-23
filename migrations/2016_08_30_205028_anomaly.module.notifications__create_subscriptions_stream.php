<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleNotificationsCreateSubscriptionsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleNotificationsCreateSubscriptionsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'subscriptions',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'event'        => [
            'required' => true,
        ],
        'channel'      => [
            'required' => true,
        ],
        'notification' => [
            'required' => true,
        ],
    ];

}
