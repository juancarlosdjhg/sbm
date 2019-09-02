<?php

include("mConexion.php");

class responsable{

		public $id_responsable;
		public $id_departamento;
		public $nombre;

		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();


				$SQL="SELECT * FROM responsable_revision as rr JOIN responsable as r on CAST(rr.id_responsable AS INT)=r.id_responsable JOIN datos_personales as dp on CAST(r.id_datos_personales AS INT)=dp.id_datos_personales WHERE id_departamento='$this->id_departamento'";
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