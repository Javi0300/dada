<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Antibiograma;

class Setting extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'antibiograma_detalle';

    protected $fillable = ['idAntibiogramaDetalle','id_Antibiograma','antibiotico','resultado','unidad','sucursal'];
	protected $primaryKey = 'idAntibiogramaDetalle';
    
    public function antibiograma()
    {
        return $this->hasOne('App\Models\Antibiograma', 'idAntibiograma', 'id_Antibiograma');
        //return $this->belongsTo(Antibiograma::class);
    }
    
}
