<?php


session_start();
include("../M/mSubgrupo.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new subgrupo;


		$registrar->nombre_subgrupo=trim($_POST['nombreSubgrupo']);
		$registrar->id_grupo=$_POST['id_grupo'];
		$registrar->codigo_subgrupo=$_POST['codigo_subgrupo'];
		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new subgrupo;


		$modificar->id_grupo=$_POST['id_grupo2'];
		$modificar->nombre_subgrupo_original=$_POST["nombre_subgrupo_original"];
		$modificar->nombre_subgrupo=trim($_POST["nombre_subgrupo"]);
		$modificar->codigo_original=trim($_POST["codigo_subgrupo_original"]);
		$modificar->codigo_subgrupo=trim($_POST["codigo_subgrupo"]);

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new subgrupo;

$eliminar->nombre_subgrupo_original=$_POST["nombre_subgrupo_original"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new subgrupo;
		$cancelar->unsets2();

}




?>