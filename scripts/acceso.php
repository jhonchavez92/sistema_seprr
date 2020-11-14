<?php

require ('bd_conexion.php');

//funcion de php que indica que vamos a iniciar sesión
session_start();

if(isset($_SESSION["id_usuario"])){

    header ("location: ../inicio.php");

}

if (!empty($_POST)) {

//llamamos a la conexion a la base de datos
sleep(1);
//  función que elimina caracteres raros (comillas, puntos y comas)
    $usuario = mysqli_real_escape_string($mysqli,$_POST['usuariolg']);
    $password = mysqli_real_escape_string($mysqli,$_POST['passlg']);

	$sha1_pass = sha1($password);

	$sql = "SELECT id, id_categ FROM tbl_users WHERE pass = '$sha1_pass' AND id_acceso = '$usuario'";
	$result = $mysqli -> query ($sql);
	$rows = $result -> num_rows;

	if($rows > 0){

		$row = $result ->fetch_assoc();

    //Se definen las variables de sesión
	$_SESSION['id_usuario'] = $row['id'];
	$_SESSION['tipo_usuario'] = $row['id_categ'];

		echo json_encode(array('error' => false));

	}else{
		echo json_encode(array('error' => true));
        
	}

}
?>
