<?php


session_start();
include("../M/mGrupo.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new grupo;


		$registrar->nombre_grupo=trim($_POST['nombreGrupo']);
		$registrar->codigo_grupo=trim($_POST['codigoGrupo']);
		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new grupo;


		$modificar->nombre_grupo_original=$_POST["nombre_grupo_original"];
		$modificar->nombre_grupo=trim($_POST["nombre_grupo"]);
		$modificar->codigo_grupo_original=$_POST["codigo_grupo_original"];
		$modificar->codigo_grupo=trim($_POST["codigo_grupo"]);

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new grupo;

$eliminar->nombre_grupo_original=$_POST["nombre_grupo_original"];
$eliminar->eliminar();

  }

?>