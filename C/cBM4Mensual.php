<?php 

session_start();
include("../M/mBM4Mensual.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}


if(isset($_POST["consultar"])){

		$consultar = new bm4;


		$consultar->id_mes=$_POST['id_mes'];
		$consultar->id_anio=$_POST['id_anio'];
		$consultar->consultar();

						  }
?>