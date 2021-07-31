<?php

namespace App\Http\Controllers;

use App\Models\Tiene;
use App\Models\Anexo;
use App\Models\Categoria;
use App\Models\Clausula;


use Illuminate\Http\Request;

class TieneController extends Controller
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
        $anexo = Anexo::get('ID_anexo')->last();
        $categoria=Categoria::all();
        $clausula=Clausula::all();

        return view('tiene/create',compact('anexo','categoria','clausula'));
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
            'ID_clausula'=>'required|integer',
            'Cambios_a_clausula' => 'required|string|not_regex:/█/'        
        ];
        $mensaje=[
            "ID_clausula.required"=>'La Clausula es requerida',
            "Cambios_a_clausula.required"=>'La descripcion de la clausula es requerida',
            "Cambios_a_clausula.not_regex"=>'Debe de llenar los campos que poseen █'
            ];
        $this->validate($request,$campos,$mensaje);


        
        
       
        $datos=$request->except('_token');
        Tiene::insert($datos);
        return redirect('tiene/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiene  $tiene
     * @return \Illuminate\Http\Response
     */
    public function show(Tiene $tiene)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiene  $tiene
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiene $tiene)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiene  $tiene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiene $tiene)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiene  $tiene
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiene $tiene)
    {
        //
    }

    public function ID_clausula(Request $ID_categoria) 
    { 
        $clausulas=Clausula::Clausula($ID_categoria->input('ID_categoria'))->get();
        return response()->json($clausulas);


    }
}
