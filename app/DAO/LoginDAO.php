<?php

namespace App\DAO;
use App\Models\User;

class LoginDAO
{

    function login($data)
    {
    	return User::where('email', $data['email'])
    				->where('password', $data['password'])
    				->get();    	
    }
}
