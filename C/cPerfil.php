<?php


session_start();
include("../M/mPerfil.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}
 

if(isset($_POST["consultar"])){

		$buscar = new perfil;

		$buscar->perfil_usuario=$_POST["perfil_usuario"];
		$buscar->consultar();






								}



if(isset($_POST["registrar"])){

		$registrar = new perfil;


		$registrar->perfil_usuario=$_SESSION["perfil_usuario"];
		$registrar->gestionar_responsable=$_POST["gestionar_responsable"];
		$registrar->gestionar_usuario=$_POST["gestionar_usuario"];
		$registrar->gestionar_departamento=$_POST["gestionar_departamento"];
		$registrar->gestionar_seccion=$_POST["gestionar_seccion"];
		$registrar->gestionar_cargo=$_POST["gestionar_cargo"];
		$registrar->gestionar_grupo=$_POST["gestionar_grupo"];
		$registrar->gestionar_subgrupo=$_POST["gestionar_subgrupo"];
		$registrar->gestionar_subgrupo=$_POST["gestionar_concepto"];
		$registrar->gestionar_subgrupo=$_POST["gestionar_bd"];

		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new perfil;


		$modificar->perfil_usuario=$_SESSION["perfil_usuario"];
		$modificar->gestionar_responsable=$_POST["gestionar_responsable"];
		$modificar->gestionar_usuario=$_POST["gestionar_usuario"];
		$modificar->gestionar_departamento=$_POST["gestionar_departamento"];
		$modificar->gestionar_seccion=$_POST["gestionar_seccion"];
		$modificar->gestionar_cargo=$_POST["gestionar_cargo"];
		$modificar->gestionar_grupo=$_POST["gestionar_grupo"];
		$modificar->gestionar_subgrupo=$_POST["gestionar_subgrupo"];
		$modificar->gestionar_subgrupo=$_POST["gestionar_concepto"];
		$modificar->gestionar_subgrupo=$_POST["gestionar_bd"];
		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new perfil;

$eliminar->nombre_perfil=$_SESSION["perfil_usuario"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new perfil;
		$cancelar->unsets2();

}




?>