
function ingresoExitoso(titulo, mensaje) {
    swal({
        title: titulo,
        text: mensaje,
        icon: "success",
        button: "Continuar"
    });
    setTimeout("location.reload()", 1000);
}

function exito(titulo, mensaje) {
    swal({
        title: titulo,
        text: mensaje,
        icon: "success",
        button: "Continuar"
    });
}

function respuestaInfoEspera(mensaje) {
    swal({
        text: mensaje,
        buttons: false,
        closeOnClickOutside: false,
        closeOnEsc: false,
        icon: "info"
    });
}

function advertencia(mensaje) {
    swal({
        title: "Advertencia",
        text: mensaje,
        icon: "warning",
        button: "Continuar"
    });
}

function respuestaError(titulo, mensaje) {
    swal({
        title: titulo,
        text: mensaje,
        icon: "error"
    });
}