<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Region;
use App\Models\Proveedor;
use App\Models\Contrato;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['proveedor']=proveedor::paginate();
        return view('proveedor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regiones=Region::all();
        $ciudades=Ciudad::all();
        return view('proveedor/create',compact('ciudades'),compact('regiones'));
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
            'ID_ciudad'=>'required|not_in:0',
            'Rut_pro' => 'required|cl_rut|unique:proveedors,Rut_pro',
            'Nombre_pro'   => 'required|string|max:100',
            'Giro_pro'=>'required|string|max:100',
            'Nombre_domicilio_pro'=>'required|string|max:100',
            'Numero_domicilio_pro'=>'required|integer',
            'Codigo_postal_pro'=>'required|integer'
        ];
        $mensaje=[
            "ID_ciudad.required"=>'La Ciudad es requerida',
            "ID_ciudad.not_in"=>'La Ciudad es requerida',
            "Rut_pro.cl_rut"=>'El Rut ingresado no es correcto',
            "Rut_pro.required"=>'El Rut es requerido',
            "Rut_pro.unique"=> 'El Rut ya esta siendo utilizado', 
            "Nombre_pro.required"=>'El Nombre es requerido',
            "Giro_pro.required"=>'El giro es requerido',
            "Nombre_domicilio_pro.required"=>'El nombre de domicilio es requerido',
            "Numero_domicilio_pro.required"=>'El número domicilio es requerido',
            "Codigo_postal_pro.required"=>'El codigo postal es requerido ',
        ];
        $this->validate($request,$campos,$mensaje);
        $datospro=$request->except('_token');
        Proveedor::insert($datospro);
        return redirect('/proveedor');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_proveedor)
    {
        $ciudades=Ciudad::all();
        $proveedor=Proveedor::findOrFail($ID_proveedor);
        return view('proveedor/edit',compact('proveedor'),compact('ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_proveedor)
    {
        $campos=[
            'ID_ciudad'=>'required|not_in:0',
            'Rut_pro' => 'required|cl_rut|unique:proveedors,Rut_pro',
            'Nombre_pro'   => 'required|string|max:100',
            'Giro_pro'=>'required|string|max:100',
            'Nombre_domicilio_pro'=>'required|string|max:100',
            'Numero_domicilio_pro'=>'required|integer',
            'Codigo_postal_pro'=>'required|integer'
        ];
        $mensaje=[
            "ID_ciudad.required"=>'La Ciudad es requerida',
            "ID_ciudad.not_in"=>'La Ciudad es requerida',
            "Rut_pro.cl_rut"=>'El Rut ingresado no es correcto',
            "Rut_pro.required"=>'El Rut es requerido',
            "Rut_pro.unique"=> 'El Rut ya esta siendo utilizado', 
            "Nombre_pro.required"=>'El Nombre es requerido',
            "Giro_pro.required"=>'El giro es requerido',
            "Nombre_domicilio_pro.required"=>'El nombre de domicilio es requerido',
            "Numero_domicilio_pro.required"=>'El número domicilio es requerido',
            "Codigo_postal_pro.required"=>'El codigo postal es requerido ',
        ];

      $this->validate($request,$campos,$mensaje);
      $modificar=$request->except('_token','_method');
      Proveedor::where('ID_proveedor','=',$ID_proveedor)->update($modificar);
      return redirect('/proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $proveedor = Proveedor::findOrFail($request->proveedor_id);
        
        try{
            $proveedor->delete();  
        }catch(\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
        return back();
        
        //return back();
    
    }

    public function ID_ciudad(Request $ID_region) 
    { // cambiar aca porq lo copie y pegue del otro lao
        $ciudades=Ciudad::Ciudad($ID_region->input('ID_region'))->get();
        return response()->json($ciudades);


    }

    public function delete($id){
        $proveedor = Proveedor::findOrFail($id);

        try{
            $proveedor->delete();  
        }catch(\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }

        return response()->json(['satus'=>'Se elimino correctamente']);
    }
}
