<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\AdventureDAO;

class AdventureController extends Controller
{
    
    public function all()
    {
    	$dao = new AdventureDAO();
    	$res =  $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function show($id)
    {
        $dao = new AdventureDAO();
        $res =  $dao -> show($id);
        return response() -> json($res, 200);
    }

    public function add(Request $request)
    {
        $request = $request -> json() -> all();
        $data = array(
            'name' => $request['name'],
            'duration' => $request['duration'],
            'temperature' => $request['temperature'],
            'security' => $request['security'],
            'budget' => $request['budget'],
            'precautions' => $request['precautions'],
            'recommendations' => $request['recommendations'],
            'luggage' => $request['luggage'],
            'vehicle' => $request['vehicle'],
            'price' => $request['price'],
            'curreny' => $request['curreny'],
            'user' => $request['user'],
            'rate' => 5,
            'status' => 1,
        );
        $dao = new AdventureDAO();
        $res = $dao -> insert($data);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }  
    }


    public function update(Request $request)
    {
        $request = $request -> json() -> all();
        $id = $request['id'];
        $data = array(
            'name' => $request['name'],
            'duration' => $request['duration'],
            'temperature' => $request['temperature'],
            'security' => $request['security'],
            'budget' => $request['budget'],
            'precautions' => $request['precautions'],
            'recommendations' => $request['recommendations'],
            'luggage' => $request['luggage'],
            'vehicle' => $request['vehicle'],
            'price' => $request['price'],
            'curreny' => $request['curreny'],
            'user' => $request['user'],
            'rate' => $request['rate'],
            'status' => 1,
        );
        $dao = new AdventureDAO();
        $res = $dao -> actualizar($id, $data);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }

    public function rate(Request $request)
    {
        $request = $request -> json() -> all();
        $id = $request['id'];
        $data = array(
            'rate' => $request['rate'],
        );
        $dao = new AdventureDAO();
        $res = $dao -> actualizar($id, $data);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }  
    }

    public function delete($id)
    {
        $dao = new AdventureDAO();
        $res = $dao -> delete($id);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }

}
