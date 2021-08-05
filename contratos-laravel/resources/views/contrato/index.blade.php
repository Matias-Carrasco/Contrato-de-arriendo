@extends('layouts.sidebar')
@section('content')
<div class="card">
    <div class="card-header " style="margin-bottom:8px">
        <h3 class="card-title">Contrato
            <a href="{{url('/contrato/create')}}" class="btn btn-success d-flex ml-auto float-right">Crear contrato</a>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 700px;">
            <table class="table table-head-fixed text-nowrap" id="tabla1">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Representante</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        <th>Fecha inicio</th>
                        <th>Fecha termino</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                  
                    


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

                        <td>{{$con->Fecha_inicial}}</td>
                        <td>{{$con->Fecha_termino}}</td>

                        <td>
                            <a href="{{url('descargarPDF/'.$con->ID_contrato)}}"
                                class="btn btn-block btn-primary">Imprimir PDF</a>

                        </td>


                            </td>

                            <td>
                                
                                <a href="{{url('subirPDF/'.$con->ID_contrato)}}" class="btn btn-block btn-primary">Subir PDF firmado</a>
                                
                                </td>
                            
                            <td>
                                @if($con->PDF_firmado!=null)
                                    <a href="{{ url('/contrato/'.$con->ID_contrato.'/download') }}">
                                        <button type="submit" class="btn btn-success" >Imprimir PDF FIRMADO</button>
                                    </a>
                                @endif
                                
                            </td>
                                
                        
                        
                        <td>
                            <a href="{{url('/contrato/'.$con->ID_contrato.'/edit')}}">
                                <button type="submit" class="btn btn-block btn-warning">Editar</button>
                            </a>
                        </td>

                        @foreach($estados as $est)
                        @if($est->ID_estado ==$con->ID_estado)

                        @if($est->ID_estado!=2)


                        <td>
                            <a href="{{url('/agrega/ClausulaContrato/'.$con->ID_contrato)}}">
                                <button type="submit" class="btn btn-block btn-info">Clausulas</button>
                            </a>

                        </td>

                        <td style="font-size: 0px;">

                            <form action="{{route('contrato.destroy','test')}}" method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button type="button" class="btn btn-block btn-danger deleteswal">Borrar</button>
                            </form>
                        </td>


                        
                        @else

                        <td>

                        </td>
                        <td>

                        </td>
                        @endif


                        @endif
                        @endforeach



                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Folio</th>
                        <th>Representante</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        <th>Fecha inicio</th>
                        <th>Fecha termino</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                 
    
    
                    </tr>
                </tfoot>

            </table>


            

        </div>
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
            }
        });



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
