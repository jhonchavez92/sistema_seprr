<?php
require('scripts/session_start.php');
require('scripts/bd_conexion.php');

$pagActiva = "3";

$idUsuario = $_SESSION ['id_usuario'];
$TipoUsuario = $_SESSION ['tipo_usuario'];

$sql="SELECT * FROM tbl_users WHERE id='$idUsuario'";
$result = $mysqli->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);

$sql2="SELECT * FROM tbl_sedes";
$result2 = $mysqli->query($sql2);
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Colaboradores | Subgerencia de Estimación, Prevención, Reducción y Reconstrucción</title>
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
					<div class="content-header">
						<div class="header-icon">
							<i class="pe-7s-users"></i>
						</div>
						<div class="header-title">
							<h1>Registro de Colaboradores</h1>
							<small>Consulta</small>
							<ol class="breadcrumb">
								<li><a href="inicio.php"><i class="pe-7s-home"></i> Inicio</a></li>
								<li class="active">Colaborador</li>
							</ol>
						</div>
					</div>  <!-- /.Content Header (Page header) -->

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">Todos</a></li>
							</ul>
							<!-- Tab panels -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab1">
									<div class="panel-body">
										<div class="col-sm-12" id="colaboradores_tot" >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class=" panel panel-bd">
								
								<div class="panel-body">
									
									<button type="button"  href="#" data-href="#" data-toggle="modal" data-target="#registrar_colaborador" class="btn btn-labeled btn-primary m-b-5">
										<span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>Registrar
									</button>

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
	include ('modales/colaboradores/registrar_colaborador.php');
	include ("referencias/ref_js.php");
	?>
	<script src="scripts/sweetalert.min.js"></script>
	<script>

		$(document).ready(function(){
    		//Obtenemos los datos de alumnos para la pestaña de todos
    		function obtener_datos(){
    			$.ajax({
    				url: "ajax/colaboradores/mostrar_colaboradores_totales.php",
    				method: "POST",
    				success: function(data){
    					$("#colaboradores_tot").html(data)
    				}
    			})
    		}
    		obtener_datos();

    	//Agregando Datos

    	$(document).on("click","#add_colaborador", function(){

    		if ($("#nombres_add").val()==""){
    			//alert("Debe ingresar los nombres y apellidos del colaborador a registrar");
    			swal("Error!","Debe ingresar los nombres  del colaborador a registrar", "warning");
    		} else if ($("#apellidos").val()==""){
				swal("Error!","Debe ingresar los apellidos del colaborador a registrar", "warning");
    		} else if ($("#fecha_nac").val()==""){
    			swal("Error!","Debe ingresar le fecha de nacimiento del colaborador a registrar", "warning");
    		} else if ($("#id_ingreso").val()==""){
    			swal("Error!","Debe definir el id de ingreso al sistema del colaborador a registrar", "warning");
    		} else if ($("#pass_ingreso").val()==""){
    			swal("Error!","Debe definir la contraseña de ingreso al sistema del colaborador a registrar", "warning");
    		}else if ($("#sexo").val()==""){
    			swal("Error!","Debe definir el sexo del colaborador a registrar", "warning");
    		}else if ($("#area").val()==""){
    			swal("Error!","Debe definir el área del colaborador a registrar", "warning");
    		}else{
    			var nombres_adds = $("#nombres_add").val();
    			var apellidos_add = $("#apellidos").val();
    			var sexo_add = $("#sexo").val();
    			var celular_add = $("#celular").val();
    			var nacimiento_add = $("#fecha_nac").val();
    			var dni_add = $("#dni").val();
    			var direccion_add = $("#direccion").val();
    			var distrito_add = $("#dist").val();
    			var email_add = $("#email").val();
    			var especialidad_add = $("#especialidad_").val();
    			var area_add = $("#area").val();
    			var id_acceso_add = $("#id_ingreso").val();
    			var pass_acceso_add = $("#pass_ingreso").val();

    			$.ajax({
    				url: "ajax/colaboradores/registrar_colaborador.php",
    				method: "POST",
    				data: {nombres: nombres_adds, apellidos: apellidos_add, sexo: sexo_add, celular: celular_add, fecha_nac: nacimiento_add, dni: dni_add, direccion: direccion_add, distrito: distrito_add, email: email_add, especialidad: especialidad_add, area: area_add, acceso: id_acceso_add, pass: pass_acceso_add},
    				success: function(data){
    					obtener_datos();
    					swal("Exito!", data, "success")
    					//$('#registrar_colaborador_form')[0].reset();
    					//$('#registrar_colaborador').modal('hide');
    					location.reload();
    				//	alert(data);
    				
    				//	location.reload();
    				}
    			})
    		};
    	})
    });

</script>
</body>
</html>