<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\UsuariosModel;
use App\Models\ProductosModel;
use App\Models\VentasModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $producto = ProductosModel::find($request->id_producto);
        Cart::add(
            $producto->id_producto,
            $producto->nombre,
            $producto->precio,
            1,
            $producto->img,
        );
        return redirect()->route('products');
    }
    public function terminar()
    {

        $productos = Cart::getContent();
        foreach ($productos as $producto) {
            $ventas = VentasModel::create(array(
                'id_usuario'      => session('session_id'),
                'id_producto'         => $producto->id,
                'fecha'         => date('Ymd'),
                'cantidad'          => $producto->quantity,

            ));
        }
        Cart::clear();

        return redirect()->route('cart.checkout');
    }
    public function ventas()
    {
        $usuario = UsuariosModel::find(session('session_id'));

        $productos = ProductosModel::all();
        $ventas = VentasModel::all();

        return view('productos.carrito')
            ->with(['usuario' => $usuario])
            ->with(['productos' => $productos])
            ->with(['ventas' => $ventas]);
    }
    public function cart()
    {
        return view('productos.carrito');
    }
    public function removeitem(Request $request)
    {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success', "Producto eliminado con éxito de su carrito.");
    }
    public function clear()
    {
        Cart::clear();
        return back()->with('success', "¡El producto se ha agregado con éxito al carrito de compras!");
    }
}
