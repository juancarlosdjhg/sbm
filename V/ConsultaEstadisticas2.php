<?php 
session_start();

include("../M/mConexion.php");
		$cnx = new conexion();
		$cnx->conectar();

$anio=$_POST['id_anio'];
$suma_incorporacion=array(0,0,0,0,0,0,0,0,0,0,0,0);
$suma_desincorporacion=array(0,0,0,0,0,0,0,0,0,0,0,0);

for($i=1;$i<=12;$i++){

		$desde=$anio.'-'.$i.'-'.'01';
		$ultimoDia=date("d",(mktime(0,0,0,$i+1,1,$anio)-1));
		$hasta=$anio.'-'.$i.'-'.$ultimoDia;


//INCORPORACION

$sql="SELECT * FROM transaccion where id_tipo_concepto='10' AND fecha_transaccion BETWEEN '$desde' AND '$hasta'";
		$resultados=pg_query($cnx->conx ,$sql);

		$num=pg_num_rows($resultados);

		if ($num!='0'){
			while($row=pg_fetch_array($resultados)){
					$id=$row['id_bien'];
					$sql2="SELECT * FROM datos_bien where id_bien='$id'";
					$resultados2=pg_query($cnx->conx ,$sql2);
						while($row2=pg_fetch_array($resultados2)){
							$valor=$row2['valor_bien'];
							$suma_incorporacion[$i]=$suma_incorporacion[$i]+$valor;
							

							
						}
						}

}

	else {

		$suma_incorporacion[$i]=0;
	}
}

for($i=1;$i<=12;$i++){

		$desde=$anio.'-'.$i.'-'.'01';
		$ultimoDia=date("d",(mktime(0,0,0,$i+1,1,$anio)-1));
		$hasta=$anio.'-'.$i.'-'.$ultimoDia;


//DESINCORPORACION

$sql="SELECT * FROM transaccion where id_tipo_concepto='11' AND fecha_transaccion BETWEEN '$desde' AND '$hasta'";
		$resultados=pg_query($cnx->conx ,$sql);

		$num=pg_num_rows($resultados);

		if ($num!='0'){
			while($row=pg_fetch_array($resultados)){
					$id=$row['id_bien'];
					$sql2="SELECT * FROM datos_bien where id_bien='$id'";
					$resultados2=pg_query($cnx->conx ,$sql2);
						while($row2=pg_fetch_array($resultados2)){
							$valor=$row2['valor_bien'];
							$suma_desincorporacion[$i]=$suma_desincorporacion[$i]+$valor;
							

							
						}
						}

}

	else {

		$suma_desincorporacion[$i]=0;
	}
}




$_SESSION['array1']=$suma_incorporacion[1];
$_SESSION['array2']=$suma_incorporacion[2];
$_SESSION['array3']=$suma_incorporacion[3];
$_SESSION['array4']=$suma_incorporacion[4];
$_SESSION['array5']=$suma_incorporacion[5];
$_SESSION['array6']=$suma_incorporacion[6];
$_SESSION['array7']=$suma_incorporacion[7];
$_SESSION['array8']=$suma_incorporacion[8];
$_SESSION['array9']=$suma_incorporacion[9];
$_SESSION['array10']=$suma_incorporacion[10];
$_SESSION['array11']=$suma_incorporacion[11];
$_SESSION['array12']=$suma_incorporacion[12];


$_SESSION['2array1']=$suma_desincorporacion[1];
$_SESSION['2array2']=$suma_desincorporacion[2];
$_SESSION['2array3']=$suma_desincorporacion[3];
$_SESSION['2array4']=$suma_desincorporacion[4];
$_SESSION['2array5']=$suma_desincorporacion[5];
$_SESSION['2array6']=$suma_desincorporacion[6];
$_SESSION['2array7']=$suma_desincorporacion[7];
$_SESSION['2array8']=$suma_desincorporacion[8];
$_SESSION['2array9']=$suma_desincorporacion[9];
$_SESSION['2array10']=$suma_desincorporacion[10];
$_SESSION['2array11']=$suma_desincorporacion[11];
$_SESSION['2array12']=$suma_desincorporacion[12];

echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=vReporteEstadistico2.php'>";

?>