<?php


session_start();
include("../M/mProveedor.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}
 


if(isset($_POST["registrar"])){

		$registrar = new proveedor;

		$registrar->rif_tipo=$_POST["rifTipo"];
		$registrar->rif_del_proveedor=$_POST["rifProveedor"];
		$registrar->sufijo_rif=$_POST["sufijoRif"];
		$registrar->codigo_del_proveedor=$_POST["codigoProveedor"];
		$registrar->tipo_del_proveedor=$_POST["tipoProveedor"];
		$registrar->descripcion_del_proveedor=$_POST["descripcionProveedor"];
		$registrar->otra_descripcion=$_POST["otraDescripcionProveedor"];
		$registrar->direccion=$_POST["direccion"];

		$registrar->registrar();

							  }

if(isset($_POST["modificar"])){

		$modificar = new proveedor;


		$modificar->id_proveedor=$_POST['id_proveedor'];
		$modificar->rif_del_proveedor=$_POST["rif_proveedor"];
		$modificar->codigo_del_proveedor=$_POST["codigo_proveedor"];
		$modificar->tipo_del_proveedor=$_POST["tipo_proveedor"];
		$modificar->descripcion_del_proveedor=$_POST["descripcion_proveedor"];
		$modificar->otra_descripcion=$_POST["otra_descripcion"];
		$modificar->rif_tipo=$_POST["rifTipo2"];
		$modificar->sufijo_rif=$_POST["sufijoRif2"];

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new proveedor;

$eliminar->id_proveedor=$_POST['id_proveedor'];
$eliminar->eliminar();

  }




?>