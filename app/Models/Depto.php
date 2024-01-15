<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depto extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'deptos';

    protected $fillable = ['sucursal','Depto','fecha_act','fecha_sync','flag_sucursales','eliminar'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudios()
    {
        return $this->hasMany('App\Models\Estudio', 'depto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formatos()
    {
        return $this->hasMany('App\Models\Formato', 'Depto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pruebas()
    {
        return $this->hasMany('App\Models\Prueba', 'id_Departamento', 'id');
        /* return $this->hasMany(Prueba::class, 'id'); */
    }
    
}
