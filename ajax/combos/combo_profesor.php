<?php 
require('../../scripts/bd_conexion.php');

$id_sede = $_POST['id_sede2'];

$sql="SELECT id, nombres, apellidos, titulo, especialidad FROM tbl_profesores WHERE id_sede='$id_sede' OR sedes_dict=1 ";
$result = $mysqli->query($sql);

echo "<option value='0'>Asignar profesor</option>";


 	while ( $rslt4 = $result -> fetch_array(MYSQLI_ASSOC) ) {
 	$nombres = utf8_encode($rslt4["nombres"]);
 	$apellidos = utf8_encode($rslt4["apellidos"]);
 	$titulo = utf8_encode($rslt4["titulo"]);
 	$especialidad = utf8_encode($rslt4["especialidad"]);


	echo "
	<option value='".utf8_encode($rslt4["id"])."'>".$nombres." ".$apellidos." | ".$titulo." | ".$especialidad."</option>	
	";
	}


 ?>