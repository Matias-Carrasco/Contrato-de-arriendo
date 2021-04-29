

@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Representante</h3>


    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 700px;">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Organizacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($representante as $representantes)
                    <tr>
                        <td>{{$representantes->Nombre_re}}</td>
                        <td>{{$representantes->Organizacion_re}}</td>
                        <td>

                        </td>
                        <td>
                            <input type="button" class="btn btn-block btn-warning" name="btn" value="Editar"
                                id="submitBtn" data-toggle="modal" data-target="#edit-modal"
                                class="btn btn-default" />

                            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Editar?</h5>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Cancelar</button>

                                            <a
                                                href="{{url('/propietarios/'.$representantes->ID_representante.'/edit')}}">
                                                <button type="submit"
                                                    class="btn btn-primary">Aceptar</button>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="button" class="btn btn-block btn-danger" name="btn"
                                value="Eliminar" id="submitBtn" data-toggle="modal"
                                data-target="#delete-modal" class="btn btn-default" />
                            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Borrar?</h5>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Cancelar</button>
                                            <form method="post"
                                                action="{{url('/propietarios/'.$representantes->ID_representante)}}">
                                                {{csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <button type="submit"
                                                    class="btn btn-primary">Aceptar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                    @endforeach





        </div>
    </div>
</div>
@stop
