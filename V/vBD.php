<?php 
session_start();

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>SBM</title>
		<meta charset="utf-8">
		<link href="css/login-style.css" rel='stylesheet' type='text/css' />
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' />
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
	<body>		
	 <div class="main">
		<div class="class-form-1">
			<h1 class="class-h1">Base de Datos</h1>
			<form name="formu" id="formulario" class="formu" action="../C/cBD.php" method="POST">
				<center><table>
				<tr>
				<td colspan="4"><h2 class="red">Los parámetros de Conexion a la Base de Datos no son los correctos.<br>Por favor introduzca los nuevos parametros:<br><br></h2>
				</td>
					</tr>
					<tr>			
						<td>
							<h2>Host</h2>
						</td>
						<td>
							<input maxlength="25" name="host" id="txthost" type="text" class="text" placeholder="Host "  >								
						</td>
					</tr>
						<tr>
						<td>
							<h2>Port</h2>
						</td>
						<td>
							<input maxlength="25" name="port" id="txtport" type="text" class="text" placeholder="Port "  >								
						</td>
					</tr>
					<tr>
						<td>
							<h2>Base de Datos</h2>
						</td>
						<td>
							<input maxlength="25" name="bd" id="txtbd" type="text" class="text" placeholder="BD "  >								
						</td>
					</tr>
					<tr>
						<td>
							<h2>Usuario</h2>
						</td>
						<td>
							<input maxlength="25" name="usuario" id="txtusuario" type="text" class="text" placeholder="Usuario "  >								
						</td>
					</tr>
					<tr>
						<td>
							<h2>Contraseña</h2>
						</td>
						<td>
							<input maxlength="25" name="contrasena" id="txtcontrasena" type="text" class="text" placeholder="Contrasena "  >								
						</td>
					</tr>
					<tr>
						<td>
							<input name="registrar" id="btnRegistrar" class="mvc-submit" type="submit" value="Registrar">
						</td>
					</tr></center>					
				</table>
			</form>			
		</div>
	</div>
	</body>

</html>