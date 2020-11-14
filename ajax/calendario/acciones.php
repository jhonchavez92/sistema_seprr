<?php 

require('../../scripts/bd_conexion.php');

//$id_sede = $_POST['id_sede'];

$sql="SELECT tbl_horarios_taller_op.id, tbl_horarios_taller_op.id_taller_op, tbl_horarios_taller_op.dia ,tbl_horarios_taller_op.hora_inicio, tbl_horarios_taller_op.hora_fin, tbl_horarios_taller_op.fecha_inicio, tbl_horarios_taller_op.fecha_fin,tbl_horarios_taller_op.color, tbl_horarios_taller_op.titulo, tbl_talleres_op.id_sede, tbl_talleres_op.id_taller, tbl_talleres_op.id_prof FROM tbl_talleres_op, tbl_horarios_taller_op WHERE tbl_talleres_op.id=tbl_horarios_taller_op.id_taller_op AND tbl_talleres_op.id_sede = '2'";

$result = $mysqli->query($sql);

// $row = $result -> fetch_array(MYSQLI_ASSOC);


while ( $rslt5 = $result -> fetch_array(MYSQLI_ASSOC) ) { $evento[]= "{'dow':'".$rslt5['dia']."','ranges':[{'start':'".$rslt5['fecha_inicio']."','end':'".$rslt5['fecha_fin']."'}],'id':'".$rslt5['id']."','title':'".utf8_encode($rslt5['titulo'])."','start':'".$rslt5['hora_inicio']."','end':'".$rslt5['hora_fin']."','color':'".$rslt5['color']."','textColor':'#37a000'},";};


// while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
// {   
// 	$events[] = $row; 
// }
$data_event = implode($evento);
$data_final =  "[".trim($data_event)."]";
// $data_final =  trim($data_event);


//echo "[".trim($data_event)."]";
//header('Content-Type: application/json');
//echo json_encode($data_final);

echo $data_final;

 ?>



