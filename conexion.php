<?php
	
	$mysqli = new mysqli('localhost', 'root', 'Palamor_5', 'jugadores');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
         printf("Conexión de Servidor: %s\n", $mysqli->server_info);
?>
