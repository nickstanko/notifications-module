<?php namespace Anomaly\NotificationsModule\Http\Controller\Admin;

use Anomaly\NotificationsModule\Notification\Form\NotificationFormBuilder;
use Anomaly\NotificationsModule\Notification\Table\NotificationTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

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
