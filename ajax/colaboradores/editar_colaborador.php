<?php 
require('../../scripts/bd_conexion.php');

//si la recarga se hace con el botón del formulario procede el código sgte
if (!empty($_POST))

{
	$id = mysqli_real_escape_string($mysqli, $_POST['id_colab']) ;
    $nombres = mysqli_real_escape_string($mysqli, $_POST['nombres']) ;
    $apellidos = mysqli_real_escape_string($mysqli, $_POST['apellidos']) ;
    $sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']) ;
    $celular = mysqli_real_escape_string($mysqli, $_POST['celular']) ;
    $nacimiento = mysqli_real_escape_string($mysqli, $_POST['nacimiento']) ;
    $dni = mysqli_real_escape_string($mysqli, $_POST['dni']) ;
    $direccion = mysqli_real_escape_string($mysqli, $_POST['direccion']) ;
    $distrito = mysqli_real_escape_string($mysqli, $_POST['distrito']) ;
    $email = mysqli_real_escape_string($mysqli, $_POST['email']) ;
    $area = mysqli_real_escape_string($mysqli, $_POST['area']) ;
    $especialidad = mysqli_real_escape_string($mysqli, $_POST['especialidad']) ;
    $id_ingreso = mysqli_real_escape_string($mysqli, $_POST['id_ingreso']) ;



    $mysqli->set_charset("utf8");
    
    $sql = "UPDATE tbl_users SET nombres='$nombres', apellidos='$apellidos', sexo='$sexo', email='$email', cel='$celular', nacimiento='$nacimiento', distrito='$distrito', dni='$dni', direccion='$direccion', area='$area' , especialidad='$especialidad', id_acceso='$id_ingreso' where id='$id'";
    $result = $mysqli -> query ($sql);


    if($result){
        echo "Los datos han sido actualizados satisfactoriamente.";
    }
    else{
        echo "Lo siento algo ha salido mal intenta nuevamente.";
    }

}

 ?>