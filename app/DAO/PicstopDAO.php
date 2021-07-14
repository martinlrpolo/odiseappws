<?php

namespace App\DAO;
use App\Models\Pic;

class PicstopDAO
{
    function all()
    {
        return Pic::all();
    }

    function show($id)
    {
        return Pic::
                      where('id', $id)
                    ->first();
    }

    function add($data)
    {
        try {
            Pic::insert($data);
            return true;
        } catch (QueryException $e) {
            return $e;
        }
    	
    }

    function edit($id, $data)
    {
        try {
            Pic::update($data)->where('id', $id);
            return true;
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    function delete($id)
    {
        try {
            Pic::delete()->where('id', $id);
            return true;
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }
}
