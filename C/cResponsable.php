<?php


session_start();
include("../M/mResponsable.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}
 

if(isset($_POST["consultar"])){

		$buscar = new responsable;

		$buscar->cedula_del_responsable=$_POST["cedula_del_responsable"];
		$buscar->consultar();


								}



if(isset($_POST["registrar"])){

		$registrar = new responsable;


		$registrar->cedula_del_responsable=$_POST["cedulaResponsable"].'-'.$_POST["tipoCedula"];
		$registrar->nombre_del_responsable=$_POST["nombreResponsable"];
		$registrar->apellido_del_responsable=$_POST["apellidoResponsable"];
		$registrar->sexo_del_responsable=$_POST["sexoResponsable"];
		$registrar->telefono_del_responsable=$_POST["telefonoResponsable"];
		$registrar->cargo_del_responsable=$_POST["cargoResponsable"];
		$registrar->tipo_del_responsable=$_POST["tipoResponsable"];
		$registrar->dependencia_administrativa=$_POST["dependenciaAdministrativa"];
		$registrar->resolucion=$_POST["numeroResolucion"];
		$registrar->fecha_resolucion=$_POST["fechaResolucion"];
		$registrar->decreto=$_POST["numeroDecreto"];
		$registrar->fecha_decreto=$_POST["fechaDecreto"];

		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new responsable;


		$modificar->id_responsable=$_POST['id_responsable'];
		$modificar->cedula_del_responsable=$_POST["cedula_responsable"];
		$modificar->nombre_del_responsable=$_POST["nombre_responsable"];
		$modificar->apellido_del_responsable=$_POST["apellido_responsable"];
		$modificar->sexo_del_responsable=$_POST["sexo"];
		$modificar->telefono_del_responsable=$_POST["telefono"];
		$modificar->cargo_del_responsable=$_POST["cargo_responsable"];
		$modificar->tipo_del_responsable=$_POST["tipo_responsable"];
		$modificar->dependencia_administrativa=$_POST["dependencia_administrativa"];
		$modificar->resolucion=$_POST["numero_resolucion"];
		$modificar->fecha_resolucion=$_POST["fecha_resolucion"];
		$modificar->decreto=$_POST["numero_decreto"];
		$modificar->fecha_decreto=$_POST["fecha_decreto"];

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new responsable;

$eliminar->id_responsable=$_POST['id_responsable'];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new responsable;
		$cancelar->unsets2();

}




?>