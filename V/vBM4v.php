<?php 
session_start();
include("../M/mBM4.php");


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
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">BM4 - Bienes Muebles </h1>
			<form action="../C/cBien.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table align="center" class="tablaResultados1">
					<tr>
						<td colspan="2">
							<center><h2>Seleccione un método para visualizar el formulario BM4</h2>
						</td>
					</tr>
					<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
					<tr>
						<td align="center">
							<center><input name="consultar" id="btnConsultar" class="mvc-submit" type="button" onclick="window.location.href='vBM4.php';" value="General" >
							</td>
							<td align="center">
							<input name="consultar" id="btnConsultar" class="mvc-submit" type="button" onclick="window.location.href='vBM4Mensual.php';" value="Mensual" >
						</td>
					</tr>
				</table>					

					
				
			</form>
			<br>
		</div>	
	</div>

	</body>

</html>