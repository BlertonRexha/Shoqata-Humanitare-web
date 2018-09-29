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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
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
	<div id="serviceswrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<h2>Regjistroni familjet të cilat kan nevojë për ndihmën e bamirësve<br/></h2>
					<h4 style="color: #fff;"> Bëni përshkrim adekuat për problemin e familjeve</h4>
				</div>
			</div><!-- row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->

<?php
        $firstname="";
		$lastname="";
		$Gjirollogaria="";
		$Tel="";
		$Adresa="";
		$Kushtet="";
		$Asistence_Sociale="";
		$Regjistruesi="";
		$Tel_Regjistruesit="";
		$Njohja_Familjes="";



        if (isset($_POST['submit'])) {
            $output_form = false;
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $Gjirollogaria = $_POST['Gjirollogaria'];
			$Tel=$_POST['Tel'];
			$Adresa=$_POST['Adresa'];
			$Kushtet=$_POST['Kushtet'];
			$Asistence_Sociale=$_POST['Asistence_Sociale'];
			$Regjistruesi=$_POST['Emri_Regjistruesit'];
			$Tel_Regjistruesit=$_POST['Tel_Regjistruesit'];
			$Njohja_Familjes=$_POST['Njohja_Familjes'];

			$dbc = mysqli_connect('localhost', 'Blertoni','bllerti147', 's_h')
                    or die("Gabim gjat lidhjes.");
	            $query1 = "SELECT * FROM sh_h";
	    		$result1=mysqli_query($dbc,$query1);
	    		$break="dbreak";

				while ($row = mysqli_fetch_array($result1)) {
	    			if ($Gjirollogaria===$row['Gjirollogaria']) {
	    				$break="break";
	    				echo '<script type="text/javascript">alert("Kjo familje eshte regjistruar me heret");</script>';
	    				mysqli_close($dbc);
	    			}
    		}


             if( empty($firstname) && empty($lastname) && empty($Gjirollogaria)){
                 echo '<p class="alert-danger centered ">E keni harruar emrin, mbiemrin dhe numrin e gjirollogarisë.<span class="glyphicon glyphicon-remove"></span></p>';
                 $output_form =true;
             }

             if( !empty($firstname)&& empty($lastname) && empty($Gjirollogaria)){
                 echo '<p class="alert-danger centered " >E keni harruar mbiemrin dhe numrin e gjirollogarisë.<span class="glyphicon glyphicon-remove"></span></p>';
                 $output_form = true;
             }
             if( empty($firstname)&& !empty($lastname) && empty($Gjirollogaria) ){
                 echo '<p class="alert-danger centered ">E keni harruar emrin dhe numrin e gjirollogarisë.<span class="glyphicon glyphicon-remove"></span></p>';
                 $output_form = true;
             }
             
             if( empty($firstname) && empty($lastname) && !empty($Gjirollogaria)){
                 echo '<p class="alert-danger centered ">E keni harruar emrin dhe mbiemrin.<span class="glyphicon glyphicon-remove"></span></p>';
                 $output_form = true;
             }

             if( !empty($firstname)&& !empty($lastname) && empty($Gjirollogaria)){
                 echo '<p class="alert-danger centered ">E keni harruar numrin e gjirollogarisë.<span class="glyphicon glyphicon-remove"></span></p>';
                 $output_form = true;
             }

             if( empty($firstname)&& !empty($lastname) && !empty($Gjirollogaria)){
                 echo '<p class="alert-danger centered ">E keni harruar emrin.<span class="glyphicon glyphicon-remove"></span></p>';
                 $output_form = true;
             }
             if( !empty($firstname)&& empty($lastname) && !empty($Gjirollogaria)){
                 echo '<p class="alert-danger centered ">E keni harruar mbiemrin.<span class="glyphicon glyphicon-remove"></span></p>';
                 $output_form = true;
             } 
             }  
             else {
                $output_form = true;
            }

            
             if(!empty($firstname)&& !empty($lastname) && !empty($Gjirollogaria) && $break!="break" ) {

                $dbc = mysqli_connect('localhost', 'Blertoni','bllerti147', 's_h')
                        or die('Gabim gjate lidhjes me serverin MySQL.');

				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $query = "INSERT INTO sh_h VALUES ('$firstname', '$lastname','$Gjirollogaria','0','$image','$Tel','$Kushtet','$Asistence_Sociale','$Regjistruesi','$Tel_Regjistruesit','$Njohja_Familjes')";

                if (mysqli_query($dbc, $query) or die("Gabim gjate procesimit.")) {
                    echo '<br/>Klienti:  ' . $firstname . ' ' . $lastname . ' u regjistrua <br>';
                   	


                    //Dergojm msg to admin notificationi

                   	$msg="T&#235; dh&#235;na t&#235; reja jan regjitruar n&#235; webfaqe.\n-Regjistruesi :".$Regjistruesi.":\n-Emri i kryesht&#235;piakut t&#235; familjes në nevoj:".$firstname." ".$lastname."\n-Kushtet:".$Kushtet.".\n \n \n-Gjithmon&#235; do d&#235;rgohet nj&#235; email q&#235; do t&#235; mbetet si deshmi e regjistrimit t&#235; familj&#235;s n&#235; nevoj&#235;";
                   	$msg_show='<p class="text-success"><i>T&#235; dh&#235;na t&#235; reja jan regjitruar n&#235; webfaqe.<br>-Regjistruesi :'.$Regjistruesi.':<br>-Emri i kryesht&#235;piakut t&#235; familjes në nevoj:'.$firstname.' '.$lastname.'<br>-Kushtet:'.$Kushtet.'.<br><br><br>-Gjithmon&#235; do d&#235;rgohet nj&#235; email q&#235; do t&#235; mbetet si deshmi e regjistrimit t&#235; familj&#235;s n&#235; nevoj&#235;</i> </p>';
                   	
                   	mail("shoqata_humanitare@gmail.com","Te dhena te reja ne webfaqe",$msg) or die ("Emaili nuk u dergua");
                   	
                   	echo "Mesazhi :".$msg_show." u dergua ne emailin 'shoqata_humanitare@gmail.com' ";


                    $output_form = false;
                }


                mysqli_close($dbc);
            
            } 
            //tu e provu kesh te kqyri a po bon

        if ($output_form) {
            ?>
            <!--
        		Pjesa e formes
			-->
            <div class="form-style-5">
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<fieldset>
				<legend><span class="number">1</span> T&#235; dh&#235;nat e familjes n&#235; nevoj&#235;.</legend>
				<input type="text"  name="firstname" placeholder="Emri i kryesht&#235;piakut" value="<?php echo($firstname)?>">
				<input type="text"  name="lastname"  placeholder="Mbiemri" 					  value="<?php echo($lastname)?>" >
				<input type="text"  name="Tel" 		 placeholder="Numri telefonit"     		  value="<?php echo($Tel) ?>">
				<textarea 			name="Kushtet"   placeholder="Rreth kushteve t&#235; familj&#235;s" value="<?php echo($Kushtet) ?>"></textarea>
				<input type="text"  name="Adresa" 	 placeholder="Adressa. Mund t&#235; d&#235;rgohet vet&#235;m linku i google map" value="<?php echo($Adresa) ?>">
				<input type="text" id="Gjirollogaria" minlength="16" maxlength="16" name="Gjirollogaria" placeholder="Numri i gjirollogaris&#235;" value="<?php echo($Gjirollogaria) ?>">

				Ngarko ndonj&#235; fotografi t&#235; anetar&#235;ve apo gjendj&#235;s s&#235; familjes.
				<input type="file" name="image"> <br>
				<input type="text" name="Asistence_Sociale" placeholder="Asistenca Sociale"></input>
				</fieldset>
				<hr>
				K&#235;to t&#235; dh&#235;na nuk shfaqen n&#235; webfaqe.
				<fieldset>
				<legend><span class="number">2</span>T&#235; dh&#235;nat e regjistruesit</legend>
				<input type="text" name="Emri_Regjistruesit" placeholder="Emri & Mbiemri">
				<input type="text" name="Tel_Regjistruesit" placeholder="Nr i telefonit">
				<textarea name="Njohja_Familjes" placeholder="Nga e njeh familjen të cil&#235;n e regjistroni" cols="100"></textarea>
				</fieldset>
				<input type="submit" value="Regjistro" name="submit" />
				<a href="index.php"><button>Anulo</button></a>
				</form>
				</div>
				</div>
            <?php
        }
        ?>


        <!--test        
		-->




	<!-- PROCESS SECTION -->
    <div class="container">
      <div class="row mt">
		  <div class="col-lg-8">
		  	<h1>Th&#235;nje t&#235; bukura dhe motivuese p&#235;r bamir&#235;sit.</h1>
		  	<hr>
		  	<h3><b>Varfëria</b></h3>
		  	<p>"Varfëria në botë nuk është për shkak se nuk mundemi të ushqejmë të varfërit, por për shkak se nuk mundemi të ngopim të pasurit"
		  	</p>
		  	<br>
		  	<h3><b>Pozitivitet</b></h3>
		  	<p>Te jetojm ne nje univerz paralel per te gjith, vetem ashtu do funksionoj pasqyrimi i buzeqeshjes ne fytyrat e pasardhesve tane.</p>
		  	<br>
		  	<h3><b>Prayer</b></h3>
		  	<p>Prayer is not asking. It is a longing of the soul. It is daily admission of one's weakness. It is better in prayer to have a heart without words than words without a heart.</p>
		  	<br>
		  	<h3><b></b></h3>
		  	<p></p>
		  </div><!-- col-lg-8 -->
		  <div class="col-lg-4">
			<ul class="process effect-2" id="process">
				<li><img src="assets/img/process/pro01.png"></li>
				<li><img src="assets/img/process/pro02.png"></li>
				<li><img src="assets/img/process/pro03.png"></li>
				<li><img src="assets/img/process/pro04.png"></li>
			</ul>
		  </div><!-- col-lg-4 -->
      </div><!-- /row -->
    </div><!-- /.container -->

        

	
	<!-- CALL TO ACTION -->
	<div id="call">
		<div class="container">
			<div class="row">
				<h3>Kjo &#235;sht&#235; zon&#235; e thirrjes direkte n&#235; Skype. Duke u p&#235;rpunuar</h3>
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
					<p>Kosov&#235;, Drenas </p>
					<br>
					<p>
						Zip Code 35135,<br/>
						
					</p>
					<p>
						Tel : <br/>
						      +386 49 288 923<br/>
						Email: <a href="mailto:#">rexhablerton@gmail.com</a>
					</p>
				</div><!--col-lg-4-->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Contact Footer -->

	
	

    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/classie.js"></script>
	<script src="assets/js/AnimOnScroll.js"></script>
	<script>
		new AnimOnScroll( document.getElementById( 'process' ), {
			minDuration : 0.4,
			maxDuration : 0.7,
			viewportFactor : 0.2
		} );
	</script>
  </body>
</html>
