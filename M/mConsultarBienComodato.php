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


				$SQL="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN bien_activo as ba on b.id_bien=ba.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion WHERE db.nombre_bien LIKE '$this->nombre_bien' AND cm.id_tipo_concepto='18'";								
				//$SQL="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto WHERE cm.id_tipo_concepto='10'";								
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