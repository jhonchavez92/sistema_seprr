<?php
require('scripts/session_start.php');
require('scripts/bd_conexion.php');

$pagActiva = "4";

$idUsuario = $_SESSION ['id_usuario'];
$TipoUsuario = $_SESSION ['tipo_usuario'];

$sql="SELECT * FROM tbl_users WHERE id='$idUsuario'";
$result = $mysqli->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);

//$id_taller_op = $_GET['id_doc'];
//obtendo el id del documento
$id_docum = $_GET['id_doc'];

//Consulta tabla completa de las programaciones COORESPONDIENTE A LAS ENTREGAS DE RESPUESTAS
$sql13="SELECT * FROM tbl_seprr_calendario WHERE tipo = '1' AND id_doc='$id_docum'";
$result13 = $mysqli->query($sql13);
$row13 = $result13 -> fetch_array(MYSQLI_ASSOC);

$plazo_entrega_doc_bd = $row13['fecha_inicio'];
if ($plazo_entrega_doc_bd == '1970-01-01') {
    $plazo_entrega_doc = '0000-00-00';
}else{
    $plazo_entrega_doc = $plazo_entrega_doc_bd;
};

//Consulta tabla completa de las programaciones COORESPONDIENTE A LAS INSPECCIONES
$sql5="SELECT * FROM tbl_seprr_calendario WHERE tipo = '0' AND id_doc='$id_docum' limit 1";
$result5 = $mysqli->query($sql5);
$row5 = $result5 -> fetch_array(MYSQLI_ASSOC);

$color_actual = $row5['color'];
$color_texto = $row5['txtColor'];
$inicio_actual = $row5['fecha_inicio'];

$fin_actual_bd = $row5['fecha_fin'];
$dia_sumado_ = strtotime($fin_actual_bd."- 1 days");
$fin_actual = date("Y-m-d",$dia_sumado_);

//Consulta tabla completa de las programaciones COORESPONDIENTE A LAS INSPECCIONES por cada dia para verificar si esta seleccionado
//LUNES
$sql6="SELECT * FROM tbl_seprr_calendario WHERE tipo = '0' AND id_doc='$id_docum' AND dia = '1'";
$result6 = $mysqli->query($sql6);
$row6 = $result6 -> fetch_array(MYSQLI_ASSOC);

$vali_lun = $row6['id'];

if ($vali_lun <> null) {
    $checkedLunes = "checked";
    $ini_lun = $row6['hora_inicio'];
    $fin_lun = $row6['hora_fin'];
}else{
    $checkedLunes = "";
    $ini_lun = "";
    $fin_lun = "";
};
//MARTES
$sql7="SELECT * FROM tbl_seprr_calendario WHERE tipo = '0' AND id_doc='$id_docum' AND dia = '2'";
$result7 = $mysqli->query($sql7);
$row7 = $result7 -> fetch_array(MYSQLI_ASSOC);

$vali_martes = $row7['id'];

if ($vali_martes <> null) {
    $checkedMartes = "checked";
    $ini_martes = $row7['hora_inicio'];
    $fin_martes = $row7['hora_fin'];
}else{
    $checkedMartes = "";
    $ini_martes = "";
    $fin_martes = "";
};
//MIERCOLES
$sql8="SELECT * FROM tbl_seprr_calendario WHERE tipo = '0' AND id_doc='$id_docum' AND dia = '3'";
$result8 = $mysqli->query($sql8);
$row8 = $result8 -> fetch_array(MYSQLI_ASSOC);

$vali_mier = $row8['id'];

if ($vali_mier <> null) {
    $checkedMiercoles = "checked";
    $ini_mier = $row8['hora_inicio'];
    $fin_mier = $row8['hora_fin'];
}else{
    $checkedMiercoles = "";
    $ini_mier = "";
    $fin_mier = "";
};
//JUEVES
$sql9="SELECT * FROM tbl_seprr_calendario WHERE tipo = '0' AND id_doc='$id_docum' AND dia = '4'";
$result9 = $mysqli->query($sql9);
$row9 = $result9 -> fetch_array(MYSQLI_ASSOC);

