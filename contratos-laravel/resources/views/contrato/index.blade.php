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
                        <input type="hidden" name="con_id" class="delet_con_id" value="{{$con->ID_contrato}}">
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
                                   >Editar</button>
                            </a>
                        </td>

                        @foreach($estados as $est)
                        @if($est->ID_estado ==$con->ID_estado)
                            
                          @if($est->ID_estado!=2)

                          
                        <td>    
                            <a href="{{url('/agrega/ClausulaContrato/'.$con->ID_contrato)}}">
                                <button type="submit" class="btn btn-block btn-info"
                                   >Clausulas</button>
                            </a>

                        </td>
                        
                        <td>  
                        <form action="{{route('contrato.destroy','test')}}" method="post">
                            {{method_field('delete')}}
                           {{csrf_field()}}
                          <button type="button" class="btn btn-block btn-danger deleteswal">Borrar</button>
                         </form>
                      </td>


                          @endif

                          
                        @endif
                    @endforeach

                        <td>
                            <a href="{{url('descargarPDF/'.$con->ID_contrato)}}" class="btn btn-sm btn-primary">Imprimir PDF</a>

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
