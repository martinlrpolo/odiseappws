<?php

namespace App\DAO;
use App\Models\User;

class UserDAO
{
    function all()
    {
        return User::with('country')
                    ->get();
    }

    function show($id)
    {
        return User::with('country')
                    ->where('id', $id)
                    ->get();
    }

    function add($data)
    {
        try {
            User::insert($data);
            return true;
        } catch (QueryException $e) {
            return $e;
        }
    	
    }

    function edit($id, $data)
    {
        try {
            User::update($data)->where('id', $id);
            return true;
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    function delete($id)
    {
        try {
            User::delete()->where('id', $id);
            return true;
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }
}
