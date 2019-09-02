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
		<script type="text/javascript" src="vReportePorDepartamentoAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Reporte de Bienes por Departamento/Sección </h1>
			<form action="vListadoPorDepartamento.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table align="center" class="tablaResultados1">
					<tr>
						<td colspan="2">
							<center><h2>Seleccione un Departamento ó Sección <br>para visualizar los Bienes pertenecientes a la misma</h2>
						</td>
					</tr>
					<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
					<tr>
						<td align="center">
							<select name="id_entidad" id="id_entidad" class="text" required onchange="llenarSelectSecciones();">
								<?php 
								include("../M/mSeccion.php");
								$llenarEntidads=new Seccion;
								$llenarEntidads->llenarSelectEntidad();
								?>
							</select>

						</td>
					</tr>
					<tr>
						<td align="center">
							<select name="id_seccion" id="id_seccion" class="text" required>

							</select>
						</td>
					</tr>
					<tr>
						<td align="center">
							<center><input name="consultar" id="btnConsultar" class="mvc-submit" type="submit"  value="Visualizar" >
							</td>
							
					</tr>
				</table>					

					
				
			</form>
			<br>
		</div>	
	</div>

	</body>

</html>