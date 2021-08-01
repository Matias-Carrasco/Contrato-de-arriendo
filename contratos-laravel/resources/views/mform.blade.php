@extends('layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-header">
        
        <h1>
            Subir imagen
             </h1>
         <form action="{{route('subir')}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <input type="file" name="urlpdf">
            <input type="text" name="ID_contrato" id="ID_contrato"
            value="{{isset($contrato[0]->ID_contrato)?$contrato[0]->ID_contrato:old('ID_contrato')}}"
                                class="form-control {{$errors->has('ID_contrato')?'is-invalid':''}}">
            <button type="submit">Subir PDF</button>
         </form>
         
         
        
    </div>
    
    
</div>

@endsection
