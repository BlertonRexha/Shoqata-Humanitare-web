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


	<!-- WELCOME SECTION -->
    <div class="container">
      <div class="row mt">
      	<div class="col-lg-10">
	        <h1>Këtu ndodhen shumë familje që kanë nevojë për ty!</h1>
	        <p class="alert-success ">Selektoni familjet që deshironi t'i ndihmoni, shenoni shumën e parave, gjirollogarinë dhe shtyp butonin <b>Ndihmo</b></p><br/>
      	</div>
      </div><!-- /row -->
    </div><!-- /.container -->
    <div class="container">
    <?php

        $dbc = mysqli_connect('localhost', 'Blertoni','bllerti147', 's_h')
                    or die("Gabim gjat lidhjes.");
        //real connect
        //mysqli_connect('localhost', 'id3468975_blertoni','bllerti147', 'id3468975_s_h')

        $query = "SELECT  * FROM sh_h";
        

        //search zone
        if(isset($_POST['search']))
		{
		    $valueToSearch = $_POST['valueToSearch'];
		    // search in emri and mbiemri table columns
		    // using concat mysql function
		    $query = "SELECT * FROM sh_h WHERE CONCAT(Emri,Mbiemri) LIKE '%".$valueToSearch."%'";
		    $search_result = filterTable($query);
		    
		}
		 else {
		    $search_result = filterTable($query);
		}

		// function to connect and execute the query
		function filterTable($query)
		{
		    $connect = mysqli_connect('localhost', 'Blertoni','bllerti147', 's_h')
		    		or die("Gabim gjat lidhjes ne funksionin e filtrimit ");
		    $filter_Result = mysqli_query($connect, $query);
		    return $filter_Result;
		}

		//help zone
		 if (isset($_POST['submit'])) {
        	$Ndihmuesi=$_POST['Ndihmuesi'];
        	if (strlen($Ndihmuesi)!=16) {
        		echo '<p class="alert-danger centered">Numri i gjirollogarisë suaj nuk është valid, ose është jasht formatit të duhur.<span class="glyphicon glyphicon-remove"></span></p>';
        	}
        	else if (strlen($Ndihmuesi)==16) {
        	$sasia = $_POST['sasia'];
            $vals = $_POST['Gjirollogaria'];
            foreach ($vals as $w) {

                $Update = "Update sh_h set Gjendja_tanishme= Gjendja_tanishme+$sasia  WHERE Gjirollogaria='$w'";
                mysqli_query($dbc, $Update) or die("Gabim ne procesim.");
                $msg="Ndihmë në gjirollogarinë:".$w.".\nShuma e ndihmës:".$sasia.".\nDergoi:".$_POST['Ndihmuesi'];
                mail("shoqata_humanitare@gmail.com","Transaksion i ri ne webfaqe",$msg) or die ("Emaili nuk u dergua");
                echo '<p class="alert-success">Drëgesa u përfundua me sukses në gjirollogarinë: '.$w.'.<span class="glyphicon glyphicon-ok"></span> </p><br>';
                echo '<script type="text/javascript">alert("Drëgesa u përfundua!");</script>';
               }
	        }
	    }

        mysqli_close($dbc);
       	?>

       	<form method="post"  action="<?php $_SERVER['PHP_SELF']; ?>">
        <div >
        <table  class="table table-hover table-condensed ">
        <thead ><input type="text" class="input-lg" name="valueToSearch" onfocus="on" placeholder="Search"><input type="submit" name="search" class="hidden" >
        </thead>
        <tr><th>Select</th><th></th><th>Emri</th><th>Mbiemri</th><th>Gjirollogaria</th><th>Gjendja e tanishme</th><th>Kushtet e tyre</th></tr>
        <?php
        while ($row = mysqli_fetch_array($search_result)) {
        	$row['Gjirollogaria'];
            echo '<tr>';
            echo '<td><input type="checkbox" name="Gjirollogaria[]"    value="'.$row['Gjirollogaria'].'"></td>   ';
            echo '<td><img class="img-circle" src="data:image/jpeg;base64,'.base64_encode($row['Image'] ).'" height="50" width="50"/></td>';
            echo '<td>'.$row['Emri'].'</td>   ';
            echo '<td>'.$row['Mbiemri'].'</td>   ';
            echo '<td>'.$row['Gjirollogaria'].'</td>   ';
            echo '<td>'.$row['Gjendja_tanishme'].'</td>   ';
            echo '<td>'.$row['Kushtet'].'</td>';
            echo '</tr>';
        }
        echo '</table><br/>';

        echo '<input type="number" name = "sasia" placeholder="Shuma e ndihmës" > <input type="text" placeholder="Gjirollogaria juaj" name="Ndihmuesi">   <input type="submit" name="submit" value="Ndihmo" class="btn btn-success"> <a href="index.php" class="btn btn-warning">Anulo</a> ';
        echo '<div> </form><br><br><br>';

       
        ?>
        </div>

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
					<p>Kosovë, Drenas </p>
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
