@extends('layouts.sidebar')
@section('content')


<form action="{{url('/representante_prov/'.$representante->ID_representante)}}" method="post" enctype=" multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Reprensentante {{$representante->ID_representante}}</h3>
                    </div>

                    <div class="card-body" style="display: block;">



                        <div class="form-group">
                            <label for="Nombre_re">{{'Nombre'}}</label>
                            <input type="text" name="Nombre_re" id="Nombre_re" value="{{$representante->Nombre_re}}"
                                class="form-control {{$errors->has('Nombre_re')?'is-invalid':''}}">
                            {!! $errors->first('Nombre_re','<div class="invalid-feedback"> :message</div>') !!}
                        </div>



                        <div class="form-group">
                            <label for="Nombre_domicilio_re">{{'Nombre domicilio'}}</label>
                            <input type="text" name="Nombre_domicilio_re" id="Nombre_domicilio_re"
                                value="{{$representante->Nombre_domicilio_re}}"
                                class="form-control {{$errors->has('Nombre_domicilio_re')?'is-invalid':''}}">
                            {!! $errors->first('Nombre_domicilio_re','<div class="invalid-feedback"> :message</div>')
                            !!}
                        </div>



                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <a href="{{url('/representante_prov')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Editar" class="btn btn-success float-right">
            </div>
        </div>




    </section>
</form>


@stop
