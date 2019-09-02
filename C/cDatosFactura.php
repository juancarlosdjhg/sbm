<?php
session_start();
ini_set('display_errors', 0);
include("../M/mDatosFactura.php");
if(isset($_SESSION['activa'])==FALSE || $_SESSION['activa']==0){

						echo "<script> alert('Inicie Sesión para continuar')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
 							}
 

if(isset($_POST["registrar"])){

		$registrar = new DatosFactura;

		$_SESSION['idBien']=$_POST["id_bien"];
		$registrar->id_bien=$_POST["id_bien"];

		$registrar->orden_de_compra=$_POST["orden_compra"];
		$registrar->orden_de_servicio=$_POST["orden_servicio"];
		$registrar->fecha_orden=$_POST["fecha_orden"];
		$registrar->monto_orden=$_POST["monto_orden"];
		$registrar->nota_de_entrega=$_POST["nota_entrega"];
		$registrar->numero_factura=$_POST["numero_factura"];
		$registrar->fecha_factura=$_POST["fecha_factura"];
		$registrar->monto_factura=$_POST["monto_factura"];
		$registrar->concepto_general=$_POST["concepto_general"];

		$registrar->registrar();

							  }


?>