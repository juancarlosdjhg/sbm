<?php 
session_start();
error_reporting(0);

if(isset($_SESSION['activa'])==TRUE && $_SESSION['activa']==1){
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=V/vMenu.php'>";
 							}

$_SESSION['security_number']=rand(10000,99999);

include("M/mConexion.php");
$cnx = new conexion();
				$cnx->conectar();

$sqlLogin="SELECT * FROM logintry";			
						$resultados=pg_query($cnx->conx ,$sqlLogin);
						while($row2=pg_fetch_assoc($resultados)){
							$intento=$row2['intento'];
							if($intento==3){
														
							echo "<script> alert('Por su Seguridad, el acceso al sistema ha sido temporalmente bloqueado. Por favor espere.')</script>";
							
						}
						}
						


 ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>SBM</title>
    <link rel="stylesheet" href="V/css/style2.css">   
	<script type="text/javascript" src="V/js/jquery.min.js"></script>
	<script type="text/javascript" src="V/js/countdown.js"></script>

	<?php
	if($intento==3){
		?>
	<script type="text/javascript" >

setTimeout(function(){document.getElementById('login-button').disabled=false;document.getElementById('login-button').style.display='initial';document.getElementById('tiempo').style.display='none';alert('El acceso al sistema ha sido restaurado.')},1000 * 120);

	</script>
	<?php } ?>
  </head>

  <body>

    <div class="wrapper">
	<div class="container">
		<h1>Bienvenido</h1>
		<img src="V/images/clouds2.png">
		
		
		<form class="form" name="form" action="C/cLogin.php" method="POST">
			<input name="usuario" pattern="[A-Za-z0-9]{2,20}" title="Solo números y letras" type="text" autocomplete="off" placeholder="Usuario" required>
			<input name="contrasena" type="password" placeholder="Contraseña" pattern="[A-Za-z0-9]{2,20}" title="Solo números y letras" required>
			<input type='text' name='user_capcha' placeholder="Ingrese aqui el capcha" pattern="[0-9]{5}" required maxlength="5">
			<img src="M/image.php" alt="Capcha" /><br><br>
			<div id="div"></div>
			<?php 
			if($intento==3){
				echo '<input type="submit" disabled="true" value="Entrar" style="display:none" id="login-button" name="login">';
				echo '<div id="tiempo">Tiempo de espera para el acceso: <span id="time">02:00</span> minutos</div>';
				}
			else{
				echo '<input type="submit" value="Entrar" id="login-button" name="login">';
			}
			?>

			</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    

    <script src="js/index.js"></script>


    
    
    
  </body>
</html>
