<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\PicstopDAO;

class PicstopController extends Controller
{
    
    public function all()
    {
    	$dao = new PicstopDAO();
    	$res =  $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function show($id)
    {
        $dao = new PicstopDAO();
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
                $destinationPath = "./uploads/adventures/pics/";
                $fileName = rand() . date('YmHis') . "." .$extension;
                $request->file($filevar)->move($destinationPath, $fileName);

                $data = array(
                    'stop' => $request['stop'],
                    'file' => $fileName
                );
                $dao = new PicstopDAO();
                $res = $dao -> insert($data);
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


    public function update(Request $request)
    {
        $id = $request['id'];
        $data = array();

        $filevar = "archivo";
        if ($request->hasFile($filevar)) 
        {
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
                    $destinationPath = "./uploads/controldocumentos/";
                    $fileName = rand() . date('YmHis') . "." .$extension;
                    $request->file($filevar)->move($destinationPath, $fileName);

                    $data = array(
                        'stop' => $request['stop'],
                        'file' => $fileName
                    );
                    $dao = new PicstopDAO();
                    $res = $dao -> update($id, $data);
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

        }else{
            $data = array(
                'stop' => $request['stop'],
            );
            $dao = new PicstopDAO();
            $res = $dao -> actualizar($id, $data);
            if ($res === true) {
                return response() -> json($res, 201);
            }else{
                return response() -> json($res, 400);
            }
        }

    }

    public function delete($id)
    {
        $dao = new PicstopDAO();
        $res = $dao -> delete($id);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }

}
