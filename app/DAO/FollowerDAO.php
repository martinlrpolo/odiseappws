<?php

namespace App\DAO;
use App\Models\Follower;

class FollowerDAO
{
    function all()
    {
        return Follower::
                with('follower')
                ->with('followed')
                ->get();
    }

    function showbyuser($id)
    {
        return Follower::
                with('follower')
                ->with('followed')
                ->where('follower', $id)
                ->get();
    }

    function follow($data)
    {
        try {
            Follower::insert($data);
            return true;
        } catch (QueryException $e) {
            return $e;
        }
    }

    function unfollow($id)
    {
        try {
            Follower::delete()->where('id', $id);
            return true;
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }
}
