<?php 

include("mConexion.php");
include("temporal.php");

class concepto{

		public $id_concepto;
		public $id_tipo;
		public $nombre_concepto;
		public $nombre_original;


		function consultar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from concepto_de_movimiento where nombre_concepto='".$this->nombre_concepto."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){
						$_SESSION["nombre_concepto"]=$this->nombre_concepto;						
						echo "<script> alert('Concepto no encontrado')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vConcepto.php'>";
								}

					else{
								
				while($row=pg_fetch_array($resultados)){	
				$_SESSION["nombre_concepto"]=$row["nombre_concepto"];
																		}
				echo "<script> alert(Concepto encontrado')</script>";
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vConcepto.php'>";
																	
											  				
	
						}


									


		}//FIN CONSULTAR***********************************************************************



		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from concepto_de_movimiento where nombre_concepto='".$this->nombre_concepto."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into concepto_de_movimiento (nombre_concepto, id_tipo_concepto) values ('$this->nombre_concepto','$this->id_tipo')";	
						new temporal();
						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vConcepto.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vConcepto.php'>";


						}	


							}else{

							echo "<script>alert('Concepto ya registrado')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vConcepto.php'>";


							}

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_concepto from concepto_de_movimiento where nombre_concepto='".$this->nombre_concepto_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);


$sqlConsultar2="select * from concepto_de_movimiento where nombre_concepto='".$this->nombre_concepto."' AND id_tipo_concepto='".$this->id_tipo."'";
$resultados2=pg_query($cnx->conx ,$sqlConsultar2);


				$num=pg_num_rows($resultados2);
				if($num==0){

while($row=pg_fetch_array($resultados)){

$this->id_concepto=$row["id_concepto"];

}


$sqlModificar="update concepto_de_movimiento set nombre_concepto='$this->nombre_concepto', id_tipo_concepto='$this->id_tipo' where id_concepto='$this->id_concepto'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vConcepto.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vConcepto.php'>";

}
 }else{
 	echo "<script>alert('No se puede modificar concepto de movimiento ya registrado')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../V/vConcepto.php'>";
 }



} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_concepto from concepto_de_movimiento where nombre_concepto='".$this->nombre_concepto_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$this->id_concepto=$row["id_concepto"];

}


$sqlEliminar="delete from concepto_de_movimiento where id_concepto='$this->id_concepto'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vConcepto.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vConcepto.php'>";


}



} //Fin Eliminar();

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from concepto_de_movimiento order by id_tipo_concepto";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Conceptos Registrados</th><th>Tipo</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre_concepto"];
							$idTipo=$row["id_tipo_concepto"];
							$id="nombreConcepto".$contador;							
							$idCampoTipo="nombreTipo".$contador;
									$sqlConsultar2="select * from tipo_concepto where id_tipo_concepto='".$idTipo."'";	
									$resultados2=pg_query($cnx->conx ,$sqlConsultar2); 
									$num2=pg_num_rows($resultados2);
									if($num2!=0){
									while($row2=pg_fetch_array($resultados2)){
									$NombreTipoConcepto=$row2["nombre_tipo_concepto"];

}}
		

						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre.'</td><td>'.$NombreTipoConcepto.'<input type="hidden" id='.$id.' value=\''.$idTipo.'\'><input type="hidden" id='.$idCampoTipo.' value=\''.$nombre.'\'></td></tr>';
						$contador++;
						$contador1++;
						}	
					}		




}			
function llenarSelectTipo(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from tipo_concepto";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value="">Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_tipo_concepto"];
							$id=$row["id_tipo_concepto"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}
function llenarSelectTipo2(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from tipo_de_concepto";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_tipo_concepto"];
							$id=$row["id_tipo_concepto"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}			





	}