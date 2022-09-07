<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class PrimerController extends BaseController
{
    function index(){
        return view('mis-views.primer-view', [
            'texto' => 'Hola Mundo'
        ]);
    }
    function show(Request $request, $texto='nada'){
        $contador = session('contador',0);
        $contador++;
        session(['contador'=>$contador]);

        $contadorCache = cache('contador',0);
        $contadorCache++;
        cache(['contador'=>$contadorCache]);


        $ip = $request->ip();
        $url = route('mi-controller', ['texto' => 'hola mundo']);
        return view('mis-views.primer-view', [
            'texto' => $texto,
            'ip' => $ip,
            'url' => $url,
            'contador' => $contador,
            'contadorCache' => $contadorCache,
        ]);
    }
}
