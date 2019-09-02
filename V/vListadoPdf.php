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


  echo "<script>window.open('../V/vReporteListadoGeneral.php')</script>";
  
  echo "<script> window.history.back();</script>";
}
          	?>