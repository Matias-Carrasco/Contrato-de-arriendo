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
                    @foreach($representante as $rep)
                    <tr>
                        <td>{{$rep->Nombre_re}}</td>
                        <td>{{$rep->Organizacion_re}}</td>
                        <td>{{$rep->ID_representante}}</td>

                        <td>
                            <a href="{{url('/representante_prov/'.$rep->ID_representante.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning"
                                    onclick="return confirm('Editar');">Editar</button>
                            </a>

                        </td>
                        <td>
                            <form method="post" action="{{url('/representante_prov/'.$rep->ID_representante)}}">
                                {{csrf_field() }}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-block btn-danger"
                                    onclick="return confirm('Borrar');">Borrar</button>

                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>




        </div>
    </div>
</div>
@stop
