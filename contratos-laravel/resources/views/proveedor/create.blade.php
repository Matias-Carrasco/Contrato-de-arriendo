@extends('layouts.sidebar')
@section('content')

<form action="{{url('/proveedor')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <section class="content">

       

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rellene los datos</h3>
                    </div>
                    <div class="card-body" style="display: block;">
                       
                        <div class="form-group">
                            <label for="ID_ciudad">{{'Ciudad usuario'}}</label>
                            <select name="ID_ciudad" id="ID_ciudad" class="form-control custom-select {{$errors->has('id')?'is-invalid':''}}"     >
                                <option value="">-- Escoja ciudad--</option>
                                @foreach ($ciudades as $ciudad)
                                <option value="{{$ciudad->ID_ciudad}}"> {{$ciudad->Nombre_c}} </option>
                                @endforeach
                            </select>
                            {!! $errors->first('ID_ciudad','<div class="invalid-feedback"> :message</div>') !!}
      
                        </div>                  
                        <div class="form-group">
                            <label for="Rut_pro">{{'Rut'}}</label>
                            <p style="color:#5a5a5ae7" ;>Ej: 12345678-9</p>
                            <input type="text" name="Rut_pro" id="Rut_pro"
                                value="{{isset($proveedor->Rut_pro)?$proveedor->Rut_pro:old('Rut_pro')}}"
                                class="form-control {{$errors->has('Rut_pro')?'is-invalid':''}}">
                            {!! $errors->first('Rut_pro','<div class="invalid-feedback"> :message</div>') !!}
                        </div>              

                        <div class="form-group">
                            <label for="Nombre_pro">{{'Razón social'}}</label>
                            <input type="text" name="Nombre_pro" id="Nombre_pro"
                                value="{{isset($proveedor->Nombre_pro)?$proveedor->Nombre_pro:old('Nombre_pro')}}"
                                class="form-control {{$errors->has('Nombre_pro')?'is-invalid':''}}">
                            {!! $errors->first('Nombre_pro','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                           

                        <div class="form-group">
                            <label for="Nombre_organizacion">{{'Giro Proveedor'}}</label>
                            <input type="text" name="Giro_pro" id="Giro_pro"
                                value="{{isset($proveedor->Giro_pro)?$proveedor->Giro_pro:old('Giro_pro')}}"
                                class="form-control {{$errors->has('Giro_pro')?'is-invalid':''}}">
                            {!! $errors->first('Giro_pro','<div class="invalid-feedback"> :message</div>') !!}

                        </div>

                        <div class="form-group">
                            <label for="Nombre_domicilio_pro">{{'Calle'}}</label>
                            <input type="text" name="Nombre_domicilio_pro" id="Nombre_domicilio_pro"
                            value="{{isset($proveedor->Nombre_domicilio_pro)?$proveedor->Nombre_domicilio_pro:old('Nombre_domicilio_pro')}}"
                            class="form-control {{$errors->has('Nombre_domicilio_pro')?'is-invalid':''}}">
                        {!! $errors->first('Nombre_domicilio_pro','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                        <div class="form-group">
                            <label for="Numero_domicilio_pro:">{{'Número'}}</label>
                            <input type="text" name="Numero_domicilio_pro" id="Numero_domicilio_pro"
                                value="{{isset($proveedor->Numero_domicilio_pro)?$proveedor->Numero_domicilio_pro:old('Numero_domicilio_pro')}}"
                                class="form-control {{$errors->has('Numero_domicilio_pro')?'is-invalid':''}}">
                            {!! $errors->first('Numero_domicilio_pro','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                        <div class="form-group">
                            <label for="Codigo_postal_pro">{{'Codigo postal '}}</label>
                            <input type="text" name="Codigo_postal_pro" id="Codigo_postal_pro"
                                value="{{isset($proveedor->Codigo_postal_pro)?$proveedor->Codigo_postal_pro:old('Codigo_postal_pro')}}"
                                class="form-control {{$errors->has('Codigo_postal_pro')?'is-invalid':''}}">
                            {!! $errors->first('Codigo_postal_pro','<div class="invalid-feedback"> :message</div>') !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{url('/proveedor')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Agregar" class="btn btn-success float-right">
            </div>
        </div>
    </section>
</form>
  

@stop