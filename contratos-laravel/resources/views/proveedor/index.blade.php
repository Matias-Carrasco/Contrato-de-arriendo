@extends('layouts.sidebar')
@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Proveedor</h3>
        <div>
            <a href="{{url('/proveedor/create')}}" class="btn btn-success">Crear proveedor</a>
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
                            <button class="btn btn-block btn-danger" data-proid={{$pro->ID_proveedor}}
                                data-toggle="modal" data-target="#delete">Borrar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>




        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <form action="{{route('proveedor.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <h5 class="text-center">
                        ¿Estás seguro de que quieres borrar este proveedor?
                    </h5>
                    <input type="hidden" name="proveedor_id" id="pro_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancelar</button>
                    <button type="submit" class="btn btn-warning">Si, Borrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('proid')
        var modal = $(this)
        modal.find('.modal-body #pro_id').val(pro_id);
    })

    $('document').ready(function () {
        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se puede eliminar a este proveedor',

        })
        @endif

    });

</script>


@endsection
