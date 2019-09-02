<?php 
session_start();
include("../M/mConexion.php");
		$cnx = new conexion();
		$cnx->conectar();

$id_bien=$_POST["idBien"];

		//$sqlConsultar="select * from datos_bien where id_bien='".$id_bien."'";	
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN grupo as g on g.id_grupo=CAST(sg.id_grupo AS INT)  JOIN proveedor as p on p.id_proveedor=CAST(db.id_proveedor as INT) where b.id_bien='".$id_bien."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){					
						echo "<script> alert('Bien no encontrado')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vConsultarPorCodigo.php'>";
								return 0;
								}

					else{
								
				while($row=pg_fetch_array($resultados)){
							$id_bien=$row["id_bien"];
							$nombre_bien=$row["nombre_bien"];
							$valor_bien=$row["valor_bien"];
							$marca_bien=$row["marca_bien"];
							$modelo_bien=$row["modelo_bien"];
							$color_bien=$row["color_bien"];
							$ruta_imagen=$row["ruta_imagen"];
							$ruta_pdf=$row["ruta_pdf"];
							$id_sub_categoria_especifica=$row["id_sub_categoria_especifica"];
							$id_subgrupo=$row["id_subgrupo"];
							$fecha_adquisicion_bien=$row["fecha_adquisicion_bien"];
							$descripcion_bien=$row["descripcion_bien"];
							$serial_bien=$row["serial_bien"];
							$sqlConsultarSubGrupo="select * from subgrupo where id_subgrupo='$id_subgrupo'";
							$id_grupo=$row["id_grupo"];
							$nombre_subgrupo=$row["nombre_subgrupo"];
							$grupo=$row["nombre_grupo"];							
																		}										
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

		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Bienes (Datos)</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cBien.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Nombre del Bien 
							</h2>
						</td>
						<td>
							<input maxlength="25" name="nombre_bien" value='<?php echo $nombre_bien;?>' autocomplete="off" id='txtNombreBien' type="text" class="text-nombre" placeholder="Nombre del Bien" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtIdBien" name="id_bien">
							<input type="hidden" id="txtNombreBienOriginal" name="nombre_bien_original">
						</td>
						<td>
							<h2>
								Serial del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien" value='<?php echo $serial_bien;?>' autocomplete="off" id='txtSerialBien' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" readonly="readonly">
						</td>
					</tr>
					<tr>
						<td>
							<h2>
								Valor Unitario del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="valor_bien" value='<?php echo $valor_bien;?>' autocomplete="off" id='txtValorBien' type="text" class="text-nombre" placeholder="Valor del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
						<td>
							<h2>
								Marca del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="marca_bien" value='<?php echo $marca_bien;?>' autocomplete="off" id='txtMarcaBien' type="text" class="text-nombre" placeholder="Marca del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
					</tr>
					<tr>
						<td>
							<h2>
								Modelo del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="modelo_bien" value='<?php echo $modelo_bien;?>' autocomplete="off" id='txtModeloBien' type="text" class="text-nombre" placeholder="Modelo del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
						<td>
							<h2>
								Color del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="color_bien" value='<?php echo $color_bien;?>' autocomplete="off" id='txtColorBien' type="text" class="text-nombre" placeholder="Color del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
					</tr>
					<tr>
						<td>							
							<h2>Descripción del Bien</h2>
						</td>
						<td colspan="3">
							<textarea class="text" name="descripcion_bien" id="txtDescripcionBien" rows="3"><?php echo $nombre_bien;?></textarea>							
						</td>
					</tr>	
					<tr>
						<td>
							<h2>Fecha de Adquisición del Bien</h2>
						</td>
						<td>
							<input class="text" type="date" value='<?php echo $fecha_adquisicion_bien;?>' required="required" name="fecha_adquisicion" id="txtFechaAdquisicion" required>	
						</td>
					</tr>
					<tr>
						<td>
							<h2>Categoría</h2>
						</td>
						<td>
							<select name="id_grupo" id="id_grupo" class="text" required="required" onchange="javascript:llenarSelectSubgrupo2();">
							<option value='<?php echo $id_grupo;?>'>
								<?php echo $grupo;?>
							</option>
							</select>							
						</td>
						<td>
							<h2>Subcategoría</h2>
						</td>
						<td>
							<select name="id_subgrupo" id="id_subgrupo" onchange="javascript:llenarSelectSubcategoriaEspecifica2();">
								<option value='<?php echo $id_subgrupo;?>'> 
									 <?php echo $nombre_subgrupo;?>
								</option>
							</select>
						</td>
					</tr>	
					<tr>
						<td>
							<h2>Subcategoría Específica</h2>
						</td>
						<td>
							<select name="id_sub_categoria_especifica" id="id_sub_categoria_especifica">
								<option value='<?php echo $id_sub_categoria_especifica;?>'> 
									 <?php echo $nombre_subgrupo;?>
								</option>
							</select>
						</td>
					</tr>						
					<tr>
						<td>
							<h2>Imágen del Bien</h2>
						</td>
						<td>
								<img src='<?php echo $ruta_imagen;?>' id="imgBien">
						</td>
					</tr>
					<tr>
						<td>
							<h2>Factura del Bien</h2>
						</td>
						<td>
							<a  href='<?php echo $ruta_pdf;?>' id="pdfBien" target="_blank"><i id="pdfBien2" class='fa fa-file-pdf-o'>  Descargar Factura en formato PDF</i></a>
						</td>
						<td>
							<h2>Generar Acta de Control Perceptivo</h2>
						</td>
						<td>
							<a  href='<?php echo "ConsultaActa.php?idBien=".$id_bien;?>' id="pdfActaDeControl" ><i id="pdfActaDeControl2" class='fa fa-file-pdf-o'>  Generar Acta de Control</i></a>
						</td>
					</tr>					
				</table>
				<div align="center">
							<input name="modificar" onclick="return confirm('¿Desea Modificar este subgrupo?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar este subgrupo?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
							<input name="cancelar"	onclick="history.back();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">							
				</div>
			</form>			
		</div>
	</div>
	</body>

</html>