<?php 

include("../M/mConexion.php");

class respaldar{

		public $nombreArchivo;


		function respaldo(){

$data_dir = "../V/backup";
$pg_dump_dir = "/opt/lappstack/postgresql/bin/";

$cnx= new conexion();

$dbname[] = $cnx->dbname;
$user = $cnx->user;

$dump_date = date("Ymd_Hs");

$file_name = $data_dir . "/backup_".$dump_date.".sql";
if ($cont = count($dbname)) {
for ($i = 0; $i < $cont; $i++) {
system("sudo $pg_dump_dir/pg_dump -i -U $user $dbname[$i] > $file_name");
//system("sudo $pg_dump_dir./pg_dump -i -U $user -f $file_name $dbname[$i]");
}
} else {
system("$pg_dump_dir/pg_dumpall > $file_name");
}

echo "Respaldo Finalizado";

//				echo "<script>   alertify.success('encontrado');</script>";
//				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/vUsuario.php'>";
																	
											  				
	
						


									


		}//FIN CONSULTAR***********************************************************************



		function restaurar(){
		$cnx = new conexion();
		$cnx->conectar();



$filedir='../V/backup/'.$this->nombreArchivo;
$sql = file_get_contents($filedir); // Leo el archivo
    // Lo siguiente hace gran parte de la magia, nos devuelve todos los tokens no vacíos del archivo
        $tokens = preg_split("/(--.*\s+|\s+|\/\*.*\*\/)/", $sql, null, PREG_SPLIT_NO_EMPTY);
    $length = count($tokens);
    
    $query = '';
    $inSentence = false;
    $curDelimiter = ";";
    // Comienzo a recorrer el string
    for($i = 0; $i < $length; $i++) {
 $lower = strtolower($tokens[$i]);
 $isStarter = in_array($lower, array( // Chequeo si el token actual es el comienzo de una consulta
     'select', 'update', 'delete', 'insert',
     'delimiter', 'create', 'alter', 'drop', 
     'call', 'set', 'use'
 ));

 if($inSentence) { // Si estoy parseando una sentencia me fijo si lo que viene es un delimitador para terminar la consulta
     if($tokens[$i] == $curDelimiter || substr(trim($tokens[$i]), -1*(strlen($curDelimiter))) == $curDelimiter) { 
  // Si terminamos el parseo ejecuto la consulta
  $query .= str_replace($curDelimiter, '', $tokens[$i]); // Elimino el delimitador
  pg_query($cnx->conx ,utf8_encode($query));
  $query = ""; // Preparo la consulta para continuar con la siguiente sentencia
  $tokens[$i] = '';
  $inSentence = false;
     }
 }
 else if($isStarter) { // Si hay que comenzar una consulta, verifico qué tipo de consulta es
     // Si es delimitador, cambio el delimitador usado. No marco comienzo de secuencia porque el delimitador se encarga de eso en la próxima iteración
     if($lower == 'delimiter' && isset($tokens[$i+1]))  
  $curDelimiter = $tokens[$i+1]; 
     else
  $inSentence = true; // Si no, comienzo una consulta 
     $query = "";
 }
 $query .= "{$tokens[$i]} "; // Voy acumulando los tokens en el string que contiene la consulta
    }
		
									} //Fin restaurar();


//************************************************************************************************************/
}
