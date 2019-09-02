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
			<h1 class="class-h1">Bienes (Datos)</h1>
			<form action="vGestionarDatosComponente.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table>
					<tr>
						<td>							
							<label for="nombreSubgrupo"><h2>Nombre</h2></label>
						</td>
						<td>
							<input class="text" type="search" readonly value="<?php echo $_SESSION['nombre_bien2'];?>" required="required" name="nombreBien" id="nombreBien" >			
						</td>
							<td>
							<label for="fechaAdquisicion"><h2>Fecha de Adquisición </h2></label>
						</td>
						<td>
							<input class="text" type="date" required="required" readonly value="<?php echo $_SESSION['fecha_adquisicion_bien2'];?>"  name="fechaAdquisicion" id="fechaAdquisicion">										
						</td>						
					</tr>
					<tr>
						<td>
							<label for="varlorBien"><h2>Valor Unitario</h2></label>
						</td>
						<td>
							<input class="text" type="text" readonly value="<?php echo $_SESSION['valor_bien2'];?>"  required="required" name="valorBien" id="valorBien" >										
						</td>						
						<td>
							<label for="marcaBien"><h2>Marca </h2></label>
						</td>
						<td>
							<input class="text" type="text" readonly value="<?php echo $_SESSION['marca_bien2'];?>"  required="required" name="marcaBien" id="marcaBien" >										
						</td>						

					</tr>
					<tr>
						<td>
							<label for="modeloBien"><h2>Modelo</h2></label>
						</td>
						<td>
							<input class="text" type="text" required="required" readonly value="<?php echo $_SESSION['modelo_bien2'];?>"  name="modeloBien" id="modeloBien" >										
						
						</td>						
						<td>
							<label for="colorBien"><h2>Color</h2></label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="colorBien" id="colorBien" readonly value="<?php echo $_SESSION['color_bien2'];?>" >										
						</td>						
						
							<input class="text" type="hidden" value="<?php echo $_SESSION["idBien2"]; ?>" name="idBien" id="idBien" >										
									
					</tr>
					
					</table>
					<table>
					<tr>						
						<td align="center">
							<input name="agregar" id="agregar" class="mvc-submit" value="Agregar " type="submit">
						</td>			
					</tr>
					</table>						
			</form>
					
					<div class="formu2">
					<label><h2>Bienes Asociados</h2></label>
					<BR>
					<table class="tablaResultados" id="tablaResultados1">				
						<?php 
						include("../M/mGestionarComponente.php");
						$llenarBien=new componente;
						$llenarBien->llenarTabla();
						?>
					</div>
					</table>	
			

</div>
					</div>	

	</body>

</html>