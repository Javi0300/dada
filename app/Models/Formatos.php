<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formatos extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'formatos';

    protected $fillable = ['idFormato','sucursal','id_Estudio','id_prueba','esseparador','Prueba','Valor1','Valor2','Medida','tipoFormato','Orden','ClavePrueba','autoanalizador','TextoValores','word','fecha_act','fecha_sync','flag_sucursales','eliminar'];
	
    protected $primaryKey = 'idFormato';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudio()
    {
        return $this->hasOne('App\Models\Estudio', 'idEstudio', 'id_Estudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function prueba()
    {
        return $this->hasOne('App\Models\Prueba', 'idPrueba', 'id_prueba');
    }
    
}
