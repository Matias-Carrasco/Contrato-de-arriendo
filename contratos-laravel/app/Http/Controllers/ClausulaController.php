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
        $categorias=Categoria::all();
        return view('clausula.index',$datos,compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all();
        return view('clausula/create',compact('categorias'));
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
    public function edit($ID_clausula)
    {
        $categorias=Categoria::all();
        $clausula=Clausula::findOrFail($ID_clausula);
        return view('clausula/edit',compact('clausula'),compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$ID_clausula)
    {
        $campos=[
            'ID_categoria'=>'required|integer',
            'Descripcion'=>'required|string|max:100',
        ];
        $mensaje=[
          "ID_categoria.required"=>'La categoria es requerida',
          "Descripcion.required"=>'La descripcion es requerida',
        ];

      $this->validate($request,$campos,$mensaje);
      $modificar=$request->except('_token','_method');
      Clausula::where('ID_clausula','=',$ID_clausula)->update($modificar);
      return redirect('/clausula');

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
