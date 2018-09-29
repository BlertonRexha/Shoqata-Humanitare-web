<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Ka një shpresë për të gjithë</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
  
    <script src="assets/js/modernizr.custom.js"></script>
    
  </head>

  <body>

	<!-- Menu -->
	<nav class="menu" id="theMenu">
		<div class="menu-wrap">
			<h1 class="logo"><a href="index.php"><img src="assets/img/homebutton.png" height="30"></a></h1>
			<i class="fa fa-arrow-right menu-close"></i>
			<a href="index.php">Home</a>
			<a href="register.php">Regjistro</a>
			<a href="help.php">Ndihmo</a>
			<a href="about.html">About</a>
			<a href="#contact">Contact</a>
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-dribbble"></i></a>
			<a href="#"><i class="fa fa-envelope"></i></a>
		</div>
		
		<!-- Menu button -->
		<div id="menuToggle"><i class="fa fa-bars"></i></div>
	</nav>
	
	<!-- MAIN IMAGE SECTION -->
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<h2>Shoqatë Humanitare</h2>
					<h1>Ka një shpresë për të gjithë</h1>
					
					<div class="spacer"></div>
					<i class="fa fa-angle-down"></i>
				</div>
			</div><!-- row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->

	<!-- WELCOME SECTION -->
	<!--removed-->

	<?php


    $dbc = mysqli_connect('localhost', 'Blertoni','bllerti147', 's_h')
                    or die("Gabim gjat lidhjes.");



    $query = "SELECT * FROM sh_h";
    $result=mysqli_query($dbc,$query);
    $numri=0;
	while ($row = mysqli_fetch_array($result)) {
    	$res[$numri]='Familja e '.$row['Emri'].' '.$row['Mbiemri'].'<br> Kushtet: <br>'.$row['Kushtet'].'<br><br> Kliko mbi foto per te ndihmuar.';
    	$resph[$numri]='data:image/jpeg;base64,'.base64_encode($row['Image'] );
    	$numri++;


    }

	?>
    
    <!-- PORTFOLIO SECTION -->
    <!--Marrim fotot dhe te dhenat tjera nga databaza, e perfunduar-->
    <div id="portfolio">
    	<div class="container">
	    	<div class="row mt">
				<ul class="grid effect-2" id="grid">
					<li><a href="help.php"><p><?php echo $res[0]; ?></p><img src=<?php echo $resph[0];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[1]; ?></p><img src=<?php echo $resph[1];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[2]; ?></p><img src=<?php echo $resph[2];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[3];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[4]; ?></p><img src=<?php echo $resph[4];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[5]; ?></p><img src=<?php echo $resph[5];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[6]; ?></p><img src=<?php echo $resph[6];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[7]; ?></p><img src=<?php echo $resph[7];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[8]; ?></p><img src=<?php echo $resph[8];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[9];?>  ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[10];?> ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[11];?> ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[12];?> ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[13];?> ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[14];?> ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[15];?> ></a></li>
					<li><a href="help.php"><p><?php echo $res[3]; ?></p><img src=<?php echo $resph[16];?> ></a></li>
				</ul>
	    	</div><!-- row -->
	    </div><!-- container -->
    </div><!-- portfolio -->

   	<!-- CALL TO ACTION -->
	<div id="call">
		<div class="container">
			<div class="row">
				<h3>Kjo eshte zone e thirrjes direkte ne Skype. Duke u perpunuar</h3>
				<div class="col-lg-8 col-lg-offset-2">
					<p><button type="button" class="btn btn-green btn-lg">Call To Action Button</button></p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Call to action -->


	
	<!-- SOCIAL FOOTER -->
	<section id="contact"></section>
	<div id="sf">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 dg">
					<h4 class="ml">FACEBOOK</h4>
					 <p class="centered"><a href="https://www.facebook.com/blerton.r.rexha"><i class="fa fa-facebook"></i></a></p>
					<p class="ml">> Blerton Rexha Profili</p>
				</div>
				<div class="col-lg-4 lg">
					<h4 class="ml">TWITTER</h4>
					<p class="centered"><a href="#"><i class="fa fa-twitter"></i></a></p>
					<p class="ml">> Follow Us</p>
				</div>
				<div class="col-lg-4 dg">
					<h4 class="ml">GOOGLE +</h4>
					<p class="centered"><a href="#"><i class="fa fa-google-plus"></i></a></p>
					<p class="ml">> Add Us To Your Circle</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Social Footer -->
	
	<!-- CONTACT FOOTER -->
	<div id="cf">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
		        	<div id="mapwrap">
						<iframe height="400" width="90%" align="center" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.es/maps?t=m&amp;ie=UTF8&amp;ll=42.578062, 20.907846&amp;spn=6.32,6.972656&amp;z=17&amp;output=embed"></iframe>
					</div>	
				</div><!--col-lg-8-->
				<div class="col-lg-4">
					<h4>ADDRESS<br/><br>
						Komoran</h4>
					<p>Kosove, Drenas </p>
					<br>
					<p>
						Zip Code 35135,<br/>
						
					</p>
					<p>
						Tel : 
							  <br/>
						      +386 49 288 923<br/>
						Email: <a href="mailto:#">rexhablerton@gmail.com</a>
					</p>
				</div><!--col-lg-4-->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Contact Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/classie.js"></script>
	<script src="assets/js/AnimOnScroll.js"></script>
	<script>
		new AnimOnScroll( document.getElementById( 'grid' ), {
			minDuration : 0.4,
			maxDuration : 0.7,
			viewportFactor : 0.2
		} );
	</script>
  </body>
</html>
