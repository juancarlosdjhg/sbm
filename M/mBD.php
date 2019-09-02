<?php
class bd{

		public $host;
		public $port;
		public $bd;
		public $usuario;
		public $contrasena;

		function registrar(){

		
$nombre="../M/mConexion.php";
$nuevoarchivo = fopen($nombre, "w+"); 
fwrite($nuevoarchivo,'


<?php
class conexion
{
public $host;
public $port;
public $dbname;
public $user;
public $password;
public $conx;
function  conexion(){

$this->host="'.$this->host.'";
$this->port="'.$this->port.'";
$this->dbname="'.$this->bd.'";
$this->user="'.$this->usuario.'";
$this->password="'.$this->contrasena.'";
}

  function conectar(){
    $tiracnx="host=".$this->host." port=".$this->port." dbname=".$this->dbname." user=".$this->user." password=".$this->password."";
    $this->conx=pg_connect($tiracnx);

	  if($this->conx==0){
	    echo "EROR CON EL SERVIDOR O BD";
		 header("Location: V/vBD.php");}

  }//fin de conectar()  
  };
?>

	'); 
fclose($nuevoarchivo);
header("Location: ../index.php");


$nombre2="../M/mConexion2.php";
$nuevoarchivo2 = fopen($nombre2, "w+"); 
fwrite($nuevoarchivo2,'


<?php
class conexion2
{
public $host;
public $port;
public $dbname;
public $user;
public $password;
public $conx;
function  conexion2(){

$this->host="'.$this->host.'";
$this->port="'.$this->port.'";
$this->dbname="'.$this->bd.'";
$this->user="'.$this->usuario.'";
$this->password="'.$this->contrasena.'";
}

  function conectar(){
    $tiracnx="host=".$this->host." port=".$this->port." dbname=".$this->dbname." user=".$this->user." password=".$this->password."";
    $this->conx=pg_connect($tiracnx);

	  if($this->conx==0){
	    echo "EROR CON EL SERVIDOR O BD";
		 header("Location: V/vBD.php");}

  }//fin de conectar()  
  };
?>

	'); 
fclose($nuevoarchivo2);
header("Location: ../index.php");


$nombre3="../M/mConexion3.php";
$nuevoarchivo3 = fopen($nombre3, "w+"); 
fwrite($nuevoarchivo3,'
<?php
$host="'.$this->host.'";
$port="'.$this->port.'";
$dbname="'.$this->bd.'";
$user="'.$this->usuario.'";
$password="'.$this->contrasena.'";




function  conexion3(){

    $tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password."";
    $conx=pg_connect($tiracnx);

	  if($conx==0){
	    echo "EROR CON EL SERVIDOR O BD";
		 header("Location: V/vBD.php");}
  }
?>

	'); 
fclose($nuevoarchivo2);
header("Location: ../index.php");












									} }
?>