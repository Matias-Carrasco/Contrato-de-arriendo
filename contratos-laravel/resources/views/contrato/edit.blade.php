@extends('layouts.sidebar')
@section('content')


<form action="{{url('/contrato/'.$contrato->ID_contrato)}}" method="post" enctype=" multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <section class="content">
        <div class="container card">

            <div class="card-header">
                <h3 class="card-title">Contrato {{$contrato->ID_contrato}}</h3>
            </div>

            <div class="card-body" style="display: block;">



                <div class="form-group">
                    <label for="ID_estado">{{'Estado'}}</label>
                    <select name="ID_estado" id="ID_estado"
                        class="form-control custom-select {{$errors->has('ID_estado')?'is-invalid':''}}">
                        
                        @foreach ($estado as $est)
                            @if($est->ID_estado == $contrato->ID_estado)
                            <option value="{{$est->ID_estado}}">  {{$est->ID_estado}} -- {{$est->Descripcion}} </option>
                            @endif
                        @endforeach

                        @foreach ($estado as $est)
                            @if($est->ID_estado != $contrato->ID_estado)
                            <option value="{{$est->ID_estado}}">  {{$est->ID_estado}} -- {{$est->Descripcion}} </option>
                            @endif
                        @endforeach
                    </select>
                    {!! $errors->first('ID_estado','<div class="invalid-feedback"> :message</div>') !!}

                </div>



                <div class="form-group">
                    <label for="Fecha_termino">{{'Fecha termino'}}</label>
                    <input type="date" name="Fecha_termino" id="Fecha_termino"
                        value="{{$contrato->Fecha_termino}}"
                        class="form-control {{$errors->has('Fecha_termino')?'is-invalid':''}}">
                    {!! $errors->first('Fecha_termino','<div class="invalid-feedback"> :message</div>')
                    !!}
                </div>



            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{url('/contrato')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Editar" class="btn btn-success float-right">
                </div>
            </div>


        </div>


       




    </section>
</form>


@stop
