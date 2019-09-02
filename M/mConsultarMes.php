<?php

include("mConexion.php");

class mes{

		public $id_anio;


		function consultar(){
				$cnx = new conexion();
				$cnx->conectar();




		$sql="SELECT * FROM mes";			
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