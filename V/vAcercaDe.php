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
	 		     <div class="wrap">                                		
							<center><h1>Desarrolladores de SBM</h1>
							<img width="800" height="341" src="images/acercade.png"  alt="" /></center>						             
          		</div>
     	</div>
		</div>
<!-- /container -->
	</body>
</html>
