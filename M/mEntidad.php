<?php 

include("mConexion.php");

include("temporal.php");

echo " <html>
			<head>
				<link href='../V/css/alertify.css' rel='stylesheet' type='text/css' />
				<link href='../V/css/alertify.min.css' rel='stylesheet' type='text/css' />
				<link href='../V/css/alertify.rtl.css' rel='stylesheet' type='text/css' />
				<link href='../V/css/alertify.rtl.min.css' rel='stylesheet' type='text/css' />
				<script type='text/javascript' src='../V/js/alertify.js'></script>
				<script type='text/javascript' src='../V/js/alertify.min.js'></script>
			</head>
	   </html>";

class entidad{

		public $id_entidad;
		public $nombre_entidad;
		public $nombre_original;


		function consultar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from entidad_propietaria where nombre_entidad_propietaria='".$this->nombre_entidad."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){
						$_SESSION["nombre_entidad"]=$this->nombre_entidad;						
						echo "<script> alert('Entidad no encontrada')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vEntidad.php'>";
								}

					else{
								
				while($row=pg_fetch_array($resultados)){	
				$_SESSION["nombre_entidad"]=$row["nombre_entidad_propietaria"];
																		}
				echo "<script> alert('Entidad encontrada')</script>";
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vEntidad.php'>";
																	
											  				
	
						}


		}//FIN CONSULTAR***********************************************************************


	function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from entidad_propietaria where nombre_entidad_propietaria='".$this->nombre_entidad."'";	
		
		
		
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into entidad_propietaria (nombre_entidad_propietaria) values ('$this->nombre_entidad')";	
						new temporal();
						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vEntidad.php'>";


						}
						else{

							echo "<script>alertify
  .alert('This is an alert dialog.', function(){
    alertify.message('OK')
  });</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vEntidad.php'>";


						}	


							}else{

							echo "<script>alert('Entidad ya registrada')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";


							}

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_entidad_propietaria from entidad_propietaria where nombre_entidad_propietaria='".$this->nombre_entidad_original."'";

$resultados=pg_query($cnx->conx ,$sqlConsultar);

$sqlConsultar2="select * from entidad_propietaria where nombre_entidad_propietaria='".$this->nombre_entidad."'";
$resultados2=pg_query($cnx->conx ,$sqlConsultar2);


				$num=pg_num_rows($resultados2);
				if($num==0){

while($row=pg_fetch_array($resultados)){

$this->id_entidad=$row["id_entidad_propietaria"];

}


$sqlModificar="update entidad_propietaria set nombre_entidad_propietaria='$this->nombre_entidad' where id_entidad_propietaria='$this->id_entidad'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vEntidad.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vEntidad.php'>";

}


}else {

	echo "<script>alert('No se puede modificar entidad ya registrada')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../V/vEntidad.php'>";

}

} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_entidad_propietaria from entidad_propietaria where nombre_entidad_propietaria='".$this->nombre_entidad_original."'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$this->id_entidad=$row["id_entidad_propietaria"];

}


$sqlEliminar="delete from entidad_propietaria where id_entidad_propietaria='$this->id_entidad'";
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vEntidad.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vEntidad.php'>";


}



} //Fin Eliminar();

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from entidad_propietaria ORDER BY nombre_entidad_propietaria";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Entidades Registradas</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre_entidad_propietaria"];
							$id="nombreEntidad".$contador;
						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre.'<input type="hidden" id='.$id.' value=\''.$nombre.'\'></td></tr>';
						$contador++;
						$contador1++;
						}	
					}		




}			





	}