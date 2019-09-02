<?php 

include("mConexion.php");
include("temporal.php");

class bien{

		public $id_bien;
		public $nombre_bien;
		public $nombre_bien_original;
		public $valor_bien;
		public $fecha_adquisicion_bien;
		public $serial_bien;
		public $id_grupo;
		public $id_subgrupo;
		public $descripcion_bien;
		public $imagen_bien;
		public $ruta_imagen;
		public $ruta_pdf;
		public $factura_bien;
		public $id_seccion;
		public $nombre_seccion;
		public $id_concepto;
		public $id_tipo_concepto;
		public $motivo_traspaso;
		public $id_datos_personales;
		public $id_responsable_uso;
		public $destino_comodato;
		public $tiempo_comodato;

/*
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


*/


function llenarTablaFaltantes(){
		$cnx = new conexion();
		$cnx->conectar();
				
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN bien_activo as ba on b.id_bien=ba.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion JOIN concepto_de_movimiento as cdm on b.id_concepto=cdm.id_concepto where id_tipo_concepto=10 ORDER BY nombre_bien, serial_bien";
		//$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien WHERE id_concepto='6'";			
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Sección</th><th>ID del Bien</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->ruta_imagen=$row["ruta_imagen"];
							$this->descripcion_bien=$row["descripcion_bien"];
							$this->serial_bien=$row["serial_bien"];
							$this->nombre_seccion=$row["nombre_seccion"];

							$idCampoNombreBien="nombreBienG".$contador;
							$idCampoIdBien="idBienG".$contador;
							$idCampoValorBien="valorBienG".$contador;
							$idCampoIdGrupo="grupoBienG".$contador;
							$idCampoIdSubgrupo="subgrupoBienG".$contador;
							$idCampoSerialBien="serialBienG".$contador;
							$idCampoImgBien="imgBienG".$contador;
							$idCampoPdfBien="pdfBienG".$contador;
							$idCampoDescripcionBien="descripcionBienG".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBienG".$contador;
							


						echo '<tr onclick=transferirValoresG('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$this->nombre_seccion.'</td><td>'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		
					else{
						echo "No existen bienes incorporados.";
					}



}		

		
		function incorporar(){
		$cnx = new conexion();
		$cnx->conectar();


						$sqlRegistrarBien="UPDATE bien set id_concepto='$this->id_concepto' where id_bien='$this->id_bien' ";				
						$sqlRegistrarBienActivo="insert into bien_activo (id_bien, id_seccion, id_responsable_uso) values ('$this->id_bien', '$this->id_seccion', '$this->id_datos_personales')";				
						new temporal();	
						$fecha=date('Y').'-'.date('m').'-'.date('j');
						$hora=date('H:m');
						$sqlRegistrarTransaccion="insert into transaccion (fecha_transaccion, id_tipo_concepto, id_bien) values ('$fecha', '10', '$this->id_bien')";
						$sqlRegistrarHistorico="insert into historico_bien (id_bien, fecha, hora, descripcion_movimiento, id_seccion, id_responsable) values ('$this->id_bien','$fecha', '$hora', 'Incorporación del Bien', '$this->id_seccion', '$this->id_responsable_uso')";	
						$resultados1=pg_query($cnx->conx ,$sqlRegistrarBien) ;
						$resultados2=pg_query($cnx->conx ,$sqlRegistrarBienActivo) ;
						$resultados3=pg_query($cnx->conx ,$sqlRegistrarTransaccion) ;
						$resultados4=pg_query($cnx->conx ,$sqlRegistrarHistorico) ;
						if(!$resultados1 || !$resultados2|| !$resultados3|| !$resultados4){						

							echo "<script>alert('Error en la incorporacion')</script>";							
							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";
						}

						else{

							echo "<script>alert('Incorporacion Exitosa')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";


						}	


							

									} //Fin Registrar();

