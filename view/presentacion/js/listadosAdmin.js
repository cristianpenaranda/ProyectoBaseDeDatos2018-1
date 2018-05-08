$(document).ready(function(){
     $('#listadosAdmin article').hide();
     $('#listadosAdmin #article1').show();
     
     $('#tabListado1').click(function(){
         $('#listadosAdmin article').hide();
         $('#listadosAdmin #article1').show();
     });
     
     $('#tabListado2').click(function(){
         $('#listadosAdmin article').hide();
         $('#listadosAdmin #article2').show();
     });
     
     $('#tabListado3').click(function(){
         $('#listadosAdmin article').hide();
         $('#listadosAdmin #article3').show();
     });
     
});