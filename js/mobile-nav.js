jQuery(document).ready(function(){
	
	jQuery('.nav-control').click(function() {
		jQuery('#navigation').slideToggle(400, function(){
		
		});
		
		jQuery('.play').not(this).css('background-image', 'url(/wp-content/themes/burger21/images/menu-icon.png))').removeClass('playing');
	
		if(!$(this).is('.playing')){
		   $(this).css('background-image', 'url(/wp-content/themes/burger21/images/menu-close.png)').addClass('playing');
		} else {
		   $(this).css('background-image', 'url(/wp-content/themes/burger21/images/menu-icon.png)').removeClass('playing');
		}
	});
	
	jQuery(window).resize(function(){
		var w = jQuery(window).width();
		if(w > 525 && jQuery('#navigation').is(':hidden')) {  
			 jQuery('#navigation').removeAttr('style');  
		}
	});		
	
});	