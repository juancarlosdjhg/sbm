<?php 

include("mConexion.php");
include("temporal.php");

class bien{

		public $id_bien;

		function reportar(){
		$cnx = new conexion();
		$cnx->conectar();


						$sqlRegistrarBien="UPDATE bien set id_concepto='7' where id_bien='$this->id_bien' ";			
						new temporal();	
						$resultados1=pg_query($cnx->conx ,$sqlRegistrarBien) ;
						if(!$resultados1){

							echo "<script>alert('Error al reportar')</script>";							
							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";
						}

						else{

							echo "<script>alert('Reporte Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";


						}	


							

									} //Fin Registrar();


	}