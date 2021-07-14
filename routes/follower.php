<?php

$router->get('/ws/follower/all', ['uses' => 'FollowerController@all']);

$router->get('/ws/follower/showbyuser/{id}', ['uses' => 'FollowerController@showbyuser']);

$router->post('/ws/follower/follow', ['uses' => 'FollowerController@follow']);

$router->delete('/ws/follower/unfollow/{id}', ['uses' => 'FollowerController@unfollow']);
