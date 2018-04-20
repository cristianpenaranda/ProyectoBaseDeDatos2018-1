//FUNCION PARA SUBIR VISTA DE PANTALLA
function subir() {
   $('body, html').animate({
		scrollTop: '0px'
	},300);
}


//FUNCIONES DURANTE TODO EL DOCUMENTO DE LA PAGINA WEB
$(document).ready(function(){
   $('ul li a:first').addClass('active');
   $('#contenedor article').hide();
   $('#contenedor #inicio').show();
   subir();
   $('#modalPrincipal').modal('show')

	$('ul li a').click(function(){
   		 $('ul li a').removeClass('active');
   		 $(this).addClass('active');
   		 $('#contenedor article').hide();

   		var link = $(this).attr('id');
		$('#contenedor #'+link).show();
	    return false;
   });

	$('#anuncioRegistro').click(function(){
   		 $('ul li a').removeClass('active');
   		 $('#cuenta').addClass('active');
   		 $('#contenedor article').hide();
		 $('#contenedor #cuenta').show();		
   		 subir();
	     return false;
   });

	$('#anuncioOpinion').click(function(){
   		 $('ul li a').removeClass('active');
   		 $('#contacto').addClass('active');
   		 $('#contenedor article').hide();
		 $('#contenedor #contacto').show();	
		 subir();
	    return false;
   });

	$('.flechaSubir').click(function(){
		subir();
	});

	$(window).scroll(function(){
		if($(this).scrollTop() > 0 ){
			$('.flechaSubir').slideDown(300);
		}else{
			$('.flechaSubir').slideUp(300);
		}
	});
});