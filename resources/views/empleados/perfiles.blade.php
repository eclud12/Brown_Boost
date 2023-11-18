@extends('layouts.layo')

    @section('contenido')
	<section id="contact">
	    <div class="container">
	    	<div class="row">
                <div>
                    <a href="{{ route('editaremp')}}"><h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Editar Perfil</span></h3></a>
	    		</div>
                <div class="col-md-12">
			    	<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Perfil</span>
			    	</h2>
			    </div>
                <br>
                <table class="table">
                    <tbody  style="border: 2px solid #8aa06b">
                        <tr>
                            <td class="col-md-2" style="border: 2px solid #8aa06b">
                                <img src="{{ asset('images/'.$usu->img) }}" alt="{{ $usu->img }}"  width="150">
                            </td>
                            <td class="col-md-5">
                            <h4><b>@if($usu->id_tipo == 1)
                                    Administrador
                                    @elseif($usu->id_tipo == 2)
                                    Empleado
                                    @elseif($usu->id_tipo == 3)
                                    Cliente
                                    @endif</b></h4><br>
                            <h4><b>Nombre: </b>{{($usu->nombre)}} {{($usu->app)}} {{($usu->apm)}}</h4><br>
                            <h4><b>Correo: </b>{{($usu->correo)}}</h4><br>
                            </td>
                            <td class="col-md-5">
                            <h4><b>Fecha de Nacimiento: </b>{{($usu->fn)}}</h4><br>
                                <h4><b>Genéro: </b>
                                    @if($usu->genero == 1)
                                    Masculino
                                    @elseif($usu->genero == 2)
                                    Femenino
                                    @endif
                                </h4><br>
                                <h4><b>Celular: </b>{{($usu->celular)}}</h4><br>
                            </td>
                        </tr>
                    </tbody>
                </table>
	    	</div>
	    </div>
        <br><br><br><br><br>
    </section>
    @endsection
