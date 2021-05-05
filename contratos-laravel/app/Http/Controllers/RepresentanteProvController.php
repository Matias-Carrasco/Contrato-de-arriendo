<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
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
    {   $ciudades=Ciudad::all();
        return view('representante/create',compact('ciudades'));
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
          'ID_ciudad'=>'required|integer',
          'Rut_re' => 'required|string|',
          'Nombre_re'   => 'required|string|max:100',
          'Organizacion_re'=>'required|string|max:100',
          'Nombre_domicilio_re'=>'required|string|max:100',
          'Numero_domicilio_re'=>'required|integer',
          'Codigo_postal_re'=>'required|integer'
      ];
      $mensaje=[
        "Rut_re.required"=>'El Rut es requerido',
        "Nombre_re.required"=>'El Nombre es requerido',
        "Organizacion_re.required"=>'El nombre organizacion es requerido',
        "Nombre_domicilio_re.required"=>'El nombre de domicilio es requerido',
        "Numero_domicilio_re.required"=>'El número domicilio es requerido',
        "Codigo_postal_re.required"=>'El codigo postal es requerido ',
    ];
        
      $this->validate($request,$campos,$mensaje);
      $datosrep=$request->except('_token');
      Representante_prov::insert($datosrep);
      return redirect('/representante_prov');

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
    public function edit($ID_representante)
    {
        $representante=Representante_prov::findOrFail($ID_representante);
        return view('representante/edit',compact('representante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Representante_prov  $representante_prov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$ID_representante)
    {
        $campos=[
            'Nombre_re'=>'required|string|max:100',
            'Nombre_domicilio_re'=>'required|string|max:100',
        ];
        $mensaje=[
          "Nombre_re.required"=>'El Nombre es requerido',
          "Nombre_domicilio_re.required"=>'El nombre de domicilio es requerido',
        ];

      $this->validate($request,$campos,$mensaje);
      $modificar=$request->except('_token','_method');
      Representante_prov::where('ID_representante','=',$ID_representante)->update($modificar);
      return redirect('/representante_prov');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Representante_prov  $representante_prov
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_representante)
    {
        Representante_prov::destroy($ID_representante);
        return redirect('/representante_prov');
        
    }
}
