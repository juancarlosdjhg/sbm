<?php
session_start();
include("../M/mGestionarBD.php");


if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}
 

if(isset($_POST["respaldar"])){

		$respaldar = new gestionBD();
		$respaldar->backup();

								}

if(isset($_POST["restaurar"])){

$fileName=$_FILES['arhivoRestaurar']['name'];
$partes = explode(".", $fileName);
	if(end($partes)=="sql" || end($partes)=="backup"){

		move_uploaded_file($_FILES['arhivoRestaurar']['tmp_name'],"../V/backup/" . $_FILES['arhivoRestaurar']['name']);
		$respaldar = new gestionBD();		
		$respaldar->nom_archivo='../V/backup/'.$_FILES['arhivoRestaurar']['name'];
		$respaldar->restore();
	
}else{
						echo "<script> alert('Archivo no permitido')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vGestionBD.php'>";


}

							  }

?>