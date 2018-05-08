$(document).ready(function () {
    //INICIO DE SESION
    $("#FormLogin").validate({
        rules: {
            ingresarUsuario: {required: true, number: true},
            ingresarContraseña: {required: true},
            ingresarTipo: {
                required: true
            }
        },
        messages:
                {
                    ingresarUsuario: {required: "<span style='color:red'> ✘ </span>", number: "<span style='color:red'> ✘ </span>"},
                    ingresarContraseña: "<span style='color:red'> ✘ </span>",
                    ingresarTipo: {
                    required: "<span style='color:red'> ✘ </span>"
                    }
                },
               

        submitHandler: function (form) {

            var datos = {
                ingresarUsuario: $("#ingresarUsuario").val(),
                ingresarContraseña: $("#ingresarContraseña").val(),
                ingresarTipo: $("select[name=ingresarTipo]").val()             
            };
                                  
            $.ajax({
                url: 'view/modulos/ajax.php',
                method: 'post',
                data: datos,
                dataType: "json",

                beforeSend: function () {
                    respuestaInfoEspera("Espera un momento por favor.");
                },
                success: function (respuesta)
                {
                    if (respuesta["exito"]) {
                        ingresoExitoso("Iniciaste Sesión","Bienvenido a nuestra Aplicación");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error al Iniciar", "Revisa el Usuario, la Contraseña y el Tipo de Usuario");
                    }

                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                }
                
            });
        }
    });

    //REGISTRO DE CLIENTE
    $("#botonRegistroCliente").click(function(){
    $("#FormRegistroCliente").validate({
        rules: {
            registroNombreCliente: {required: true},
            registroApellidoCliente: {required: true},
            registroTelefonoCliente: {required: true, number: true},
            registroCedulaCliente: {required: true, number: true},
            registroCorreoCliente: {required: true},
            registroDomicilioCliente: {required: true},
            registroContraseñaCliente: {required: true}
        },
        messages:
                {
                    registroNombreCliente: "<span style='color:red'> ✘ </span>",
                    registroApellidoCliente: "<span style='color:red'> ✘ </span>",
                    registroTelefonoCliente: {required: "<span style='color:red'> ✘ </span>", number: "<span style='color:red'> ✘ </span>"},
                    registroCedulaCliente: {required: "<span style='color:red'> ✘ </span>", number: "<span style='color:red'> ✘ </span>"},
                    registroCorreoCliente: "<span style='color:red'> ✘ </span>",
                    registroDomicilioCliente: "<span style='color:red'> ✘ </span>",
                    registroContraseñaCliente: "<span style='color:red'> ✘ </span>"
                },
               

        submitHandler: function (form) {

            var datos = {
                registroCedulaCliente: $("#registroCedulaCliente").val(),
                registroNombreCliente: $("#registroNombreCliente").val(),
                registroApellidoCliente: $("#registroApellidoCliente").val(),
                registroTelefonoCliente: $("#registroTelefonoCliente").val(), 
                registroDomicilioCliente: $("#registroDomicilioCliente").val(),
                registroContraseñaCliente: $("#registroContraseñaCliente").val(),                
                registroCorreoCliente: $("#registroCorreoCliente").val()         
          
            };
                                                          
            $.ajax({
                url: 'view/modulos/ajax.php',
                method: 'post',
                data: datos,
                dataType: "json",

                beforeSend: function () {
                    respuestaInfoEspera("Espera un momento por favor.");
                },
                success: function (respuesta)
                {
                    if (respuesta["exito"]) {
                        ingresoExitoso("Registro Exitoso","Bienvenido a nuestra Aplicación");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error al Registrar", "Revisa los datos ingresados");
                    }

                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                }
                
            });
        }
    });
    });
    
});


