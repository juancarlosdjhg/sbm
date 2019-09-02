<?php

include("mConexion.php");

class bitacora{

		public $id_usuario;
		public $nombre_usuario;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_usuario==NULL || !$this->nombre_usuario==""){
				$this->nombre_usuario="%".$this->nombre_usuario."%";
				$SQL="SELECT * FROM bitacora as b JOIN usuario as u on u.id_usuario=b.id_usuario WHERE usuario LIKE '$this->nombre_usuario'";
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