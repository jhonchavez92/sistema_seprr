<?php
require('scripts/session_start.php');
require('scripts/bd_conexion.php');

date_default_timezone_set("America/Lima");

$pagActiva = "4";
$fecha = date("Y-m-d"); 
$fecha_actual = strtotime($fecha);

$idUsuario = $_SESSION ['id_usuario'];
$TipoUsuario = $_SESSION ['tipo_usuario'];

$sql="SELECT * FROM tbl_users WHERE id='$idUsuario'";
$result = $mysqli->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);

$sql2="SELECT * FROM tbl_seprr_docs where id_user='$idUsuario' ORDER BY id DESC";
$result2 = $mysqli->query($sql2);

$sql3="SELECT * FROM tbl_seprr_tipo_doc";
$result3 = $mysqli->query($sql3);

$sql4="SELECT * FROM tbl_seprr_tipo_doc";
$result4 = $mysqli->query($sql4);

$sql5="SELECT * FROM tbl_seprr_tipo_doc";
$result5 = $mysqli->query($sql5);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Documentos | Municipalidad de Surquillo Demo Mac</title>

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
							<i class="pe-7s-note2"></i>
						</div>
						<div class="header-title">
							<h1>Documentos</h1>
							<small>Registro consolidado</small>
							<ol class="breadcrumb">
								<li><a href="inicio.php"><i class="pe-7s-home"></i> Inicio</a></li>
								<li class="active">Documentos</li>
							</ol>
						</div>
					</div>  <!-- /.Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								
								<div class="panel-body">

									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Recepción doc.</th>
													<th>Tipo doc.</th>
													<th>Nro de documento</th>
													<th>Asunto</th>
													<th>Estado</th>	
													<th>Inspección.</th>	
													<th>Fecha de inspección.</th>	
													<th>Plazo</th>	
													<th>Prioridad</th>							
													<th>Acciones</th>

												</tr>
											</thead>
											<tbody>
												<tr>
													<?php  while ( $rslt = $result2 -> fetch_array(MYSQLI_ASSOC) ) {?>

														<td><?php echo date("d/m/Y", strtotime($rslt['date_recep'])); ?></td>

														<?php 
														$tipo = utf8_encode($rslt['id_tipo_doc']);
														if ($tipo=='1') {
															echo '<td>Memo</td>';
														}elseif ($tipo=='2') {
															echo '<td>Oficio</td>';
														}elseif ($tipo=='3') {
															echo '<td>DS</td>';
														}elseif ($tipo=='4') {
															echo '<td>Informe</td>';
														};
														?>

														<td><?php echo utf8_encode($rslt['nro_doc']); ?></td>
														<td><?php echo utf8_encode($rslt['asunto']); ?></td>

														<?php 
														$est = utf8_encode($rslt['estado']);
														$plazo_entrega = date("d/m/Y", strtotime($rslt['plazo']));
														$insp = utf8_encode($rslt['inspec']);

														if ($insp==0) {
															$text ='No Aplica';
															$fecha_inps = '-';
														}elseif ($insp==1) {
															$text ='Si Aplica';
															$fecha_inps = date("d/m/Y", strtotime($rslt['fecha_inspec']));
														};

														if ($est=='0') {
															echo '<td>No programado</td><td>-</td><td>-</td><td>-</td>';
														}elseif ($est=='1') {
															echo '<td>En elaboración</td><td>'.$text.'</td><td>'.$fecha_inps.'</td><td>'.$plazo_entrega.'</td>';
														}elseif ($est=='2') {
															echo '<td>Entregado</td><td>'.$text.'</td><td>'.$fecha_inps.'</td><td>'.$plazo_entrega.'</td>';
														}elseif ($est=='3') {
															echo '<td>Finalizado</td><td>'.$text.'</td><td>'.$fecha_inps.'</td><td>'.$plazo_entrega.'</td>';
														};
														?>

														<?php 
														$priorida = utf8_encode($rslt['prioridad']);
														if ($priorida==3) {
															echo '<td style="color:red;">Muy urgente</td>';
														}elseif ($priorida==2) {
															echo '<td style="color:ORANGE;">Urgente</td>';
														}elseif ($priorida==1) {
															echo '<td>Normal</td>';
														};
														;?>

														<td align="center">

															<?php 
															$estadoo = utf8_encode($rslt['estado']);
															$id_con = $rslt['id'];
															if ($estadoo == 0) {
																$comprob = '#editar_doc_user_no_prog';
															}elseif ($estadoo == 1 ) {
																$comprob = '#editar_doc_user';
															}elseif ($estadoo == 2 or $estadoo == 3  ) {
																$comprob = '#';
															};
															?>

															<button class="btn btn-info btn-sm" data-toggle="modal" data-placement="left" title="Editar" href="#" data-href="#" data-target="<?php echo $comprob; ?>" 
																data-id="<?php echo $rslt['id']; ?>"
																data-nrodoc="<?php echo utf8_encode($rslt['nro_doc']);?>"
																data-asunto="<?php echo utf8_encode($rslt['asunto']);?>"
																data-tipodoc="<?php echo utf8_encode($rslt['id_tipo_doc']);?>">

																<i class="fa fa-pencil" aria-hidden="true"></i></button>
																<button class="btn btn-info btn-sm" data-placement="left" title="Ver datos" onclick="location.href='datos_documento_usuario.php?id_doc=<?php echo $id_con; ?> ';">
																	<i class='fa fa-calendar' aria-hidden='true'></i>
																</button>
															</td>

														</tr>

													<?php } ?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class=" panel panel-bd">
									
									<div class="panel-body">
										
										<button type="button"  href="#" data-href="#" data-toggle="modal" data-target="#agregar_doc" class="btn btn-labeled btn-primary m-b-5">
											<span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>Registrar Documento
										</button>

									</div>

								</div>
							</div>
						</div>
					</div> <!-- /.main content -->
				</div> <!-- /.container -->
			</div> <!-- /.content-wrapper -->
			<!-- start footer -->
			<footer class="footer" style="background: #fff; padding: 15px 0; color: #444; border-top: 1px solid #e1e6ef; padding: 1em; align-self: flex-end;">
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
			$(document).ready(function () {

                "use strict"; // Start of use strict

                $("#dataTableExample2").DataTable({

                	dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                	buttons: [
                	{extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                	{extend: 'excel', title: 'ExampleFile', className: 'btn-sm'}
                	],
                	
                	"language": {
                		"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                	}
                });
            });
        </script>

        <?php 
        include ("modales/documentos/editar_doc_user.php");
        include ("modales/documentos/editar_doc_user_no_programado.php");
        include ('modales/documentos/registrar_documento.php');

        ?>
        <script>

        	$('#editar_doc_user').on('show.bs.modal', function (event) {

          var button = $(event.relatedTarget) // Botón que activó el modal
          var id = button.data('id') // Extraer la información de atributos de datos
          var tipodoc = button.data('tipodoc') // Extraer la información de atributos de datos
          var nrodoc = button.data('nrodoc') // Extraer la información de atributos de datos
          var asunto = button.data('asunto') 

          var modal = $(this)
          modal.find('.modal-title').text('Editar información de documento')
          modal.find('.modal-body #id').val(id)
          modal.find('.modal-body #tipo_doc').val(tipodoc)
          modal.find('.modal-body #nro_doc').val(nrodoc)
          modal.find('.modal-body #asunto').val(asunto)

      })
  </script>

  <script>

  	$('#editar_doc_user_no_prog').on('show.bs.modal', function (event) {

          var button = $(event.relatedTarget) // Botón que activó el modal
          var id = button.data('id') // Extraer la información de atributos de datos
          var tipodoc = button.data('tipodoc') // Extraer la información de atributos de datos
          var nrodoc = button.data('nrodoc') // Extraer la información de atributos de datos
          var asunto = button.data('asunto') 

          var modal = $(this)
          modal.find('.modal-title').text('Editar información de documento')
          modal.find('.modal-body #id').val(id)
          modal.find('.modal-body #tipo_doc').val(tipodoc)
          modal.find('.modal-body #nro_doc').val(nrodoc)
          modal.find('.modal-body #asunto').val(asunto)

      })
  </script>
</body>
</html>