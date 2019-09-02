<?php
include('../M/mConsultarGrupoSeccion.php');

		$buscar = new grupoSeccion;

		$buscar->nombre_entidad_original=$_POST["nombreEntidadOriginal"];
		echo $buscar->consultar();




?>