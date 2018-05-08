$(document).ready(function(){
     //REGISTRO DE EMPLEADO
    $("#botonRegistroEmpleado").click(function(){
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
                        ingresoExitoso("Registro Exitoso","Empleado Ingresado");
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
    
    
    //LISTAR EMPLEADOS    
    $("#botonListarEmpleado").click(function () {
        $.ajax({

            url: 'view/modulos/ajax.php?listarEmpleados=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("tablaEmpleados").innerHTML = respuesta;
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });
    
});