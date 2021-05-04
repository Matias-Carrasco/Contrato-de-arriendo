@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Anexo</h3>
        <div>
            <a href="{{url('/anexo/create')}}"class="btn btn-success">Crear anexo</a>
        </div>
        
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 700px;">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Contrato</th>
                        <th>Estado</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($anexo as $ane)
                    <tr>
                        <td>{{$ane->ID_contrato}}</td>
                        <td>{{$ane->ID_estado}}</td>
                        

                        <td>
                            <a href="{{url('/anexo/'.$ane->ID_anexo.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning"
                                    onclick="return confirm('Editar');">Editar</button>
                            </a>

                        </td>
                        <td>
                            <form method="post" action="{{url('/anexo/'.$ane->ID_anexo)}}">
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
