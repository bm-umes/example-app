<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



use Illuminate\Foundation\Inspiring;
Route::get('/inspire', function () {
    return [
        'date'=>date('Y-m-d H:i:s'),
        'quote'=>Inspiring::quotes()->random()
    ];
});


use App\Http\Controllers\Api\MarcaController;
Route::resources([
    'marcas' => MarcaController::class,
]);

