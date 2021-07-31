<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Proveedor;
use App\Models\Representante_prov;
use App\Models\Agrega;
use App\Models\Clausula;
use App\Models\Tiene;
use App\Models\Anexo;
use Carbon\Carbon;
use App\Models\Ciudad;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos=Contrato::all();
        return view('PDF.prueba',compact('contratos'));
    }

    public function PDF(Request $request){
        
        $pdf = \Barryvdh\DomPDF\Facade::loadView('PDF.prueba');
        return $pdf-> stream('prueba.pdf');
    }

    public function PDFContrato($ID){
        $contratos=Contrato::where('ID_contrato','=',$ID)->get();
        $proveedor=Proveedor::where('ID_proveedor',$contratos[0]->ID_proveedor)->get();
        $representante=Representante_prov::where('ID_representante',$contratos[0]->ID_proveedor)->get();
        $agregas=Agrega::where('ID_contrato','=',$ID)->get();
        $fecha_inicial = Carbon::parse($contratos[0]->Fecha_inicial);
        $ciudad = Ciudad::where('ID_ciudad','=',$proveedor[0]->ID_ciudad)->get();

        $pdf = \Barryvdh\DomPDF\Facade::loadView('PDF.prueba',
        compact('contratos','fecha_inicial','proveedor','representante','agregas','ciudad'));
        return $pdf-> stream('prueba.pdf');
    }

    
}
