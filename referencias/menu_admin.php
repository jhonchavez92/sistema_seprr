<?php 

require('scripts/bd_conexion.php');


if ($pagActiva == 1) {
    $active1 = "active";
}else{
    $active1 = "";
};

if ($pagActiva == 2) {
    $active2 = "active";
}else{
    $active2 = "";
};

if ($pagActiva == 3) {
    $active3 = "active";
}else{
    $active3 = "";
};

if ($pagActiva == 4) {
    $active4 = "active";
}else{
    $active4 = "";
};

if ($pagActiva == 5) {
    $active5 = "active";
}else{
    $active5 = "";
};

if ($pagActiva == 6) {
    $active6 = "active";
}else{
    $active6 = "";
};

if ($pagActiva == 7) {
    $active7 = "active";
}else{
    $active7 = "";
};

if ($pagActiva == 8) {
    $active8 = "active";
}else{
    $active8 = "";
};
?>
<nav class="navbar navbar-default navbar-mobile navbar-sticky bootsnav">

    <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand hidden-md hidden-lg" href="#brand"><img src="assets/dist/img/logo2.png" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left" data-in="" data-out="">

                <li class="<?php echo $active3; ?>">
                    <a href="colaboradores.php"><i class="ti-user"></i> Colaboradores</a>
                </li>

                <li class="dropdown <?php echo $active4; ?>">
                    <a href="documentos_admin.php" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-pencil-alt"></i> Documentos</a>
                    <ul class="dropdown-menu">
                        <li><a href="documentos_admin.php"><i class="fa fa-bars"></i>Consolidado</a></li>
                        <li><a href="docs_admin_sin_programar.php"><i class="fa fa-battery-quarter"></i>Sin programar</a></li>
                        <li><a href="docs_admin_en_elaboracion.php"><i class="fa fa-battery-half"></i>Programados</a></li>
                        <li><a href="docs_admin_en_revision.php"><i class="fa fa-battery-three-quarters"></i>Entregados - en revisión</a></li>
                        <li><a href="docs_admin_finalizados.php"><i class="fa fa-battery-full"></i>Finalizados - aprobados</a></li>
                    </ul>
                </li>
                <li class="dropdown <?php echo $active5; ?>">
                    <a href="programaciones_admi.php" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-layout"></i> Calendario</a>
                    <ul class="dropdown-menu">
                        <li><a href="programaciones_inspecciones_admi.php"><i class="ti-layout"></i>Inspecciones</a></li>
                        <li><a href="programaciones_entrega_docs_admi.php"><i class="ti-layout"></i>Entrega docs</a></li>
                        <li><a href="programaciones_reuniones_admi.php"><i class="ti-layout"></i>Reuniones</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>

                </nav> <!-- /. main navigation -->