<?php 
require('../../scripts/bd_conexion.php');

$id_taller_op = $_POST['id_taller'];

$id_sede = $_POST['id_sede'];

$sql9="SELECT * FROM tbl_talleres_op WHERE id='$id_taller_op'";
$result9 = $mysqli->query($sql9);
$row9 = $result9 -> fetch_array(MYSQLI_ASSOC);

$espacio_actual = $row9['id_espacio'];


$sql="SELECT id, nombre FROM tbl_espacios WHERE id_sede='$id_sede'";
$result = $mysqli->query($sql);

echo "<option value='0'>Seleccionar espacio</option>";


 	while ( $rslt4 = $result -> fetch_array(MYSQLI_ASSOC) ) {

 		$id_var = $rslt4["id"];
 		if ($id_var==$espacio_actual) {
 			$opcion="selected";
 		}else{
 			$opcion="";
 		};

	echo "
	<option value='".utf8_encode($rslt4["id"])."' ".$opcion.">".utf8_encode($rslt4["nombre"])."</option>	
	";
	}


 ?>