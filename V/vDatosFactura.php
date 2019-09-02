<?php 
session_start();

if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 
						}
$id_bien=$_SESSION['idBien'];
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
		<script type="text/javascript" src="vResponsableAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Datos de la Orden de Compra y Factura</h1>
			<form action="../C/cDatosFactura.php" method="POST" name="formu1" class="formu" id="formulario1">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Ingrese en este formulario los datos de la Orden de Compra y de la Factura del Bien para generar el Acta de Control Perceptivo</h3><br>

				<table>
					<tr>
						<td>							
							<label for="nombreResponsable"><h2>Orden de Compra:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Número de la Orden de Compra</span>
						</td>						
						<td>
							<input class="text-nombre" maxlength="25" type="text" required="required" name="orden_compra" id="nombreResponsable" autocomplete="off" pattern="[0-9]+" onkeyup="return validarEspacio(event,this);" placeholder="Ingrese la Orden de Compra" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">
							<input type="hidden" value="<?php echo $id_bien; ?>" name="id_bien"  />				
						</td>
						<td>
							<label for="cedulaResponsable"><h2>Orden de Servicio:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí la Orden de Servicio</span>
						</td>		
						<td>
							<input class="text-nombre" maxlength="8" type="text" required="required" name="orden_servicio" id="cedulaResponsable" placeholder="Ingrese la Orden de Servicio" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">						
						</td>	
					</tr>
					<tr>
						<td>							
							<label for="apellidoResponsable"><h2>Fecha de la Orden de Compra:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí la fecha de la Orden de Compra</span>
						</td>						
						<td>
							<input class="text" type="date" maxlength="25" required="required" name="fecha_orden">			
						</td>
						<td>							
							<label for="sexoResponsable"><h2>Monto Total:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese el monto total de la Orden de Compra</span>
						</td>
						<td>
							<input class="text-nombre" maxlength="25" type="text" required="required" name="monto_orden" id="nombreResponsable" placeholder="Ingrese el monto en Bs" autocomplete="off" pattern="[0-9]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">	
						</td>
					</tr>
					<tr>
						<td>
							<label for="telefonoResponsable"><h2>Nota de Entrega:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el número de teléfono del Responsable a Registrar</span>
						</td>
						<td colspan="">
							<input class="text-nombre" placeholder="Ingrese la nota de entrega" maxlength="11" type="text" required="required" name="nota_entrega" id="telefonoResponsable" autocomplete="off" pattern="[0-9]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">					
						</td>
						<td>
							<label for="cargoResponsable"><h2>Número de Factura:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese el número de la factura del Bien</span>
						</td>
						<td>
						<input class="text-nombre" placeholder="Ingrese la factura del bien" maxlength="25" type="text" required="required" name="numero_factura" id="nombreResponsable" autocomplete="off" pattern="[0-9]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">	
						</td>						
					</tr>
					<tr>
						<td>							
							<label for="nombreResponsable"><h2>Fecha de Factura:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese la fecha de la Factura del Bien</span>
						</td>						
						<td>
							<input class="text" maxlength="25" type="date" required="required" name="fecha_factura" id="fecha_factura" autocomplete="off" pattern="[0-9]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>
						<td>
							<label for="cedulaResponsable"><h2>Monto total de la Factura:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese el monto total en Bolivares de la Factura</span>
						</td>		
						<td>
							<input class="text-nombre" maxlength="8" type="text" required="required" name="monto_factura" id="cedulaResponsable" placeholder="Ingrese el monto en Bs" autocomplete="off" pattern="[0-9]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">						
						</td>	
					</tr>
					<tr>
						<td>							
							<label for="nombreResponsable"><h2>Concepto General:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Concepto General de la Adquisición o Prestación del Servicio</span>
						</td><tr></tr>						
						<td colspan="7">
							<textarea class="text" maxlength="25" type="text" required="required" name="concepto_general" id="nombreResponsable" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();"></textarea>		
						</td>
						
					</tr>
				</table>
				<div class="red"><a>(*)</a> Todos los campos son obligatorios.</div>	
				<input name="registrar" onclick="return confirm('¿Desea continuar?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
				
				</form>
			<br>
		</div>	
		
	</div>
	<script>
	$(document).ready(function(){
		cargar();


	})


	

	</script>
	</body>

</html>