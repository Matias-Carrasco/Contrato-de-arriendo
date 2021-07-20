@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Anexo</h3>
        <div>
            <a href="{{url('/anexo/create')}}" class="btn btn-success">Crear anexo</a>
        </div>

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



                        <td>
                            <a href="{{url('/anexo/'.$ane->ID_anexo.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning">Editar</button>
                            </a>

                        </td>
                        <td>

                            <form action="{{route('clausula.destroy','test')}}" method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button type="button" class="btn btn-block btn-danger deleteswal">Borrar</button>
                            </form>
                        </td>

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
