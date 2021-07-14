<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\VehicleDAO;

class VehicleController extends Controller
{
    public function all()
    {
    	$dao = new VehicleDAO();
    	$res =  $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }
}