@extends('adminlte::page')
@section('title', 'Publicación de Resultados por Internet')
@section('content')
<!-- Spinner Start -->
{{-- <div id="spinner"
class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
<div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
</div> --}}
<!-- Spinner End -->
<style type="text/css">
    .card-img-top {
        height: 275px;
        object-fit: cover;
    }
    .card-img {
        display: block;
        height: 40px;
        object-fit: contain;
    }
</style>
@include('header.navbar')

<br>
<div class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="media">
                    
                    <div class="media-body">
                        <h1 class="section-title text-center"></h1>
                    </div>
                </div>
                <!-- <a href="/" class="back-button big page-back"></a>-->
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12 mx-auto text-left">

                    <h2 class="section-title">Iniciar sesión</h2>
                    <p>Elija el perfil que le corresponde, haga clic sobre la imagen.</p>
                </div>
            </div>
        </div>
    
        <div class="row row-cols-1 row-cols-md-3">
            <!-- Start Column 1 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <span style="color: white">Médico</span>
                    </div>
                    <a href="doctor_vista_login"><img src="img/14.jpg" class="card-img-top" alt=""></a>
                    <div class="card-body text-center">
                        <a href="doctor_vista_login" class="btn btn-primary">Iniciar sesión como médico</a>
                    </div>
                </div>
            </div>
            <!-- Start Column 2 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success">
                        <span style="color: white">Paciente</span>
                    </div>
                    <a href="paciente_vista_login"><img src="img/patient-portal3.jpg" class="card-img-top" alt=""></a>
                    <div class="card-body text-center">
                        <a href="paciente_vista_login" class="btn btn-success">Iniciar sesión como paciente</a>
                    </div>
                </div>
            </div>
            <!-- Start Column 3 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <span style="color: white">Empresa</span>
                    </div>
                    <a href="empresa_vista_login"><img src="img/bussines.jpg" class="card-img-top" alt=""></a>
                    <div class="card-body text-center">
                        <a href="empresa_vista_login" class="btn btn-primary">Iniciar sesión como empresa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('../../../lib/wow/wow.min.js')}}"></script>
<script src="{{asset('../../../lib/easing/easing.min.js')}}"></script>
<script src="{{asset('../../../lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('../../../lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('../../../lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('../../../js/main.js')}}"></script>
@stop
