<?php 

include("mConexion.php");
include("temporal.php");

class componente{

		public $id_bien;
		public $id_bien_compuesto;
		public $nombre_bien;
		public $nombre_bien_original;
		public $valor_bien;
		public $marca_bien;
		public $modelo_bien;
		public $color_bien;
		public $fecha_adquisicion_bien;
		public $serial_bien;
		public $id_grupo;
		public $id_subgrupo;
		public $id_responsable;
		public $id_proveedor;
		public $descripcion_bien;
		public $descripcion_bien_individual;
		public $imagen_bien;
		public $ruta_imagen;
		public $ruta_pdf;
		public $factura_bien;
		public $id_tipo_concepto;


function consultar(){

	$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="select * from datos_bien where id_bien='$this->id_bien'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

		$num=pg_num_rows($resultados);
					if($num==0){
										
						echo "<script> alert('Bien no encontrado')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vCodigoComponente.php'>";
								}

					else{
								
				while($row=pg_fetch_array($resultados)){

				$_SESSION["idBien2"]=$row["id_bien"];
				$_SESSION["id_bien_componente2"]=$row["id_bien"];
				$_SESSION["nombre_bien2"]=$row["nombre_bien"];
				$_SESSION["valor_bien2"]=$row["valor_bien"]." BsF";
				$_SESSION["fecha_adquisicion_bien2"]=$row["fecha_adquisicion_bien"];
				$_SESSION["marca_bien2"]=$row["marca_bien"];
				$_SESSION["modelo_bien2"]=$row["modelo_bien"];
				$_SESSION["color_bien2"]=$row["color_bien"];
				$_SESSION["id_sub_categoria_especifica"]=$row["id_sub_categoria_especifica"];
																		}

				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vGestionarComponente.php'>";
																	
											  				
	
						}




}


