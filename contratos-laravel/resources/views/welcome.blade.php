@extends('layouts.sidebar')
@section('content')
<div id="content" class="bg-grey w-100">

    <section class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    
                        <h1 class="font-weight-bold mb-0">Bienvenido {{$arrayd->nombre}}</h1>
                   
                   
                    <p class="lead text-muted">Revisa la última información</p>
                </div>
                <div class="col-lg-3 col-md-4 d-flex">
                    <button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-mix py-3">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                        <div class="mx-auto">
                            <h6 class="text-muted">Equipos en arriendo</h6>
                            <h3 class="font-weight-bold">500</h3>
                            <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 83.3%</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                        <div class="mx-auto">
                            <h6 class="text-muted">Equipos activos</h6>
                            <h3 class="font-weight-bold">250</h3>
                            <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 50%</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                        <div class="mx-auto">
                            <h6 class="text-muted">Equipos en mantencion</h6>
                            <h3 class="font-weight-bold">100</h3>
                            <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 25%</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex my-3">
                        <div class="mx-auto">
                            <h6 class="text-muted">Usuarios sin equipo</h6>
                            <h3 class="font-weight-bold">100</h3>
                            <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 16.60%</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <section>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 my-3">
                  <div class="card rounded-0">
                      <div class="card-header bg-light">
                        <h6 class="font-weight-bold mb-0">Número de equipos</h6>
                      </div>
                      <div class="card-body">
                        <canvas id="myChart" width="300" height="150"></canvas>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 my-3">
                <div class="card rounded-0">
                    <div class="card-header bg-light">
                        <h6 class="font-weight-bold mb-0">Solicitudes</h6>
                    </div>
                    <div class="card-body pt-2">
                        <div class="d-flex border-bottom py-2">
                            <div class="d-flex mr-3">
                              <h2 class="align-self-center mb-0"><i class="far fa-bell"></i></h2>
                            </div>
                            <div class="align-self-center">
                              <h6 class="d-inline-block mb-0">1263</h6><span class="badge badge-warning ml-2">equipo descompuesto</span>
                              <small class="d-block text-muted">ver</small>
                            </div>
                        </div>
                        <div class="d-flex border-bottom py-2">
                            <div class="d-flex mr-3">
                              <h2 class="align-self-center mb-0"><i class="far fa-bell"></i></h2>
                            </div>
                            <div class="align-self-center">
                              <h6 class="d-inline-block mb-0">5684</h6><span class="badge badge-success ml-2">Equipo entregado</span>
                              <small class="d-block text-muted">ver</small>
                            </div>
                        </div>
                        
                        
                        <button class="btn btn-primary w-100">Ver todas</button>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>

</div>
@stop