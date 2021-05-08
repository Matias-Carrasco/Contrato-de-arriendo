@extends('layouts.sidebar')
@section('content')

<form action="{{url('/representante_prov')}}" method="post" enctype="multipart/form-data">
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
                            <label for="Rut_re">{{'Rut'}}</label>
                            <p style="color:#5a5a5ae7" ;>Ej: 12345678-9</p>
                            <input type="text" name="Rut_re" id="Rut_re"
                                value="{{isset($representante_prov->Rut_re)?$representate_prov->Rut_re:old('Rut_re')}}"
                                class="form-control {{$errors->has('Rut_re')?'is-invalid':''}}">
                            {!! $errors->first('Rut_re','<div class="invalid-feedback"> :message</div>') !!}
                        </div>              

                        <div class="form-group">
                            <label for="Nombre_re">{{'Nombre Completo'}}</label>
                            <input type="text" name="Nombre_re" id="Nombre_re"
                                value="{{isset($representante_prov->Nombre_re)?$representante_prov->Nombre_re:old('Nombre_re')}}"
                                class="form-control {{$errors->has('Nombre_re')?'is-invalid':''}}">
                            {!! $errors->first('Nombre_re','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                           

                        <div class="form-group">
                            <label for="Nombre_organizacion">{{'Nombre organizacion'}}</label>
                            <input type="text" name="Organizacion_re" id="Organizacion_re"
                                value="{{isset($representante_prov->Organizacion_re)?$representante_prov->Organizacion_re:old('Organizacion_re')}}"
                                class="form-control {{$errors->has('Organizacion_re')?'is-invalid':''}}">
                            {!! $errors->first('Organizacion_re','<div class="invalid-feedback"> :message</div>') !!}

                        </div>

                        <div class="form-group">
                            <label for="Nombre_domicilio_re">{{'Domicilio'}}</label>
                            <input type="text" name="Nombre_domicilio_re" id="Nombre_domicilio_re"
                            value="{{isset($representante_prov->Nombre_domicilio_re)?$representante_prov->Nombre_domicilio_re:old('Nombre_domicilio_re')}}"
                            class="form-control {{$errors->has('Nombre_domicilio_re')?'is-invalid':''}}">
                        {!! $errors->first('Nombre_domicilio_re','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                        <div class="form-group">
                            <label for="Numero_domicilio_re:">{{'Número domicilio'}}</label>
                            <input type="text" name="Numero_domicilio_re" id="Numero_domicilio_re"
                                value="{{isset($representante_prov->Numero_domicilio_re)?$representante_prov->Numero_domicilio_re:old('Numero_domicilio_re')}}"
                                class="form-control {{$errors->has('Numero_domicilio_re')?'is-invalid':''}}">
                            {!! $errors->first('Numero_domicilio_re','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                        <div class="form-group">
                            <label for="Codigo_postal_re">{{'Codigo postal '}}</label>
                            <input type="text" name="Codigo_postal_re" id="Codigo_postal_re"
                                value="{{isset($representante_prov->Codigo_postal_re)?$representante_prov->Codigo_postal_re:old('Codigo_postal_re')}}"
                                class="form-control {{$errors->has('Codigo_postal_re')?'is-invalid':''}}">
                            {!! $errors->first('Codigo_postal_re','<div class="invalid-feedback"> :message</div>') !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{url('/representante_prov')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Agregar" class="btn btn-success float-right">
            </div>
        </div>
    </section>
</form>
  

@stop