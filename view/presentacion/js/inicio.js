$(document).ready(function () {
    //$('#modalPrincipal').modal('show')
    $.ajax({

        url: 'view/modulos/ajax.php?MostrarPromociones=true',
        dataType: 'text',
        success: function (respuesta) {
            document.getElementById("ListaPromociones").innerHTML = respuesta;
        },
        error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
        },
    });
});