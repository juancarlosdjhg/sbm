<?php 
session_start();

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
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media='all'/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
</head>
	<body onload="focus ">
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Consultar Bienes</h1>
			<form action="vConsultaBienes.php" method="POST" name="formu1" class="formu" id="formulario1">
				<table>
					<tr>
						<td>							
							<label for="nombreCargo"><h2>Identificador del Bien:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Identificador único del bien</span>
						</td>						
						<td>
							<input class="text-nombre" maxlength="10" type="text" required="required" name="idBien" id="nombreCargo" autofocus title="Número identificador del bien" autocomplete="off" pattern="[0-9]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" >			
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>						
						<td>
							<input name="registrar" id="registrar" class="mvc-submit" value="Generar" type="submit" target="popup">
						</td>
					</tr>

				</table>
				

							<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div><br>

				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			
				
			

			
			</form>			
		</div>
	</div>
	<script>
	$(document).ready(function(){
		cargar();


	})


	

	</script>
	</body>

</html>
