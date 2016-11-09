<?php namespace Anomaly\NotificationsModule\Http\Controller\Admin;

use Anomaly\NotificationsModule\Notification\Table\NotificationTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class NotificationsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NotificationsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param NotificationTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(NotificationTableBuilder $table)
    {
        return $table->render();
    }
}
