@extends('layouts.layou')

    @section('contenido')
	<section id="contact">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>BROWN BOOST</span> PRODUCTOS</h2>
                </div>
                <div>
                    <form action="{{ route('buscar')}}" method="GET" name="buscar">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Nombre</span></h3>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Busqueda por nombre">
                        </div>
                        <div class="col-md-4">
                            <h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Clave<span></span></h3>
                            <input type="text" class="form-control" name="clave" value="{{ old('clave') }}" placeholder="Busqueda por clave">
                        </div>
                        <div class="col-md-4">
                            <h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Tamaño<span></span></h3>
                            Grande<input type="radio" name="tamaño" value="1">
                            Mediano<input type="radio" name="tamaño" value="2">
                            Pequeño<input type="radio" name="tamaño" value="3">
                            Todos<input type="radio" name="tamaño" value="" checked>
                        </div>
                        <div class="col-md-6">
                        <input type="submit" value="Buscar" class="form-control">
                        </div>

                    </form>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="border: 2px solid #8aa06b">Clave</th>
                            <th scope="col" style="border: 2px solid #8aa06b">Imagen</th>
                            <th scope="col" style="border: 2px solid #8aa06b">Nombre</th>
                            <th scope="col" style="border: 2px solid #8aa06b">Precio</th>
                            <th scope="col" style="border: 2px solid #8aa06b">Tamaño</th>
                            <th scope="col" style="border: 2px solid #8aa06b">Acciones</th>
                        </tr>
                    </thead>
                    @foreach($prods as $prod)
                    <tbody>
                        <tr>
                            <th scope="row" style="border: 2px solid #8aa06b"><h3>{{$prod->clave}}</h3></th>
                            <td style="border: 2px solid #8aa06b">
                                @if($prod->img == null)
                                    <img src="{{ asset('images/no-image.png') }}" alt="img"  width="100">
                                @else
                                    <img src="{{ asset('images/'.$prod->img) }}" alt="{{ $prod->img }}"  width="100">
                                @endif
                            </td>
                            <td style="border: 2px solid #8aa06b"><h3>{{$prod->nombre}}</h3></td>
                            <td style="border: 2px solid #8aa06b"><h3>$ {{$prod->precio}}</h3></td>
                            <td style="border: 2px solid #8aa06b"><h3>
                                @if($prod->tamaño == 1)
                                    Grande
                                @elseif($prod->tamaño == 2)
                                    Mediano
                                @elseif($prod->tamaño == 3)
                                    Pequeño
                                @endif
                            </h3>
                            <td style="border: 2px solid #8aa06b"><h4>
                                <form action="{{ route('detalle', ['id' => $prod->id_producto]) }}" method="GET" name="editar">
					                <input type="submit" class="form-control" value="Detalle">
				                </form>
                                <form action="{{ route('editarpr', ['id' => $prod->id_producto]) }}" method="GET" name="editar">
					                <input type="submit" class="form-control" value="Editar">
				                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
	    	</div>
	    </div>
	</section>
    @endsection
