<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;

class Doctores extends Model
{   //use RoutesWithFakeIds;
	use HasFactory;
    

    public $timestamps = true;

    protected $table = 'doctores';

    protected $fillable = ['idDoctor','sucursal','doctor','Paterno','Materno','Nombre','Direccion','Especialidad1','Especialidad2','Fec_alta',
    'Pacientes_Mes','Pacientes_Acum','Importe_mes','Importe_Acum','Centro','Tels','Pais','Estado','Municipio','Localidad','cp','Colonia','fecha_act',
    'fecha_sync','flag_sucursales','eliminar','CedProf','FecNac','Sexo','email'];
	
    protected $primaryKey = 'idDoctor';
}
