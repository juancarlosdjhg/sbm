<?php 

include("mConexion.php");
include("temporal.php");

class grupo{

		public $id_grupo;
		public $nombre_grupo;
		public $nombre_original;
		public $codigo_grupo;
		public $codigo_original;


		function consultar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from grupo where nombre_grupo='".$this->nombre_grupo."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){
						$_SESSION["nombre_grupo"]=$this->nombre_grupo;						
						echo "<script> alert('grupo no encontrado')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vGrupo.php'>";
								}

					else{
								
				while($row=pg_fetch_array($resultados)){	
				$_SESSION["nombre_grupo"]=$row["nombre_grupo"];
																		}
				echo "<script> alert('grupo encontrado')</script>";
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vGrupo.php'>";
																	
											  				
	
						}


									


		}//FIN CONSULTAR***********************************************************************



		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from grupo where nombre_grupo='".$this->nombre_grupo."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

					$sqlConsultar2="select * from grupo where codigo_grupo='".$this->codigo_grupo."'";
					$resultados2=pg_query($cnx->conx ,$sqlConsultar2);
					$num2=pg_num_rows($resultados2);

					if($num2==0){

						$sqlRegistrar="insert into grupo (nombre_grupo, codigo_grupo) values ('$this->nombre_grupo','$this->codigo_grupo')";	
						new temporal();	
						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";


						}
							}

						else{

							echo "<script>alert('Codigo de Categoria ya registrado')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";
							
						}	


							}else{

							echo "<script>alert('Categoria ya registrada')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";


							}

									} //Fin Registrar();


//************************************************************************************************************

function modificar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select * from grupo where nombre_grupo='".$this->nombre_grupo_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);

while($row=pg_fetch_array($resultados)){

$this->id_grupo=$row["id_grupo"];
$codigo_grupo_actual=$row["codigo_grupo"];

}

$sqlConsultar2="select * from grupo where nombre_grupo='".$this->nombre_grupo."'";
$resultados2=pg_query($cnx->conx ,$sqlConsultar2);


				$num=pg_num_rows($resultados2);
				if($num==1){
					if($this->nombre_grupo==$this->nombre_grupo_original){
						$num=0;
					}
				}
				if($num==0){


$sqlConsultar3="select * from grupo where codigo_grupo='".$this->codigo_grupo."'";
$resultados3=pg_query($cnx->conx ,$sqlConsultar3);



				$num2=pg_num_rows($resultados3);
				if($num2==1){

while($row3=pg_fetch_array($resultados3)){
$codigo_grupo_registrado=$row3["codigo_grupo"];
}

if($codigo_grupo_actual==$codigo_grupo_registrado){
	$num2=0;
}

				}
				if($num2==0){


$sqlModificar="update grupo set nombre_grupo='$this->nombre_grupo', codigo_grupo='$this->codigo_grupo' where id_grupo='$this->id_grupo'";
new temporal();
$resultados4=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados4){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";

}

}else {

	echo "<script>alert('No se puede modificar, codigo ya registrado')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";

}
}else {

	echo "<script>alert('No se puede modificar, Categoria ya registrada')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";

}

} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_grupo from grupo where nombre_grupo='".$this->nombre_grupo_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$this->id_grupo=$row["id_grupo"];

}


$sqlEliminar="delete from grupo where id_grupo='$this->id_grupo'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vGrupo.php'>";


}



} //Fin Eliminar();

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from grupo ORDER BY nombre_grupo";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Categorías Registradas</th><th>Código</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre_grupo"];
							$id="nombreGrupo".$contador;
							$codigo=$row["codigo_grupo"];
							$id2="codigoGrupo".$contador;

						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre.'<input type="hidden" id='.$id.' value=\''.$nombre.'\'></td><td>'.$codigo.'<input type="hidden" id='.$id2.' value=\''.$codigo.'\'</td></tr>'	;
						$contador++;
						$contador1++;
						}	
					}		




}			





	}