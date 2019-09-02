<?php

include("mConexion.php");

class SubCategoriaEspecifica{

		public $id_SubCategoriaEspecifica;
		public $nombre_SubCategoriaEspecifica;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_SubCategoriaEspecifica==NULL || !$this->nombre_SubCategoriaEspecifica==""){				
				$this->nombre_SubCategoriaEspecifica="%".$this->nombre_SubCategoriaEspecifica."%";							
				$SQL="SELECT * FROM sub_categoria_especifica WHERE nombre_sub_categoria_especifica LIKE '$this->nombre_SubCategoriaEspecifica'";
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