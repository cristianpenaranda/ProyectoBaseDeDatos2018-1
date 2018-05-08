$(document).ready(function () {
    //REGISTRAR PRODUCTO
    $("#FormRegistroProducto").validate({
        rules: {
            registrarTipoProducto: {
                required: true
            },
            registrarNombreProducto: {required: true},
            registrarDescripcionProducto: {required: true},
            registrarCantidadProducto: {required: true, number: true},
            registrarValorFabricacionProducto: {required: true, number: true},
            registrarPrecioProducto: {required: true, number: true},
            registrarImagenProducto: {required: true}
        },
        messages:
                {
                    registrarTipoProducto: {
                        required: "<span style='color:red'> ✘ </span>"
                    },
                    registrarNombreProducto: "<span style='color:red'> ✘ </span>",
                    registrarDescripcionProducto: "<span style='color:red'> ✘ </span>",
                    registrarCantidadProducto: {required: "<span style='color:red'> ✘ </span>", number: "<span style='color:red'> ✘ </span>"},
                    registrarValorFabricacionProducto: {required: "<span style='color:red'> ✘ </span>", number: "<span style='color:red'> ✘ </span>"},
                    registrarPrecioProducto: {required: "<span style='color:red'> ✘ </span>", number: "<span style='color:red'> ✘ </span>"},
                    registrarImagenProducto: "<span style='color:red'> ✘ </span>"
                },
               

        submitHandler: function (form) {

            var datos = {
                registrarTipoProducto: $("select[name=registrarTipoProducto]").val(), 
                registrarNombreProducto: $("#registrarNombreProducto").val(),
                registrarDescripcionProducto: $("#registrarDescripcionProducto").val(),
                registrarCantidadProducto: $("#registrarCantidadProducto").val(),
                registrarValorFabricacionProducto: $("#registrarValorFabricacionProducto").val(),
                registrarPrecioProducto: $("#registrarPrecioProducto").val(),
                registrarImagenProducto: $("#registrarImagenProducto").val()            
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
                    alert(respuesta);
                    if (respuesta["exito"]) {
                        ingresoExitoso("Registro Exitoso!","Has ingreso un nuevo producto");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error al registar el producto", "Revisa los datos...");
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

