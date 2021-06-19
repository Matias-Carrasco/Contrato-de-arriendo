<!-- head -->
@include('includes.head')
<!-- fin head -->


<body>
    <div class="d-flex" id="content-wrapper">
        <!-- sideBar -->
        @include('includes.sidebar')
        <!-- fin sideBar -->

        <div class="w-100">

            <!-- Navbar -->
            @include('includes.header')
            <!-- Fin Navbar -->

            <!-- Page Content -->

            @yield('content')

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
        
           
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
            integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script>
    
    
            console.log("aaaaaa");
            //Una vez la vista este cargada se activa esta funcion
            $(document).ready(function(){
                //Script para sumar opciones a select de Unidad de Negocio
                $('#ID_region').on('change',function(){                                                                    //al seleccionar una opcion de empresa
                    var region_id = $(this).val();  
                    console.log('entre')                                                                    // obtengo el valor de la opcion
                    if ($.trim(region_id) != ''){               
                        $.get('ciudadP',{region_id: region_id},function(ciudadP){                                      // realiza una consulta con el valor
                            $('#ID_ciudad').empty();                                                                       // limpio las opciones del select
                            $('#ID_ciudad').append("<option value=''>-- xd --</option>");                               // sumo la opcion por defecto                 
                            for(var x of ciudadP){                                                                       // recorro el resultado de la consulta
                                $('#ID_ciudad').append("<option value='"+ x.ID_ciudad +"'>"+ x.Nombre_c +"</option>"); // sumo las opciones al select
                            }                                                                                            
                        });                                                                                              // Los siguientes Scripts poseen la misma estructura 
                    }
                });       
               
            });
        
        </script>
</body>

</html>

