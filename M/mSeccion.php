<?php 

include("mConexion.php");
include("temporal.php");

class Seccion{

		public $id_Seccion;
		public $id_entidad;
		public $nombre_Seccion;
		public $nombre_original;
		public $codigo_Seccion;
		public $codigo_original;


		function consultar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from Seccion where nombre_Seccion='".$this->nombre_Seccion."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){
						$_SESSION["nombre_Seccion"]=$this->nombre_Seccion;						
						echo "<script> alert('Seccion no encontrado')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vSeccion.php'>";
								}

					else{
								
				while($row=pg_fetch_array($resultados)){	
				$_SESSION["nombre_Seccion"]=$row["nombre_Seccion"];
																		}
				echo "<script> alert('Seccion encontrado')</script>";
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vSeccion.php'>";
																	
											  				
	
						}


									


		}//FIN CONSULTAR***********************************************************************



		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from Seccion where nombre_Seccion='".$this->nombre_Seccion."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

					$sqlConsultar2="select * from seccion where codigo_seccion='".$this->codigo_Seccion."'";
					$resultados2=pg_query($cnx->conx ,$sqlConsultar2);
					$num2=pg_num_rows($resultados2);

					if($num2==0){



						$sqlRegistrar="insert into seccion (nombre_seccion, id_entidad_propietaria, codigo_seccion) values ('$this->nombre_Seccion','$this->id_entidad','$this->codigo_Seccion')";	
						new temporal();	
						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";


						}

						else{

							echo "<script>alert('Registro Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";


						}	

							}

						else{

							echo "<script>alert('Codigo de Seccion ya registrado')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";
							
						}
						

						}else{

							echo "<script>alert('Seccion ya registrado')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";


							}

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_Seccion from Seccion where nombre_Seccion='".$this->nombre_Seccion_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);


$sqlConsultar2="select * from seccion where nombre_seccion='".$this->nombre_Seccion."' AND id_entidad_propietaria='".$this->id_entidad."' AND codigo_seccion='".$this->codigo_Seccion."' ";
$resultados2=pg_query($cnx->conx ,$sqlConsultar2);


				$num=pg_num_rows($resultados2);
				if($num==0){

while($row=pg_fetch_array($resultados)){

$this->id_Seccion=$row["id_seccion"];

}


$sqlModificar="update seccion set nombre_seccion='$this->nombre_Seccion', id_entidad_propietaria='$this->id_entidad', codigo_seccion='$this->codigo_Seccion' where id_seccion='$this->id_Seccion'";
new temporal();	
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";

}

}else {

	echo "<script>alert('No se puede modificar la Seccion ya registrado')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";
}
} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_Seccion from Seccion where nombre_Seccion='".$this->nombre_Seccion_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$this->id_Seccion=$row["id_seccion"];

}


$sqlEliminar="delete from seccion where id_seccion='$this->id_Seccion'";
new temporal();	
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSeccion.php'>";


}



} //Fin Eliminar();

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from Seccion";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Seccions Registrados</th><th>Código</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre_seccion"];
							$idEntidad=$row["id_entidad_propietaria"];
							$id="nombreSeccion".$contador;
							$idCampoEntidad="nombreEntidad".$contador;

							$codigo=$row["codigo_seccion"];
							$id2="codigoSeccion".$contador;

						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre.'<input type="hidden" id='.$id.' value=\''.$idEntidad.'\'><input type="hidden" id='.$idCampoEntidad.' value=\''.$nombre.'\'></td><td>'.$codigo.'<input type="hidden" id='.$id2.' value=\''.$codigo.'\'</td></tr>';
						$contador++;
						$contador1++;
						}	
					}		




}			
function llenarSelectEntidad(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from entidad_propietaria";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value=Seleccione>Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_entidad_propietaria"];
							$id=$row["id_entidad_propietaria"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}
function llenarSelectEntidad2(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from entidad_propietaria";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_entidad_propietaria"];
							$id=$row["id_entidad_propietaria"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}			





	}