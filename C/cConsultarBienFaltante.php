<?php
include('../M/mConsultarBienFaltante.php');

		$buscar = new bien;

		$buscar->nombre_bien=trim($_POST["nombreBien"]);
		echo $buscar->consultar();




?>