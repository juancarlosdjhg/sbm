<?php

include("mConexion.php");

class Seccion{

		public $id_proveedor;
		public $codigo_proveedor;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->codigo_proveedor==NULL || !$this->codigo_proveedor==""){
				$this->codigo_proveedor="%".$this->codigo_proveedor."%";
				$SQL="SELECT * FROM proveedor WHERE codigo_proveedor LIKE '$this->codigo_proveedor'";
				$resultados=pg_query($cnx->conx ,$SQL); 
				$arraydata= array();
				$i=0;
				while($valores=pg_fetch_assoc($resultados)){
					$arraydata[$i]=$valores;
					$i++;

				}//Fin While					
				return json_encode($arraydata);	

			}//Fin if

		} //Fin consultar

} //Fin clase

?>