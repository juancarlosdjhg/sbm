<?php

include("mConexion.php");

class tipoconcepto{

		public $id_tipo;
		public $nombre_tipo_original;
		public $nombre_concepto;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_tipo_original==NULL || !$this->nombre_tipo_original==""){
				$SQLid="SELECT id_tipo_concepto FROM tipo_concepto WHERE nombre_tipo_concepto	='$this->nombre_tipo_original'";
				$resultadoid=pg_query($cnx->conx ,$SQLid);
				while($valoresid=pg_fetch_array($resultadoid)){
					$this->id_tipo=$valoresid["id_tipo"];
				}
				$SQL="SELECT * FROM concepto_de_movimiento WHERE id_tipo_concepto='$this->id_tipo' ORDER BY nombre_concepto";
				$resultados=pg_query($cnx->conx ,$SQL); 
				$arraydata= array();
				$i=0;
				while($valores=pg_fetch_array($resultados)){
					$arraydata[$i]=$valores;
					$i++;

				}//Fin While					
				return json_encode($arraydata);	

			}//Fin if

		} //Fin consultar

} //Fin clase

?>