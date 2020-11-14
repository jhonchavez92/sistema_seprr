<?php
require('scripts/session_start.php');
require('scripts/bd_conexion.php');

$pagActiva = "4";

$idUsuario = $_SESSION ['id_usuario'];
$TipoUsuario = $_SESSION ['tipo_usuario'];

$sql="SELECT * FROM tbl_users WHERE id='$idUsuario'";
$result = $mysqli->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);

$fecha = date("Y-m-d"); 

//Consulta tabla completa de colaboradores
$sql4="SELECT tbl_users.id, tbl_users.nombres, tbl_users.apellidos FROM tbl_users";
$result4 = $mysqli->query($sql4);

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
                                        <h4>Asignar reunión</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form>
   
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="Encargado">Colaborador.</label>
                                                <select class="form-control" id="encargado">
                                                    <?php 
                                                    while ( $rslt4 = $result4 -> fetch_array(MYSQLI_ASSOC) ) {
                                                        echo "
                                                        <option value='".utf8_encode($rslt4["id"])."'>".utf8_encode($rslt4["nombres"]).' '.utf8_encode($rslt4["apellidos"])."</option>    
                                                        ";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="capacidad">Detalle de reunión</label>
                                                <input class="form-control" type="text" id="asunto" placeholder="Detalle de la reunión" value="">
                                            </div>
                                        </div>

                                        <div id="registro_fecha">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inicio">Fecha Inicio</label>
                                                    <input class="form-control" type="date" id="inicio" required="required" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="final">Fecha Final</label>
                                                    <input class="form-control" type="date" id="final" required="required" value="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="duracion">Color calendario</label>
                                                    <input class="form-control" type="color" id="color_taller" value="#78cfcf" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="duracion">Texto calendario</label>
                                                    <input class="form-control" type="color" id="color_txt" value="#020808" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="final">Dias</label>
                                                <div class="checkbox">
                                                    <input id="lunes" type="checkbox" >
                                                    <label for="lunes">Lunes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="final">Hora inicio</label>
                                                    <input class="form-control" type="time" id="ini_lunes" value="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="final">Hora final</label>
                                                    <input class="form-control" type="time" id="fin_lunes" value="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="martes" type="checkbox" >
                                                    <label for="martes">Martes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_martes" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_martes" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="miercoles" type="checkbox" >
                                                    <label for="miercoles">Miercoles</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_miercoles" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_miercoles" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="jueves" type="checkbox" >
                                                    <label for="jueves">Jueves</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_jueves" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_jueves" value="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="viernes" type="checkbox">
                                                    <label for="viernes">Viernes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_viernes" value="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_viernes" value="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="sabado" type="checkbox" >
                                                    <label for="sabado">Sabado</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_sabado" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_sabado" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <input id="domingo" type="checkbox">
                                                    <label for="domingo">Domingo</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="ini_domingo" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input class="form-control" type="time" id="fin_domingo" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <fieldset class="col-sm-12">
                                            <legend></legend>

                                                <div class='col-sm-3' id='guardar_cambio'>
                                                    <div class='form-group'>

                                                        <input type='button' class='form-control btn btn-success w-md m-b-5' id='guardar_cambios' value='Asignar'>
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

        <script src="scripts/sweetalert.min.js"></script>
        <script>

            $(document).ready(function(){

        //Agregando Datos

        $(document).on("click","#guardar_cambios", function(){

            var encargado = $("#encargado").val();
            var asunto = $("#asunto").val();
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
                $.ajax({
                    url: "ajax/reuniones/agregar_reunion.php",
                    method: "POST",
                    data: {encargado: encargado, asunto: asunto, color: color_taller, color_txt: color_texto, dia_inicio: dia_inicio, dia_final: dia_final, lunes_inicio: lunes_inicio, lunes_fin: lunes_fin, martes_inicio: martes_inicio, martes_fin: martes_fin, miercoles_inicio: miercoles_inicio, miercoles_fin: miercoles_fin, jueves_inicio: jueves_inicio, jueves_fin: jueves_fin, viernes_inicio: viernes_inicio, viernes_fin: viernes_fin, sabado_inicio: sabado_inicio, sabado_fin: sabado_fin, domingo_inicio: domingo_inicio, domingo_fin: domingo_fin},
                    success: function(data){
                        swal("Exito!", "Se ha realizado la asignación con exito!", "success")
                        window.open("programaciones_admi.php", '_parent');
                    //    location.reload();
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