@extends('layouts.layout')

    @section('contenido')
	<section id="contact">
		<div class="container">
			<div class="col-md-12">
				<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Agrega tu <span> producto</span>
				</h2>
			</div>
			<div class="align-self-xl-center" data-wow-offset="50" data-wow-delay="0.9s">
				<form action="{{ route('guardarp') }}" method="POST" name="guardarp" enctype="multipart/form-data">
				{{ csrf_field() }}
					<label>CLAVE</label>
					<input type="text" name="clave" value="{{ old('clave') }}" class="form-control">
					<p>@if($errors->first('clave')) <i class="form-control">{{$errors->first('clave')}}</i>@endif</p>
					<label>NOMBRE</label>
					<input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
					<p>@if($errors->first('nombre')) <i class="form-control">{{$errors->first('nombre')}}</i>@endif</p>
					<label>PRECIO</label>
					<input type="text" name="precio" value="{{ old('precio') }}" class="form-control">
					<p>@if($errors->first('precio')) <i class="form-control">{{$errors->first('precio')}}</i>@endif</p>
                    <label>TAMAÑO:</label><br>
					Grande<input type="radio" name="tamaño" value = "1">
					Mediano<input type="radio" name="tamaño" value = "2">
					Pequeño<input type="radio" name="tamaño" value = "3">
					<p>@if($errors->first('tamaño')) <i class="form-control">{{$errors->first('tamaño')}}</i>@endif</p>
					<label>IMAGEN</label>
					<input type="file" name="img" value="{{ old('img') }}" class="form-control">
					<p>@if($errors->first('img')) <i class="form-control">{{$errors->first('img')}}</i>@endif</p>
					<input type="submit" class="form-control" value="GUARDAR">
				</form>
			</div>	
		</div>
    </section>
	@endsection