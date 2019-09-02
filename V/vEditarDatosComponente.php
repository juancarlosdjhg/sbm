<?php 
session_start();
include("../M/mBien.php");


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
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media='all'/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
		<script type="text/javascript" src="vPercepcionBienesAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Bien Componente (Datos)</h1>
			<form action="../C/cGestionarComponente.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table>
					<tr>
						<td>							
							<label for="nombreSubgrupo"><h2>Nombre</h2></label>
						</td>
						<td>
							<input class="text" type="search" required="required" name="nombre_bien" id="nombreBien" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();" value="<?php echo $_SESSION["nombre_bien"]; ?>">			
						</td>
						<td>
							<h2>
								Serial
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien" autocomplete="off" id='txtSerialBien' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" value="<?php echo $_SESSION["serial_bien"]; ?>">
						</td>
						</td>						
					</tr>
					<tr>
						<td>
							<label for="varlorBien"><h2>Valor</h2></label>
						</td>
						<td>
							<input class="text" type="number" required="required" name="valor_bien2" id="valorBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" value="<?php echo $_SESSION["valor_bien2"]; ?>">										
						</td>						
						<td>
							<label for="marcaBien"><h2>Marca</h2></label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="marca_bien" id="marcaBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" value="<?php echo $_SESSION["marca_bien"]; ?>">										
						</td>						

					</tr>
					<tr>
						<td>
							<label for="modeloBien"><h2>Modelo</h2></label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="modelo_bien" id="modeloBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" value="<?php echo $_SESSION["modelo_bien"]; ?>">										
						</td>						
						<td>
							<label for="colorBien"><h2>Color<s/h2></label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="color_bien" id="colorBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" value="<?php echo $_SESSION["color_bien"]; ?>">										
						</td>						

					</tr>
					<tr>
						<td>							
							<label for="descripcionBien"><h2>Descripción</h2></label>
						</td>
						<td colspan="3">
							<textarea class="text" name="descripcion_bien" id="descripcionBien" rows="3"><?php echo $_SESSION["descripcion_bien"]; ?></textarea>							
						</td>
					</tr>									
					<tr>
						<td>
							<label for="idProveedor"><h2>Proveedor</h2></label>
						</td>
						<td>
							<select name="id_proveedor" id="idProveedor" class="text" required="required">
								<?php 
					$llenarBien= new bien;								
					$llenarBien->llenarSelectProveedor();
								?>

						<input type='hidden' id='idProveedorHidden' value='<?php echo $_SESSION["id_proveedor"];?>'>	
							</select>							
						</td>
						<td>
							<label for="fechaAdquisicion"><h2>Fecha de Adquisición</h2></label>
						</td>
						<td>
							<input class="text" type="date" required="required" name="fecha_adquisicion_bien" id="fechaAdquisicion" value="<?php echo $_SESSION["fecha_adquisicion_bien"]; ?>">										
						</td>						
					</tr>
					<tr>
						<td>							
							<h2>Descripción Propia</h2>
						</td>
						<td colspan="3">
							<textarea class="text" name="descripcion_bien_individual" id="txtDescripcionPropiaBien" rows="3"><?php echo $_SESSION["descripcion_bien_individual"]; ?></textarea>							
						</td>
					</tr>			
				</table>

				<input class="text" type="hidden" value="<?php echo $_SESSION["idBien"]; ?>" name="idBien" id="idBien" >


				<input name="modificar" onclick="return confirm('¿Desea Modificar este Componente?');" id="registrar" class="mvc-submit" value="Modificar" type="submit">
				<input name="eliminar" onclick="return confirm('¿Desea Eliminar este Componente?');" id="registrar" class="mvc-submit" value="Eliminar" type="submit">

			</form>					
		</div>
	</div>
	<script>
	$(document).ready(function(){

   var valorGrupo=document.getElementById('idGrupoHidden').value;
$("#idGrupo option[value="+ valorGrupo +"]").attr  ("selected",true);
llenarSelectSubgrupo();

   var valorSubgrupo=document.getElementById('idSubgrupoHidden').value;
$("#idSubgrupo option[value="+ valorSubgrupo +"]").attr  ("selected",true);
	

   var valorProveedor=document.getElementById('idProveedorHidden').value;
$("#idProveedor option[value="+ valorProveedor +"]").attr  ("selected",true);
	})


	</script>
	</body>

</html>