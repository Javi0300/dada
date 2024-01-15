<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'solicitud';

    protected $fillable = ['IdSolicitud','id_paciente','id_Doctor','id_Empresa','id_precio','sucursal','Fecha','Solicitud','Folio','suc_paciente','suc_doctor','suc_empresa','Tipo_Pago','Fecha_Entrega','Anticipo','Expediente','Importe','Tipo_toma','Estatus','Descuento','Facturar_a','Fur','Total','porcentaje','Fecha_Entregado','Factura','NomCredencial','Pagos','NumImpResultados','SeFactura','Impreso','Edad','EdadTipo','Sexo','pase','tel','Estudios','VerificadoPor','condicionesdepago','numcta','SolPDF','procesar','fecha_act','fecha_sync','flag_sucursales','eliminar','subtotal','iva','retivaprct','retivaimpte','retisrprct','retisrimpte','aumentariva'];
	protected $primaryKey = "IdSolicitud";
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected $hidden = [
        'IdSolicitud',
    ];
    public function doctore()
    {
        return $this->hasOne('App\Models\Doctore', 'idDoctor', 'id_Doctor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'idEmpresa', 'id_Empresa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estxsols()
    {
        return $this->hasMany('App\Models\Estxsol', 'id_solicitud', 'IdSolicitud');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Pacientes', 'idPaciente', 'id_paciente');
    }
    
}
