  <?php 
session_start();
include("../M/mConexion2.php");

$cnx = new conexion2();
$cnx->conectar();

  $sqlConsultar="SELECT * FROM bien";		
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

    $num=pg_num_rows($resultados);
          if($num==0){          
            echo "<script> alert('No existen bienes registrados')</script>";
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vMenu.php'>";
                }

          else{

$_SESSION['host']=$cnx->host;
$_SESSION['port']=$cnx->port;
$_SESSION['dbname']=$cnx->dbname;
$_SESSION['user']=$cnx->user;
$_SESSION['password']=$cnx->password;

if(isset($_SESSION['reporte'])){


if($_SESSION['reporte']=="departamento"){
  echo "<script>window.open('../V/vReporteListadoFlotantes.php')</script>";
    unset($_SESSION['reporte']);
  echo "<script>window.close();</script>";

}

elseif($_SESSION['reporte']=="comodato"){
  echo "<script>window.open('../V/vReporteListadoComodato.php')</script>";
    unset($_SESSION['reporte']);
  echo "<script>window.history.back();</script>";

}
elseif($_SESSION['reporte']=="flotantes"){
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
          	?>