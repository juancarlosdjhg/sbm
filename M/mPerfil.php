<?php 

include("../M/mConexion.php");

class perfil{

		public $perfil_usuario;

		public $gestionar_responsable;
		public $gestionar_usuario;
		public $gestionar_departamento;
		public $gestionar_seccion;
		public $gestionar_cargo;
		public $gestionar_grupo;
		public $gestionar_subgrupo;
		public $gestionar_concepto;
		public $gestionar_bd;

		function unsets1(){					

			unset($_SESSION["gestionar_responsable"]);	
			unset($_SESSION["gestionar_usuario"]);	
			unset($_SESSION["gestionar_departamento"]);	
			unset($_SESSION["gestionar_seccion"]);	
			unset($_SESSION["gestionar_cargo"]);	
			unset($_SESSION["gestionar_grupo"]);	
			unset($_SESSION["gestionar_subgrupo"]);	
			unset($_SESSION["gestionar_concepto"]);	
			unset($_SESSION["gestionar_bd"]);	
			echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vUsuario.php'>";
			}
		function unsets2(){
			unset($_SESSION["perfil_usuario"]);			
			$this->unsets1();

		}

		function validarSesiones(){
if(!isset($_SESSION['perfil_usuario'])){

	$_SESSION['perfil_usuario']=NULL;
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
		}


		function consultar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from usuario where usuario='".$this->perfil_usuario."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
		

					$num=pg_num_rows($resultados);
					if($num==0){
						$_SESSION["perfil_usuario"]=$this->perfil_usuario;
						echo "<script> alert('Perfil de Usuario no encontrado')</script>";
						$this->unsets1();
								}

					else{
								
				while($row=pg_fetch_array($resultados)){	
				$_SESSION["nombre_usuario"]=$row["usuario"];
				$_SESSION["contrasenia"]=$row["contrasena"];
				$_SESSION["contrasenia2"]=$row["contrasena"];	
				$id_usuario=$row["id_usuario"];	

														}																

				$sqlConsultar2="select * from usuario_funciones_sistema where id_usuario='".$id_usuario."'";	
				$resultados2=pg_query($cnx->conx ,$sqlConsultar2); 

				while($row2=pg_fetch_array($resultados2)){

				$_SESSION["gestionar_responsable"]=$row["gestionar_responsable"];
				$_SESSION["gestionar_usuario"]=$row["gestionar_usuario"];
				$_SESSION["gestionar_departamento"]=$row["gestionar_departamento"];
				$_SESSION["gestionar_seccion"]=$row["gestionar_seccion"];
				$_SESSION["gestionar_cargo"]=$row["gestionar_cargo"];
				$_SESSION["gestionar_grupo"]=$row["gestionar_grupo"];
				$_SESSION["gestionar_subgrupo"]=$row["gestionar_subgrupo"];
				$_SESSION["gestionar_concepto"]=$row["gestionar_concepto"];
				$_SESSION["gestionar_bd"]=$row["gestionar_bd"];

														}



				echo "<script>   alert('Usuario Encontrado');</script>";
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vUsuario.php'>";
																	
											  				
	
						}


									


		}//FIN CONSULTAR***********************************************************************



		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from perfil_usuario where nombre_perfil_usuario='".$this->perfil_usuario."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into perfil_usuario (nombre_perfil_usuario) values ('$this->perfil_usuario')";	
						$resultados=pg_query($cnx->conx ,$sqlRegistrar);

						$sqlConsultar3="select * from perfil_usuario where nombre_perfil_usuario='".$this->perfil_usuario."'";
								$resultados3=pg_query($cnx->conx ,$sqlConsultar3);
									while($row=pg_fetch_array($resultados3)){
										$id_perfil=$row["id_perfil_usuario"];



						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vUsuario.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";
							$this->unsets2();


						}	


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

}


$sqlModificar="update usuario set usuario='$this->nombre_usuario', contrasena='$this->contrasenia'";
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

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

}


$sqlEliminar="delete from usuario where usuario='$nombre_usuario'";
$resultados=pg_query($cnx->conx ,$sqlEliminar) ;

if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vUsuario.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
$this->unsets2();


}



} //Fin Eliminar();

			





	}