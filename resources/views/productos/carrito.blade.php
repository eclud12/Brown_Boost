@extends('layouts.layo')

    @section('contenido')
	<section id="contact">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>BROWN BOOST</span> COMPRAS</h2>
                </div>
                @if (count(Cart::getContent()))
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="border: 2px solid #8aa06b">ID</th>
                            <th scope="col" style="border: 2px solid #8aa06b">Nombre</th>
                            <th scope="col" style="border: 2px solid #8aa06b">Precio</th>
                            <th scope="col" style="border: 2px solid #8aa06b">Cantidad</th>
                            <th scope="col" style="border: 2px solid #8aa06b"></th>
                            <input type="hidden" name="total" value=" {{$total = 0}} ">
                            <input type="hidden" name="subtotal" value=" {{$subtotal = 0}} ">
                        </tr>
                    </thead>
                    @foreach (Cart::getContent() as $item)
                    <input type="hidden" name="subtotal" value=" {{$subtotal= $subtotal + ($item->price * $item->quantity)}} ">
                    <tbody>
                    <tr>
                            <td style="border: 2px solid #8aa06b">{{$item->id}}</td>
                            <td style="border: 2px solid #8aa06b">{{$item->name}}</td>
                            <td style="border: 2px solid #8aa06b">{{$item->price}}</td>
                            <td style="border: 2px solid #8aa06b">{{$item->quantity}}</td>
                            <td style="border: 2px solid #8aa06b">
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-link btn-sm text-danger">Cancelar</button>
                                </form>
                            </td>
                        </tr>
                        <input type="hidden" name="total" value=" {{$total= $subtotal}} ">
                    </tbody>
                    @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="border: 2px solid #8aa06b">Venta Total</td>
                            <td style="border: 2px solid #8aa06b">$ {{$total}}</td>
                            <td><a href="{{route('paypal')}}">
                            <input type="button" class="btn btn-success" value="Terminar venta">
                            </a></td>

                        </tr>
                </table>
                @else
                  <p>Carrito vacio</p>
                @endif
	    	</div>
	    </div>
	</section>
    @endsection
