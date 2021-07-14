<?php

$router->get('/ws/adventure/all', ['uses' => 'AdventureController@all']);

$router->get('/ws/adventure/show/{id}', ['uses' => 'AdventureController@show']);

$router->post('/ws/adventure/add', ['uses' => 'AdventureController@add']);

$router->put('/ws/adventure/update', ['uses' => 'AdventureController@update']);

$router->put('/ws/adventure/rate', ['uses' => 'AdventureController@rate']);

$router->delete('/ws/adventure/update', ['uses' => 'AdventureController@delete']);
