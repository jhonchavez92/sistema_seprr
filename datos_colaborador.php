<?php
require('scripts/session_start.php');
require('scripts/bd_conexion.php');

$pagActiva = "3";

$idUsuario = $_SESSION ['id_usuario'];
$TipoUsuario = $_SESSION ['tipo_usuario'];

$idColaborador = $_GET ['id_colaborador'];

$sql="SELECT * FROM tbl_users WHERE id='$idColaborador'";
$result = $mysqli->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);

$nombres = $row['nombres'];
$apellidos = $row['apellidos'];
$correo = $row['email'];
$cel = $row['cel'];
$sexo_al = $row['sexo'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Datos Colaborador | Subgerencia de Estimación, Prevención, Reducción y Reconstrucción</title>
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
						<div class="header-icon"><i class=" <?php if( $row['sexo']=="F"){echo "pe-7s-user-female";}else{echo "pe-7s-user";} ?> "></i></div>
						<div class="header-title" id="datos_nombres">

							
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">Datos Personales</a></li>
							</ul>
							<!-- Tab panels -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab1">
									<div class="panel-body">
										<div class="col-sm-12" id="datos_personal">
										</div>
									</div>
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

			//Obtenemos los datos de alumnos para la pestaña Hoy
    		function obtener_datos(){
    			var id_colabo = '<?php echo $idColaborador;?>';
    			$.ajax({
    				url: "ajax/colaboradores/datos_personal_colaborador.php",
    				method: "POST",
    				data:{id_colaborador: id_colabo},
    				success: function(data){
    					$("#datos_personal").html(data)
    				}
    			})	
    		}
    		function obtener_nombres(){
    			var id_colabo = '<?php echo $idColaborador;?>';
    			$.ajax({
    				url: "ajax/colaboradores/mostrar_nombre.php",
    				method: "POST",
    				data:{id_colaborador: id_colabo},
    				success: function(data){
    					$("#datos_nombres").html(data)
    				}
    			})
    			
    		}
    		obtener_nombres();
    		obtener_datos();
    	
    	//Agregando Datos

    	$(document).on("click","#guardar_cambios", function(){

    			var id_colaborador = $("#id_colaboradorr").val();
    			var nombres_adds = $("#nombres").val();
    			var apellidos_add = $("#apellidos").val();
    			var sexo_add = $("#sexo").val();
    			var celular_add = $("#celular").val();
    			var nacimiento_add = $("#nacimiento").val();
    			var dni_add = $("#dni").val();
    			var direccion_add = $("#direccion").val();
    			var distrito_add = $("#distrito").val();
    			var email_add = $("#email").val();
    			var area_add = $("#area").val();
    			var especialidad_add = $("#especialidad").val();
    			var id_ingreso_add = $("#id_ingreso").val();
    			
    			$.ajax({
    				url: "ajax/colaboradores/editar_colaborador.php",
    				method: "POST",
    				data: {id_colab: id_colaborador, nombres: nombres_adds, apellidos: apellidos_add, sexo: sexo_add, celular: celular_add, nacimiento: nacimiento_add, dni: dni_add, direccion: direccion_add, distrito: distrito_add, email: email_add, area: area_add, especialidad: especialidad_add, id_ingreso: id_ingreso_add},
    				success: function(data){
    					obtener_datos();
    					obtener_nombres();
    					//alert(data);
    				
    				}
    			})
    	})

    	//Habilitar Edición
    	$(document).on("click","#editar_datos",function(){

    		$('#nombres').attr("disabled", false);
    		$('#apellidos').attr("disabled", false);
    		$('#sexo').attr("disabled", false);
    		$('#dni').attr("disabled", false);
    		$('#nacimiento').attr("disabled", false);
    		$('#email').attr("disabled", false);
    		$('#direccion').attr("disabled", false);
    		$('#distrito').attr("disabled", false);
    		$('#celular').attr("disabled", false);
    		$('#area').attr("disabled", false);
    		$('#especialidad').attr("disabled", false);
    		$('#id_ingreso').attr("disabled", false);

    		$('#habilitar').css('display', 'none'); 

    		$('#guardar_cambio').css('display', 'block');

    	})
    });

</script>


</body>
</html>