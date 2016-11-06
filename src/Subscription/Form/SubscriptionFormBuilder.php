<?php namespace Anomaly\NotificationsModule\Subscription\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class SubscriptionFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SubscriptionFormBuilder extends FormBuilder
{

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'event',
        'channel',
        'notification',
    ];
}
