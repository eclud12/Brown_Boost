<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\UsuariosModel;

class LoginController extends Controller
{
    public function login(){
        $usus = UsuariosModel::all();

        return view('login.login');
    }

    public function valida(Request $request){
        $this->validate($request,[
            'correo' => 'required|email',
            'contrasena' => 'required|min:6|max:30'
        ]);

        $correo = $request->input('correo');
        $pass = $request->input('contrasena');

        $consulta = UsuariosModel::where('correo', '=',$correo)
            ->where('contrasena', '=', $pass)
            ->get();

        if(count($consulta) == 0){
            return redirect()->route('login')
                ->with('message','¡Datos incorrectos!');
        }
        else{
            $request->session()->put('session_id', $consulta[0]->id_usuario);
            $request->session()->put('session_name', $consulta[0]->nombre);
            $request->session()->put('session_tipo', $consulta[0]->id_tipo);

            $session_id   = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            $session_tipo = $request->session()->get('session_tipo');
            
            if($session_tipo == 1){
                return redirect()->route('administrador');
            } else if($session_tipo == 2) { 
                    return redirect()->route('empleados');
            }else if($session_tipo == 3) { 
                return redirect()->route('clientes');
            }
        }
    }
    public function logout(Request $request){
        $request->session()->forget('session_id');
        $request->session()->forget('session_name');

        return view('login.login');
    }

    //RUTA ADMINISTRADOR

    public function administrador(Request $request){
        if(empty($request->session()->get('session_id'))){
            return redirect('login');
        }
        $usu = UsuariosModel::find(session('session_id'));
        
        return view('usuarios.perfil')
            ->with(['usu' => $usu]);
    }
    public function empleado(Request $request){
        if(empty($request->session()->get('session_id'))){
            return redirect('login');
        }
        $usu = UsuariosModel::find(session('session_id'));
        
        return view('empleados.perfil')
            ->with(['usu' => $usu]);
    }

    public function clientes(Request $request){
        if(empty($request->session()->get('session_id'))){
            return redirect('login');
        }
        $usu = UsuariosModel::find(session('session_id'));
        
        return view('empleados.perfiles')
            ->with(['usu' => $usu]);
    }
}