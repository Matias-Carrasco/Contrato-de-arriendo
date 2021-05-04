@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Clausula</h3>
        <div>
            <a href="{{url('/clausula/create')}}"class="btn btn-success">Crear clausula</a>
        </div>
        
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 700px;">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Descripcion</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($clausula as $clau)
                    <tr>
                        <td>{{$clau->ID_categoria}}</td>
                        <td>{{$clau->Descripcion}}</td>
                        

                        <td>
                            <a href="{{url('/clausula/'.$clau->ID_clausula.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning"
                                    onclick="return confirm('Editar');">Editar</button>
                            </a>

                        </td>
                        <td>
                            <form method="post" action="{{url('/clausula/'.$clau->ID_clausula)}}">
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
