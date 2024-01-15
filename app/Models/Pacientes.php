<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pacientes';

    protected $fillable = ['idPaciente','sucursal','Paciente','Paterno','Materno','Nombre','FecNac','Sexo','Calle','Numero','Rfc','Estudios','Ult_solicitud','Fec_alta','Importe','Importe_Acum','Saldo','EmpresaAnt','suc_empresa','id_Empresa','Foraneo','Descuento','Titular','Estado','Municipio','Localidad','Cp','Colonia','Credencial','NumCredencial','Telefono','NumEmpleado','Pais','cliente','regimen','email','fecha_act','fecha_sync','flag_sucursales','eliminar','enviarwhatsapp'];
    protected $primaryKey = 'idPaciente';
    
    public function empresasn()
    {
        return $this->hasOne('App\Models\Empresasn', 'idEmpresa', 'id_Empresa');
    } 
    
}
