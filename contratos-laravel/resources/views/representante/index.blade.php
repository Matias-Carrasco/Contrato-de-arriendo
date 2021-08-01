@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header " style="margin-bottom:8px">
        <h3 class="card-title">Representante

            <a href="{{url('/representante_prov/create')}}"class="btn btn-success d-flex ml-auto float-right">Crear representante</a>
        </h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Organizacion</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($representante as $rep)
                    <tr>
                        <input type="hidden" name="rep_id" class="delet_rep_id" value="{{$rep->ID_representante}}">
                        <td>{{$rep->Nombre_re}}</td>
                        <td>{{$rep->Organizacion_re}}</td>

                        <td>
                            <a href="{{url('/representante_prov/'.$rep->ID_representante.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning">Editar</button>
                            </a>
                        </td>
                        <td style="font-size: 0px;">
                            <form action="{{route('representante_prov.destroy','test')}}" method="post">
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
   
    $('#tabla1').DataTable();
    $('document').ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.deleteswal').click(function (e) {
            e.preventDefault();
            var deletid = $(this).closest("tr").find('.delet_rep_id').val();
            Swal.fire({
                    title: '¿Estas seguro?',
                    text: "Esto borrara permanentemente el representante",
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
                            url: '/representante_prov_delete/' + deletid,
                            data: data,
                            success: function (response) {

                                location.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No se puede eliminar a este representante',
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

