<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use App\Models\Syswebconf;
use App\Providers\SimpleXMLElement;
use Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    public function boot()/* : void */
    {
        public function boot()/* : void */
    {
        $mDir= ($_SERVER["REQUEST_URI"]); //Poner isset de ser necesario para que funcione el config:clear y el artisan serve y luego quitarle isset para que reciba url desde el navegador
        //$mDir= isset($_SERVER["REQUEST_URI"]);
        $mruta=explode("/", $mDir );         
        try {
            $mFile =public_path() .'/' .$mruta[1].'/'.$mruta[2]."/confbd.txt";
        }catch (Exception $e){
            $mFile=public_path()."/laboratorios/inadware/confbd.txt";

        }
        $xml = simplexml_load_file($mFile);
        /* $appkey = implode(" ",explode(":",$xml->appkey)); */
        $url_dinamica = $xml->url_dinamica;
        $mtxthost =implode(" ",explode(":",$xml->servidor));
        $mtxtport =implode(" ",explode(":",$xml->puerto));
        $laboratorio =implode(" ",explode(":",$xml->laboratorio));
        $logotipo = implode(" ",explode(":",$xml->logotipo));
        $mtxtdatabase =implode(" ",explode(":",$xml->bd));
        $mtxtusername =implode(" ",explode(":",$xml->usuariobd));
        $mtxtpassword =implode(" ",explode(":",$xml->pwdbd));
        
        view()->composer('*',function($view) use($laboratorio,$logotipo,$url_dinamica){
            $view->with('laboratorio', $laboratorio);
            $view->with('logotipo', $logotipo);
            //$view->with('appkey', $appkey);
            $view->with('url_dinamica', $url_dinamica);
        });
        //dump(session("nombre_laboratorio"));
        Config::set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => $mtxthost,//$xml->servidor,
            'port' => $mtxtport,//$mailsetting->puerto_sql,
            'database' => $mtxtdatabase,//$xml->parametros->bd,//$mailsetting->base_de_datos,
            'username' =>  $mtxtusername,//$mailsetting->usuario_sql,
            'password' => $mtxtpassword,//$mailsetting->password_sql,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ]);
    }
    }
}
