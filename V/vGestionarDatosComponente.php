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
							<input class="text" type="search" required="required" name="nombreBien" id="nombreBien" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>
						<td>
							<input name="registrar" onclick="return confirm('¿Desea Registrar este Componente?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
						</td>						
					</tr>
					<tr>
						<td>
							<label for="varlorBien"><h2>Valor</h2></label>
						</td>
						<td>
							<input class="text" type="number" required="required" name="valorBien" id="valorBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">										
						</td>						
						<td>
							<label for="marcaBien"><h2>Marca</h2></label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="marcaBien" id="marcaBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">										
						</td>						

					</tr>
					<tr>
						<td>
							<label for="modeloBien"><h2>Modelo</h2></label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="modeloBien" id="modeloBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">										
						</td>						
						<td>
							<label for="colorBien"><h2>Color</h2></label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="colorBien" id="colorBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">										
						</td>						

					</tr>
					<tr>
						<td>							
							<label for="descripcionBien"><h2>Descripción</h2></label>
						</td>
						<td colspan="3">
							<textarea class="text" name="descripcionBien" id="descripcionBien" rows="3"></textarea>							
						</td>
					</tr>					
					<tr>
						<td>							
							<label for="imagenBien"><h2>Imagen</h2></label>
						</td>
						<td colspan="3">
							<input type="file" name="imagenBien" id="imagenBien">
						</td>
					</tr>					
					<tr>
						<td>							
							<label for="facturaBien"><h2>Factura</h2></label>
						</td>
						<td colspan="3">
							<input type="file" name="facturaBien" id="facturaBien">
						</td>
					</tr>
					<tr>
						<td>
							<label for="idProveedor"><h2>Proveedor</h2></label>
						</td>
						<td>
							<select name="idProveedor" id="idProveedor" class="text" required="required">
								<?php 
					$llenarBien= new bien;								
					$llenarBien->llenarSelectProveedor();
								?>
							</select>							
						</td>
						<td>
							<label for="fechaAdquisicion"><h2>Fecha de Adquisición</h2></label>
						</td>
						<td>
							<input class="text" type="date" required="required" name="fechaAdquisicion" id="fechaAdquisicion">										
						</td>						
					</tr>
					<tr>
					<td>
							<h2>
								Serial
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien" autocomplete="off" id='txtSerialBien' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
					</tr>
					<tr>
						<td>							
							<h2>Descripción Propia</h2>
						</td>
						<td colspan="3">
							<textarea class="text" name="descripcion_bien_individual" id="txtDescripcionPropiaBien" rows="3"></textarea>							
						</td>
					</tr>			
				</table>

				<input class="text" type="hidden" value="<?php echo $_SESSION["idBien2"]; ?>" name="idBien" id="idBien" >

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