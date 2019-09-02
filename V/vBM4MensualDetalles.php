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
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media="all " />
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
		<script type="text/javascript" src="vListadoBienesIncorporadosAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Resumen Mensual de la Cuenta de Bienes Muebles</h1>
			<form action="../C/cBien.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table class="tablaResultados2">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para ver el resumen del movimiento de la cuenta de Bienes Muebles</h3><br>
					<tr>
						<th>Estado</th>
						<td bgcolor="#fff">Yaracuy</td>
						<th>Municipio</th>
						<td bgcolor="#fff">San Felipe</td>
					</tr>
					<tr>
						<th>Mes</th>
						<td bgcolor="#fff"><?php 

						if ($_SESSION["mes"] == 1) echo "Enero";
						if ($_SESSION["mes"] == 2) echo "Febrero";
						if ($_SESSION["mes"] == 3) echo "Marzo";
						if ($_SESSION["mes"] == 4) echo "Abril";
						if ($_SESSION["mes"] == 5) echo "Mayo";
						if ($_SESSION["mes"] == 6) echo "Junio";
						if ($_SESSION["mes"] == 7) echo "Julio";
						if ($_SESSION["mes"] == 8) echo "Agosto";
						if ($_SESSION["mes"] == 9) echo "Septiembre";
						if ($_SESSION["mes"] == 10) echo "Octubre";
						if ($_SESSION["mes"] == 11) echo "Noviembre";
						if ($_SESSION["mes"] == 12) echo "Diciembre";

						?></td>
						<th>Año</th>
						<td bgcolor="#fff"><?php echo $_SESSION["anio"]; ?></td>
					</tr>
				</table>					

					
					<table class="tablaResultados" id="tablaResultados2">
					<tr><th colspan="3">Formulario BM4</th></tr>
					<div class="overflow">			
					<tr>		
						<th bgcolor='#fff'>Existencia Mes Anterior</th>
						<td bgcolor='#86e945' align='right'><?php echo aMoneda($_SESSION["suma_mes_anterior"]); ?></td>
						<td bgcolor='#fff'></td>
					<tr>
						<th bgcolor='#fff'>Incorporaciones en el Mes</th>
						<td bgcolor='#86e945' align='right'><?php echo aMoneda($_SESSION["suma_incorporacion"]); ?></td>
						<td bgcolor='#fff'></td>
					</tr>
					<tr>	
						<th bgcolor='#fff'>Desincorporaciones en el Mes</th>
						<td bgcolor='#fff'></td>
						<td bgcolor='#fc5353' align='right'><?php echo aMoneda($_SESSION["suma_desincorporacion"]); ?></td>
					</tr>
					<tr>
						<th bgcolor='#fff'>Desincorporaciones por Investigar en el Mes</th>
						<td bgcolor='#fff'></td>
						<td bgcolor='fc5353' align='right'><?php echo aMoneda($_SESSION["suma_desincorporacion_por_investigar"]); ?></td>
					</tr>
					<tr>
						<th bgcolor='6bbaef'>Existencia Final para el mes</th>	
						<td colspan='2' bgcolor='6bbaef' align='right'><?php echo aMoneda($_SESSION["existencia_total"]); ?></td>	
					</tr>	




					</table>

					</div>
					</table>
			</form>
			<br>
		</div>	
	</div>
	</body>

</html>