<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'empresas';

    protected $fillable = ['idEmpresa','sucursal','Nombre','cp','tel1','tel2','Fec_convenio','tipo_tarifa','contacto','colonia','descuento','Pacientes_Mes','Pacientes_Acum','Importe_Mes','Importe_Acum','Saldo','rfc','direccion','Ciudad','Entidad','Tipo_Empresa','Fecha_Corte','dias_pago','Acum_estudios','Cla_Ant','UsaTarifaDe','SiUsa','numero','pais','fecha_act','fecha_sync','flag_sucursales','eliminar'];
	protected $primaryKey = 'idEmpresa';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function monederoEmpresas()
    {
        return $this->hasMany('App\Models\MonederoEmpresa', 'id_empresa', 'idEmpresa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacientes()
    {
        return $this->hasMany('App\Models\Paciente', 'id_Empresa', 'idEmpresa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicituds()
    {
        return $this->hasMany('App\Models\Solicitud', 'id_Empresa', 'idEmpresa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tarifas()
    {
        return $this->hasMany('App\Models\Tarifa', 'id_empresa', 'idEmpresa');
    }
    
}
