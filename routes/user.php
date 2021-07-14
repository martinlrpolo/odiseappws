<?php

$router->get('/ws/user/all', ['uses' => 'UserController@all']);

$router->get('/ws/user/show/{id}', ['uses' => 'UserController@show']);

$router->post('/ws/user/add', ['uses' => 'UserController@add']);

$router->put('/ws/user/update', ['uses' => 'UserController@update']);

$router->delete('/ws/user/update', ['uses' => 'UserController@delete']);