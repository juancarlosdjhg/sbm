<?php 

include("mConexion.php");
include("temporal.php");

class revision{

		public $id_bien;
		public $descripcion_bien;
		public $conclusion_bien;
		public $id_responsable_revision;
		


function aprobar(){
$cnx = new conexion();
$cnx->conectar();



$sqlModificar="update bien set id_concepto='6' where id_bien='$this->id_bien'";
$sqlModificar2="update datos_bien set descripcion_bien_revisado='$this->descripcion_bien', conclusion_bien_revisado='$this->conclusion_bien', id_responsable_revision='$this->id_responsable_revision' where id_bien='$this->id_bien'";


new temporal();
$resultados=pg_query($cnx->conx ,$sqlModificar);
$resultados2=pg_query($cnx->conx ,$sqlModificar2);



if(!$resultados || !$resultados2){

echo "<script>alert('Ha ocurrido un error al aprobar el bien')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vListadoBienesPendientes.php'>";

}
else{

echo "<script>alert('Bien Aprobado')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vListadoBienesPendientes.php'>";

}

} //Fin Aprobar();

function rechazar(){
$cnx = new conexion();
$cnx->conectar();



$sqlModificar="update bien set id_concepto='12' where id_bien='$this->id_bien'";
$sqlModificar2="update datos_bien set descripcion_bien_revisado='$this->descripcion_bien', set conclusion_bien_revisado='$this->conclusion_bien', id_responsable_revision='$this->id_responsable_revision' where id_bien='$this->id_bien'";


new temporal();
$resultados=pg_query($cnx->conx ,$sqlModificar);
$resultados2=pg_query($cnx->conx ,$sqlModificar2);

if(!$resultados || !$resultados2){

echo "<script>alert('Ha ocurrido un error al rechazar el bien')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vListadoBienesPendientes.php'>";

}
else{

echo "<script>alert('Bien Rechazado')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vListadoBienesPendientes.php'>";

}

} //Fin Rechazar();


function llenarSelectDepartamento(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select DISTINCT id_entidad_propietaria, nombre_entidad_propietaria from responsable_revision as rr JOIN entidad_propietaria as ep on CAST(rr.id_departamento AS INT)=ep.id_entidad_propietaria";	
		
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

					echo '<option value="">Seleccione</option>';

		while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_entidad_propietaria"];
							$id=$row["id_entidad_propietaria"];


					$num=pg_num_rows($resultados);
					if($num!=0){						

						
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
							
					}		

			}






}		




	}