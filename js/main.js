$(document).ready(function(){
   $('ul li a:first').addClass('active');
   $('body, html').animate({
		scrollTop: '0px'
	},300);
   //$('#modalPrincipal').modal('show')

	$('ul li a').click(function(){
   		 $('ul li a').removeClass('active');
   		 $(this).addClass('active');
   });

	$('.flechaSubir').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		},300);
	});

	$(window).scroll(function(){
		if($(this).scrollTop() > 0 ){
			$('.flechaSubir').slideDown(300);
		}else{
			$('.flechaSubir').slideUp(300);
		}
	});
});