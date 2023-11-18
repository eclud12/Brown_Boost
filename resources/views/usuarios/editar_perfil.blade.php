@extends('layouts.layout')

    @section('contenido')
	<section id="contact">
		<div class="container">
			<div class="col-md-12">
				<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Edita tu <span> perfil</span>
				</h2>
			</div>
			<div class="align-self-xl-center" data-wow-offset="50" data-wow-delay="0.9s">
                <form action="{{ route('salvarper', ['id' => $usu->id_usuario]) }}" method="POST" name="salvar" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                    <label>NOMBRE</label>
					<input type="text" name="nombre" value="{{ $usu->nombre }}" class="form-control">
                    <label>APELLIDO PATERNO</label>
					<input type="text" name="app" value="{{ $usu->app }}" class="form-control">
                    <label>APELLIDO MATERNO</label>
					<input type="text" name="apm" value="{{ $usu->apm }}" class="form-control">
                    <label>FECHA DE NACIMIENTO</label>
					<input type="date" name="fn" value="{{ $usu->fn }}" class="form-control">
                    <label>GENERO:</label><br>
					@if($usu->genero == 1)
						Masculino<input type="radio" name="genero" value = "1" checked>
						Femenino<input type="radio" name="genero" value = "2">
						<br><br>
					@else
						Masculino<input type="radio" name="genero" value = "1">
						Femenino<input type="radio" name="genero" value = "2" checked>
                        <br><br>
                    @endif
                    <label>CELULAR</label>
					<input type="text" name="celular" value="{{ $usu->celular }}" class="form-control">
                    <label>CORREO</label>
					<input type="email" name="correo" value="{{ $usu->correo }}" class="form-control">
                    <label>CONTRASEÑA</label>
					<input type="password" name="contrasena" value="{{ $usu->contrasena }}" class="form-control">
                    <label>IMAGEN</label>
					<input type="file" name="img1" class="form-control">
                    <input type="text" name="img2" value="{{ $usu->img }}" class="form-control"><br>
					@if($usu->activo == 1)
						Activo<input type="radio" name="activo" value = "1" checked>
						Inactivo<input type="radio" name="activo" value = "2">
						<br><br>
					@else
						Activo<input type="radio" name="activo" value = "1">
						Inactivo<input type="radio" name="activo" value = "0" checked>
						<br><br>
					@endif
					<input type="submit" class="form-control" value="GUARDAR">
				</form>
			</div>	
		</div>
    </section>
	@endsection