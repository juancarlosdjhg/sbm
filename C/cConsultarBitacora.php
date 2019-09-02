<?php
include('../M/mConsultarBitacora.php');

		$buscar = new bitacora;

		$buscar->nombre_usuario=trim($_POST["nombreUsuario"]);
		echo $buscar->consultar();




?>