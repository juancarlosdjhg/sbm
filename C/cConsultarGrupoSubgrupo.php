<?php
include('../M/mConsultarGrupoSubgrupo.php');

		$buscar = new gruposubgrupo;

		$buscar->nombre_grupo_original=$_POST["nombreGrupoOriginal"];
		echo $buscar->consultar();




?>