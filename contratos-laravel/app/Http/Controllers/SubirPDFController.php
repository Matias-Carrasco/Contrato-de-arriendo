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
        
        if($request->hasFile("urlpdf")){
            
            $ID = $request->ID_contrato;
            $contenido = $request->file('urlpdf')->store('uploads' , 'public');


            $contrato = Contrato::find($ID);
            $contrato->PDF_firmado=$contenido;
            Contrato::find($ID)->update(['PDF_firmado'=>$contenido]);

            return redirect('/contrato');
        }
        
        
        $request->file('urlpdf')->store('public');
    }
}
