
<?php 

//Con este código mostramos la tabla de alumnos
require('../../scripts/bd_conexion.php');
 
$nombre = $_POST['nombre'];

$sql="SELECT * FROM tbl_profesores WHERE nombres like '%$nombre%' OR apellidos like '%$nombre%' ORDER BY id DESC";
$result = $mysqli -> query($sql);


echo "
<table class='table table-bordered table-striped table-hover'>
<thead>
<tr>
<th>Nombres</th>
<th>Apellidos</th>
<th>Email</th>
<th>Celular</th>
<th>Titulo</th>
<th>Especialidad</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>

";
?>
<?php  while ( $rslt = $result -> fetch_array(MYSQLI_ASSOC) ) {


	echo "
	<tr>
	<td>".utf8_encode($rslt["nombres"])."</td>	
	<td>".utf8_encode($rslt["apellidos"])."</td>	
	<td>".utf8_encode($rslt["email"])."</td>	
	<td>".$rslt["cel"]."</td>
	<td>".utf8_encode($rslt["titulo"])."</td>
	<td>".utf8_encode($rslt["especialidad"])."</td>
	<td align='center'>
	<button class='btn btn-info btn-sm' data-placement='left' title='Ver datos' onclick='location.href=\"datos_profesor.php?id_profesor=".$rslt["id"]."\"' >
	<i class='fa fa-drivers-license-o' aria-hidden='true'></i>
	</button>
	
	</td>
	</tr>";
	}

	echo "</tbody>
		  </table>";
 ?>