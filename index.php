<?php
require('app/core/autoloader.php');

//define routes
Router::get('', 'home@index');
Router::get('show', 'home@show');
Router::get('user', 'user@user');
Router::get('user/login', 'user@login');
Router::post('user/login', 'user@login');
Router::get('user/logout', 'user@logout');
Router::get('user/registration', 'registration@register');
Router::post('user/registration', 'registration@register');
Router::get('user/profile', 'user@profile');
Router::post('user/profile', 'user@profile');

// Router::get('user/profile', 'user@updatePeople');
// Router::post('user/profile', 'user@updatePeople');

Router::get('main/index', 'main@index');
Router::get('people/index', 'people@index');
Router::get('projects/index', 'projects@index');
Router::get('projects/manage', 'projects@manageProjects');
Router::post('projects/manage', 'projects@manageProjects');
//if no route found
Router::error('error@index');

//execute matched routes
Router::dispatch();
ob_flush();