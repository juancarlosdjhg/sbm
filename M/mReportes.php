<?php 

include("../M/mConexion2.php");

$cnx2 = new conexion2();
$cnx2->conectar();

	function ListadoFlotantesPdf(){

$_SESSION['host']=$cnx2->host;
$_SESSION['port']=$cnx2->port;
$_SESSION['dbname']=$cnx2->dbname;
$_SESSION['user']=$cnx2->user;
$_SESSION['password']=$cnx2->password;

  echo "<script>window.open('../V/vListadoFlotantesPdf.php')</script>";
  
	}


?>