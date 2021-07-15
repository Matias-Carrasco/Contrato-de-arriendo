@extends('layouts.sidebar')
@section('content')

<form action="{{url('/perfil')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <section class="content">

    <div class="card card-primary container">
        <div class="card-header">
            <h3 class="card-title">Rellene los datos</h3>
        </div>
        <div class="card-body" style="display: block;">

            <div class="form-group">                
                
            

                <div class="card" id="cartita">
                    <input type="hidden" value="{{$contrato->ID_contrato}}" name="ID_contrato" id="ID_contrato">

                    <label for="ID_categoria">Seleccione Categoria</label>
                    <select name="ID_categoria" id="ID_categoria">
                    <option value="">-- Escoja Categoria --</option>
                        @foreach($categoria as $cat)
                        <option value="{{$cat->ID_categoria}}">{{$cat->Descripcion}}</option>
                        @endforeach
                    </select>

                    <label for="ID_clausula">Seleccione Clausula</label>
                    <select name="ID_clausula" id="ID_clausula">
                    <option value="">-- Escoja Clausula --</option>
                        @foreach($clausula as $clau)
                        <option value="{{$clau->ID_clausula}}">{{$clau->ID_clausula}}</option>
                        @endforeach
                   
                    </select>

                <div id="modificar">
                    <label for="Cambios_a_clausula">Clausula</label>                    
                    <textarea name="Cambios_a_clausula" id="Cambios_a_clausula" rows="10" cols="50">{{$clau->Descripcion}}</textarea>
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
                            <a href="{{url('/agrega')}}" class="btn btn-success float-right" onclick="return confirm('No prodra volver a agregar mas clausulas, ¿Esta seguro?');">Siguiente</a>                            
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
        //Una vez la vista este cargada se activa esta funcion
        $(document).ready(function () {
            //Script para sumar opciones a select de Unidad de Negocio
            $('#ID_categoria').on('change', function () { //al seleccionar una opcion de empresa
                var ID_categoria = $(this).val();
                console.log('entre') // obtengo el valor de la opcion
                if ($.trim(ID_categoria) != '') {
                    console.log('entre2')
                    $.get('ID_clausula', {ID_categoria: ID_categoria}, function (ID_clausula) { // realiza una consulta con el valor
                        console.log('entre3')
                        $('#ID_clausula').empty(); // limpio las opciones del select
                        $('#ID_clausula').append(
                        "<option value=''>-- Escoja Clausula--</option>"); // sumo la opcion por defecto                 
                        for (var x of ID_clausula) { // recorro el resultado de la consulta
                            $('#ID_clausula').append("<option value='" + x.ID_clausula + "'>" + x.ID_clausula + "</option>"); // sumo las opciones al select
                        }
                    }); 
                }
            });

            $('#ID_clausula').on('change', function () {
                var contenido = document.getElementById('Cambios_a_clausula');
                var idclausula = $('#ID_clausula').val();

                contenido.innerText= "";
                for (var x of @json($clausula)) {
                    if(x.ID_clausula == idclausula){
                        contenido.innerText = x.Descripcion;
                    }
                }         
                //updatear cosas
                
            });    
        });
        

    </script>
    @endsection