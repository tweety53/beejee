<?php

/* GET */
$router->get('' , 'PagesController@home');
$router->get('login', 'PagesController@login');
$router->get('register', 'PagesController@register');
$router->get('tasks/create' , 'PagesController@createTask');

$router->get('tasks/filter', 'TasksController@filter');
$router->get('tasks', 'TasksController@index');

$router->get('users/login', 'AuthController@login');

/*POST*/
$router->post('users/register', 'AuthController@register');
$router->post('logout', 'AuthController@logout');

$router->post('tasks', 'TasksController@store');
$router->post('tasks/status', 'TasksController@updateStatus');
$router->post('tasks/update' , 'TasksController@updateText');




