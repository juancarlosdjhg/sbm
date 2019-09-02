<?php

include("mConexion.php");

class subcategoria{

		public $id_subgrupo;
		public $nombre_subgrupo;
		public $id_subcategoria;
		public $nombre_subcategoria;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();


				$SQL="SELECT * FROM sub_categoria_especifica WHERE id_subgrupo='$this->id_subgrupo'";
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