	function registrar(){ // -----------------------------------------------------------Funcion Registrar --------------------------------------------------
		$cnx = new conexion();
		$cnx->conectar();
		$contadorFallas=0;
		$cont=0;
		$fallas =array();
		
        $date = date("Y-m-d_H-s");	

//Definir Tamaño de archivo 5MB
define('LIMITEIMAGEN', 10000);
//Definir arreglo con extensiones permitidas usar serialize
define('ARREGLOIMAGEN', serialize( array('image/jpg', 'image/jpeg', 'image/gif','image/png')));
define('ARREGLOFACTURA', serialize( array('application/pdf', 'application/msword', 'text/plain', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')));
 
$PERMITIDOS = unserialize(ARREGLOIMAGEN); //Usar unserialize para obtener el arreglo
$PERMITIDOS_FACTURA = unserialize(ARREGLOFACTURA); //Usar unserialize para obtener el arreglo
 
        if (in_array($this->imagen_bien['type'], $PERMITIDOS) && $this->imagen_bien['size'] <= LIMITEIMAGEN * 1024){
		$archivo=$this->imagen_bien["name"];
		$trozos = explode(".", $archivo); 
		$extension = end($trozos); 
       		$rutaEnServidor = "../V/uploads/images/". $this->nombre_bien.$date.".".$extension;
 
            //Desde index.php, la carpeta imagenes está en imagenes/nombreDeArchivo
            $rutaimg = "uploads/images/" . $this->nombre_bien.$date.".".$extension;
 
            if (!file_exists($rutaimg)){
                $resultado = move_uploaded_file($this->imagen_bien["tmp_name"], $rutaEnServidor);
                if (!$resultado){
                	$rutaimg="ERROR";
                }
            }}

        if (in_array($this->factura_bien['type'], $PERMITIDOS_FACTURA)){
		$archivo=$this->factura_bien["name"];
		$trozos = explode(".", $archivo); 
		$extension = end($trozos); 
       		$rutaEnServidor = "../V/uploads/files/". $this->nombre_bien.$date.".".$extension;
 
            //Desde index.php, la carpeta imagenes está en imagenes/nombreDeArchivo
            $rutafile = "uploads/files/" . $this->nombre_bien.$date.".".$extension;
 
            if (!file_exists($rutafile)){
                $resultado = move_uploaded_file($this->factura_bien["tmp_name"], $rutaEnServidor);
                if (!$resultado){
                	$rutafile="ERROR";
                }
            }
}




						$sqlRegistrar1="insert into datos_bien (nombre_bien, valor_bien, marca_bien, modelo_bien, color_bien, fecha_adquisicion_bien, descripcion_bien, descripcion_bien_individual, serial_bien, ruta_imagen, ruta_pdf, id_sub_categoria_especifica, id_proveedor) values ('$this->nombre_bien','$this->valor_bien','$this->marca_bien','$this->modelo_bien','$this->color_bien','$this->fecha_adquisicion_bien', '$this->descripcion_bien','$this->descripcion_bien_individual','$this->serial_bien','$rutaimg','$rutafile', $this->id_subgrupo, $this->id_proveedor)";

						$resultados1=pg_query($cnx->conx ,$sqlRegistrar1) ;


						$sqlConsultarId="select max(id_bien) from datos_bien";
						$res=pg_query($cnx->conx, $sqlConsultarId);
							while($row=pg_fetch_assoc($res)){
								$this->id_bien=$row['max'];
							}
						$sqlRegistrar2="insert into bien (id_bien, id_concepto) values ('$this->id_bien','7')";					
						$sqlRegistrar3="insert into bien_compuesto (id_bien, id_bien_componente) values ('$this->id_bien','$this->id_bien_compuesto')";					
						//new temporal();	

						$resultados2=pg_query($cnx->conx ,$sqlRegistrar2);
						$resultados3=pg_query($cnx->conx ,$sqlRegistrar3);
					
						if(!$resultados2 || !$resultados3){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vGestionarComponente.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vGestionarComponente.php'>";


						}	


							

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();


$sqlModificar="update datos_bien set nombre_bien='$this->nombre_bien', valor_bien='$this->valor_bien', marca_bien='$this->marca_bien', modelo_bien='$this->modelo_bien', color_bien='$this->color_bien', fecha_adquisicion_bien='$this->fecha_adquisicion_bien', descripcion_bien='$this->descripcion_bien', descripcion_bien_individual='$this->descripcion_bien_individual' , id_proveedor='$this->id_proveedor' where id_bien='$this->id_bien'";
new temporal();	
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vGestionarComponente.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vGestionarComponente.php'>";

}
} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlConsultarArchivos="SELECT * FROM datos_bien WHERE id_bien='$this->id_bien'";
$res=pg_query($cnx->conx , $sqlConsultarArchivos);
	while($datos=pg_fetch_assoc($res)){
		$this->ruta_imagen=$datos['ruta_imagen'];
		$this->ruta_pdf=$datos['ruta_pdf'];

	}


$sqlEliminar1="delete from datos_bien where id_bien='$this->id_bien'";
$sqlEliminar2="delete from bien where id_bien='$this->id_bien'";
$resultados1=pg_query($cnx->conx ,$sqlEliminar1) ;
$resultados2=pg_query($cnx->conx ,$sqlEliminar2) ;

if(!$resultados1 || !$resultados2){
echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vGestionarComponente.php'>";


}
else{
	$rutaCarpeta="../V/";
	unlink($rutaCarpeta.$this->ruta_imagen);
	unlink($rutaCarpeta.$this->ruta_pdf);
echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vPercepcionBienes.php'>";


}



} //Fin Eliminar();








function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from bien_compuesto as bc JOIN datos_bien as db on bc.id_bien=db.id_bien where bc.id_bien_componente='".$_SESSION["id_bien_componente2"]."'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Componentes Registrados</th><th>Gestionar</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$nombre=$row["nombre_bien"];
							$id=$row["id_bien"];
							$nombre=$row["nombre_bien"];
						echo '<form action="../C/cGestionarComponente.php" method="POST">';
						echo '<input type="hidden" name="id_bien" value="'.$id.'"/>';
						echo '<tr><td>'.$contador1.'</td><td>'.$nombre.'</td><td><input name="gestionar" id="gestionar" class="sutmit" value="Gestionar" type="submit"></td></tr>';
						echo '</form>';
						$contador++;
						$contador1++;
						}	
					}		




}			




