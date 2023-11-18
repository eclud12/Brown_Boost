<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UsuariosModel;

class EmpleadosController extends Controller
{
    //EDITAR PERFIL
    public function editar(UsuariosModel $id, Request $request){

        if(empty($request->session()->get('session_id'))){
            return redirect('login');
        }
        $id = UsuariosModel::find(session('session_id'));

        return view('empleados.editar_perfil')
            ->with(['usu' => $id]);
    }
    //GUARDAR PERFIL
    public function salvaremp(UsuariosModel $id, Request $request){
        if($request->file('img1') != ''){

            $file = $request->file('img1');
            $img = $file->getClientOriginalName();

            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;

            \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 = $request->img2;
        }


        $con = UsuariosModel::find($id->id_usuario);
        $con -> nombre = $request -> nombre;
        $con -> app = $request -> app;
        $con -> apm = $request -> apm;
        $con -> fn = $request -> fn;
        $con -> genero = $request -> genero;
        $con -> celular = $request -> celular;
        $con -> correo = $request -> correo;
        $con -> contrasena = $request -> contrasena;
        $con -> img = $img2;
        $con -> activo = $request -> activo;
     $con -> save();

     return redirect()->route('empleados', ['id'=>session('session_id')]);

    }
}
