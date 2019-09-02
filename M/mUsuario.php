<?php 

include("../M/mConexion.php");

class usuario{

		public $nombre_usuario;
		public $contrasenia;
		public $contrasenia2;
		public $permiso;




		public $gestionar_responsable;
		public $gestionar_usuario;
		public $gestionar_departamento;
		public $gestionar_seccion;
		public $gestionar_cargo;
		public $gestionar_grupo;
		public $gestionar_subgrupo;
		public $gestionar_concepto;
		public $gestionar_bd;
		public $gestionar_subcategoriae;
		public $gestionar_proveedores;
		public $gestionar_percepcion;
		public $bm1;
		public $bm2;
		public $bm3;
		public $bm4;
		public $reportes;

		function unsets1(){					
			unset($_SESSION["contrasenia"]);	
			unset($_SESSION["contrasenia2"]);	
			echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vUsuario.php'>";
			}
		function unsets2(){
			unset($_SESSION["nombre_usuario"]);			
			unset($_SESSION["permisos"]);			
			$this->unsets1();

		}

		function validarSesiones(){
if(!isset($_SESSION['nombre_usuario'])){

	$_SESSION['nombre_usuario']=NULL;
}

if(!isset($_SESSION['contrasenia'])){

	$_SESSION['contrasenia']=NULL;
}

if(!isset($_SESSION['contrasenia2'])){

	$_SESSION['contrasenia2']=NULL;
}
if(!isset($_SESSION['gestionar_responsable'])){

	$_SESSION['gestionar_responsable']=NULL;
}
if(!isset($_SESSION['gestionar_usuario'])){

	$_SESSION['gestionar_usuario']=NULL;
}
if(!isset($_SESSION['gestionar_departamento'])){

	$_SESSION['gestionar_departamento']=NULL;
}
if(!isset($_SESSION['gestionar_seccion'])){

	$_SESSION['gestionar_seccion']=NULL;
}
if(!isset($_SESSION['gestionar_cargo'])){

	$_SESSION['gestionar_cargo']=NULL;
}
if(!isset($_SESSION['gestionar_grupo'])){

	$_SESSION['gestionar_grupo']=NULL;
}
if(!isset($_SESSION['gestionar_subgrupo'])){

	$_SESSION['gestionar_subgrupo']=NULL;
}
if(!isset($_SESSION['gestionar_concepto'])){

	$_SESSION['gestionar_concepto']=NULL;
}
if(!isset($_SESSION['gestionar_bd'])){

	$_SESSION['gestionar_bd']=NULL;
}
if(!isset($_SESSION['gestionar_subcategoriae'])){

	$_SESSION['gestionar_subcategoriae']=NULL;
}
if(!isset($_SESSION['gestionar_proveedores'])){

	$_SESSION['gestionar_proveedores']=NULL;
}
if(!isset($_SESSION['gestionar_percepcion'])){

	$_SESSION['gestionar_percepcion']=NULL;
}
if(!isset($_SESSION['bm1'])){

	$_SESSION['bm1']=NULL;
}
if(!isset($_SESSION['bm2'])){

	$_SESSION['bm2']=NULL;
}
if(!isset($_SESSION['bm3'])){

	$_SESSION['bm3']=NULL;
}
if(!isset($_SESSION['bm4'])){

	$_SESSION['bm4']=NULL;
}
if(!isset($_SESSION['reportes'])){

	$_SESSION['reportes']=NULL;
}
		}


