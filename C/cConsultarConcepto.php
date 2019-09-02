<?php
include('../M/mConsultarConcepto.php');

		$buscar = new concepto;

		$buscar->nombre_concepto=trim($_POST["nombreConcepto"]);
		echo $buscar->consultar();




?>