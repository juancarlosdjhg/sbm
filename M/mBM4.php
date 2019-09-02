<?php
include("mConexion.php");

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();


/* //////////////////////////////////// Falta Existencia Anterior///////////////////////////////////////////// */

									$suma_mes_anterior=0;

			
		echo"<tr>";			
			echo"<th bgcolor='#fff'>Existencia Anterior</th>";
			echo"<td bgcolor='#86e945' align='right'>";

			echo aMoneda($suma_mes_anterior);

			echo "</td>";
			echo"<td bgcolor='#fff'></td>";
		echo"</tr>";



		$suma_incorporacion=0;

		$sql="SELECT * FROM transaccion where id_tipo_concepto='10'";
		$resultados=pg_query($cnx->conx ,$sql); 
			while($row=pg_fetch_array($resultados)){
					$id=$row['id_bien'];
					$sql2="SELECT * FROM datos_bien where id_bien='$id'";
					$resultados2=pg_query($cnx->conx ,$sql2);
						while($row2=pg_fetch_array($resultados2)){
							$valor=$row2['valor_bien'];
							$suma_incorporacion=$suma_incorporacion+$valor;

						}
						}

			echo"<tr>";
			echo"<th bgcolor='#fff'>Incorporaciones</th>";			
			echo"<td bgcolor='#86e945' align='right'>";

			echo aMoneda($suma_incorporacion);
			echo "<td>";
			echo "</td>";
			echo "</td>";			
			echo"</tr>";

		$suma_desincorporacion=0;

		$sql="SELECT * FROM transaccion where id_tipo_concepto='11'";
		$resultados=pg_query($cnx->conx ,$sql); 
			while($row=pg_fetch_array($resultados)){
					$id=$row['id_bien'];
					$sql2="SELECT * FROM datos_bien where id_bien='$id'";
					$resultados2=pg_query($cnx->conx ,$sql2);
						while($row2=pg_fetch_array($resultados2)){
							$valor=$row2['valor_bien'];
							$suma_desincorporacion=$suma_desincorporacion+$valor;

						}
						}

		echo"<tr>";
			echo"<th bgcolor='#fff'>Desincorporaciones</th>";
			echo"<td bgcolor='#fff'></td>";
			echo"<td bgcolor='#fc5353' align='right'>";

			echo aMoneda($suma_desincorporacion);

			echo " Bs</td>";
		echo"</tr>";


	/* //////////////////////////////////// Falta Desincorporaciones por Investigar///////////////////////////////////////////// */	
									$suma_desincorporacion_por_investigar=0;



		echo"<tr>";
			echo"<th bgcolor='#fff'>Desincorporaciones por Investigar</th>";
			echo"<td bgcolor='#fff'></td>";
			echo"<td bgcolor='fc5353' align='right'>";
			
			echo aMoneda($suma_desincorporacion_por_investigar);
			
			echo "</td>";
		echo"</tr>";


		$existencia_total=($suma_mes_anterior+$suma_incorporacion)-$suma_desincorporacion-$suma_desincorporacion_por_investigar;

		echo"<tr>";
			echo"<th bgcolor='6bbaef'>Existencia Final</th>";
			echo"<td colspan='2' bgcolor='6bbaef' align='right'>";
			
			echo aMoneda($existencia_total);

			echo "</td>";
		echo"</tr>";
}


function aMoneda($value) {
  return number_format($value, 2, ',','.').' Bs' ;
}


  ?>