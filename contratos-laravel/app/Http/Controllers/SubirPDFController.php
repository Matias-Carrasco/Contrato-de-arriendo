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
            $contrato=Contrato::where('ID_contrato','=',$ID)->get();
            

            $contrato[0]->PDF_firmado=$request->file('urlpdf')->store('uploads' , 'public');
            
            $modificar = json_decode($contrato[0]);
            
            Contrato::where('ID_contrato','=',$ID)->update($modificar);
            return redirect('/contrato');
            
        }
        
        
        $request->file('urlpdf')->store('public');
    }
}
