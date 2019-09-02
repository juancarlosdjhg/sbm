<?php
include('../M/mLlenarSelectResponsable.php');

		$buscar = new responsable;

		$buscar->id_departamento=$_POST["id_departamento"];
		
		echo $buscar->consultar();




?>