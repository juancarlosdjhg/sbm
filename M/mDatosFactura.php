<?php 
session_start();
include("../M/mConexion.php");

class DatosFactura{
		
		public $id_bien;
		public $orden_de_compra;
		public $orden_de_servicio;
		public $fecha_orden;
		public $monto_orden;
		public $nota_de_entrega;
		public $numero_factura;
		public $fecha_factura;
		public $monto_factura;
		public $concepto_general;


		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from datos_factura where id_bien='".$this->id_bien."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						
						$sqlRegistrar3="insert into datos_factura values ('".$this->id_bien."', '".$this->orden_de_compra."', '".$this->orden_de_servicio."', '".$this->fecha_orden."', '".$this->monto_orden."', '".$this->nota_de_entrega."', '".$this->numero_factura."', '".$this->fecha_factura."', '".$this->monto_factura."', '".$this->concepto_general."')";
						$resultados3=pg_query($cnx->conx ,$sqlRegistrar3);



						if(!$resultados3){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vDatosFactura.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";
							$_SESSION['idBien']=$this->id_bien;
							$_SESSION['GotDatosFactura']='GOT';
							echo "<meta http-equiv='refresh' content='0; url=../V/ConsultaActa.php'>";							


						}	


					}
									}  //Fin Registrar();
}

//************************************************************************************************************
?>