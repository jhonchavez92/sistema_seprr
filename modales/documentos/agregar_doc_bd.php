<?php

require('../../scripts/bd_conexion.php');
date_default_timezone_set("America/Lima");

if (!empty($_POST)){

    //Revisar esta fecha esta devolviendo el dia + 1 (es decir siendo 20 devuelve 21)
    $fecha = date("Y-m-d"); 
    $fecha_completa = date("Y-m-d H:i:s"); 
    
    $id_user = mysqli_real_escape_string($mysqli, $_POST['id_user']) ;
    $tipo_doc = mysqli_real_escape_string($mysqli, $_POST['tipo_doc']) ;
    $nro_doc = mysqli_real_escape_string($mysqli, $_POST['nro_doc']) ;
    $asunto = mysqli_real_escape_string($mysqli, $_POST['asunto']) ;

    $fecha_inspecc = '1970-01-01 00:00:00';
    $prioridad = 1;
    $inspeccion = 0;
    $estado_doc = 0;
    $plazo = '1970-01-01';
    $estado_insp = 0;
    $nro_docu_rpta = 'No definido';

    $mysqli->set_charset("utf8");

    $sql = "INSERT INTO tbl_seprr_docs (date_recep, id_user, nro_doc, asunto, id_tipo_doc, fecha_inspec, prioridad, inspec, estado, plazo, estado_inspec, nro_doc_rpta) VALUES ('$fecha_completa', '$id_user','$nro_doc', '$asunto', '$tipo_doc', '$fecha_inspecc', '$prioridad', '$inspeccion', '$estado_doc', '$plazo', '$estado_insp', '$nro_docu_rpta')";

    $result = $mysqli -> query ($sql);


    if($result){

         header('Location: ../../documentos.php') ;
        
    }
    else{

         echo "Se ha producido un eror". mysqli_error();
        //$errors []= "Lo siento algo ha salido mal intenta nuevamente.";
    }

};

 ?>
