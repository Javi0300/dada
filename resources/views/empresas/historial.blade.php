@extends('adminlte::page')
@section('title', 'Historial por empresa')

@section('content')
    @include('header.navbar_log')
    <br>
    <div class="container">
        <button class="btn btn-outline-dark" onclick="history.back()"><i class="fa fa-arrow-alt-circle-left"></i></button>
        <br>
        <h2 class="section-title">Ordenes por Periodo</h2>
        <p><h3 class="section-title">Empresa: {{$empresa_datos->Nombre}}</h3></p>
        <br>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card">
                    <form id="TipoBusqueda" action="{{route('historial_empresa')}}">
                        @csrf
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Fecha Inicio:</label>
                                            <input id="fechainic" name="fechainic" id="BuscarxFecha" type="date" class="form-control" value="{{$fechainic}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Fecha Fin:</label>
                                            <input id="fechafin" name="fechafin" id="BuscarxFechaFin" type="date" class="form-control" value="{{$fechafin}}">     
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="div_FiltrarPaciente" class="container-fluid" hidden>
                                <div class="row">
                                    
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="section-title">Búsqueda por paciente</label><br>
                                            <label>Escriba apellido paterno, apellido materno y nombre(s) del paciente.</label>
                                            <select id="slcpaciente" name="slcpaciente" class="select2-multiple" style="width:100%;" disabled>
                                                @foreach($pacientes as $paciente)
                                                    @if(isset($slcpaciente))
                                                        @if($encabezado != $slcpaciente)
                                                        <option value="{{$slcpaciente}}" selected>
                                                            {{$datos_paciente->Paciente}}
                                                        </option>
                                                        @endif
                                                        <label>{{$encabezado = $slcpaciente}}</label>
                                                    @endif
                                                    <option value="{{$paciente->idPaciente}}">{{$paciente->Paciente}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button id="buscar" type="submit" class="btn btn-success" style="width:100%">
                                                <i class="fa fa-search"></i> Buscar
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button id="btnFiltrarPaciente" type="button" class="btn btn-success" onclick="filtrar_por_paciente();" style="width:100%">
                                                <i class="fa fa-hand-pointer"></i> Click para filtrar por paciente
                                            </button>
                                            <button id="btnOculto" type="button" class="btn btn-success" hidden onclick="ocultar();" style="width:100%">
                                                <i class="fa fa-low-vision"></i> Ocultar filtro
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="resultados" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <th scope="col" width="15%">Acción</th>
                            <th scope="col" width="15%">Fecha</th>
                            <th scope="col" width="50%">Paciente</th>
                            <th scope="col" width="20%">Estudios</th>
                        </thead>
                        <tbody>
                            @if(isset($rresultados))
                                @foreach ($rresultados as $rresultado)
                                <tr>
                                    <td>
                                        <a title="Ver estudios" href="{{route('paciente', [ 'idSolicitud' => Crypt::encrypt($rresultado->idSolicitud)])}}" class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {{date('d/m/Y', strtotime($rresultado->solicitudFecha))}}
                                    </td>
                                    <td>
                                        {{$rresultado->Paciente}}
                                    </td>
                                    <td>
                                        {{$rresultado->Estudios}}
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$rresultados
                        ->appends([
                            'fechainic' => $fechainic,
                            'fechafin' => $fechafin,
                            'slcpaciente' => $slcpaciente
                        ])
                        ->links()}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
{{-- <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ asset('css/select2.min.css')}}" rel="stylesheet" /> --}}
@stop

@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="{{ asset('js/select2.min.js')}}"></script> --}}
<script>
    $(document).ready(function () {
        $('.select2-multiple').select2(
            {
                theme: "classic"
            }
        );
        if ($('#fechainic').val().length == 0 && $('#fechafin').val().length == 0) {
            var fecha = new Date();
            document.getElementById("fechainic").value = fecha.toJSON().slice(0,10);
            document.getElementById("fechafin").value = fecha.toJSON().slice(0,10);
        }
        @if(isset($slcpaciente))
        $('#btnOculto').prop('hidden', false);
        $('#div_FiltrarPaciente').prop('hidden', false);
        $('#btnFiltrarPaciente').prop('hidden', 'hidden');
        $('#slcpaciente').prop('disabled', false);
        @endif
    });
</script>
<script>
    function filtrar_por_paciente()
    {
        $('#btnOculto').prop('hidden', false);
        $('#div_FiltrarPaciente').prop('hidden', false);
        $('#btnFiltrarPaciente').prop('hidden', 'hidden');
        $('#slcpaciente').prop('disabled', false);
    }
    function ocultar()
    {
        $('#btnOculto').prop('hidden', 'hidden');
        $('#div_FiltrarPaciente').prop('hidden', 'hidden');
        $('#btnFiltrarPaciente').prop('hidden', false);
        $('#slcpaciente').prop('disabled', 'disabled');
    }
</script>
@stop
