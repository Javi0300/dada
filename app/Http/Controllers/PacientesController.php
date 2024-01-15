<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelper;
use App\Models\Antibiograma;
use App\Models\Solicitud;
use App\Models\Tomaxest;
use Illuminate\Support\Facades\DB;
use App\Models\Pacientes;
use Illuminate\Support\Facades\Http;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use \Mpdf\Mpdf as PDF;

class PacientesController extends Controller
{
    public function historial(Request $request)
    {
        if(session('id_paciente'))
        {
            DB::statement("SET SQL_MODE=''");
            $hoy = Carbon::now()->addDays(0)->format('Y-m-d');
            $fechaI = $request->get('fechainic');
            $fechaF = $request->get('fechafin');
            if( is_null($fechaI) && is_null($fechaF) )
            {
                $fechaI = $hoy;
                $fechaF = $hoy;
            }
            
            $rresultados = DB::table('solicitud AS sol')
            ->select('sol.idSolicitud','sol.id_paciente','sol.Estudios','sol.Fecha AS solicitudFecha','estxsol.id_estudio','estxsol.WordPDF')
            ->leftJoin('estxsol', function ($join) {
                $join->on('estxsol.id_solicitud', '=', 'sol.idSolicitud');
            })
            ->join('pacientes', 'pacientes.idPaciente', '=', 'sol.id_paciente')
            ->where('sol.id_paciente', 'LIKE', session('id_paciente'))
            ->whereDate('sol.Fecha', '>=', $fechaI)
            ->whereDate('sol.Fecha', '<=', $fechaF)
            ->groupBy('sol.idSolicitud')
            ->orderBy('solicitudFecha', 'DESC')
            ->get();
            return view('pacientes.historial')->with([
                'hoy' => $hoy,
                'fecha_inicial' => $fechaI,
                'fecha_final' => $fechaF,
                'paciente_datos' => Pacientes::find(session('id_paciente')),
                'rresultados' => $rresultados
                //'Solicitud_Datos' => $Solicitud_Datos
                
            ]);
        }
        else
        {
            return redirect('paciente_vista_login');
        }
    }
    public function paciente($idSolicitud)
    {
        if(session('id_doctor') != null || session('id_empresa') != null || session('id_paciente') != null)
        {
            $idSolicitud = Crypt::decrypt($idSolicitud);
            $solicitud_datos = Solicitud::find($idSolicitud);
            DB::statement("SET SQL_MODE=''");
            $encabezado = "";
            $rresultados = DB::select('SELECT estxsol.id_solicitud,estudios.Nombre as Nombre_Estudios
                FROM estxsol
                INNER JOIN estudios ON estxsol.id_estudio = estudios.idEstudio
                WHERE estxsol.id_solicitud = ?', [$solicitud_datos->IdSolicitud]);
            return view('pacientes.paciente_estudio')->with([
                'encabezado' => $encabezado,
                'solicitud_datos' => $solicitud_datos,
                'paciente_datos' => Pacientes::find($solicitud_datos->id_paciente),
                'rresultados' => $rresultados
            ]);
        }
        else
        {
            return redirect('paciente_vista_login');
        }
    }

    public function certificado_paciente($idSolicitud)
    {
        if(session('id_doctor') != null || session('id_empresa') != null || session('id_paciente') != null)
        {
            $encabezado = "";
            $idSolicitud = Crypt::decrypt($idSolicitud);
            $solicitud_datos = Solicitud::find($idSolicitud);
            $codigo = substr(base64_encode($solicitud_datos->Folio.$solicitud_datos->Fecha.$solicitud_datos->Paciente->Paciente), -40);
            $rresultados = DB::select('SELECT estudios.Nombre as Nombre_Estudios
                FROM estxsol
                INNER JOIN estudios ON estxsol.id_estudio = estudios.idEstudio
                WHERE estxsol.id_solicitud = ?', [$solicitud_datos->IdSolicitud]);
            return view('pacientes.certificado', compact('encabezado','codigo','solicitud_datos','rresultados'));
        }
        else
        {
            return redirect('paciente_vista_login');
        }        
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function reportePDF()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $response  = Http::get($url.'/reporte_resultados_sysweb/7405/934');
        $data = $response->json();
        dd($data);
    }
}
