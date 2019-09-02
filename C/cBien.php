<?php

ini_set('display_errors', 0); 
session_start();
include("../M/mBien.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}

if(isset($_POST["registrar"])){

		$registrar = new bien;


		$registrar->nombre_bien=trim($_POST['nombreBien']);
		$registrar->valor_bien=trim($_POST['valorBien']);
		$registrar->marca_bien=trim($_POST['marcaBien']);
		$registrar->modelo_bien=trim($_POST['modeloBien']);
		$registrar->color_bien=trim($_POST['colorBien']);
		if(isset($_POST['descripcionBien'])){
			$registrar->descripcion_bien=$_POST['descripcionBien'];			
		}		
		$registrar->imagen_bien=$_FILES['imagenBien'];	
		$registrar->id_sub_categoria_especifica=$_POST['idSubCategoriaEspecifica'];	
		$registrar->id_proveedor=$_POST['idProveedor'];	
		$registrar->factura_bien=$_FILES['facturaBien'];	
		$registrar->orden_compra_bien=$_FILES['ordenCompraBien'];
		$registrar->orden_pago_bien=$_FILES['ordenPagoBien'];
		$registrar->orden_requisicion_bien=$_FILES['ordenRequisicionBien'];
		$registrar->fecha_adquisicion_bien=trim($_POST['fechaAdquisicion']);
		$registrar->serial_bien=$_POST['serialBien'];
		$_SESSION['limite']=$_POST['cantidadBien'];
		$registrar->descripcion_bien_individual=$_POST['descripcionPropiaBien'];
		$registrar->revision_bien=$_POST['revisionBien'];
		$registrar->registrar();

							  }


							  

if(isset($_POST["modificar"])){

		$modificar = new bien;


		$modificar->id_bien=$_POST['id_bien'];
		$modificar->nombre_bien=$_POST['nombre_bien'];
		$modificar->nombre_bien_original=$_POST["nombre_bien_original"];
		$modificar->valor_bien=trim($_POST["valor_bien"]);
		$modificar->marca_bien=trim($_POST['marca_bien']);
		$modificar->modelo_bien=trim($_POST['modelo_bien']);
		$modificar->color_bien=trim($_POST['color_bien']);
		$modificar->descripcion_bien=trim($_POST["descripcion_bien"]);
		$modificar->descripcion_bien_individual=trim($_POST["descripcion_bien_individual"]);
		$modificar->fecha_adquisicion_bien=trim($_POST["fecha_adquisicion"]);
		$modificar->id_sub_categoria_especifica=$_POST['idSubCategoriaEspecifica'];
		$modificar->id_proveedor=$_POST['id_proveedor'];

		$modificar->modificar();

							  }	

 if(isset($_POST["eliminar"])){

$eliminar = new bien;

$eliminar->id_bien=$_POST["id_bien"];
$eliminar->eliminar();

  }



if(isset($_POST["cancelar"])){

		$cancelar = new subgrupo;
		$cancelar->unsets2();

}



 if(isset($_POST["gestionar"])){

$nombre_bien=$_POST["nombre_bien"];
echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vBM1Detalles.php?nombre_bien=$nombre_bien'>";

  }



?>