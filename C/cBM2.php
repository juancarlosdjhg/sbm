<?php


session_start();
include("../M/mBM2.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["incorporar"])){

		$registrar = new bien;


		$registrar->id_bien=$_POST['id_bien'];
		$registrar->id_concepto=$_POST['id_concepto'];
		$registrar->id_seccion=$_POST['id_seccion'];
		$registrar->id_datos_personales=$_POST['id_responsable'];

		$registrar->incorporar();

							  }


if(isset($_POST["desincorporar"])){

		$registrar = new bien;


		$registrar->id_bien=$_POST['id_bien1'];
		$registrar->id_concepto=$_POST['id_concepto1'];

		$registrar->desincorporar();

							  }

if(isset($_POST["comodato"])){

		$registrar = new bien;


		$registrar->id_bien=$_POST['id_bien4'];
		$registrar->destino_comodato=$_POST['destino_comodato'];
		$registrar->tiempo_comodato=$_POST['tiempo_comodato'];

		$registrar->comodato();

							  }

if(isset($_POST["traspasar"])){

		$registrar = new bien;


		$registrar->id_bien=$_POST['id_bien2'];
		$registrar->motivo_traspaso=$_POST['motivo_traspaso'];
		$registrar->id_responsable_uso=$_POST['id_responsable2'];
		$registrar->id_seccion=$_POST['id_seccion2'];

		$registrar->traspasar();

							  }




?>