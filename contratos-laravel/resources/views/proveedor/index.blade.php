@extends('layouts.sidebar')
@section('content')


<div class="card">
    <div class="card-header" style="margin-bottom:8px">
        <h3 class="card-title">Proveedor
   
            <a href="{{url('/proveedor/create')}}" class="btn btn-success d-flex ml-auto float-right">Crear proveedor</a>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 1000px;">

  
            <table class="table table-head-fixed text-nowrap" id="tabla1">

                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedor as $pro)
                    <tr>
                        <input type="hidden" name="pro_id" class="delet_pro_id" value="{{$pro->ID_proveedor}}">
                        <td>{{$pro->Rut_pro}}</td>
                        <td>{{$pro->Nombre_pro}}</td>

                        <td>
                            <a href="{{url('/proveedor/'.$pro->ID_proveedor.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning">Editar</button>
                            </a>
                        </td>
                        <td style="font-size: 0px;">
                            <form action="{{route('proveedor.destroy','test')}}" method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button type="button" class="btn btn-block btn-danger deleteswal">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tfoot>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th></th>
                            <th></th>
                            
    
                        </tr>
                    </tfoot>
                </tbody>
        </div>
   
</div>


@endsection

@section('js')
<script>
    $('document').ready(function () {

        $('#tabla1').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.deleteswal').click(function (e) {
            e.preventDefault();
            var deletid = $(this).closest("tr").find('.delet_pro_id').val();
            Swal.fire({
                    title: '¿Estas seguro?',
                    text: "Esto borrara permanentemente el proveedor",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, Borralo!',
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        var data = {
                            "_token": $('input[name="_token"]').val(),
                            "id": deletid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '/proveedor_delete/' + deletid,
                            data: data,
                            success: function (response) {

                                location.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No se puede eliminar a este proveedor',
                                    confirmButtonText: 'Entendido'

                                })
                            }
                        });
                    }
                })
        })
    });

</script>


@endsection
