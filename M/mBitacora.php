<?php 

include("mConexion.php");

class bitacora{

		public $tabla;
		public $accion;
		public $fecha;
		public $hora;
		public $antiguo;
		public $nuevo;
		public $usuario;

	
function llenarTabla(){

	echo "<tr><th>Usuario</th><th>Tabla Afectada</th><th>Acción Realizada</th><th>Fecha</th><th>Hora</th><th>Antiguo Valor</th><th>Nuevo Valor</th></tr>";


		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from bitacora order by id_bitacora DESC";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 


					$num=pg_num_rows($resultados);
					if($num!=0){
						while($row=pg_fetch_array($resultados)){
							
							$tabla=$row["nombre_tabla"];
							$accion=$row["tipo_operacion"];
							$fecha=$row["fecha"];
							$hora=$row["hora"];
							$antiguo=$row["viejo_valor"];
							$nuevo=$row["nuevo_valor"];
							$usuario=$row["id_usuario"];

		$sqlConsultar2="select * from usuario where id_usuario='".$usuario."'";	
		$resultados2=pg_query($cnx->conx ,$sqlConsultar2);
		 	while($row=pg_fetch_array($resultados2)){
				$usuario2=$row["usuario"];
		}				
							

	echo "<tr><td>".$usuario2."</td><td>".$tabla."</td><td>".$accion."</td><td>".$fecha."</td><td>".$hora."</td><td>".$antiguo."</td><td>".$nuevo."</td></tr>";
						}	
					}





	}}