<?php 
session_start();

if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 
						}

include("../M/mPerfil.php");
$validar = new perfil;
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
			<h1 class="class-h1">Perfil de Usuarios</h1>
			<form name="formu" id="formulario" class="formu" action="../C/cUsuario.php" method="POST">
				<table>
					<tr>
						<td colspan="2">
							<h2>
								Perfil Usuario: 
							</h2>
						</td>
						<td>
							<input  onkeyup="activarBtnCancelar();" value="<?php echo $_SESSION['perfil_usuario']; ?>" maxlength="25" name="perfil_usuario" id='txtCodigo' type="text" class="text" placeholder="Nombre de Usuario"; required>
						</td>
						<td>
							<input name="consultar" id="btnConsultar" class="mvc-submit" type="submit" value="Consultar" >
						</td>
					</tr>
					<tr>
						<td>
						<h1>Funciones:</h1>
						<td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Responsable</h2>
						</td>
						<td>
							<select name="gestionar_responsable" id="gestionar_responsable" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>								
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Usuario</h2>
						</td>
						<td>
							<select name="gestionar_usuario" id="gestionar_usuario" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>									
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Departamento</h2>
						</td>
						<td>
							<select name="gestionar_departamento" id="gestionar_departamento" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>						
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Sección</h2>
						</td>
						<td>
							<select name="gestionar_seccion" id="gestionar_seccion" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>								
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Cargo</h2>
						</td>
						<td>
							<select name="gestionar_cargo" id="gestionar_cargo" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>							
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Grupo</h2>
						</td>
						<td>
							<select name="gestionar_grupo" id="gestionar_grupo" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>							
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Sub-Grupo</h2>
						</td>
						<td>
							<select name="gestionar_subgrupo" id="gestionar_subgrupo" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>								
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Concepto</h2>
						</td>
						<td>
							<select name="gestionar_concepto" id="gestionar_concepto" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>								
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Función Gestionar Base de Datos</h2>
						</td>
						<td>
							<select name="gestionar_bd" id="gestionar_bd" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="TRUE">
									Si
								</option>
								<option value="FALSE">
									No
								</option>

							</select>							
						</td>
					
					<tr>
						<td>
							
						</td>						
						<td>
							<input name="registrar" onclick="return validarVacios();" id="btnRegistrar" class="mvc-submit" type="submit" value="Registrar" disabled="disabled">
						</td>
						<td>
							<input name="modificar" onclick="return confirmar('modificar');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar" disabled="disabled">
						</td>
						<td>				
						</td>						
						<td>
							<input name="eliminar" onclick="return confirmar('eliminar');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar" disabled="disabled">
						</td>
						<td>
							<input name="cancelar"	id="btnCancelar" class="mvc-submit" type="submit" value="Cancelar" disabled="disabled" >							
						</td>
					</tr>
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
	</body>

</html>