<?php

include("mConexion.php");

class cargo{

		public $id_cargo;
		public $nombre_cargo;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_cargo==NULL || !$this->nombre_cargo==""){
				$this->nombre_cargo="%".$this->nombre_cargo."%";
				$SQL="SELECT * FROM cargo WHERE nombre_cargo LIKE '$this->nombre_cargo'";
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