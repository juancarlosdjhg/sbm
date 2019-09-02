<?php


session_start();
include("../M/mSeccion.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new Seccion;


		$registrar->nombre_Seccion=trim($_POST['nombreSeccion']);
		$registrar->id_entidad=$_POST['id_entidad'];
		$registrar->codigo_entidad=$_POST['codigoSeccion'];
		$registrar->codigo_Seccion=trim($_POST['codigoSeccion']);
		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new Seccion;


		$modificar->id_entidad=$_POST['id_entidad'];
		$modificar->nombre_Seccion_original=$_POST["nombre_Seccion_original"];
		$modificar->nombre_Seccion=trim($_POST["nombre_Seccion"]);
		$modificar->codigo_Seccion_original=$_POST["codigo_Seccion_original"];
		$modificar->codigo_Seccion=trim($_POST["codigo_Seccion"]);

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new Seccion;

$eliminar->nombre_Seccion_original=$_POST["nombre_Seccion_original"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new Seccion;
		$cancelar->unsets2();

}




?>