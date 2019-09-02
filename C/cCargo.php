<?php


session_start();
include("../M/mCargo.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new cargo;


		$registrar->nombre_cargo=trim($_POST['nombreCargo']);
		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new cargo;


		$modificar->nombre_cargo_original=$_POST["nombre_cargo_original"];
		$modificar->nombre_cargo=trim($_POST["nombre_cargo"]);

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new cargo;

$eliminar->nombre_cargo_original=$_POST["nombre_cargo_original"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new cargo;
		$cancelar->unsets2();

}




?>