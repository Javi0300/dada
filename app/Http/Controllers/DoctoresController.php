<?php

namespace App\Http\Controllers;

use App\Models\Doctores;
use App\Models\Pacientes;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\Paginator;

class DoctoresController extends Controller
{
    public function historial(Request $request)
    {
        if(session('id_doctor'))
        {
            DB::statement("SET SQL_MODE=''");
            Paginator::useBootstrap();
            
            $hoy = Carbon::now()->addDays(0)->format('Y-m-d');
            $fechaI = $request->get('fechaI');
            $fechaF = $request->get('fechaF');
            if( is_null($fechaI) && is_null($fechaF) )
            {
                $fechaI = $hoy;
                $fechaF = $hoy;
            }
            $slcPaciente = $request->get('slcPaciente');
            $rresultados = DB::table('solicitud AS sol')
            ->select('sol.idSolicitud','sol.id_paciente','sol.Estudios','sol.Fecha AS solicitudFecha','estxsol.id_estudio','estxsol.WordPDF','pacientes.Paciente',)
            ->leftJoin('estxsol', function ($join) {
                $join->on('estxsol.id_solicitud', '=', 'sol.idSolicitud');
            })
            ->join('pacientes', 'pacientes.idPaciente', '=', 'sol.id_paciente')
            ->where('sol.id_Doctor', 'LIKE', session('id_doctor'))
            ->where('sol.id_paciente', 'LIKE', $slcPaciente)
            ->whereDate('sol.Fecha', '>=', $fechaI)
            ->whereDate('sol.Fecha', '<=', $fechaF)
            ->groupBy('sol.idSolicitud')
            ->orderBy('solicitudFecha', 'DESC')
            ->paginate(10);
            $pacientes = Pacientes::select('*')->orderby('Paciente')->get();
            
            return view('doctores.historial')->with([
                'hoy' => $hoy,
                'encabezado' => "",
                'fechaI' => $fechaI,
                'fechaF' => $fechaF,
                'pacientes' => $pacientes,
                'datos_doctor' => Doctores::find(session('id_doctor')),
                'rresultados' => $rresultados,
                'slcPaciente' => $slcPaciente,
                'datos_paciente' => Pacientes::find($slcPaciente)
            ]);
        }
        else
        {
            return redirect('doctor_vista_login');
        }
    }
}
