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
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media='all'/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/todos.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
</head>
	<body onload="focus ">
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Reporte Específico</h1>
			<form  action="ConsultaReporteDinamico.php" method="POST" name="formu1" class="formu" id="formulario1">
				<table >
					<tr>
						<td>							
							<h2>Seleccione las opciones que desea ver en el Reporte:</h2>
						</td>
					</tr>
					<tr>
						<td>							
							<h2>Seleccione un tipo de reporte y sus complementos</h2>
						</td>
					</tr>
					</table><br><br><br>
					<div class="disabled" ><table id="tablafecha">
					<tr>
						<td colspan="3">
							<label class="disabled" for="rango"><input onclick="disablelabel();" type="radio" value="fecha" id="rango" checked="checked" name="tipo"/>Rango de Fecha de Adquisición:</label>
						</td>
						<td></td><td></td>
						<td colspan="">
							<label for="checkTodoFecha" name="label" id="labelTodosFecha"><input type="checkbox" onchange="todos2();" id='checkTodoFecha' name="todos"/>Todos</label>
						</td>
					</tr>
					<tr>
						<td>
							<label for="estatus" name="label" id="labelEstatus2"><input type="checkbox" id="estatus"  value="estatus" name="check[]"/> Estatus del bien</label>
						</td>
						<td>
							<label for="valor" name="label" id="labelValor2"><input type="checkbox" id="valor" value="valor"  name="check[]"/> Valor Unitario</label>
						</td>
						<td>
							<label for="serial" name="label" id="labelSerial2"><input type="checkbox" id="serial" value="serial"  name="check[]" /> Serial de Fabricación</label>
						</td>
					</tr><tr>
						<td>
							<label for="categoria" name="label" id="labelCategoria2"><input type="checkbox" id="categoria" value="categoria"  name="check[]" /> Categoria</label>
						</td>
						<td>
							<label for="subcategoria" name="label" id="labelSubcategoria2"><input type="checkbox" id="subcategoria" value="subcategoria"  name="check[]" /> Subcategoria</label>
						</td>
						<td>
							<label for="especifica" name="label" id="labelEspecifica2"><input type="checkbox" id="especifica" value="especifica"  name="check[]" /> Subcategoria Específica</label>
						</td>
							<td>
							<label for="marca" name="label" id="labelMarca2"><input type="checkbox" id="marca" value="marca"  name="check[]" /> Marca</label>
						</td>
						<td>
							<label for="modelo" name="label" id="labelModelo2"><input type="checkbox" id="modelo" value="modelo"  name="check[]" /> Modelo</label>
						</td>
						<td>
							<label for="color" name="label" id="labelColor2"><input type="checkbox" id="color" value="color"  name="check[]" /> Color</label>
						</td>
					</tr>
					</table>
					<table >
					<tr>
						<td>
						<label for="fechaAdquisicion" name="label" id="labelDesde">Desde:   &nbsp;&nbsp;&nbsp;<input class="text" type="date" required="required" name="desde" id="inputDesde"></label>		
						</td>

						<td>
						<label for="fechaAdquisicion2" name="label" id="labelHasta">Hasta: &nbsp;&nbsp;&nbsp;<input class="text" type="date" required="required" name="hasta" id="inputHasta">	</label>		
						</td>
					</tr>
					</table><br><br><br><br>
					</div><div class="disabled2" ><table >
					<tr>
						<td>
							<label class="disabled" for="listado" ><input type="radio" id="listado" onclick="disablelabel2();" value="lista" name="tipo"/> Listado:</label>
						</td>
						<td></td><td></td><td></td><td></td>
						<td colspan="">
							<label for="checkTodoLista" name="label2" id="labelTodosLista"><input type="checkbox" onchange="todoslista();" id='checkTodoLista' name="todos"/>Todos</label>
						</td>
					</tr>
					<tr>
						<td>
							<label for="estatus2" name="label2" id="labelEstatus"><input type="checkbox" id="estatus2" value="estatus" name="checklista[]"/> Estatus del bien</label>
						</td>
						<td>
							<label for="valor2" name="label2" id="labelValor"><input type="checkbox" id="valor2" value="valor" name="checklista[]"/> Valor Unitario</label>
						</td>
						<td>
							<label for="serial2" name="label2" id="labelSerial"><input type="checkbox" id="serial2" value="serial" name="checklista[]" /> Serial de Fabricación</label>
						</td>
						</tr><tr>
							<td>
							<label for="categoria2" name="label2" id="labelCategoria"><input type="checkbox" id="categoria2" value="categoria"  name="checklista[]" /> Categoria</label>
						</td>
						<td>
							<label for="subcategoria2" name="label2" id="labelSubcategoria"><input type="checkbox" id="subcategoria2" value="subcategoria"  name="checklista[]" /> Subcategoria</label>
						</td>
						<td>
							<label for="especifica2" name="label2" id="labelEspecifica"><input type="checkbox" id="especifica2" value="especifica"  name="checklista[]" /> Subcategoria Específica</label>
						</td>
						<td>
							<label for="marca2" name="label2" id="labelMarca"><input type="checkbox" id="marca2" value="marca" name="checklista[]" /> Marca</label>
						</td>
						<td>
							<label for="modelo2" name="label2" id="labelModelo"><input type="checkbox" id="modelo2" value="modelo" name="checklista[]" /> Modelo</label>
						</td>
						<td>
							<label for="color2" name="label2" id="labelColor"><input type="checkbox" id="color2" value="color" name="checklista[]" /> Color</label>
						</td>
					</tr>
				</table>
				</div>
				<br><br><br><br>
				<input name="registrar" id="registrar" class="mvc-submit" value="Generar" type="submit">
						
			
		
			</form>
			<br>
		</div>	
		<div class="class-form-1" id="divDatos" align="center">
			
				
			

			
			</form>			
		</div>
	</div>
	<script>
	$(document).ready(function(){
		
		disablelabel();

	})


	

	</script>
	</body>

</html>
