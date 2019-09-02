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
		<script type="text/javascript" src="vRevisionBienAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Revisión de los Bienes Muebles</h1>
			<form action="../C/cRevisionBien.php" method="POST" name="formu1" class="formu" id="formulario1">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para realizar la revisión de los Bienes Muebles</h3><br>
				<table>
					<tr>
						<td>							
							<label for="nombre_bien"><h2>Nombre</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Nombre del Bien a revisar</span>
						</td>				
						<td>
							<input class="text-nombre" type="text" maxlength="25" readonly name="nombre_bien" id="nombre_bien" value="<?php echo $_POST['nombre']; ?>">
							<input type="hidden" name="id_bien" id="id_bien" value="<?php echo $_POST['id_bien']; ?>">			

						</td>
						<td>							
							<label for="nombre_bien"><h2>Marca</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Marca del Bien a revisar</span>
						</td>						
						<td>
							<input class="text-nombre" readonly type="text" maxlength="25" required="required" name="marca_bien" id="marca_bien" value="<?php echo $_POST['marca']; ?>">			
						</td>						

					</tr>
					<tr>
						<td>							
							<label for="nombre_bien"><h2>Modelo</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Modelo del Bien a revisar</span>
						</td>						
						<td>
							<input class="text-nombre" readonly type="text" maxlength="25" required="required" name="modelo_bien" id="modelo_bien" value="<?php echo $_POST['modelo']; ?>"> 			
						</td>
						<td>							
							<label for="modelo_bien"><h2>Color</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Marca del Bien a revisar</span>
						</td>						
						<td>
							<input class="text-nombre" type="text" readonly maxlength="25" required="required" name="marca_bien" id="marca_bien" value="<?php echo $_POST['color']; ?>">			
						</td>					
					</tr>
					<tr>
						<td>							
							<label for="descripcion_bien"><h2>Descripción del Bien Revisado</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Descripción del Bien a revisar</span>
						</td>
					</tr>
					<tr>
						<td>							
							<label for="conclusion_bien">
								<h2>
									Conclusión del Bien Revisado
								</h2>
							</label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Conclusión del Bien a revisar</span>
						</td>

						<td colspan="4">
							<textarea class="text" name="db" id="descripcionBien" rows="3" ></textarea>							
						</td>
					</tr>
					<tr>
						<td>							
						</td>
						<td>
						</td>

						<td colspan="4">
							<textarea class="text" name="conclusion_bien" id="conclusion_bien" rows="3" ></textarea>							
						</td>
					</tr>	
					<tr>
						<td>							
							<label for="id_departamento"><h2>Departamento encargado de la revisión</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre del Concepto de Movimiento a Registrar o Filtrar</span>
						</td>
						<td colspan="">
							<select name="id_departamento" id="id_departamento" class="text"  onchange="llenarSelectResponsables();">
								<?php 
								include("../M/mRevisionBien.php");
								$llenarSelects= new revision;
								$llenarSelects->llenarSelectDepartamento();
								?>
							</select>
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>

					</tr>
					<tr>
						<td>							
							<label for="id_responsable"><h2>Nombre del responsable encargado de revisión</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre del Concepto de Movimiento a Registrar o Filtrar</span>
						</td>
						<td colspan="">
							<select name="id_responsable" id="id_responsable" class="text" >

							</select>
						</td>
						<td>
							<div class="red"><a>*</a></div>
						</td>

					</tr>

				</table>
				<input name="aprobar" onclick="return confirm('¿Desea Aprobar este Bien?');" id="aprobar" class="mvc-submit" value="Aprobar" type="submit">
				<input name="rechazar" onclick="return confirm('¿Desea Rechazar este Bien?');" id="denegar" class="mvc-submit" value="Rechazar" type="submit">
			</form>
			<br>
		</div>		

	<script>
	$(document).ready(function(){
		cargar();


	})


	

	</script>
	</body>

</html>