		function consultar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from usuario where usuario='".$this->nombre_usuario."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){
						$_SESSION["nombre_usuario"]=$this->nombre_usuario;
						echo "<script> alert('Usuario no encontrado')</script>";
						$this->unsets1();
								}

					else{
													
				while($row=pg_fetch_assoc($resultados)){					
				$_SESSION["nombre_usuario"]=$row["usuario"];
				$_SESSION["contrasenia"]=$row["contrasena"];
				$_SESSION["contrasenia2"]=$row["contrasena"];	
				$id_usuario=$row["id_usuario"];
				
				$sqlConsultar2="select * from usuario_funcion_sistema where id_usuario='".$id_usuario."'";			

				$resultados2=pg_query($cnx->conx ,$sqlConsultar2);

					
					$contador=0;
					$array=array();
				while($row2=pg_fetch_array($resultados2)){

					$array[$contador]=$row2;
					$contador++;
					//echo "<script> alert('".$_SESSION["permisos"][0]."')</script>";					
			

				}
					$_SESSION["permisos"]=$array;

					
				
														}				


				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vUsuario.php'>";
																	
											  				
	
						}


									


		}//FIN CONSULTAR***********************************************************************



		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		if($this->contrasenia == $this->contrasenia2){


		$sqlConsultar="select * from usuario where usuario='".$this->nombre_usuario."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into usuario (usuario,contrasena) values ('$this->nombre_usuario', '$this->contrasenia')";	
						$resultados=pg_query($cnx->conx ,$sqlRegistrar);

						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0'; url='../V/vUsuario.php'>";

						}

						else{
							$sqlConsultar2="select MAX(id_usuario) as ultimo from usuario";
							$resultados2=pg_query($cnx->conx ,$sqlConsultar2);
							while($row=pg_fetch_assoc($resultados2)){
							$id_usuario_max=$row['ultimo'];								
							}

							$fallas=0;
						foreach ($this->permiso as $per) {
							$sqlRegistrar2="INSERT INTO usuario_funcion_sistema (id_usuario, id_funcion_sistema) VALUES ('".$id_usuario_max."', '".$per."')";
							$resultados2=pg_query($cnx->conx ,$sqlRegistrar2);
							if(!$resultados2){
								$fallas++;
							}	
						
						}

							if($fallas>0){
								echo "<script>alert('Error en ".$fallas." registros')</script>";

							}else{
							echo "<script>alert('Registro Exitoso')</script>";							
							}
							$this->unsets2();


						}	


							}}
						else{

							echo "<script>alert('Las contrasenas no coinciden')</script>";
							echo "<meta http-equiv='refresh' content='0'; url='../V/vUsuario.php'>";

						}
									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

					if($this->contrasenia == $this->contrasenia2){

$sqlConsultar="select * from usuario where usuario='".$this->nombre_usuario."'";	
$resultados=pg_query($cnx->conx ,$sqlConsultar);
while($row=pg_fetch_array($resultados)){

$nombre_usuario=$row["usuario"];
$id_usuario=$row["id_usuario"];

}


$sqlModificar="update usuario set usuario='$this->nombre_usuario', contrasena='$this->contrasenia' WHERE id_usuario='$id_usuario'";
$resultados4=pg_query($cnx->conx ,$sqlModificar) ;

$sqlEliminar="DELETE FROM usuario_funcion_sistema WHERE id_usuario='".$id_usuario."'";
$resultados2=pg_query($cnx->conx ,$sqlEliminar) ;


						foreach ($this->permiso as $per) {
							$sqlRegistrar2="INSERT INTO usuario_funcion_sistema (id_usuario, id_funcion_sistema) VALUES ('".$id_usuario."', '".$per."')";
							$resultados3=pg_query($cnx->conx ,$sqlRegistrar2);
							}



if(!$resultados4){

echo "<script>alert('Modificacion Fallida')</script>";
$this->unsets2();


}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
$this->unsets2();

}
}
						else{

							echo "<script>alert('Las contrasenas no coinciden')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vUsuario.php'>";

						}


} //Fin Modificar();

//************************************************************************************************************

function eliminar(){


$cnx = new conexion();
$cnx->conectar();

$sqlEliminar="select * from usuario where usuario='".$this->nombre_usuario."'";
$resultados=pg_query($cnx->conx ,$sqlEliminar);
while($row=pg_fetch_array($resultados)){

$nombre_usuario=$row["usuario"];
$id_usuario=$row["id_usuario"];

}


$sqlEliminar="delete from usuario where usuario='$nombre_usuario'";
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

$sqlEliminar2="delete from usuario_funcion_sistema where id_usuario='$id_usuario'";
$resultados2=pg_query($cnx->conx ,$sqlEliminar2) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vUsuario.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
$this->unsets2();


}



} //Fin Eliminar();


function llenarTablaFunciones(){
$cnx = new conexion();
$cnx->conectar();



	echo "<h2>Maestros</h2><br>";
	echo "<div class='overflow'>";
	echo "<table class='tablaResultados'>";
	$sqlMaestro="SELECT * FROM funciones_sistema WHERE tipo_funcion='maestro'";
	$resMaestro=pg_query($cnx->conx ,$sqlMaestro);
	echo "<tr>
			 <th>
			 	Función
			 </th>
			 <th>
			 	Permiso
			 </th>
		  </tr>";
	while($rowMaestro=pg_fetch_assoc($resMaestro)){
		echo "
			<tr>
				<td>
					";
					echo $rowMaestro["slug"];
		echo "					
				</td>
				<th>
				";
					echo "<input type='checkbox' name='permiso[]' value='".$rowMaestro["id_funcion_sistema"]."'>";

		echo "				
				</th>
			</tr>";

	}

	echo "</table>";			
	echo "</div>";			

	echo "<table class='tablaResultados'>";
	echo "<h2>Movimientos</h2><br>";

	$sqlMovimiento="SELECT * FROM funciones_sistema WHERE tipo_funcion='movimiento'";
	$resMovimiento=pg_query($cnx->conx ,$sqlMovimiento);
	echo "<tr>
			 <th>
			 	Función
			 </th>
			 <th>
			 	Permiso
			 </th>
		  </tr>";
	while($rowMovimiento=pg_fetch_assoc($resMovimiento)){
		echo "
			<tr>
				<td>
					";
					echo $rowMovimiento["slug"];
		echo "					
				</td>
				<th>
				";
					echo "<input type='checkbox' name='permiso[]' value='".$rowMovimiento["id_funcion_sistema"]."'>";

		echo "				
				</th>
			</tr>";
		
	}

	echo "</table>";

	echo "<table class='tablaResultados'>";
	echo "<h2>Reportes</h2><br>";

	$sqlReportes="SELECT * FROM funciones_sistema WHERE tipo_funcion='reporte'";
	$resReportes=pg_query($cnx->conx ,$sqlReportes);
	echo "<tr>
			 <th>
			 	Función
			 </th>
			 <th>
			 	Permiso
			 </th>
		  </tr>";
	while($rowReportes=pg_fetch_assoc($resReportes)){
		echo "
			<tr>
				<td>
					";
					echo $rowReportes["slug"];
				echo "					
				</td>
				<th>
				";
					echo "<input type='checkbox' name='permiso[]' value='".$rowReportes["id_funcion_sistema"]."'>";

		echo "				
				</th>
			</tr>";
		
	}

	echo "</table>";
}
	}