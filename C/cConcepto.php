<?php


session_start();
include("../M/mConcepto.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new concepto;


		$registrar->nombre_concepto=trim($_POST['nombreConcepto']);
		$registrar->id_tipo=$_POST['id_tipo'];
		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new concepto;


		$modificar->id_tipo=$_POST['id_tipo2'];
		$modificar->nombre_concepto_original=$_POST["nombre_concepto_original"];
		$modificar->nombre_concepto=trim($_POST["nombre_concepto"]);

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new concepto;

$eliminar->nombre_concepto_original=$_POST["nombre_concepto_original"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new concepto;
		$cancelar->unsets2();

}




?>