<?php

namespace App\DAO;
use App\Models\Adventure;

class AdventureDAO
{
    function all()
    {
        return Adventure::with('currency')
                    ->with('user')
                    ->with('stops')
                    ->with('vehicle')
                    ->get();
    }

    function show($id)
    {
        return Adventure::with('user')
                    //->with('currency')
                    ->with('stops')
                    ->with('vehicle')
                    ->where('id', $id)
                    ->first();
    }

    function add($data)
    {
        try {
            Adventure::insert($data);
            return true;
        } catch (QueryException $e) {
            return $e;
        }
    	
    }

    function edit($id, $data)
    {
        try {
            Adventure::update($data)->where('id', $id);
            return true;
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    function delete($id)
    {
        try {
            Adventure::delete()->where('id', $id);
            return true;
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }
}
