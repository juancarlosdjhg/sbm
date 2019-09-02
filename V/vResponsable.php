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
		<script type="text/javascript" src="vResponsableAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Responsables</h1>
			<form action="../C/cResponsable.php" method="POST" name="formu1" class="formu" id="formulario1">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/>Este Formulario será utilizado para gestionar los responsables de los Bienes Muebles</h3><br>

				<table>
					<tr>
						<td>							
							<label for="nombreResponsable"><h2>Nombre:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Nombre del Responsable a Registrar</span>
						</td>						
						<td>
							<input class="text-nombre" maxlength="25" type="text" required="required" name="nombreResponsable" id="nombreResponsable" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>
						<td>
							<label for="cedulaResponsable"><h2>Cédula:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí la cédula del Responsable a Registrar</span>
						</td>		
						<td>
							<select style="width:45px;" name="tipoCedula">
								<option value="v">
									V
								</option>
								<option value="n">
									N
								</option>
								<option value="e">
									E
								</option>
							</select>	
							<input style="width:140px;" class="text-nombre" maxlength="8" type="text" required="required" name="cedulaResponsable" id="cedulaResponsable" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">	
						</td>	
					</tr>
					<tr>
						<td>							
							<label for="apellidoResponsable"><h2>Apellido:</h2></label>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Código del Responsable a Registrar</span>
						</td>						
						<td>
							<input class="text-nombre" type="text" maxlength="25" required="required" name="apellidoResponsable" id="apellidoResponsable" autocomplete="off" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">			
						</td>
						<td>							
							<label for="sexoResponsable"><h2>Sexo:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione el Sexo del Responsable a Registrar</span>
						</td>
						<td>
							<select name="sexoResponsable" id="sexoResponsable" style="width:200px;">
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="M">
									Masculino
								</option>
								<option value="F">
									Femenino
								</option>

							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="telefonoResponsable"><h2>Teléfono:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el número de teléfono del Responsable a Registrar</span>
						</td>
						<td colspan="">
							<input class="text-nombre" maxlength="11" type="text" required="required" name="telefonoResponsable" id="telefonoResponsable" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">					
						</td>
						<td>
							<label for="cargoResponsable"><h2>Cargo:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione el cargo del Responsable a Registrar</span>
						</td>
						<td>
							<select name="cargoResponsable" id="cargoResponsable">
 							<option selected="selected" value="">Seleccione</option>
 							<?php
 								include("../M/mConexion.php");
 								$cnx = new conexion();
								$cnx->conectar();
 								$tira="SELECT * FROM cargo";
								$sql=pg_query($cnx->conx ,$tira);
								while($lista=pg_fetch_array($sql))
   								echo "<option  value='".$lista["id_cargo"]."'>".$lista["nombre_cargo"]."</option>";
   							?>
							</select>
						</td>						
					</tr>
					<tr>
						<td>
							<label for="tipoResponsable"><h2>Tipo de Responsable:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el tipo del Responsable a Registrar</span>
						</td>
						<td>
							<select name="tipoResponsable" id="tipoResponsable">
	 							<option selected="selected" value="">Seleccione</option>
	 							<option value="a">Administrativo</option>
	 							<option value="ud">Uso Directo</option>
	 							<option value="cd">Cuido Directo</option>
							</select>
						</td>						
						<td>
							<label for="dependenciaAdministrativa"><h2>Dependencia Administrativa:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione el cargo del Responsable a Registrar</span>
						</td>
						<td>
							<select name="dependenciaAdministrativa" id="dependenciaAdministrativa">
	 							<option selected="selected" value="">Seleccione</option>
 							<?php
 								$cnx = new conexion();
								$cnx->conectar();
 								$tira="SELECT * FROM seccion";
								$sql=pg_query($cnx->conx ,$tira);
								while($lista=pg_fetch_array($sql))
   								echo "<option  value='".$lista["id_seccion"]."'>".$lista["nombre_seccion"]."</option>";
 								$tira="SELECT * FROM entidad_propietaria";
								$sql=pg_query($cnx->conx ,$tira);
								while($lista=pg_fetch_array($sql))
   								echo "<option  value='".$lista["id_entidad_propietaria"]."'>".$lista["nombre_entidad_propietaria"]."</option>";
   							?>
							</select>
						</td>						
					</tr>
					<tr>
						<td>
							<label for="numeroResolucion"><h2>Numero de Resolución:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aqui el numero de Resolución del Responsable a Registrar</span>
						</td>
						<td>
							<input class="text-nombre" name="numeroResolucion" id="numeroResolucion"  maxlength="12" type="text" required="required" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
						<td>
							<label for="fechaResolucion"><h2>Fecha de Resolución:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aqui el numero de Resolución del Responsable a Registrar</span>
						</td>
						<td>
							<input class="text" name="fechaResolucion" id="fechaResolucion" type="date" required="required" autocomplete="off"  onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
					</tr>
					<tr>
						<td>
							<label for="numeroDecreto"><h2>Numero de Decreto:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aqui el numero de Resolución del Responsable a Registrar</span>
						</td>
						<td>
							<input class="text-nombre" name="numeroDecreto" id="numeroDecreto"  maxlength="12" type="text" required="required" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
						<td>
							<label for="fechaDecreto"><h2>Fecha de Decreto:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aqui el numero de Resolución del Responsable a Registrar</span>
						</td>
						<td>
							<input class="text" name="fechaDecreto" id="fechaDecreto" type="date" required="required" autocomplete="off"  onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
					</tr>

				</table>
				<div class="red"><a>(*)</a> Todos los campos son obligatorios.</div>	
				<input name="registrar" onclick="return confirm('¿Desea Registrar ese Responsable?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
				
				<h2>Catálogo de Responsables registrados</h2><br>
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 

						$cnx = new conexion();
						$cnx->conectar();

						$sqlConsultar="select * from responsable as r JOIN datos_personales as dp on r.id_datos_personales=dp.id_datos_personales ORDER BY dp.nombre";	
						$resultados=pg_query($cnx->conx ,$sqlConsultar); 

									$num=pg_num_rows($resultados);
									if($num!=0){
										echo '<tr><th>Resultado Nº</th><th>Responsables Registrados</th><th>Cédula</th></tr>';
										$contador=0;
										$contador1=1;
										while($row=pg_fetch_array($resultados)){
											$id_responsable=$row['id_responsable'];
											$nombre=$row["nombre"];
											$cedula=$row["cedula"];
											$apellido=$row["apellido"];
											$sexo=$row["sexo"];
											$telefono=$row["telefono"];
											$cargo=$row["id_cargo"];
											$tipo_responsable=$row["tipo_responsable"];
											$id_dependencia_administrativa=$row["id_entidad_propietaria"];
											$resolucion=$row["resolucion"];
											$fecha_resolucion=$row["fecha_resolucion"];
											$decreto=$row["decreto"];
											$fecha_decreto=$row["fecha_decreto"];

											$idCampoIdResponsable='idResponsable'.$contador;
											$idCampoCedula='cedulaResponsable'.$contador;
											$idCampoNombre='nombreResponsable'.$contador;
											$idCampoApellido='apellidoResponsable'.$contador;
											$idCampoSexo='sexoResponsable'.$contador;
											$idCampoTelefono='telefonoResponsable'.$contador;											
											$idCampoCargo='cargoResponsable'.$contador;
											$idCampoTipoResponsable='tipoResponsable'.$contador;
											$idCampoDependenciaAdministrativa='dependenciaAdministrativa'.$contador;
											$idCampoResolucion='numeroResolucion'.$contador;
											$idCampoFechaResolucion='fechaResolucion'.$contador;
											$idCampoDecreto='numeroDecreto'.$contador;
											$idCampoFechaDecreto='fechaDecreto'.$contador;

										echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'<input type="hidden" id='.$idCampoCedula.' value=\''.$cedula.'\'><input type="hidden" id='.$idCampoIdResponsable.' value=\''.$id_responsable.'\'><input type="hidden" id='.$idCampoNombre.' value=\''.$nombre.'\'><input type="hidden" id='.$idCampoApellido.' value=\''.$apellido.'\'><input type="hidden" id='.$idCampoSexo.' value=\''.$sexo.'\'><input type="hidden" id='.$idCampoTelefono.' value=\''.$telefono.'\'><input type="hidden" id='.$idCampoCargo.' value=\''.$cargo.'\'><input type="hidden" id='.$idCampoTipoResponsable.' value=\''.$tipo_responsable.'\'><input type="hidden" id='.$idCampoDependenciaAdministrativa.' value=\''.$id_dependencia_administrativa.'\'><input type="hidden" id='.$idCampoResolucion.' value=\''.$resolucion.'\'><input type="hidden" id='.$idCampoFechaResolucion.' value=\''.$fecha_resolucion.'\'><input type="hidden" id='.$idCampoDecreto.' value=\''.$decreto.'\'><input type="hidden" id='.$idCampoFechaDecreto.' value=\''.$fecha_decreto.'\'></td><td>'.$nombre.' '.$apellido.'</td><td>'.$cedula.'</td></tr>';
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
			<h1 class="class-h1">Responsables</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cResponsable.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Nombre: 
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Nombre de la Responsable</span>
						</td>						
						<td>
							<input maxlength="25" name="nombre_responsable" autocomplete="off" id='txtNombreResponsable' type="text" class="text-nombre" placeholder="Nombre de la Responsable" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();" required>
						</td>
						<td>
							<h2>Cédula:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí la cédula del Responsable a Registrar</span>
						</td>		
						<td>
							<input class="text-nombre" maxlength="8" placeholder="Cedula de la Responsable"  type="text" required="required" name="cedula_responsable" id="txtCedulaResponsable" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">							
							<input type="hidden" id="txtIdResponsable" name="id_responsable">						
						</td>
					</tr>
					<tr>
						<td colspan="">
							<h2>
								Apellido:
							</h2>
						</td>
						<td>
						<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Apellido del Responsable</span>
						</td>						
						<td>
							<input maxlength="25" name="apellido_responsable" autocomplete="off" id='txtApellidoResponsable' type="text" class="text-nombre" placeholder="Apellido del Responsable" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>							
						</td>
						<td>							
							<label for="sexoResponsable"><h2>Sexo:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione el Sexo del Responsable a Registrar</span>
						</td>
						<td>
							<select name="sexo" id="txtSexoResponsable" >
								<option selected="selected" value="">
									Seleccione
								</option>
								<option value="M">
									Masculino
								</option>
								<option value="F">
									Femenino
								</option>

							</select>
						</td>
					</tr>
					<tr>
						<td>
							<h2>Teléfono:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el teléfono del Responsable a Registrar</span>
						</td>		
						<td>
							<input class="text-nombre" maxlength="8" placeholder="Teléfono del Responsable"  type="text" required="required" name="telefono" id="txtTelefonoResponsable" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">									
						</td>
						<td>
							<h2>Cargo:</h2>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione el cargo del Responsable a Registrar</span>
						</td>
						<td>
							<select name="cargo_responsable" id="txtCargoResponsable">
 							<option value="">Seleccione</option>
 							<?php
 								$tira="SELECT * FROM cargo";
								$sql=pg_query($cnx->conx ,$tira);
								while($lista=pg_fetch_array($sql))
   								echo "<option  value='".$lista["id_cargo"]."'>".$lista["nombre_cargo"]."</option>";
   							?>
							</select>
						</td>				
					</tr>
					<tr>
						<td>
							<label for="txtTipoResponsable"><h2>Tipo de Responsable:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el tipo del Responsable a Registrar</span>
						</td>
						<td>
							<select name="tipo_responsable" id="txtTipoResponsable">
	 							<option selected="selected" value="">Seleccione</option>
	 							<option value="a">Administrativo</option>
	 							<option value="ud">Uso Directo</option>
	 							<option value="cd">Cuido Directo</option>
							</select>
						</td>						
						<td>
							<label for="txtDependenciaAdministrativa"><h2>Dependencia Administrativa:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione el cargo del Responsable a Registrar</span>
						</td>
						<td>
							<select name="dependencia_administrativa" id="txtDependenciaAdministrativa">
	 							<option selected="selected" value="">Seleccione</option>
 							<?php
 								$cnx = new conexion();
								$cnx->conectar();
 								$tira="SELECT * FROM entidad_propietaria";
								$sql=pg_query($cnx->conx ,$tira);
								while($lista=pg_fetch_array($sql))
   								echo "<option  value='".$lista["id_entidad_propietaria"]."'>".$lista["nombre_entidad_propietaria"]."</option>";
   							?>
							</select>
						</td>						
					</tr>
					<tr>
						<td>
							<label for="txtNumeroResolucion"><h2>Numero de Resolución:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aqui el numero de Resolución del Responsable a Registrar</span>
						</td>
						<td>
							<input class="text-nombre" name="numero_resolucion" id="txtNumeroResolucion"  maxlength="12" type="text" required="required" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
						<td>
							<label for="txtFechaResolucion"><h2>Fecha de Resolución:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aqui el numero de Resolución del Responsable a Registrar</span>
						</td>
						<td>
							<input class="text" name="fecha_resolucion" id="txtFechaResolucion" type="date" required="required" autocomplete="off"  onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
					</tr>
					<tr>
						<td>
							<label for="txtNumeroDecreto"><h2>Numero de Decreto:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aqui el numero de Resolución del Responsable a Registrar</span>
						</td>
						<td>
							<input class="text-nombre" name="numero_decreto" id="txtNumeroDecreto"  maxlength="12" type="text" required="required" autocomplete="off" pattern="[0-9\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
						<td>
							<label for="txtFechaDecreto"><h2>Fecha de Decreto:</h2></label>
						</td>
						<td>
							<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aqui el numero de Resolución del Responsable a Registrar</span>
						</td>
						<td>
							<input class="text" name="fecha_decreto" id="txtFechaDecreto" type="date" required="required" autocomplete="off"  onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
					</tr>					
				</table>
							 <div class="red"><a>(*)</a> Todos los campos son obligatorios.</div>	<br>

				<div align="center">
							<input name="modificar" onclick="return confirm('¿Desea Modificar este Responsable?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar este Responsable?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
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