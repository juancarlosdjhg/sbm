<?php
include("mConexion.php");
		$cnx = new conexion();
		$cnx->conectar();

$anio='2015';
$suma_incorporacion=array(0,0,0,0,0,0,0,0,0,0,0,0);
for($i=1;$i<=12;$i++){

		$desde=$anio.'-'.$i.'-'.'01';
		$ultimoDia=date("d",(mktime(0,0,0,$i+1,1,$anio)-1));
		$hasta=$anio.'-'.$i.'-'.$ultimoDia;

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
							$_SESSION["suma_incorporacion"]=$suma_incorporacion;
						}
						}

}

	else {

		$suma_incorporacion[$i]=0;
	}
}

echo "-----------------------------------------";
for($i=1;$i<=12;$i++){
echo "<br> Mes";
echo $i;
echo "--->";
echo $suma_incorporacion[$i];

}
?>