
jQuery(document).ready(function(){
	
	

	//capture zip value and store locally
	jQuery('.slp-widget-submit').click(function(){
	
		var zipVal = jQuery('.widget_slpwidgetbasic #address_input').val();
		var radiusVal = jQuery('.widget_slpwidgetbasic #radiusSelect').val();
		var testVal = jQuery('.widget_slpwidgetbasic #searchboxtest').val();
		
		localStorage.setItem('zip',zipVal);
		localStorage.setItem('radius',radiusVal);
		localStorage.setItem('test',testVal);
		
		window.location = '/locations/';
		
	});
	
	//set new zip on locations page
	var setZip = localStorage.getItem('zip');
	var setTest = localStorage.getItem('test');
	var mapZip = jQuery('#sl_div input#addressInput').val(setZip);
	var inputVal = jQuery('#sl_div input#addressInput').val();
	
	var setRadius = localStorage.getItem('radius');
	var mapRadius = jQuery('#sl_div #radiusSelect').val(setRadius);
	
	if(inputVal > 0){
		var inputLength = inputVal.length;
	}
	
	function submitForm(){
				
		if(setTest == "test"){
			jQuery('#addressSubmit').submit();
		}
		
		
	};
	
	//wait for plugin to load and submit form
	
	setTimeout(submitForm,1000);
	
	localStorage.removeItem('zip');
	localStorage.removeItem('test');

});//end ready