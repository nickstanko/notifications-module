<?php

return [
    'admin/notifications'           => 'Anomaly\NotificationsModule\Http\Controller\Admin\NotificationsController@index',
    'admin/notifications/create'    => 'Anomaly\NotificationsModule\Http\Controller\Admin\NotificationsController@create',
    'admin/notifications/edit/{id}' => 'Anomaly\NotificationsModule\Http\Controller\Admin\NotificationsController@edit',
];
