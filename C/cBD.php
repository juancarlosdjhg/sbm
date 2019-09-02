<?php


session_start();
include("../M/mBD.php");

if(isset($_POST["registrar"])){

		$registrar = new bd;


		$registrar->host=$_POST["host"];
		$registrar->port=$_POST["port"];
		$registrar->bd=$_POST["bd"];
		$registrar->usuario=$_POST["usuario"];
		$registrar->contrasena=$_POST["contrasena"];
		$registrar->registrar();

							  }




?>