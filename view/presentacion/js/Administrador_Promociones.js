$(document).ready(function () {
    //REGISTRO DE PROMOCION
    $("#botonRegistroPromocion").click(function () {
        $("#FormRegistroPromocion").validate({
            rules: {
                registroTituloPromocion: {required: true},
                registroDescripcionPromocion: {required: true},
            },
            messages:
                    {
                        registroTituloPromocion: "<span style='color:red'> ✘ </span>",
                        registroDescripcionPromocion: "<span style='color:red'> ✘ </span>"
                    },

            submitHandler: function (form) {

                var datos = {
                    registroTituloPromocion: $("#registroTituloPromocion").val(),
                    registroDescripcionPromocion: $("#registroDescripcionPromocion").val()

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
                            ingresoExitoso("Registro Exitoso", "Promoción Ingresada");
                        } else if (!respuesta["exito"]) {
                            respuestaError("Error al Registrar", "Revisa los datos ingresados");
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


    //LISTAR EMPLEADOS    
    $("#botonListarPromociones").click(function () {
        $.ajax({

            url: 'view/modulos/ajax.php?listarPromociones=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("tablaPromocion").innerHTML = respuesta;
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });
    
    
    
    //VER INFORMACION DE LA PROMOCION
    $("#BotonVerPromocion").click(function () {
        alert("VER");
    });

});