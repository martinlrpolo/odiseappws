<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\UserDAO;
use Symfony\Component\HttpFoundation\File;
use Symfony\Component\HttpFoundation\File\MimeType;
class UserController extends Controller
{
    
    public function all()
    {
    	$dao = new UserDAO();
    	$res =  $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function show($id)
    {
        $dao = new UserDAO();
        $res =  $dao -> show($id);
        return response() -> json($res, 200);
    }

    public function add(Request $request)
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
                $destinationPath = "./uploads/profiles/pics/";
                $fileName = rand() . date('YmHis') . "." .$extension;
                $request->file($filevar)->move($destinationPath, $fileName);
                $data = array(
                    'fullname' => $request['full_name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'country' => $request['country'],
                    'password' => $request['password'],
                    'pic' => $fileName,
                    'status' => 1
                );
                $dao = new UserDAO();
                $res = $dao -> add($data);
                if ($res === true) {
                    return response() -> json($res, 201);
                }else{
                    unlink($destinationPath . $fileName) or die("Couldn't delete file");
                    return response() -> json($res, 400);
                }
            }
        }
    }

    public function update(Request $request)
    {
        $request = $request -> json() -> all();
        $id = $request['id'];
        $data = array(
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'country' => $request['country'],
            'password' => $request['password'],
        );
        $dao = new UserDAO();
        $res = $dao -> actualizar($id, $data);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }

    public function delete($id)
    {
        $dao = new UserDAO();
        $res = $dao -> delete($id);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }

}
