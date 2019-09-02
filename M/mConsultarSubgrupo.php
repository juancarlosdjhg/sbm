<?php

include("mConexion.php");

class subgrupo{

		public $id_subgrupo;
		public $nombre_subgrupo;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_subgrupo==NULL || !$this->nombre_subgrupo==""){
				$this->nombre_subgrupo="%".$this->nombre_subgrupo."%";
				$SQL="SELECT * FROM subgrupo WHERE nombre_subgrupo LIKE '$this->nombre_subgrupo'";
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