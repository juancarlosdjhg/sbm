<?php
include('../M/mConsultarBienDesincorporado2.php');

		$buscar = new bien;

		$buscar->nombre_bien=trim($_POST["nombreBien"]);
		echo $buscar->consultar();




?>