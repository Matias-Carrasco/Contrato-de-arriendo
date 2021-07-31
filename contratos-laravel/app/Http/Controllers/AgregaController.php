<?php

namespace App\Http\Controllers;


use App\Models\Agrega;
use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Categoria;
use App\Models\Clausula;


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
        Agrega::insert($datos);
        return redirect('agrega/create');
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
        $clausulas=Clausula::Clausula($ID_categoria->input('ID_categoria'))->get();
        return response()->json($clausulas);


    }

    public function ClausulaContrato($ID_contrato){        
        
        $agrega=Agrega::where('ID_contrato',$ID_contrato)->get();
        $categoria= Categoria::all();
        $clausula=Clausula::all();
        return view('agrega.ClausulaContrato',compact('agrega','ID_contrato','categoria','clausula'));
    }

    public function EditarClausulaContrato($ID_contrato, $ID_clausula){

        $agrega = Agrega::where('ID_contrato',$ID_contrato)->where('ID_clausula',$ID_clausula)->get();
        
        
        $categoria = Categoria::all();
        $clausula = Clausula::all();
        //dd($agrega);
        return view('agrega.EditarClausulaContrato',compact('agrega','ID_contrato','ID_clausula','categoria','clausula'));
    }

    public function updateClausulaContrato(Request $request,$ID_contrato, $ID_clausula){
        $campos=[
            'ID_contrato' => 'required|integer',
            'ID_clausula' => 'required|integer',
            'Cambios_a_clausula' => 'required|string'
        ];
        $mensaje=[
            "Cambios_a_clausula.required"=>'Los cambios a la clausula son requeridos',
            "Cambios_a_clausula.string"=>'La clausula debe poseer letras',
            
            ];    
        $this->validate($request,$campos,$mensaje);
        $modificar=$request->except('_token','_method');
        Agrega::where('ID_contrato','=',$ID_contrato)->where('ID_clausula','=',$ID_clausula)->update($modificar);
        return redirect('/contrato');
        
    }

}
