<?php

namespace App\Http\Controllers;

use App\Models\Incorpora;
use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Perfil;

class IncorporaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contrato=Contrato::get('ID_contrato')->last();
        $Perfiles = Perfil::all();
        return view('perfil/create',compact('contrato'),compact('Perfiles'));
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
            'ID_perfil'=>'required|not_in:0',
            'Cantidad'=>'numeric|digits_between:1,9999999',
            
            
        ];
        $mensaje=[
            "ID_perfil.required"=>'El Perfil es requerido',
            "ID_perfil.not_in"=>'El Perfil es requerido',
            "Cantidad.numeric"=>'La Cantidad es requerida',
            "Cantidad.digits_between"=>'La cantidad debe ser mayor a 0'


         
            
        ];
        $this->validate($request,$campos,$mensaje);
      

        $datos=$request->except('_token');
        Incorpora::insert($datos);
        return redirect('perfil/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incorpora  $incorpora
     * @return \Illuminate\Http\Response
     */
    public function show(Incorpora $incorpora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incorpora  $incorpora
     * @return \Illuminate\Http\Response
     */
    public function edit(Incorpora $incorpora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incorpora  $incorpora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incorpora $incorpora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incorpora  $incorpora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incorpora $incorpora)
    {
        //
    }
}
