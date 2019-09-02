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
		<script type="text/javascript" src="js/todos.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
</head>
	<body onload="focus ">
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Reporte de Bienes listados por Proveedores</h1>
			<form  action="../C/cListadoPorProveedor.php" method="POST" name="formu1" class="formu" id="formulario1">
			
					
										
							<h2>Seleccione una opción de la lista de Proveedores y un rango de fechas:</h2><br><br>
				
					
				<table>
					
						<tr>
							<td>
							Proveedor(es):  
							</td>


						<td>
							<select name="proveedor">
								<option value="todos">Todos </option>
								<?php 
								$a=new Bien;
								$a->llenarSelectProveedor2();
								?>
							</select>
				
						</td>
					</tr>
					<tr>
						<td>
							<label for="fechaAdquisicion" name="label" id="labelDesde">Desde:</td><td><input class="text" type="date" required="required" name="desde" id="inputDesde"></label>		
						</td>
						<td>
							<label for="fechaAdquisicion2" name="label" id="labelHasta">Hasta:</td><td><input class="text" type="date" required="required" name="hasta" id="inputHasta">	</label>	
						</td>	
					</tr>
					<tr><td colspan="4" align="center">
				</div>
			
				<input name="registrar" id="registrar" class="mvc-submit" value="Generar" type="submit">
						
				</td></tr>
			</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			
				
			

			
			</form>			
		</div>
	</div>
	<script>
	$(document).ready(function(){
		
		disablelabel();

	})


	

	</script>
	</body>

</html>
