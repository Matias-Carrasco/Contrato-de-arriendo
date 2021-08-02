@extends('layouts.sidebar')
@section('content')

<div class="card">
    <div class="container card">
        
        <h1>
            Subir PDF de contrato firmado
             </h1>

             <div class="d-flex justify-content-center py-3">
                <form action="{{route('subir')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <input type="file" name="urlpdf" accept="">
        
                    <input type="hidden" name="ID_contrato" id="ID_contrato"
                    value="{{isset($contrato[0]->ID_contrato)?$contrato[0]->ID_contrato:old('ID_contrato')}}"
                                        class="form-control {{$errors->has('ID_contrato')?'is-invalid':''}}">
        
                    <button type="submit">Subir PDF</button>
                 </form>
             </div>
             <div class="col-12">
                <a href="{{url('/contrato')}}" class="btn btn-secondary">Cancel</a>
            </div>
         
         
        
    </div>
    
    
</div>

@endsection
