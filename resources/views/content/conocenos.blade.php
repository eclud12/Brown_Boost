@extends('layouts.empleado')

    @section('contenido')
	<section id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<h1 class="wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">BROWN<span>BOOSTS</span></h1>
					<div class="element">
                        <div class="sub-element">BROWN BOOST</div>
                        <div class="sub-element">HOLA BIENVENIDO</div>
                        <div class="sub-element">EL PODER DE UNA MORDIDA</div>
                    </div>
                    <br>
					<a data-scroll href="{{ route('login') }}" class="btn btn-info" data-wow-offset="50" data-wow-delay="0.6s">Iniciar Sesión</a>
					<a data-scroll href="{{ route('registro') }}" class="btn btn-info" data-wow-offset="50" data-wow-delay="0.6s">Registro</a>
				</div>
			</div>
		</div>
	</section>

	<!-- start team -->
	<section id="team">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>BROWN BOOST</span> EQUIPO</h2>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.3s">
					<div class="team-wrapper">
						<img src="images/Img_Sharon.jpg" width="480" height="480" class="img-responsive" alt="team img 1">
						<div class="team-des">
							<h5>SHARON MARIEL GOMEZ HERNANDEZ</h5>
							<span>DIRECTOR DE LA EMPRESA</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
					<div class="team-wrapper">
						<img src="images/Img_Jose.jpg" class="img-responsive" alt="team img 3">
						<div class="team-des">
							<h5>JOSE ANTONIO ALVA MONTES</h5>
							<span>CALIDAD</span>
						</div>
					</div>
				</div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
					<div class="team-wrapper">
						<img src="images/Img_Adan.jpg" class="img-responsive" alt="team img 4">
						<div class="team-des">
							<h5>ADAN IBRIAN MEJIA DE JESUS</h5>
							<span>PRODUCCION</span>
						</div>
					</div>
				</div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
					<div class="team-wrapper">
						<img src="images/Img_Gerardo.jpg" class="img-responsive" alt="team img 5">
						<div class="team-des">
							<h5>GERARDO ALVA REYES</h5>
							<span>ADMINISTRATIVA</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end team -->
	<section id="home">
		<div class="container">
			<div class="row">
			<div>
			  <h1 class="wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">UBICACIÓN<span>BROWN BOOST</span></h1>
	<div>
		<iframe width="1200" height="600" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.7392504307363!2d-99.60764124998835!3d19.25019248692438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cd8ba4fb16639b%3A0x8935b96de0eccd25!2sIglesia%20del%20Calvario!5e0!3m2!1ses-419!2smx!4v1618454451443!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
	</div>
	</div>
	</div>
	</section>

	<!-- start service -->
	<section id="service">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">NOSOTROS SOMOS &nbsp; <span>BROWN BOOST</span></h2>
				</div>
				<div class="col-md-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
					<center><i class="fa fa-laptop"></i></center>
					<h4 style=text-align:center;>Somos</h4>
					<p style=text-align:justify;>Los BRWONIES que creamos son pasteles dulces, pequeños, que tienen una cubierta de chocolate
                        y pueden incluir en su interior trocitos de nuez, chocolate, mantequilla de cacahuate
                        y una variedad de ingredientes.Su característica principal es que en el centro la masa
                        aparenta estar húmeda, con una textura un tanto gomosa y tienen una superficie
                        crujiente,son energéticamente densos y prácticamente no contienen fibra dietética
                    </p>
				</div>
				<div class="col-md-4 active wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">
					<center><i class="fa fa-cloud"></i></center>
					<h4 style=text-align:center>Nuestra serguridad</h4>
					<p style=text-align:justify;>Somos una industria dedicada a la elaboracion de productos alimienticios,
                        la cual elaboro un Brownie funcional que les permita a todos nuestros clientes
                        comsumir el producto sin la necesidad de afectar al cosumidor, es un producto el cual
                        proporciona un alto nivel de proteina , puesto que el principal ingrediente es el amaranto.
                    </p>
				</div>
				<div class="col-md-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
					<center><i class="fa fa-cog" ></i></center>
					<h4 style=text-align:center>Ayuda</h4>
					<p style=text-align:justify;>Somos una industria dedicada a la elaboracion de productos alimienticios,
                        la cual elaboro un Brownie funcional que les permita a todos nuestros clientes
                        comsumir el producto sin la necesidad de afectar al cosumidor, es un producto el cual
                        proporciona un alto nivel de proteina , puesto que el principal ingrediente es el amaranto.
                    </p>
				</div>
			</div>
		</div>
	</section>
	<!-- end servie -->

    <section id="team">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.3s">
					<div class="team-wrapper">
						<img src="images/Img_Brown.jpg" width="480" height="480" class="img-responsive" alt="team img 6">
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
					<div class="team-wrapper">
						<img src="images/Img_Brown1.png" class="img-responsive" alt="team img 7">
					</div>
				</div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
					<div class="team-wrapper">
						<img src="images/Img_Brown2.png" class="img-responsive" alt="team img 8">
					</div>
				</div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
					<div class="team-wrapper">
						<img src="images/Img_Brown4.png" class="img-responsive" alt="team img 9">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end portfolio -->

	<!-- start contact -->
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">CONTÁCTANOS <span>BROWN BOOST</span>
					</h2>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-offset="50" data-wow-delay="0.9s">
					<form action="{{ route('correo') }}" method="get">
						{{ csrf_field() }}
						<label>NOMBRE</label>
						<input name="nombre" type="text" class="form-control">

						<label>CORREO</label>
						<input name="correo" type="email" class="form-control">

						<label>DESCRIPCIÓN</label>
						<textarea name="mensaje" rows="4" class="form-control"></textarea>

						<input type="submit" class="form-control">
					</form>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
					<address>
						<p class="address-title">ACERCATE Y UBÍCANOS</p>
						<span>Elaboracion de productos alimienticios</span>
						<p><i class="fa fa-phone"></i> 722-321-0685</p>
						<p><i class="fa fa-envelope-o"></i> dulcesevilla45@gmail.com</p>
						<p><i class="fa fa-map-marker"></i> Capulhuac #48</p>
                        <a href="https://api.whatsapp.com/send?phone=527223681617&text=Hola buen día, necesito informacion sobre sus productos" target="_blank">Contactanos por Whatsapp</a>
					</address>
				</div>
			</div>
		</div>
	</section>
	<!-- end contact -->
    @endsection
