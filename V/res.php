
<?php 
/* Respalda una base de datos de postgresql en un archivo ASCII 
* Copyright GPL(C) 2003-2004 Manuel Montoya (wistar@biomedicas.unam.mx) 
* http://www.atenas.ath.cx/members/mmontoya/index.php?idp=48 
*/ 

//Fecha del backup 
$hoy=(date("d-M-Y")); 

//Nombre del archivo 
$name="centauro-". $hoy . "-backup"; 

//Extensi?n 
$RESPALDO=$name . ".sql"; 

// Limpio el cache 
header("Pragma: cache"); 

// Especifico el mime-type 
header("Content-type: text/plain;"); 
header("Content-Disposition: attachment; filename=".urlencode($name).".sql"); 

//Limpio el cabezal HTTP 
ob_start(); 

//archivo donde se guardan el nobre del usuario y de la BD 
include("../M/mConexion.php");
$res=new conexion();
$res->conectar();

//Donde est? el pgdump? 
$pg_dump="C:\Program Files\PostgreSQL\9.3\bin\pg_dump.exe"; 

//Comando 
//$comando="$pg_dump -c -F p -U $res->user $res->dbname > $RESPALDO"; 
$comando="$pg_dump -F p -U postgres sbm -f $RESPALDO"; 

//"$comando <b>r"; // s?lo lo pinto para pruebas 

exec($comando); 

//-- Lee el archivo y colocalo en el buffer 
readfile ($RESPALDO); 

//-- Lo cierro pero no lo borro (s?lo para pruebas) 
//fclose($RESPALDO); 

//-- Borrar el archivo 
unlink ($RESPALDO); 

//E voila!! 

?>