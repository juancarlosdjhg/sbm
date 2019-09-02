<?php
include('../M/mConsultarEntidad.php');

		$buscar = new entidad;

		$buscar->nombre_entidad=trim($_POST["nombreEntidad"]);
		echo $buscar->consultar();




?>