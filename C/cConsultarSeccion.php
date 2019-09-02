<?php
include('../M/mConsultarSeccion.php');

		$buscar = new Seccion;

		$buscar->nombre_Seccion=trim($_POST["nombreSeccion"]);
		echo $buscar->consultar();




?>