$vali_jue = $row9['id'];

if ($vali_jue <> null) {
    $checkedJueves = "checked";
    $ini_jue = $row9['hora_inicio'];
    $fin_jue = $row9['hora_fin'];
}else{
    $checkedJueves = "";
    $ini_jue = "";
    $fin_jue = "";
};
//VIERNES
$sql10="SELECT * FROM tbl_seprr_calendario WHERE tipo = '0' AND id_doc='$id_docum' AND dia = '5'";
$result10 = $mysqli->query($sql10);
$row10 = $result10 -> fetch_array(MYSQLI_ASSOC);

$vali_vie = $row10['id'];

if ($vali_vie <> null) {
    $checkedViernes = "checked";
    $ini_vie = $row10['hora_inicio'];
    $fin_vie = $row10['hora_fin'];
}else{
    $checkedViernes = "";
    $ini_vie = "";
    $fin_vie = "";
};
//SABADO
$sql11="SELECT * FROM tbl_seprr_calendario WHERE tipo = '0' AND id_doc='$id_docum' AND dia = '6'";
$result11 = $mysqli->query($sql11);
$row11 = $result11 -> fetch_array(MYSQLI_ASSOC);

$vali_sab = $row11['id'];

if ($vali_sab <> null) {
    $checkedSabado = "checked";
    $ini_sab = $row11['hora_inicio'];
    $fin_sab = $row11['hora_fin'];
}else{
    $checkedSabado = "";
    $ini_sab = "";
    $fin_sab = "";
};
//DOMINGO
$sql12="SELECT * FROM tbl_seprr_calendario WHERE tipo = '0' AND id_doc='$id_docum' AND dia = '0'";
$result12 = $mysqli->query($sql12);
$row12 = $result12 -> fetch_array(MYSQLI_ASSOC);

$vali_dom = $row12['id'];

if ($vali_dom <> null) {
    $checkedDomingo = "checked";
    $ini_dom = $row12['hora_inicio'];
    $fin_dom = $row12['hora_fin'];
}else{
    $checkedDomingo = "";
    $ini_dom = "";
    $fin_dom = "";
};

//Consulta tabla completa de tipo de docs
$sql3="SELECT * FROM tbl_seprr_tipo_doc";
$result3 = $mysqli->query($sql3);

//Consulta tabla completa de colaboradores
$sql4="SELECT tbl_users.id, tbl_users.nombres, tbl_users.apellidos FROM tbl_users";
$result4 = $mysqli->query($sql4);

//Consulta tabla completa de registro del documento correspondiente
$sql2="SELECT * FROM tbl_seprr_docs WHERE id='$id_docum'";
$result2 = $mysqli->query($sql2);
$row2 = $result2 -> fetch_array(MYSQLI_ASSOC);

