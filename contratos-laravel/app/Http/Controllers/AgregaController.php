<?php

namespace App\Http\Controllers;

use App\Models\Agrega;
use App\Models\Categoria;
use App\Models\Clausula;
use Illuminate\Http\Request;
use App\Models\Contrato;

class AgregaController extends Controller
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
        $categoria=Categoria::all();
        $clausula=Clausula::all();
        
        return view('agrega/create',compact('contrato','categoria','clausula'));
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
        $datos=$request->except('_token');
        Agrega::insert($datos);
        return redirect('perfil/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agrega  $agrega
     * @return \Illuminate\Http\Response
     */
    public function show(Agrega $agrega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agrega  $agrega
     * @return \Illuminate\Http\Response
     */
    public function edit(Agrega $agrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agrega  $agrega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agrega $agrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agrega  $agrega
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agrega $agrega)
    {
        //
    }

    public function ID_clausula(Request $ID_categoria) 
    { 
        $clausulas=Clausula::Clausulas($ID_categoria->input('ID_categoria'))->get();
        return response()->json($clausulas);


    }

}
