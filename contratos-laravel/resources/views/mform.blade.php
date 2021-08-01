@extends('layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Contrato</h3>W
        
         <form action="/guardar" method="post" enctype="multipart/form-data"> 
            @csrf
            <input type="file" name="urlpdf">
            <input type="submit" value="subir">
         </form>
         
         subir imagen
         <form action="">
             <input type="file" name="file" id="">
         </form>
         <img width='100' src="/storage/agfu1kY8du2uvSbsESSuEBnMOulSgXyIgFhq8Iq1.png">
        
    </div>
    
    
</div>

@endsection
