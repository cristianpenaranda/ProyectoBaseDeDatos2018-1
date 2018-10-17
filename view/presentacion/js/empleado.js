$(document).ready(function () {
    //CLIENTE POR DEFECTO
    $("#botonPorDefecto").click(function(){
        $('#RegistroVentaEmpleado').val("0");
    });
    
    //BUSCAR CLIENTE POR CEDULA
    $("#botonBuscarCliente").click(function () {
        var datos = {
            CedulaVentaEmpleado: $("#RegistroVentaEmpleado").val()
        };
        
        if(datos["CedulaVentaEmpleado"]===""){
            advertencia("Por favor ingrese la cédula del cliente");
        } else {
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
                        exito("¡ Cliente Encontrado !", "");
                        $("#botonRegistroVenta").prop('disabled',false);
                        $("#RegistroVentaValor").prop('disabled',false);
                    } else if (!respuesta["exito"]) {
                        respuestaError("El Cliente no está registrado", "Si desea puede registrarse");
                        $("#botonRegistroVenta").prop('disabled',true);
                        $("#RegistroVentaValor").prop('disabled',true);
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
    
    
    //REGISTRAR VENTA EN TIENDA
    $("#botonRegistroVenta").click(function () {//SELECCIONA LA FECHA DEL SISTEMA
        var fecha = new Date();
        var fechaSistema = (fecha.getDay() + 3) + "/" + (fecha.getMonth() + 1) + "/" + (fecha.getYear() + 1900)+"-"+fecha.getHours() + ":" + fecha.getMinutes();
        $("#FormRegistroVentaEmpleado").validate({
            rules: {
                RegistroVentaEmpleado: {required: true},
                RegistroVentaValor: {required: true}
            },
            messages:
                    {
                        RegistroVentaEmpleado: "<span style='color:red'> ✘ </span>",
                        RegistroVentaValor: "<span style='color:red'> ✘ </span>"
                    },

            submitHandler: function (form) {

                var datos = {
                    RegistroVentaEmpleado: $("#RegistroVentaEmpleado").val(),
                    RegistroVentaValor: $("#RegistroVentaValor").val(),
                    cedulaEmpleadoVenta: $("#cedulaEmpleadoVenta").text(),
                    fechaVenta: fechaSistema
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
                        alert(respuesta["exito"]);
                        if (respuesta["exito"]) {
                            ingresoExitoso("Venta Exitosa","");
                        } else if (!respuesta["exito"]) {
                            respuestaError("Ha ocurrido un error","");
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