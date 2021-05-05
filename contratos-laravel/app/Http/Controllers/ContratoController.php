<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Contrato;
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
        $datos['contrato']=contrato::paginate();
        return view('contrato.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades=Representante_prov::all();
        return view('contrato/create',compact('ciudades'));

        $ciudades=Ciudad::all();
        return view('contrato/create',compact('ciudades'));
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
            'ID_ciudad'=>'required|integer',
            'Rut_pro' => 'required|string|',
            'Nombre_pro'   => 'required|string|max:100',
            'Giro_pro'=>'required|string|max:100',
            'Nombre_domicilio_pro'=>'required|string|max:100',
            'Numero_domicilio_pro'=>'required|integer',
            'Codigo_postal_pro'=>'required|integer'
        ];
        $mensaje=[
            "Rut_pro.required"=>'El Rut es requerido',
            "Nombre_pro.required"=>'El Nombre es requerido',
            "Giro_pro.required"=>'El giro es requerido',
            "Nombre_domicilio_pro.required"=>'El nombre de domicilio es requerido',
            "Numero_domicilio_pro.required"=>'El número domicilio es requerido',
            "Codigo_postal_pro.required"=>'El codigo postal es requerido ',
        ];
        $this->validate($request,$campos,$mensaje);
        $datospro=$request->except('_token');
        contrato::insert($datospro);
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
        contrato::destroy($ID_contrato);
        return redirect('/contrato');
    }
}
