<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/certificado_bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/certificado_style.css') }}"/>
        <title>Certificado</title>
    </head>
    <body>
        <div class="card bg-ligth">
            <img src="{{ asset('img/certificate.jpg') }}" class="card-img" alt="...">
            <div class="card-img-overlay">
            <div class="encabezado">
                <h5 class="card-title">CERTIFICADO</h5>
                <h4 class="sub-title">QR VALIDO. ESTE DOCUMENTO CERTIFICA LA AUTENTICIDAD DEL ESTUDIO DE LABORATORIO</h4>
                <p class="folio">Folio: <span id="lblFolio">{{$solicitud_datos->Folio}}</span></p>
                <p class="fecha">Fecha: <span id="lblFecha">{{date('d/m/Y', strtotime($solicitud_datos->Fecha))}}</span></p>
            </div>
            <div class="conteiner">
                <h4 class="sub-title"> <span id="LblPaciente">{{$solicitud_datos->Paciente->Paciente}}</span></h4>
                <p class="card-text" style="text-align: center;">
                    <span>
                        @foreach ($rresultados as $rresultado)
                            {{$rresultado->Nombre_Estudios}}@if ($loop->last)@else,@endif                            
                        @endforeach
                    </span>
                </p>
            </div>
            <div class="footer">
                <p class="key "><span id="lblCodigo64">{{$codigo}}</span></p>
                <p class="terminos">PARA VALIDAR ESTE CERTIFICADO, EL CODIGO ANTERIOR DEBE COINCIDIR EXACTAMENTE CON EL QUE SE ENCUENTRA EN EL RESULTADO PRESENTADO</p>
            </div>
            </div>
        </div>
    </body>
</html>