@extends('layouts.sidebar')
@section('content')

<form action="{{url('/contrato')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <section class="content">
        <div class="container card">
            <div class="card-header" style="margin-top: 15px;">
                <h3 class="card-title">Datos del contrato</h3>
            </div>
            <div class="card-body" style="display: block;">

                <div class="form-group">
                    <label for="ID_representante">{{'Representante'}}</label>

                    <select name="ID_representante" id="ID_representante"
                        class="form-control custom-select {{$errors->has('ID_representante')?'is-invalid':''}}">
                        <option value="">-- Escoja representante--</option>
                        @foreach ($representantes as $representante)
                        <option value="{{$representante->ID_representante}}"> {{$representante->Nombre_re}} </option>
                        @endforeach

                    </select>
                    {!! $errors->first('ID_representante','<div class="invalid-feedback"> :message</div>') !!}

                </div>
                <div class="form-group">
                    <label for="ID_proveedor">{{'Proveedor'}}</label>
                    <select name="ID_proveedor" id="ID_proveedor"
                        class="form-control custom-select {{$errors->has('ID_proveedor')?'is-invalid':''}}">
                        <option value="">-- Escoja proveedor--</option>
                        @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->ID_proveedor}}"> {{$proveedor->Nombre_pro}} </option>
                        @endforeach
                    </select>
                    {!! $errors->first('ID_proveedor','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="ID_estado">{{'Estado'}}</label>
                    <select name="ID_estado" id="ID_estado"
                        class="form-control custom-select {{$errors->has('ID_estado')?'is-invalid':''}}">
                        <option value="">-- Escoja Estado--</option>
                        @foreach ($estados as $estado)
                        <option value="{{$estado->ID_estado}}"> {{$estado->Descripcion}} </option>
                        @endforeach
                    </select>
                    {!! $errors->first('ID_estado','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Fecha_inicial">{{'Fecha inicial'}}</label>
                    <input type="date" name="Fecha_inicial" id="Fecha_inicial"
                        value="{{isset($contrato->Fecha_inicial)?$contrato->Fecha_inicial:old('Fecha_inicial')}}"
                        class="form-control {{$errors->has('Fecha_inicial')?'is-invalid':''}}">
                    {!! $errors->first('Fecha_inicial','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Fecha_termino">{{'Fecha termino'}}</label>
                    <input type="date" name="Fecha_termino" id="Fecha_termino"
                        value="{{isset($contrato->Fecha_termino)?$contrato->Fecha_termino:old('Fecha_termino')}}"
                        class="form-control {{$errors->has('Fecha_termino')?'is-invalid':''}}">
                    {!! $errors->first('Fecha_termino','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                

                <div class="form-group">
                    <label for="Cod_licitacion">{{'Codigo licitacion'}}</label>
                    <input type="text" name="Cod_licitacion" id="Cod_licitacion"
                        value="{{isset($contrato->Cod_licitacion)?$anexo->Cod_licitacion:old('Cod_licitacion')}}"
                        class="form-control {{$errors->has('Cod_licitacion')?'is-invalid':''}}">
                    {!! $errors->first('Cod_licitacion','<div class="invalid-feedback"> :message</div>') !!}
                </div>

            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom: 10px;">
                    <a href="{{url('/contrato')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Siguiente" class="btn btn-success float-right">
                </div>
            </div>
        </div>


    </section>
</form>


@stop