		function traspasar(){
		$cnx = new conexion();
		$cnx->conectar();


						$sqlRegistrarBien="UPDATE bien_activo set id_seccion='$this->id_seccion' where id_bien='$this->id_bien' ";		
						$fecha=date('Y').'-'.date('m').'-'.date('j');
						$hora=date('H:m');
						$sqlRegistrarHistorico="insert into historico_bien (id_bien, fecha, hora, descripcion_movimiento, id_seccion, id_responsable) values ('$this->id_bien','$fecha', '$hora', '$this->motivo_traspaso', '$this->id_seccion', '$this->id_responsable_uso')";							


						new temporal();	
						$resultados1=pg_query($cnx->conx ,$sqlRegistrarBien) ;
						if(!$resultados1){

							echo "<script>alert('Error en el traspaso')</script>";							
							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";
						}

						else{

							echo "<script>alert('Traspaso Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";


						}	


							

									} //Fin Registrar();	


		function desincorporar(){
		$cnx = new conexion();
		$cnx->conectar();


						$sqlRegistrarBien="UPDATE bien set id_concepto='$this->id_concepto' where id_bien='$this->id_bien' ";				
						$sqlRegistrarBienActivo="delete from bien_activo where id_bien='$this->id_bien'";				
						new temporal();	
						$fecha=date('Y').'-'.date('m').'-'.date('j');
						$sqlRegistrarTransaccion="insert into transaccion (fecha_transaccion, id_tipo_concepto, id_bien) values ('$fecha', '11', '$this->id_bien')";
						$hora=date('H:m');
						$sqlRegistrarHistorico="insert into historico_bien (id_bien, fecha, hora, descripcion_movimiento, id_seccion, id_responsable) values ('$this->id_bien','$fecha', '$hora', 'Desincorporación del Bien', 'N/A', 'N/A')";	
						$resultados1=pg_query($cnx->conx ,$sqlRegistrarBien);
						$resultados2=pg_query($cnx->conx ,$sqlRegistrarBienActivo);
						$resultados3=pg_query($cnx->conx ,$sqlRegistrarTransaccion);
						$resultados4=pg_query($cnx->conx ,$sqlRegistrarHistorico);
						if(!$resultados1 || !$resultados2|| !$resultados3|| !$resultados4){

							echo "<script>alert('Error en la desincorporacion')</script>";							
							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";
						}

						else{

							echo "<script>alert('Desincorporacion Exitosa')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";


						}	


							

									} //Fin Desincorporar();


