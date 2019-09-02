<?php
include('../M/mConsultarSubgrupo.php');

		$buscar = new subgrupo;

		$buscar->nombre_subgrupo=trim($_POST["nombreSubgrupo"]);
		echo $buscar->consultar();




?>