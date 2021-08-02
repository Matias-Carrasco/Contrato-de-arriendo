<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Proveedor;
use App\Models\Representante_prov;
use App\Models\Agrega;
use App\Models\Incopora_anexo;
use App\Models\Anexo;
use Carbon\Carbon;
use App\Models\Ciudad;
use App\Models\Perfil;
use App\Models\Tiene;
use App\Models\Estado;
use App\Models\Incorpora;
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
        return view('PDF.PdfContrato',compact('contratos'));
    }

    public function PDF(Request $request){
        
        $pdf = \Barryvdh\DomPDF\Facade::loadView('PDF.PdfContrato');
        return $pdf-> stream('PdfContrato.pdf');
    }

    public function PDFContrato($ID){
        $contratos=Contrato::where('ID_contrato','=',$ID)->get();
        $proveedor=Proveedor::where('ID_proveedor',$contratos[0]->ID_proveedor)->get();
        $representante=Representante_prov::where('ID_representante',$contratos[0]->ID_proveedor)->get();
        $agregas=Agrega::where('ID_contrato','=',$ID)->get();
        $fecha_inicial = Carbon::parse($contratos[0]->Fecha_inicial);
        $ciudad = Ciudad::where('ID_ciudad','=',$proveedor[0]->ID_ciudad)->get();
        $incorporas=Incorpora::where('ID_contrato','=',$ID)->get();
        $perfiles=Perfil::all();

        $pdf = \Barryvdh\DomPDF\Facade::loadView('PDF.PdfContrato',
        compact('contratos','fecha_inicial','proveedor','representante','agregas','ciudad','incorporporas','perfiles'));
        return $pdf-> stream('PdfContrato.pdf');
    }

    public function PDFAnexo($ID){
        $anexo=Anexo::where('ID_anexo','=',$ID)->get();
        $incorporas=Incopora_anexo::where('ID_anexo','=',$ID)->get();
        $perfiles=Perfil::all();
        $tienes= Tiene::where('ID_anexo','=',$ID)->get();
        $estado= Estado::where('ID_estado','=',$anexo[0]->ID_estado)->get();



        $pdf = \Barryvdh\DomPDF\Facade::loadView('PDF.PdfAnexo',
        compact('anexo','incorporas','perfiles','tienes','estado'));
        return $pdf-> stream('PdfAnexo.pdf');
    }

    
}
