<?php
include('../M/mConsultarMes.php');

		$buscar = new mes;
		$buscar->id_anio=$_POST["id_anio"];
		echo $buscar->consultar();




?>