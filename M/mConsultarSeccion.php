<?php

include("mConexion.php");

class Seccion{

		public $id_Seccion;
		public $nombre_Seccion;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_Seccion==NULL || !$this->nombre_Seccion==""){
				$this->nombre_Seccion="%".$this->nombre_Seccion."%";
				$SQL="SELECT * FROM Seccion WHERE nombre_Seccion LIKE '$this->nombre_Seccion'";
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