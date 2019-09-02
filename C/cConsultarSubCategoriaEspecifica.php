<?php
include('../M/mConsultarSubCategoriaEspecifica.php');

		$buscar = new SubCategoriaEspecifica;

		$buscar->nombre_SubCategoriaEspecifica=trim($_POST["nombreSubCategoriaEspecifica"]);		
		echo $buscar->consultar();




?>