//convierto el datetime a solo date
$fecha_registro_docs = $row2['date_recep'];
$oldDate = strtotime($fecha_registro_docs);
$fecha_registro_doc = date('Y-m-d',$oldDate);
$tipo_document = $row2['id_tipo_doc'];
$nro_document = utf8_encode($row2["nro_doc"]);
$id_colaborador = $row2['id_user'];
$asunto_doc = utf8_encode($row2["asunto"]);
$doc_rpta =  utf8_encode($row2["nro_doc_rpta"]);
//definimos si requiere inspección
$estado_documento = $row2['estado'];
if ($estado_documento==0) {
    $estad_docu_1 = "selected";
    $estad_docu_2 = "";
    $estad_docu_3 = "";
    $estad_docu_4 = "";
}elseif ($estado_documento==1) {
    $estad_docu_1 = "";
    $estad_docu_2 = "selected";
    $estad_docu_3 = "";
    $estad_docu_4 = "";
}elseif ($estado_documento==2) {
    $estad_docu_1 = "";
    $estad_docu_2 = "";
    $estad_docu_3 = "selected";
    $estad_docu_4 = "";
}elseif ($estado_documento==3) {
    $estad_docu_1 = "";
    $estad_docu_2 = "";
    $estad_docu_3 = "";
    $estad_docu_4 = "selected";
};
//definimos si requiere inspección
$prioridad_doc = $row2['prioridad'];
if ($prioridad_doc==1) {
    $priori_1 = "selected";
    $priori_2 = "";
    $priori_3 = "";
}elseif ($prioridad_doc==2) {
    $priori_1 = "";
    $priori_2 = "selected";
    $priori_3 = "";
}elseif ($prioridad_doc==3) {
    $priori_1 = "";
    $priori_2 = "";
    $priori_3 = "selected";
};

//definimos si requiere inspeccion
// 0 = no | 1 = si | 2 = no programado
$inspecc = $row2['inspec'];
if ($inspecc==2) {
    $tipo_insp1 = "selected";
    $tipo_insp2 = "";
    $tipo_insp3 = "";
}elseif ($inspecc==1) {
    $tipo_insp1 = "";
    $tipo_insp2 = "selected";
    $tipo_insp3 = "";  
}elseif ($inspecc==0) {
    $tipo_insp1 = "";
    $tipo_insp2 = "";
    $tipo_insp3 = "selected";  
};

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Datos documento | Subgerencia de Estimación, Prevención, Reducción y Reconstrucción</title>
    <script src='assets/jquery-3.3.1.min.js'></script>

    <?php 
    include ("referencias/ref_css.php");
    ?>
