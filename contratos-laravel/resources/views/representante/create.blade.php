@extends('layouts.sidebar')
@section('content')


<div class="container card">
    <div class="card-header">
        <h3 class="card-title">Rellene los datos</h3>
    </div>
    <div class="card-body" style="display: block;">

        <label for="ID_region">{{'Region usuario'}}</label>
        <select name="ID_region" id="ID_region"
            class="form-control custom-select {{$errors->has('ID_region')?'is-invalid':''}}">
            <option value="">-- Escoja Region--</option>
            @foreach ($regiones as $region)
            <option value="{{$region->ID_region}}"> {{$region->Nombre_r}} </option>
            @endforeach
        </select>
        {!! $errors->first('ID_region','<div class="invalid-feedback"> :message</div>') !!}

        <form  action="{{url('/representante_prov')}}" method="post" id='basico' enctype="multipart/form-data">
            {{csrf_field()}}
            <section class="content">

                <div class="form-group">
                    <label for="ID_ciudad">{{'Ciudad usuario'}}</label>
                    <select name="ID_ciudad" id="ID_ciudad"
                        class="form-control custom-select {{$errors->has('ID_ciudad')?'is-invalid':''}}">
                        <option value="">-- Escoja ciudad--</option>

                    </select>
                    {!! $errors->first('ID_ciudad','<div class="invalid-feedback"> :message</div>') !!}

                </div>
                <div class="form-group">
                    <label for="Rut_re">{{'Rut'}}</label>
                    <p style="color:#5a5a5ae7" ;>Ej: 12345678-9</p>
                    <input type="text" name="Rut_re" id="rut"
                        value="{{isset($representante_prov->Rut_re)?$representate_prov->Rut_re:old('Rut_re')}}"
                        class="form-control {{$errors->has('Rut_re')?'is-invalid':''}}">
                    {!! $errors->first('Rut_re','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Nombre_re">{{'Nombre Completo'}}</label>
                    <input type="text" name="Nombre_re" id="Nombre_re"
                        value="{{isset($representante_prov->Nombre_re)?$representante_prov->Nombre_re:old('Nombre_re')}}"
                        class="form-control {{$errors->has('Nombre_re')?'is-invalid':''}}">
                    {!! $errors->first('Nombre_re','<div class="invalid-feedback"> :message</div>') !!}
                </div>



                <div class="form-group">
                    <label for="Nombre_organizacion">{{'Nombre organizacion'}}</label>
                    <input type="text" name="Organizacion_re" id="Organizacion_re"
                        value="{{isset($representante_prov->Organizacion_re)?$representante_prov->Organizacion_re:old('Organizacion_re')}}"
                        class="form-control {{$errors->has('Organizacion_re')?'is-invalid':''}}">
                    {!! $errors->first('Organizacion_re','<div class="invalid-feedback"> :message</div>') !!}

                </div>

                <div class="form-group">
                    <label for="Nombre_domicilio_re">{{'Domicilio'}}</label>
                    <input type="text" name="Nombre_domicilio_re" id="Nombre_domicilio_re"
                        value="{{isset($representante_prov->Nombre_domicilio_re)?$representante_prov->Nombre_domicilio_re:old('Nombre_domicilio_re')}}"
                        class="form-control {{$errors->has('Nombre_domicilio_re')?'is-invalid':''}}">
                    {!! $errors->first('Nombre_domicilio_re','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Numero_domicilio_re:">{{'Número domicilio'}}</label>
                    <input type="text" name="Numero_domicilio_re" id="Numero_domicilio_re"
                        value="{{isset($representante_prov->Numero_domicilio_re)?$representante_prov->Numero_domicilio_re:old('Numero_domicilio_re')}}"
                        class="form-control {{$errors->has('Numero_domicilio_re')?'is-invalid':''}}">
                    {!! $errors->first('Numero_domicilio_re','<div class="invalid-feedback"> :message</div>') !!}
                </div>

                <div class="form-group">
                    <label for="Codigo_postal_re">{{'Codigo postal '}}</label>
                    <input type="text" name="Codigo_postal_re" id="Codigo_postal_re"
                        value="{{isset($representante_prov->Codigo_postal_re)?$representante_prov->Codigo_postal_re:old('Codigo_postal_re')}}"
                        class="form-control {{$errors->has('Codigo_postal_re')?'is-invalid':''}}">
                    {!! $errors->first('Codigo_postal_re','<div class="invalid-feedback"> :message</div>') !!}
                </div>


    </div>
    <div class="row">
        <div class="col-12" style="margin-bottom:10px">
            <a href="{{url('/representante_prov')}}" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Agregar" class="btn btn-success float-right">
        </div>
    </div>
</div>


</section>
</form>



@endsection

@section('footer')

@endsection

@section('js')

<script>
    
    //Una vez la vista este cargada se activa esta funcion
    

    $(function(){
       
        $("input#rut").rut({useThousandsSeparator : false,formatOn: 'keyup'}).on('rutInvalido', function(e) {
            alert("El rut " + $(this).val() + " es inválido");
        });
       
    });
    $(document).ready(function () {
        //Script para sumar opciones a select de Unidad de Negocio

        $('#ID_region').on('change', function () { //al seleccionar una opcion de empresa
            var ID_region = $(this).val();
            console.log('entre') // obtengo el valor de la opcion
            if ($.trim(ID_region) != '') {
                console.log('entre2')
                $.get('ID_ciudad', {
                    ID_region: ID_region
                }, function (ID_ciudad) { // realiza una consulta con el valor
                    console.log('entre3')
                    $('#ID_ciudad').empty(); // limpio las opciones del select
                    $('#ID_ciudad').append(
                        "<option value=''>-- Escoja Ciudad--</option>"
                    ); // sumo la opcion por defecto                 
                    for (var x of ID_ciudad) { // recorro el resultado de la consulta
                        $('#ID_ciudad').append("<option value='" + x.ID_ciudad + "'>" + x
                            .Nombre_c + "</option>"); // sumo las opciones al select
                    }
                }); // Los siguientes Scripts poseen la misma estructura 
            }
        });


    });
    

    

</script>
@endsection
