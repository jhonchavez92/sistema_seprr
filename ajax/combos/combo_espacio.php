<?php 
require('../../scripts/bd_conexion.php');

$id_sede = $_POST['id_sede'];

$sql="SELECT id, nombre FROM tbl_espacios WHERE id_sede='$id_sede'";
$result = $mysqli->query($sql);

echo "<option value='0'>Seleccionar espacio</option>";


 	while ( $rslt4 = $result -> fetch_array(MYSQLI_ASSOC) ) {

	echo "
	<option value='".utf8_encode($rslt4["id"])."'>".utf8_encode($rslt4["nombre"])."</option>	
	";
	}


 ?>