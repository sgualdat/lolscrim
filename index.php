<!DOCTYPE html>

<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>OnlyScrim</title>
		
		<!-- Bootstrap Core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Customizable CSS -->
		<link href="assets/css/main.css" rel="stylesheet" data-skrollr-stylesheet>
		<link href="assets/css/green.css" rel="stylesheet" title="Color">
		<link href="assets/css/owl.carousel.css" rel="stylesheet">
		<link href="assets/css/owl.transitions.css" rel="stylesheet">
		<link href="assets/css/animate.min.css" rel="stylesheet">
		
		<!-- Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Lato:400,900,300,700" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic" rel="stylesheet">
		
		<!-- Icons/Glyphs -->
		<link href="assets/fonts/fontello.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/logo3.png">
		
		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body id="top">

		<?php
			function registrarEquipo(){

				$password = $_POST['password'];
				$passwordconfirm = $_POST['passwordconfirm'];

				if (strcmp($password, $passwordconfirm) == 0) {
					$nombre_equipo = $_POST['nombre_equipo'];
					$elo = $_POST['elo'];
					$email = $_POST['email'];
					include("12e47baJKD93153mS0zBsD3sQVfC.php");
                    $link = mysqli_connect("127.0.0.1","root","","db696349657");
                    $token = generaPass();
                    $input = encriptar($email, $token);
                    $enlaceImagen = "probando";
                    $resultado = $link->query("SELECT * FROM `usuario` WHERE `email` = '$email' OR `nombre_equipo`= '$nombre_equipo'");
                    $filas=$resultado->num_rows;
                    if ($filas==0) {
                    $link->query("INSERT INTO `usuario`(`email`, `password`, `token`, `nombre_equipo`, `elo`, `input`, `logo_equipo`, `verificado`) VALUES ('$email','$password','$token','$nombre_equipo','$elo','$input','$enlaceImagen','0')");
                    }
                    else{
                    	?>
                            <div class="alert alert-warning alert-dismissable">
                               <strong>El usuario o el equipo ya existen</strong>
                            </div>
                        <?php 
                    }
				}
				else{
					?>
                         <div class="alert alert-warning alert-dismissable">
                            <strong>Las contraseñas no coinciden</strong>
                         </div>
                    <?php 
				}
			}
		?>

		
		<!-- ============================================================= HEADER ============================================================= -->
		
		<header>
			<div class="navbar">
				
				<div class="navbar-header">
					<div class="container">
						
						<ul class="social pull-right">
							<li><a href="#"><i class="icon-s-facebook"></i></a></li>
							<li><a href="#"><i class="icon-s-twitter"></i></a></li>
						</ul><!-- /.social -->
						
						<!-- ============================================================= LOGO MOBILE ============================================================= -->
						
						<a class="navbar-brand" href="#"><img src="assets/images/logo.png" class="logo" alt=""></a>
						
						<!-- ============================================================= LOGO MOBILE : END ============================================================= -->
						
						<a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a>
						
					</div><!-- /.container -->
				</div><!-- /.navbar-header -->
				
				<div class="yamm">
					<div class="navbar-collapse collapse">
						<div class="container">
							
							<!-- ============================================================= LOGO ============================================================= -->
							
							<a class="navbar-brand scroll-to" href="#top"><img src="assets/images/logo.png"></a>
							
							<!-- ============================================================= LOGO : END ============================================================= -->
							
							
							<!-- ============================================================= MAIN NAVIGATION ============================================================= -->
							
							<ul class="nav navbar-nav pull-right">
								
								<li><a href="#about" class="scroll-to" data-anchor-offset="0">¿Que es OnlyScrim?</a></li>
								<li><a href="#funcionamiento" class="scroll-to" data-anchor-offset="0">¿Como funciona?</a></li>
								<!--<li><a href="#modal-registro" data-toggle="modal" data-anchor-offset="0">Registrarse</a></li>-->
								<li><a href="login.php" data-anchor-offset="0">Acceso</a></li>
								<li><a href="#contacto" class="scroll-to" data-anchor-offset="0">Contacto</a></li>
								
							</ul><!-- /.nav -->
							
							<!-- ============================================================= MAIN NAVIGATION : END ============================================================= -->
							
						</div><!-- /.container -->
					</div><!-- /.navbar-collapse -->
				</div><!-- /.yamm -->
			</div><!-- /.navbar -->
		</header>
		
		<!-- ============================================================= HEADER : END ============================================================= -->
		
		
		<!-- ============================================================= MAIN ============================================================= -->
		
		<main>
			
			<!-- ============================================================= MODAL Registro ============================================================= -->
			
			<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="modal-registro" aria-hidden="true">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						
						<div class="modal-header">
							<center><h2 class="modal-title" id="modal-registro">Formulario de registro</h2></center>
						</div><!-- /.modal-header -->
						
						<!-- ============================================================= MODAL CONTENT ============================================================= -->
						
						<div class="modal-body">
							
							<!-- ============================================================= SECTION – PORTFOLIO POST ============================================================= -->
							
							<section id="portfolio-post">
								<div class="container inner-top-xs inner-bottom">
									
									<div class="row">
										<div class="col-sm-12">

											<?php
												if (isset($_POST['registro'])) {
													registrarEquipo();
												}
											?>

											<form class="form-horizontal" method="POST" action="">
											<fieldset>

											<center><img src="assets/images/logo2.png"></center>
											<br>

											<!-- Text input-->
											<div class="form-group">
											  <label class="col-md-4 control-label" for="nombre_equipo">Nombre del equipo</label>  
											  <div class="col-md-4">
											  <input id="nombre_equipo" name="nombre_equipo" type="text" placeholder="" class="form-control input-md" required="">
											    
											  </div>
											</div>

											<!-- Select Basic -->
											<div class="form-group">
											  <label class="col-md-4 control-label" for="elo">Division del equipo</label>
											  <div class="col-md-4">
											    <select id="elo" name="elo" class="form-control">
											      <option value="Bronce">Bronce</option>
											      <option value="Plata">Plata</option>
											      <option value="Oro">Oro</option>
											      <option value="Platino">Platino</option>
											      <option value="Diamante">Diamante</option>
											      <option value="Master">Master</option>
											      <option value="Challenger">Challenger</option>
											    </select>
											  </div>
											</div>

											<!-- Text input-->
											<div class="form-group">
											  <label class="col-md-4 control-label" for="email">Email de contacto</label>  
											  <div class="col-md-4">
											  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
											    
											  </div>
											</div>

											<!-- Password input-->
											<div class="form-group">
											  <label class="col-md-4 control-label" for="password">Contraseña</label>
											  <div class="col-md-4">
											    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
											    
											  </div>
											</div>

											<!-- Password input-->
											<div class="form-group">
											  <label class="col-md-4 control-label" for="passwordconfirm">Confirmar contraseña</label>
											  <div class="col-md-4">
											    <input id="passwordconfirm" name="passwordconfirm" type="password" placeholder="" class="form-control input-md" required="">
											    
											  </div>
											</div>

											<!-- Button -->
											<div class="form-group">
											  <label class="col-md-4 control-label" for="registro"></label>
											  <div class="col-md-4">
											    <center><button id="registro" name="registro" class="btn btn-primary">Registrarse</button></center>
											  </div>
											</div>

											</fieldset>
											</form>
										</div><!-- /.col -->
									</div><!-- /.row -->
									
								</div><!-- /.container -->
								
							</section>
							
							<!-- ============================================================= SECTION – PORTFOLIO POST : END ============================================================= -->
							
						</div><!-- /.modal-body -->
						
						<!-- ============================================================= MODAL CONTENT : END ============================================================= -->
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div><!-- /.modal-footer -->
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			<!-- ============================================================= MODAL Registro : END ============================================================= -->


			<!-- ============================================================= SECTION – HERO ============================================================= -->
			
			<section id="hero">
				<div id="owl-main" class="owl-carousel height-md owl-inner-nav owl-ui-lg">
					
					<div class="item" style="background-image: url(assets/images/slide2.jpg);">
						<div class="container">
							<div class="caption vertical-bottom text-left">
								
								<h1 class="fadeInDown-1 dark-bg light-color">Juega contra otros equipos totalmente gratuito</h1>
								
							</div><!-- /.caption -->
						</div><!-- /.container -->
					</div><!-- /.item -->
					
					<div class="item" style="background-image: url(assets/images/slide1.png);">
						<div class="container">
							<div class="caption vertical-bottom text-left">
								
								<h1 class="fadeInDown-1 dark-bg light-color">Organiza tus entrenamientos</h1>
								
							</div><!-- /.caption -->
						</div><!-- /.container -->
					</div><!-- /.item -->
					
					<div class="item" style="background-image: url(assets/images/slide3.jpg);">
						<div class="container">
							<div class="caption vertical-top text-left">
								
								<h1 class="fadeInDown-1 light-color">Mejora tu rendimiento</h1>
								
							</div><!-- /.caption -->
						</div><!-- /.container -->
					</div><!-- /.item -->
					
				</div><!-- /.owl-carousel -->
			</section>
			
			<!-- ============================================================= SECTION – HERO : END ============================================================= -->
			
			
			<!-- ============================================================= SECTION – PRODUCT ============================================================= -->
			
			<section id="about">
				<div class="container inner">

					<div class="row">
						<div class="col-sm-12 portfolio">
							
							<div class="row">
						
								<div class="col-sm-6 inner-right-xs text-right">
									<figure><img src="assets/images/leagueoflegends.png" alt=""></figure>
								</div><!-- /.col -->
								
								<div class="col-sm-6 inner-top-xs inner-left-xs">
									<h2>¿Que es OnlyScrim?</h2>
									<p>Mejora la gestion de tus entrenamientos buscando scrims contra otros equipos de manera rapida y sencilla desde una unica plataforma totalmente gratuita.</p>
								</div><!-- /.col -->
								
							</div><!-- /.row -->
							
						</div><!-- /.col -->
					</div><!-- /.row -->
				
				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION – PRODUCT : END ============================================================= -->
			
			
			<!-- ============================================================= SECTION – VISIT OUR STORE ============================================================= -->
		
			<section id="visit-our-store" class="img-bg img-bg-soft tint-bg" style="background-image: url(assets/images/art/image-background04.jpg);">
				<div class="container inner">
					
					<div class="row">
						<div class="col-md-8 col-sm-9">
							<header>
								<h2>Comprueba las estadisticas despues de cada partido y prepara las competiciones para llegar al mas alto nivel</h2>
							</header>
							<!--<a href="#modal-registro" data-toggle="modal" class="btn btn-large">Registrate</a>-->
						</div><!-- /.col -->
					</div><!-- /.row -->
					
				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION – VISIT OUR STORE : END ============================================================= -->
			
			
			<!-- ============================================================= SECTION – REASONS ============================================================= -->
			
			<section id="funcionamiento">
				<div class="container inner">
					
					<div class="row">
						<div class="col-md-8 col-sm-9 center-block text-center">
							<header>
								<h1>¿Como funciona?</h1>
							</header>
						</div><!-- /.col -->
					</div><!-- /.row -->
					
					<div class="row inner-top-sm">
						<div class="col-xs-12">
							<div class="tabs tabs-reasons tabs-circle-top tab-container">
								
								<ul class="etabs text-center">
									<li class="tab"><a href="#tab-1"><div>1</div>Registrate</a></li>
									<li class="tab"><a href="#tab-2"><div>2</div>Busca un partido</a></li>
									<li class="tab"><a href="#tab-3"><div>3</div>Juega</a></li>
								</ul><!-- /.etabs -->
								
								<div class="panel-container">
									
									<div class="tab-content" id="tab-1">
										<div class="row">
											
											<div class="col-md-5 col-md-push-5 col-md-offset-1 col-sm-6 col-sm-push-6 inner-left-xs">
												<figure><img src="assets/images/formularioregistro.png" alt=""></figure>
											</div><!-- /.col -->
											
											<div class="col-md-5 col-md-pull-5 col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
												<h2>Registrate</h2>
												<h3>Rellena el formulario con tus datos para poder acceder a la plataforma.</h3>
											</div><!-- /.col -->
											
										</div><!-- /.row -->
									</div><!-- /.tab-content -->
									
									<div class="tab-content" id="tab-2">
										<div class="row">
											
											<div class="col-md-5 col-md-offset-1 col-sm-6 inner-right-xs">
												<figure><img src="assets/images/buscarpartido.png" alt=""></figure>
											</div><!-- /.col -->
											
											<div class="col-md-5 col-sm-6 inner-top-xs inner-left-xs">
												<h2>Busca un partido</h2>
												<h3>Propon tu un partido o selecciona entre las propuestas de los otros equipos.</h3>
											</div><!-- /.col -->
											
										</div><!-- /.row -->
									</div><!-- /.tab-content -->
									
									<div class="tab-content" id="tab-3">
										<div class="row">
											
											<div class="col-md-5 col-md-push-5 col-md-offset-1 col-sm-6 col-sm-push-6 inner-left-xs">
												<figure><img src="assets/images/codigotorneo.png" alt=""></figure>
											</div><!-- /.col -->
											
											<div class="col-md-5 col-md-pull-5 col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
												<h2>Juega</h2>
												<h3>Introduce el codigo de torneo en el cliente de League of Legends y accederas directamente a la sala de partida.</h3>
											</div><!-- /.col -->
											
										</div><!-- /.row -->
									</div><!-- /.tab-content -->
									 
								</div><!-- /.panel-container -->
								 
							</div><!-- /.tabs -->
						</div><!-- /.col -->
					</div><!-- /.row -->
					
				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION – REASONS : END ============================================================= -->
			
			
			<!-- ============================================================= SECTION – GET IN TOUCH ============================================================= -->
			
			<section id="contacto" class="inner-bottom">
				<div class="container inner light-bg">
					<div class="row">
						<div class="col-md-8 col-sm-9 center-block text-center">
							<header>
								<h1>¿Quieres ponerte en contacto con nosotros?</h1>
							</header>
							<a href="#modal-contact01" class="btn btn-large" data-toggle="modal">Contacto</a>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION – GET IN TOUCH : END ============================================================= -->
			
			
			<!-- ============================================================= MODALS ============================================================= -->
			
			
			<!-- ============================================================= MODAL CONTACT01 ============================================================= -->
			
			<div class="modal fade" id="modal-contact01" tabindex="-1" role="dialog" aria-labelledby="modal-contact01" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icon-cancel-1"></i></span></button>
							<center><h2 class="modal-title" id="modal-contact01">Formulario de contacto</h2></center>
						</div><!-- /.modal-header -->
						
						<!-- ============================================================= MODAL CONTENT ============================================================= -->
						
						<div class="modal-body">
							
							<!-- ============================================================= SECTION – CONTACT FORM ============================================================= -->
							
							<section id="contact-form">
								<div class="container inner-top-xs inner-bottom">

									<center><img src="assets/images/logo2.png"></center>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="row">
												
												<div class="col-sm-6 outer-top-md inner-right-sm">
													
													<h2>Deja tu mensaje</h2>
													
													<form id="contactform" class="forms" action="contact.php" method="post">
														
														<div class="row">
															<div class="col-sm-6">
																<input type="text" name="name" class="form-control" placeholder="Nombre">
															</div><!-- /.col -->
														</div><!-- /.row -->
														
														<div class="row">
															<div class="col-sm-6">
																<input type="email" name="email" class="form-control" placeholder="Email">
															</div><!-- /.col -->
														</div><!-- /.row -->
														
														<div class="row">
															<div class="col-sm-6">
																<input type="text" name="subject" class="form-control" placeholder="Asunto">
															</div><!-- /.col -->
														</div><!-- /.row -->
														
														<div class="row">
															<div class="col-sm-12">
																<textarea name="message" class="form-control" placeholder="Deja tu mensaje..."></textarea>
															</div><!-- /.col -->
														</div><!-- /.row -->
														
														<button type="submit" class="btn btn-default btn-submit">Enviar</button>
														
													</form>
													
												</div><!-- ./col -->
												
												<div class="col-sm-6 outer-top-md inner-left-sm border-left">
													
													<h3>OnlyScrim</h3>
													<ul class="contacts">
														<li><a href="mailto:onlyscrim@gmail.com"><i class="icon-mail-1 contact"></i> onlyscrim@gmail.com</a></li>
													</ul><!-- /.contacts -->
													
													<div class="social-network">
														<h3>Social</h3>
														<ul class="social">
															<li><a href="#"><i class="icon-s-facebook"></i></a></li>
															<li><a href="#"><i class="icon-s-twitter"></i></a></li>
														</ul><!-- /.social -->
													</div><!-- /.social-network -->
													
												</div><!-- /.col -->
												
											</div><!-- /.row -->
										</div><!-- /.col -->
									</div><!-- /.row -->
									
								</div><!-- /.container -->
							</section>
							
							<!-- ============================================================= SECTION – CONTACT FORM : END ============================================================= -->
							
						</div><!-- /.modal-body -->
						
						<!-- ============================================================= MODAL CONTENT : END ============================================================= -->
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div><!-- /.modal-footer -->
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			<!-- ============================================================= MODAL CONTACT01 : END ============================================================= -->
			
			
			<!-- ============================================================= MODALS : END ============================================================= -->
			
		</main>
		
		<!-- ============================================================= MAIN : END ============================================================= -->
		
		
		<!-- ============================================================= FOOTER ============================================================= -->
		
		<footer class="dark-bg">
		  
			<div class="footer-bottom">
				<div class="container inner">
					<p class="pull-left">© 2017 OnlyScrim. Todos los derechos reservados.</p>
				</div><!-- .container -->
			</div><!-- .footer-bottom -->
		</footer>
		
		<!-- ============================================================= FOOTER : END ============================================================= -->
		
		<!-- JavaScripts placed at the end of the document so the pages load faster -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.easing.1.3.min.js"></script>
		<script src="assets/js/jquery.form.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="assets/js/skrollr.min.js"></script>
		<script src="assets/js/skrollr.stylesheets.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>
		<script src="assets/js/waypoints-sticky.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jquery.isotope.min.js"></script>
		<script src="assets/js/jquery.easytabs.min.js"></script>
		<script src="assets/js/google.maps.api.v3.js"></script>
		<script src="assets/js/viewport-units-buggyfill.js"></script>
		<script src="assets/js/scripts.js"></script>
		
		<!-- For demo purposes – can be removed on production -->
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/pink.css" rel="alternate stylesheet" title="Pink color">
		<link href="assets/css/purple.css" rel="alternate stylesheet" title="Purple color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/navy.css" rel="alternate stylesheet" title="Navy color">
		<link href="assets/css/gray.css" rel="alternate stylesheet" title="Gray color">
		
		<script src="switchstylesheet/switchstylesheet.js"></script>
		
		<script>
			$(document).ready(function(){ 
				$(".changecolor").switchstylesheet( { seperator:"color"} );
			});
		</script>
		<!-- For demo purposes – can be removed on production : End -->
	</body>
</html>