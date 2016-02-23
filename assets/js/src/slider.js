$(document).ready(function() {
	// Create default variables
	var slider_array = new Array(),
	sliderOptions_auto = false,
	sliderOptions_pause = 4000;


	// Launch bxslider and create array of all slider on the page
	$('.template_slider').each(function(i){

// Test if this is a background slider or a regular slider
if( this.closest(".bgSection") != null ) {
    console.log("has parent ")
}else {
    console.log("has NOT parent ")
}

		// Define custom value from CMS
		var background_slider_duration = $(this).data('background_slider_duration');
		if ( Number.isInteger(parseInt(background_slider_duration)) && (background_slider_duration != 0) ) {
			sliderOptions_auto = true;
			sliderOptions_pause = background_slider_duration;
		}else{
			sliderOptions_auto = false;
		}

		// Add custom values in slider
		var sliderOptions = {
			controls : true,
			pager : false,
			auto : sliderOptions_auto,
			pause : sliderOptions_pause
		};

		// Slider default value
		slider_array[i] = $(this).bxSlider( sliderOptions );

	});
	console.log(slider_array);

	// bind controls on custom controls, and run functions on every slider
	$('.bxslider-controls a').bind('click', function(e){
		e.preventDefault();

		var obj = $(this).parent().parent().find('.template_slider');
		var index = $('.template_slider').index(obj);

		if($(this).hasClass('template_slider_btn_prev')) {
			slider_array[index].goToPrevSlide();  
		} else if($(this).hasClass('template_slider_btn_next')) {
			slider_array[index].goToNextSlide();  
		}
	});
});