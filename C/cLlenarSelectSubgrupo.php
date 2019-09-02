<?php
include('../M/mLlenarSelectSubgrupo.php');

		$buscar = new subgrupo;

		$buscar->id_grupo=trim($_POST["idGrupo"]);
		echo $buscar->consultar();




?>