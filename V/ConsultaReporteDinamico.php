  <?php 
session_start();
include("../M/mConexion2.php");

$cnx = new conexion2();
$cnx->conectar();

if($_POST['tipo']=='lista'){


  $sqlConsultar="SELECT * FROM bien";
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

    $num=pg_num_rows($resultados);
          if($num==0){          
            echo "<script> alert('No existen bienes registrados')</script>";
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vReporteDinamico.php'>";
                }

          else{

$_SESSION['host']=$cnx->host;
$_SESSION['port']=$cnx->port;
$_SESSION['dbname']=$cnx->dbname;
$_SESSION['user']=$cnx->user;
$_SESSION['password']=$cnx->password;
$_SESSION['check']=$_POST['checklista'];


echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vReporteDinamico.php'>";	
  echo "<script>window.open('../V/vReporteDinamicoLista.php')</script>";
  
}}

if($_POST['tipo']=='fecha'){


$desde=$_POST['desde'];
$hasta=$_POST['hasta'];

$sqlConsultar="SELECT * FROM bien";
    $resultados=pg_query($cnx->conx ,$sqlConsultar);

    $num=pg_num_rows($resultados);
          if($num==0){          
            echo "<script> alert('No existen bienes registrados')</script>";
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vReporteDinamico.php'>";
                }

          else{

$SQL="SELECT * FROM datos_bien where fecha_adquisicion_bien BETWEEN '".$desde."' AND '".$hasta."'";

    $resultados2=pg_query($cnx->conx ,$SQL);
     $num2=pg_num_rows($resultados2);

          if($num2==0){        
            echo "<script> alert('No existen bienes registrados en el rango de fechas seleccionado.')</script>";
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vReporteDinamico.php'>";
                }


else{  
$_SESSION['host']=$cnx->host;
$_SESSION['port']=$cnx->port;
$_SESSION['dbname']=$cnx->dbname;
$_SESSION['user']=$cnx->user;
$_SESSION['password']=$cnx->password;
$_SESSION['check']=$_POST['check'];
$_SESSION['desde']=$_POST['desde'];
$_SESSION['hasta']=$_POST['hasta'];


echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vReporteDinamico.php'>";  
  echo "<script>window.open('../V/vReporteDinamicoFecha.php')</script>";
  
}}  }




          	?>