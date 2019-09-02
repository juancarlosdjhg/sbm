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
		<script type="text/javascript" src="vSeccionAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Secciones</h1>
			<form action="../C/cSeccion.php" method="POST" name="formu1" class="formu" id="formulario1">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para gestionar las Secciones de los Bienes Muebles</h3><br>
				<table>
					<tr>
						<td>							
							<label for="nombreSeccion"><h2>Nombre de la Sección</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre de la Sección a Registrar o Filtrar</span>
						</td>						
						<td>
							<input class="text-nombre" maxlength="25" type="text" required="required" name="nombreSeccion" id="nombreSeccion" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
						<td>
							<input name="registrar" onclick="return confirm('¿Desea Registrar este Seccion?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
						</td>
					</tr>
					<tr>
						<td>							
							<label for="nombreSeccion"><h2>Código de la Sección</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Código de la Sección a Registrar</span>
						</td>						
						<td>
							<input class="text-nombre" type="text" maxlength="25" required="required" name="codigoSeccion" id="codigoSeccion" autocomplete="off" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">			
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
					</tr>
					<tr>
						<td>
							<label for="nombreSeccion"><h2>Departamento Perteneciente</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Seleccione aquí el Departamento a que pertenece la Sección a Registrar</span>
						</td>
						<td colspan="">
							<select name="id_entidad" id="id_entidad" class="text" required>
								<?php 
								include("../M/mSeccion.php");
								$llenarEntidads=new Seccion;
								$llenarEntidads->llenarSelectEntidad();
								?>
							</select>
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>						
					</tr>

				</table>
				<h2>Catálogo de Secciones registradas</h2><br>
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					$llenarSeccions= new Seccion;
					$llenarSeccions->llenarTabla();
					?>
				</table>

					
				<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div>

				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Secciones</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cSeccion.php" method="POST">
				<table>
					<tr>
						<td colspan="2">
							<h2>
								Nombre de la Sección: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre de la Sección</span>
						</td>						
						<td>
							<input maxlength="25" name="nombre_Seccion" autocomplete="off" id='txtNombreSeccion' type="text" class="text-nombre" placeholder="Nombre de la Seccion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();" required>
							<input type="hidden" id="txtNombreSeccionOriginal" name="nombre_Seccion_original">
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>						
					</tr>
					<tr>
						<td colspan="2">
							<h2>
								Código de la Sección: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Código de la Sección</span>
						</td>						
						<td>
							<input maxlength="25" name="codigo_Seccion" autocomplete="off" id='txtCodigoSeccion' type="text" class="text-nombre" placeholder="Codigo de la Seccion" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtCodigoSeccionOriginal" name="codigo_Seccion_original">
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label for="nombreSeccion"><h2>Departamento perteneciente</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Seleccione aquí el Departamento a que pertenece la Sección</span>
						</td>
						<td colspan="">
							<select name="id_entidad" id="id_entidad2" class="text" required>
								<?php 
								$llenarEntidadSeccion=new Seccion;
								$llenarEntidads->llenarSelectEntidad2();
								?>
							</select>
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
					</tr>					
				</table>
							 <div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div>	<br>

				<div align="center">
							<input name="modificar" onclick="return confirm('¿Desea Modificar este Seccion?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar este Seccion?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
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