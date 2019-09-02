<?php 
include("../M/mLogin.php");


	if(isset($_POST["login"])){

		$iniciar = new login;

		$iniciar->user=$_POST["usuario"];
		$iniciar->password=$_POST["contrasena"];
		$iniciar->capcha=$_POST["user_capcha"];
		$iniciar->iniciar();


								}
?>