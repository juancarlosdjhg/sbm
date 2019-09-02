<?php
include('../M/mConsultarSecciones.php');

		$buscar = new seccion;
		$buscar->id_entidad=$_POST["id_entidad"];
		echo $buscar->consultar();




?>