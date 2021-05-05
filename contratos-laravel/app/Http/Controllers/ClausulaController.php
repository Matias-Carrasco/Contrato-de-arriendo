<?php

namespace App\Http\Controllers;

use App\Models\Clausula;
use App\Models\Categoria;
use Illuminate\Http\Request;

class clausulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['clausula']=clausula::paginate();
        return view('clausula.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria=Categoria::all();
        return view('clausula/create',compact('categoria'));
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
            'ID_categoria'=>'required|integer',
            'Descripcion' => 'required|string|'
        ];
        $mensaje=[
            "ID_categoria.required"=>'La categoria es requerida',
            "Descripcion.required"=>'La descripcion es requerida'
            ];
        $this->validate($request,$campos,$mensaje);
        $datosclausula=$request->except('_token');
        clausula::insert($datosclausula);
        return redirect('/clausula');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function show(clausula $clausula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function edit(clausula $clausula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clausula $clausula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_clausula)
    {
        clausula::destroy($ID_clausula);
        return redirect('/clausula');
    }
}
