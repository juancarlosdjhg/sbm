<?php 
session_start();
include("../M/mBien.php");
$_SESSION['reporte']="flotantes";
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 
						}
?>


<!DOCTYPE html>
<html>
<head>
	<title>SBM</title>
		<meta charset="utf-8">
		<link href="css/login-style.css" rel='stylesheet' type='text/css' />
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media="all" />
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
		<script type="text/javascript" src="vListadoBienesFlotantesAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Bienes Flotantes por Incorporar</h1>
			<form action="../C/cBien.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table>
					<td>							
						<label for="nombreBien"><h2>Nombre del Bien</h2></label>
					</td>
					<td>
						<input class="text" type="search" required="required" name="nombreBien" id="nombreBien" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
					</td>
					<td>							
						<label for="pdf"><a href="ConsultaBienListado.php" ><img src="images/pdf.png"></img></a></label>
					</td>
				</table>					

					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 

					$llenarBien = new Bien;
					$llenarBien->llenarTablaBienesFlotantes();
					?>
				</table>
					</div>	
			
				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			</form>
			<br>
		</div>	
	</div>
	<script>
	$(document).ready(function(){
		cargar();


	})


	

	</script>
	</body>

</html>