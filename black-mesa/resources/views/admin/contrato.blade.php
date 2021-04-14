@extends('adminlte::page')

@section('title', 'Contratos')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <div class="card-body" style="display: block;">

                <div class="form-group">
                    <label for="Region">{{'Region'}}</label>
                    <input type="text" name="Region" id="Region"
                        value="{{isset($condominio->Region)?$condominio->Region:old('Region')}}"
                        class="form-control {{$errors->has('Region')?'is-invalid':''}}">
                    {!! $errors->first('Region','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Ciudad">{{'Ciudad'}}</label>
                    <input type="text" name="Ciudad" id="Ciudad"
                        value="{{isset($condominio->Ciudad)?$condominio->Ciudad:old('Ciudad')}}"
                        class="form-control {{$errors->has('Ciudad')?'is-invalid':''}} ">
                    {!! $errors->first('Ciudad','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Calle">{{'Calle'}}</label>
                    <input type="text" name="Calle" id="Calle"
                        value="{{isset($condominio->Calle)?$condominio->Calle:old('Calle')}}"
                        class="form-control {{$errors->has('Calle')?'is-invalid':''}}">
                    {!! $errors->first('Calle','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Numero">{{'Numero'}}</label>
                    <input type="text" name="Numero" id="Numero"
                        value="{{isset($condominio->Numero)?$condominio->Numero:old('Numero')}}"
                        class="form-control {{$errors->has('Numero')?'is-invalid':''}}">
                    {!! $errors->first('Numero','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <a href="{{url('/condominio')}}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Agregar" class="btn btn-success float-right">
    </div>
</div>

    
@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
