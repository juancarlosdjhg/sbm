<?php
include('../M/mConsultarProveedor.php');

		$buscar = new Seccion;

		$buscar->codigo_proveedor=trim($_POST["codigoProveedor"]);
		echo $buscar->consultar();




?>