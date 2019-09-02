<?php 
session_start();
error_reporting(0);
$_SESSION['activa']=0;
include("../M/mConexion.php");

class login{
	public $user;
	public $password;
	public $capcha;

		function iniciar(){

				$cnx = new conexion();
				$cnx->conectar();

		if(isset($this->capcha)){
			if($this->capcha!=$_SESSION['security_number']) {
				echo "<script>alert('Capcha Incorrecto');window.location='../index.php';</script>";		
			

							$sqlLogin5="SELECT * FROM logintry";			
						$resultados5=pg_query($cnx->conx ,$sqlLogin5);
						while($row2=pg_fetch_assoc($resultados5)){
							$intento=$row2['intento'];
							if($intento==0 || $intento==1 || $intento==2){
							$intento2=$intento+1;
						}
						}


						$sqlLogin2="UPDATE logintry SET intento='".$intento2."' WHERE intento='".$intento."'";			
						$resultados2=pg_query($cnx->conx ,$sqlLogin2);


			return 0;}
		}


				$sqlLogin="SELECT * FROM usuario WHERE usuario='".$this->user."' AND contrasena='".$this->password."'";			
				$resultados=pg_query($cnx->conx ,$sqlLogin);
				if($resultados!=FALSE){

					$num=pg_num_rows($resultados);
					if($num==0){
							
							$sqlLogin5="SELECT * FROM logintry";			
						$resultados5=pg_query($cnx->conx ,$sqlLogin5);
						while($row2=pg_fetch_assoc($resultados5)){
							$intento=$row2['intento'];
							if($intento==0 || $intento==1 || $intento==2){
							$intento2=$intento+1;
						}


						}
						
						$sqlLogin2="UPDATE logintry SET intento='".$intento2."' WHERE intento='".$intento."'";			
						$resultados2=pg_query($cnx->conx ,$sqlLogin2);
						echo "<script> alert('Usuario Incorrecto')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../'>";
					

								}

					else{
								while($row=pg_fetch_assoc($resultados)){
									$nombre=$row["usuario"];
									$id=$row["id_usuario"];
								}
								$_SESSION['activa']=1;
								$_SESSION['nombreUsuario']=$nombre;
								$_SESSION['idUsuario']=$id;

								
								$fechapg="select current_date";
								$resultado=pg_query($cnx->conx ,$sqlLogin);

								$hoy = date("Y-m-d");
								$hora=date("H:i:s");

								$sqlRegistrar="insert into bitacora (nombre_tabla, tipo_operacion,fecha,hora,id_usuario,viejo_valor,nuevo_valor) values ('VACIO','Inicio de Sesión','$hoy','$hora','$id','VACIO','VACIO')";	

								$resultados=pg_query($cnx->conx ,$sqlRegistrar) ;

						$sqlLogin="SELECT * FROM logintry";			
						$resultados=pg_query($cnx->conx ,$sqlLogin);
						while($row2=pg_fetch_assoc($resultados)){
							$intento=$row2['intento'];
						}					
									$sqlLogin2="UPDATE logintry SET intento='0' WHERE intento='".$intento."'";			
									$resultados2=pg_query($cnx->conx ,$sqlLogin2);	

								echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vMenu.php'>";	

	
						}


									}
					else{
						echo "<script> alert('Usuario Incorrecto')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vLogin.php'>";
						}

						}

						





			}

 ?>