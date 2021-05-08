<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Estado;
use App\Models\Proveedor;
use App\Models\Representante_prov;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['contrato']=Contrato::paginate();
        $representantes=Representante_prov::all();
        $proveedores=Proveedor::all();
        $estados=Estado::all();
        return view('contrato.index',$datos,compact('representantes','proveedores','estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representantes=Representante_prov::all();
        $proveedores=Proveedor::all();
        $estados=Estado::all();
        return view('contrato/create',compact('representantes','proveedores','estados'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'ID_representante'=>'required|integer',
            'ID_proveedor' => 'required|integer|',
            'ID_estado'   => 'required|integer',
            'Fecha_inicial'=>'required|date',
            'Fecha_termino'=>'required|date',
            
            
        ];
        $mensaje=[
            "ID_representante.required"=>'El representante es requerido',
            "ID_proveedor.required"=>'El proveedor es requerido',
            "ID_estado.required"=>'El estado es requerido',
            "Fecha_inicial.required"=>'La fecha de inicio es requerida',
            "Fecha_termino.required"=>'La fecha de termino es requerida',
            
        ];
        $this->validate($request,$campos,$mensaje);
        $datoscontrato=$request->except('_token');
        contrato::insert($datoscontrato);
        return redirect('/contrato');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(contrato $contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_contrato)
    {
        Contrato::destroy($ID_contrato);
        return redirect('/contrato');
    }
}
