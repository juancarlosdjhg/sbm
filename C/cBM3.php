<?php


session_start();
include("../M/mBM3.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["reportar"])){

		$registrar = new bien;


		$registrar->id_bien=$_POST['id_bien3'];

		$registrar->reportar();

							  }

?>