<?php 
session_start();

if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 
						}

include("../M/mBien.php");
$validar = new bien;
$validar ->validarSesiones();
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
	<?php 
	include('dropdown.php');
	menu();
	?>				
	 <div class="main">
		<div class="class-form-1">
			<h1 class="class-h1">Bienes Muebles</h1>
			<form name="formu" id="formulario" class="formu" action="../C/cBien.php" method="POST">
				<table>
					<tr>
						<td colspan="2">
							<h2></h2>
						</td>
						<td colspan="2">
							<h2>
								Codigo del Bien: 
							</h2>
						</td>
						<td>
							<input  onkeyup="activarBtnCancelar();" value="<?php echo $_SESSION['codigo_bien']; ?>" maxlength="25" name="codigo_bien" id='txtCodigo' type="text" class="text" placeholder="Codigo del bien"; required>
						</td>
						<td>
							<input name="consultar" id="btnConsultar" class="mvc-submit" type="submit" value="Consultar" >
						</td>
					</tr>
					<tr>
						<td>
							<h2>Nombre del bien</h2>
						</td>
						<td>
							<input value="<?php echo $_SESSION['nombre_bien']; ?>" maxlength="25" name="nombre_bien" id="txtNombre" type="text" class="text" placeholder="Nombre "  >								
						</td>
						<td colspan="2">
							<h2>Valor del bien</h2>
						</td>
						<td>
							<input value="<?php echo $_SESSION['valor_bien']; ?>" maxlength="25" name="valor_bien" id="txtValor" type="text" class="text" placeholder="Bs. " >							
						</td>
					</tr>
					<tr>
						<td>
							<h2></h2>
						</td>
						<td>
												
						</td>
						<td colspan="2">
							<h2>
								Fecha de Adquisicion
							</h2>
						</td>
						<td>
							<input value="<?php echo $_SESSION['fecha_adquisicion_bien']; ?>" maxlength="25" name="fecha_adquisicion_bien" id="txtFecha" type="date" class="text" placeholder="dd/mm/aaaa" >							
						</td>
						<td>
					</tr>
					<tr>
						<td>
							<h2>
								Grupo
							</h2>
						</td>
						<td>
							<select name="grupo_bien" id="selectGrupo" >
								<option selected="selected" value="Seleccione">
									Seleccione
								</option>
								<option value="1">
									Grupo Nº 1
								</option>
								<option value="2">
									Grupo Nº 2
								</option>

							</select>
						</td>
						<td colspan="2">
							<h2 >
								Sub-Grupo
							</h2>
						</td>
						<td>
							<select name="sub_grupo_bien" id="selectSubGrupo" >
								<option selected="selected" value="Seleccione">
									Seleccione
								</option>
								<option value="1">
									Sub-Grupo Nº 1
								</option>
								<option value="2">
									Sub-Grupo Nº 2
								</option>

							</select>
						</td>
					</tr>
					<tr>
						<td>
							<h2>
								Descripcion
							</h2>
						</td>
						<td colspan="5">
							<textarea name="descripcion_bien" id="txtDescripcion" cols="70" rows="5" placeholder="Ingrese la descripcion del bien [Color,Marca,Caracteristicas,potencia,etc...]" ><?php echo $_SESSION['descripcion_bien']; ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<h2> </h2>
						</td>
					</tr>
					<tr>
						<td colspan="">
							
						</td>						
						<td colspan="">
							<input name="registrar" onclick="return validarVacios();" id="btnRegistrar" class="mvc-submit" type="submit" value="Registrar" disabled="disabled">
						</td>

					
						<td colspan="">
							<input name="modificar" onclick="return confirmar('modificar');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar" disabled="disabled">
						</td>						
						<td>
							<input name="eliminar" onclick="return confirmar('eliminar');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar" disabled="disabled">
						</td>
						<td>
							<input name="cancelar"	id="btnCancelar" class="mvc-submit" type="submit" value="Cancelar" disabled="disabled" >							
						</td>
					</tr>
<?php 
	if(isset($_SESSION['codigo_bien']))
	{
		echo "<script>disableBotonConsultar();</script>";	
		echo "<script>enableBotonCancelar();</script>";	
		if(!isset($_SESSION['nombre_bien'])|| $_SESSION['nombre_bien']==NULL){		
		echo "<script>enableBotonRegistrar();</script>";	
		echo "<script>activarCampos();</script>";		
		}else
			 if(isset($_SESSION['nombre_bien']))
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