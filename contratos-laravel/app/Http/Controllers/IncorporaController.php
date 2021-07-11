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
        $contrato=Contrato::get('ID_contrato')->last();
        $request = $request->except('_token');
        $datosEnviar = [];
        
        
        foreach ($request as $req) {
            $datosEnviar['ID_contrato'] = $contrato->ID_contrato;            
            $datosEnviar['ID_perfil'] = $req->ID_perfil;
            $datosEnviar['Cantidad'] = $req->Cantidad;
            
            $datosEnviar[] = $datosEnviar;         
        }
                
        Incorpora::insert($datosEnviar);
         return redirect('contrato');
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
