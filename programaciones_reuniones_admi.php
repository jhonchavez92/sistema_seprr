<?php
require('scripts/session_start.php');
require('scripts/bd_conexion.php');

$pagActiva = "5";

$where = "";

if (!empty($_POST)) {

	$valor1 = $_POST['filtro'];

	if ($valor1<>0) {
		$where = "AND id_user='$valor1'";
	}
};

$idUsuario = $_SESSION ['id_usuario'];
$TipoUsuario = $_SESSION ['tipo_usuario'];

//Consulta de los horarios para mostrar en calendaio // esto = 0
$sql0="SELECT * FROM tbl_seprr_calendario WHERE tipo = '2' AND estado<>3 $where";
$result0 = $mysqli->query($sql0);

$sql="SELECT tbl_users.id, tbl_users.nombres, tbl_users.apellidos FROM tbl_users";
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Programaciones | Subgerencia de Estimación, Prevención, Reducción y Reconstrucción</title>

	<?php 
	include ("referencias/ref_css.php");
	?>
	<script src='scripts/js/sweet_alert.js'></script>
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
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="form-group col-sm-3">
								<label for="duracion">SUBGERENCIA</label>
								<select class="form-control" id="sede_selec" name="sede_selec">
									<option value="0">SEPRR</option>
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label for="duracion">Filtro</label>
								<select class="form-control" id="filtro" name="filtro">
									<option value="0">Seleccionar..</option>
									<?php  while ( $rslt3 = $result -> fetch_array(MYSQLI_ASSOC) ) {?>
										<option value="<?php echo utf8_encode($rslt3['id']);?>"><?php echo utf8_encode($rslt3['nombres'])." ".utf8_encode($rslt3['apellidos']);?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-sm-6">
								<label for="filtro_13">Filtrar</label>
								<input type="submit" class="form-control btn btn-primary w-md m-b-5" value="Mostrar Todo" id="boton_sub">
							</div>
						</form>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="panel panel-bd">
								<div class="panel-body">
									<!-- calender -->
									<div id='calendar'></div>
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
	//include ('modales/talleres/registrar_taller.php');
	include ("referencias/ref_js.php");
	?>
	<script>
		$(document).ready(function() {

			$('#calendar').fullCalendar({
				header: {
					left: "prev,next today",
					center: "title",
					right: "agendaWeek,month,listWeek,agendaDay"
				},

				eventRender: function(event, element, view) {
      //check if this instance of the event (one per day is generated for events with only time in their start/end properties) is within any of the ranges defined for it:
      if ((event.ranges.filter(function(range) {
      	return (event.start.isBefore(range.end) &&
      		event.end.isAfter(range.start));
      }).length) > 0) {
        if (event.frequency == "m") { //check whether repetition is monthly
          return ($.inArray(event.start.date(), event.dom) > -1); //show the event if the date of the month is in the defined days of the month for this event
      } else {

      	return true;
      }
  } else {
  	return false;
  };
},

events: [
<?php  while ( $rslt5 = $result0 -> fetch_array(MYSQLI_ASSOC) ) { ?>

	{
		"dow": "<?php echo $rslt5['dia']; ?>",
		"ranges": [{
			"start": "<?php echo $rslt5['fecha_inicio'];?>",
			"end": "<?php echo $rslt5['fecha_fin'];?>"
		}],
		"id": "<?php echo $rslt5['id'];?>",
		"title": "<?php echo utf8_encode($rslt5['titulo']);?>",
		"start": "<?php echo $rslt5['hora_inicio'];?>",
		"end": "<?php echo $rslt5['hora_fin'];?>",
		"color": "<?php echo $rslt5['color'];?>",
		"textColor": "<?php echo $rslt5['txtColor'];?>",
		"url": "#"
	},

<?php } ?>
]
});
		});

		$("#filtro").change(function(){
			$('#boton_sub').val("Filtrar por Tipo");
		});

	</script>
</body>
</html>

