<?php
require('scripts/session_start.php');
require('scripts/bd_conexion.php');

$pagActiva = "1";

$idUsuario = $_SESSION ['id_usuario'];
$TipoUsuario = $_SESSION ['tipo_usuario'];

$fecha_hoy = date("d-m-Y");

$sql="SELECT * FROM tbl_users WHERE id='$idUsuario'";
$result = $mysqli->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);

$sql2="SELECT tbl_seprr_docs.id, DATE_FORMAT(tbl_seprr_docs.date_recep,'%d-%m-%Y') as fecha_recep , tbl_seprr_docs.nro_doc, tbl_seprr_docs.asunto, tbl_seprr_tipo_doc.tipo, tbl_seprr_prioridad_doc.prioridad, DATE_FORMAT(tbl_seprr_docs.fecha_inspec,'%d-%m-%Y') as fecha_inspeccion  from  tbl_seprr_docs, tbl_seprr_tipo_doc, tbl_seprr_prioridad_doc where tbl_seprr_tipo_doc.id = tbl_seprr_docs.id_tipo_doc and tbl_seprr_prioridad_doc.id = tbl_seprr_docs.prioridad and id_user='$idUsuario' and DATE_FORMAT(tbl_seprr_docs.fecha_inspec,'%d-%m-%Y') = '$fecha_hoy'";
$result2 = $mysqli -> query($sql2);

$sql3="SELECT * FROM tbl_seprr_tipo_doc";
$result3 = $mysqli->query($sql3);

$sql4="SELECT tbl_seprr_docs.id, DATE_FORMAT(tbl_seprr_docs.date_recep,'%d-%m-%Y') as fecha_recep , tbl_seprr_docs.nro_doc, tbl_seprr_docs.asunto, tbl_seprr_tipo_doc.tipo, tbl_seprr_prioridad_doc.prioridad, DATE_FORMAT(tbl_seprr_docs.fecha_inspec,'%d-%m-%Y') as fecha_inspeccion  from  tbl_seprr_docs, tbl_seprr_tipo_doc, tbl_seprr_prioridad_doc where tbl_seprr_tipo_doc.id = tbl_seprr_docs.id_tipo_doc and tbl_seprr_prioridad_doc.id = tbl_seprr_docs.prioridad and id_user='$idUsuario' and DATE_FORMAT(tbl_seprr_docs.plazo,'%d-%m-%Y') = '$fecha_hoy'";
$result4 = $mysqli -> query($sql4);

?>

<!DOCTYPE html>
<html lang="es">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='assets/jquery-3.3.1.min.js'></script>

	<title>Inicio | Subgerencia de Estimación, Prevención, Reducción y Reconstrucción</title>

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
							<h1>Programaciones para Hoy</h1>
							<small>Inspecciones y Entrega de documentos</small>
							<ol class="breadcrumb">
								<li><a href="inicio.php"><i class="pe-7s-home"></i> Inicio</a></li>
								<li class="active">Programación</li>
							</ol>
						</div>
					</div>  <!-- /.Content Header (Page header) -->

					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">Inspección</a></li>
								<li><a href="#tab2" data-toggle="tab">Entrega de doc. rspta.</a></li>
							</ul>
							<!-- Tab panels -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab1">
									<div class="panel-body">

										<div class="col-sm-12">
											<div class="panel panel-bd">
												<div class="panel-heading">
													<div class="panel-title">
														<h4>Programación de Inspecciones para hoy</h4>
													</div>
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Recepción doc</th>
																	<th>Tipo doc.</th>
																	<th>Nro de documento</th>
																	<th>Asunto</th>
																	<th>Prioridad</th>
																</tr>
															</thead>
															<tbody>

																<tr>
																	<?php  while ( $rslt = $result2 -> fetch_array(MYSQLI_ASSOC) ) {?>

																		<th scope="row"><?php echo utf8_encode($rslt['id']); ?></th>
																		<td><?php echo utf8_encode($rslt['fecha_recep']);?></td>
																		<td><?php echo utf8_encode($rslt['tipo']);?></td>
																		<td><?php echo utf8_encode($rslt['nro_doc']);?></td>
																		<td><?php echo utf8_encode($rslt['asunto']);?></td>
																
																			<?php $priorida = utf8_encode($rslt['prioridad']);
																				if ($priorida=='Muy urgente') {
																					echo '<td style="color:red;">Muy urgente</td>';
																				}elseif ($priorida=='Urgente') {
																					echo '<td style="color:ORANGE;">Urgente</td>';
																				}elseif ($priorida=='Normal') {
																					echo '<td>Normal</td>';
																				};
																			;?>
																	</tr>

																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="tab2">
									<div class="panel-body">

										<div class="col-sm-12">
											<div class="panel panel-bd">
												<div class="panel-heading">
													<div class="panel-title">
														<h4>Programación de Entrega de docs para hoy</h4>
													</div>
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Recepción doc</th>
																	<th>Tipo doc.</th>
																	<th>Nro de documento</th>
																	<th>Asunto</th>
																	<th>Prioridad</th>
																</tr>
															</thead>
															<tbody>

																<tr>
																	<?php  while ( $rslt4 = $result4 -> fetch_array(MYSQLI_ASSOC) ) {?>

																		<th scope="row"><?php echo utf8_encode($rslt4['id']); ?></th>
																		<td><?php echo utf8_encode($rslt4['fecha_recep']);?></td>
																		<td><?php echo utf8_encode($rslt4['tipo']);?></td>
																		<td><?php echo utf8_encode($rslt4['nro_doc']);?></td>
																		<td><?php echo utf8_encode($rslt4['asunto']);?></td>
																
																			<?php $priorida = utf8_encode($rslt4['prioridad']);
																				if ($priorida=='Muy urgente') {
																					echo '<td style="color:red;">Muy urgente</td>';
																				}elseif ($priorida=='Urgente') {
																					echo '<td style="color:ORANGE;">Urgente</td>';
																				}elseif ($priorida=='Normal') {
																					echo '<td>Normal</td>';
																				};
																			;?>
																	</tr>

																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
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
		<footer class="footer" style="background: #fff; padding: 15px 0; color: #444; border-top: 1px solid #e1e6ef;">
			<div class="container">
				<div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
				<strong>Copyright &copy; 2020-2021 <a href="#">SEPRR-GGRD-MML</a>.</strong> Todos los derechos reservados.
			</div>
		</footer> <!-- /. footer -->
	</div> <!-- ./wrapper -->

	<?php 
	include ('modales/documentos/registrar_documento.php');
	include ("referencias/ref_js.php");
	//include ('modales/visitas/eliminar_visita_confirm.php');
	//include ('modales/visitas/detalle_visita.php');
	//include ('modales/visitas/detalle_visita2.php');
	//include ('modales/visitas/detalle_visita3.php');
	?>
</body>
</html>