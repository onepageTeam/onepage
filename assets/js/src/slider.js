$(document).ready(function() {
	var slider_array = new Array();

	// Launch bxslider and create array of all slider on the page
	$('.template_slider').each(function(i){

		// Create default variables
		var sliderOptions_auto = true,
		sliderOptions_pager = false;

		// Define if this is a background slider or a regular slider
		// Is a background
		if( this.closest(".bgSection") != null ) {
		    sliderOptions_controls = false;
		   // is a regular slider
		}else {
		    sliderOptions_controls = true;
		}

		// Define custom value from CMS
		var sliderOptions_pause = $(this).data('slider_options_pause');
		if ( Number.isInteger(parseInt(sliderOptions_pause)) && (sliderOptions_pause != 0) ) {
			sliderOptions_auto = true;
			sliderOptions_pause = sliderOptions_pause;
		}else{
			sliderOptions_auto = false;
		}

		// Add custom values in slider
		var sliderOptions = {
			controls 	: sliderOptions_controls,
			pager 		: sliderOptions_pager,
			auto 		: sliderOptions_auto,
			pause 		: sliderOptions_pause,
			prevText	: '',
			nextText	: '',
			nextSelector: 'template_slider_btn_next',
			prevSelector: 'template_slider_btn_prev'
		};

		// Slider default value
		slider_array[i] = $(this).bxSlider( sliderOptions );

	});

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