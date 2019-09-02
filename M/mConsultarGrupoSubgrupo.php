<?php

include("mConexion.php");

class gruposubgrupo{

		public $id_grupo;
		public $nombre_grupo_original;
		public $nombre_subgrupo;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_grupo_original==NULL || !$this->nombre_grupo_original==""){
				$SQLid="SELECT id_grupo FROM grupo WHERE nombre_grupo='$this->nombre_grupo_original'";
				$resultadoid=pg_query($cnx->conx ,$SQLid);
				while($valoresid=pg_fetch_array($resultadoid)){
					$this->id_grupo=$valoresid["id_grupo"];
				}
				$SQL="SELECT * FROM subgrupo WHERE id_grupo='$this->id_grupo' ORDER BY nombre_subgrupo";
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