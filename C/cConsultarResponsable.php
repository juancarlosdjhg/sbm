<?php
include('../M/mConsultarResponsable.php');

		$buscar = new Seccion;

		$buscar->nombre_responsable=trim($_POST["nombreResponsable"]);
		echo $buscar->consultar();




?>