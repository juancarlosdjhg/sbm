<?php 
session_start();

$_SESSION['reporte']="departamento";

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
		<link href="css/dropdown-styles.css" rel='stylesheet' type='text/css' media="all" />
		<link href="css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/btnCancelarBienes.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>		
		<script type="text/javascript" src="vListadoBienesIncorporadosAjax.js"></script>
</head>
	<body>
	<?php 
	include('dropdown.php');
	menu();
	?>	
	 <div class="main">
		<div class="class-form-1" id="divConsulta" align="center">
			<h1 class="class-h1">Listado por Departamento / Sección</h1>
				<form action="vListadoPorDepartamento.php" method="POST" name="formu1" class="formu" id="formulario1" enctype="multipart/form-data">
				<table>
					<td>							
						<label for="nombreBien"><h2>Nombre del Bien</h2></label>
					</td>
					<td>
						<input class="text" type="search" required="required" name="nombreBien" id="nombreBien" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" onkeyup="return validarEspacio(event,this);" onkeypress="return validarEspacio(event,this);" onchange="javascript:consultar();">			
					</td>
					<td>							
						<label for="pdf"><a href="vReportePdfPorDepartamento.php" target="popup" onclick="window.refresh();"><img src="images/pdf.png"></img></a></label>
					</td>
				</table>					

					<div class="overflow">
				<table align="center" class="tablaResultados">					
					<?php

$cnx = new conexion2();
$cnx->conectar();

  $sqlConsultar="SELECT * FROM bien";		
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

    $num=pg_num_rows($resultados);
          if($num==0){          
            echo "<script> alert('No existen bienes registrados')</script>";
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vReportePorDepartamento.php'>";
                }

          else{

$_SESSION['host']=$cnx->host;
$_SESSION['port']=$cnx->port;
$_SESSION['dbname']=$cnx->dbname;
$_SESSION['user']=$cnx->user;
$_SESSION['password']=$cnx->password;

$departamento=$_POST['id_entidad'];
$seccion=$_POST['id_seccion'];

$_SESSION['id_entidad']=$_POST['id_entidad'];
$_SESSION['id_seccion']=$_POST['id_seccion'];

  $contador1=1;

if($seccion=='todos'){
 echo '<tr><th>Resultado Nº</th><th>Departamento</th><th>Sección</th><th>ID del Bien</th><th>Nombre del Bien</th><th>Serial</th><th>Estatus del Bien</th></tr>';

$sq="SELECT * FROM entidad_propietaria WHERE id_entidad_propietaria='".$departamento."'";   
    $r=pg_query($cnx->conx ,$sq);

    while($dep=pg_fetch_array($r)){
        $nombre_entidad=$dep['nombre_entidad_propietaria'];}

  $sqlConsultarSecciones="SELECT * FROM seccion WHERE id_entidad_propietaria='".$departamento."'";   
    $resultadosSecciones=pg_query($cnx->conx ,$sqlConsultarSecciones);

    while($secciones=pg_fetch_array($resultadosSecciones)){
        $id_seccion=$secciones['id_seccion'];

          $sql3="SELECT nombre_seccion FROM seccion WHERE id_seccion='".$id_seccion."'";   
           $res3=pg_query($cnx->conx ,$sql3);

              while($sec=pg_fetch_array($res3)){
                $nombre_seccion=$sec['nombre_seccion'];}

          $sql="SELECT * FROM bien_activo WHERE id_seccion='".$id_seccion."'";   
           $res=pg_query($cnx->conx ,$sql);

              while($bienes=pg_fetch_array($res)){
                $id_bien=$bienes['id_bien'];

            $sqlBien="SELECT * FROM datos_bien as db JOIN bien as b on db.id_bien=b.id_bien WHERE db.id_bien='".$id_bien."' ORDER BY db.id_bien";   
           $DatosBien=pg_query($cnx->conx ,$sqlBien);

            while($bien=pg_fetch_array($DatosBien)){
                $nombre_bien=$bien['nombre_bien'];
                 $serial=$bien['serial_bien'];
                  $estatus=$bien['id_concepto'];
                  $sqlConcepto="SELECT * FROM concepto_de_movimiento WHERE id_concepto='".$estatus."'";   
                   $queryConcepto=pg_query($cnx->conx ,$sqlConcepto);
                   while($concepto=pg_fetch_array($queryConcepto)){
                    $estatus2=$concepto['nombre_concepto'];}


                   

                   echo '<tr> <td>'.$contador1.'</td><td>'.$nombre_entidad.'</td><td>'.$nombre_seccion.'</td><td>'.$id_bien.'</td><td>'.$nombre_bien.'</td><td>'.$serial.'</td><td>'.$estatus2.'</td></tr>';
                   $contador1++;
                  }

                 




}



}}

else{

echo '<tr><th>Resultado Nº</th><th>Departamento</th><th>Sección</th><th>ID del Bien</th><th>Nombre del Bien</th><th>Serial</th><th>Estatus del Bien</th></tr>';
 

          $sql3="SELECT nombre_seccion, id_entidad_propietaria FROM seccion WHERE id_seccion='".$seccion."'";   
           $res3=pg_query($cnx->conx ,$sql3);

              while($sec=pg_fetch_array($res3)){
                $nombre_seccion=$sec['nombre_seccion'];
				$id_entidad2=$sec['id_entidad_propietaria'];

				$sql4="SELECT nombre_entidad_propietaria FROM entidad_propietaria WHERE id_entidad_propietaria='".$id_entidad2."'";   
           $res4=pg_query($cnx->conx ,$sql4);

              while($sec=pg_fetch_array($res4)){
              	$nombre_entidad=$sec['nombre_entidad_propietaria'];
              }
            }

          $sql="SELECT * FROM bien_activo WHERE id_seccion='".$seccion."'";   
           $res=pg_query($cnx->conx ,$sql);

              while($bienes=pg_fetch_array($res)){
                $id_bien=$bienes['id_bien'];

            $sqlBien="SELECT * FROM datos_bien as db JOIN bien as b on db.id_bien=b.id_bien WHERE db.id_bien='".$id_bien."' ORDER BY db.id_bien";   
           $DatosBien=pg_query($cnx->conx ,$sqlBien);

            while($bien=pg_fetch_array($DatosBien)){
                $nombre_bien=$bien['nombre_bien'];
                 $serial=$bien['serial_bien'];
                  $estatus=$bien['id_concepto'];
                  $sqlConcepto="SELECT * FROM concepto_de_movimiento WHERE id_concepto='".$estatus."'";   
                   $queryConcepto=pg_query($cnx->conx ,$sqlConcepto);
                   while($concepto=pg_fetch_array($queryConcepto)){
                    $estatus2=$concepto['nombre_concepto'];}


                   

                   echo '<tr> <td>'.$contador1.'</td><td>'.$nombre_entidad.'</td><td>'.$nombre_seccion.'</td><td>'.$id_bien.'</td><td>'.$nombre_bien.'</td><td>'.$serial.'</td><td>'.$estatus2.'</td></tr>';
                   $contador1++;
                  }

                 




}



}





}





					?>
				</table>
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