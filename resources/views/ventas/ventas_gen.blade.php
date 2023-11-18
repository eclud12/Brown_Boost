@extends('layouts.layout')

    @section('contenido')
	<section id="contact">
	    <div class="container">
	    	<div class="row">
                <div class="col-md-12">
			    	<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Ventas</span>
			    	</h2>
			    </div><br>
                <h3><b>Administrador: </b> {{ $usuario->app." ".$usuario->apm.", ".$usuario->nombre }}</h3><hr>
                <form action="{{ route('guardarve') }}" method="POST">
                    {{ csrf_field() }}
                    <table class="table">
                        <tbody style="border: 2px solid #8aa06b">
                            <tr>
                                <td>Productos: </td>
                                <td>
                                    <select class="form-control" name="id_producto">
                                        <option style="color: black;" value="">Selecciona un Producto</option>
                                        @foreach($productos as $producto)
                                        <option style="color: black;" value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    @if($errors->first('id_producto')) <i>{{ $errors->first('id_producto') }}</i>@endif
                                </td>
                            </tr>
                            <tr>
                                <td>Cantidad: </td>
                                <td><input type="text" name="cantidad" value="{{ old('cantidad') }}" class="form-control"></td>
                                <td>
                                    @if($errors->first('cantidad')) <i>{{ $errors->first('cantidad') }}</i>@endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><input type="submit" value="Vender"></td>
                            </tr>
                        </tbody>
                    </table>
                </form> <br><br>
                <hr style="border: 2px solid #8aa06b">
                <br>
                <div class="col-md-12">
			    	<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Mis Ventas</span>
			    	</h2>
			    </div><br>
                <table class="table">
                    <tbody style="border: 2px solid #8aa06b">
                        <tr style="border: 2px solid #8aa06b">
                            <td style="border: 2px solid #8aa06b">N° de Venta</td>
                            <td style="border: 2px solid #8aa06b">Codigo del producto</td>
                            <td style="border: 2px solid #8aa06b">Nombre del producto</td>
                            <td style="border: 2px solid #8aa06b">Cantidad</td>
                            <td style="border: 2px solid #8aa06b">Precio c/u</td>
                            <td style="border: 2px solid #8aa06b">Total</td>
                        </tr>
                        <input type="hidden" name="total" value=" {{$total = 0}} ">
                        <?php $i=1 ?>
                        @foreach($productos as $prod1)
                            @foreach($ventas as $venta)
                                @if($venta->id_usuario == $usuario->id_usuario && $venta->id_producto == $prod1->id_producto)
                                <tr>
                                    <td style="border: 2px solid #8aa06b"><?php echo $i++ ?></td>
                                    <td style="border: 2px solid #8aa06b">{{$prod1->clave}}</td>
                                    <td style="border: 2px solid #8aa06b">{{$prod1->nombre}}</td>
                                    <td style="border: 2px solid #8aa06b">{{$venta->cantidad}}</td>
                                    <td style="border: 2px solid #8aa06b">$ {{$prod1->precio}}</td>
                                    <td style="border: 2px solid #8aa06b">$ {{$venta->cantidad * $prod1->precio}}</td>
                                    <input type="hidden" name="total" value=" {{$total= $total + ($venta->cantidad * $prod1->precio)}} ">
                                </tr>
                                @endif
                            @endforeach
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Venta Total</td>
                            <td style="border: 2px solid #8aa06b">$ {{$total}}</td>
                        </tr>
                    </tbody>
                </table>
                <a data-scroll href="{{ route('/export') }}" class="btn btn-success" data-wow-offset="50" data-wow-delay="0.6s">Mis ventas.xlsx</a>
                <a data-scroll onclick="window.location.href='mis-ventas'" class="btn btn-danger" data-wow-offset="50" data-wow-delay="0.6s">Generar reporte PDF</a>

                <hr style="border: 2px solid #8aa06b">
                <br>
                <div class="col-md-12">
			    	<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Ventas Realizadas</span>
			    	</h2>
			    </div>

                <table class="table">
                    <tbody style="border: 2px solid #8aa06b">
                        <tr style="border: 2px solid #8aa06b">
                            <td style="border: 2px solid #8aa06b">N° de Venta</td>
                            <td style="border: 2px solid #8aa06b">Nombre del Vendedor</td>
                            <td style="border: 2px solid #8aa06b">Nombre del producto</td>
                            <td style="border: 2px solid #8aa06b">Cantidad</td>
                            <td style="border: 2px solid #8aa06b">Precio c/u</td>
                            <td style="border: 2px solid #8aa06b">Total</td>
                        </tr>
                        <input type="hidden" name="total" value=" {{$total = 0}} ">
                        @foreach($usuarios as $usu)
                            @foreach($productos as $prod2)
                                @foreach($ventas as $venta)
                                    @if($venta->id_usuario == $usu->id_usuario && $venta->id_producto == $prod2->id_producto)
                                    <tr>
                                        <td style="border: 2px solid #8aa06b">{{$venta->id_venta}}</td>
                                        <td style="border: 2px solid #8aa06b">{{$usu->app}}, {{$usu->nombre}}</td>
                                        <td style="border: 2px solid #8aa06b">{{$prod2->nombre}}</td>
                                        <td style="border: 2px solid #8aa06b">{{$venta->cantidad}}</td>
                                        <td style="border: 2px solid #8aa06b">$ {{$prod2->precio}}</td>
                                        <td style="border: 2px solid #8aa06b">$ {{$venta->cantidad * $prod2->precio}}</td>
                                        <input type="hidden" name="total" value=" {{$total= $total + ($venta->cantidad * $prod2->precio)}} ">
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Venta Total</td>
                            <td style="border: 2px solid #8aa06b">$ {{$total}}</td>
                        </tr>
                    </tbody>
                </table>

                <a data-scroll href="{{ route('/exportVenta') }}" class="btn btn-success" data-wow-offset="50" data-wow-delay="0.6s">Ventas realizadas.xlsx</a>
                <a data-scroll onclick="window.location.href='ventas-realizadas'" class="btn btn-danger" data-wow-offset="50" data-wow-delay="0.6s">Generar reporte PDF</a>

                <hr style="border: 2px solid #8aa06b">
	    	</div>
	    </div>
        <br><br><br><br><br>
    </section>
    @endsection
