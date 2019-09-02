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
	 	<div class="pestana">
	 		<a href="#registro" id="r">Registro</a>
	 		<a href="#catalogo" id="c">Catálogo</a>
	 		<div class="clear"></div>
	 	</div>
	 	<div class="contenedor">
	 	<div id="registro">		
		<div class="class-form-1" id="divRegistro" align="center">
			<h1 class="class-h1">Registro de Bienes</h1>
			<form action="../C/cBien.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table>
					<tr>
						<td>							
							<label for="nombreBien">
								<h2>
									Nombre
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Nombre del Bien a Registrar o Filtrar</span>
								</h2>
							</label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="nombreBien" id="nombreBien" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="consultar();">			
						</td>						
					</tr>
					<tr>
						<td>
							<label for="varlorBien">
								<h2>
									Valor
									<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Valor del Bien a Registrar</span>

								</h2>


							</label>
						</td>
						<td>
							<input class="text" type="number" required="required" name="valorBien" id="valorBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">										
						</td>						
						<td>
							<label for="marcaBien">

								<h2>
									Marca
									<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí la Marca del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="marcaBien" id="marcaBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">										
						</td>						

					</tr>
					<tr>
						<td>
							<label for="modeloBien">
								<h2>
									Modelo

									<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Modelo del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="modeloBien" id="modeloBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">										
						</td>						
						<td>
							<label for="colorBien">
								<h2>
									Color
									<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Color del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="colorBien" id="colorBien" autocomplete="off" min="1" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">										
						</td>						

					</tr>
					<tr>
						<td colspan="4">							
							<label for="descripcionBien">
								<h2>
									Descripción
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí la Descripción del Bien a Registrar</span>
								</h2>
							</label>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<textarea class="text" name="descripcionBien" id="descripcionBien" rows="3"></textarea>							
						</td>
					</tr>					
					<tr>
						<td>							
							<label for="imagenBien">
								<h2>
									Imagen
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione una Imagen del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td colspan="3">
							<input type="file" required name="imagenBien" id="imagenBien" accept="image/jpeg">
						</td>
					</tr>					
					<tr>
						<td>							
							<label for="facturaBien">
								<h2>
									Factura
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione la Factura del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td colspan="3">
							<input type="file" required name="facturaBien" id="facturaBien" accept="application/pdf">
						</td>
					</tr>					
					<tr>
						<td>							
							<label for="ordenCompraBien">
								<h2>
									Orden de Compra
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione La Orden de Compra del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td colspan="3">
							<input type="file" required name="ordenCompraBien" id="ordenCompraBien" accept="application/pdf">
						</td>
					</tr>					
					<tr>
						<td>							
							<label for="ordenPagoBien">
								<h2>
									Orden de Pago
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione la Orden de Pago del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td colspan="3">
							<input type="file" required name="ordenPagoBien" id="ordenPagoBien" accept="application/pdf">
						</td>
					</tr>				
					<tr>
						<td>							
							<label for="ordenRequisicionBien">
								<h2>
									Orden de Requisición
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione la Factura del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td colspan="3">
							<input type="file" required name="ordenRequisicionBien" id="ordenRequisicionBien" accept="application/pdf">
						</td>
					</tr>
					<tr>
						<td>
							<label for="id_grupo">
								<h2>
									Categoría
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione una Categoría del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<select name="idGrupo" id="idGrupo" class="text" required="required" onchange="javascript:llenarSelectSubgrupo();">
								<?php 
					$llenarBien= new bien;								
					$llenarBien->llenarSelectGrupo();
								?>
							</select>							
						</td>
						<td>
							<label for="idSubgrupo">
								<h2>
									SubCategoría
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione una Subcategoría del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<select name="idSubgrupo" id="idSubgrupo" onchange="javascript:llenarSelectSubcategoriaEspecifica();">
								
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="idSubCategoriaEspecifica">
								<h2>
									SubCategoría Específica
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione una Subcategoría Específica del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<select name="idSubCategoriaEspecifica" id="idSubCategoriaEspecifica">
								
							</select>
						</td>						
					</tr>
					<tr>
						<td>
							<label for="idProveedor">
								<h2>
									Proveedor
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione el Proveedor del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<select name="idProveedor" id="idProveedor" class="text" required="required">
								<?php 
					$llenarBien= new bien;								
					$llenarBien->llenarSelectProveedor();
								?>
							</select>							
						</td>
						<td>
							<label for="fechaAdquisicion">
								<h2>
									Fecha de Adquisición
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Seleccione la Fecha de Adquisición del Bien a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<input class="text" type="date" required="required" name="fechaAdquisicion" id="fechaAdquisicion">										
						</td>						
					</tr>
					<tr>
						<td>												
							<label for="serialBien">
								<h2>
									Cantidad
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Indique la cantidad de bienes a Registrar</span>
								</h2>
							</label>
						</td>
						<td>
							<input class="text" type="number" name="cantidadBien" id="cantidadBien" autocomplete="off" min="1" onkeyup="crearCampos(this.value);">			
						</td>
					</tr>
					<tr>
						<td>												
							<label for="serialBien">
								<h2>
									Revisar Bien
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Chequee esta casilla si el bien(es) a Registrar seran o no sometido a revisión</span>
								</h2>
							</label>
						</td>
						<td>
							<input class="text" type="checkbox" name="revisionBien" id="revisionBien" autocomplete="off">			
						</td>
					</tr>
				</table>

				<table id="tablaSeriales">
					
				</table>
			
				
							<input name="registrar" onclick="return confirm('¿Desea Registrar este (os) Bien(es)?');" id="registrar" class="mvc-submit" value="Registrar" type="submit">
						
			</form>

		</div>	
	</div>
	<div id="catalogo">
		

		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Catálogo de Bienes</h1>
			<form action="../C/cBien.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table>
					<tr>
						<td>							
							<label for="nombreBien2">
								<h2>
									Nombre
								<a class="tooltip" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Ingrese aquí el Nombre del Bien a Registrar o Filtrar</span>
								</h2>
							</label>
						</td>
						<td>
							<input class="text" type="text" required="required" name="nombreBien2" id="nombreBien2" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="consultar();">			
						</td>						
					</tr>
				</table>

					<div class="overflow">
						<table id="tablaSeriales">
							
						</table>				
					</div>
					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					$llenarBien->llenarTabla2();
					?>
				</table>
					</div>	
			
				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			
				
				
						
			</form>
		</div>	
		
		

		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Modificar Bienes</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cBien.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Nombre 
							</h2>
						</td>
						<td>
							<input maxlength="25" name="nombre_bien" autocomplete="off" id='txtNombreBien' type="text" class="text-nombre" placeholder="Nombre del Bien" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtIdBien" name="id_bien">
							<input type="hidden" id="txtNombreBienOriginal" name="nombre_bien_original">
						</td>
						<td>
							<h2>
								Serial
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien" autocomplete="off" id='txtSerialBien' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" readonly="readonly">
						</td>
					</tr>
					<tr>
						<td>
							<h2>
								Valor Unitario
							</h2>
						</td>
						<td>
							<input maxlength="25" name="valor_bien" autocomplete="off" id='txtValorBien' type="text" class="text-nombre" placeholder="Valor del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
						<td>
							<h2>
								Marca
							</h2>
						</td>
						<td>
							<input maxlength="25" name="marca_bien" autocomplete="off" id='txtMarcaBien' type="text" class="text-nombre" placeholder="Marca del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
					</tr>
					<tr>
						<td>
							<h2>
								Modelo
							</h2>
						</td>
						<td>
							<input maxlength="25" name="modelo_bien" autocomplete="off" id='txtModeloBien' type="text" class="text-nombre" placeholder="Modelo del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
						<td>
							<h2>
								Color
							</h2>
						</td>
						<td>
							<input maxlength="25" name="color_bien" autocomplete="off" id='txtColorBien' type="text" class="text-nombre" placeholder="Color del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
						</td>
					</tr>
					<tr>
						<td>							
							<h2>Descripción General</h2>
						</td>
						<td colspan="3">
							<textarea class="text" name="descripcion_bien" id="txtDescripcionBien" rows="3"></textarea>							
						</td>
					</tr>	
					<tr>
						<td>							
							<h2>Descripción Propia</h2>
						</td>
						<td colspan="3">
							<textarea class="text" name="descripcion_bien_individual" id="txtDescripcionPropiaBien" rows="3"></textarea>							
						</td>
					</tr>	
					<tr>
						<td>
							<h2>Categoría</h2>
						</td>
						<td>
							<select name="id_grupo" id="id_grupo" class="text" required="required" onchange="javascript:llenarSelectSubgrupo2();">
								<?php 							
					$llenarBien->llenarSelectGrupo();
								?>
							</select>							
						</td>
						<td>
							<h2>SubCategoría</h2>
						</td>
						<td>
							<select name="id_subgrupo" id="id_subgrupo" onchange="javascript:llenarSelectSubcategoriaEspecifica2();">
								
							</select>
						</td>
					</tr>		
					<tr>
						<td>
							<h2>SubCategoría Específica</h2>
						</td>
						<td>
							<select name="id_sub_categoria_especifica" id="id_sub_categoria_especifica">
								
							</select>
						</td>						
					</tr>		
					<tr>
						<td>
							<h2>Fecha de Adquisición</h2>
						</td>
						<td>
							<input class="text" type="date" required="required" name="fecha_adquisicion" id="txtFechaAdquisicion" required>	
						</td>
						<td>
							<h2>Proveedor</h2>
						</td>
						<td>
							<select name="id_proveedor" id="id_proveedor">
								<?php 							
					$llenarBien->llenarSelectProveedor();
								?>								
							</select>
						</td>
					</tr>						
					<tr>
						<td>
							<h2>Imágen</h2>
						</td>
						<td>
								<img src="" id="imgBien" width="300">
						</td>
					</tr>
					<tr>
						<td>
							<h2>Factura</h2>
						</td>
						<td>
							<a href="#" id="pdfBien" target="_blank"><i id="pdfBien2" class='fa fa-file-pdf-o'></i></a>
						</td>
					</tr>	
					<tr>
						<td>
							<h2>Generar Acta de Control Perceptivo</h2>
						</td>
						<td>
							<a href="#" id="pdfActaControl" target=""><i id="pdfActaControl2" class='fa fa-file-pdf-o'> Acta de Control Perceptivo</i></a>
						</td>						
						<td>
							<h2>Generar Etiqueta Autoadhesiva</h2>
						</td>
						<td>
							<a href="#" id="pdfEtiqueta" target="_blank"><i id="pdfEtiqueta2" class='fa fa-file-pdf-o'> Etiqueta Autoadhesiva</i></a>
						</td>
					</tr>					
				</table>
				<div align="center">
							<input name="modificar" onclick="return confirm('¿Desea Modificar este subgrupo?');" id="btnModificar" class="mvc-submit" type="submit" value="Modificar">
							<input name="eliminar" onclick="return confirm('Desea Eliminar este subgrupo?');"	id="btnEliminar" class="mvc-submit" type="submit" value="Eliminar">
							<input name="cancelar"	onclick="atras();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">							
				</div>
			</form>			
		</div>


	</div>
	</div>
	<script>
	$(document).ready(function(){
		cargar();


	})


	

	</script>
	</body>

</html>
