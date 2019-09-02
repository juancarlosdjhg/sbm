<html><head><link href='../V/css/alertify.css' rel='stylesheet' type='text/css' media='all'/>
<link href='../V/css/alertify.min.css' rel='stylesheet' type='text/css' media='all'/>
<link href='../V/css/alertify.rtl.css' rel='stylesheet' type='text/css' media='all'/>
<link href='../V/css/alertify.rtl.min.css' rel='stylesheet' type='text/css' media='all'/>
<script type='text/javascript' src='../V/js/alertify.js'></script>
<script type='text/javascript' src='../V/js/alertify.min.js'></script></head>
<?php 

include("mConexion.php");
include("temporal.php");

class cargo{

		public $id_cargo;
		public $nombre_cargo;
		public $nombre_original;


		function consultar(){
		$cnx = new conexion();
		$cnx->conectar();


		$sqlConsultar="select * from cargo where nombre_cargo='".$this->nombre_cargo."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){
						$_SESSION["nombre_cargo"]=$this->nombre_cargo;						
						echo "<script> alert('cargo no encontrado')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vCargo.php'>";
								}

					else{
								
				while($row=pg_fetch_array($resultados)){	
				$_SESSION["nombre_cargo"]=$row["nombre_cargo"];
																		}
				echo "<script> alert('cargo encontrado')</script>";
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vCargo.php'>";
																	
											  				
	
						}


									


		}//FIN CONSULTAR***********************************************************************



		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from cargo where nombre_cargo='".$this->nombre_cargo."'";
		new temporal();	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into cargo (nombre_cargo) values ('$this->nombre_cargo')";	
						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";


						}
						else{
							
							
							echo "<script>alert('Registro Exitoso');</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";


						}	


							}else{

							echo "<script>alert('Cargo ya registrado')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";


							}

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_cargo from cargo where nombre_cargo='".$this->nombre_cargo_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);



$sqlConsultar2="select * from cargo where nombre_cargo='".$this->nombre_cargo."'";
$resultados2=pg_query($cnx->conx ,$sqlConsultar2);


				$num=pg_num_rows($resultados2);
				if($num==0){

while($row=pg_fetch_array($resultados)){

$this->id_cargo=$row["id_cargo"];

}


$sqlModificar="update cargo set nombre_cargo='$this->nombre_cargo' where id_cargo='$this->id_cargo'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";

}
}else{

	echo "<script>alert('No se puede modificar cargo ya registrado')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";

}


} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_cargo from cargo where nombre_cargo='".$this->nombre_cargo_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$this->id_cargo=$row["id_cargo"];

}


$sqlEliminar="delete from cargo where id_cargo='$this->id_cargo'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vCargo.php'>";


}



} //Fin Eliminar();

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from cargo";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Cargos Registrados</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre_cargo"];
							$id="nombreCargo".$contador;
						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre.'<input type="hidden" id='.$id.' value=\''.$nombre.'\'></td></tr>';
						$contador++;
						$contador1++;
						}	
					}		




}			





	}