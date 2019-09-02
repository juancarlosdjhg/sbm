<?php


session_start();
include("../M/mRevisionBien.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["aprobar"])){

		$aprobar = new revision;


		$aprobar->id_bien=$_POST['id_bien'];
		$aprobar->descripcion_bien=$_POST['db'];
		$aprobar->conclusion_bien=$_POST['conclusion_bien'];
		$aprobar->id_responsable_revision=$_POST['id_responsable'];
		$aprobar->aprobar();

							  }

if(isset($_POST["rechazar"])){

		$rechazar = new revision;


		$rechazar->id_bien=$_POST['id_bien'];
		$aprobar->descripcion_bien=$_POST['descripcion_bien'];
		$aprobar->conclusion_bien=$_POST['conclusion_bien'];
		$aprobar->id_responsable_revision=$_POST['id_revision'];
		$rechazar->rechazar();

							  }	


?>