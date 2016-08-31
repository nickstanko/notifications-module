<?php namespace Anomaly\NotificationsModule\Http\Controller\Admin;

use Anomaly\NotificationsModule\Subscription\Form\SubscriptionFormBuilder;
use Anomaly\NotificationsModule\Subscription\Table\SubscriptionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class SubscriptionsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param SubscriptionTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SubscriptionTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param SubscriptionFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(SubscriptionFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param SubscriptionFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(SubscriptionFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
