<?php 
require('../../scripts/bd_conexion.php');

$id_colaborador = $_POST['id_colaborador']; 

$sql3="SELECT * FROM tbl_users WHERE id='$id_colaborador'";
$result3 = $mysqli->query($sql3);
$row3 = $result3 -> fetch_array(MYSQLI_ASSOC);

$sexoal = $row3["sexo"];


$originalDate = $row3["fecha_reg"];

$fecha_reg = date("d/m/Y", strtotime($originalDate));

if ($sexoal=="M") {
	$sexoM = "selected";
	$sexoF = "";
}else{
	$sexoF = "selected";
	$sexoM = "";
};

echo"
<div class='col-sm-6'>
<div class='form-group'>
<label for='nombres'>Nombres</label>
<input type='text' class='form-control' id='nombres' disabled='disabled' value='".utf8_encode($row3["nombres"])."'>
</div></div>
<div class='col-sm-6'>
<div class='form-group'>
<label for='apellidos'>Apellidos</label>
<input type='text' class='form-control' id='apellidos' disabled='disabled' value='".utf8_encode($row3["apellidos"])."'>
</div></div>

<div class='col-sm-3'>
<div class='form-group'>
<label for='sexo'>Sexo</label>
<select class='form-control' id='sexo' disabled='disabled'>
	<option value='M' ".$sexoM.">Masculino</option>
	<option value='F' ".$sexoF.">Femenino</option>
</select>
</div></div>

<div class='col-sm-3'>
<div class='form-group'>
<label for='dni'>DNI</label>
<input type='text' class='form-control' id='dni' disabled='disabled' value='".$row3["dni"]."'>
</div></div>

</div></div>
<div class='col-sm-3'>
<div class='form-group'>
<label for='nacimiento'>Nacimiento</label>
<input type='date' class='form-control' id='nacimiento' disabled='disabled' value='".$row3["nacimiento"]."'>
</div></div>

<div class='col-sm-3'>
<div class='form-group'>
<label for='email'>Email</label>
<input type='email' class='form-control' id='email' disabled='disabled' value='".utf8_encode($row3["email"])."'>
</div></div>

<div class='col-sm-9'>
<div class='form-group'>
<label for='direccion'>Dirección</label>
<input type='text' class='form-control' id='direccion' disabled='disabled' value='".utf8_encode($row3["direccion"])."'>
</div></div>

<div class='col-sm-3'>
<div class='form-group'>
<label for='distrito'>Distrito</label>
<input type='text' class='form-control' id='distrito' disabled='disabled' value='".utf8_encode($row3["distrito"])."'>
</div></div>

<div class='col-sm-3'>
<div class='form-group'>
<label for='celular'>Celular</label>
<input type='text' class='form-control' id='celular' disabled='disabled' value='".$row3["cel"]."'>
</div></div>

<div class='col-sm-3'>
<div class='form-group'>
<label for='como'>Especialidad</label>
<input type='text' class='form-control' id='especialidad' disabled='disabled' value='".utf8_encode($row3["especialidad"])."'>
</div></div>

<div class='col-sm-2'>
<div class='form-group'>
<label for='como'>Id Ingreso sistema</label>
<input type='text' class='form-control' id='id_ingreso' disabled='disabled' value='".utf8_encode($row3["id_acceso"])."'>
</div></div>

<div class='col-sm-4'>
<div class='form-group'>
<label for='como'>Área</label>
<input type='text' class='form-control' id='area' disabled='disabled' value='".utf8_encode($row3["area"])."'>
</div></div>

<div class='col-sm-3' id='habilitar'>
<div class='form-group'>
<label for='habilitar'>Habilitar Edición</label>
<input type='button' class='form-control btn btn-primary w-md m-b-5' id='editar_datos' value='Editar'>
</div></div>

<div class='col-sm-3'style='display: none;' id='guardar_cambio'>
<div class='form-group'>
<label for='guardar'>Guardar Cambios</label>
<input type='button' class='form-control btn btn-success w-md m-b-5' id='guardar_cambios' value='Guardar Cambios'>
</div></div>

<div class='col-sm-3'style='display: none;'>
<div class='form-group'>
<label for='id'>id</label>
<input type='text' class='form-control' id='id_colaboradorr' value='".$row3["id"]."'>
</div></div>

<div class='col-sm-12'>
<div class='form-group'>

<small>Colaborador(a) registrado el ".$fecha_reg." </small>

</div></div>

"; 
?>
