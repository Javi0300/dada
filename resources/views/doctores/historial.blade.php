@extends('adminlte::page')
@section('title', 'Historial por doctor')

@section('content')
@include('header.navbar_log')
    <br>
    <div class="container">
        <button class="btn btn-outline-dark" onclick="history.back()"><i class="fa fa-arrow-alt-circle-left"></i></button>
        <br>
        <h2 class="section-title">Ordenes por Periodo</h2>
        <p><h3 class="section-title">Doctor: {{$datos_doctor->doctor}}</h3></p>
        <br>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card">
                    <form id="TipoBusqueda" action="{{route('historial_doctor')}}">
                        @csrf
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="control-label">Fecha Inicio:</span>
                                            <input id="fechaI" name="fechaI" id="BuscarxFecha" type="date" class="form-control" value="{{$fechaI}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="control-label">Fecha Fin:</span>
                                            <input id="fechaF" name="fechaF" id="BuscarxFechaFin" type="date" class="form-control" value="{{$fechaF}}">     
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="div_FiltrarPaciente" class="container-fluid" hidden>
                                <div class="row">
                                    
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <span class="section-title">Búsqueda por paciente</span><br>
                                            <span>Escriba apellido paterno, apellido materno y nombre(s) del paciente.</span>
                                            <select id="slcPaciente" name="slcPaciente" class="form-control select2-multiple" style="width:100%" disabled>                                                
                                                @foreach($pacientes as $paciente)
                                                    @if(isset($slcPaciente))
                                                        @if($encabezado != $slcPaciente)
                                                        <option value="{{$slcPaciente}}" selected>
                                                            {{$datos_paciente->Paciente}}
                                                        </option>
                                                        @endif
                                                        <label>{{$encabezado = $slcPaciente}}</label>
                                                    @endif
                                                    <option value="{{$paciente->idPaciente}}">
                                                        {{$paciente->Paciente}}
                                                    </option>
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
                                            <button type="submit" class="btn btn-success" id="buscar" style="width:100%">
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
                                                <i class="fa fa-low-vision"></i> Ocultar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="resultados" class="table table-striped table-bordered">
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
                        'fechaI' => $fechaI,
                        'fechaF' => $fechaF,
                        'slcPaciente' => $slcPaciente
                    ])
                    ->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
{{-- <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
 --}}{{-- <link href="{{ asset('css/select2.min.css')}}" rel="stylesheet" /> --}}
@stop

@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script> --}}
<script>
    $(document).ready(function () {
        $('.select2-multiple').select2(
            {
                theme: "classic"
            }
        );
        /* $('#resultados').DataTable({"order": [[ 0, 'desc' ]]});*/
        if ($('#fechaI').val().length == 0 && $('#fechaF').val().length == 0) {
            var fecha = new Date();
            document.getElementById("fechaI").value = fecha.toJSON().slice(0,10);
            document.getElementById("fechaF").value = fecha.toJSON().slice(0,10);
        } 
        @if(isset($slcPaciente))
        $('#btnOculto').prop('hidden', false);
        $('#div_FiltrarPaciente').prop('hidden', false);
        $('#btnFiltrarPaciente').prop('hidden', 'hidden');
        $('#slcPaciente').prop('disabled', false);
        {{--$('#slcPaciente').val({{$slcPaciente}}); --}}
        @endif
    });
</script>
<script>
    function filtrar_por_paciente()
    {
        $('#btnOculto').prop('hidden', false);
        $('#div_FiltrarPaciente').prop('hidden', false);
        $('#btnFiltrarPaciente').prop('hidden', 'hidden');
        $('#slcPaciente').prop('disabled', false);
    }
    function ocultar()
    {
        $('#btnOculto').prop('hidden', 'hidden');
        $('#div_FiltrarPaciente').prop('hidden', 'hidden');
        $('#btnFiltrarPaciente').prop('hidden', false);
        $('#slcPaciente').prop('disabled', 'disabled');
    }
</script>
{{-- <script src="{{ asset('js/select2.min.js')}}"></script> --}}
@stop