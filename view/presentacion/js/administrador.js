$(document).ready(function () {
    //LISTAR CLIENTES
    $("#botonListarClientes").click(function () {
        $.ajax({

            url: 'view/modulos/ajax.php?listarClientes=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("tablaCliente").innerHTML = respuesta;

                //VER INFORMACION DEL CLIENTE
                $(".ActionVerCliente").bind("click", function () {
                    var datos = {
                        idCliente: $(this).attr("id")
                    };
                    $.ajax({
                        url: 'view/modulos/ajax.php',
                        method: 'post',
                        data: datos,
                        dataType: "json",

                        success: function (respuesta)
                        {
                            var cedula = respuesta["respuesta"].toString().split("ª")[0];
                            var nombres = respuesta["respuesta"].toString().split("ª")[1];
                            var apellidos = respuesta["respuesta"].toString().split("ª")[2];
                            var telefono = respuesta["respuesta"].toString().split("ª")[3];
                            var domicilio = respuesta["respuesta"].toString().split("ª")[4];
                            var correo = respuesta["respuesta"].toString().split("ª")[5];
                            $('#ModalCedulaCliente').val(cedula);
                            $('#ModalNombresCliente').val(nombres);
                            $('#ModalApellidosCliente').val(apellidos);
                            $('#ModalTelefonoCliente').val(telefono);
                            $('#ModalDomicilioCliente').val(domicilio);
                            $('#ModalCorreoCliente').val(correo);
                        },
                        error: function (jqXHR, estado, error) {
                            console.log(estado);
                            console.log(error);
                            console.log(jqXHR);
                        }

                    });
                });

            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });

    //REGISTRO DE EMPLEADO
    $("#botonRegistroEmpleado").click(function () {
        $("#FormRegistroEmpleado").validate({
            rules: {
                registroNombreEmpleado: {required: true},
                registroApellidoEmpleado: {required: true},
                registroCedulaEmpleado: {required: true, number: true},
                registroTelefonoEmpleado: {required: true, number: true},
                registroCorreoEmpleado: {required: true},
                registroDomicilioEmpleado: {required: true},
                registroContraseñaEmpleado: {required: true}
            },
            messages:
                    {
                        registroCedulaEmpleado: {required: "<span style='color:red'> ✘ </span>", number: "<span style='color:red'> ✘ </span>"},
                        registroTelefonoEmpleado: {required: "<span style='color:red'> ✘ </span>", number: "<span style='color:red'> ✘ </span>"},
                        registroNombreEmpleado: "<span style='color:red'> ✘ </span>",
                        registroApellidoEmpleado: "<span style='color:red'> ✘ </span>",
                        registroCorreoEmpleado: "<span style='color:red'> ✘ </span>",
                        registroDomicilioEmpleado: "<span style='color:red'> ✘ </span>",
                        registroContraseñaEmpleado: "<span style='color:red'> ✘ </span>"
                    },

            submitHandler: function (form) {

                var datos = {
                    registroCedulaEmpleado: $("#registroCedulaEmpleado").val(),
                    registroNombreEmpleado: $("#registroNombreEmpleado").val(),
                    registroApellidoEmpleado: $("#registroApellidoEmpleado").val(),
                    registroTelefonoEmpleado: $("#registroTelefonoEmpleado").val(),
                    registroDomicilioEmpleado: $("#registroDomicilioEmpleado").val(),
                    registroContraseñaEmpleado: $("#registroContraseñaEmpleado").val(),
                    registroCorreoEmpleado: $("#registroCorreoEmpleado").val()

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
                            exito("Registro Exitoso", "Empleado Ingresado");
                            $("#registroCedulaEmpleado").val("");
                            $("#registroNombreEmpleado").val("");
                            $("#registroApellidoEmpleado").val("");
                            $("#registroTelefonoEmpleado").val("");
                            $("#registroDomicilioEmpleado").val("");
                            $("#registroContraseñaEmpleado").val("");
                            $("#registroCorreoEmpleado").val("");
                            $("#botonListarEmpleado").click();
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
    $("#botonListarEmpleado").click(function () {
        $.ajax({

            url: 'view/modulos/ajax.php?listarEmpleados=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("tablaEmpleados").innerHTML = respuesta;

                //VER INFORMACION DEL EMPLEADO
                $(".ActionVerEmpleado").bind("click", function () {
                    var datos = {
                        idEmpleado: $(this).attr("id")
                    };
                    $.ajax({
                        url: 'view/modulos/ajax.php',
                        method: 'post',
                        data: datos,
                        dataType: "json",

                        success: function (respuesta)
                        {
                            var cedula = respuesta["respuesta"].toString().split("ª")[0];
                            var nombres = respuesta["respuesta"].toString().split("ª")[1];
                            var apellidos = respuesta["respuesta"].toString().split("ª")[2];
                            var telefono = respuesta["respuesta"].toString().split("ª")[3];
                            var domicilio = respuesta["respuesta"].toString().split("ª")[4];
                            var correo = respuesta["respuesta"].toString().split("ª")[5];
                            $('#ModalCedulaEmpleado').val(cedula);
                            $('#ModalNombresEmpleado').val(nombres);
                            $('#ModalApellidosEmpleado').val(apellidos);
                            $('#ModalTelefonoEmpleado').val(telefono);
                            $('#ModalDomicilioEmpleado').val(domicilio);
                            $('#ModalCorreoEmpleado').val(correo);
                        },
                        error: function (jqXHR, estado, error) {
                            console.log(estado);
                            console.log(error);
                            console.log(jqXHR);
                        }

                    });
                });

                //ELIMINAR EMPLEADO
                $(".ActionEliminarEmpleado").bind("click", function () {
                    swal({
                        title: "¿Está seguro de eliminar el empleado?",
                        text: "",
                        icon: "warning",                        
                        buttons: ["Cancelar", "Aceptar"],
                        dangerMode: true,
                    })
                            .then((willDelete) => {
                                if (willDelete) {
                                    var datos = {
                                        idEmpleadoEliminar: $(this).attr("id")
                                    };
                                    $.ajax({
                                        url: 'view/modulos/ajax.php',
                                        method: 'post',
                                        data: datos,
                                        dataType: "json",

                                        success: function (respuesta)
                                        {
                                            if (respuesta["exito"]) {
                                                exito("Empleado eliminado", "");
                                                $("#botonListarEmpleado").click();
                                            } else if (!respuesta["exito"]) {
                                                respuestaError("Error al eliminar", "");
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
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });


    //MOSTRAR IMAGEN DEL INPUT
    var TmpPath = "";
    $(document).on('change', 'input[type=file]', function (e) {
        // Obtenemos la ruta temporal mediante el evento
        TmpPath = URL.createObjectURL(e.target.files[0]);
        // Mostramos la ruta temporal
        $('.imgProducto').attr('src', TmpPath);
    });

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
                registrarImagenProducto: $("#registrarImagenProducto").val().split("\\")[2]
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
                        ingresoExitoso("Registro Exitoso!", "Has ingreso un nuevo producto");
                        $("#botonListarProductos").click();
                        TmpPath = "";
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error al registar el producto", "Revisa los datos...");
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
    
    //LISTAR PRODUCTOS
    $("#botonListarProductos").click(function () {
        $.ajax({

            url: 'view/modulos/ajax.php?listarProductos=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("tablaProducto").innerHTML = respuesta;

                //VER INFORMACION DEL PRODUCTO
                $(".ActionVerProducto").bind("click", function () {
                    var datos = {
                        idProducto: $(this).attr("id")
                    };
                    $.ajax({
                        url: 'view/modulos/ajax.php',
                        method: 'post',
                        data: datos,
                        dataType: "json",

                        success: function (respuesta)
                        {
                            var nombre = respuesta["respuesta"].toString().split("ª")[0];
                            var descripcion = respuesta["respuesta"].toString().split("ª")[1];
                            var cantidad = respuesta["respuesta"].toString().split("ª")[2];
                            var valor = respuesta["respuesta"].toString().split("ª")[3];
                            var precio_venta = respuesta["respuesta"].toString().split("ª")[4];
                            var imagen = respuesta["respuesta"].toString().split("ª")[5].split("Proyecto_Bd/")[1];
                            $('#ModalNombreProducto').val(nombre);
                            $('#ModalDescripcionProducto').val(descripcion);
                            $('#ModalCantidadProducto').val(cantidad);
                            $('#ModalValorFabricacionProducto').val(valor);
                            $('#ModalPrecioProducto').val(precio_venta);
                            $('#ModalImagenProducto').attr('src', imagen);                            
                        },
                        error: function (jqXHR, estado, error) {
                            console.log(estado);
                            console.log(error);
                            console.log(jqXHR);
                        }

                    });
                });

                //ELIMINAR PRODUCTO
                $(".ActionEliminarProducto").bind("click", function () {
                    swal({
                        title: "¿Está seguro de eliminar este producto?",
                        text: "",
                        icon: "warning",
                        buttons: ["Cancelar", "Aceptar"],
                        dangerMode: true,
                    })
                            .then((willDelete) => {
                                if (willDelete) {
                                    var datos = {
                                        idProductoEliminar: $(this).attr("id")
                                    };
                                    $.ajax({
                                        url: 'view/modulos/ajax.php',
                                        method: 'post',
                                        data: datos,
                                        dataType: "json",

                                        success: function (respuesta)
                                        {
                                            if (respuesta["exito"]) {
                                                exito("Producto eliminado", "");
                                                $("#botonListarProductos").click();
                                            } else if (!respuesta["exito"]) {
                                                respuestaError("Error al eliminar", "");
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
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });


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
                            exito("Registro Exitoso", "Promoción Ingresada");
                            $("#registroTituloPromocion").val("");
                            $("#registroDescripcionPromocion").val("");
                            $("#botonListarPromociones").click();
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


    //LISTAR PROMOCIONES
    $("#botonListarPromociones").click(function () {
        $.ajax({

            url: 'view/modulos/ajax.php?listarPromociones=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("tablaPromocion").innerHTML = respuesta;

                //VER INFORMACION DE LA PROMOCION
                $(".ActionVer").bind("click", function () {
                    var datos = {
                        idPromocion: $(this).attr("id")
                    };
                    $.ajax({
                        url: 'view/modulos/ajax.php',
                        method: 'post',
                        data: datos,
                        dataType: "json",

                        success: function (respuesta)
                        {
                            var titulo = respuesta["respuesta"].toString().split("ª")[0];
                            var descripcion = respuesta["respuesta"].toString().split("ª")[1];
                            $('#ModalTituloPromocion').val(titulo);
                            $('#ModalDescripcionPromocion').val(descripcion);
                        },
                        error: function (jqXHR, estado, error) {
                            console.log(estado);
                            console.log(error);
                            console.log(jqXHR);
                        }

                    });
                });

                //ELIMINAR LA PROMOCION
                $(".ActionEliminar").bind("click", function () {
                    swal({
                        title: "¿Está seguro de eliminar esta promoción?",
                        text: "",
                        icon: "warning",
                        buttons: ["Cancelar", "Aceptar"],
                        dangerMode: true,
                    })
                            .then((willDelete) => {
                                if (willDelete) {
                                    var datos = {
                                        idPromocionEliminar: $(this).attr("id")
                                    };
                                    $.ajax({
                                        url: 'view/modulos/ajax.php',
                                        method: 'post',
                                        data: datos,
                                        dataType: "json",

                                        success: function (respuesta)
                                        {
                                            if (respuesta["exito"]) {
                                                exito("Promoción eliminada", "");
                                                $("#botonListarPromociones").click();
                                            } else if (!respuesta["exito"]) {
                                                respuestaError("Error al eliminar", "");
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
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });
    
    
    //LISTAR MENSAJES
    $("#botonMensajesAdmin").click(function () {
        $.ajax({

            url: 'view/modulos/ajax.php?listarMensajesAdmin=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("tablaMensajesAdmin").innerHTML = respuesta;

                //VER INFORMACION DEL MENSAJE
                $(".ActionVerMensajeAdmin").bind("click", function () {
                    var datos = {
                        idMensaje: $(this).attr("id")
                    };
                    $.ajax({
                        url: 'view/modulos/ajax.php',
                        method: 'post',
                        data: datos,
                        dataType: "json",

                        success: function (respuesta)
                        {
                            var remitente = respuesta["respuesta"].toString().split("ª")[0];
                            var correo = respuesta["respuesta"].toString().split("ª")[1];
                            var asunto = respuesta["respuesta"].toString().split("ª")[2];
                            var mensaje = respuesta["respuesta"].toString().split("ª")[3];
                            $('#ModalRemitenteMensaje').val(remitente);
                            $('#ModalCorreoMensaje').val(correo);
                            $('#ModalAsuntoMensaje').val(asunto);
                            $('#ModalMensajeMensaje').val(mensaje);
                        },
                        error: function (jqXHR, estado, error) {
                            console.log(estado);
                            console.log(error);
                            console.log(jqXHR);
                        }

                    });
                });

            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });
    

});