<?php

include("mConexion.php");

class seccion{

		public $id_entidad;


		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();




		$sql="SELECT * FROM seccion WHERE id_entidad_propietaria='$this->id_entidad'";			
		$resultados=pg_query($cnx->conx ,$sql);

				$arraydata= array();
				$i=0;
				while($valores=pg_fetch_assoc($resultados)){				

					$arraydata[$i]=$valores;
					$i++;
				

				}//Fin While					
				return json_encode($arraydata);	



		} //Fin consultar

} //Fin clase

?>