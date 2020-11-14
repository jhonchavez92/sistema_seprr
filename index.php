<?php
session_start();

if(isset($_SESSION["id_usuario"])){
    header ("location: inicio.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inicio de Sesión | Subgerencia de Estimación, Prevención, Reducción y Reconstrucción | Municipalidad Metropolitana de Lima</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/ico/favicon.png" />

  <link rel="stylesheet" type="text/css" href="login/assets_ingreso/assets/plugins/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="login/assets_ingreso/assets/plugins/font-awesome/css/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="login/assets_ingreso/assets/css/main.css"/>
  <link rel="stylesheet" type="text/css" href="login/assets_ingreso/assets/css/main-responsive.css"/>

  <link rel="stylesheet" type="text/css" id="skin_color" href="login/assets_ingreso/assets/css/styles.css"/>
  <!--<link rel="stylesheet" href="dist/css/main.css">-->
</head>

<body class="login example2">
  <div class="error">
    <span>Datos de ingreso no válidos, inténtalo de nuevo porfavor</span>
  </div>
  <div class="main-login col-sm-4 col-sm-offset-4">
    <div class="logo">
      <img src="login/assets_ingreso/assets/images/logo-siged.png" alt="" class="img-responsive">

    </div>
    <div class="box-login" style="display: block;">

      <h3>Acceso a sistema</h3>

      <form action="" id="formlg" name="formlg">            
        <div class="form-group">
          <span class="field-validation-valid cssMessageError" data-valmsg-for="LOGIN" data-valmsg-replace="true"></span>
          <span class="input-icon">
            <input class="form-control" data-val="true" data-val-required="(*) Ingrese su Usuario." id="usuariolg" name="usuariolg" placeholder="Usuario" type="text" value="" />
            <i class="fa fa-user"></i>
          </span>
        </div>
        <div class="form-group form-actions">
          <span class="field-validation-valid cssMessageError" data-valmsg-for="PASSWORD" data-valmsg-replace="true"></span>
          <span class="input-icon">
            <input class="form-control password" data-val="true" data-val-required="(*) Ingrese su Contraseña." id="passlg" name="passlg" placeholder="Contraseña" type="password" />
            <i class="fa fa-lock"></i>
          </span>
        </div>
        <div>
        <input type="submit" class="botonlg" value="Iniciar Sesión">
        </div>
        <div id="divErrorIngreso"class="errorHandler alert alert-danger no-display" style="display:none">
          <button class="close" data-dismiss="alert">× </button>
          <i class="fa fa-times-circle"></i>
          <strong>Atención!</strong>
          <br />
          <label></label>
        </div>
        <input id="ID_ACCESO" name="ID_ACCESO" type="hidden" value="0" />
      </form>    


    </div>
    <div class="copyright">2020 © MML - GGRD - SEPRR. </div>

  </div>

  <div id="contenedor" class='modal fade in contenedor' data-backdrop="static" data-keyboard="false">
    <div class='seccionModal'>
    </div>
</div>
<div class="fondo-bottom"></div>



  <script src="login/jquery-3.1.1.min.js"></script>
  <script src="login/main.js"></script>

</body>
</html>
