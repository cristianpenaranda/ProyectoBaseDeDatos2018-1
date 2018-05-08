
function ingresoExitoso(titulo, mensaje) {
    swal({
        title: titulo,
        text: mensaje,
        icon: "success",
        button: "Continuar"
    });
    location.reload();
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

function respuestaError(titulo, mensaje) {
    swal({
        title: titulo,
        text: mensaje,
        icon: "error"
    });
}
