@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header" style="margin-bottom:8px">
        <h3 class="card-title">Anexo
            <a href="{{url('/anexo/create')}}" class="btn btn-success d-flex ml-auto float-right">Crear anexo</a>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 700px;">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Folio Contrato</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($anexo as $ane)
                    <tr>
                        <input type="hidden" name="ane_id" class="delet_ane_id" value="{{$ane->ID_anexo}}">
                        <td>{{$ane->ID_contrato}}</td>

                        @foreach($estados as $est)
                        @if($est->ID_estado ==$ane->ID_estado)
                        <td>{{$est->Descripcion}}</td>
                        @endif
                        @endforeach

                        @if($ane->ID_estado != 2)

                        <td>
                            <a href="{{url('/anexo/'.$ane->ID_anexo.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning">Editar</button>
                            </a>

                        </td>
                        <td style="font-size: 0px;">

                            <form action="{{route('clausula.destroy','test')}}" method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button type="button" class="btn btn-block btn-danger deleteswal">Borrar</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    
                </tbody>

            </table>




        </div>
    </div>

</div>
@endsection

@section('js')
<script>

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
    $('document').ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.deleteswal').click(function (e) {
            e.preventDefault();
            var deletid = $(this).closest("tr").find('.delet_ane_id').val();
            Swal.fire({
                    title: '¿Estas seguro?',
                    text: "Esto borrara permanentemente la anexo",
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
                            url: '/anexo_delete/' + deletid,
                            data: data,
                            success: function (response) {

                                location.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No se puede eliminar a esta anexo',
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
