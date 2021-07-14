<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\FollowerDAO;

class FollowerController extends Controller
{
    public function all()
    {
    	$dao = new FollowerDAO();
    	$res =  $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function showbyuser($id)
    {
        $dao = new FollowerDAO();
    	$res =  $dao -> showbyuser($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function follow(Request $request)
    {
        $request = $request -> json() -> all();
        $data = array(
            'follower' => $request['follower'],
            'followed' => $request['followed'],
        );
        $dao = new FollowerDAO();
        $res = $dao -> follow($data);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }  
    }

    public function unfollow($id)
    {
        $dao = new FollowerDAO();
        $res = $dao -> unfollow($id);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }
}