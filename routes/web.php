<?php
use App\Models\Pacientes;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

//*****************Doctor*****************************/
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\Auth\DoctorLoginController;
//*****************Empresa*****************************/
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\Auth\EmpresaLoginController;
//***********************Paciente**********************/
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\Auth\PacienteLoginController;

Route::get('/', function () {
    return view('presentacion');
})->name('/');
Route::get('index', function () {
    return view('welcome');
})->name('index');

//*****************Doctor*****************************//
Route::GET('doctor_vista_login', function ()
{
    return view('doctores.doctor_login');
})->name('doctor_vista_login');
Route::POST('doctor_log', [DoctorLoginController::class, 'login'])->name('doctor_log');
Route::GET('historial_doctor', [DoctoresController::class, 'historial'])->name('historial_doctor');
/* Route::POST('doctor_logout', [DoctorLoginController::class, 'logout'])->name('doctor_logout'); */

//*****************Empresa*****************************//
Route::GET('empresa_vista_login', function ()
{
    return view('empresas.empresa_login');
})->name('empresa_vista_login');
Route::POST('empresa_log', [EmpresaLoginController::class, 'login'])->name('empresa_log');
Route::GET('historial_empresa', [EmpresasController::class, 'historial'])->name('historial_empresa');
/* Route::POST('empresa_logout', [EmpresaLoginController::class, 'logout'])->name('empresa_logout');*/

//***********************Paciente**********************//
Route::GET('paciente_vista_login', function ()
{
    return view('pacientes.paciente_login');
})->name('paciente_vista_login');
Route::POST('paciente_log', [PacienteLoginController::class, 'login'])->name('paciente_log');
Route::GET('historial_paciente', [PacientesController::class, 'historial'])->name('historial_paciente');
Route::GET('certificado_paciente/{idSolicitud}', [PacientesController::class, 'certificado_paciente'])->name('certificado_paciente');
Route::GET('paciente/{idSolicitud}', [PacientesController::class, 'paciente'])->name('paciente');
Route::POST('paciente_logout', [PacienteLoginController::class, 'logout'])->name('paciente_logout');


Route::get('admin', function () {
    /* $pacientes = Pacientes::select('*')->get(); */
    return view('admin');
})->name('admin');