</head>
<body>
    <div class="wrapper animsition">
        <!-- main header -->
        <header class="main-header">
            <?php 
            if ($TipoUsuario==1) {
                $referencia_menu='referencias/menu.php';
            }elseif ($TipoUsuario==2) {
                $referencia_menu='referencias/menu_admin.php';
            }
            include ("referencias/encabezado.php");
            include ("$referencia_menu");
            ?>

            <div class="clearfix"></div>
        </header> <!-- /. main header -->

        <!-- /.content-wrapper -->
        <div class="content-wrapper">
            <div class="container">
                <!-- main content -->
                <div class="content">
                    <!-- Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Datos Documento</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="fecha">Fecha Recepc.</label>
                                                <input class="form-control" type="date" id="fecha_recep" value="<?php echo $fecha_registro_doc; ?>" disabled="disabled" >
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="Espacio/Aula">Tipo Doc.</label>
                                                <select class="form-control" id="tipo_doc" disabled="disabled">
                                                    <?php 
                                                    while ( $rslt3 = $result3 -> fetch_array(MYSQLI_ASSOC) ) {

                                                        $id_var = $rslt3["id"];
                                                        if ($id_var==$tipo_document) {
                                                            $opcion="selected";
                                                        }else{
                                                            $opcion="";
                                                        };

                                                        echo "
                                                        <option value='".utf8_encode($rslt3["id"])."' ".$opcion.">".utf8_encode($rslt3["tipo"])."</option>    
                                                        ";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tipo_doc">Nro Doc.</label>
                                                <input class="form-control" type="text" id="nro_doc" value="<?php echo $nro_document; ?>" disabled="disabled" >
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="Encargado">Encargado.</label>
                                                <select class="form-control" id="encargado" disabled="disabled">
                                                    <?php 
                                                    while ( $rslt4 = $result4 -> fetch_array(MYSQLI_ASSOC) ) {
                                                        $id_var1 = $rslt4["id"];
                                                        if ($id_var1==$id_colaborador) {
                                                            $opcion1="selected";
                                                        }else{
                                                            $opcion1="";
                                                        };
                                                        echo "
                                                        <option value='".utf8_encode($rslt4["id"])."' ".$opcion1.">".utf8_encode($rslt4["nombres"]).' '.utf8_encode($rslt4["apellidos"])."</option>    
                                                        ";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="capacidad">Asunto del documento</label>
                                                <input class="form-control" type="text" id="asunto" placeholder="Ingresar el asunto del doc" value="<?php echo $asunto_doc; ?>" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="inspeccion">Corresponde inspección?</label>
                                                <select class="form-control" name="inspeccion" id="inspeccion" disabled="disabled">
                                                    <option value="2" <?php echo $tipo_insp1;?>>Seleccionar opción</option>
                                                    <option value="1" <?php echo $tipo_insp2;?>>Si</option>
                                                    <option value="0" <?php echo $tipo_insp3;?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="registro_fecha" style="display: none;">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inicio">Fecha Inicio</label>
                                                    <input class="form-control" type="date" id="inicio" required="required" value="<?php echo $inicio_actual; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="final">Fecha Final</label>
                                                    <input class="form-control" type="date" id="final" required="required" value="<?php echo $fin_actual; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="duracion">Color calendario</label>
                                                    <input class="form-control" type="color" id="color_taller" value="#f7240c" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="duracion">Texto calendario</label>
                                                    <input class="form-control" type="color" id="color_txt" value="#fcfcfc" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="final">Dias</label>
                                                <div class="checkbox">
                                                    <input id="lunes" type="checkbox" <?php echo $checkedLunes; ?> disabled="disabled">
                                                    <label for="lunes">Lunes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="final">Hora inicio</label>
                                                    <input class="form-control" type="time" id="ini_lunes" value="<?php echo $ini_lun; ?>" disabled="disabled" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="final">Hora final</label>
                                                    <input class="form-control" type="time" id="fin_lunes" value="<?php echo $fin_lun; ?>" disabled="disabled" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="martes" type="checkbox" <?php echo $checkedMartes; ?> disabled="disabled">
                                                    <label for="martes">Martes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_martes" value="<?php echo $ini_martes; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_martes" value="<?php echo $fin_martes; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="miercoles" type="checkbox" <?php echo $checkedMiercoles; ?> disabled="disabled">
                                                    <label for="miercoles">Miercoles</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_miercoles" value="<?php echo $ini_mier; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_miercoles" value="<?php echo $fin_mier; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="jueves" type="checkbox" <?php echo $checkedJueves; ?> disabled="disabled">
                                                    <label for="jueves">Jueves</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_jueves" value="<?php echo $ini_jue; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_jueves" value="<?php echo $fin_jue; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="viernes" type="checkbox" <?php echo $checkedViernes; ?> disabled="disabled">
                                                    <label for="viernes">Viernes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_viernes" value="<?php echo $ini_vie; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_viernes" value="<?php echo $fin_vie; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="sabado" type="checkbox" <?php echo $checkedSabado; ?> disabled="disabled">
                                                    <label for="sabado">Sabado</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_sabado" value="<?php echo $ini_sab; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_sabado" value="<?php echo $fin_sab; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="domingo" type="checkbox" <?php echo $checkedDomingo; ?> disabled="disabled">
                                                    <label for="domingo">Domingo</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_domingo" value="<?php echo $ini_dom; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_domingo" value="<?php echo $fin_dom; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="col-sm-12">
                                            <legend></legend>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inicio">Plazo entrega</label>
                                                    <input class="form-control" type="date" id="plazo_entrega" required="required" value="<?php echo $plazo_entrega_doc; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inicio">Prioridad</label>
                                                    <select class="form-control" name="prioridad" id="prioridad" disabled="disabled">
                                                        <option value="1" <?php echo $priori_1;?>>Normal</option>
                                                        <option value="2" <?php echo $priori_2;?>>Urgente</option>
                                                        <option value="3" <?php echo $priori_3;?>>Muy urgente</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inicio">Estado del documento</label>
                                                    <select class="form-control" name="estado_doc" id="estado_doc" disabled="disabled">
                                                        <option value="0" <?php echo $estad_docu_1;?>>No programado</option>
                                                        <option value="1" <?php echo $estad_docu_2;?>>En proceso - elaboración</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="doc_rpta">Nro del documento Rpta.</label>
                                                    <input class="form-control" type="text" id="doc_rpta" required="required" value="<?php echo $doc_rpta; ?>" disabled="disabled">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-sm-12">
                                            <legend></legend>
                                            <div class='col-sm-3' id='habilitar'>
                                                <div class='form-group'>
                                                    <input type='button' class='form-control btn btn-primary w-md m-b-5' id='editar_datos' value='Habilitar Edición'>
                                                </div></div>
                                                <div class='col-sm-3' id='guardar_cambio' style='display: none;'>
                                                    <div class='form-group'>

                                                        <input type='button' class='form-control btn btn-success w-md m-b-5' id='guardar_cambios' value='Guardar Cambios'>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div> <!-- /.main content -->
                </div> <!-- /.container -->
            </div> <!-- /.content-wrapper -->
            <!-- start footer -->
        <footer class="footer" style="background: #fff; padding: 15px 0; color: #444; border-top: 1px solid #e1e6ef;">
            <div class="container">
                <div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
                <strong>Copyright &copy; 2020-2021 <a href="#">SEPRR-GGRD-MML</a>.</strong> Todos los derechos reservados.
            </div>
        </footer> <!-- /. footer -->
        </div> <!-- ./wrapper -->
        <?php 

        include ("referencias/ref_js.php");
        ?>


        <script>

            $(document).ready(function(){

            //compruebo si esta seleccionado programado
            if($('#inspeccion option:selected').val() == 1) {

               $('#registro_fecha').css('display', 'block');
           };

           $(document).on("click","#editar_datos",function(){

            $('#tipo_doc').attr("disabled", false);
            $('#nro_doc').attr("disabled", false);
  //          $('#encargado').attr("disabled", false);
            $('#asunto').attr("disabled", false);
            $('#inspeccion').attr("disabled", false);
            $('#inicio').attr("disabled", false);
            $('#final').attr("disabled", false);
            //$('#color_taller').attr("disabled", false);
            //$('#color_txt').attr("disabled", false);
            $('#lunes').attr("disabled", false);
            $('#martes').attr("disabled", false);
            $('#miercoles').attr("disabled", false);
            $('#jueves').attr("disabled", false);
            $('#viernes').attr("disabled", false);
            $('#sabado').attr("disabled", false);
            $('#domingo').attr("disabled", false);
            $('#ini_lunes').attr("disabled", false);
            $('#fin_lunes').attr("disabled", false);
            $('#ini_martes').attr("disabled", false);
            $('#fin_martes').attr("disabled", false);
            $('#ini_miercoles').attr("disabled", false);
            $('#fin_miercoles').attr("disabled", false);
            $('#ini_jueves').attr("disabled", false);
            $('#fin_jueves').attr("disabled", false);
            $('#ini_viernes').attr("disabled", false);
            $('#fin_viernes').attr("disabled", false);
            $('#ini_sabado').attr("disabled", false);
            $('#fin_sabado').attr("disabled", false);
            $('#ini_domingo').attr("disabled", false);
            $('#fin_domingo').attr("disabled", false);
            $('#plazo_entrega').attr("disabled", false);
      //      $('#prioridad').attr("disabled", false);
            $('#estado_doc').attr("disabled", false);
      //      $('#doc_rpta').attr("disabled", false);

            $('#habilitar').css('display', 'none'); 

            $('#guardar_cambio').css('display', 'block');

        })
        //Agregando Datos

        $(document).on("click","#guardar_cambios", function(){

            var id_doc = <?php echo $id_docum; ?> ;
            var fecha_recepc = $("#fecha_recep").val();
            var tipo_doc = $("#tipo_doc").val();
            var nro_doc = $("#nro_doc").val();
            var encargado = $("#encargado").val();
            var asunto = $("#asunto").val();
            var inspeccion= $("#inspeccion").val();
            var dia_inicio = $("#inicio").val();
            var dia_final = $("#final").val();
            var color_taller = $("#color_taller").val();
            var color_texto = $("#color_txt").val();

            //var estado = $("#estado").val();

            if( $('#lunes').is(':checked')){
                var lunes_inicio = $("#ini_lunes").val();
                var lunes_fin = $("#fin_lunes").val();
            }else{
                var lunes_inicio = 0;
                var lunes_fin = 0;
            };

            if( $('#martes').is(':checked')){
                var martes_inicio = $("#ini_martes").val();
                var martes_fin = $("#fin_martes").val();
            }else{
                var martes_inicio = 0;
                var martes_fin = 0;
            };

            if( $('#miercoles').is(':checked')){
                var miercoles_inicio = $("#ini_miercoles").val();
                var miercoles_fin = $("#fin_miercoles").val();
            }else{
                var miercoles_inicio = 0;
                var miercoles_fin = 0;
            };

            if( $('#jueves').is(':checked')){
                var jueves_inicio = $("#ini_jueves").val();
                var jueves_fin = $("#fin_jueves").val();
            }else{
                var jueves_inicio = 0;
                var jueves_fin = 0;
            };

            if( $('#viernes').is(':checked')){
                var viernes_inicio = $("#ini_viernes").val();
                var viernes_fin = $("#fin_viernes").val();
            }else{
                var viernes_inicio = 0;
                var viernes_fin = 0;
            };

            if( $('#sabado').is(':checked')){
                var sabado_inicio = $("#ini_sabado").val();
                var sabado_fin = $("#fin_sabado").val();
            }else{
                var sabado_inicio = 0;
                var sabado_fin = 0;
            };

            if( $('#domingo').is(':checked')){
                var domingo_inicio = $("#ini_domingo").val();
                var domingo_fin = $("#fin_domingo").val();
            }else{
                var domingo_inicio = 0;
                var domingo_fin = 0;
            };
            var fecha_entrega = $("#plazo_entrega").val();
            var prioridad = $("#prioridad").val();
            var estado_doc = $("#estado_doc").val();
            var doc_rpta = $("#doc_rpta").val();

                $.ajax({
                    url: "ajax/documentos/editar_documento.php",
                    method: "POST",
                    data: {id_doc: id_doc, fecha_recep: fecha_recepc, tipo_doc: tipo_doc, nro_doc: nro_doc, encargado: encargado, asunto: asunto, inspeccion: inspeccion, color: color_taller, color_txt: color_texto, dia_inicio: dia_inicio, dia_final: dia_final, lunes_inicio: lunes_inicio, lunes_fin: lunes_fin, martes_inicio: martes_inicio, martes_fin: martes_fin, miercoles_inicio: miercoles_inicio, miercoles_fin: miercoles_fin, jueves_inicio: jueves_inicio, jueves_fin: jueves_fin, viernes_inicio: viernes_inicio, viernes_fin: viernes_fin, sabado_inicio: sabado_inicio, sabado_fin: sabado_fin, domingo_inicio: domingo_inicio, domingo_fin: domingo_fin, fecha_entrega: fecha_entrega, prioridad: prioridad, estado_doc: estado_doc, doc_rpta: doc_rpta},
                    success: function(data){
                        location.reload();
                    }
                })
        })
});
</script>

<script>
    $('#inspeccion').change(function() {
     if($('#inspeccion option:selected').val() == 0) {

        $('#registro_fecha').css('display', 'none');
    }
    else {
        $('#registro_fecha').css('display', 'block');
    }
});

</script>

</body>
</html>