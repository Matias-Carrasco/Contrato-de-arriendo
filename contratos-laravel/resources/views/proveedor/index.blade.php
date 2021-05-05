@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Proveedor</h3>
        <div>
            <a href="{{url('/proveedor/create')}}"class="btn btn-success">Crear proveedor</a>
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 700px;">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedor as $pro)
                    <tr>
                        <td>{{$pro->Rut_pro}}</td>
                        <td>{{$pro->Nombre_pro}}</td>
                        

                        <td>
                            <a href="{{url('/proveedor/'.$pro->ID_proveedor.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning"
                                    onclick="return confirm('Editar');">Editar</button>
                            </a>

                        </td>
                        <td>
                            <form method="post" action="{{url('/proveedor/'.$pro->ID_proveedor)}}">
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
