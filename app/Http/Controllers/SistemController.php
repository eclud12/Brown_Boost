<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade\DB;
use App\Models\ProductosModel;
use App\Models\UsuariosModel;
use App\Models\TiposModel;

class SistemController extends Controller{

    // INICIO
    public function home(){
        $usus  = UsuariosModel::all();
        $productos = ProductosModel::all();

        return view('content.home')
        ->with(['usus' => $usus])
        ->with(['productos' => $productos]);
    }
    // CONOCENOS
    public function conocenos(){
        return view('content.conocenos');
    }
    // INDEX
    public function inicio(){
        return view('content.inicio');
    }
}
