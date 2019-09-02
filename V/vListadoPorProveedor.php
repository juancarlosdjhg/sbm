<?php 
session_start();

	include('dropdown.php');

$cnx = new conexion2();
$cnx->conectar();
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";

						}


$proveedor=$_SESSION['proveedorid'];
$desde=$_SESSION['proveedordesde'];
$hasta=$_SESSION['proveedorhasta'];

	if($proveedor=='todos'){
		  $SQL="SELECT * FROM datos_bien as db JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto WHERE db.fecha_adquisicion_bien BETWEEN '".$desde."' and '".$hasta."' ORDER BY db.id_proveedor,db.nombre_bien";							
		$resultados=pg_query($SQL); 

					$num=pg_num_rows($resultados);
					if($num==0){

					echo "<script> alert('No existen bienes registrados en ese rango de fechas.')</script>";
					echo "<script>window.history.back();</script>";
				}
	}
	else{

		$SQL="SELECT * FROM datos_bien as db JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto WHERE db.id_proveedor='".$proveedor."' AND  db.fecha_adquisicion_bien BETWEEN '".$desde."' and '".$hasta."' ORDER BY db.id_proveedor,db.nombre_bien";							
		$resultados=pg_query($SQL); 

					$num=pg_num_rows($resultados);
					if($num==0){

					echo "<script> alert('No existen bienes registrados en ese rango de fechas.')</script>";
					echo "<script>window.history.back();</script>";
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
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media="all" />		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
		<script type="text/javascript" src="vListadoGeneralBienesAjax.js"></script>
</head>
	<body>
	<?php 
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Listado de Bienes por Proveedor(es) </h1>
			<form action="../C/cBien.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table>
					<td>							
						<label for="nombreBien"><h2>Nombre del Bien</h2></label>
					</td>
					<td>
						<input class="text" type="search" required="required" name="nombreBien" id="nombreBien" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
					</td><td>							
						<label for="pdf"><a href="vReportePorProveedor.php" target="popup"><img src="images/pdf.png"></img></a></label>
					</td>
				</table>					

					<div class="overflow">
				<table class="tablaResultados" id="tablaResultados1">					
					<?php 
					  $contador1=1;

						if($proveedor=='todos'){

							

	  $SQL="SELECT * FROM datos_bien as db JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto JOIN proveedor as pro on CAST(db.id_proveedor AS INT)=pro.id_proveedor  join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto WHERE db.fecha_adquisicion_bien BETWEEN '".$desde."' and '".$hasta."' ORDER BY db.id_proveedor,db.fecha_adquisicion_bien";								
		
			 $resultados=pg_query($SQL); 

 
 			 echo '<tr><th>Resultado Nº</th><th>Código Proveedor</th><th>Descripción Proveedor</th><th>ID del Bien</th><th>Nombre del Bien</th><th>Fecha de Adquisición</th><th>Serial</th><th>Estatus del Bien</th></tr>';

			while($fetch=pg_fetch_array($resultados)){

				$id_bien=$fetch['id_bien'];
				$nombre_bien=$fetch['nombre_bien'];
				$codigo_proveedor=$fetch['codigo_proveedor'];
				$descripcion_proveedor=$fetch['descripcion_proveedor'];

			   $fecha3=$fetch['fecha_adquisicion_bien'];
          $fecha2=explode('-', $fecha3, 3);
          $fecha=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
				$serial=$fetch['serial_bien'];
				$estado=$fetch['nombre_tipo_concepto'];

				  if($estado=="Incorporación"){
            $estado="Incorporado";
          }
          elseif($estado=="Desincorporación"){
            $estado="Desincorporado";
          }

          	echo '<tr> <td>'.$contador1.'</td><td>'.$codigo_proveedor.'</td><td>'.$descripcion_proveedor.'</td><td>'.$id_bien.'</td><td>'.$nombre_bien.'</td>
          	<td>'.$fecha.'</td><td>'.$serial.'</td>	<td>'.$estado.'</td></tr>';
                   $contador1++;



		}}

		else{

  $SQL="SELECT * FROM datos_bien as db JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto JOIN proveedor as pro on CAST(db.id_proveedor AS INT)=pro.id_proveedor  join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto WHERE db.id_proveedor='".$proveedor."' AND  db.fecha_adquisicion_bien BETWEEN '".$desde."' and '".$hasta."' ORDER BY db.id_proveedor,db.fecha_adquisicion_bien";								
		
			 $resultados=pg_query($SQL); 

 
 			 echo '<tr><th>Resultado Nº</th><th>Código Proveedor</th><th>Descripción Proveedor</th><th>ID del Bien</th><th>Nombre del Bien</th><th>Fecha de Adquisición</th><th>Serial</th><th>Estatus del Bien</th></tr>';

			while($fetch=pg_fetch_array($resultados)){

				$id_bien=$fetch['id_bien'];
				$nombre_bien=$fetch['nombre_bien'];
				$codigo_proveedor=$fetch['codigo_proveedor'];
				$descripcion_proveedor=$fetch['descripcion_proveedor'];

			   $fecha3=$fetch['fecha_adquisicion_bien'];
          $fecha2=explode('-', $fecha3, 3);
          $fecha=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
				$serial=$fetch['serial_bien'];
				$estado=$fetch['nombre_tipo_concepto'];

				  if($estado=="Incorporación"){
            $estado="Incorporado";
          }
          elseif($estado=="Desincorporación"){
            $estado="Desincorporado";
          }

          	echo '<tr> <td>'.$contador1.'</td><td>'.$codigo_proveedor.'</td><td>'.$descripcion_proveedor.'</td><td>'.$id_bien.'</td><td>'.$nombre_bien.'</td>
          	<td>'.$fecha.'</td><td>'.$serial.'</td>	<td>'.$estado.'</td></tr>';
                   $contador1++;



		}





		}

					?>
				</table>
					</div>	
			
				<table class="tablaResultados" id="tablaResultados">
					
				</table>
			</form>
			<br>
		</div>	
	</div>
	<script>
	$(document).ready(function(){
		cargar();


	})


	

	</script>
	</body>

</html>