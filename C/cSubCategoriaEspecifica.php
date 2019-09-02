<?php


session_start();
include("../M/mSubCategoriaEspecifica.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new SubCategoriaEspecifica;


		$registrar->nombre_SubCategoriaEspecifica=trim($_POST['nombreSubCategoriaEspecifica']);
		$registrar->id_subgrupo=$_POST['id_subgrupo'];
		$registrar->codigo_SubCategoriaEspecifica=$_POST['codigo_SubCategoriaEspecifica'];
		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new SubCategoriaEspecifica;


		$modificar->id_subgrupo2=$_POST['id_subgrupo2'];
		$modificar->nombre_SubCategoriaEspecifica_original=$_POST["nombre_SubCategoriaEspecifica_original"];
		$modificar->nombre_SubCategoriaEspecifica=trim($_POST["nombre_SubCategoriaEspecifica"]);
		$modificar->codigo_SubCategoriaEspecifica=trim($_POST["codigo_SubCategoriaEspecifica"]);
		$modificar->codigo_SubCategoriaEspecifica_original=trim($_POST["codigo_SubCategoriaEspecifica_original"]);

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new SubCategoriaEspecifica;

$eliminar->nombre_SubCategoriaEspecifica_original=$_POST["nombre_SubCategoriaEspecifica_original"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new SubCategoriaEspecifica;
		$cancelar->unsets2();

}




?>