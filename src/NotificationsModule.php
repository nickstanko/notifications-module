<?php namespace Anomaly\NotificationsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class NotificationsModule extends Module
{
    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'notifications',
        'subscriptions' => [
            'buttons' => [
                'new_subscription',
            ],
        ],
    ];
}
