@extends('layouts.sidebar')
@section('content')


<div class="container card">
            <div class="card-header">
                <h3 class="card-title">Rellene los datos</h3>
            </div>
            <div class="card-body" style="display: block;">

                <div class="form-group">                           
                                                

                        <form action="{{url('/agrega/EditarClausulaContrato/'.$ID_contrato.'/'.$ID_clausula.'/updateClausulaContrato')}}" method="post" enctype=" multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                       
                        
                        <input type="hidden" value="{{$ID_contrato}}" name="ID_contrato" id="ID_contrato">

                        <input type="hidden" value="{{$ID_clausula}}" name="ID_clausula" id="ID_clausula">

                        <div id="modificar" class="col-lg-12">
                            <label for="Cambios_a_clausula">Clausula</label>
                            <br>
                            <textarea name="Cambios_a_clausula" id="Cambios_a_clausula" rows="10" cols="50" value="{{$agrega}}" class="form-control {{$errors->has('Cambios_a_clausula')?'is-invalid':''}}" ></textarea>
                            {!! $errors->first('Cambios_a_clausula','<div class="invalid-feedback"> :message</div>') !!}
                        </div>
                      

                        <div class="row">
                            <div class="col-12">
                                <br>
                                <input type="submit" value="Agregar Clausula" class="btn-sm btn-primary ">
                            </div>
                        </div>


                </div>

                <div class="row card-footer">
                    <div class="col-12">
                        <a href="{{url('/contrato')}}" class="btn btn-danger float-right"
                            onclick="return confirm('No prodra volver a agregar mas clausulas, ¿Esta seguro?');">Finalizar</a>
                    </div>
                </div>

            </div>

        </div>

    </section>
</form>
@endsection
