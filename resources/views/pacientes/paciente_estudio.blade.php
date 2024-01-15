@extends('adminlte::page')
@section('title', 'Resultados del Paciente')

@section('content')
@include('header.navbar_log')

    
    <div class="container">
        <br>
        <button class="btn btn-outline-dark" onclick="history.back()"><i class="fa fa-arrow-alt-circle-left"></i></button>
        <h5 class="section-title text-left">Paciente: {{$paciente_datos->Paciente}}</h5>
        <br>
        <h5 class="section-title text-left">Folio:  {{$solicitud_datos->Folio}}, Fecha Toma: {{date('d/m/Y', strtotime($solicitud_datos->Fecha))}}</h5>
        <p>Haga clic en el nombre del estudio para descargar</p>
        <hr>
        <div class="card">
            <div class="card-header">
                @if(session('id_paciente') !== null)
                    <a style="text-decoration:none;color:aliceblue;" href="{{route('historial_paciente')}}" class="float-left btn btn-info" style="width:100%">
                        <i class="far fa fa-plus-square"></i> Ver historial
                    </a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="resultados" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <th scope="col" width="80%">Estudio</th>
                            <th scope="col" width="20%">Certificado</th>
                        </thead>
                        <tbody>                           
                            <tr>
                                <td style="text-align: center;">
                                    <div class="row">                                        
                                        <div class="col-12" >
                                            <button onclick="ver_pdf();"><img src="{{asset('img/download_image.png')}}"></button>                                        
                                            <a id="linkpdf" href="http://{{$url_dinamica}}/api/reporte_resultados_sysweb/{{base64_encode($paciente_datos->idPaciente)}}/{{base64_encode($solicitud_datos->IdSolicitud)}}/{{base64_encode(4)}}" target="_blank">
                                            @foreach ($rresultados as $rresultado)
                                                {{$rresultado->Nombre_Estudios}}@if ($loop->last)@else,@endif
                                            @endforeach
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{route('certificado_paciente', Crypt::encrypt($solicitud_datos->IdSolicitud)) }}" target="_blank">
                                        <img src="{{asset('img/certificado-icon.png')}}">
                                    </a>
                                    <br>
                                    <a href="{{route('certificado_paciente', Crypt::encrypt($solicitud_datos->IdSolicitud)) }}" target="_blank">
                                        Certificado
                                    </a>
                                </td>
                            </tr>
                                
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
<br>
@stop

@section('css')
@stop

@section('js')
<script>
    function ver_pdf()
    {
        document.getElementById('linkpdf').click();
    }
</script>
    
@stop