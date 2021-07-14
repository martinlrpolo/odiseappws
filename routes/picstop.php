<?php

$router->get('/ws/picstop/all', ['uses' => 'PicstopController@all']);

$router->get('/ws/picstop/show/{id}', ['uses' => 'PicstopController@show']);

$router->get('/ws/picstop/showbystop/{id}', ['uses' => 'PicstopController@shobystop']);

$router->post('/ws/picstop/add', ['uses' => 'PicstopController@add']);

$router->put('/ws/picstop/update', ['uses' => 'PicstopController@update']);

$router->delete('/ws/picstop/update', ['uses' => 'PicstopController@delete']);
