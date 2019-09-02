<?php
include('../M/mConsultarCargo.php');

		$buscar = new cargo;

		$buscar->nombre_cargo=trim($_POST["nombreCargo"]);
		echo $buscar->consultar();




?>