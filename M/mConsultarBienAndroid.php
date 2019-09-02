<?php

include("mConexion.php");


				$cnx = new conexion();
				$cnx->conectar();

                //  $id_bien="61";
                $id_bien=$_REQUEST['id_bien'];

				$SQL="SELECT * FROM datos_bien WHERE id_bien='$id_bien'";
				$resultados=pg_query($cnx->conx ,$SQL);
				$arraydata= array();
				$i=0;
				while($valores=pg_fetch_assoc($resultados)){
					$arraydata[$i]=$valores;
					$i++;

				}//Fin While					
				print(json_encode($arraydata));



?>