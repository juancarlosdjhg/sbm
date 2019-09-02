<?php 

include("mConexion.php");
include("temporal.php");

class bien{

		public $id_bien;
		public $nombre_bien;
		public $nombre_bien_original;
		public $valor_bien;
		public $marca_bien;
		public $modelo_bien;
		public $color_bien;
		public $fecha_adquisicion_bien;
		public $serial_bien;
		public $status_bien;
		public $id_status_bien;
		public $id_grupo;
		public $id_subgrupo;
		public $id_sub_categoria_especifica;
		public $id_responsable;
		public $id_proveedor;
		public $descripcion_bien;
		public $descripcion_bien_individual;
		public $imagen_bien;
		public $ruta_imagen;
		public $ruta_pdf;
		public $factura_bien;
		public $id_tipo_concepto;
		public $revision_bien;

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
 
        if (in_array($this->imagen_bien['type'], $PERMITIDOS) && $this->imagen_bien['size'] <= LIMITEIMAGEN * 102){
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


	new temporal();	
				foreach($this->serial_bien as $key => $value){
					$serial=$this->serial_bien[$key];
					$dbi=$this->descripcion_bien_individual[$key];


if ($this->revision_bien=='on'){



						$sqlRegistrar1="insert into datos_bien (nombre_bien, valor_bien, marca_bien, modelo_bien, color_bien, fecha_adquisicion_bien, descripcion_bien, descripcion_bien_individual, serial_bien, ruta_imagen, ruta_pdf, id_sub_categoria_especifica, id_proveedor, descripcion_bien_revisado, conclusion_bien_revisado, id_responsable_revision) values ('$this->nombre_bien','$this->valor_bien','$this->marca_bien','$this->modelo_bien','$this->color_bien','$this->fecha_adquisicion_bien', '$this->descripcion_bien','$dbi','$serial','$rutaimg','$rutafile', $this->id_sub_categoria_especifica, $this->id_proveedor, 'Pendiente por revisar.', 'Pendiente por revisar.', '0')";

					
						$resultados1=pg_query($cnx->conx ,$sqlRegistrar1);
}

else{


						$sqlRegistrar1="insert into datos_bien (nombre_bien, valor_bien, marca_bien, modelo_bien, color_bien, fecha_adquisicion_bien, descripcion_bien, descripcion_bien_individual, serial_bien, ruta_imagen, ruta_pdf, id_sub_categoria_especifica, id_proveedor) values ('$this->nombre_bien','$this->valor_bien','$this->marca_bien','$this->modelo_bien','$this->color_bien','$this->fecha_adquisicion_bien', '$this->descripcion_bien','$dbi','$serial','$rutaimg','$rutafile', $this->id_sub_categoria_especifica, $this->id_proveedor)";

					
						$resultados1=pg_query($cnx->conx ,$sqlRegistrar1);




}

						$sqlConsultarId="select max(id_bien) from datos_bien";
						$res=pg_query($cnx->conx, $sqlConsultarId);
							while($row=pg_fetch_assoc($res)){
								$this->id_bien=$row['max'];
							}

if ($this->revision_bien=='on'){
						$sqlRegistrar2="insert into bien (id_bien, id_concepto) values ('$this->id_bien','13')";
						$resultados2=pg_query($cnx->conx ,$sqlRegistrar2) ;
}

else{

$sqlRegistrar2="insert into bien (id_bien, id_concepto) values ('$this->id_bien','6')";
						$resultados2=pg_query($cnx->conx ,$sqlRegistrar2) ;

}
						$fecha=Date("d-m-Y");
						$hora=Date("H:m");

						$sqlRegistrar3="insert into historico_bien (id_bien, fecha, hora, descripcion_movimiento, id_seccion, id_responsable) values ('$this->id_bien','$fecha', '$hora', 'Registro Del Control Perceptivo del Bien', 'N/A', 'N/A')";	
						$cont++;						

						
						$resultados3=pg_query($cnx->conx ,$sqlRegistrar3) ;
						if(!$resultados1 || !$resultados2|| !$resultados3){
							$contadorFallas++;
							array_push($fallas, $cont);
						}
					}
						if($contadorFallas>0){

							echo "<script>alert('Error en el (los) registro(s) Nº ";
							foreach($fallas as $f){
								echo $f.', ';
							}
							echo " ')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vPercepcionBienes.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso');</script>"; 							 
							echo "<meta http-equiv='refresh' content='0; url=../V/vListado.php'>";


						}	


							

									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();



$sqlModificar="update datos_bien set nombre_bien='$this->nombre_bien', valor_bien='$this->valor_bien', marca_bien='$this->marca_bien', modelo_bien='$this->modelo_bien', color_bien='$this->color_bien', fecha_adquisicion_bien='$this->fecha_adquisicion_bien', descripcion_bien='$this->descripcion_bien', descripcion_bien_individual='$this->descripcion_bien_individual', id_sub_categoria_especifica='$this->id_sub_categoria_especifica', id_proveedor='$this->id_proveedor' where id_bien='$this->id_bien'";
new temporal();	
$resultados=pg_query($cnx->conx ,$sqlModificar) ;

if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vPercepcionBienes.php'>";

}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vPercepcionBienes.php'>";

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
echo "<meta http-equiv='refresh' content='0; url=../V/vPercepcionBienes.php'>";


}
else{
	$rutaCarpeta="../V/";
	unlink($rutaCarpeta.$this->ruta_imagen);
	unlink($rutaCarpeta.$this->ruta_pdf);
echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vPercepcionBienes.php'>";


}



} //Fin Eliminar();


