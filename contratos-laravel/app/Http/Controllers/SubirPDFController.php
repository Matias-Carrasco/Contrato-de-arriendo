<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubirPDFController extends Controller
{
    public function mform(){
        return view('mform');
    }

    public function mguardar(Request $request){
        if($request->hasFile("urlpdf")){
            $file=$request->file("urlpdf");

            $nombre = "pdf_".time().".".$file->guessExtension();

            $ruta = public_path("pdf/".$nombre);
            
            if($file->guessExtension()=="pdf"){
                dd($file->store('pdfs'));
                

            }else{
                dd("No es un PDF");
            }
        }
        
        
        $request->file('urlpdf')->store('public');
    }
}
