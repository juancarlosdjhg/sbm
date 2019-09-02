<?php 
session_start();
include("../M/mConexion.php");
		$cnx = new conexion();
		$cnx->conectar();


$str1="SELECT * FROM datos_bien as db JOIN bien as b on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto WHERE tc.id_tipo_concepto='10' ORDER BY sg.id_subgrupo,db.nombre_bien";
$resul=pg_query($str1);




 $str2="SELECT * FROM datos_bien as db JOIN bien as b on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto WHERE tc.id_tipo_concepto='11' ORDER BY sg.id_subgrupo,db.nombre_bien";
$resul2=pg_query($str2);

$num=pg_num_rows($resul);
$num2=pg_num_rows($resul2);

$_SESSION['num']=$num;
$_SESSION['num2']=$num2;



echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=vReporteEstadistico.php'>";

?>