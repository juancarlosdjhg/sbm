<?php

	class temporal
	{


	function  temporal(){

         pg_query("CREATE TEMPORARY TABLE usuario_on(usuario integer)");
    
            pg_query("INSERT INTO usuario_on values ('".$_SESSION["idUsuario"]."')");
              
			}


		}

?>

	