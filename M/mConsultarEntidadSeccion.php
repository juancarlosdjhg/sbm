<?php

include("mConexion.php");

class entidadSeccion{

		public $id_entidad;
		public $nombre_entidad_original;
		public $nombre_Seccion;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_entidad_original==NULL || !$this->nombre_entidad_original==""){
				$SQLid="SELECT id_entidad FROM entidad WHERE nombre_entidad='$this->nombre_entidad_original'";
				$resultadoid=pg_query($cnx->conx ,$SQLid);
				while($valoresid=pg_fetch_array($resultadoid)){
					$this->id_entidad=$valoresid["id_entidad"];
				}
				$SQL="SELECT * FROM Seccion WHERE id_entidad='$this->id_entidad' ORDER BY nombre_Seccion";
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