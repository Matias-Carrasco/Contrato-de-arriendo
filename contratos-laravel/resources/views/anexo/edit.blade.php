@extends('layouts.sidebar')
@section('content')

<form action="{{url('/anexo/'.$anexo->ID_anexo)}}" method="post" enctype=" multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}

    <section class="content">



        <div class="container card">
                    <div class="card-header">
                        <h3 class="card-title">Rellene los datos</h3>
                    </div>
                    <div class="card-body" style="display: block;">

                        <div class="form-group">
                            <label for="ID_estado">{{'Estado'}}</label>
                            <select name="ID_estado" id="ID_estado"
                                class="form-control custom-select {{$errors->has('id')?'is-invalid':''}}">
                                
                                @foreach ($estados as $estado)
                                    @if($estado->ID_estado == $anexo->ID_estado)
                                    <option value="{{$estado->ID_estado}}"> {{$estado->Descripcion}} </option>
                                    @endif
                                @endforeach

                                @foreach ($estados as $estado)
                                    @if($estado->ID_estado != $anexo->ID_estado)
                                    <option value="{{$estado->ID_estado}}"> {{$estado->Descripcion}} </option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('ID_estado','<div class="invalid-feedback"> :message</div>') !!}
                        </div>
                        <div class="form-group">
                            <label for="PDF_anexo">{{'PDF anexo'}}</label>
                            <input type="text" name="PDF_anexo" id="PDF_anexo"
                                value="{{isset($anexo->PDF_anexo)?$anexo->PDF_anexo:old('PDF_anexo')}}"
                                class="form-control {{$errors->has('PDF_anexo')?'is-invalid':''}}">
                            {!! $errors->first('PDF_anexo','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{url('/anexo')}}" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Agregar" class="btn btn-success float-right">
                        </div>
                    </div>
        </div>

        
    </section>
</form>


@stop
