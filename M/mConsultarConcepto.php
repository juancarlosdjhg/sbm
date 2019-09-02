<?php

include("mConexion.php");

class concepto{

		public $id_concepto;
		public $nombre_concepto;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_concepto==NULL || !$this->nombre_concepto==""){
				$this->nombre_concepto="%".$this->nombre_concepto."%";
				$SQL="SELECT * FROM concepto_de_movimiento as c JOIN tipo_concepto as tp on c.id_tipo_concepto=tp.id_tipo_concepto WHERE nombre_concepto LIKE '$this->nombre_concepto'";
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