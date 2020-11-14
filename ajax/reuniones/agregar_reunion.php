<?php

require('../../scripts/bd_conexion.php');
date_default_timezone_set("America/Lima");

if (!empty($_POST)){

    //Revisar esta fecha esta devolviendo el dia + 1 (es decir siendo 20 devuelve 21)
    $fecha = date("Y-m-d"); 
    //$fecha_completa = date("Y-m-d H:i:s"); 

    $encargado = mysqli_real_escape_string($mysqli, $_POST['encargado']) ;
    $asunto = mysqli_real_escape_string($mysqli, $_POST['asunto']) ;
    $color = mysqli_real_escape_string($mysqli, $_POST['color']) ;
    $color_txt = mysqli_real_escape_string($mysqli, $_POST['color_txt']) ;
// Corresponde a las fechas de inspecciones
    $dia_inicio = $_POST['dia_inicio'] ;
    $fecha_final_bd = $_POST['dia_final'] ;
    $dia_sumado = strtotime($fecha_final_bd."+ 1 days");
    $dia_final = date("Y-m-d",$dia_sumado);

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


    $sql17="SELECT nombres, apellidos FROM tbl_users WHERE id='$encargado'";
    $result17 = $mysqli->query($sql17);
    $row17 = $result17 -> fetch_array(MYSQLI_ASSOC);
    $nombre = $row17['nombres'];
    $apellido = $row17['apellidos'];

    $ref1 = "Reunión";
    $titulo = $nombre." ".$apellido." | ".$asunto." | ".$ref1;

    $id_doc = "0";
	//2 define a las reuniones
    $tipo ="2";
    //2 indica que esta programado
    $estado_doc = "2";

    $mysqli->set_charset("utf8");

    //BORRAMOS LOS DATOS EXISTENTES DE LA TABLA DE TALLERES
    //$sql16 = "DELETE FROM tbl_seprr_calendario WHERE id_doc='$id_doc'";
    //$result16 = $mysqli -> query ($sql16);

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
};

?>