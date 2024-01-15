<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estxsol extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'estxsol';

    protected $fillable = ['idEstxSol','id_solicitud','id_estudio','sucursal','Depto','MuestraId','Tomas','Faltantes','Importe','Estatus','Observaciones','Fecha','Imprimir','Tubo','abreviatura','TipoFormato','Noaplicadescuento','VerificadoPor','Publicado','WordPDF','Precio','Iva','ivaprct','descimpte','descprct','GrupoPerfil','EsPerfil','fecha_act','fecha_sync','flag_sucursales','eliminar','NombrePerfil','nombrepaciente'];
	protected $primaryKey = "idEstxSol";

    public function estudios()
    {
        return $this->hasOne('App\Models\Estudios', 'idEstudio', 'id_estudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solicitud()
    {
        return $this->hasOne('App\Models\Solicitud', 'IdSolicitud', 'id_solicitud');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tomaxests()
    {
        return $this->hasMany('App\Models\Tomaxest', 'id_estxsol', 'idEstxSol');
    }
    
}
