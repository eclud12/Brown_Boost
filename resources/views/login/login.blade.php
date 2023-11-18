@extends('layouts.empleado')

    @section('contenido')
	<script src="https://www.google.com/recaptcha/api.js" async defer></script> 

	<section id="contact">
		<div class="container">
			<div>
			    <a href="{{route('home')}}"><h3 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Regresar</span></h3></a>
			</div>
            <div class="col">
					<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>Iniciar Sesión</span></h2>
				</div>
            <div class="col-md-4"></div>
			<div class="col-md-5" data-wow-offset="50" data-wow-delay="0.9s">
				<form action="{{ route('valida') }}" method="GET" name="guardar" onsubmit="return miFuncion(this)">
				{{ csrf_field() }}
                    <label>CORREO</label>
					<input type="text" name="correo" value="{{ old('correo') }}" class="form-control">
					<p>@if($errors->first('correo')) <i class="form-control">{{$errors->first('correo')}}</i>@endif</p>
                    <label>CONTRASEÑA</label>
					<input type="password" name="contrasena" value="{{ old('contrasena') }}" class="form-control">
					<p>@if($errors->first('contrasena')) <i class="form-control">{{$errors->first('contrasena')}}</i>@endif</p>

					<!--Captcha-->
					<div class="container">
          			<div class="form-group row">
            		<div class="g-recaptcha" data-sitekey="6LfxvdcgAAAAAJ_bsI-s9SqgZJZ1ZGtL8bQSXKG1"></div>
          			</div>
          			</div>
          			<!-- Fin de Captcha-->

					<input type="submit" class="form-control" value="INGRESAR" >
				</form>
			</div>
            <div class="col-md-3"></div>	
		</div>
    </section>
	<script>

  function miFuncion(a) {
    var response = grecaptcha.getResponse();

    if(response.length == 0){
        alert("Captcha no verificado");
        return false;
      event.preventDefault();
    } else {
      return true;
    }
  }
</script>
	@endsection