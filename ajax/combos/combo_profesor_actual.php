<?php 
require('../../scripts/bd_conexion.php');

$id_taller_op = $_POST['id_taller'];

$id_sede = $_POST['id_sede2'];

$sql9="SELECT * FROM tbl_talleres_op WHERE id='$id_taller_op'";
$result9 = $mysqli->query($sql9);
$row9 = $result9 -> fetch_array(MYSQLI_ASSOC);

$prof_actual = $row9['id_prof'];

$sql="SELECT id, nombres, apellidos, titulo, especialidad FROM tbl_profesores WHERE id_sede='$id_sede' OR sedes_dict=1 ";
$result = $mysqli->query($sql);

echo "<option value='0'>Asignar profesor</option>";


 	while ( $rslt4 = $result -> fetch_array(MYSQLI_ASSOC) ) {
 	$nombres = utf8_encode($rslt4["nombres"]);
 	$apellidos = utf8_encode($rslt4["apellidos"]);
 	$titulo = utf8_encode($rslt4["titulo"]);
 	$especialidad = utf8_encode($rslt4["especialidad"]);

 	$id_var = $rslt4["id"];
 		if ($id_var==$prof_actual) {
 			$opcion="selected";
 		}else{
 			$opcion="";
 		};


	echo "
	<option value='".utf8_encode($rslt4["id"])."' ".$opcion.">".$nombres." ".$apellidos." | ".$titulo." | ".$especialidad."</option>	
	";
	}


 ?>