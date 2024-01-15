<?php

namespace App\Http\Controllers\Auth;

use App\Models\Empresas;
use App\Models\Solicitud;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EmpresaLoginController extends Controller
{
    public function login(Request $request)
    {
        $contra = $request->contra;
        $usuario = $request->usuario;
        
        $empresa = Empresas::find(base64_decode($contra));
        if(!is_null($empresa))
        {
            $seno = sin($empresa->idEmpresa);
            $resultado = number_format(abs($seno) * 1000000, 0, '', '');
            if($resultado == $usuario){
                session(['id_empresa' => $empresa->idEmpresa]);
                return redirect()->route('historial_empresa');
            }else{
                return back()->with("error","Usuario o contraseña incorrecta.");
            }
        }
        else
        {
            return back()->with("error","Empresa inexistente.");
        }
    }
}