<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleNotificationsCreateSubscriptionsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'subscriptions'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [];

}
