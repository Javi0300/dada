<?php

namespace App\Http\Controllers\Auth;

use App\Models\Doctores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Exception;

class DoctorLoginController extends Controller
{
    public function login(Request $request)
    {        
        $idDoc = $request->idDoc;
        $contra = $request->contra;
        $doctor = Doctores::find(base64_decode($contra));
        if(! is_null($doctor))
        {
            $seno = sin($doctor->idDoctor);
            $resultado = number_format(abs($seno) * 1000000, 0, '', '');
            //dd($resultado);
            if($resultado == $idDoc){
                session(['id_doctor' => $doctor->idDoctor]);
                return redirect()->route('historial_doctor');
            }else{
                return back()->with("error","Usuario o contraseña incorrecta.");
            }
        }
        else
        {
            return back()->with("error","Médico inexistente.");
        }
    }
}