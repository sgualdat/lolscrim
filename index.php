<!DOCTYPE html>

<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>LOL Scrim</title>
		
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
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		
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
                    $link = mysqli_connect("127.0.0.1","root","","lolscrim");
                    $token = generaPass();
                    $link->query("INSERT INTO `usuario`(`email`, `password`, `token`, `nombre_equipo`, `elo`) VALUES ('$email','$password','$token','$nombre_equipo','$elo')");
				}
				else{
					//error no son iguales ambas contraseñas
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
						
						<a class="navbar-brand" href="#"><img src="assets/images/logo.svg" class="logo" alt=""></a>
						
						<!-- ============================================================= LOGO MOBILE : END ============================================================= -->
						
						<a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a>
						
					</div><!-- /.container -->
				</div><!-- /.navbar-header -->
				
				<div class="yamm">
					<div class="navbar-collapse collapse">
						<div class="container">
							
							<!-- ============================================================= LOGO ============================================================= -->
							
							<a class="navbar-brand scroll-to" href="#top"><img src="assets/images/logo.svg" class="logo" alt=""></a>
							
							<!-- ============================================================= LOGO : END ============================================================= -->
							
							
							<!-- ============================================================= MAIN NAVIGATION ============================================================= -->
							
							<ul class="nav navbar-nav pull-right">
								
								<li><a href="#product" class="scroll-to" data-anchor-offset="0">Product</a></li>
								<li><a href="#visit-our-store" class="scroll-to" data-anchor-offset="0">Store</a></li>
								<li><a href="#reasons" class="scroll-to" data-anchor-offset="0">Benefits</a></li>
								<li><a href="#modal-registro" data-toggle="modal" data-anchor-offset="0">Registrarse</a></li>
								<li><a href="login.php" data-anchor-offset="0">Acceso</a></li>
								<li><a href="#get-in-touch" class="scroll-to" data-anchor-offset="0">Contacto</a></li>
								
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
							<center><h2 class="modal-title" id="modal-registro">Registro</h2></center>
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
					
					<div class="item" style="background-image: url(assets/images/art/slider01.jpg);">
						<div class="container">
							<div class="caption vertical-center text-center">
								
								<h1 class="fadeInDown-1 light-color">Made for Designers</h1>
								<p class="fadeInDown-2 medium-color">Create your online portfolio in minutes with the professionally and lovingly designed REEN website template. Customize your site with versatile and easy to use features.</p>
								<div class="fadeInDown-3">
									<a href="#" class="btn btn-large">Get started now</a>
								</div><!-- /.fadeIn -->
								
							</div><!-- /.caption -->
						</div><!-- /.container -->
					</div><!-- /.item -->
					
					<div class="item" style="background-image: url(assets/images/art/slider02.jpg);">
						<div class="container">
							<div class="caption vertical-center text-right">
								
								<h1 class="fadeInLeft-1 light-color">Fresh and <br>beautiful design</h1>
								<p class="fadeInLeft-2 light-color">REEN is designed to showcase your talent and put your work in the forefront. <br>Professionally use of typography and layout that fits your content.</p>
								<div class="fadeInLeft-3">
									<a href="#" class="btn btn-large">Get started now</a>
								</div><!-- /.fadeIn -->
								
							</div><!-- /.caption -->
						</div><!-- /.container -->
					</div><!-- /.item -->
					
					<div class="item" style="background-image: url(assets/images/art/slider03.jpg);">
						<div class="container">
							<div class="caption vertical-center text-left">
								
								<h1 class="fadeInRight-1 dark-bg light-color"><span>Clean and <br>reusable code</span></h1>
								<p class="fadeInRight-2 dark-color">The clean code allows you to easily copy code blocks from content <br>modules and past them in different places or layouts.</p>
								<div class="fadeInRight-3">
									<a href="#" class="btn btn-large">Get started now</a>
								</div><!-- /.fadeIn -->
								
							</div><!-- /.caption -->
						</div><!-- /.container -->
					</div><!-- /.item -->
					
					<div class="item" style="background-image: url(assets/images/art/slider04.jpg);">
						<div class="container">
							<div class="caption vertical-top text-right">
								
								<h1 class="fadeIn-1 dark-bg light-color"><span>Just focus on <br>your creativity</span></h1>
								<p class="fadeIn-2 light-color">Take a break from messing around with heavy coding and spend <br>your time brainstorming ideas for your next project.</p>
								<div class="fadeIn-3">
									<a href="#" class="btn btn-large">Get started now</a>
								</div><!-- /.fadeIn -->
								
							</div><!-- /.caption -->
						</div><!-- /.container -->
					</div><!-- /.item -->
					
					<div class="item" style="background-image: url(assets/images/art/slider05.jpg);">
						<div class="container">
							<div class="caption vertical-top text-center">
								
								<h1 class="fadeInDown-1 light-color">Showcase <br>your content</h1>
								<p class="fadeInDown-2 medium-color">With REEN you have the possibility to create websites for various <br>contents quickly and easily. Now it's up to you!</p>
								<div class="fadeInDown-3">
									<a href="#" class="btn btn-large">Get started now</a>
								</div><!-- /.fadeIn -->
								
							</div><!-- /.caption -->
						</div><!-- /.container -->
					</div><!-- /.item -->
					
				</div><!-- /.owl-carousel -->
			</section>
			
			<!-- ============================================================= SECTION – HERO : END ============================================================= -->
			
			
			<!-- ============================================================= SECTION – PRODUCT ============================================================= -->
			
			<section id="product">
				<div class="container inner">
					
					<div class="row">
						
						<div class="col-sm-6 inner-right-xs text-right">
							<figure><a href="#modal-product01" data-toggle="modal"><img src="assets/images/art/product01.jpg" alt=""></a></figure>
						</div><!-- /.col -->
						
						<div class="col-sm-6 inner-top-xs inner-left-xs">
							<h2>Fully flexible user interface</h2>
							<p>Magnis modipsae que lib voloratati andigen daepeditem quiate ut reporemni aut labor. Laceaque quiae sitiorem rest non restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta oreprerum tibusam. Eumenis et consent accullignis dentibea autem inisita posae volor conecus resto explabo.</p>
							<a href="#modal-product01" class="txt-btn" data-toggle="modal">Check out the functions</a>
						</div><!-- /.col -->
						
					</div><!-- /.row -->
					
					<div class="row inner-top-md">
						
						<div class="col-sm-6 col-sm-push-6 inner-left-xs">
							<figure><a href="#modal-product01" data-toggle="modal"><img src="assets/images/art/product02.jpg" alt=""></a></figure>
						</div><!-- /.col -->
						
						<div class="col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
							<h2>Over 14,000 designs available</h2>
							<p>Magnis modipsae que lib voloratati andigen daepeditem quiate es reporemus aut labor. Laceaque quiae sitiorem rest non restibusaes dem tumquam core posae volor remped modis volor. Doloreiur quia commolu ptatemp dolupta oreprerum tibusam eumenis et consent accullignis lib dentibea autem inisita. Conecus iure posae volor remped modis aut accabora incim resto explabo eictemperum quiae sitiorem.</p>
							<a href="#modal-product01" class="txt-btn" data-toggle="modal">Visit the showroom</a>
						</div><!-- /.col -->
						
					</div><!-- /.row -->
					
					<div class="row inner-top-md">
						
						<div class="col-sm-6 inner-right-xs text-right">
							<figure><a href="#modal-product01" data-toggle="modal"><img src="assets/images/art/product03.jpg" alt=""></a></figure>
						</div><!-- /.col -->
						
						<div class="col-sm-6 inner-top-xs inner-left-xs">
							<h2>Social media made even easier</h2>
							<p>Magnis modipsae que lib voloratati andigen daepeditem quiate ut reporemni aut labor. Laceaque quiae sitiorem rest non restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta oreprerum tibusam emnis et consent accullignis.</p>
							<a href="#modal-product01" class="txt-btn" data-toggle="modal">Learn more about it</a>
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
								<h1>Customize your own model</h1>
								<p>Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam explabo.</p>
							</header>
							<a href="#" class="btn btn-large">Visit our store</a>
						</div><!-- /.col -->
					</div><!-- /.row -->
					
				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION – VISIT OUR STORE : END ============================================================= -->
			
			
			<!-- ============================================================= SECTION – REASONS ============================================================= -->
			
			<section id="reasons">
				<div class="container inner">
					
					<div class="row">
						<div class="col-md-8 col-sm-9 center-block text-center">
							<header>
								<h1>5 Reasons <br>why you should use our product</h1>
								<p>Doloreiur quia commolu dolupta oreprerum tibusam.</p>
							</header>
						</div><!-- /.col -->
					</div><!-- /.row -->
					
					<div class="row inner-top-sm">
						<div class="col-xs-12">
							<div class="tabs tabs-reasons tabs-circle-top tab-container">
								
								<ul class="etabs text-center">
									<li class="tab"><a href="#tab-1"><div>1</div>Function</a></li>
									<li class="tab"><a href="#tab-2"><div>2</div>Simplicity</a></li>
									<li class="tab"><a href="#tab-3"><div>3</div>Design</a></li>
									<li class="tab"><a href="#tab-4"><div>4</div>Social</a></li>
									<li class="tab"><a href="#tab-5"><div>5</div>Community</a></li>
								</ul><!-- /.etabs -->
								
								<div class="panel-container">
									
									<div class="tab-content" id="tab-1">
										<div class="row">
											
											<div class="col-md-5 col-md-push-5 col-md-offset-1 col-sm-6 col-sm-push-6 inner-left-xs">
												<figure><img src="assets/images/art/product04.jpg" alt=""></figure>
											</div><!-- /.col -->
											
											<div class="col-md-5 col-md-pull-5 col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
												<h3>Function</h3>
												<p>Magnis modipsae que lib voloratati andigen daepedor quiate ut reporemni aut labor. Laceaque quiae sitiorem ut restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent accullignis lomnus.</p>
											</div><!-- /.col -->
											
										</div><!-- /.row -->
									</div><!-- /.tab-content -->
									
									<div class="tab-content" id="tab-2">
										<div class="row">
											
											<div class="col-md-5 col-md-offset-1 col-sm-6 inner-right-xs">
												<figure><img src="assets/images/art/product05.jpg" alt=""></figure>
											</div><!-- /.col -->
											
											<div class="col-md-5 col-sm-6 inner-top-xs inner-left-xs">
												<h3>Simplicity</h3>
												<p>Magnis modipsae que lib voloratati andigen daepedor quiate ut reporemni aut labor. Laceaque quiae sitiorem ut restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent accullignis lomnus.</p>
											</div><!-- /.col -->
											
										</div><!-- /.row -->
									</div><!-- /.tab-content -->
									
									<div class="tab-content" id="tab-3">
										<div class="row">
											
											<div class="col-md-4 col-md-push-3 col-md-offset-1 col-sm-6 inner-left-xs inner-right-xs">
												<figure><img src="assets/images/art/product06.jpg" alt=""></figure>
											</div><!-- /.col -->
											
											<div class="col-md-3 col-md-pull-4 col-sm-6 inner-top-xs">
												<h3>Design</h3>
												<p>Magnis modipsae lib voloratati andigen daepedor quiate aut labor. Laceaque quiae sitiorem resti est lore tumquam core posae volor uso remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent it accullignis orum lomnus.</p>
											</div><!-- /.col -->
											
											<div class="col-md-3 col-sm-6 inner-top-xs">
												<h3>User interface</h3>
												<p>Magnis modipsae lib voloratati andigen daepedor quiate aut labor. Laceaque quiae sitiorem resti est lore tumquam core posae volor uso remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent it accullignis orum lomnus.</p>
											</div><!-- /.col -->
											
										</div><!-- /.row -->
									</div><!-- /.tab-content -->
									
									<div class="tab-content" id="tab-4">
										
										<div class="row">
											<div class="col-md-5 col-sm-6 col-xs-8 center-block text-center">
												<figure><img src="assets/images/art/product03.jpg" alt=""></figure>
											</div><!-- /.col -->
										</div><!-- /.row -->
										
										<div class="row">
											<div class="col-sm-8 center-block text-center inner-top-xs">
												<h3>Social</h3>
												<p>Magnis modipsae que lib voloratati andigen daepedor quiate ut reporemni aut labor. Laceaque sitiorem ut restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent accullignis lomnus.</p>
											</div><!-- /.col -->
										</div><!-- /.row -->
										
									</div><!-- /.tab-content -->
									
									<div class="tab-content" id="tab-5">
										<div class="row">
											<div class="col-md-8 col-sm-9 center-block text-center">
												<h3>Community</h3>
												<p>Magnis modipsae que lib voloratati andigen daepeditem quiate ut reporemni aut labor. Laceaque quiae sitiorem rest non restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta oreprerum tibusam emnis et consent accullignis.</p>
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
			
			<section id="get-in-touch" class="inner-bottom">
				<div class="container inner light-bg">
					<div class="row">
						<div class="col-md-8 col-sm-9 center-block text-center">
							<header>
								<h1>Want to work with us?</h1>
								<p>Magnis modipsae que voloratati andigen daepeditem quiate re porem aut labor. Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam.</p>
							</header>
							<a href="#modal-contact01" class="btn btn-large" data-toggle="modal">Get in touch</a>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION – GET IN TOUCH : END ============================================================= -->
			
			
			<!-- ============================================================= MODALS ============================================================= -->
			
			
			<!-- ============================================================= MODAL PRODUCT01 ============================================================= -->
			
			<div class="modal fade" id="modal-product01" tabindex="-1" role="dialog" aria-labelledby="modal-product01" aria-hidden="true">
				<div class="modal-dialog modal-full">
					<div class="modal-content dark-bg img-bg img-bg-softer no-modal-header no-modal-footer" style="background-image: url(assets/images/art/work14-lg.jpg);">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icon-cancel-1"></i></span></button>
							<h4 class="modal-title" id="modal-product01">Product information</h4>
						</div><!-- /.modal-header -->
						
						<!-- ============================================================= MODAL CONTENT ============================================================= -->
						
						<div class="modal-body">
							
							<!-- ============================================================= SECTION – PORTFOLIO POST ============================================================= -->
							
							<section id="portfolio-post">
								<div class="container inner-top-sm inner-bottom">
									
									<div class="row">
										<div class="col-sm-12">
											<div class="video-container">
												<iframe src="http://player.vimeo.com/video/44920080?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="1170" height="658" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
											</div>
										</div><!-- /.col -->
									</div><!-- /.row -->
									
									<div class="row inner-top-xs reset-xs">
										
										<div class="col-sm-7 inner-top-xs inner-right-xs">
											<header>
												<h2>Unleash your fingers</h2>
												<p class="text-normal">Magnis modipsae que lib voloratati andigen daepeditem quiate ut reporemni labor. Laceaque quiae sitiorem rest non restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta oreprerum tibusam. Eumenis etus consent accullignis dentibea autem inisita posae volor conecus resto explabo.</p>
												<p class="text-normal">Soloreiur qui commolu ptatemp dolupta oreprerum tibusam emnis et consent accullignis. Laceaque quiae sitiorem rest non restibusaes es tumquam core posae voloris remped modis doloreiur qui commolu dolupta oreprerum et consent.</p>
											</header>
										</div><!-- /.col -->
										
										<div class="col-sm-4 col-sm-offset-1 outer-top-xs inner-left-xs border-left">
											<ul class="item-details">
												<li class="date">June 12, 2015</li>
												<li class="categories">Motion graphics</li>
												<li class="client">Mobile company</li>
												<li class="url"><a href="http://demo.fuviz.com/reen">demo.fuviz.com/reen</a></li>
											</ul><!-- /.item-details -->
										</div><!-- /.col -->
										
									</div><!-- /.row -->
									
								</div><!-- /.container -->
								
							</section>
							
							<!-- ============================================================= SECTION – PORTFOLIO POST : END ============================================================= -->
							
							
							<!-- ============================================================= SECTION – SHARE ============================================================= -->
							
							<section id="share" class="light-bg">
								<div class="container">
									
									<div class="col-sm-4 reset-padding">
										<a href="#" class="btn-share-md">
											<p class="name">Facebook</p>
											<i class="icon-s-facebook"></i>
											<p class="counter">1080</p>
										</a>
									</div><!-- /.col -->
									
									<div class="col-sm-4 reset-padding">
										<a href="#" class="btn-share-md">
											<p class="name">Twitter</p>
											<i class="icon-s-twitter"></i>
											<p class="counter">1263</p>
										</a>
									</div><!-- /.col -->
									
									<div class="col-sm-4 reset-padding">
										<a href="#" class="btn-share-md">
											<p class="name">Google +</p>
											<i class="icon-s-gplus"></i>
											<p class="counter">963</p>
										</a>
									</div><!-- /.col -->
									
								</div><!-- /.container -->
							</section>
							
							<!-- ============================================================= SECTION – SHARE : END ============================================================= -->
							
						</div><!-- /.modal-body -->
						
						<!-- ============================================================= MODAL CONTENT : END ============================================================= -->
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div><!-- /.modal-footer -->
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			<!-- ============================================================= MODAL PRODUCT01 : END ============================================================= -->
			
			
			<!-- ============================================================= MODAL CONTACT01 ============================================================= -->
			
			<div class="modal fade" id="modal-contact01" tabindex="-1" role="dialog" aria-labelledby="modal-contact01" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icon-cancel-1"></i></span></button>
							<h4 class="modal-title" id="modal-contact01">Get in touch</h4>
						</div><!-- /.modal-header -->
						
						<!-- ============================================================= MODAL CONTENT ============================================================= -->
						
						<div class="modal-body">
							
							<!-- ============================================================= SECTION – CONTACT FORM ============================================================= -->
							
							<section id="contact-form">
								<div class="container inner-top-xs inner-bottom">
									
									<div class="row">
										<div class="col-md-8 col-sm-9 center-block text-center">
											<header>
												<h1>Get in touch</h1>
												<p>Do you want to know more? We’d love to hear from you!</p>
											</header>
										</div><!-- /.col -->
									</div><!-- /.row -->
									
									<div class="row">
										<div class="col-sm-12">
											<div class="row">
												
												<div class="col-sm-6 outer-top-md inner-right-sm">
													
													<h2>Leave a Message</h2>
													
													<form id="contactform" class="forms" action="contact.php" method="post">
														
														<div class="row">
															<div class="col-sm-6">
																<input type="text" name="name" class="form-control" placeholder="Name (Required)">
															</div><!-- /.col -->
														</div><!-- /.row -->
														
														<div class="row">
															<div class="col-sm-6">
																<input type="email" name="email" class="form-control" placeholder="Email (Required)">
															</div><!-- /.col -->
														</div><!-- /.row -->
														
														<div class="row">
															<div class="col-sm-6">
																<input type="text" name="subject" class="form-control" placeholder="Subject">
															</div><!-- /.col -->
														</div><!-- /.row -->
														
														<div class="row">
															<div class="col-sm-12">
																<textarea name="message" class="form-control" placeholder="Enter your message ..."></textarea>
															</div><!-- /.col -->
														</div><!-- /.row -->
														
														<button type="submit" class="btn btn-default btn-submit">Submit message</button>
														
													</form>
													
													<div id="response"></div>
													
												</div><!-- ./col -->
												
												<div class="col-sm-6 outer-top-md inner-left-sm border-left">
													
													<h2>Contacts</h2>
													<p>Magnis modipsae voloratati andigen daepeditem quiate re aut labor. Laceaque eictemperum quiae sitiorem rest non restibusaes.</p>
													
													<h3>REEN</h3>
													<ul class="contacts">
														<li><i class="icon-location contact"></i> 84 Street, City, State 24813</li>
														<li><i class="icon-mobile contact"></i> +00 (123) 456 78 90</li>
														<li><a href="mailto:info@reen.com"><i class="icon-mail-1 contact"></i> info@reen.com</a></li>
													</ul><!-- /.contacts -->
													
													<div class="social-network">
														<h3>Social</h3>
														<ul class="social">
															<li><a href="#"><i class="icon-s-facebook"></i></a></li>
															<li><a href="#"><i class="icon-s-gplus"></i></a></li>
															<li><a href="#"><i class="icon-s-twitter"></i></a></li>
															<li><a href="#"><i class="icon-s-pinterest"></i></a></li>
															<li><a href="#"><i class="icon-s-behance"></i></a></li>
															<li><a href="#"><i class="icon-s-dribbble"></i></a></li>
														</ul><!-- /.social -->
													</div><!-- /.social-network -->
													
												</div><!-- /.col -->
												
											</div><!-- /.row -->
										</div><!-- /.col -->
									</div><!-- /.row -->
									
								</div><!-- /.container -->
							</section>
							
							<!-- ============================================================= SECTION – CONTACT FORM : END ============================================================= -->
							
							
							<!-- ============================================================= SECTION – MAP ============================================================= -->
							
							<section id="map" class="height-sm"></section>
							
							<!-- ============================================================= SECTION – MAP : END ============================================================= -->
							
						</div><!-- /.modal-body -->
						
						<!-- ============================================================= MODAL CONTENT : END ============================================================= -->
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
					<p class="pull-left">© 2015 REEN. All rights reserved.</p>
					<ul class="footer-menu pull-right">
						<li><a href="#product" class="scroll-to">Product</a></li>
						<li><a href="#visit-our-store" class="scroll-to">Store</a></li>
						<li><a href="#reasons" class="scroll-to">Benefits</a></li>
						<li><a href="#get-in-touch" class="scroll-to">Contact</a></li>
					</ul><!-- .footer-menu -->
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