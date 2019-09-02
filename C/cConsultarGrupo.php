<?php
include('../M/mConsultarGrupo.php');

		$buscar = new grupo;

		$buscar->nombre_grupo=trim($_POST["nombreGrupo"]);
		echo $buscar->consultar();




?>