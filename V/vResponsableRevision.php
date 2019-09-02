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
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css'  media="all"/>
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
		<script type="text/javascript" src="vResponsableRevisionAjax.js"></script>

</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>

	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Responsables para revisión</h1>
			<form action="../C/cResponsableRevision.php" method="POST" name="formu1" class="formu" id="formulario1">
				<table>
					<tr>
						<td>
							<label for="id_responsable"><h2>Responsable</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione aquí el Tipo de Concepto de Movimiento a Registrar</span>
						</td>
						<td colspan="">
							<select name="id_responsable" id="id_responsable" class="text" required>
								<?php 
								include("../M/mResponsableRevision.php");
								$llenarTipos=new responsable;
								$llenarTipos->llenarSelectResponsables();
								?>
							</select>
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
						<td>
							<input name="registrar" onclick="return confirm('¿Desea Registrar este Responsable?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
						</td>						
					</tr>
					<tr>
						<td>							
							<label for="id_departamento"><h2>Departamento perteneciente</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre del Concepto de Movimiento a Registrar o Filtrar</span>
						</td>
						<td colspan="">
							<select name="id_departamento" id="id_departamento" class="text" required>
								<?php 

								$llenarTipos->llenarSelectDepartamento();
								?>
							</select>
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>

					</tr>

				</table>
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					$llenarConcepto= new responsable;
					$llenarConcepto->llenarTabla();
					?>
				</table>
				<table class="tablaResultados" id="tablaResultados">
					
				</table>
										<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div><br>
			</form>
			
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Responsables para revisión</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cResponsableRevision.php" method="POST">
				<table>
					<tr>
						<td colspan="">
							<label for="id_responsable2"><h2>Responsable</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Seleccione aquí el Tipo de Concepto al que pertence</span>
						</td>						
						<td colspan="">
							<select name="id_responsable2" id="id_responsable2" class="text" disabled>
								<?php 
								$llenarTipoConcepto=new responsable;
								$llenarConcepto->llenarSelectResponsables();
								?>
							</select>
							<input type="hidden" name="id_responsable_hidden" id="id_responsable_hidden">
						</td>
					</tr>	
					<tr>
						<td colspan="">
							<label for="id_departamento2"><h2>Departamento Perteneciente</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Seleccione aquí el Tipo de Concepto al que pertence</span>
						</td>						
						<td colspan="">
							<select name="id_departamento2" id="id_departamento2" class="text" required>
								<?php 
								$llenarConcepto->llenarSelectDepartamento();
								?>
							</select>
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
					</tr>					
				</table>
										<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div><br>
				<div align="center">
							<input name="modificar" onclick="return confirm('¿Desea Modificar este Responsable de revisión?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar este Responsable de revisión?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
							<input name="cancelar"	onclick="atras();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">							
				</div>
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