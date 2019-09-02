<?php 
session_start();
include("../M/mBM2.php");


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
		<script type="text/javascript" src="vBM2Ajax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	

	 <div class="main">
	 	<div class="pestana">
	 		<a href="#incorporacion" id="i">Incorporación</a>
	 		<a href="#desincorporacion" id="d">Desincorporación</a>
	 		<a href="#comodato" id="c">Comodato</a>
	 		<a href="#traspasos" id="t">Traspasos</a>
	 		<a href="#investigar" id="f">Faltantes por Investigar</a>
	 		<div class="clear"></div>
	 	</div>
		<div class="contenedor">
	 	<div id="incorporacion">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Incorporación</h1>
			<form action="../C/cBien.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				
				<h3><img src="images/help.png" alt="Information" height="50" width="50"/> En este modulo se muestran los Bienes Muebles en estatus "Flotante por Incorporar"</h3>				
				<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Bien Mueble que desee "Incorporar" haciendo click sobre su registro</h3><br><br>
				<table>
					<tr>
						<td>							
							<label for="nombreSubgrupo"><h2>Nombre del Bien</h2></label>
						</td>
						<td>
							<input class="text" type="search" required="required" name="nombreBien" id="nombreBien" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
						</td>					
					</tr>
				</table>
					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					$llenarBien =new bien;

					$llenarBien->llenarTablaIncorporacion();
					?>
				</table>
					</div>	
			
				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			<h1 class="class-h1">Incorporación</h1>
			<form name="formu2" id="formulario2" class="formu" action="../C/cBM2.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Nombre del Bien 
							</h2>
						</td>
						<td>
							<input maxlength="25" name="nombre_bien" readonly="readonly" autocomplete="off" id='txtNombreBien' type="text" class="text-nombre" placeholder="Nombre del Bien" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtIdBien" name="id_bien">
						</td>
						<td>
							<h2>
								Serial del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien" autocomplete="off" id='txtSerialBien' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" readonly="readonly">
						</td>
					</tr>
					<tr>
						<td>
							<label for="id_concepto"><h2>Concepto de Movimiento</h2></label>
						</td>
						<td>
							<select name="id_concepto" id="id_concepto" class="text" required="required">
								<?php 							
					$llenarBien->llenarSelectConceptoIncorporacion();
								?>
							</select>							
						</td>	
						<td>
							<label for="id_seccion"><h2>Sección a Asignar Bien</h2></label>
						</td>
						<td>
							<select name="id_seccion" id="id_seccion" class="text" required="required">
								<?php 							
					$llenarBien->llenarSelectSeccion();
								?>
							</select>							
						</td>
						</tr>
						<tr>
						<td>
							<label for="id_responsable"><h2>Responsable</h2></label>
						</td>
						<td>
							<select name="id_responsable" id="id_responsable" class="text" required="required">
								<?php 							
					$llenarBien->llenarResponsable();
								?>
							</select>							
						</td>													
					</tr>
					<tr>
						<td>							
							<h2>Descripción del Bien</h2>
						</td>
						<td colspan="3">
							<textarea class="text" readonly="readonly" name="descripcion_bien" id="txtDescripcionBien" rows="3"></textarea>							
						</td>
					</tr>						
					<tr>
						<td>
							<h2>Imágen del Bien</h2>
						</td>
						<td>
								<img src="" id="imgBien">
						</td>
					</tr>				
				</table>
				<div align="center">
							<input name="incorporar" onclick="return confirm('¿Desea Incorporar este bien?');" id="btnIncorporar" class="mvc-submit" type="submit" value="Incorporar">
							<input name="cancelar"	onclick="atras();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">									
				</div>
			</form>		
		</div>
		</div>
		<div id="desincorporacion">
		<div class="class-form-1" id="divConsulta1" align="center">
			<h1 class="class-h1">Desincorporación</h1>
			<form action="../C/cBien.php" method="POST" name="formu3" class="formu" id="formulario3" enctype="multipart/form-data">
				<h3><img src="images/help.png" alt="Information" height="50" width="50"/> En este modulo se muestran los Bienes Muebles en estatus "Incorporados"</h3>				
				<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Bien Mueble que desee "Desincorporar" haciendo click sobre su registro</h3><br><br>

				<table>
					<tr>
						<td>							
							<label for="nombreSubgrupo"><h2>Nombre del Bien</h2></label>
						</td>
						<td>
							<input class="text" type="search" required="required" name="nombreBien1" id="nombreBien1" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="consultar1();return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">			
						</td>
					</tr>
				</table>
					<div class="overflow">
						<table id="tablaSeriales">
							
						</table>				
					</div>
					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados4">					
					<?php 
					$llenarBien->llenarTablaDesincorporacion();
					?>
				</table>
					</div>	
			
				<table class="tablaResultados" id="tablaResultados3">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos1" align="center">
			<h1 class="class-h1">Desincorporación</h1>
			<form name="formu4" id="formulario4" class="formu" action="../C/cBM2.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Nombre del Bien 
							</h2>
						</td>
						<td>
							<input maxlength="25" name="nombre_bien1" readonly="readonly" autocomplete="off" id='txtNombreBien1' type="text" class="text-nombre" placeholder="Nombre del Bien" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtIdBien1" name="id_bien1">
						</td>
						<td>
							<h2>
								Serial del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien1" autocomplete="off" id='txtSerialBien1' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" readonly="readonly">
						</td>
					</tr>
					<tr>
						<td>
							<label for="id_concepto"><h2>Concepto de Movimiento</h2></label>
						</td>
						<td>
							<select name="id_concepto1" id="id_concepto1" class="text" required="required">
								<?php 							
					$llenarBien->llenarSelectConceptoDesincorporacion();
								?>
							</select>							
						</td>						
					</tr>
					<tr>
						<td>							
							<h2>Descripción del Bien</h2>
						</td>
						<td colspan="3">
							<textarea class="text" readonly="readonly" name="descripcion_bien" id="txtDescripcionBien1" rows="3"></textarea>							
						</td>
					</tr>						
					<tr>
						<td>
							<h2>Imágen del Bien</h2>
						</td>
						<td>
								<img src="" id="imgBien1">
						</td>
					</tr>				
				</table>
				<div align="center">
							<input name="desincorporar" onclick="return confirm('¿Desea Desincorporar este bien?');" id="btnDesincorporar" class="mvc-submit" type="submit" value="Desincorpor.">
							<input name="cancelar"	onclick="atras1();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">									
				</div>
			</form>		
		</div>	
		</div>

		<div id="comodato">
		<div class="class-form-1" id="divConsulta4" align="center">
			<h1 class="class-h1">Comodato</h1>
			<form action="../C/cBien.php" method="POST" name="formu3" class="formu" id="formulario3" enctype="multipart/form-data">
				<h3><img src="images/help.png" alt="Information" height="50" width="50"/> En este modulo se muestran los Bienes Muebles en estatus "Incorporados"</h3>				
				<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Bien Mueble que desee traspasar en "Comodato" haciendo click sobre su registro</h3><br><br>

				<table>
					<tr>
						<td>							
							<label for="nombreSubgrupo"><h2>Nombre del Bien</h2></label>
						</td>
						<td>
							<input class="text" type="search" required="required" name="nombreBien4" id="nombreBien4" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="consultar4();return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">			
						</td>
					</tr>
				</table>
					<div class="overflow">
						<table id="tablaSeriales">
							
						</table>				
					</div>
					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados10">					
					<?php 
					$llenarBien->llenarTablaComodato();
					?>
				</table>
					</div>	
			
				<table class="tablaResultados" id="tablaResultados9">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos4" align="center">
			<h1 class="class-h1">Comodato</h1>
			<form name="formu4" id="formulario4" class="formu" action="../C/cBM2.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Nombre del Bien 
							</h2>
						</td>
						<td>
							<input maxlength="25" name="nombre_bien4" readonly="readonly" autocomplete="off" id='txtNombreBien4' type="text" class="text-nombre" placeholder="Nombre del Bien" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtIdBien4" name="id_bien4">
						</td>
						<td>
							<h2>
								Serial del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien4" autocomplete="off" id='txtSerialBien4' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" readonly="readonly">
						</td>
					</tr>
					<tr>
						<td>							
							<h2>Descripción del Bien</h2>
						</td>
						<td colspan="3">
							<textarea class="text" readonly="readonly" name="descripcion_bien" id="txtDescripcionBien4" rows="3"></textarea>							
						</td>
					</tr>
					<tr>
						<td>							
							<h2>Destino del Comodato</h2>
						</td>
						<td colspan="3">
							<textarea class="text" name="destino_comodato" id="txtDestinoComodato" rows="3"></textarea>							
						</td>
					</tr>
					<tr>
						<td>							
							<h2>Tiempo del Comodato</h2>
						</td>
						<td colspan="3">
							<input maxlength="25" name="tiempo_comodato" autocomplete="off" id='txtTiempoComodato' type="text" class="text-nombre" placeholder="Tiempo del Comodato" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">
						</td>
					</tr>						
					<tr>
						<td>
							<h2>Imágen del Bien</h2>
						</td>
						<td>
								<img src="" id="imgBien4">
						</td>
					</tr>				
				</table>
				<div align="center">
							<input name="comodato" onclick="return confirm('¿Desea Traspasar en comodato este bien?');" id="btnComodato" class="mvc-submit" type="submit" value="Comodato">
							<input name="cancelar"	onclick="atras4();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">									
				</div>
			</form>		
		</div>	
		</div>
		<div id="traspasos">
		<div class="class-form-1" id="divConsulta2" align="center">
			<h1 class="class-h1">Traspasos</h1>
			<form action="../C/cBien.php" method="POST" name="formu5" class="formu" id="formulario5" enctype="multipart/form-data">

				<h3><img src="images/help.png" alt="Information" height="50" width="50"/> En este modulo se muestran los Bienes Muebles en estatus "Incorporados"</h3>				
				<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Bien Mueble que desee "Traspasar" haciendo click sobre su registro</h3><br><br>

				<table>
					<tr>
						<td>							
							<label for="nombreSubgrupo"><h2>Nombre del Bien</h2></label>
						</td>
						<td>
							<input class="text" type="search" required="required" name="nombreBien2" id="nombreBien2" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="consultar2();return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">			
						</td>					
					</tr>
				</table>
					<div class="overflow">
						<table id="tablaSeriales">
							
						</table>				
					</div>
					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados6">					
					<?php 
					$llenarBien->llenarTablaTraspasos();
					?>
				</table>
					</div>	
			
				<table class="tablaResultados" id="tablaResultados5">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos2" align="center">
			<h1 class="class-h1">Traspasos</h1>
			<form name="formu6" id="formulario6" class="formu" action="../C/cBM2.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Nombre del Bien 
							</h2>
						</td>
						<td>
							<input maxlength="25" name="nombre_bien2" readonly="readonly" autocomplete="off" id='txtNombreBien2' type="text" class="text-nombre" placeholder="Nombre del Bien" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtIdBien2" name="id_bien2">
						</td>
						<td>
							<h2>
								Serial del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien1" autocomplete="off" id='txtSerialBien2' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" readonly="readonly">
						</td>
					</tr>
					<tr>
						<td>
							<label for="seccionPerteneciente"><h2>Sección Peteneciente</h2></label>
						</td>
						<td>
							<select id="seccionPerteneciente" class="text" disabled>
								<?php 							
					$llenarBien->llenarSelectSeccion();
								?>
							</select>							
						</td>
						<td>
							<label for="id_seccion2"><h2>Sección a Traspasar</h2></label>
						</td>
						<td>
							<select name="id_seccion2" id="id_seccion2" class="text" required="required">
								<?php 							
					$llenarBien->llenarSelectSeccion();
								?>
							</select>							
						</td>					
					</tr>

					<tr>
						<td>							
							<h2>Descripción del Bien</h2>
						</td>
						<td colspan="3">
							<textarea class="text" readonly="readonly" name="descripcion_bien2" id="txtDescripcionBien2" rows="3"></textarea>							
						</td>
					</tr>
					<tr>
						<td>
							<h2>Motivo del Traspaso</h2>
						</td>

						<td colspan="3">
							<textarea class="text" name="motivo_traspaso" id="txtMotivoTraspaso" rows="3"></textarea>
						</td></tr><tr>
						<td>
							<h2>Responsable</h2>
						</td>
						<td>
							
						<select name="id_responsable2" id="id_responsable2" class="text" required="required">
							<?php
							$llenarBien->llenarResponsable();
							?>
						</select></td>
					</tr>
					<tr>
						<td>
							<h2>Imágen del Bien</h2>
						</td>
						<td>
								<img src="" id="imgBien2" width="300px">
						</td>
					</tr>				
				</table>
				<div align="center">
							<input name="traspasar" onclick="return confirm('¿Desea Traspasar este bien?');" id="btnTraspaso" class="mvc-submit" type="submit" value="Traspasar">
							<input name="cancelar"	onclick="atras2();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">									
				</div>
			</form>		
		</div>	
		</div>
		<div id="investigar">
		<div class="class-form-1" id="divConsulta3" align="center">
			<h1 class="class-h1">Faltantes por investigar</h1>
			<form action="../C/cBien.php" method="POST" name="formu5" class="formu" id="formulario7" enctype="multipart/form-data">
				<h3><img src="images/help.png" alt="Information" height="50" width="50"/> En este modulo se muestran los Bienes Muebles en estatus "Incorporados"</h3>				
				<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Bien que desee reportar como "Faltante por Investigar" haciendo click sobre su registro</h3><br><br>


				<table>
					<tr>
						<td>							
							<label for="nombreSubgrupo"><h2>Nombre del Bien</h2></label>
						</td>
						<td>
							<input class="text" type="search" required="required" name="nombreBien3" id="nombreBien3" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="consultar3();return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);">			
						</td>					
					</tr>
				</table>
					<div class="overflow">
						<table id="tablaSeriales">
							
						</table>				
					</div>
					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados8">					
					<?php 
					
					$llenarBien->llenarTablaFaltantes();
					?>
				</table>
					</div>	
			
				<table class="tablaResultados" id="tablaResultados7">
					
				</table>
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos3" align="center">
			<h1 class="class-h1">Faltantes por Investigar</h1>
			<form name="formu6" id="formulario8" class="formu" action="../C/cBM3.php" method="POST">
				<table>
					<tr>
						<td>
							<h2>
								Nombre del Bien 
							</h2>
						</td>
						<td>
							<input maxlength="25" name="nombre_bien3" readonly="readonly" autocomplete="off" id='txtNombreBien3' type="text" class="text-nombre" placeholder="Nombre del Bien" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" required>
							<input type="hidden" id="txtIdBien3" name="id_bien3">
						</td>
						<td>
							<h2>
								Serial del Bien
							</h2>
						</td>
						<td>
							<input maxlength="25" name="serial_bien3" autocomplete="off" id='txtSerialBien3' type="text" class="text-nombre" placeholder="Serial del Bien" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" readonly="readonly">
						</td>
					</tr>
					<tr>
						<td>							
							<h2>Descripción del Bien</h2>
						</td>
						<td colspan="3">
							<textarea class="text" readonly="readonly" name="descripcion_bien3" id="txtDescripcionBien3" rows="3"></textarea>							
						</td>
					</tr>						
					<tr>
						<td>
							<h2>Imágen del Bien</h2>
						</td>
						<td>
								<img src="" id="imgBien3">
						</td>
					</tr>				
				</table>
				<div align="center">
							<input name="reportar" onclick="return confirm('¿Desea Reportar este bien?');" id="btnReportar" class="mvc-submit" type="submit" value="Reportar">
							<input name="cancelar"	onclick="atras3();" id="btnCancelar" class="mvc-submit" type="button" value="Cancelar">									
				</div>
			</form>		
		</div>	
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