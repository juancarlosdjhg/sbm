<?php 
session_start();

if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 
						}

include("../M/mUsuario.php");
$validar = new usuario;
$validar ->validarSesiones();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>SBM</title>
		<meta charset="utf-8">
		<link href="css/login-style.css" rel='stylesheet' type='text/css' />
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css'  media="all"/>
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>			
		
		<link href="css/alertify.css" rel='stylesheet' type='text/css' />
		<link href="css/alertify.min.css" rel='stylesheet' type='text/css' />
		<link href="css/alertify.rtl.css" rel='stylesheet' type='text/css' />
		<link href="css/alertify.rtl.min.css" rel='stylesheet' type='text/css' />




		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="../alertify.js"></script>
		<script type="text/javascript" src="../alertify.min.js"></script>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>			
	 <div class="main">
		<div class="class-form-1">
			<h1 class="class-h1">Usuarios</h1>
			<form name="formu" id="formulario" class="formu" action="../C/cUsuario.php" method="POST">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para gestionar los Usuarios del Sistema de Bienes Muebles</h3><br>

				<center>
				<table>
					<tr></tr>
					<tr>
						<td colspan="">
							<h2>
								Usuario: 
							</h2>
						</td>
						<td colspan="">
							<input  onkeyup="activarBtnCancelar();" value="<?php echo $_SESSION['nombre_usuario']; ?>" maxlength="25" name="nombre_usuario" id='txtCodigo' type="text" class="text" placeholder="Nombre de Usuario"; required>
						</td>
						<td>
						</td>						
						<td colspan="">
							<input name="consultar" id="btnConsultar" class="mvc-submit" type="submit" value="Consultar" >
						</td>
					</tr>
					<tr>
						<td>
							<h2>Contraseña</h2>
						</td>
						<td>
							<input value="<?php echo $_SESSION['contrasenia']; ?>" maxlength="25" pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]{5,25}" title="La contraseña puede contener letras y números. Debe contener entre 5 y 25 caracteres." name="contrasenia" id="txtNombre" type="password" class="text" placeholder="Contraseña"  >								
						</td>
						<td colspan="">
							<h2>Confirmar</h2>
						</td>
						<td colspan="">
							<input value="<?php echo $_SESSION['contrasenia2']; ?>" maxlength="25" name="contrasenia2" id="txtValor" type="password" class="text" placeholder="Contraseña" >							
						</td>
					</tr>
					</table>	
					</center>
					<br>
					<center>

						<?php
						 $tabla=new usuario();
						 $tabla->llenarTablaFunciones();

						 ?>

					</center>
					<br>
					<center><table>	
					<tr>
						<td>
							<input name="registrar" onclick="return validarVacios();" id="btnRegistrar" class="mvc-submit" type="submit" value="Registrar" disabled="disabled">
						</td>
						<td>
							<input name="modificar" onclick="return confirmar('modificaruser');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar" disabled="disabled">
						</td>						
						<td>
							<input name="eliminar" onclick="return confirmar('eliminaruser');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar" disabled="disabled">
						</td>
						<td>
							<input name="cancelar"	id="btnCancelar" class="mvc-submit" type="submit" value="Cancelar" disabled="disabled" >							
						</td>
					</tr>
					</table></center>
<?php 
	if(isset($_SESSION['nombre_usuario']))
	{
		echo "<script>disableBotonConsultar();</script>";	
		echo "<script>enableBotonCancelar();</script>";	
		if(!isset($_SESSION['contrasenia'])|| $_SESSION['contrasenia']==NULL){		
		echo "<script>enableBotonRegistrar();</script>";	
		echo "<script>activarCampos();</script>";		
		}else
			 if(isset($_SESSION['contrasenia']))
			 {	
				echo "<script>activarCampos();</script>";	
				echo "<script>enableBotonModificar();</script>";
				echo "<script>enableBotonEliminar();</script>";
			 }else
				echo "<script>activarCampos();</script>";	

	}else
		echo "<script>restablecerCampos();</script>";



?>						
				</table>
			</form>			
		</div>
	</div>
	<script>
	$(document).ready(function(){


var elementos=document.getElementById('formulario').elements;
var	largo=document.getElementById('formulario').length;
	var count=0;
	for(var i=0; i < largo; i++){
		if(<?php 
		$contador=0;
		foreach($_SESSION["permisos"] as $key=>$value){
			if($contador==0){
			echo "elementos[i].value=='".$value[2]."'";
			$contador++;
			}else{

			echo "|| elementos[i].value=='".$value[2]."'";
			}
		}
		
		?>
){
			elementos[i].checked=1;
		}

}




	})


	

	</script>
	</body>

</html>