<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\UsuariosModel;
use App\Models\ProductosModel;
use App\Models\VentasModel;
use App\Models\DetallesModel;

use Barryvdh\DomPDF\Facade\Pdf;

//Reportes de EXCEL
use App\Exports\VentasExport;
use App\Exports\VentasRealizadasExport;
use Maatwebsite\Excel\Facades\Excel;
//Fin de Reportes de EXCEL

class AccionesController extends Controller{

    //EDITAR PERFIL
    public function editar(UsuariosModel $id, Request $request){

        if(empty($request->session()->get('session_id'))){
            return redirect('login');
        }
        $id = UsuariosModel::find(session('session_id'));
        
        return view('usuarios.editar_perfil')
            ->with(['usu' => $id]);
    }
    //GUARDAR PERFIL
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
     
     return redirect()->route('administrador', ['id'=>session('session_id')]);
       
    }
    public function ventas(){
        $usuario = UsuariosModel::find(session('session_id'));

        $productos = ProductosModel::all();
        $ventas = VentasModel::all();

        return view('ventas.ventas')
            ->with(['usuario' => $usuario])
            ->with(['productos' => $productos])
            ->with(['ventas' => $ventas]);

    }

    public function guardarv(Request $request){

            $this->validate($request, [
                    'id_producto' => 'required',
                    'cantidad' => 'required|integer|min:1|max:100'
                ]);
            $usu = VentasModel::create(array(
                    'id_usuario'=> session('session_id'),
                    'fecha'=> date('Ymd'),
                    'id_producto'=>$request->input('id_producto'),
                    'cantidad'=>$request->input('cantidad'),
                ));
            return redirect()->route('ventas');    
    }
    public function ventasg(){
        $usuario = UsuariosModel::find(session('session_id'));
        $usuarios = UsuariosModel::all();

        $productos = ProductosModel::all();
        $ventas = VentasModel::all();

        return view('ventas.ventas_gen')
            ->with(['usuario' => $usuario])
            ->with(['usuarios' => $usuarios])
            ->with(['productos' => $productos])
            ->with(['ventas' => $ventas]);

    }

    public function guardarve(Request $request){

            $this->validate($request, [
                    'id_producto' => 'required',
                    'cantidad' => 'required|integer|min:1|max:100'
                ]);
            $usu = VentasModel::create(array(
                    'id_usuario'=> session('session_id'),
                    'fecha'=> date('Ymd'),
                    'id_producto'=>$request->input('id_producto'),
                    'cantidad'=>$request->input('cantidad'),
                ));
            return redirect()->route('ventasg');    
    }

    public function export() {
        return Excel::download(new VentasExport, 'Mis ventas.xlsx');
    }

    public function exportVenta() {
        return Excel::download(new VentasRealizadasExport, 'Ventas Realizadas.xlsx');
    }






    public function exportPdf(){
        $usuario = UsuariosModel::find(session('session_id'));
        $usuarios = UsuariosModel::all();

        $productos = ProductosModel::all();
        $ventas = VentasModel::all();

        $pdf  = PDF::loadView('reportspdf.reporte-ventas',  
        compact(
        'usuario',
        'usuarios',
        'productos',
        'ventas'));
        return $pdf->stream('Reporte - Ventas realizadas.pdf');
    }


    
    public function exportpdfVentas(){
        $usuario = UsuariosModel::find(session('session_id'));
        $usuarios = UsuariosModel::all();

        $productos = ProductosModel::all();
        $ventas = VentasModel::all();

        $pdf  = PDF::loadView('reportspdf.misventas-reporte',  
        compact(
        'usuario',
        'usuarios',
        'productos',
        'ventas'));
        return $pdf->stream('Reporte - Mis ventas.pdf');

    }


}
