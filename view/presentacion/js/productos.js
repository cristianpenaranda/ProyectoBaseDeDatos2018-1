$(document).ready(function () {
    //LISTAR PRODUCTOS DE PANADERIA
    $.ajax({
        url: 'view/modulos/ajax.php?listarProductosPanaderia=true',
        dataType: 'text',
        success: function (respuesta) {
            document.getElementById("inicioPanaderia").innerHTML = respuesta;
        },
        error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
        },
    });
    
    //LISTAR PRODUCTOS DE REPOSTERIA
    $.ajax({
        url: 'view/modulos/ajax.php?listarProductosReposteria=true',
        dataType: 'text',
        success: function (respuesta) {
            document.getElementById("inicioReposteria").innerHTML = respuesta;
        },
        error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
        },
    });
    
    //LISTAR PRODUCTOS DE PANADERIA PARA LA COMPRA DEL CLIENTE
    $("#botonCompraPanaderia").click(function () {
        $.ajax({
            url: 'view/modulos/ajax.php?listarProductosCompraPanaderia=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("CampoDeCompra").innerHTML = respuesta;
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });
    
    //LISTAR PRODUCTOS DE REPOSTERIA PARA LA COMPRA DEL CLIENTE
    $("#botonCompraReposteria").click(function () {
        $.ajax({
            url: 'view/modulos/ajax.php?listarProductosCompraReposteria=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("CampoDeCompra").innerHTML = respuesta;
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });
    

});