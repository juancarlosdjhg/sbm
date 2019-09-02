<?php

include("mConexion.php");

class grupo{

		public $id_grupo;
		public $nombre_grupo;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_grupo==NULL || !$this->nombre_grupo==""){
				$this->nombre_grupo="%".$this->nombre_grupo."%";
				$SQL="SELECT * FROM grupo WHERE nombre_grupo LIKE '$this->nombre_grupo' ORDER BY nombre_grupo";
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