<?php 

include("mConexion.php");
include("temporal.php");

class subgrupo{

		public $id_subgrupo;
		public $id_grupo;
		public $nombre_subgrupo;
		public $nombre_original;
		public $codigo_subgrupo;
		public $codigo_subgrupo_original;


		function consultar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from subgrupo where nombre_subgrupo='".$this->nombre_subgrupo."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){
						$_SESSION["nombre_subgrupo"]=$this->nombre_subgrupo;						
						echo "<script> alert('subgrupo no encontrado')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vSubgrupo.php'>";
								}

					else{
								
				while($row=pg_fetch_array($resultados)){	
				$_SESSION["nombre_subgrupo"]=$row["nombre_subgrupo"];
																		}
				echo "<script> alert('subgrupo encontrado')</script>";
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vSubgrupo.php'>";
																	
											  				
	
						}


									


		}//FIN CONSULTAR***********************************************************************



		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from subgrupo where nombre_subgrupo='".$this->nombre_subgrupo."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into subgrupo (nombre_subgrupo, id_grupo, codigo_subgrupo) values ('$this->nombre_subgrupo','$this->id_grupo','$this->codigo_subgrupo' )";	
						new temporal();	
						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vSubgrupo.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vSubgrupo.php'>";


						}	


							}else{

							echo "<script>alert('SubCategoria ya registrada')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vSubgrupo.php'>";


							}

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_subgrupo from subgrupo where nombre_subgrupo='".$this->nombre_subgrupo_original."'";
$resultados=pg_query($cnx->conx ,$sqlConsultar);	

$sqlConsultar2="select * from subgrupo where nombre_subgrupo='".$this->nombre_subgrupo."' AND id_grupo='".$this->id_grupo."' AND codigo_subgrupo='".$this->codigo_subgrupo."'";

$resultados2=pg_query($cnx->conx ,$sqlConsultar2);


				$num=pg_num_rows($resultados2);
				if($num==0){

while($row=pg_fetch_array($resultados)){

$this->id_subgrupo=$row["id_subgrupo"];

}


$sqlModificar="update subgrupo set nombre_subgrupo='$this->nombre_subgrupo', id_grupo='$this->id_grupo', codigo_subgrupo='$this->codigo_subgrupo' where id_subgrupo='$this->id_subgrupo'";
new temporal();	
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSubgrupo.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSubgrupo.php'>";

}

}else {

	echo "<script>alert('No se puede modificar la SubCategoría ya registrado')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../V/vSubgrupo.php'>";
}
} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_subgrupo from subgrupo where nombre_subgrupo='".$this->nombre_subgrupo_original."'";
new temporal();	
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$this->id_subgrupo=$row["id_subgrupo"];

}


$sqlEliminar="delete from subgrupo where id_subgrupo='$this->id_subgrupo'";
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSubgrupo.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSubgrupo.php'>";


}



} //Fin Eliminar();

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from subgrupo";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>SubCategorías Registradas</th><th>Código</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre_subgrupo"];
							$idGrupo=$row["id_grupo"];
							$id="nombreSubgrupo".$contador;
							$idCampoGrupo="nombreGrupo".$contador;

							$codigo=$row["codigo_subgrupo"];
							$id2="codigoSubGrupo".$contador;


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre.'<input type="hidden" id='.$id.' value=\''.$idGrupo.'\'><input type="hidden" id='.$idCampoGrupo.' value=\''.$nombre.'\'></td><td>'.$codigo.'<input type="hidden" id='.$id2.' value=\''.$codigo.'\'</td></tr>';
						$contador++;
						$contador1++;
						}	
					}		




}			
function llenarSelectGrupo(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from grupo";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value=Seleccione>Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_grupo"];
							$id=$row["id_grupo"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}
function llenarSelectGrupo2(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from grupo";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_grupo"];
							$id=$row["id_grupo"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}			





	}