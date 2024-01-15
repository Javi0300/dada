<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Pacientes;

use App\Helpers\AppHelper;
use App\Models\Solicitud;
use App\Models\Tomaxest;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Http;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use \Mpdf\Mpdf as PDF;

class EmpresasController extends Controller
{
    public function historial(Request $request)
    {
        if(session('id_empresa'))
        {
            DB::statement("SET SQL_MODE=''");
            Paginator::useBootstrap();
            $hoy = Carbon::now()->addDays(0)->format('Y-m-d');
            $fechainic = $request->get('fechainic');
            $fechafin = $request->get('fechafin');
            if( is_null($fechainic) && is_null($fechafin) )
            {
                $fechainic = $hoy;
                $fechafin = $hoy;
            }
            $slcpaciente = $request->get('slcpaciente');
            $rresultados = DB::table('solicitud AS sol')
            ->select('sol.idSolicitud','sol.id_paciente','sol.Estudios','sol.Fecha AS solicitudFecha','estxsol.id_estudio','estxsol.WordPDF','pacientes.Paciente',)
            ->leftJoin('estxsol', function ($join) {
                $join->on('estxsol.id_solicitud', '=', 'sol.idSolicitud');
            })
            ->join('pacientes', 'pacientes.idPaciente', '=', 'sol.id_paciente')
            ->where('sol.id_paciente', 'LIKE', $slcpaciente)
            ->where('sol.id_Empresa', 'LIKE', session('id_empresa'))
            ->whereDate('sol.Fecha', '>=', $fechainic)
            ->whereDate('sol.Fecha', '<=', $fechafin)
            ->groupBy('sol.idSolicitud')
            ->orderBy('solicitudFecha', 'DESC')
            ->paginate(10);
            $pacientes = Pacientes::select('*')->orderby('Paciente')->get();
            return view('empresas.historial')->with([
                'hoy' => $hoy,
                'encabezado' => "",
                'fechainic' => $fechainic,
                'fechafin' => $fechafin,
                'pacientes' => $pacientes,
                'empresa_datos' => Empresas::find(session('id_empresa')),
                'rresultados' => $rresultados,
                'slcpaciente' => $slcpaciente,
                'datos_paciente' => Pacientes::find($slcpaciente)
            ]);
        }
        else
        {
            return redirect('empresa_vista_login');
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
}
