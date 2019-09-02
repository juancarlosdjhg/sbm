<?php 

include("mConexion.php");
include("temporal.php");

class SubCategoriaEspecifica{

		public $id_SubCategoriaEspecifica;
		public $id_subgrupo2S;
		public $nombre_SubCategoriaEspecifica;
		public $nombre_SubCategoriaEspecifica_original;
		public $codigo_SubCategoriaEspecifica;
		public $codigo_SubCategoriaEspecifica_original;


		/*function consultar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from sub_categoria_especifica where nombre_sub_categoria_especifica='".$this->nombre_subgrupo."'";	
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


									


		}*///FIN CONSULTAR***********************************************************************



		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from sub_categoria_especifica where nombre_sub_categoria_especifica='".$this->nombre_SubCategoriaEspecifica."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into sub_categoria_especifica (nombre_sub_categoria_especifica, id_subgrupo, codigo_sub_categoria_especifica) values ('$this->nombre_SubCategoriaEspecifica','$this->id_subgrupo','$this->codigo_SubCategoriaEspecifica' )";	
						new temporal();	
						$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vSubCategoriaEspecifica.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vSubCategoriaEspecifica.php'>";


						}	


							}else{

							echo "<script>alert('Subgrupo ya registrado')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vSubCategoriaEspecifica.php'>";


							}

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_sub_categoria_especifica from sub_categoria_especifica where nombre_sub_categoria_especifica='".$this->nombre_SubCategoriaEspecifica_original."'";


//new temporal();	
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$this->id_SubCategoriaEspecifica=$row["id_sub_categoria_especifica"];

}


$sqlModificar="update sub_categoria_especifica set nombre_sub_categoria_especifica='$this->nombre_SubCategoriaEspecifica', id_subgrupo='$this->id_subgrupo2', codigo_sub_categoria_especifica='$this->codigo_SubCategoriaEspecifica' where id_sub_categoria_especifica='$this->id_SubCategoriaEspecifica'";
new temporal();

$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSubCategoriaEspecifica.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSubCategoriaEspecifica.php'>";

}

} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultar="select id_sub_categoria_especifica from sub_categoria_especifica where nombre_sub_categoria_especifica='".$this->nombre_SubCategoriaEspecifica_original."'";


//new temporal();	
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$this->id_SubCategoriaEspecifica=$row["id_sub_categoria_especifica"];

}


$sqlEliminar="delete from sub_categoria_especifica where id_sub_categoria_especifica='$this->id_SubCategoriaEspecifica'";
new temporal();	
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSubCategoriaEspecifica.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vSubCategoriaEspecifica.php'>";


}



} //Fin Eliminar();

function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from sub_categoria_especifica";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Subcategoría Específica</th><th>Código</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre_sub_categoria_especifica"];
							$idGrupo=$row["id_subgrupo"];
							$id="nombreSubCategoriaEspecifica".$contador;
							$idCampoSubGrupo="nombreSubGrupo".$contador;

							$codigo=$row["codigo_sub_categoria_especifica"];
							$id2="codigoSubCategoriaEspecifica".$contador;


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$nombre.'<input type="hidden" id='.$id.' value=\''.$nombre.'\'><input type="hidden" id='.$idCampoSubGrupo.' value=\''.$idGrupo.'\'></td><td>'.$codigo.'<input type="hidden" id='.$id2.' value=\''.$codigo.'\'</td></tr>';
						$contador++;
						$contador1++;
						}	
					}		




}			
function llenarSelectSubGrupo(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from subgrupo";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value=Seleccione>Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_subgrupo"];
							$id=$row["id_subgrupo"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}
function llenarSelectSubGrupo2(){
		$cnx = new conexion();
		$cnx->conectar();

		echo "<option value=''>Seleccione</option>";
		$sqlConsultar="select * from subgrupo";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_subgrupo"];
							$id=$row["id_subgrupo"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}			





	}