  <?php 
include("../M/mConexion2.php");

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
$departamento=$_POST['departamento'];
$seccion=$_POST['seccion'];
  $contador1=1;
if($seccion=='todos'){

  $sqlConsultarSecciones="SELECT * FROM seccion WHERE id_entidad_propietaria='".$departamento."'";   
    $resultadosSecciones=pg_query($cnx->conx ,$sqlConsultarSecciones);

    while($secciones=pg_fetch_array($resultadosSecciones)){
        $id_seccion=$secciones['id_seccion'];

          $sql3="SELECT nombre_seccion FROM seccion WHERE id_seccion='".$seccion."'";   
           $res3=pg_query($cnx->conx ,$sql3);

              while($sec=pg_fetch_array($res3)){
                $nombre_seccion=$sec['nombre_seccion'];}

          $sql="SELECT * FROM bien_activo WHERE id_seccion='".$seccion."'";   
           $res=pg_query($cnx->conx ,$sql);

              while($bienes=pg_fetch_array($res)){
                $id_bien=$bienes['id_bien'];

            $sqlBien="SELECT * FROM datos_bien as db JOIN bien as b on db.id_bien=b.id_bien WHERE db.id_bien='".$id_bien."'";   
           $DatosBien=pg_query($cnx->conx ,$sqlBien);

            while($bien=pg_fetch_array($DatosBien)){
                $nombre_bien=$bien['nombre_bien'];
                 $serial=$bien['serial_bien'];
                  $estatus=$bien['id_concepto'];
                  $sqlConcepto="SELECT * FROM concepto_de_movimiento WHERE id_concepto='".$estatus."'";   
                   $queryConcepto=pg_query($cnx->conx ,$sqlConcepto);
                   while($concepto=pg_fetch_array($queryConcepto)){
                    $estatus2=$concepto['nombre_concepto'];


                    echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>ID del Bien</th><th>Serial</th><th>Estatus del Bien</th></tr>';

                   echo '<tr> <td>'.$contador1.'</td><td>'.$nombre_bien.'</td><td>'.$id_bien.'</td><td>'.$serial.'</td><td>'.$estatus2.'</td></tr>';
                   $contador1++;
                  }

                 




}



}}}



/*
if(isset($_SESSION['reporte'])){



if($_SESSION['reporte']=="flotantes"){
  echo "<script>window.open('../V/vReporteListadoFlotantes.php')</script>";
    unset($_SESSION['reporte']);
  echo "<script>window.history.back();</script>";

}
elseif($_SESSION['reporte']=="incorporados"){
  echo "<script>window.open('../V/vReporteListadoIncorporados.php')</script>";
    unset($_SESSION['reporte']);
  echo "<script>window.history.back();</script>";

}elseif($_SESSION['reporte']=="desincorporados"){
  echo "<script>window.open('../V/vReporteListadoDesincorporados.php')</script>";
    unset($_SESSION['reporte']);
  echo "<script>window.history.back();</script>";

}elseif($_SESSION['reporte']=="faltantes"){
  echo "<script>window.open('../V/vReporteListadoFaltantes.php')</script>";
    unset($_SESSION['reporte']);
  echo "<script>window.history.back();</script>";

}elseif($_SESSION['reporte']=="pendientes"){
  echo "<script>window.open('../V/vReporteListadoPendientes.php')</script>";
    unset($_SESSION['reporte']);
  echo "<script>window.history.back();</script>";

}elseif($_SESSION['reporte']=="rechazados"){
  echo "<script>window.open('../V/vReporteListadoRechazados.php')</script>";
    unset($_SESSION['reporte']);
  echo "<script>window.history.back();</script>";

}



}
else{



  echo "<script>window.open('../V/vReporteListadoGeneral.php')</script>";
echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vMenu.php'>";	
  }
}
         */

          	?>