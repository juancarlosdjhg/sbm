<?php

include("mConexion.php");

class subgrupo{

		public $id_grupo;
		public $nombre_grupo;
		public $id_subgrupo;
		public $nombre_subgrupo;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();


				$SQL="SELECT * FROM subgrupo WHERE id_grupo='$this->id_grupo'";
				$resultados=pg_query($cnx->conx ,$SQL); 
				$arraydata= array();
				$i=0;
				while($valores=pg_fetch_array($resultados)){
					$arraydata[$i]=$valores;
					$i++;

				}//Fin While					
				return json_encode($arraydata);	


		} //Fin consultar

} //Fin clase

?>