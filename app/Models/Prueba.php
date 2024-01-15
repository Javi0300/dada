<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pruebas';

    protected $fillable = ['Resultado_default','idPrueba','valor_restringido','Tipo_Valor','TipoMuestra','sexo','notas_internas','notas','editor_texto','antibiograma','formula','impr_Nota_Resultado','imprimir_negritas','impr_metodo_Resultado','id_Metodo','id_Departamento','hoja_trabajo','Decimales','cveprueba','abreviatura','minutos','horas','dias','indicaciones','valor_normalidad_texto','tipo_valor_normalidad','sucursal','Prueba','Descripcion','Medida','TipoResultado','Autoanalizador','fecha_act','fecha_sync','flag_sucursales','eliminar'];
    protected $primaryKey = 'idPrueba';
    public function depto()
    {
        return $this->hasOne('App\Models\Depto', 'id', 'id_Departamento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formatos()
    {
        return $this->hasMany('App\Models\Formato', 'id_prueba', 'idPrueba');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function metodo()
    {
        return $this->hasOne('App\Models\Metodo', 'idMetodo', 'id_Metodo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valoresreferencias()
    {
        return $this->hasMany('App\Models\Valoresreferencium', 'id_prueba', 'idPrueba');
    }
    
}