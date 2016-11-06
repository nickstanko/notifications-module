<?php namespace Anomaly\NotificationsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class NotificationsModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NotificationsModule extends Module
{

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'subscriptions' => [
            'buttons' => [
                'new_subscription' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/notifications/notification',
                ],
            ],
        ],
    ];
}
