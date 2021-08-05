
<!DOCTYPE html>
<html lang="en">
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 80px 70px;
        }
        

        footer {
            position: fixed; 
            bottom: 0px;
            height: 50px; 

        }
    </style>
<head>
    <meta charset="UTF-8">
    <title>PDF Contrato</title>
</head>
<body>

    
    <p> En 'TEMUCO', a {{$fecha_inicial->day}}, de {{$fecha_inicial->month}}, de {{$fecha_inicial->year}}
        
    </p> 
    <br>
    
    <p>
        REUNIDOS
    </p>

    <!-- Datos cliente-->
    <P>DE UNA PARTE, Alejandra Segura mayor de edad, con RUT numero 11.111.111-1 
        y en nombre y representacion de 'Universidad del Sur', en adelante, el "Cliente", domiciliada en 'Temuco',
        calle 'Pedro G' n° '123', CP '1410000'.
    </P>

    <!-- Datos Proveedor-->
    <P>DE OTRA PARTE, {{$representante[0]->Nombre_re}} mayor de edad, 
        con RUT numero {{$representante[0]->Rut_re}}
        y en nombre y representacion de la mercantil {{$proveedor[0]->Nombre_pro}},
         en adelante, el "PROVEEDOR", 
         domiciliada en {{$ciudad[0]->Nombre_c}},
        calle {{$proveedor[0]->Nombre_domicilio_pro}} 
        n {{$proveedor[0]->Numero_domicilio_pro}}, 
        CP {{$proveedor[0]->Codigo_postal_pro}}.
    </P>

    <!-- Acuerdos-->
    <P>El CLIENTE y el PROVEEDOR, en adelante, podrán ser denominadas, 
        individualmente, “la Parte” y, conjuntamente, “las Partes”, 
        reconociéndose mutuamente capacidad jurídica y de obrar suficiente 
        para la celebración del presente Contrato.
    </P>

    <br>
    <P>
        EXPONEN
    </P> 
    
    <P>
       PRIMERO: Que el CLIENTE está interesado en el arrendamiento de 
       determinados equipos informáticos.
    </P>
    <p>
        El CLIENTE está interesado en contratar dichos servicios para 
       dotar a su empresa de los medios y equipos de hardware necesarios 
       para su funcionamiento.
    </p>
    <p>
        SEGUNDO: Que el PROVEEDOR es una empresa especializada en la 
        prestación de servicios de arrendamiento de equipos y sistemas 
        informáticos, giro: {{$proveedor[0]->Giro_pro}} 
    </p>
    <p>
        TERCERO: Que las Partes están interesadas en celebrar un 
        contrato de arrendamiento de equipos en virtud del cual el 
        PROVEEDOR arriende al CLIENTE los equipos que se relacionan 
        en este contrato.
    </p>
    <p>
        Que las Partes reunidas en la sede social del CLIENTE, 
        acuerdan celebrar el presente contrato de ARRENDAMIENTO DE EQUIPOS, 
        en adelante el “Contrato”, de acuerdo con las siguientes
    </p>

    <br>
    PERFILES:
        <br>
        @foreach($incorporas as $incorpora)
            @foreach($perfiles as $perfil)
                
            
                @if($incorpora->ID_perfil == $perfil->ID_perfil)
                    
                    <br>
                    Nombre perfil: {{$perfil->Nombre_perfil}}
                    <br>
                    Cantidad equipos de perfil:  {{$incorpora->Cantidad}}
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
                
            @endforeach
        
        @endforeach

        <br>
    <p>
        CLÁUSULAS
        @foreach($agregas as $agrega)
            <p>
                {{$agrega->Cambios_a_clausula}}
            </p>

        @endforeach
    </p>
    <br>
<pre>
    _______________________________       ______________________________
             Cliente                              Representante 
    
</pre>
    
</body>


    

</html>