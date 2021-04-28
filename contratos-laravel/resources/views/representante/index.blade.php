<!-- head -->
<?php include('../plantilla/partes/head.php') ?>
<!-- fin head -->


<body>
    <div class="d-flex" id="content-wrapper">
        <!-- sideBar -->
        <?php include('../plantilla/partes/sidebar.php') ?>
        <!-- fin sideBar -->

        <div class="w-100">

            <!-- Navbar -->
            <?php include('../plantilla/partes/nav.php') ?>
            <!-- Fin Navbar -->

            <!-- Page Content -->

            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Representante</h3>
                    

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 700px;">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 700px;">
                        <table class="table table-head-fixed text-nowrap" id="tabla1">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Organizacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($representante as $representantes)
                                <tr>
                                    <td>{{$representantes->Nombre_re}}</td>
                                    <td>{{$representantes->Organizacion_re}}</td>
                                    <td>
                                       
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-block btn-warning" name="btn" value="Editar" id="submitBtn"
                                        data-toggle="modal" data-target="#edit-modal" class="btn btn-default" />
            
                                    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">¿Editar?</h5>
                                                </div>
            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancelar</button>
            
                                                    <a href="{{url('/propietarios/'.$representantes->ID_representante.'/edit')}}">
                                                        <button type="submit" class="btn btn-primary">Aceptar</button>
            
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-block btn-danger" name="btn" value="Eliminar" id="submitBtn"
                                        data-toggle="modal" data-target="#delete-modal" class="btn btn-default" />
                                    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">¿Borrar?</h5>
                                                </div>
            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <form method="post" action="{{url('/propietarios/'.$representantes->ID_representante)}}">
                                                        {{csrf_field() }}
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
            
                            </tr>
                                 @endforeach
                




                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
            integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                    datasets: [{
                        label: 'Nuevos equipos',
                        data: [50, 100, 150, 200],
                        backgroundColor: [
                            '#12C9E5',
                            '#12C9E5',
                            '#12C9E5',
                            '#111B54'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        </script>
</body>

</html>
