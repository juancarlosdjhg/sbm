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
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media='all' />
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>			
		
		<link href="css/alertify.css" rel='stylesheet' type='text/css' />
		<link href="css/alertify.min.css" rel='stylesheet' type='text/css' />
		<link href="css/alertify.rtl.css" rel='stylesheet' type='text/css' />
		<link href="css/alertify.rtl.min.css" rel='stylesheet' type='text/css' />




		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="../alertify.js"></script>
		<script type="text/javascript" src="../alertify.min.js"></script>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
	<body>
	<div class="header" id="home">
	<?php 
	include('dropdown.php');
	menu();
	?>	
	</div>			
	 <div class="main">
		<div class="class-form-1">
			<h1 class="class-h1">Gestión de la Base de Datos</h1>
			<form name="formu" id="formulario" class="formu" action="../C/cGestionarBD.php" method="POST">
				<table>
					<tr>			
						<td>
							<h2>Respaldar BD</h2>
						</td>	
						<td>
							<input name="respaldar" id="btnRespaldar" class="mvc-submit" type="submit" value="Respaldar">
			</form>					
			<form name="formu2" id="formulario2" action="../C/cGestionarBD.php" method="POST" enctype="multipart/form-data">
					
						</td>
						<td>
							
						</td>	
					</tr>				
					<tr>
						<td>
							<input name="arhivoRestaurar" id="inpRestaurar" type="file" required>
						</td>
						<td>
							<input name="restaurar" id="btnRestaurar" class="mvc-submit" type="submit" value="Restaurar">
						</td>												
					</tr>				
				</table>
			</form>			
			<br>
			<br>
		</div>		
	</div>
	</body>

</html>
