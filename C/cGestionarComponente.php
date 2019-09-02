<?php
session_start();
include('../M/mGestionarComponente.php');


if(isset($_POST["buscar"])){


		$buscar = new componente;

		$buscar->id_bien=$_POST["idBien"];
		$buscar->consultar();
}

if(isset($_POST["registrar"])){


		$registrar = new componente;

		$registrar->nombre_bien=trim($_POST['nombreBien']);
		$registrar->valor_bien=trim($_POST['valorBien']);
		$registrar->marca_bien=trim($_POST['marcaBien']);
		$registrar->modelo_bien=trim($_POST['modeloBien']);
		$registrar->color_bien=trim($_POST['colorBien']);
		$registrar->descripcion_bien=$_POST['descripcionBien'];			
		$registrar->imagen_bien=$_FILES['imagenBien'];	
		$registrar->id_subgrupo='0';	
		$registrar->id_proveedor=$_POST['idProveedor'];	
		$registrar->factura_bien=$_FILES['facturaBien'];	
		$registrar->fecha_adquisicion_bien=trim($_POST['fechaAdquisicion']);
		$registrar->serial_bien=$_POST['serial_bien'];
		$registrar->descripcion_bien_individual=$_POST['descripcion_bien_individual'];
		$registrar->id_bien_compuesto=$_POST['idBien'];

		$registrar->registrar();
}

if(isset($_POST["gestionar"])){

		$editar = new componente;
		$editar->id_bien=$_POST['id_bien'];
		$editar->editar();

}

if(isset($_POST["modificar"])){

		$modificar = new componente;

				$modificar->id_bien=$_POST["idBien"];
				$modificar->nombre_bien=$_POST["nombre_bien"];
				$modificar->valor_bien=$_POST["valor_bien2"];
				$modificar->fecha_adquisicion_bien=$_POST["fecha_adquisicion_bien"];
				$modificar->descripcion_bien=$_POST["descripcion_bien"];
				$modificar->serial_bien_bien=$_POST["serial_bien"];
				$modificar->id_subgrupo='0';
				$modificar->marca_bien=$_POST["marca_bien"];
				$modificar->modelo_bien=$_POST["modelo_bien"];
				$modificar->color_bien=$_POST["color_bien"];
				$modificar->descripcion_bien_individual=$_POST["descripcion_bien_individual"];
				$modificar->id_proveedor=$_POST["id_proveedor"];

		$modificar->modificar();

							  }

 if(isset($_POST["eliminar"])){

$eliminar = new componente;

$eliminar->id_bien=$_POST["idBien"];
$eliminar->eliminar();

  }


?>