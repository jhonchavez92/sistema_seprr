<?php

require('../../scripts/bd_conexion.php');


//si la recarga se hace con el botón del formulario procede el código sgte
if (!empty($_POST))

{

//  función que elimina caracteres raros (comillas, puntos y comas)
    $id = $_POST['id'];
    $tipodoc= utf8_decode(mysqli_real_escape_string($mysqli, $_POST['tipo_doc'])) ;
    $nrodoc = utf8_decode(mysqli_real_escape_string($mysqli, $_POST['nro_doc'])) ;
	$asunto = utf8_decode(mysqli_real_escape_string($mysqli, $_POST['asunto'])) ;



    $sql = "UPDATE tbl_seprr_docs SET nro_doc='$nrodoc', asunto='$asunto', id_tipo_doc='$tipodoc' where id='$id'";
    $result = $mysqli -> query ($sql);


    if($result){
        header ("location: ../../documentos.php");
    }
    else{
        header ("location: ../../documentos.php");
    }

}

?>