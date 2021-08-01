@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Clausulas del Contrato Folio {{$ID_contrato}}</h3>        
    </div>
  
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 700px;">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Clausula</th>
                        <th></th>
                        <th></th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($agrega as $ag)
                    <tr>
                        <input type="hidden" name="con_id" class="delet_con_id" value="{{$ag->ID_clausula}}">
                        @foreach ($clausula as $clau)
                            @if ($clau->ID_clausula == $ag->ID_clausula)
                                @foreach ($categoria as $cat)
                                    @if ($cat->ID_categoria == $clau->ID_categoria)
                                        <td>{{$cat->Descripcion}} {{$ag->ID_clausula}}</td>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach                      
                                              

                        <td>
                            <a href="{{url('/agrega/EditarClausulaContrato/'.$ID_contrato.'/'.$ag->ID_clausula)}}">
                                <button type="submit" class="btn btn-block btn-warning"
                                   >Editar</button>
                            </a>                            

                        </td>
                        <td style="font-size: 0px;">                           
                              
                            <a href="{{url('/agrega/EliminarClausulaContrato/'.$ID_contrato.'/'.$ag->ID_clausula)}}">
                                <button type="submit" class="btn btn-block btn-danger "
                                   >Eliminar</button>
                            </a>  
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
            var deletid = $(this).closest("tr").find('.delet_con_id').val();
            Swal.fire({
                    title: '¿Estas seguro?',
                    text: "Esto borrara permanentemente este contrato",
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
                            url: '/contrato_delete/' + deletid,
                            data: data,
                            success: function (response) {

                                location.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No se puede eliminar a este contrato',
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
