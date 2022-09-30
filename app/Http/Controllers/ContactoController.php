<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoRecibido;
use App\Models\Contact;

class ContactoController extends BaseController
{
    public function index()
    {
        return view('mis-views.contacto');
    }
    public function send(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);
        

        //inserta a base de datos
        $input = $request->input(); //se puede usar only para cierto keys.
        $input['publicidad'] = isset($input['publicidad']);
        Contact::create($input);

        //enviar correo a posible cliente
        Mail::send(new ContactoRecibido($request->input()));


        return redirect(route('contactado'), 302);

    }
    public function contacted(){
        return view('mis-views.contactado');
    }
}
