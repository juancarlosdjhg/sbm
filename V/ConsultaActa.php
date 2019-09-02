  <?php 
session_start();
include("../M/mConexion2.php");

$cnx = new conexion2();
$cnx->conectar();



if(isset($_SESSION['GotDatosFactura'])){
    $id_bien=$_SESSION['idBien'];
    unset($_SESSION['GotDatosFactura']);
  }
  
  else{
  if(isset($_GET['idBien'])){

$id_bien=$_GET['idBien'];
$_SESSION['idBien']=$_GET['idBien'];
  }
  else{
$id_bien=$_POST['idBien'];
$_SESSION['idBien']=$_POST['idBien'];

}}


  $sqlConsultar="SELECT * FROM datos_bien WHERE id_bien=CAST('".$id_bien."' AS INT);";		
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

    $num=pg_num_rows($resultados);
          if($num==0){          
            echo "<meta charset='utf-8'><script> alert('No existe ningun bien registrado a ese Número Identificador')</script></meta>";
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vActa.php'>";
                }

          else{

  $sqlConsultar2="SELECT * FROM datos_bien WHERE id_bien='".$id_bien."' AND id_responsable_revision='0'";   
    $resultados2=pg_query($cnx->conx ,$sqlConsultar2);

    $num2=pg_num_rows($resultados2);
    if($num2==1){          
            echo "<meta charset='utf-8'><script> alert('El Bien no ha sido sometido a Revisión todavía, por favor ingrese al módulo de Revisión de Bienes.');</script></meta>";
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vListadoBienesPendientes.php'>";
                }
                else{

            $sqlConsultar3="SELECT * FROM datos_factura WHERE id_bien='".$id_bien."'";   
    $resultados3=pg_query($cnx->conx ,$sqlConsultar3);

    $num3=pg_num_rows($resultados3);
    if($num3==0){          
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vDatosFactura.php'>";
                }
                else{


$_SESSION['host']=$cnx->host;
$_SESSION['port']=$cnx->port;
$_SESSION['dbname']=$cnx->dbname;
$_SESSION['user']=$cnx->user;
$_SESSION['password']=$cnx->password;
$_SESSION['idBien']=$id_bien;
 
while($row2=pg_fetch_array($resultados)){

$_SESSION['i']=$row2['id_responsable_revision']; 
$_SESSION['d']=$row2['descripcion_bien_revisado'];
$_SESSION['c']=$row2['conclusion_bien_revisado'];

}


  echo "<script>window.open('../V/vReporteActaDeControlPerceptivo.php');</script>";
  echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vActa.php'>";	
 

  }

  
}}
          	?>