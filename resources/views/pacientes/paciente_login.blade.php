@extends('adminlte::page')
@section('title', 'Iniciar como Paciente')

@section('content')
@include('header.navbar')
<div class="content">
    <div class="container">
        <br>
        @if($message = Session::get("error"))
        <div style="text-align:left" class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
        @endif
        <div class="row row-cols-1 row-cols-md-3">
            <!-- Start Column 1 -->
            <div class="col-md-4"></div>
            <!-- Start Column 2 -->
            <div class="col-md-4" style="text-align:center">
                <button class="btn btn-outline-dark" style="text-align:center" onclick="history.back()"><i class="fa fa-arrow-alt-circle-left"></i></button>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="section-title text-center">Iniciar sesión como paciente</h4>
                    </div>
                    <form method="POST" action="{{ route('paciente_log') }}">
                        @csrf
                        <div class="card-body text-center">                            
                            <div>
                                <label>Folio</label>
                                <br>
                                <input id="folio" name="folio" class="block mt-1 form-control" type="text" required placeholder="Folio" autofocus maxlength="100" required/>
                            </div>
                            <div class="mt-4">
                                <label>Contraseña</label>
                                <br>
                                <input id="contra" name="contra" class="block mt-1 form-control" type="password" required placeholder="Contraseña" maxlength="6" required width="100%"/>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="flex items-center justify-end mt-4">
                                <button class="ml-4 btn btn-primary">
                                    Iniciar sesión
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Start Column 3 -->
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
@endsection