		function comodato(){
		$cnx = new conexion();
		$cnx->conectar();


						$sqlRegistrarBien="UPDATE bien set id_concepto='14' where id_bien='$this->id_bien' ";				
						$sqlRegistrarBienActivo="UPDATE bien_activo SET id_seccion='18', id_responsable_uso='11' where id_bien='$this->id_bien'";				
						new temporal();	
						$fecha=date('Y').'-'.date('m').'-'.date('j');
						$sqlRegistrarTransaccion="insert into transaccion (fecha_transaccion, id_tipo_concepto, id_bien) values ('$fecha', '18', '$this->id_bien')";
						$hora=date('H:m');
						$sqlRegistrarHistorico="insert into historico_bien (id_bien, fecha, hora, descripcion_movimiento, id_seccion, id_responsable) values ('$this->id_bien','$fecha', '$hora', 'Traspaso en comodato del Bien', 'N/A', 'N/A')";
						$sqlRegistrarDatosComodato="insert into datos_comodato (id_bien, destino_comodato, tiempo_comodato) values ('$this->id_bien','$this->destino_comodato','$this->tiempo_comodato')";	
						$resultados1=pg_query($cnx->conx ,$sqlRegistrarBien);
						$resultados2=pg_query($cnx->conx ,$sqlRegistrarBienActivo);
						$resultados3=pg_query($cnx->conx ,$sqlRegistrarTransaccion);
						$resultados4=pg_query($cnx->conx ,$sqlRegistrarHistorico);
						$resultados5=pg_query($cnx->conx ,$sqlRegistrarDatosComodato);
						if(!$resultados1 || !$resultados2|| !$resultados3|| !$resultados4|| !$resultados5){

							echo "<script>alert('Error en el comodato')</script>";							
							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";
						}

						else{

							echo "<script>alert('Comodato Exitoso')</script>";

							echo "<meta http-equiv='refresh' content='0; url=../V/vBM2.php'>";


						}	


							

									} //Fin Registrar();



function llenarTablaIncorporacion(){
		$cnx = new conexion();
		$cnx->conectar();
				
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto WHERE cm.id_tipo_concepto='14'";
		//$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien WHERE id_concepto='6'";			
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>ID del Bien</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->ruta_imagen=$row["ruta_imagen"];
							$this->descripcion_bien=$row["descripcion_bien"];
							$this->serial_bien=$row["serial_bien"];

							$idCampoNombreBien="nombreBien".$contador;
							$idCampoIdBien="idBien".$contador;
							$idCampoValorBien="valorBien".$contador;
							$idCampoIdGrupo="grupoBien".$contador;
							$idCampoIdSubgrupo="subgrupoBien".$contador;
							$idCampoSerialBien="serialBien".$contador;
							$idCampoImgBien="imgBien".$contador;
							$idCampoPdfBien="pdfBien".$contador;
							$idCampoDescripcionBien="descripcionBien".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBien".$contador;
							


						echo '<tr onclick=transferirValores('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		
					else{
						echo "No hay bienes incorporables.";
					}



}		
function llenarTablaDesincorporacion(){
		$cnx = new conexion();
		$cnx->conectar();
				

		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN bien_activo as ba on b.id_bien=ba.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  WHERE cm.id_tipo_concepto='10'";			
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Seccion</th><th>ID del Bien</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->ruta_imagen=$row["ruta_imagen"];
							$this->descripcion_bien=$row["descripcion_bien"];
							$this->serial_bien=$row["serial_bien"];
							$seccion=$row["nombre_seccion"];

							$idCampoNombreBien="nombreBienC".$contador;
							$idCampoIdBien="idBienC".$contador;
							$idCampoSeccionBien="idSeccionC".$contador;
							$idCampoValorBien="valorBienC".$contador;
							$idCampoIdGrupo="grupoBienC".$contador;
							$idCampoIdSubgrupo="subgrupoBienC".$contador;
							$idCampoSerialBien="serialBienC".$contador;
							$idCampoImgBien="imgBienC".$contador;
							$idCampoPdfBien="pdfBienC".$contador;
							$idCampoDescripcionBien="descripcionBienC".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBienC".$contador;

							


						echo '<tr onclick=transferirValoresC('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$seccion.'</td><td>'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		
					else{
						echo "No hay bienes desincorporables.";
					}





}			



function llenarTablaTraspasos(){
		$cnx = new conexion();
		$cnx->conectar();
				
		//$sqlConsultar="SELECT * FROM bien_activo as ba JOIN datos_bien as db on ba.id_bien=db.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion";
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN bien_activo as ba on b.id_bien=ba.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion WHERE cm.id_tipo_concepto='10' OR cm.id_tipo_concepto='18'";



		//$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien WHERE id_concepto='6'";			
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Sección</th><th>ID del Bien</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->ruta_imagen=$row["ruta_imagen"];
							$this->descripcion_bien=$row["descripcion_bien"];
							$this->serial_bien=$row["serial_bien"];
							$this->id_seccion=$row["id_seccion"];
							$this->nombre_seccion=$row["nombre_seccion"];

							$idCampoNombreBien="nombreBienE".$contador;
							$idCampoIdBien="idBienE".$contador;
							$idCampoValorBien="valorBienE".$contador;
							$idCampoIdGrupo="grupoBienE".$contador;
							$idCampoIdSubgrupo="subgrupoBienE".$contador;
							$idCampoSerialBien="serialBienE".$contador;
							$idCampoSeccionBien="seccionBienE".$contador;
							$idCampoImgBien="imgBienE".$contador;
							$idCampoPdfBien="pdfBienE".$contador;
							$idCampoDescripcionBien="descripcionBienE".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBienE".$contador;
							


						echo '<tr onclick=transferirValoresE('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoSeccionBien.' value=\''.$this->id_seccion.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$this->nombre_seccion.'</td><td>'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		
					else{
						echo "No existen bienes traspasables.";
					}



}		
function llenarTablaComodato(){
		$cnx = new conexion();
		$cnx->conectar();
				
		//$sqlConsultar="SELECT * FROM bien_activo as ba JOIN datos_bien as db on ba.id_bien=db.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion";
		$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  JOIN concepto_de_movimiento as cm on b.id_concepto=cm.id_concepto JOIN bien_activo as ba on b.id_bien=ba.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion WHERE cm.id_tipo_concepto='10'";



		//$sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien WHERE id_concepto='6'";			
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 

					$num=pg_num_rows($resultados);
					if($num!=0){
						echo '<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Sección</th><th>ID del Bien</th></tr>';
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_array($resultados)){
							$this->id_bien=$row["id_bien"];
							$this->nombre_bien=$row["nombre_bien"];
							$this->ruta_imagen=$row["ruta_imagen"];
							$this->descripcion_bien=$row["descripcion_bien"];
							$this->serial_bien=$row["serial_bien"];
							$this->id_seccion=$row["id_seccion"];
							$this->nombre_seccion=$row["nombre_seccion"];

							$idCampoNombreBien="nombreBienI".$contador;
							$idCampoIdBien="idBienI".$contador;
							$idCampoValorBien="valorBienI".$contador;
							$idCampoIdGrupo="grupoBienI".$contador;
							$idCampoIdSubgrupo="subgrupoBienI".$contador;
							$idCampoSerialBien="serialBienI".$contador;
							$idCampoSeccionBien="seccionBienI".$contador;
							$idCampoImgBien="imgBienI".$contador;
							$idCampoPdfBien="pdfBienI".$contador;
							$idCampoDescripcionBien="descripcionBienI".$contador;
							$idCampoFechaAdquisicionBien="fechaAdquisicionBienI".$contador;
							


						echo '<tr onclick=transferirValoresI('.$contador.')><td>'.$contador1.'</td><td>'.$this->nombre_bien.'<input type="hidden" id='.$idCampoIdBien.' value=\''.$this->id_bien.'\'><input type="hidden" id='.$idCampoNombreBien.' value=\''.$this->nombre_bien.'\'><input type="hidden" id='.$idCampoSerialBien.' value=\''.$this->serial_bien.'\'><input type="hidden" id='.$idCampoSeccionBien.' value=\''.$this->id_seccion.'\'><input type="hidden" id='.$idCampoImgBien.' value=\''.$this->ruta_imagen.'\'><input type="hidden" id='.$idCampoDescripcionBien.' value=\''.$this->descripcion_bien.'\'></td><td>'.$this->serial_bien.'</td><td>'.$this->nombre_seccion.'</td><td>'.$this->id_bien.'</td></tr>';

						$contador++;
						$contador1++;
						}	
					}		
					else{
						echo "No existen bienes traspasables en comodato.";
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

function llenarSelectConceptoIncorporacion(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from concepto_de_movimiento where id_tipo_concepto='10'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value="">Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_concepto"];
							$id=$row["id_concepto"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}
function llenarSelectConceptoDesincorporacion(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from concepto_de_movimiento where id_tipo_concepto='11'";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value="">Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_concepto"];
							$id=$row["id_concepto"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
						echo '</option>';
						}	
					}		




}

function llenarSelectSeccion(){
		$cnx = new conexion();
		$cnx->conectar();

		$sqlConsultar="select * from seccion";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar); 
				echo '<option value="">Seleccione</option>';
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre_seccion"];
							$id=$row["id_seccion"];
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




function llenarResponsable(){
		$cnx = new conexion();
		$cnx->conectar();

		echo '<option value="">
			Seleccione
			</option>';

		$sqlConsultar="select * FROM datos_personales";	
		$resultados=pg_query($cnx->conx ,$sqlConsultar);
					$num=pg_num_rows($resultados);
					if($num!=0){						
						$contador=0;
						$contador1=1;
						while($row=pg_fetch_assoc($resultados)){
							$nombre=$row["nombre"];
							$apellido=$row["apellido"];
							$id=$row["id_datos_personales"];
						echo '<option value=';
						echo $id;
						echo '>';
						echo $nombre;
							echo ' ';
						echo $apellido;
						echo '</option>';
						}	
					}		




}	


	}