function llenarTablaGeneral(){
		$cnx = new conexion();
		$cnx->conectar();
				
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto";		
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>ID del Bien</th><th>Serial</th><th>Estatus del Bien</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->serial_bien=$row["serial_bien"];
							$this->status_bien=$row["nombre_concepto"];
							


						echo '<tr> <td>'.$contador1.'</td><td>'.$this->nombre_bien.'</td><td>'.$this->id_bien.'</td><td>'.$this->serial_bien.'</td><td>'.$this->status_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}



function llenarTabla(){
		$cnx = new conexion();
		$cnx->conectar();
				
		$limite="1000000";
		if(isset($_SESSION['limite'])){
			$limite=$_SESSION['limite'];
		}		
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN tipo_concepto as tc on cm.id_tipo_concepto=tc.id_tipo_concepto ORDER BY b.id_bien DESC LIMIT $limite";		
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>ID del Bien</th><th>Serial</th><th>Estatus del Bien</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->id_status_bien=$row["id_tipo_concepto"];
							$this->status_bien=$row["nombre_tipo_concepto"];
							$this->valor_bien=$row["valor_bien"];
							$this->marca_bien=$row["marca_bien"];
							$this->modelo_bien=$row["modelo_bien"];
							$this->color_bien=$row["color_bien"];
							$this->ruta_imagen=$row["ruta_imagen"];
							$this->id_subgrupo=$row["id_subgrupo"];
							$this->id_proveedor=$row["id_proveedor"];
							$this->id_grupo=$row["id_grupo"];					
							$this->id_sub_categoria_especifica=$row["id_sub_categoria_especifica"];
							$this->ruta_pdf=$row["ruta_pdf"];
							$this->fecha_adquisicion_bien=$row["fecha_adquisicion_bien"];
							$this->descripcion_bien=$row["descripcion_bien"];
							$this->descripcion_bien_individual=$row["descripcion_bien_individual"];
							$this->serial_bien=$row["serial_bien"];
							$this->id_tipo_concepto=$row["id_tipo_concepto"];

							$sqlConsultarEstatus="select nombre_tipo_concepto from tipo_concepto where id_tipo_concepto='$this->id_tipo_concepto'";
							$resultados2=pg_query($cnx->conx ,$sqlConsultarEstatus);
							while($row2=pg_fetch_array($resultados2)){
								$estatus=$row2["nombre_tipo_concepto"];
							}

							$idCampoNombreBien="nombreBien".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoMarcaBien="marcaBien".$contador;
							$idCampoModeloBien="modeloBien".$contador;
							$idCampoColorBien="colorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;
							$idCampoIdProveedor="proveedorBien".$contador;
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoDescripcionBienIndividual="descripcionBienPropia".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoMarcaBien.' value=\''.$this->marca_bien.'\'><input type="hidden" id='.$idCampoModeloBien.' value=\''.$this->modelo_bien.'\'><input type="hidden" id='.$idCampoColorBien.' value=\''.$this->color_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdProveedor.' value=\''.$this->id_proveedor.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoDescripcionBienIndividual.' value=\''.$this->descripcion_bien_individual.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td><a target="popup" href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</a></td><td>'.$this->serial_bien.'</td><td>'.$this->status_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}


function llenarTabla2(){
		$cnx = new conexion();
		$cnx->conectar();
				
		$limite="10000";
		
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN tipo_concepto as tc on cm.id_tipo_concepto=tc.id_tipo_concepto ORDER BY b.id_bien DESC LIMIT $limite";		
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>ID del Bien</th><th>Serial</th><th>Estatus del Bien</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->id_status_bien=$row["id_tipo_concepto"];
							$this->status_bien=$row["nombre_tipo_concepto"];
							$this->valor_bien=$row["valor_bien"];
							$this->marca_bien=$row["marca_bien"];
							$this->modelo_bien=$row["modelo_bien"];
							$this->color_bien=$row["color_bien"];
							$this->ruta_imagen=$row["ruta_imagen"];
							$this->id_subgrupo=$row["id_subgrupo"];
							$this->id_proveedor=$row["id_proveedor"];
							$this->id_grupo=$row["id_grupo"];					
							$this->id_sub_categoria_especifica=$row["id_sub_categoria_especifica"];
							$this->ruta_pdf=$row["ruta_pdf"];
							$this->fecha_adquisicion_bien=$row["fecha_adquisicion_bien"];
							$this->descripcion_bien=$row["descripcion_bien"];
							$this->descripcion_bien_individual=$row["descripcion_bien_individual"];
							$this->serial_bien=$row["serial_bien"];
							$this->id_tipo_concepto=$row["id_tipo_concepto"];

							$sqlConsultarEstatus="select nombre_tipo_concepto from tipo_concepto where id_tipo_concepto='$this->id_tipo_concepto'";
							$resultados2=pg_query($cnx->conx ,$sqlConsultarEstatus);
							while($row2=pg_fetch_array($resultados2)){
								$estatus=$row2["nombre_tipo_concepto"];
							}

							$idCampoNombreBien="nombreBien".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoMarcaBien="marcaBien".$contador;
							$idCampoModeloBien="modeloBien".$contador;
							$idCampoColorBien="colorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;
							$idCampoIdProveedor="proveedorBien".$contador;
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoDescripcionBienIndividual="descripcionBienPropia".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoMarcaBien.' value=\''.$this->marca_bien.'\'><input type="hidden" id='.$idCampoModeloBien.' value=\''.$this->modelo_bien.'\'><input type="hidden" id='.$idCampoColorBien.' value=\''.$this->color_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdProveedor.' value=\''.$this->id_proveedor.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoDescripcionBienIndividual.' value=\''.$this->descripcion_bien_individual.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->id_bien.'</td><td>'.$this->serial_bien.'</td><td>'.$this->status_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}


function llenarTablaBienesIncorporados(){
		$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN bien_activo as ba on b.id_bien=ba.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion WHERE cm.id_tipo_concepto='10'";							
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
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;							
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$nombre_seccion.'</td><td><a href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}

function llenarTablaBienesComodato(){
		$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto WHERE cm.id_tipo_concepto='18'";							
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Código de Barras</th></tr>';
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
							$this->id_tipo_concepto=$row["id_tipo_concepto"];

							$sqlConsultarEstatus="select nombre_tipo_concepto from tipo_concepto where id_tipo_concepto='$this->id_tipo_concepto'";
							$resultados2=pg_query($cnx->conx ,$sqlConsultarEstatus);
							while($row2=pg_fetch_array($resultados2)){
								$estatus=$row2["nombre_tipo_concepto"];
							}

							
							$idCampoNombreBien="nombreBien".$contador;
							$idCampoNombreSeccion="nombreSeccion".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;							
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->serial_bien.'</td><td><a href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}

function llenarTablaBienesDesincorporados(){
		$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto WHERE cm.id_tipo_concepto='11'";							
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Código de Barras</th></tr>';
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
							$this->id_tipo_concepto=$row["id_tipo_concepto"];

							$sqlConsultarEstatus="select nombre_tipo_concepto from tipo_concepto where id_tipo_concepto='$this->id_tipo_concepto'";
							$resultados2=pg_query($cnx->conx ,$sqlConsultarEstatus);
							while($row2=pg_fetch_array($resultados2)){
								$estatus=$row2["nombre_tipo_concepto"];
							}

							
							$idCampoNombreBien="nombreBien".$contador;
							$idCampoNombreSeccion="nombreSeccion".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;							
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->serial_bien.'</td><td><a href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}

function llenarTablaBienesFlotantes(){
		$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto WHERE cm.id_tipo_concepto='14'";							
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Código de Barras</th></tr>';
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
							$this->id_tipo_concepto=$row["id_tipo_concepto"];

							$sqlConsultarEstatus="select nombre_tipo_concepto from tipo_concepto where id_tipo_concepto='$this->id_tipo_concepto'";
							$resultados2=pg_query($cnx->conx ,$sqlConsultarEstatus);
							while($row2=pg_fetch_array($resultados2)){
								$estatus=$row2["nombre_tipo_concepto"];
							}

							

							$idCampoNombreBien="nombreBien".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;							
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->serial_bien.'</td><td><a target="popup" href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}

function llenarTablaBienesRechazados(){
		$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto WHERE cm.id_tipo_concepto='17'";							
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Código de Barras</th></tr>';
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
							$this->id_tipo_concepto=$row["id_tipo_concepto"];

							$sqlConsultarEstatus="select nombre_tipo_concepto from tipo_concepto where id_tipo_concepto='$this->id_tipo_concepto'";
							$resultados2=pg_query($cnx->conx ,$sqlConsultarEstatus);
							while($row2=pg_fetch_array($resultados2)){
								$estatus=$row2["nombre_tipo_concepto"];
							}

							

							$idCampoNombreBien="nombreBien".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;							
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->serial_bien.'</td><td><a target="popup" href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}

function llenarTablaBienesPendientes(){
		$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto WHERE cm.id_tipo_concepto='16'";							
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Código de Barras</th><th>Revisar</th></tr>';
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
							$this->id_tipo_concepto=$row["id_tipo_concepto"];
							$this->marca_bien=$row["marca_bien"];
							$this->modelo_bien=$row["modelo_bien"];
							$this->color_bien=$row["color_bien"];

							$sqlConsultarEstatus="select nombre_tipo_concepto from tipo_concepto where id_tipo_concepto='$this->id_tipo_concepto'";
							$resultados2=pg_query($cnx->conx ,$sqlConsultarEstatus);
							while($row2=pg_fetch_array($resultados2)){
								$estatus=$row2["nombre_tipo_concepto"];
							}

							

							$idCampoNombreBien="nombreBien".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;							
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							

						echo '<form action="vRevisionBien.php" method="POST">';
						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' name="nombre" value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'><input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'><input type="hidden" name="marca" value=\''.$this->marca_bien.'\'><input type="hidden" name="modelo" value=\''.$this->modelo_bien.'\'><input type="hidden" name="color" value=\''.$this->color_bien.'\'></td><td>'.$this->serial_bien.'</td><td><a target="popup" href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien;
						
						echo '</td><td>';
						echo '<input type="hidden" name="id_bien" value="'.$row['id_bien'].'"/>';
						echo '<input name="gestionar" id="gestionar" class="sutmit" value="Revisar" type="submit">';
						echo '<td>';
						echo '<a class="tooltip2" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Haga click en "Revisar" para aprobar o rechazar la incorporación del bien</span>';
						echo '</td>';
						echo '</tr>';
						echo '</form>';

						$contador++;
						$contador1++;
						}	
					}		




}
function llenarTablaBienesFaltantes(){
		$cnx = new conexion();
		$cnx->conectar();
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) WHERE b.id_concepto='7'";							
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
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;							
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'<input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$nombre_seccion.'</td><td><a href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		




}

function llenarTablaPorProveedor(){
		$cnx = new conexion();
		$cnx->conectar();


		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) WHERE b.id_concepto='7'";							
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
							$idCampoIdSubcategoriaEspecifica="subCategoriaEspecificaBien".$contador;							
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoValorBien.' value=\''.$this->valor_bien.'\'><input type="hidden" id='.$idCampoIdSubgrupo.' value=\''.$this->id_subgrupo.'\'<input type="hidden" id='.$idCampoIdSubcategoriaEspecifica.' value=\''.$this->id_sub_categoria_especifica.'\'><input type="hidden" id='.$idCampoIdGrupo.' value=\''.$this->id_grupo.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoPdfBien.' value=\''.$this->ruta_pdf.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'><input type="hidden" id='.$idCampoFechaAdquisicionBien.' value=\''.$this->fecha_adquisicion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$nombre_seccion.'</td><td><a href="barcode/samplephp/sample-fpdf.php?var='.$this->id_bien.'">'.$this->id_bien.'</td></tr>';

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
function llenarSelectProveedor2(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from proveedor";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
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


function llenarTablaInventario(){

//HEADER

				echo '<table class="tablaResultados2" id="tablaResultados1">';
				echo '<tr>
						<th colspan="2">
							Clasificación
						</th>
					  </tr>
					  <tr>
						<th>Categoría</th>
						<th>Sub Categoría</th>
						<th>Cantidad</th>
						<th>Nombre Bien</th>
						<th>Valor Total</th>
						<th>Gestionar</th>
					  </tr>';



		// SELECT GENERAL 

		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="SELECT db.id_sub_categoria_especifica, sg.id_grupo, sg.id_subgrupo,g.nombre_grupo, nombre_bien, COUNT(nombre_bien) as cantidad_bien, SUM(valor_bien) as valor_bien_agrupado FROM bien_activo as ba JOIN datos_bien as db on ba.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN seccion as s on ba.id_seccion=s.id_seccion JOIN grupo as g on g.id_grupo=sg.id_grupo GROUP BY nombre_bien, db.id_sub_categoria_especifica, sg.id_grupo,sg.id_subgrupo, g.nombre_grupo ORDER BY nombre_grupo, nombre_bien";
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 


						while($row=pg_fetch_array($resultados)){
							echo '<tr>';

								echo '<td>';
									$id_grupo=$row['id_grupo'];
									$sqlConsultarGrupo='SELECT nombre_grupo FROM grupo WHERE id_grupo='.$id_grupo.'';
									$res=pg_query($cnx->conx ,$sqlConsultarGrupo); 
										while($resGrupo=pg_fetch_array($res)){
										echo $resGrupo["nombre_grupo"];
												
										}
							    echo '</td>';

								echo '<td>';
									$id_subgrupo=$row['id_subgrupo'];
									$sqlConsultarSubgrupo='SELECT nombre_subgrupo FROM subgrupo WHERE id_subgrupo='.$id_subgrupo.'';
									$res=pg_query($cnx->conx ,$sqlConsultarSubgrupo); 
										while($resSubgrupo=pg_fetch_array($res)){
										echo $resSubgrupo["nombre_subgrupo"];
												
										}
							    echo '</td>';


								echo '<td>';
										echo $row["cantidad_bien"];
							    echo '</td>';

								echo '<td>';
										echo $row["nombre_bien"];
							    echo '</td>';

								echo '<th align="right" bgcolor="yellow">';
										echo $this->aMoneda($row["valor_bien_agrupado"]);
							    echo '</th>';

									echo '<form action="../C/cBien.php" method="POST">';
										echo '<input type="hidden" name="nombre_bien" value="'.$row['nombre_bien'].'"/>';
										echo '<td>';
											echo '<input name="gestionar" id="gestionar" class="sutmit" value="Gestionar" type="submit">';
										echo '</td>';
										echo '<td>';
											echo '<a class="tooltip2" href="#">?<span class="custom info"><img src="images/Info.png" alt="Information" height="48" width="48" /><em>Información</em>Haga click en "Gestionar" para ver los detalles del Grupo de Bienes</span>';
										echo '</td>';
										
									echo '</form>';
							echo '</tr>';

							
						}




						// SELECT VALOR TOTAL && FOOTER VALOR

						$sqlConsultar4="SELECT SUM (valor_bien) as sum FROM bien_activo as ba JOIN datos_bien as db on ba.id_bien=db.id_bien";
						$resultados=pg_query($cnx->conx ,$sqlConsultar4); 
						while($row=pg_fetch_array($resultados)){
							$valorTotal=$this->aMoneda($row['sum']);}


						echo '<th colspan="4" bgcolor="yellow">Valor Total de Inventario</th>';	
						echo '<th bgcolor="#5DB3EB" align="right">'.$valorTotal.'</th>';
						echo "</table>";	
					
						} /// FIN TABLA INVENTARIO


function gestionar(){

	$cnx = new conexion();
		$cnx->conectar();

		$this->nombre_bien=$_GET['nombre_bien'];
		$sqlConsultar="SELECT * FROM bien_activo as ba JOIN datos_bien as db on ba.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) JOIN seccion as s on ba.id_seccion=s.id_seccion JOIN grupo as g on g.id_grupo=sg.id_grupo WHERE db.nombre_bien='$this->nombre_bien'";							
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr>
						<th>Categoría</th>
						<th>Sub Categoría</th>
						<th>Sección</th>
						<th>Nº Identificador</th>
						<th>Bien</th>
						<th>Valor Unitario</th>
						</tr>';


						while($row=pg_fetch_array($resultados)){
								

							echo '<td>'.$row["nombre_grupo"].'</td>';
							echo '<td>'.$row["nombre_subgrupo"].'</td>';
							echo '<td>'.$row["nombre_seccion"].'</td>';
							echo '<td>'.$row["id_bien"].'</td>';
							echo '<td>'.$row["nombre_bien"].'</td>';
							echo '<td bgcolor="yellow" align="right">'.$this->aMoneda($row["valor_bien"]).'</td>';

							echo "</tr>";

						}

						$sqlConsultar4="SELECT SUM (valor_bien) as sum FROM bien_activo as ba JOIN datos_bien as db on ba.id_bien=db.id_bien WHERE nombre_bien='$this->nombre_bien'";
						$resultados=pg_query($cnx->conx ,$sqlConsultar4); 
						while($row=pg_fetch_array($resultados)){
							$sum=$row['sum'];
						}
						echo '<th colspan="5" bgcolor="yellow">Valor Total</th>';	
						echo '<th bgcolor="#6bbaef" align="right">'.$this->aMoneda($sum).'</th>';
																															  					
																															  					
					}

}



function aMoneda($value) {
  return number_format($value, 2, ',','.').' Bs' ;
}







	}