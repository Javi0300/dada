<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AntibiogramaDetalle;

class Antibiograma extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'antibiograma';

    protected $fillable = ['idAntibiograma','id_tomaxest','id_bacteria','num_bacteria','datos_extra','actualizado','sucursal'];
	protected $primaryKey = 'idAntibiograma';

    public function antibiogramaDetalles()
    {
        return $this->hasMany('App\Models\AntibiogramaDetalle', 'id_Antibiograma', 'idAntibiograma');
        //return $this->hasMany(AntibiogramaDetalle::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bacteria()
    {
        return $this->hasOne('App\Models\Bacteria', 'idBacteria', 'id_bacteria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tomaxest()
    {
        return $this->hasOne('App\Models\Tomaxest', 'id', 'id_tomaxest');
    }
    
}


/* class User extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

$users = User::with('posts')->get();

foreach ($users as $user) {
    echo 'Usuario: ' . $user->name . '<br>';
    echo 'Posts:<br>';
    foreach ($user->posts as $post) {
        echo ' - ' . $post->title . '<br>';
    }
    echo '<br>';
} */