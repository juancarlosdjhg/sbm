<?php

include("mConexion.php");

class bien{

		public $id_bien;
		public $nombre_bien;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();

			if(!$this->nombre_bien==NULL || !$this->nombre_bien==""){
				$this->nombre_bien="%".$this->nombre_bien."%";

				$SQL="SELECT * FROM datos_bien as db JOIN bien as b on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN tipo_concepto as tc on cm.id_tipo_concepto=tc.id_tipo_concepto WHERE nombre_bien LIKE '$this->nombre_bien'";


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