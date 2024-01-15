<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'estudios';

    protected $fillable = ['idEstudio','ColorTitulo','AlineacionTitulo','Notas_Internas','Indicaciones','Sexo','ventaindividual','Codigo','Descripcion','Dias','Horas','Minutos','depto','sucursal','Nombre','Abreviatura','Tomas','Frecuencia','Tipoformato','Notas','TiempoProceso','TipoMuestra','Instrucciones','DatosTecnicos','Encabezado','Tubo','Noaplicadescuento','espaquete','fecha_act','fecha_sync','flag_sucursales','eliminar','SucProceso', 'sat_claveprodserv', 'sat_claveunidad', 'sat_ivaprct'];
	
    protected $primaryKey = 'idEstudio';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function depto()
    {
        return $this->hasOne('App\Models\Depto', 'id', 'depto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estxsols()
    {
        return $this->hasMany('App\Models\estxsol', 'id_estudio', 'idEstudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formatos()
    {
        return $this->hasMany('App\Models\Formato', 'id_estudio', 'idEstudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function monederoEstudiosExclusiones()
    {
        return $this->hasMany('App\Models\MonederoEstudiosExclusione', 'id_estudio', 'idEstudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /* public function paqueteDetalles()
    {
        return $this->hasMany('App\Models\PaqueteDetalle', 'id_Estudio', 'idEstudio');
    } */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paqueteDetalles()
    {
        return $this->hasMany('App\Models\PaqueteDetalle', 'id_estudio_detalle', 'idEstudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function perfilDetalles()
    {
        return $this->hasMany('App\Models\PerfilDetalle', 'id_estudio', 'idEstudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preciosDetalles()
    {
        return $this->hasMany('App\Models\PreciosDetalle', 'id_Estudio', 'idEstudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tarifas()
    {
        return $this->hasMany('App\Models\Tarifa', 'id_estudio', 'idEstudio');
    }
    
}
