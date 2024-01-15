<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pacientes;
use App\Models\Solicitud;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Exception;

class PacienteLoginController extends Controller
{
    public function login(Request $request)
    {
        $folio = $request->folio;
        $contra = $request->contra;
        //dd(base64_encode(934));
        $solicitud = Solicitud::select('*')->where('Folio','=', $folio)->first();
        if(! is_null($solicitud))
        {
            if( $solicitud->IdSolicitud == base64_decode($contra)){
                session(['id_paciente' => $solicitud->id_paciente]);
                return redirect()->route('paciente', Crypt::encrypt($solicitud->IdSolicitud));
            }else{
                return back()->with("error","Usuario o contraseña incorrecta.");
            }
        }
        else
        {
            return back()->with("error","Orden inexistente.");
        }
    }
    
    public function logout(Request $request)
    {
        /* session()->forget('id_paciente'); */
        session()->flush();
        return redirect('index');
    }
}