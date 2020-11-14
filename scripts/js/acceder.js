 function validarUser()
            {
                valor = document.getElementById("user").value;
                if(valor==null || valor.length==0 || /^\s+$/ .test(valor) ) {
                    alertify.warning('Debes ingresar un usuario');
                    return false;
                }else {return true;}
            }

            function validarPass()
            {
                valor = document.getElementById("pass").value;
                if(valor==null || valor.length==0 || /^\s+$/ .test(valor) ) {
                      alertify.warning('Debes ingresar tu contraseña');
                    return false;
                }else {return true;}
            }

		function acceso(){
        
            if(validarUser() && validarPass())
            {
			var username = $('#user').val();
			var password = $('#pass').val();
			$.ajax({
                url:'scripts/acceso.php', 
                type:'POST',
                data:'username='+username+'&password='+password
            }).done(function(resp){
            	if(resp=='exito'){
            		location.href='inicio.php';
            	}else{
            		alertify.error('Contraseña y/o usuario incorrectos');
            	}
            });

            }
        }