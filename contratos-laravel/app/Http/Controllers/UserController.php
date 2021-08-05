<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    function verificar(Request $request){ 
        $datos = Http::get('http://146.83.194.142:1042/api/users/?rut='.$request->rut.'&password='.$request->password);
       
        try{
            $error = $datos['error'];
            if($error){
                
                return redirect("/login");
            }
        }catch(\Exception $e) {
        }
        $arrayd = json_decode($datos);
  
  
        return view("welcome",compact('arrayd'));
        
    }
}
