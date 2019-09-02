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
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media='all'/>
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
		<script type="text/javascript" src="vCargoAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Cargos</h1>
			<form action="../C/cCargo.php" method="POST" name="formu1" class="formu" id="formulario1">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para gestionar los Cargos de los Responsables</h3><br>

				<table>
					<tr>
						<td>							
							<label for="nombreCargo"><h2>Nombre del Cargo</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre del Cargo a Registrar o Filtrar</span>
						</td>						
						<td>
							<input class="text-nombre" maxlength="25" type="text" required="required" name="nombreCargo" id="nombreCargo" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>						
						<td>
							<input name="registrar" onclick="return confirm('¿Desea Registrar este cargo?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
						</td>
					</tr>

				</table>
				<h2>Catálogo de Responsables registrados</h2><br>
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					include("../M/mCargo.php");
					$llenarCargos= new cargo;
					$llenarCargos->llenarTabla();
					?>
				</table>

							<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div><br>

				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Cargos</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cCargo.php" method="POST">
				<table>
					<tr>
						<td colspan="2">
							<h2>
								Nombre del Cargo: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre del Cargo</span>
						</td>						
						<td>
							<input maxlength="25" name="nombre_cargo" autocomplete="off" id='txtNombreCargo' type="text" class="text-nombre" placeholder="Nombre del cargo"pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtNombreCargoOriginal" name="nombre_cargo_original">
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>

					</tr>
				</table>
				
						<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div><br>

				<div align="center">
							<input name="modificar" onclick="return confirm('¿Desea Modificar este cargo?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar este cargo?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
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
