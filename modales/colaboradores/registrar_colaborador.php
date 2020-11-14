<form id="registrar_colaborador_form">
	<div class="modal fade" id="registrar_colaborador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: ">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Registrar Colaborador (a)</h4>
				</div>
				<div class="modal-body">
					<div id="datos_modificar"></div>

					<div class="row">
						<div class="col-sm-6">

							<div class="form-group">
								<label for="nombres" class="control-label">Nombres:</label>
								<input type="text" class="form-control" id="nombres_add" name="nombres_add" required="required">
							</div>

						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label for="apellidos" class="control-label">Apellidos:</label>
								<input type="text" class="form-control" id="apellidos" name="apellidos" required="required">
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="sexo" class="control-label">Sexo:</label>
								<select class="form-control" id="sexo" name="sexo" required="required">
									<option value=""></option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
							
						</div>
						<div class="col-sm-4">

							<div class="form-group">
								<label for="celular" class="control-label">Celular:</label>
								<input type="text" class="form-control" id="celular" name="celular" required="required"> 
							</div>
						</div>
						<div class="col-sm-4">

							<div class="form-group">
								<label for="fecha_nac" class="control-label">Fecha Nacimiento:</label>
								<input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required="required"> 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">

							<div class="form-group">
								<label for="dni" class="control-label">DNI:</label>
								<input type="number" class="form-control" id="dni" name="dni" required="required">
							</div>

						</div>
						<div class="col-sm-8">

							<div class="form-group">
								<label for="direccion" class="control-label">Dirección:</label>
								<input type="text" class="form-control" id="direccion" name="direccion" required="required">
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="distrito" class="control-label">Distrito de procedencia:</label>
								<select class="form-control" id="dist" name="dist" required="required">
									<option value="0"></option>
									<option value="Ancon">Ancon</option>	
									<option value="Ate">Ate</option>	
									<option value="Barranco">Barranco</option>
									<option value="Breña">Breña</option>
									<option value="Carabayllo">Carabayllo</option>	
									<option value="Chaclacayo">Chaclacayo</option>	
									<option value="Chorrillos">Chorrillos</option>
									<option value="Cieneguilla">Cieneguilla</option>	
									<option value="Comas">Comas</option>
									<option value="El Agustino">El Agustino</option>
									<option value="Independencia">Independencia</option>
									<option value="Jesus Maria">Jesus Maria</option>
									<option value="La Molina">La Molina</option>
									<option value="La Victoria">La Victoria</option>
									<option value="Lima">Lima</option>
									<option value="Lince">Lince</option>
									<option value="Los Olivos">Los Olivos</option>
									<option value="Lurigancho - Chosica">Lurigancho - Chosica</option>
									<option value="Lurin">Lurin</option>
									<option value="Magdalena del Mar">Magdalena del Mar</option>
									<option value="Miraflores">Miraflores</option>
									<option value="Pachacámac">Pachacámac</option>
									<option value="Pucusuna">Pucusana</option>
									<option value="Pueblo Libre">Pueblo Libre</option>
									<option value="Puente Piedra">Puente Piedra</option>
									<option value="Punta Hermosa">Punta Hermosa</option>
									<option value="Punta Negra">Punta Negra</option>
									<option value="Rímac">Rímac</option>
									<option value="San Bartolo">San Bartolo</option>
									<option value="San Borja">San Borja</option>
									<option value="San Isidro">San Isidro</option>
									<option value="San Juan de Lurigancho">San Juan de Lurigancho</option>
									<option value="San Juan de Miraflores">San Juan de Miraflores</option>
									<option value="San Luis">San Luis</option>
									<option value="San Martin de Porres">San Martin de Porres</option>
									<option value="San Miguel">San Miguel</option>
									<option value="Santa Anita">Santa Anita</option>
									<option value="Santa Maria del Mar">Santa Maria del Mar</option>
									<option value="Santa Rosa (Lima)">Santa Rosa (Lima)</option>
									<option value="Santiago de Surco">Santiago de Surco</option>
									<option value="Surquillo">Surquillo</option>
									<option value="Villa El Salvador">Villa El Salvador</option>
									<option value="Villa Maria del Triunfo">Villa Maria del Triunfo</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label for="email" class="control-label">Email:</label>
								<input type="email" class="form-control" id="email" name="email" required="required"> 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="especialidad" class="control-label">Especialidad:</label>
								<input type="text" class="form-control" id="especialidad_" name="especialidad_" required="required"> 
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="area" class="sede">Área:</label>
								<select class="form-control" id="area" name="area" required="required">
									<option value="">Seleccionar area...</option>
									<option value="Operaciones | Evar - Monitoreo">Operaciones | Evar - Monitoreo</option>
									<option value="Operaciones | Inspecciones">Operaciones | Inspecciones</option>
									<option value="Operaciones | Supervición">Operaciones | Supervición</option>
									<option value="Gestión de los procesos">Gestión de los procesos</option>
									<option value="Gestión Interinstitucional">Gestión Interinstitucional</option>
									<option value="Gestión de la Información">Gestión de la Información</option>
									<option value="Asesoria Legal">Asesoria Legal</option>
									<option value="Coordinador">Coordinador</option>
									<option value="Administración">Administración</option>
									<option value="Secretaria">Secretaria</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="ID" class="control-label">ID de ingreso a Sistema:</label>
								<input type="text" class="form-control" id="id_ingreso" name="id_ingreso" required="required"> 
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="PASS" class="control-label">Pass de ingreso a Sistema:</label>
								<input type="text" class="form-control" id="pass_ingreso" name="pass_ingreso" required="required"> 
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" id="add_colaborador" name="add_colaborador">Registrar</button>
				</div>
			</div>
		</div>
	</div>
</form>