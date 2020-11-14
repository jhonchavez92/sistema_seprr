$( "#editartaller" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "modales/talleres/modificar_taller.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_modificar").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					//window.location.href ="../inicio.php";
					$("#datos_modificar").html("Exito");
					location.reload();
					//load(1);
				  }
			});
		  event.preventDefault();
		});

$( "#agregartaller" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "modales/Datos_acordes/agregar_bd_taller.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_modificar").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					//window.location.href ="../inicio.php";
					$("#datos_modificar").html("Exito");
					location.reload();
					//load(1);
				  }
			});
		  event.preventDefault();
		});