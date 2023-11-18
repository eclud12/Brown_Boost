@extends('layouts.layout')

    @section('contenido')
	<section id="contact">
		<div class="container">
			<div>
        	    <a href="{{ route('producto')}}"><h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Regresar</span></h3></a>
	    	</div>
			<div class="col-md-12">
				<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Edita el <span> producto</span>
				</h2>
			</div>
			<div class="align-self-xl-center" data-wow-offset="50" data-wow-delay="0.9s">
                <form action="{{ route('salvarp', ['id' => $prod->id_producto]) }}" method="POST" name="salvarp" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
					<label>CLAVE</label>
					<input name="clave" value="{{ $prod->clave }}" class="form-control">
					<label>NOMBRE</label>
					<input type="text" name="nombre" value="{{ $prod->nombre }}" class="form-control">
					<label>PRECIO</label>
					<input type="text" name="precio" value="{{ $prod->precio }}" class="form-control"><br>
                    <label>IMAGEN</label>
					<input type="file" name="img1" class="form-control">
                    <input type="text" name="img2" value="{{ $prod->img }}" class="form-control"><br>
					<label>TAMAÑO:</label><br>
					@if($prod->tamaño == 1)
						Grande <input type="radio" name="tamaño" value = "1" checked>
						Mediano<input type="radio" name="tamaño" value = "2">
						Pequeño<input type="radio" name="tamaño" value = "3">
						<br><br>
					@elseif($prod->tamaño == 2)
						Grande <input type="radio" name="tamaño" value = "1">
						Mediano<input type="radio" name="tamaño" value = "2" checked>
						Pequeño<input type="radio" name="tamaño" value = "3">
						<br><br>
					@elseif($prod->tamaño ==3)
						Grande <input type="radio" name="tamaño" value = "1">
						Mediano<input type="radio" name="tamaño" value = "2">
						Pequeño<input type="radio" name="tamaño" value = "3" checked>
						<br><br>
					@endif
					<input type="submit" class="form-control" value="GUARDAR">
				</form>
			</div>	
		</div>
    </section>
	@endsection