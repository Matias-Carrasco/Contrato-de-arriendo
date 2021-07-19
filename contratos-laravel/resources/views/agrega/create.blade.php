@extends('layouts.sidebar')
@section('content')


        <div class="card card-primary container">
            <div class="card-header">
                <h3 class="card-title">Rellene los datos</h3>
            </div>
            <div class="card-body" style="display: block;">

                <div class="form-group">
                   

                    <div class="card" id="cartita">
                        

                        <label for="ID_categoria">Seleccione Categoria</label>
                        <select name="ID_categoria" id="ID_categoria">
                            <option value="">-- Escoja Categoria --</option>
                            @foreach($categoria as $cat)
                            <option value="{{$cat->ID_categoria}}">{{$cat->Descripcion}}</option>
                            @endforeach
                        </select>

                        <form action="{{url('/agrega')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <section class="content">
                        
                        <input type="hidden" value="{{$contrato->ID_contrato}}" name="ID_contrato" id="ID_contrato">

                        <label for="ID_clausula">Seleccione Clausula</label>
                        <select name="ID_clausula" id="ID_clausula">
                            <option value="">-- Escoja Clausula --</option>


                        </select>

                        <div id="modificar" class="col-lg-12">
                            <label for="Cambios_a_clausula">Clausula</label>
                            <br>
                            <textarea name="Cambios_a_clausula" id="Cambios_a_clausula" rows="10" cols="50" class="form-control" ></textarea>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <br>
                                <input type="submit" value="Agregar Clausula" class="btn-sm btn-success ">
                            </div>
                        </div>


                    </div>

                </div>

                <div class="row card-footer">
                    <div class="col-12">
                        <a href="{{url('/contrato')}}" class="btn btn-success float-right"
                            onclick="return confirm('No prodra volver a agregar mas clausulas, ¿Esta seguro?');">Siguiente</a>
                    </div>
                </div>

            </div>

        </div>

    </section>
</form>
@endsection

@section('js')
<script>
    console.log("aaaaaa");    
    $(document).ready(function () {   

        $('#ID_categoria').on('change', function () { 
            var ID_categoria = $(this).val();
            console.log('entre') 
            if ($.trim(ID_categoria) != '') {
                console.log('entre2')
                $.get('ID_clausula', {ID_categoria: ID_categoria},function(ID_clausula) { 
                    console.log('entre3')
                    $('#ID_clausula').empty(); 
                    $('#ID_clausula').append("<option value=''>-- Escoja Clausula--</option>");            
                    for (var x of ID_clausula) { 
                        $('#ID_clausula').append("<option value='" + x.ID_clausula + "'>" + x.ID_clausula + "</option>"); 
                    }
                });
            }
        });

        $('#ID_clausula').on('change', function () {
            var contenido = document.getElementById('Cambios_a_clausula');
            var idclausula = $('#ID_clausula').val();

            contenido.innerText = "";
            for (var x of @json($clausula)) {
                if (x.ID_clausula == idclausula) {
                    contenido.innerText = x.Descripcion;
                }
            }
            //updatear cosas

        });
    });

</script>
@endsection
