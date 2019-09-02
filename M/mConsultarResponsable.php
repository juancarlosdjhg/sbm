<?php

include("mConexion.php");

class Seccion{

		public $id_responsable;
		public $nombre_responsable;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_responsable==NULL || !$this->nombre_responsable==""){
				$this->nombre_responsable="%".$this->nombre_responsable."%";
				$SQL="SELECT * FROM responsable as r JOIN datos_personales as dp ON r.id_datos_personales=dp.id_datos_personales WHERE nombre LIKE '$this->nombre_responsable'";
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