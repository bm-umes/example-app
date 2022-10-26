<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrimerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//Route::any('/mi-primer-controller', [PrimerController::class, 'index']);
Route::any('/mi-primer-controller/{texto?}', [PrimerController::class, 'show'])->name('mi-controller');


use App\Http\Controllers\ContactoController;
Route::get('/contacto', [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'send']);
Route::get('/contactado', [ContactoController::class, 'contacted'])->name('contactado');


use App\Models\Marca;
Route::get('/ejemplo-relaciones', function(){
    echo '<pre>';
    
    echo '############# Marca ########################################'.PHP_EOL;
    $marca = Marca::find(1);
    print_r($marca->toArray());


    echo '############# Modelos a partir de una Marca ################'.PHP_EOL;
    $modelos = $marca->modelos;
    print_r($modelos->toArray());


    echo '############# Un Modelo especifico a partir de una marca ################'.PHP_EOL;
    $corola = $marca->modelos()->where('nombre','Corola')->first(); //get para obtener varios
    print_r($corola->toArray());


    echo '############# La marca a partir de un modelo ###############'.PHP_EOL;
    $marca2 = $modelos[0]->marca; //tambien $corola->marca   funciona
    print_r($marca2->toArray());


    echo '############# Una marca que traiga embebidos los modelos ###############'.PHP_EOL;
    $marca3 = Marca::where('id',1)->with('modelos')->first();
    print_r($marca3->toArray());


    echo '</pre>';
});



Route::get('/ejemplo-api', function(){
    // Route llama a un controller que llama a un modelo
    // luego el controller con la data llama a un view.
    $servidor = 'http://midominio.localhost/api/';
    $client = new GuzzleHttp\Client(['base_uri' => $servidor]);
    $response = $client->request('GET', 'marcas/1');
    $contents = $response->getBody()->getContents();
    $as_array = json_decode($contents);
    return $as_array;
});
