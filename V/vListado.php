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
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media="all" />
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	include("../M/mBien.php");
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Listado de últimos Bienes Registrados </h1>
			<form action="../C/cBien.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table align="center" class="tablaResultados1">
					<tr>
						<td><center>
						<h2><img src="images/help.png" alt="Information" height="40" width="40"/>Para generar la etiqueta haga click en el Número ID del Bien <br>al cual desea crear la etiqueta. </h2><br></center>
					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					$llenarBien= new bien;
					$llenarBien->llenarTabla();
					?>
				</table>
					</div>	
			<center><input type="button" class="mvc-submit" onclick="window.location.href='vMenu.php'" value="Ir al menú" /></center>

						</td>
					</tr>
				</table>					

					
				
			</form>
			<br>
		</div>	
	</div>

	</body>

</html>