@extends('layouts.layout')

    @section('contenido')
	<section id="contact">
		<div class="container">
			<div class="row">
				<div>
                    <a href="{{ route('nuevo') }}"><h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Agregar Empleado</span></h3></a>
	    		</div>
				<div>
				<form action="{{ route('buscaru')}}" method="GET" name="buscar">
                        {{ csrf_field() }}
					<div class="col-md-12">
						<div class="col-md-4">
                            <h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Nombre</span></h3>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Busqueda por nombre">
                        </div>
                        <div class="col-md-4">
                            <h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Tipo<span></span></h3>
							<select name="tipo" class="form-control">
            				    <option style="color: black;" value="">Selecciona una opcion</option>
            				    @foreach($tipos as $tipo)
            				        <option style="color: black;" value="{{ $tipo->id_tipo }}">{{ $tipo->nombre }}</option>
            				    @endforeach
            				</select>
                        </div>
						<div class="col-md-4">
                            <h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Genero<span></span></h3>
                            Maculino<input type="radio" name="genero" value="1">
                            Femenino<input type="radio" name="genero" value="2">
                            Todos<input type="radio" name="genero" value="" checked>
                        </div>
					</div>
					<div class="col-md-12">
						<div class="col-md-4">
                            <h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Estatus<span></span></h3>
                            Activo<input type="radio" name="activo">
                            Inactivo<input type="radio" name="inactivo">
                        </div>
						<div class="col-md-4">
                            <h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Búsqueda por<span></span></h3>
                            Fecha inicial<input type="date" name="fni" class="form-control">
                        </div>
						<div class="col-md-4">
						<h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Fecha Nacimiento<span></span></h3>
                            Fecha final<input type="date" name="fnf" class="form-control">
                        </div>
					</div>
                        <div class="col-md-4">
                        	<input type="submit" value="Buscar" class="form-control">
                        </div>
                </form>
				<div class="col" data-wow-offset="50" data-wow-delay="0.6s">
					<div class="col-md-12" style="border: 2px solid #8aa06b">
						<div class="col-md-2">
							<h3>Imagen</h3>
						</div>
						<div class="col-md-3">
							<h3>Cargo</h3>
						</div>
						<div class="col-md-4">
							<h3>Correo</h3>
						</div>
						<div class="col-md-1">
							<h3>Estatus</h3>
						</div>
						<div class="col-md-2">
							<h3>Acciones</h3>
						</div>
					</div>
				</div>

				@foreach($usus as $usu)
				<div class="col" data-wow-offset="50" data-wow-delay="0.6s">
					<div class="col-md-12" style="border: 2px solid #8aa06b">
					<div></div>
						<div class="col-md-2">
							@if($usu->img == null)
								<img src="{{ asset('images/no-user.jpg') }}" class="img-responsive" width="500">
							@else
								<img src="{{ asset('images/'.$usu->img) }}" alt="{{ $usu->img }}" class="img-responsive" width="500">
							@endif
						</div>
						<div class="col-md-3">
							<h3>
								@foreach($tipos as $tipo)
                					@if($tipo->id_tipo == $usu->id_tipo)
                    					{{ $tipo->nombre }}
                					@endif
            					@endforeach
							</h3>
							<p>
								{{ $usu->app }} {{ $usu->apm }}, {{ $usu->nombre }} <br>
								@if($usu->genero == 2)
									Femenino
								@else
									Masculino
								@endif
								<br>
								Celular: {{ $usu->celular }} <br>
								Fecha Nacimiento: {{ $usu->fn }}
						</p>
						</div>
						<div class="col-md-4">
							<h3>{{ $usu->correo }}</h3>
						</div>
						<div class="col-md-1">
							<h3>
							@if($usu->activo == 1)
								Activo
							@else
								Inactivo
							@endif
							</h3>
						</div>
						<div class="col-md-2"><br>
								<form action="{{ route('editar', ['id' => $usu->id_usuario]) }}" method="GET" name="editar">
					                <input type="submit" class="form-control" value="Editar">
				                </form>
                                <form action="{{ route('borraru', ['id' => $usu->id_usuario]) }}" method="GET" name="borrar">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
					                <input type="submit" class="form-control" value="Borrar">
				                </form>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
    @endsection
