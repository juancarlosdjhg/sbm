
<?php
$host="localhost";
$port="5432";
$dbname="sbm";
$user="postgres";
$password="12345";




function  conexion3(){

    $tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password."";
    $conx=pg_connect($tiracnx);

	  if($conx==0){
	    echo "EROR CON EL SERVIDOR O BD";
		 header("Location: V/vBD.php");}
  }
?>

	