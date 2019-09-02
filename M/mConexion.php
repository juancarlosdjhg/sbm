


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

$this->host="localhost";
$this->port="5432";
$this->dbname="sbm";
$this->user="postgres";
$this->password="12345";
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

	