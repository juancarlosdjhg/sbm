<?php


session_start();
include("../M/mEntidad.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new entidad;


		$registrar->nombre_entidad=trim($_POST['nombreEntidad']);
		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new entidad;


		$modificar->nombre_entidad_original=$_POST["nombre_entidad_original"];
		$modificar->nombre_entidad=trim($_POST["nombre_entidad"]);

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new entidad;

$eliminar->nombre_entidad_original=$_POST["nombre_entidad_original"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new entidad;
		$cancelar->unsets2();

}




?>