@extends('layouts.empleado')

    @section('contenido')
	<section id="contact">
		<div class="container">
			<div class="col-md-12">
				<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span> Registro</span>
				</h2>
			</div>
			<div class="align-self-xl-center" data-wow-offset="50" data-wow-delay="0.9s">
				<form action="{{ route('guardar1') }}" method="POST" name="guardar1" enctype="multipart/form-data">
				{{ csrf_field() }}
					<label>NOMBRE</label>
					<input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
					<p>@if($errors->first('nombre')) <i class="form-control">{{$errors->first('nombre')}}</i>@endif</p>
                    <label>APELLIDO PATERNO</label>
					<input type="text" name="app" value="{{ old('app') }}" class="form-control">
                    <p>@if($errors->first('app')) <i class="form-control">{{$errors->first('app')}}</i>@endif</p>
                    <label>APELLIDO MATERNO</label>
					<input type="text" name="apm" value="{{ old('apm') }}" class="form-control">
					<p>@if($errors->first('apm')) <i class="form-control">{{$errors->first('apm')}}</i>@endif</p>
                    <label>FECHA DE NACIMIENTO</label>
					<input type="date" name="fn" value="{{ old('fn') }}" class="form-control">
					<p>@if($errors->first('fn')) <i class="form-control">{{$errors->first('fn')}}</i>@endif</p>
                    <label>GENERO:</label><br>
					Masculino<input type="radio" name="genero" value = "1">
					Femenino<input type="radio" name="genero" value = "2">
					<p>@if($errors->first('genero')) <i class="form-control">{{$errors->first('genero')}}</i>@endif</p>
                    <label>CELULAR</label>
					<input type="text" name="celular" value="{{ old('celular') }}" class="form-control">
                    <p>@if($errors->first('celular')) <i class="form-control">{{$errors->first('celular')}}</i>@endif</p>
                    <label>CORREO</label>
					<input type="email" name="correo" value="{{ old('correo') }}" class="form-control">
                    <p>@if($errors->first('correo')) <i class="form-control">{{$errors->first('correo')}}</i>@endif</p>
                    <label>CONTRASEÑA</label>
					<input type="password" name="contrasena" value="{{ old('contrasena') }}" class="form-control">
                    <p>@if($errors->first('contrasena')) <i class="form-control">{{$errors->first('contrasena')}}</i>@endif</p>
                    <label>IMAGEN</label>
					<input type="file" name="img" value="{{ old('img') }}" class="form-control">
                    <p>@if($errors->first('img')) <i class="form-control">{{$errors->first('img')}}</i>@endif</p>
					<input type="submit" class="form-control" value="GUARDAR">
				</form>
			</div>	
		</div>
    </section>
	@endsection