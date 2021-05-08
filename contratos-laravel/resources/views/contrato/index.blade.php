@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Contrato</h3>
        <div>
            <a href="{{url('/contrato/create')}}"class="btn btn-success">Crear contrato</a>
        </div>
        
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 700px;">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Representante</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($contrato as $con)
                    <tr>
                        <td>{{$con->ID_contrato}}</td>

                        @foreach($representantes as $rep)
                            @if($rep->ID_representante ==$con->ID_representante)
                                <td>{{$rep->Nombre_re}}</td>
                            @endif
                        @endforeach

                        @foreach($proveedores as $pro)
                            @if($pro->ID_proveedor ==$con->ID_proveedor)
                                <td>{{$pro->Nombre_pro}}</td>
                            @endif
                        @endforeach
                           
                        @foreach($estados as $est)
                            @if($est->ID_estado ==$con->ID_estado)
                                <td>{{$est->Descripcion}}</td>
                            @endif
                        @endforeach
                        

                        <td>
                            <a href="{{url('/contrato/'.$con->ID_contrato.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning"
                                    onclick="return confirm('Editar');">Editar</button>
                            </a>

                        </td>
                        <td>
                            <form method="post" action="{{url('/contrato/'.$con->ID_contrato)}}">
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
