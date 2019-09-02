<?php


session_start();
include("../M/mUsuario.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}
 

if(isset($_POST["consultar"])){

		$buscar = new usuario;

		$buscar->nombre_usuario=$_POST["nombre_usuario"];
		$buscar->consultar();






								}



if(isset($_POST["registrar"])){

		$registrar = new usuario;


		$registrar->nombre_usuario=$_SESSION["nombre_usuario"];
		$registrar->contrasenia=$_POST["contrasenia"];
		$registrar->contrasenia2=$_POST["contrasenia2"];
		$registrar->permiso=$_POST["permiso"];


		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new usuario;


		$modificar->nombre_usuario=$_SESSION["nombre_usuario"];
		$modificar->contrasenia=$_POST["contrasenia"];
		$modificar->contrasenia2=$_POST["contrasenia2"];
		$modificar->permiso=$_POST["permiso"];
		
		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new usuario;

$eliminar->nombre_usuario=$_SESSION["nombre_usuario"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new usuario;
		$cancelar->unsets2();

}




?>