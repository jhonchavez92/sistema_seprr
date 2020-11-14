<?php
require('scripts/session_start.php');
require('scripts/bd_conexion.php');


$idUsuario = $_SESSION ['id_usuario'];
$TipoUsuario = $_SESSION ['tipo_usuario'];


if ($TipoUsuario==1) {
	header('Location: documentos.php') ;
}elseif ($TipoUsuario==2) {
	header('Location: programaciones_admi.php') ;
}

 ?>

