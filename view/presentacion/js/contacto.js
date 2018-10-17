$(document).ready(function () {
//ENVIAR MENSAJES AL ADMINISTRADOR
    $("#botonEnviarMensaje").click(function () {
        $("#FormContacto").validate({
            rules: {
                envioPersona: {required: true},
                envioCorreo: {required: true},
                envioAsunto: {required: true},
                envioMensaje: {required: true}
            },
            messages:
                    {
                        envioPersona: "<span style='color:red'> ✘ </span>",
                        envioCorreo: "<span style='color:red'> ✘ </span>",
                        envioAsunto: "<span style='color:red'> ✘ </span>",
                        envioMensaje: "<span style='color:red'> Por favor ingrese el motivo de su mensaje </span>"
                    },

            submitHandler: function (form) {

                var datos = {
                    envioPersona: $("#envioPersona").val(),
                    envioCorreo: $("#envioCorreo").val(),
                    envioAsunto: $("#envioAsunto").val(),
                    envioMensaje: $("#envioMensaje").val()

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
                            ingresoExitoso("¡Gracias por tu opinión!", "");
                        } else if (!respuesta["exito"]) {
                            respuestaError("Error al enviar el mensaje", respuesta["error"]);
                        }

                    },
                    error: function (jqXHR, estado, error) {
                        console.log(estado);
                        console.log(error);
                        console.log(jqXHR);
                    }

                });
            }
        });
    });
});