<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SistemController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AccionesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () { return view('content/home'); });

// ---------------------INICIO--------------------

Route::name('home')->get('home/',[SistemController::class, 'home']);
Route::name('terminar')->get('terminar/',[CartController::class, 'terminar']);

// ---------------------CONOCENOS--------------------
Route::name('conocenos')->get('conocenos/',[SistemController::class, 'conocenos']);
Route::name('inicio')->get('inicio/',[SistemController::class, 'inicio']);

// ---------------------VISTA PRODUCTOS--------------------
Route::name('producto')->get('producto/',[ProductosController::class, 'producto']);
Route::name('productos')->get('productos/',[ProductosController::class, 'productos']);
Route::name('products')->get('products/',[ProductosController::class, 'products']);

//---------------------ALTA PRODUCTOS------------------------------
Route::name('nuevop')->get('nuevop/',[ProductosController::class, 'nuevo']);
Route::name('guardarp')->post('guardarp/',[ProductosController::class, 'guardar']);

//---------------------DETALLE PRODUCTOS------------------------------
Route::name('detallep')->get('detallep/{id}',[ProductosController::class, 'detalle']);

//---------------------EDITAR PRODUCTOS------------------------------
Route::name('editarp')->get('editarp/{id}',[ProductosController::class, 'editar']);
Route::name('salvarp')->put('salvap/{id}',[ProductosController::class, 'salvar']);

// -------------------BUSQUEDA PRODUCTOS--------------------
Route::name('buscarp')->get('buscarp/',[ProductosController::class, 'buscar']);

//---------------------BORRAR PRODUCTOS------------------------------
Route::name('borrarp')->get('borrarp/{id}',[ProductosController::class, 'borrar']);




//<---------------    RUTAS USUARIOS     -------------------->

// -------------------VISTA USUARIOS--------------------
Route::name('usuario')->get('usuario/',[UsuariosController::class, 'usuario']);

//---------------------ALTA USUARIOS------------------------------
Route::name('nuevo')->get('nuevo/',[UsuariosController::class, 'nuevo']);
Route::name('guardar')->post('guardar/',[UsuariosController::class, 'guardar']);

//---------------------EDITAR USUARIOS------------------------------
Route::name('editar')->get('editar/{id}',[UsuariosController::class, 'editar']);
Route::name('salvar')->put('salvar/{id}',[UsuariosController::class, 'salvar']);

//---------------------BORRAR USUARIOS------------------------------
Route::name('borraru')->get('borraru/{id}',[UsuariosController::class, 'borrar']);

// -------------------BUSQUEDA USUARIOS--------------------
Route::name('buscaru')->get('buscaru/',[UsuariosController::class, 'buscar']);

// -------------------LOGIN--------------------
Route::name('login')->get('/login',[LoginController::class, 'login']);
Route::name('valida')->get('valida/',[LoginController::class, 'valida']);
Route::name('logout')->get('logout/',[LoginController::class, 'logout']);

//---------------------PERFIL ADMINISTRADOR------------------------------

Route::name('administrador')->get('administrador/',[LoginController::class,'administrador']);

//---------------------EDITAR PERFIL ADMINISTRADOR------------------------------

Route::name('editarper')->get('editarper/{id?}',[AccionesController::class,'editar']);
Route::name('salvarper')->put('salvaper/{id}',[AccionesController::class,'salvar']);

//---------------------PERFIL EMPLEADO------------------------------

Route::name('empleados')->get('empleados/',[LoginController::class,'empleado']);

//---------------------EDITAR PERFIL EMPLEADO------------------------------
Route::name('editaremp')->get('editaremp/{id?}',[EmpleadosController::class,'editar']);
Route::name('salvaremp')->put('salvaemp/{id}',[EmpleadosController::class,'salvaremp']);

//---------------------REALIZAR VENTAS------------------------------
Route::name('ventas')->get('ventas/',[AccionesController::class,'ventas']);
Route::name('guardarv')->post('guardarv/',[AccionesController::class,'guardarv']);

//---------------------VENTAS------------------------------
Route::name('ventasg')->get('ventasg/',[AccionesController::class,'ventasg']);
Route::name('guardarve')->post('guardarve/',[AccionesController::class,'guardarve']);

//---------------------EDITAR PRODUCTOS------------------------------
Route::name('editarpr')->get('editarpr/{id}',[ProductosController::class,'editarp']);
Route::name('salvarpr')->put('salvapr/{id}',[ProductosController::class,'salvarp']);

//---------------------DETALLE PRODUCTOS------------------------------

Route::name('detalle')->get('detalle/{id}',[ProductosController::class,'detallep']);

// -------------------BUSQUEDA PRODUCTOS--------------------
Route::name('buscar')->get('buscar/',[ProductosController::class,'buscarp']);

//---------------------ENVIO DE CONTACTANOS------------------------------

Route::name('correo')->get('correo/',[CorreoController::class, 'correo']);

//---------------------ALTA CLIENTES------------------------------

Route::name('registro')->get('registro/',[UsuariosController::class, 'registro']);
Route::name('guardar1')->post('guardar1/',[UsuariosController::class,'guardar1']);

//---------------------PERFIL EMPLEADO------------------------------

Route::name('clientes')->get('clientes/',[LoginController::class,'clientes']);

//---------------------CARRITO DE COMPRAS------------------------------

Route::post('/cart-add',[CartController::class,'add'])->name('cart.add');
Route::get('/cart-checkout',[CartController::class,'cart'])->name('cart.checkout');

Route::post('/cart-clear',[CartController::class,'clear'])->name('cart.clear');
Route::post('/cart-removeitem',[CartController::class,'removeitem'])->name('cart.removeitem');

Route::get('/paypal/pay',[PaymentController::class,'payWithPayPal'])->name('paypal');
Route::get('/paypal/status',[PaymentController::class,'payPalStatus']);

//---------------------REPORTES EXCEL------------------------------
Route::name('/export')->get('/export',[AccionesController::class, 'export']);
Route::name('/exportVenta')->get('/exportVenta',[AccionesController::class, 'exportVenta']);

//---------------------REPORTES PDF------------------------------
Route::name('/ventas-realizadas')->get('/ventas-realizadas',[AccionesController::class,'exportPdf']);
Route::name('/mis-ventas')->get('/mis-ventas',[AccionesController::class,'exportpdfVentas']);





