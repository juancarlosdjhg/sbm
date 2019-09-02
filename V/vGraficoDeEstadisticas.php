<?php 
session_start();
include("../M/mBM4Mensual.php");


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
		<script type="text/javascript" src="vBM4MensualAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Resumen de la Cuenta de Bienes Muebles</h1>
				<form class="formu" method="POST" action="ConsultaEstadisticas2.php">
					
					<table>	
						<tr>
							<td>
								<label for="id_anio"><h2>Año</h2></label>	
							</td>				
							<td>
							<?php 
								$llenar=new bm4;
								$llenar->llenarAnio();
							?>
							</td>

						</tr>
						<tr>
							
							<td colspan="2">
								<input name="consultar"  id="consultar" class="mvc-submit" value="Consultar" type="submit">
							</td>

						</tr>
					</table>

				</form>
		</div>	
	</div>

	</body>


</html>