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
		<script type="text/javascript" src="vSubgrupoAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">SubCategorías</h1>
			<form action="../C/cSubgrupo.php" method="POST" name="formu1" class="formu" id="formulario1">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para gestionar las SubCategorías de los Bienes Muebles</h3><br>
				<table>
					<tr>
						<td>							
							<label for="nombreSubgrupo"><h2>Nombre de la SubCategoria</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre de la SubCategoría a Registrar o Filtrar</span>
						</td>						
						<td>
							<input class="text-nombre" type="text" maxlength="150" required="required" name="nombreSubgrupo" id="nombreSubgrupo" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>						
						<td>
							<input name="registrar" onclick="return confirm('¿Desea Registrar esta SubCategoria?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
						</td>
					</tr>
					<tr>
						<td>
							<label for="nombreSubgrupo"><h2>Categoría perteneciente</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Seleccione aquí la Categoría a que pertenece la SubCategoría</span>
						</td>					
						<td colspan="">
							<select name="id_grupo" id="id_grupo" class="text" required>
								<?php 
								include("../M/mSubgrupo.php");
								$llenarGrupos=new subgrupo;
								$llenarGrupos->llenarSelectGrupo();
								?>
							</select>
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>						
					</tr>
					<tr>
						<td>
							<label for="codigoSubgrupo"><h2>Código SubCategoría</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Código de la SubCategoría a Registrar</span>
						</td>						
						<td colspan="">
							<input onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" maxlength="25" name="codigo_subgrupo" autocomplete="off" id='txtNombreGrupo' type="text" class="text-nombre" placeholder="Código de la SubCategoría" required>
							<input type="hidden" id="txtNombreCodigoOriginal" name="codigo_subgrupo_original">
						<td>
							<div class="red"><a>*</a></div>
						</td>						
						</td>
					</tr>


				</table>
				<h2>Catálogo de Subcategorías registradas</h2><br>
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					$llenarSubgrupos= new subgrupo;
					$llenarSubgrupos->llenarTabla();
					?>
				</table>
				<table class="tablaResultados" id="tablaResultados">
					
				</table>
				<div class="red"><a>(*)</a> Ingrese todos los campos obligatorios y con el formato requerido</div><br>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Subgrupos</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cSubgrupo.php" method="POST">
				<table>
					<tr>
						<td colspan="">
							<h2>
								Nombre de la SubCategoría: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre de la SubCategoría</span>
						</td>						
						<td>
							<input maxlength="25" name="nombre_subgrupo" autocomplete="off" id='txtNombreSubgrupo' type="text" class="text-nombre" placeholder="Nombre de la SubCategoría" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();" required>
							<input type="hidden" id="txtNombreSubgrupoOriginal" name="nombre_subgrupo_original">
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
					</tr>
					<tr>
						<td colspan="">
							<h2>
								Código de la SubCategoría: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Código de la SubCategoría</span>
						</td>						
						<td>
							<input maxlength="25" name="codigo_subgrupo" autocomplete="off" id='txtCodigoSubgrupo' type="text" class="text-nombre" placeholder="Código de la SubCategoría" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();" required>
							<input type="hidden" id="txtCodigoSubgrupoOriginal" name="codigo_subgrupo_original">
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>
					</tr>
					<tr>
						<td colspan="">
							<label for="nombreSubgrupo"><h2>Categoría perteneciente</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Seleccione aquí la Categoría a la que pertenece la SubCategoría</span>
						</td>						
						<td colspan="">
							<select name="id_grupo2" id="id_grupo2" class="text" required>
								<?php 
								$llenarGrupoSubgrupo=new subgrupo;
								$llenarGrupos->llenarSelectGrupo2();
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
							<input name="modificar" onclick="return confirm('¿Desea Modificar este subgrupo?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar este subgrupo?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
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