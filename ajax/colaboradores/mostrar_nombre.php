<?php 
require('../../scripts/bd_conexion.php');

$id_colaborador = $_POST['id_colaborador']; 

$sql="SELECT * FROM tbl_users WHERE id='$id_colaborador'";
$result = $mysqli->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);

echo "
<h1>".utf8_encode($row["nombres"])." ".utf8_encode($row["apellidos"])."</h1>
<small>".$row["email"]." / ".$row["cel"]."</small>

";

 ?>