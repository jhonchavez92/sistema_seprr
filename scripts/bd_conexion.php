<?php 
require_once 'datos_conexion.php';
	
	date_default_timezone_set('America/Lima');

	$mysqli=new mysqli($hostname, $username,$password, $database);  //servidor, usuario de base de datos, contraseña del usuario, nombre de la base de datos

	if(mysqli_connect_errno()) {
		echo 'conexión fallida : ', mysqli_connect_error();
		exit ();
	}

?>