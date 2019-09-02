<?php 
session_start();
include("../M/mBitacora.php");

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
		<script type="text/javascript" src="vBitacoraAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>			
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Bitacora</h1>
			<form action="../C/cGrupo.php" method="POST" name="formu1" class="formu" id="formulario1">
				<table>
					<tr>
						<td>							
							<label for="nombreUsuario"><h2>Filtrar Por Usuario</h2></label>
						</td>
						<td>
							<input class="text" type="search" required="required" name="nombreUsuario" id="nombreUsuario" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>					
					</tr>
				</table>
				<div class="overflow">
				<table class="tablaResultados" id="tablaResultados1">

					<?php 
					$llenarBitacora= new bitacora;
					$llenarBitacora->llenarTabla();
					?>

				</table>
				</div>

				<div class="overflow">				
				<table class="tablaResultados" id="tablaResultados">

				</table>
				</div>

			</form>
			</div></div></body>			
		</body>

</html>