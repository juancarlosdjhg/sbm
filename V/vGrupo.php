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
		<script type="text/javascript" src="vGrupoAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>			
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Categorías</h1>
			<form action="../C/cGrupo.php" method="POST" name="formu1" class="formu" id="formulario1">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para gestionar las Categorías de los Bienes Muebles</h3><br>
				<table>
					<tr>
						<td>							
							<label for="nombreGrupo"><h2>Nombre de la Categoría</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre de la Categoría a Registrar o Filtrar</span>
						</td>						
						<td>
							<input class="text-nombre" type="text" required="required" maxlength="150" name="nombreGrupo" id="nombreGrupo" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>						
						<td>
							<input name="registrar" onclick="return confirm('¿Desea Registrar este grupo?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
						</td>
					</tr>
					<tr>
						<td>
							<label for="nombreSubgrupo"><h2>Código de la Categoría</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Código de la Categoría a Registrar o Filtrar</span>
						</td>						
						<td>
							<input class="text-nombre" type="text" required="required" maxlength="25" name="codigoGrupo" id="codigoGrupo" autocomplete="off" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">			
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>						
					</tr>

				</table>
				<h2>Catálogo de Categorías registradas</h2><br>
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					include("../M/mGrupo.php");
					$llenarGrupos= new grupo;
					$llenarGrupos->llenarTabla();
					?>
				</table>

				<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div><br>

				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Categorías</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cGrupo.php" method="POST">
				<table>
					<tr>
						<td colspan="2">
							<h2>
								Nombre de la Categoría: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre de la Categoría</span>
						</td>
						<td>
							<input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" maxlength="25" name="nombre_grupo" autocomplete="off" id='txtNombreGrupo' type="text" class="text-nombre" placeholder="Nombre de la Categoría" required>
							<input type="hidden" id="txtNombreGrupoOriginal" name="nombre_grupo_original">	</td>
							<td>
							<div class="red"><a>*</a></div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>
								Código de la Categoría: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Código de la Categoría</span>
						</td>						
						<td colspan="">
							<input onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" maxlength="25" name="codigo_grupo" autocomplete="off" id='txtCodigoGrupo' type="text" class="text-nombre" placeholder="Código de la Categoría" required>
							<input type="hidden" id="txtCodigoGrupoOriginal" name="codigo_grupo_original">							
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
					</tr>
					
				</table>
				<table class="tablaResultados" id="tablaResultados2">
					
				</table>

				<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div><br>
				
				<div align="center">
							<input name="modificar" onclick="return confirm('¿Desea Modificar esta Categoria?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar esta Categoria?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
							<input name="cancelar"	onclick="atras();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">							
				</div>
			</form>			
		</div>
	</div>
	<script>$(document).ready(function(){
		cargar();
	})
	</script>
	</body>

</html>