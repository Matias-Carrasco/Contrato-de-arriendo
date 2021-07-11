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
                <label for="ID_contrato">{{'Contrato'}}</label>
                <input type="text" value="{{$contrato->ID_contrato}}" id="ID_contrato" disabled="true">
            </div>

            <div class="card" id="cartita">

                

            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="agregarP()">Agregar Perfil</button>
            </div>
            <div class="row card-footer">
                <div class="col-12">
                    <a href="{{url('/contrato')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Siguiente" class="btn btn-success float-right">
                </div>
            </div>
        </div>

    </div>

</section>
</form>
@endsection

    @section('js')
    <script>
        var contador = 0;

        function agregarP() {
            contador = contador + 1;
            console.log(contador);
            
            const divisor = document.createElement("div");
            divisor.className = "card";

            const contrato = document.createElement("input");
            contrato.type = "hidden";
            const contesp = @json($contrato);
            contrato.value = contesp.ID_contrato;
            contrato.id = "ID_contrato"; 
            divisor.append(contrato); 

            const lab = document.createElement("label");
            lab.innerHTML = "Seleccione Perfil";
            divisor.append(lab);

            const salto = document.createElement("br");
            divisor.append(salto);

            const sel = document.createElement("select");
            sel.name = "ID_perfil[]";
            sel.id = "ID_perfil";
            divisor.append(sel);

            const opt = document.createElement('option');
            opt.text = "-- Escoja Perfil --";
            sel.append(opt);
            for (var x of @json($Perfiles)) {
                var optvar = document.createElement('option');
                optvar.value = x.ID_perfil;
                optvar.text = x.Nombre_perfil;
                sel.append(optvar);
            }

            divisor.append(salto);

            const lab2 = document.createElement("label");
            lab2.innerHTML = "Cantidad";
            divisor.append(lab2);
            divisor.append(salto);

            const inp = document.createElement("input");
            inp.type = "number";
            inp.name= "Cantidad[]"
            inp.value = "Cantidad";
            inp.id = "Cantidad";
            divisor.append(inp);
            

            document.getElementById('cartita').append(divisor);
        }

    </script>
    @endsection
