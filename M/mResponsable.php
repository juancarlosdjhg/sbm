<?php 

include("../M/mConexion.php");

class responsable{
		
		public $cedula_del_responsable;
		public $nombre_del_responsable;
		public $apellido_del_responsable;
		public $sexo_del_responsable;
		public $telefono_del_responsable;
		public $cargo_del_responsable;
		public $id_responsable;
		public $tipo_del_responsable;
		public $dependencia_administrativa;
		public $resolucion;
		public $fecha_resolucion;
		public $decreto;
		public $fecha_decreto;


		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from datos_personales where cedula='".$this->cedula_del_responsable."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into datos_personales (cedula,nombre,apellido,sexo,telefono,id_cargo) values ('$this->cedula_del_responsable','$this->nombre_del_responsable','$this->apellido_del_responsable','$this->sexo_del_responsable', '$this->telefono_del_responsable', '$this->cargo_del_responsable')";

						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						$sqlRegistrar2="select max(id_datos_personales) from datos_personales";
						$resultados2=pg_query($cnx->conx ,$sqlRegistrar2);
						while($row2=pg_fetch_array($resultados2)){
						$id_datos_personales=$row2[0];

						}

						$sqlRegistrar3="insert into responsable (id_datos_personales, tipo_responsable,id_entidad_propietaria,resolucion,fecha_resolucion,decreto,fecha_decreto) values ('$id_datos_personales', '$this->tipo_del_responsable', '$this->dependencia_administrativa', '$this->resolucion', '$this->fecha_resolucion', '$this->decreto', '$this->fecha_decreto')";
						$resultados3=pg_query($cnx->conx ,$sqlRegistrar3);



						if(!$resultados || !$resultados3){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vResponsable.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vResponsable.php'>";							


						}	


							}
					else{
							echo "<script>alert('Cedula ya registrada')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vResponsable.php'>";



					}
									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

$sqlIdDatosPersonales="SELECT id_datos_personales FROM responsable WHERE id_responsable='".$this->id_responsable."'";

$res=pg_query($cnx->conx, $sqlIdDatosPersonales);
	while($row=pg_fetch_array($res)){
		$id_datos_personales=$row['id_datos_personales'];

	}

$sqlModificar="update datos_personales set nombre='$this->nombre_del_responsable', apellido='$this->apellido_del_responsable', cedula='$this->cedula_del_responsable', sexo='$this->sexo_del_responsable', telefono='$this->telefono_del_responsable', id_cargo='$this->cargo_del_responsable' WHERE id_datos_personales='".$id_datos_personales."'";

$sqlModificar2="update responsable set tipo_responsable='$this->tipo_del_responsable', id_entidad_propietaria='$this->dependencia_administrativa', resolucion='$this->resolucion', fecha_resolucion='$this->fecha_resolucion', decreto='$this->decreto', fecha_decreto='$this->fecha_decreto' WHERE id_datos_personales='".$id_datos_personales."'";


$resultados=pg_query($cnx->conx ,$sqlModificar) ;
$resultados2=pg_query($cnx->conx ,$sqlModificar2) ;

if(!$resultados || !$resultados2){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vResponsable.php'>";


}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vResponsable.php'>";
}



} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlEliminar="delete from responsable where id_responsable='".$this->id_responsable."'";

$resultados=pg_query($cnx->conx ,$sqlEliminar);


if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vResponsable.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vResponsable.php'>";


}



} //Fin Eliminar();

			



function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from responsable as r JOIN datos_personales as dp on r.id_datos_personales=dp.id_datos_personales";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Responsables Registrados</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre"];
							$idEntidad=$row["id_entidad_propietaria"];
							$id="nombreSeccion".$contador;
							$idCampoEntidad="nombreEntidad".$contador;

							$codigo=$row["codigo_seccion"];
							$id2="codigoSeccion".$contador;

						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre.'</td></tr>';
						$contador++;
						$contador1++;
						}	
					}		




}			


	}