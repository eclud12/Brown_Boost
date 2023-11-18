<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class CorreoController extends Controller{

    public function correo(Request $request){
        $data = array(
            'contacto' => 'CONTACTO BROWN BOOST',
            'nombre'   => $request->get('nombre'),
            'correo'   => $request->get('correo'),
            'asunto'   => $request->get('asunto'),
            'mensaje'   => $request->get('mensaje')
        );

        Mail::send('correo.email',$data, function($message) use($data){
            $message->from('dulcesevilla45@gmail.com', 'Dulce Maria Sevilla Ortiz');
            $message->to($data['correo'], $data['nombre']);
            $message->subject($data['asunto']);
        });
        if(Mail::failures()){
            return "Error!";
        }
        else{
            return view('content.home');
        }
    }
}
