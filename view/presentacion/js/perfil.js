$(document).ready(function () {
    //CAMBIAR CONTRASEÑA    
    $("#FormCambiarContraseña").validate({
        
        rules: {
            AnteriorCambiarContraseña: {required: true},
            NuevaCambiarContraseña: {required: true}
        },
        messages:
                {
                    AnteriorCambiarContraseña: "<span style='color:red'> ✘ </span>",
                    NuevaCambiarContraseña: "<span style='color:red'> ✘ </span>"
                },
        submitHandler: function (form) {

            var datos = {
                UsuarioCambiarContraseña: $("#UsuarioCambiarContraseña").text(),
                AnteriorCambiarContraseña: $("#AnteriorCambiarContraseña").val(),
                NuevaCambiarContraseña: $("#NuevaCambiarContraseña").val()
            };

            $.ajax({
                url: 'view/modulos/ajax.php',
                method: 'post',
                data: datos,
                dataType: "text",

                beforeSend: function () {
                    respuestaInfoEspera("Espera un momento por favor.");
                },
                success: function (respuesta)
                {
                    if (respuesta === 'exito') {
                        ingresoExitoso("¡ Cambio Exitoso !", "Has modificado exitosamente tu contraseña");
                    } else{
                        respuestaError("Error al cambiar", "Revisa datos");
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