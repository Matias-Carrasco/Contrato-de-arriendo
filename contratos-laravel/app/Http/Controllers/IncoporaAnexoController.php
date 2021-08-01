<?php

namespace App\Http\Controllers;

use App\Models\Incopora_anexo;
use Illuminate\Http\Request;
use App\Models\Anexo;
use App\Models\Perfil;
class IncoporaAnexoController extends Controller
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
        $contrato=Anexo::get('ID_anexo')->last();
        $Perfiles = Perfil::all();
        return view('Incorpora_anexo/create',compact('contrato'),compact('Perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

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
        Incopora_anexo::insert($datos);
        return redirect('tiene_anexo/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incopora_anexo  $incopora_anexo
     * @return \Illuminate\Http\Response
     */
    public function show(Incopora_anexo $incopora_anexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incopora_anexo  $incopora_anexo
     * @return \Illuminate\Http\Response
     */
    public function edit(Incopora_anexo $incopora_anexo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incopora_anexo  $incopora_anexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incopora_anexo $incopora_anexo)
    {
        //

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incopora_anexo  $incopora_anexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incopora_anexo $incopora_anexo)
    {
        //
    }
}
