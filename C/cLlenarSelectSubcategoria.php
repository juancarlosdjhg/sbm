<?php
include('../M/mLlenarSelectSubcategoria.php');

		$buscar = new subcategoria;

		$buscar->id_subgrupo=trim($_POST["idSubgrupo"]);
		echo $buscar->consultar();




?>