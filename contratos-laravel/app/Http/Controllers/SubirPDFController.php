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
            $campos=[
                "urlpdf"=>'required|mimes:pdf|max:10000'
            ];
            $this->validate($request,$campos);

            $ID = $request->ID_contrato;
            $contenido = $request->file('urlpdf')->store('uploads' , 'public');
            

            $contrato = Contrato::find($ID);
            $contrato->PDF_firmado=$contenido;
            Contrato::find($ID)->update(['PDF_firmado'=>$contenido]);

            return redirect('/contrato');
        }
        
        
        $request->file('urlpdf')->store('public');
    }

    public function delete($id){
        dd($id);
        $contrato = Contrato::findOrFail($id);

        try{
            $contrato->PDF_firmado->delete();  
        }catch(\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }

        return response()->json(['satus'=>'Se elimino correctamente']);
    }
}
