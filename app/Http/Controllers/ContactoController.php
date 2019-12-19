<?php

namespace App\Http\Controllers;
use App\Mail\MensajeRecibido;

use Illuminate\Support\Facades\Mail;


class ContactoController extends Controller
{
    
    
      public function store()
    {
      

     $mensaje = request()->validate([
    'nombre'=>'required',
		'email'=>'required',
		'asunto'=>'required',
		'telefono'=>'required',
		'comentarios'=>'required'

      ]);

      Mail::to('inesbeachhotel@gmail.com')->queue(new MensajeRecibido($mensaje));

  
      return redirect()->route('contacto')->with('datos','¡Correo Enviado Exitosamente!, nos pondremos en contacto con usted lo antes posible ...');


    }

}

