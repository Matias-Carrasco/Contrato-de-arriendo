@extends('layouts.sidebar')
@section('content')

<form  action="{{url('/clausula')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <section class="content">



        <div class=" container card">

                    <div class="card-header">
                        <h3 class="card-title">Rellene los datos</h3>
                    </div>
                    
        
                    <div class="" style="display: block;">

                        <div class="form-group">
                            <label for="ID_categoria">{{'Categoria'}}</label>
                            <select name="ID_categoria" id="ID_categoria"
                                class="form-control custom-select {{$errors->has('id')?'is-invalid':''}}">
                                <option value="">-- Escoja categoria--</option>
                                @foreach ($categorias as $categoria)
                                <option value="{{$categoria->ID_categoria}}"> {{$categoria->ID_categoria}} -- {{$categoria->Descripcion}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('ID_categoria','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        
                        <div class="form-group">
                            <label for="Descripcion">{{'Descripcion'}}</label>
                            <textarea name="Descripcion" id="Descripcion" rows="10" cols="50" class="form-control {{$errors->has('Descripcion')?'is-invalid':''}}" ></textarea>
                            {!! $errors->first('Descripcion','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                    </div>

        <div class="row">
            <div class="col-12">
                <a href="{{url('/clausula')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Agregar" class="btn btn-success float-right">
            </div>
        </div>
    </div>
    </section>
</form>


@stop
