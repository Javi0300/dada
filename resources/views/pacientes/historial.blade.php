@extends('adminlte::page')
@section('title', 'Historial del Paciente')

@section('content')
    @include('header.navbar_log')
    <br>
    <div class="container">
        <button class="btn btn-outline-dark" onclick="history.back()"><i class="fa fa-arrow-alt-circle-left"></i></button>
        <br>
        <h2 class="section-title">Historial de Resultados por Periodo</h2>
        <p><h3 class="section-title">Paciente: {{$paciente_datos->Paciente}}</h3></p>
        <br>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card">
                    <form id="TipoBusqueda" action="{{route('historial_paciente')}}">
                        @csrf
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Fecha Inicio:</label>
                                            <input id="fechainic" name="fechainic" id="BuscarxFecha" type="date" class="form-control" value="{{$fecha_inicial}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Fecha Fin:</label>
                                            <input id="fechafin" name="fechafin" id="BuscarxFechaFin" type="date" class="form-control" value="{{$fecha_final}}">     
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" id="buscar">
                                <i class="fa fa-search"></i> Buscar
                            </button>
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
                            <th scope="col" width="70%">Estudios</th>
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
                                        {{$rresultado->Estudios}}
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script>
    $(document).ready(function () {
        $('#resultados').DataTable({"order": [[ 0, 'desc' ]]});
        if ($('#fechainic').val().length == 0 && $('#fechafin').val().length == 0) {
            var fecha = new Date();
            document.getElementById("fechainic").value = fecha.toJSON().slice(0,10);
            document.getElementById("fechafin").value = fecha.toJSON().slice(0,10);
        }
    });
</script>
    
@stop