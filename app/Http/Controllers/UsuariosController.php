<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade\DB;
use App\Models\UsuariosModel;
use App\Models\TiposModel;
use App\Http\Requests\ValidarUsuariosRequest;
use App\Http\Requests\ValidarClientesRequest;

class UsuariosController extends Controller{


    // VISTA USUARIO

    public function usuario(){
        $usus = UsuariosModel::all();
        $tipos = TiposModel::all();
        
        return view("usuarios.usuarios")
            ->with(['tipos' => $tipos])
            ->with(['usus' => $usus]);
    }

    // VISTA AGREGAR USUARIO
    public function nuevo(){
        return view("usuarios.agregar_usuario");
    }

    //GUARDAR INFORMACION

    public function guardar(ValidarUsuariosRequest $request){
        $file = $request->file('img'); 

        $img = $file->getClientOriginalName();

        $ldate = date('Ymd_His_');
        $img2 = $ldate . $img; 

        \Storage::disk('local')->put($img2, \File::get($file)); 
        $usu = UsuariosModel::create(array(
            'nombre'      => $request->input('nombre'),
            'app'         => $request->input('app'),
            'apm'         => $request->input('apm'),
            'fn'          => $request->input('fn'),
            'genero'      => $request->input('genero'),
            'celular'     => $request->input('celular'),
            'correo'      => $request->input('correo'),
            'contrasena'  => $request->input('contrasena'),
            'img'         => $img2,
            'id_tipo'     => $request->input('id_tipo'),
            'activo'      => 1
        ));
           
            return redirect()->route('usuario');
        }

    //EDITAR USUARIO
    public function editar(UsuariosModel $id){
        return view("usuarios.editar_usuario")
            ->with(['usu' => $id]);
    }
    //GUARDAR USUARIO
    public function salvar(UsuariosModel $id, Request $request){
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
     
     return redirect()->route("usuario");
       
    }
    // BUSCAR USUARIO
    public function buscar(Request $request){
        $tipos = TiposModel::all();

        $query = UsuariosModel::Nombre($request->get('nombre'))
            ->Tipo($request->get('tipo'))
            ->Genero($request->get('genero'))
            ->Fechas($request->get('fni'),$request->get('fnf'))
            ->Activo($request->get('activo'))
            ->Inactivo($request->get('inactivo'))
            ->orderBy('id_usuario')
            ->paginate();

        return view("usuarios.usuarios")
            ->with(['tipos' => $tipos])
            ->with(['usus' => $query]);
    }
    
        //BORRAR USUARIO
        public function borrar($id){
            $id = UsuariosModel::find($id);
            $id->delete();
            return redirect()->route('usuario');
        }

        // VISTA AGREGAR CLIENTE
        public function registro(){
        return view("usuarios.registro");
        }


        //GUARDAR INFORMACION

    public function guardar1(ValidarClientesRequest $request){
        $file = $request->file('img'); 

        $img = $file->getClientOriginalName();

        $ldate = date('Ymd_His_');
        $img2 = $ldate . $img; 

        \Storage::disk('local')->put($img2, \File::get($file)); 
        $usu = UsuariosModel::create(array(
            'nombre'      => $request->input('nombre'),
            'app'         => $request->input('app'),
            'apm'         => $request->input('apm'),
            'fn'          => $request->input('fn'),
            'genero'      => $request->input('genero'),
            'celular'     => $request->input('celular'),
            'correo'      => $request->input('correo'),
            'contrasena'  => $request->input('contrasena'),
            'img'         => $img2,
            'id_tipo'     => 3,
            'activo'      => 1
        ));
            return redirect()->route('login');
        }
}