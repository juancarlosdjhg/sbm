<?php 
session_start();


if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>SBM</title>
		
		<link rel="stylesheet" href="css/style.css">
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/lato.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>
				
		<link href="css/dropdown-styles.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/login-style.css" rel="stylesheet" type="text/css" media="all"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/jquery.easydropdown.js"></script>	
 		<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
		<script type="text/javascript" src="js/script.js"></script>

		<script src="js/dropdown-script.js"></script> 		
		<link href='css/alertify.css' rel='stylesheet' type='text/css' media='all'/>
		<link href='css/alertify.min.css' rel='stylesheet' type='text/css' media='all'/>
		<link href='css/alertify.rtl.css' rel='stylesheet' type='text/css' media='all'/>
		<link href='css/alertify.rtl.min.css' rel='stylesheet' type='text/css' media='all'/>
		<script type='text/javascript' src='js/alertify.js'></script>
		<script type='text/javascript' src='js/alertify.min.js'></script>


		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component1.css" />
		<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>

  <div class="header" id="home">
  	  <div class="header_top">

		
<?php 
include("dropdown.php");
menu();
?>
	 </div>		

     <div class="main" id="container">
	 	<div class="content">	
	 		 <div class="content_top section" id="section-1">  
	 		     <div class="wrap">                                  		
            	   <div class="banner_desc">
            	      <div class="wmuSlider example1">
							<div class="wmuSliderWrapper">
							<br><br>
							<article><p>Diseñado para la Contralor&iacutea del Estado Yaracuy</p> <img src="images/clouds.png"  alt="" /> </article>
							<article><p>Inventario, Identificaci&oacuten,  y Monitoreo de los Bienes Muebles</p> <img src="images/system.png"  alt="" /> </article>
							<article><p>Seguridad, Confiabilidad y Fácil manejo de los Procesos</p> <img src="images/slider-img3.png"  alt="" /> </article>
							<article><p>Informaci&oacuten a la mano, bajo control y acceso autorizado</p> <img src="images/slider-img4.png"  alt="" /> </article>
							</div>
                       </div>
            	      <script src="js/jquery.wmuSlider.js"></script> 
						<script type="text/javascript" src="js/modernizr.custom.min.js"></script> 
						<script>
       						 $('.example1').wmuSlider();         
   						 </script> 	   

			<script>
				 $(document).ready(function(){
				      var tabs = $("div#mySliderTabs").sliderTabs({
				        autoplay:5000,
				        indicators: true,
				        panelArrows: true,
				        panelArrowsShowOnHover: true
				      });      
				      prettyPrint();
				    });
				
				    $(document).delegate(".nav-list li a", "click", function(){
				      $(this).parent().siblings().removeClass("active");
				      $(this).parent().addClass("active");
				    });	
			</script>  		
             
              		</div>
          		</div>
     		 </div>
     	</div>


			<div class="component">			
				<!-- Start Nav Structure -->
				<button class="cn-button" id="cn-button">+</button>
				<div class="cn-wrapper" id="cn-wrapper">

				    <ul>
				      <li><a href="vBM1.php"><span class="fa fa-file-text-o"><br>1</span></a></li>
				      <li><a href="vBM2.php"><span class="fa fa-edit"><br>2</span></a></li>
				      <li><a href="#"><span class="fa fa-home"></span></a></li>
				      <li><a href="#"><span class="fa fa-user-times"><br>3</span></a></li>
				      <li><a href="vBM4.php"><span class="fa fa-bank"><br>4</span></a></li>
				     </ul>
				</div>
				
				<div id="cn-overlay" class="cn-overlay"></div>
				<!-- End Nav Structure -->
			</div>
		</div>
<!-- /container -->


		<script src="js/polyfills.js"></script>		
		<script src="js/demo1.js"></script>	
	</body>
</html>
