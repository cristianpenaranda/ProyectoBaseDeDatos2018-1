$(document).ready(function () {
    $('#CampoDeCompra li').draggable({
        helper:'clone'
    });
    
    $('#CarritoDeCompras').droppable({
        drop:eventoDrop
    });
    
    function eventoDrop(){
        alert("si");
    }
});