jQuery(document).ready( function(){

	jQuery('.hamburguer').click(function(){
		jQuery('.mobile_header, .nav_mobile_wrapper').addClass('active');
	});

	jQuery('.menu_close').click(function(){
		jQuery('.mobile_header, .nav_mobile_wrapper').removeClass('active');
	});

});

jQuery(document).ready(function(){
     Formzin.iniciar();
});
