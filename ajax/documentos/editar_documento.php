<?php

require('../../scripts/bd_conexion.php');
date_default_timezone_set("America/Lima");

if (!empty($_POST)){


    //Revisar esta fecha esta devolviendo el dia + 1 (es decir siendo 20 devuelve 21)
    $fecha = date("Y-m-d"); 
    //$fecha_completa = date("Y-m-d H:i:s"); 

    $id_doc = mysqli_real_escape_string($mysqli, $_POST['id_doc']) ;

    $tipo_doc = mysqli_real_escape_string($mysqli, $_POST['tipo_doc']) ;
    $nro_doc = mysqli_real_escape_string($mysqli, $_POST['nro_doc']) ;
    $encargado = mysqli_real_escape_string($mysqli, $_POST['encargado']) ;
    $asunto = mysqli_real_escape_string($mysqli, $_POST['asunto']) ;
    $inspeccion = mysqli_real_escape_string($mysqli, $_POST['inspeccion']) ;
    $color = mysqli_real_escape_string($mysqli, $_POST['color']) ;
    $color_txt = mysqli_real_escape_string($mysqli, $_POST['color_txt']) ;
    $fecha_recep = mysqli_real_escape_string($mysqli, $_POST['fecha_recep']) ;

// Corresponde a las fechas de inspecciones
   if ($inspeccion==0) {
    $dia_inicio = '1970-01-01' ;
    $dia_final = '1970-01-02' ;
   }elseif ($inspeccion==1) {
    $dia_inicio = $_POST['dia_inicio'] ;
    $dia_final_bd = $_POST['dia_final'] ;
    $date_mod = strtotime($dia_final_bd."+ 1 days");
    $dia_final = date("Y-m-d",$date_mod);
   };

    $inicio_lunes = $_POST['lunes_inicio'] ;
    $fin_lunes = $_POST['lunes_fin'] ;
    $inicio_martes = $_POST['martes_inicio'] ;
    $fin_martes = $_POST['martes_fin'] ;
    $inicio_miercoles = $_POST['miercoles_inicio'] ;
    $fin_miercoles = $_POST['miercoles_fin'] ;
    $inicio_jueves = $_POST['jueves_inicio'] ;
    $fin_jueves = $_POST['jueves_fin'] ;
    $inicio_viernes = $_POST['viernes_inicio'] ;
    $fin_viernes = $_POST['viernes_fin'] ;
    $inicio_sabado = $_POST['sabado_inicio'] ;
    $fin_sabado = $_POST['sabado_fin'] ;
    $inicio_domingo = $_POST['domingo_inicio'] ;
    $fin_domingo = $_POST['domingo_fin'] ;

// Corresponde a las fecha de entrega de la respuesta
    
    $fecha_entrega_form = $_POST['fecha_entrega'] ;

    if ($fecha_entrega_form == 0000-00-00) {
        $fecha_entrega = '1970-01-01';
        $fecha_entrega_fin = '1970-01-02';
    }else{
        $fecha_entrega = $fecha_entrega_form ;
        //opero para sumarle un dia
        $mod_date = strtotime($fecha_entrega."+ 1 days");
        $fecha_entrega_fin = date("Y-m-d",$mod_date);
    };

    $prioridad = $_POST['prioridad'] ;
    $estado_doc = $_POST['estado_doc'] ;
    $doc_rpta = $_POST['doc_rpta'] ;

    $sql17="SELECT nombres, apellidos FROM tbl_users WHERE id='$encargado'";
    $result17 = $mysqli->query($sql17);
    $row17 = $result17 -> fetch_array(MYSQLI_ASSOC);
    $nombre = $row17['nombres'];
    $apellido = $row17['apellidos'];

    $ref1 = "Inspección";
    $ref2 = "Entrega doc rspta.";
    $titulo = $nombre." ".$apellido." | ".$nro_doc." | ".$asunto." | ".$ref1;
    $titulo2 = $nombre." ".$apellido." | ".$nro_doc." | ".$asunto." | ".$ref2;
    $tipo = 0; //Tipo inspecciones
    $tipo1 = 1; //Tipo entrega de documento respuesta

    $mysqli->set_charset("utf8");

    $sql = "UPDATE tbl_seprr_docs SET date_recep ='$fecha_recep', id_user='$encargado', nro_doc='$nro_doc', asunto='$asunto', id_tipo_doc='$tipo_doc', fecha_inspec='$dia_inicio', prioridad='$prioridad', inspec='$inspeccion', estado='$estado_doc', plazo='$fecha_entrega', nro_doc_rpta='$doc_rpta' where id='$id_doc'";

    $result = $mysqli -> query ($sql);

    //BORRAMOS LOS DATOS EXISTENTES DE LA TABLA DE TALLERES
    $sql16 = "DELETE FROM tbl_seprr_calendario WHERE id_doc='$id_doc'";
    $result16 = $mysqli -> query ($sql16);

    if ($inicio_lunes <> 0) {
        $sql2 =" INSERT INTO tbl_seprr_calendario(id_doc, dia, hora_inicio, hora_fin, fecha_inicio, fecha_fin, color, titulo, txtColor, tipo, id_user, estado)VALUES('$id_doc', '1', '$inicio_lunes', '$fin_lunes', '$dia_inicio', '$dia_final', '$color', '$titulo', '$color_txt', '$tipo', '$encargado', '$estado_doc')";
        $result2 = $mysqli -> query ($sql2);
    };

    if ($inicio_martes <> 0) {
        $sql3 =" INSERT INTO tbl_seprr_calendario(id_doc, dia, hora_inicio, hora_fin, fecha_inicio, fecha_fin, color, titulo, txtColor, tipo, id_user, estado)VALUES('$id_doc', '2', '$inicio_martes', '$fin_martes', '$dia_inicio', '$dia_final', '$color', '$titulo', '$color_txt', '$tipo', '$encargado', '$estado_doc')";
        $result3 = $mysqli -> query ($sql3);
    };

    if ($inicio_miercoles <> 0) {
        $sql4 =" INSERT INTO tbl_seprr_calendario(id_doc, dia, hora_inicio, hora_fin, fecha_inicio, fecha_fin, color, titulo, txtColor, tipo, id_user, estado)VALUES('$id_doc', '3', '$inicio_miercoles', '$fin_miercoles', '$dia_inicio', '$dia_final', '$color', '$titulo', '$color_txt', '$tipo', '$encargado', '$estado_doc')";
        $result4 = $mysqli -> query ($sql4);
    };

    if ($inicio_jueves <> 0) {
        $sql8 =" INSERT INTO tbl_seprr_calendario(id_doc, dia, hora_inicio, hora_fin, fecha_inicio, fecha_fin, color, titulo, txtColor, tipo, id_user, estado)VALUES('$id_doc', '4', '$inicio_jueves', '$fin_jueves', '$dia_inicio', '$dia_final', '$color', '$titulo', '$color_txt', '$tipo', '$encargado', '$estado_doc')";
        $result8 = $mysqli -> query ($sql8);
    };

    if ($inicio_viernes <> 0) {
        $sql9 =" INSERT INTO tbl_seprr_calendario(id_doc, dia, hora_inicio, hora_fin, fecha_inicio, fecha_fin, color, titulo, txtColor, tipo, id_user, estado)VALUES('$id_doc', '5', '$inicio_viernes', '$fin_viernes', '$dia_inicio', '$dia_final', '$color', '$titulo', '$color_txt', '$tipo', '$encargado', '$estado_doc')";
        $result9 = $mysqli -> query ($sql9);
    };

    if ($inicio_sabado <> 0) {
        $sql10 =" INSERT INTO tbl_seprr_calendario(id_doc, dia, hora_inicio, hora_fin, fecha_inicio, fecha_fin, color, titulo, txtColor, tipo, id_user, estado)VALUES('$id_doc', '6', '$inicio_sabado', '$fin_sabado', '$dia_inicio', '$dia_final', '$color', '$titulo', '$color_txt', '$tipo', '$encargado', '$estado_doc')";
        $result10 = $mysqli -> query ($sql10);
    };

    if ($inicio_domingo <> 0) {
        $sql11 =" INSERT INTO tbl_seprr_calendario(id_doc, dia, hora_inicio, hora_fin, fecha_inicio, fecha_fin, color, titulo, txtColor, tipo, id_user, estado)VALUES('$id_doc', '0', '$inicio_domingo', '$fin_domingo', '$dia_inicio', '$dia_final', '$color', '$titulo', '$color_txt', '$tipo', '$encargado', '$estado_doc')";
        $result11 = $mysqli -> query ($sql11);
    };


//Agrego al calenadrio el día de la entrega
    $sql22 =" INSERT INTO tbl_seprr_calendario(id_doc, dia, hora_inicio, hora_fin, fecha_inicio, fecha_fin, color, titulo, txtColor, tipo, id_user, estado)VALUES('$id_doc', '0,1,2,3,4,5,6', '08:00:00', '17:00:00', '$fecha_entrega', '$fecha_entrega_fin', '#161ae0', '$titulo2', '#fcfeff', '$tipo1', '$encargado', '$estado_doc')";
    $result22 = $mysqli -> query ($sql22);






    if($result){

     echo "Se ha realizado el registro correctamente.";

 }
 else{

     echo "Error al registrar profesor.". mysqli_error() ;

        //$errors []= "Lo siento algo ha salido mal intenta nuevamente.";
 }


};

?>