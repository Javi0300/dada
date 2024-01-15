<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tomaxest extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tomaxest';

    protected $fillable = ['id_estxsol','solicitud','id_prueba','ClavePrueba','Prueba','actualizar','editor_archivo','editor_texto','formula','espaquete','sucursal','MuestraID','Estudio','id_paquete','Paquete','Toma','Fecha','Resultado','Orden','Imprimir','lista_estatus','Estatus','Importe','DentroLimite','Valores','Medida','TipoFormato','autoanalizador','Valmin','ValMax','TextoValores','Hora','word','fecha_act','fecha_sync','flag_sucursales','eliminar','NombrePerfil','altobajo','antibiograma'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function antibiogramas()
    {
        return $this->hasMany('App\Models\Antibiograma', 'id_tomaxest', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estxsol()
    {
        return $this->hasOne('App\Models\Estxsol', 'idEstxSol', 'id_estxsol');
    }
    
}
