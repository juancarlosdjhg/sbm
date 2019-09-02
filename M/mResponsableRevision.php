<?php 

include("mConexion.php");
include("temporal.php");

class responsable{

		public $id_concepto;
		public $id_responsable;
		public $id_tipo;
		public $nombre_concepto;
		public $nombre_original;




		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from responsable_revision where id_responsable='".$this->id_responsable."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into responsable_revision (id_responsable, id_departamento) values ('$this->id_responsable','$this->id_departamento')";	
						new temporal();
						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vResponsableRevision.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vResponsableRevision.php'>";


						}	


							}else{

							echo "<script>alert('Responsable ya registrado')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vResponsableRevision.php'>";


							}

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();



$sqlModificar="update responsable_revision set id_departamento='$this->id_departamento' where id_responsable='$this->id_responsable'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vResponsableRevision.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vResponsableRevision.php'>";

}
}
 //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();



$sqlEliminar="delete from responsable_revision where id_responsable='$this->id_responsable'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vResponsableRevision.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vResponsableRevision.php'>";


}



} //Fin Eliminar();

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from responsable_revision as rr JOIN responsable as r on CAST(rr.id_responsable AS INT)=r.id_responsable JOIN datos_personales as dp on r.id_datos_personales=dp.id_datos_personales JOIN entidad_propietaria as ep on CAST(rr.id_departamento AS INT)=ep.id_entidad_propietaria order by rr.id_responsable";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Responsables Registrados</th><th>Departamento Responsable</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre_responsable=$row["nombre"];
							$apellido_responsable=$row["apellido"];
							$nombre_departamento=$row["nombre_entidad_propietaria"];
							$id_responsable=$row["id_responsable"];
							$id_entidad_propietaria=$row["id_entidad_propietaria"];

							$idCampoResponsable="nombreResponsable".$contador;							
							$idCampoDepartamento="nombreDepartamento".$contador;
		

						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre_responsable.' '.$apellido_responsable.'</td><td>'.$nombre_departamento.'<input type="hidden" id='.$idCampoResponsable.' value=\''.$id_responsable.'\'><input type="hidden" id='.$idCampoDepartamento.' value=\''.$id_entidad_propietaria.'\'></td></tr>';
						$contador++;
						$contador1++;
						}	
					}		




}			


function llenarSelectDepartamento(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from entidad_propietaria";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value="">Seleccione</option>';
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

function llenarSelectResponsables(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from responsable as r JOIN datos_personales as dp on r.id_datos_personales=dp.id_datos_personales";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value="">Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre"];
							$id=$row["id_responsable"];
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