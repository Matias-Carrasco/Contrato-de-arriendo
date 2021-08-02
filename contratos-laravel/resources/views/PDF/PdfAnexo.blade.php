<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRUEBA DE LIBRERIA</title>
</head>
<body>
    Anexo del contrato {{$anexo[0]->ID_contrato}}
    <br>
    Anexo en estado  {{$anexo[0]->ID_estado}}

    <p>
        PERFILES
        <br>
        @foreach($incorporas as $incorpora)
            @foreach($perfiles as $perfil)
                
            
                @if($incorpora->ID_perfil == $perfil->ID_perfil)
                    Cantidad:  {{$incorpora->Cantidad}}
                    <br>
                    Nombre perfil: {{$perfil->Nombre_perfil}}
                    <br>
                    Procesador: {{$perfil->Tipo_procesador}}
                    <br>
                    RAM: {{$perfil->Ram}}
                    <br>
                    Lector de dvd: {{$perfil->Lector_dvd}}
                    <br>
                    Tarjeta de sonido: {{$perfil->Tarjeta_sonido}}
                    <br>
                    Tarjeta de video: {{$perfil->Tarjeta_video}}
                    <br>
                    Tarjeta de red: {{$perfil->Tarjeta_red}}
                    <br>
                    Teclado: {{$perfil->Teclado}}
                    <br>
                    Gabinete: {{$perfil->Gabinete}}
                    <br>
                    Mouse: {{$perfil->Mouse}}
                    <br>
                    Fuente de poder: {{$perfil->Fuente_de_poder}}
                    <br>
                    SSD: {{$perfil->SSD}}
                    <br>
                    Bajo impacto acustico: {{$perfil->Bajo_impacto_acustico}}
                    <br>
                    Valor perfil: {{$perfil->Valor_perfil}}
                    <br>
                @endif
                {{$incorpora->Cambios_a_clausula}}
            
    
            @endforeach
        
        @endforeach
    </p>


</body>
</html>