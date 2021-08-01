<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;

class SubirPDFController extends Controller
{
    public function subirPDF($ID){
        $contrato=Contrato::where('ID_contrato','=',$ID)->get();
        return view('mform',compact('contrato'));
    }

    public function subir(Request $request){
        return $request->all();
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
