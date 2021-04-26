<?php

namespace App\Http\Controllers;

use App\Models\Representante_prov;
use Illuminate\Http\Request;

class RepresentanteProvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['representante']=Representante_prov::paginate();
        return view('representante.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Representante_prov  $representante_prov
     * @return \Illuminate\Http\Response
     */
    public function show(Representante_prov $representante_prov)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Representante_prov  $representante_prov
     * @return \Illuminate\Http\Response
     */
    public function edit(Representante_prov $representante_prov)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Representante_prov  $representante_prov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Representante_prov $representante_prov)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Representante_prov  $representante_prov
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representante_prov $representante_prov)
    {
        //
    }
}
