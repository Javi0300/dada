<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoresreferencia extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'valoresreferencia';

    protected $fillable = ['idValorReferencia','id_prueba','sucursal','Sexo','Edad','EdadMin','EdadMax','ValMin','ValMax','TextoValores',
    'fecha_act','fecha_sync','flag_sucursales','eliminar'];

    protected $primaryKey = 'idValorReferencia';
    public function prueba()
    {
        return $this->hasOne('App\Models\Prueba', 'idPrueba', 'id_prueba');
    }
    
}
