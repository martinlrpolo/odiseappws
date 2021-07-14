<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\CountryDAO;

class CountryController extends Controller
{
    public function all()
    {
    	$dao = new CountryDAO();
    	$res =  $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }
}