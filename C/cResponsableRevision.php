<?php


session_start();
include("../M/mResponsableRevision.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new responsable;


		$registrar->id_responsable=trim($_POST['id_responsable']);
		$registrar->id_departamento=$_POST['id_departamento'];
		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new responsable;


		$modificar->id_responsable=trim($_POST['id_responsable_hidden']);
		$modificar->id_departamento=$_POST['id_departamento2'];

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new responsable;

$eliminar->id_responsable=trim($_POST['id_responsable_hidden']);
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new responsable;
		$cancelar->unsets2();

}




?>