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
		<script type="text/javascript" src="vProveedorAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Proveedores</h1>
			<form action="../C/cProveedor.php" method="POST" name="formu1" class="formu" id="formulario1">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para gestionar los proveedores de los Bienes Muebles</h3><br>

				<table>
					<tr>
						<td>							
							<label for="nombreProveedor"><h2>Codigo del Proveedor:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Nombre del Proveedor a Registrar</span>
						</td>						
						<td>
							<input class="text-nombre" maxlength="25" type="text" required="required" name="codigoProveedor" id="codigoProveedor" autocomplete="off" pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>
						<td>
							<label for="rifProveedor"><h2>Rif:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese el RIF del Proveedor a Registrar</span>
						</td>
						<td>
							<select name="rifTipo" id="rifTipo" style="width:50px;">
								<option value="V">V</option>
								<option value="J">J</option>
								<option value="G">G</option>
								<option value="G">E</option>


							</select>					

							<input class="text-nombre" maxlength="8" type="text" required="required" name="rifProveedor" id="rifProveedor" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" style="width:140px;">
							-
							<input class="text-nombre" maxlength="1" type="text" required="required" name="sufijoRif" id="sufijoRif" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" style="width:20px;">							
						</td>	
					</tr>
					<tr>
						<td>							
							<label for="descripcionProveedor"><h2>Descripción:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí la descripción del Proveedor a Registrar</span>
						</td>						
						<td colspan='4'>
							<textarea class="text-nombre" required="required" name="descripcionProveedor" id="descripcionProveedor" autocomplete="off"></textarea>		
						</td>
					</tr>	
					<tr>
						<td>							
							<label for="otraDescripcionProveedor"><h2>Otra Descripción:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí otra descripción del Proveedor a Registrar</span>
						</td>						
						<td colspan='4'>
							<textarea class="text-nombre" name="otraDescripcionProveedor" id="otraDescripcionProveedor" autocomplete="off"></textarea>		
						</td>
					</tr>
					<tr>
						<td>							
							<label for="otraDescripcionProveedor"><h2>Dirección:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí la Dirección del Proveedor a Registrar</span>
						</td>						
						<td colspan='4'>
							<textarea class="text-nombre" name="direccion" id="direccion" autocomplete="off"></textarea>		
						</td>
					</tr>							
					<tr>
						<td>
							<label for="tipoProveedor"><h2>Tipo de Proveedor:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Seleccione el Tipo del Proveedor a Registrar</span>
						</td>
						<td>
							<select name="tipoProveedor" id="tipoProveedor" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="regional">
									Regional
								</option>
								<option value="nacional">
									Nacional
								</option>
								<option value="internacional">
									Internacional
								</option>


							</select>
						</td>
					</tr>

				</table>
				<div class="red"><a>(*)</a> Todos los campos son obligatorios.</div>	
				<input name="registrar" onclick="return confirm('¿Desea Registrar ese Proveedor?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
					<h2>Catálogo de Proveedores registrados</h2><br>

				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
						include("../M/mConexion.php");
						$cnx = new conexion();
						$cnx->conectar();

						$sqlConsultar="select * from proveedor";	
						$resultados=pg_query($cnx->conx ,$sqlConsultar); 

									$num=pg_num_rows($resultados);
									if($num!=0){
										echo '<tr><th>Resultado Nº</th><th>Proveedores Registrados</th><th>Rif</th></tr>';
										$contador=0;
										$contador1=1;
										while($row=pg_fetch_array($resultados)){
											$id_proveedor=$row['id_proveedor'];
											$codigo_proveedor=$row["codigo_proveedor"];
											$rif=$row["rif"];
											$partes=explode('-', $rif);
											$tipo_rif=$partes[0];
											$rif_del_proveedor=$partes[1];
											$sufijo_rif=$partes[2];
											$tipo_proveedor=$row["tipo_proveedor"];
											$descripción=$row["descripcion_proveedor"];
											$otra_descripcion=$row["otra_descripcion"];

											$idCampoIdProveedor='idProveedor'.$contador;
											$idCampoRif='rifProveedor'.$contador;

											$idCampoTipoRif='tipoRif'.$contador;
											$idCampoRif_del_proveedor='rifDelProveedor'.$contador;
											$idCampoSufijo_rif='sufijoRif'.$contador;


											$idCampoCodigo='codigoProveedor'.$contador;
											$idCampoTipo='tipoProveedor'.$contador;
											$idCampoDescripcion='descripcionProveedor'.$contador;											
											$idCampoOtraDescripcion='otraDescripcion'.$contador;

										echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'<input type="hidden" id='.$idCampoRif.' value=\''.$rif.'\'><input type="hidden" id='.$idCampoIdProveedor.' value=\''.$id_proveedor.'\'><input type="hidden" id='.$idCampoCodigo.' value=\''.$codigo_proveedor.'\'><input type="hidden" id='.$idCampoTipo.' value=\''.$tipo_proveedor.'\'><input type="hidden" id='.$idCampoDescripcion.' value=\''.$descripción.'\'><input type="hidden" id='.$idCampoOtraDescripcion.' value=\''.$otra_descripcion.'\'></td><input type="hidden" id='.$idCampoTipoRif.' value=\''.$tipo_rif.'\'><input type="hidden" id='.$idCampoRif_del_proveedor.' value=\''.$rif_del_proveedor.'\'><input type="hidden" id='.$idCampoSufijo_rif.' value=\''.$sufijo_rif.'\'><td>'.$codigo_proveedor.'</td><td>'.$rif.'</td></tr>';
										$contador++;
										$contador1++;
										}	
											
									}




					?>
				</table>

				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Proveedores</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cProveedor.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Codigo del Proveedor: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí el Codigo de la Proveedor</span>
						</td>						
						<td>
							<input maxlength="25" name="codigo_proveedor" autocomplete="off" id='txtCodigoProveedor' type="text" class="text-nombre" placeholder="Codigo del Proveedor" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
						<td>
							<label for="rifProveedor"><h2>Rif:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese el RIF del Proveedor a Registrar</span>
						</td>
						<td>
							<select name="rifTipo2" id="txtRifTipo" style="width:50px;">
								<option value="V">V</option>
								<option value="J">J</option>
								<option value="G">G</option>
								<option value="E">E</option>


							</select>					

							<input class="text-nombre" maxlength="8" type="text" required="required" name="rif_proveedor" id="txtRifProveedor" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" style="width:140px;">
							-<input type="hidden" id="txtIdProveedor" name="id_proveedor">	
							<input class="text-nombre" maxlength="1" type="text" required="required" name="sufijoRif2" id="txtSufijoRif" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" style="width:20px;">							
						</td>	

						
					</tr>
					<tr>
						<td colspan="">
							<h2>
								Descripción:
							</h2>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí la descripción del Proveedor</span>
						</td>						
						<td colspan='4'>
							<textarea name="descripcion_proveedor" autocomplete="off" id='txtDescripcionProveedor' type="text" class="text-nombre" placeholder="Descripcion del Proveedor" required></textarea>							
						</td>
					</tr>
					<tr>
						<td colspan="">
							<h2>
								Otra Descripción:
							</h2>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Ingrese aquí otra descripción del Proveedor</span>
						</td>						
						<td colspan='4'>
							<textarea name="otra_descripcion" autocomplete="off" id='txtOtraDescripcionProveedor' type="text" class="text-nombre" placeholder="Otra Descripcion del Proveedor"></textarea>							
						</td>
					</tr>
					<tr>						
						<td>							
							<label for="txtTipoProveedor"><h2>Tipo de Proveedor:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Informacion</em>Seleccione el Tipo del Proveedor a Registrar</span>
						</td>
						<td>
							<select name="tipo_proveedor" id="txtTipoProveedor" required>
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="nacional">
									Nacional
								</option>
								<option value="internacional">
									Internacional
								</option>

							</select>
						</td>
					</tr>			
				</table>
							 <div class="red"><a>(*)</a> Todos los campos son obligatorios.</div>	<br>

				<div align="center">
							<input name="modificar" onclick="return confirm('¿Desea Modificar este Proveedor?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar este Proveedor?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
							<input name="cancelar"	onclick="atras();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">							
				</div>

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