@extends('layouts.sidebar')
@section('content')


<form action="{{url('/clausula/'.$clausula->ID_clausula)}}" method="post" enctype=" multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <section class="content">
        <div class="container card">

            <div class="card-header">
                <h3 class="card-title">Clausula {{$clausula->ID_clausula}}</h3>
            </div>

            <div class="card-body" style="display: block;">



                <div class="form-group">
                    <label for="ID_categoria">{{'Categoria'}}</label>
                    <select name="ID_categoria" id="ID_categoria"
                        class="form-control custom-select {{$errors->has('id')?'is-invalid':''}}">
                        
                        @foreach ($categorias as $categoria)
                            @if($categoria->ID_categoria == $clausula->ID_categoria)
                            <option value="{{$categoria->ID_categoria}}">  {{$categoria->ID_categoria}} -- {{$categoria->Descripcion}} </option>
                            @endif
                        @endforeach

                        @foreach ($categorias as $categoria)
                            @if($categoria->ID_categoria != $clausula->ID_categoria)
                                <option value="{{$categoria->ID_categoria}}"> {{$categoria->ID_categoria}} -- {{$categoria->Descripcion}}</option>
                        
                            @endif

                        @endforeach
                    </select>
                    {!! $errors->first('ID_categoria','<div class="invalid-feedback"> :message</div>') !!}

                </div>



                <div class="form-group">
                    <label for="Descripcion">{{'Descripcion'}}</label>
                    <input type="text" name="Descripcion" id="Descripcion"
                        value="{{$clausula->Descripcion}}"
                        class="form-control {{$errors->has('Descripcion')?'is-invalid':''}}">
                    {!! $errors->first('Descripcion','<div class="invalid-feedback"> :message</div>')
                    !!}
                </div>



            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{url('/clausula')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Editar" class="btn btn-success float-right">
                </div>
            </div>


        </div>
    

    </section>
</form>


@stop