function editar(){
	$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="select * from datos_bien where id_bien='$this->id_bien'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

		$num=pg_num_rows($resultados);
					if($num==0){
										
						echo "<script> alert('Bien no encontrado')</script>";
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vCodigoComponente.php'>";
								}

					else{
								
				while($row=pg_fetch_array($resultados)){

					$id_sub_categoria_especifica=$row["id_sub_categoria_especifica"];
		$sqlConsultar2="select * from sub_categoria_especifica where id_sub_categoria_especifica='$id_sub_categoria_especifica'";	
		$resultados2=pg_query($cnx->conx ,$sqlConsultar2);
		while($row2=pg_fetch_array($resultados2)){


				$_SESSION["id_grupo"]=$row2["id_sub_grupo"];
		}

				$_SESSION["idBien"]=$row["id_bien"];
				$_SESSION["nombre_bien"]=$row["nombre_bien"];
				$_SESSION["valor_bien2"]=$row["valor_bien"];
				$_SESSION["fecha_adquisicion_bien"]=$row["fecha_adquisicion_bien"];
				$_SESSION["descripcion_bien"]=$row["descripcion_bien"];
				$_SESSION["serial_bien"]=$row["serial_bien"];
				$_SESSION["id_subgrupo"]=$row["id_sub_categoria_especifica"];
				$_SESSION["marca_bien"]=$row["marca_bien"];
				$_SESSION["modelo_bien"]=$row["modelo_bien"];
				$_SESSION["color_bien"]=$row["color_bien"];	
				$_SESSION["descripcion_bien_individual"]=$row["descripcion_bien_individual"];
				$_SESSION["id_proveedor"]=$row["id_proveedor"];
																		}

				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vEditarDatosComponente.php'>";
																	
											  				
	
						}
}





function llenarTablaBienesIncorporados(){
		$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN subgrupo as sg  on db.id_subgrupo=sg.id_subgrupo JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN bien_activo as ba on b.id_bien=ba.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion WHERE cm.id_tipo_concepto='10'";							
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Sección</th><th>Código de Barras</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->valor_bien=$row["valor_bien"];
							$this->ruta_imagen=$row["ruta_imagen"];
							$this->id_subgrupo=$row["id_subgrupo"];
							$this->id_grupo=$row["id_grupo"];
							$this->ruta_pdf=$row["ruta_pdf"];
							$this->fecha_adquisicion_bien=$row["fecha_adquisicion_bien"];
							$this->descripcion_bien=$row["descripcion_bien"];
							$this->serial_bien=$row["serial_bien"];
							$id_seccion=$row["id_seccion"];
							$this->id_tipo_concepto=$row["id_tipo_concepto"];

							$sqlConsultarEstatus="select nombre_tipo_concepto from tipo_concepto where id_tipo_concepto='$this->id_tipo_concepto'";
							$resultados2=pg_query($cnx->conx ,$sqlConsultarEstatus);
							while($row2=pg_fetch_array($resultados2)){
								$estatus=$row2["nombre_tipo_concepto"];
							}

							$sqlConsultarNombreSeccion="select nombre_seccion from seccion where id_seccion='$id_seccion'";
							$resultados3=pg_query($cnx->conx ,$sqlConsultarNombreSeccion);
							while($row3=pg_fetch_array($resultados3)){
								$nombre_seccion=$row3["nombre_seccion"];
							}

							$idCampoNombreBien="nombreBien".$contador;
							$idCampoNombreSeccion="nombreSeccion".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$nombre_seccion.'</td><td><a href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</td></tr>';

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
				echo '<option value="">Seleccione</option>';
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


function llenarSelectProveedor(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from proveedor";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value="">Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["codigo_proveedor"];
							$id=$row["id_proveedor"];
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