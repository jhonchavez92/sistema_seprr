<?php

require('../../scripts/bd_conexion.php');
date_default_timezone_set("America/Lima");

if (!empty($_POST)){


    //Revisar esta fecha esta devolviendo el dia + 1 (es decir siendo 20 devuelve 21)
    $fecha = date("Y-m-d"); 
    $fecha_completa = date("Y-m-d H:i:s"); 

    $nombres = mysqli_real_escape_string($mysqli, $_POST['nombres']) ;
    $apellidos = mysqli_real_escape_string($mysqli, $_POST['apellidos']) ;
    $sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']) ;
    $celular = mysqli_real_escape_string($mysqli, $_POST['celular']) ;
    $dni = mysqli_real_escape_string($mysqli, $_POST['dni']) ;
    $fecha_nac = mysqli_real_escape_string($mysqli, $_POST['fecha_nac']) ;
    $direccion = mysqli_real_escape_string($mysqli, $_POST['direccion']) ;
    $distrito = mysqli_real_escape_string($mysqli, $_POST['distrito']) ;
    $email = mysqli_real_escape_string($mysqli, $_POST['email']) ;
    $especialidad = mysqli_real_escape_string($mysqli, $_POST['especialidad']) ;
    $area = mysqli_real_escape_string($mysqli, $_POST['area']) ;
    $id_acceso = mysqli_real_escape_string($mysqli, $_POST['acceso']) ;
    $pass_acceso = mysqli_real_escape_string($mysqli, $_POST['pass']) ;
    $id_categ = 1;

    $password= sha1($pass_acceso);

    $mysqli->set_charset("utf8");

    $sql = "INSERT INTO tbl_users (id_acceso, pass, id_categ, email, cel, nombres, apellidos, sexo, direccion, distrito, dni, fecha_reg, fecha_reg_com, especialidad, area, nacimiento) VALUES ('$id_acceso', '$password', '$id_categ', '$email', '$celular', '$nombres', '$apellidos', '$sexo', '$direccion', '$distrito', '$dni', '$fecha', '$fecha_completa', '$especialidad', '$area', '$fecha_nac')";

    $result = $mysqli -> query ($sql);

    if($result){
         echo "Se ha realizado el registro correctamente.";
    }
    else{
         echo "Error al registrar colaborador(a).". mysqli_error() ;
         
        //$errors []= "Lo siento algo ha salido mal intenta nuevamente.";
         
    }
};

 ?>