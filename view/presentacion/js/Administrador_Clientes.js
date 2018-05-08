$(document).ready(function(){
     //LISTAR CLIENTES
    $("#botonListarClientes").click(function(){
        $.ajax({

            url: 'view/modulos/ajax.php?listarClientes=true',
            dataType: 'text',
            success: function (respuesta) {
                document.getElementById("tablaCliente").innerHTML = respuesta;
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },
        });
    });
    
});