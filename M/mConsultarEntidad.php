<?php

include("mConexion.php");

class entidad{

		public $id_entidad;
		public $nombre_entidad;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_entidad==NULL || !$this->nombre_entidad==""){
				$this->nombre_entidad="%".$this->nombre_entidad."%";
				$SQL="SELECT * FROM entidad_propietaria WHERE nombre_entidad_propietaria LIKE '$this->nombre_entidad'";
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