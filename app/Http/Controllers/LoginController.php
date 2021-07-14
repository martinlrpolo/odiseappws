<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\LoginDAO;
use App\DAO\UserDAO;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    
    public function login(Request $request)
    {
        $request = $request -> json() -> all();
        $data = array(
            'email' => $request['email'],
            'password' => $request['password']
        );

    	$dao = new loginDAO();
    	$res =  $dao -> login($data);

        if ($res -> isEmpty()) {
            return response() -> json([], 401);
        }else{
            return response() -> json($res, 200);
        }
    }

    public function register(Request $request)
    {
        $filevar = "file";
        if ($request->file($filevar)->isValid()) 
        {
            $file = $request -> file($filevar);
            $extension = $file -> getClientOriginalExtension();
            if(
                $extension == "jpg" || 
                $extension == "png"  || 
                $extension == "jpeg"  
            )
            {
                $destinationPath = "./uploads/users/pics/";
                $fileName = rand() . date('YmHis') . "." .$extension;
                $request->file($filevar)->move($destinationPath, $fileName);

                $data = array(
                    'fullname' => $request['email'],
                    'email' => $request['password'],
                    'phone' => $request['password'],
                    'country' => $request['password'],
                    'password' => $request['password'],
                    'pic' => $fileName,
                    'status' => 1,
                );
                $dao = new UserDAO();
                $res = $dao -> add($data);
                if ($res === true) {
                    return response() -> json($res, 201);
                }else{
                    unlink($destinationPath . $fileName) or die("Couldn't delete file");
                    return response() -> json($res, 400);
                }
            }else{
                return response() -> json(["message" => "Invalid file extension"], 400);
            }

        }else{
            return response() -> json(["message" => "File not loaded"], 400);
        }

    }

}
