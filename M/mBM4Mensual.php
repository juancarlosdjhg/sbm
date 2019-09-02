<?php  
include("mConexion.php");

$_SESSION["suma_mes_anterior"]=0;
$_SESSION["suma_incorporacion"]=0;
$_SESSION["suma_desincorporacion"]=0;
$_SESSION["suma_desincorporacion_por_investigar"]=0;
$_SESSION["existencia_total"]=0;
$_SESSION["mes"]=0;
$_SESSION["anio"]=0;



class bm4{

public $id_mes;
public $id_anio;


									

function llenarAnio(){ 

$anioActual=Date("Y");

	echo'<select name="id_anio" class="text" id="id_anio" required="required" onchange="consultar2()">';
	echo '<option value="">Seleccione</option>';
			for($i=$anioActual;$i>=2010;$i--){


				echo '<option value=';
				echo $i;
				echo '>';
				echo $i;
				echo '</option>';			
			}

			echo '</select>';

	}



function consultar(){

		$cnx = new conexion();
		$cnx->conectar();

/* //////////////////////////////////// Calculo ultimo dia del Mes///////////////////////////////////////////// */

		if ($this->id_mes=='01' || $this->id_mes=='03' || $this->id_mes=='05' || $this->id_mes=='07' || $this->id_mes=='08' || $this->id_mes=='10' || $this->id_mes=='12') {
			
			$ultimo_dia=31;
		}

		if ($this->id_mes=='04' || $this->id_mes=='06' || $this->id_mes=='09' || $this->id_mes=='11') {
			$ultimo_dia=30;
		}

		if($this->id_mes=='02'){

			$anio=$this->id_anio;
				if ($anio%4==0) 
					$ultimo_dia=29;
				else
					$ultimo_dia=28;								
		}

/* //////////////////////////////////// Calculo Mes Anterior //////////////////////////////////////////// */


		if($this->id_mes>1){

			$mes_anterior=$this->id_mes-1;
					}

		else{
			$this->id_anio=$this->id_anio-1;
			$mes_anterior=12;
		}

/* //////////////////////////////////// Calculo Ultimo dia Mes Anterior //////////////////////////////////////////// */


		if ($mes_anterior=='01' || $mes_anterior=='03' || $mes_anterior=='05' || $mes_anterior=='07' || $mes_anterior=='08' || $mes_anterior=='10' || $mes_anterior=='12') {
			
			$ultimo_dia_mes_anterior=31;
		}

		if ($mes_anterior=='04' || $mes_anterior=='06' || $mes_anterior=='09' || $mes_anterior=='11') {
			$ultimo_dia_mes_anterior=30;
		}

		if($mes_anterior=='02'){

			$anio=$this->id_anio;
				if ($anio%4==0) 
					$ultimo_dia_mes_anterior=29; 
				else
					$ultimo_dia_mes_anterior=28;								
		}


		
		$desde_mes_anterior=$this->id_anio.'-'.$mes_anterior.'-'.'01';
		$hasta_mes_anterior=$this->id_anio.'-'.$mes_anterior.'-'.$ultimo_dia_mes_anterior;

		$desde=$this->id_anio.'-'.$this->id_mes.'-'.'01';
		$hasta=$this->id_anio.'-'.$this->id_mes.'-'.$ultimo_dia;

		$_SESSION["mes"]=$this->id_mes;
		$_SESSION["anio"]=$this->id_anio;

		$suma_mes_anterior=0;
		$sql="SELECT * FROM transaccion WHERE id_tipo_concepto='10' AND fecha_transaccion BETWEEN '$desde_mes_anterior' AND '$hasta_mes_anterior'";
		$resultados=pg_query($cnx->conx ,$sql); 
			while($row=pg_fetch_array($resultados)){
					$id=$row['id_bien'];
					$sql2="SELECT * FROM datos_bien where id_bien='$id'";
					$resultados2=pg_query($cnx->conx ,$sql2);
						while($row2=pg_fetch_array($resultados2)){
							$valor=$row2['valor_bien'];
							$suma_mes_anterior=$suma_mes_anterior+$valor;

						}
						}

						$_SESSION["suma_mes_anterior"]=$suma_mes_anterior;
			

		$suma_incorporacion=0;

		$sql="SELECT * FROM transaccion where id_tipo_concepto='10' AND fecha_transaccion BETWEEN '$desde' AND '$hasta'";
		$resultados=pg_query($cnx->conx ,$sql); 
			while($row=pg_fetch_array($resultados)){
					$id=$row['id_bien'];
					$sql2="SELECT * FROM datos_bien where id_bien='$id'";
					$resultados2=pg_query($cnx->conx ,$sql2);
						while($row2=pg_fetch_array($resultados2)){
							$valor=$row2['valor_bien'];
							$suma_incorporacion=$suma_incorporacion+$valor;
							$_SESSION["suma_incorporacion"]=$suma_incorporacion;
						}
						}


		$suma_desincorporacion=0;

		$sql="SELECT * FROM transaccion where id_tipo_concepto='11' AND fecha_transaccion BETWEEN '$desde' AND '$hasta'";
		$resultados=pg_query($cnx->conx ,$sql); 
			while($row=pg_fetch_array($resultados)){
					$id=$row['id_bien'];
					$sql2="SELECT * FROM datos_bien where id_bien='$id'";
					$resultados2=pg_query($cnx->conx ,$sql2);
						while($row2=pg_fetch_array($resultados2)){
							$valor=$row2['valor_bien'];
							$suma_desincorporacion=$suma_desincorporacion+$valor;
							$_SESSION["suma_desincorporacion"]=$suma_desincorporacion;

						}
						}


	/* //////////////////////////////////// Falta Desincorporaciones por Investigar///////////////////////////////////////////// */

		$suma_desincorporacion_por_investigar=0;
		$_SESSION["suma_desincorporacion_por_investigar"]=$suma_desincorporacion_por_investigar;

		$existencia_total=($suma_mes_anterior+$suma_incorporacion)-$suma_desincorporacion-$suma_desincorporacion_por_investigar;
		$_SESSION["existencia_total"]=$existencia_total;


		echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vBM4MensualDetalles.php'>";
}

function aMoneda($value) {
  return number_format($value, 2, ',','.').' Bs' ;
}


}


?>