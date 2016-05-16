$(document).ready(function() {
	/**
	 * HOME VIDEO
	
	$('.homepage_content').tubular({ 
		videoId			: '841VcS9IxDc',
		ratio			: 16/9, // usually either 4/3 or 16/9 -- tweak as needed
		mute 			: true,
		repeat			: true,
		width			: $(window).width(), // no need to override
		wrapperZIndex	: 99
	});
 */








	/**
	 * SLIDER
	 */
	/*var slider_array = new Array();
	$(".template_slider").each(function(){
		var $parentId = '#'+ $(this).parent().parent().parent().attr("id");
		
		console.log($(this));
		
		$( $parentId +" .template_slider").bxSlider({
			// Manage selector
			nextSelector: $parentId +' .template_slider_btn_prev',
			prevSelector: $parentId +' .template_slider_btn_next',
			nextText: 'Next',
			prevText: 'Prev',
			// Manager pager
			pager: false
			//pagerSelector: '',
		});
	});*/



    
});
$(document).ready(function() {
	/* MENU BURGER */
	$("#nav-toggle").on("click", function(){		
		$(this).parent().toggleClass("active");
	});
});
$(document).ready(function() {
	/**
	 * SCROLL / MENU
	 */
	// Cache selectors
	var lastId,
	topMenu = $("#mainMenu > nav"),
	menuItems = topMenu.find("a"), // All list items
	scrollItems = menuItems.map(function(){ // Anchors corresponding to menu items
		var item = $($(this).attr("href"));
		if (item.length) { return item; }
	});


	/* Bind to scroll */
	function dynamicUrlNmenu(){
		// Get container scroll position
		var fromTop = $(this).scrollTop();

		// Get id of current scroll item
		var cur = scrollItems.map(function(){
			if ($(this).offset().top < fromTop)
			return this;
		});

		// Get the id of the current element
		cur = cur[cur.length-1];
		var id = cur && cur.length ? cur[0].id : "";

		if (lastId !== id) {
			lastId = id;
			// Set/remove active class
			menuItems
				.parent().removeClass("active")
				.end().filter("[href='#"+id+"']").parent().addClass("active");
			/*Koin
			Bug on scroll

			location.hash = id;*/
		}
	}

	$(window).scroll(function(){
		dynamicUrlNmenu();
	});
	dynamicUrlNmenu();




	/**
	 * SMOOTH SCROLL WHEEL
	 */
	var $window = $(window);
	var scrollTime = .4;
	var scrollDistance = 400;
	var delta;
	var scrollTop;
	var finalScroll;

	$window.on("mousewheel DOMMouseScroll", function(event){
		event.preventDefault();	
		delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
		scrollTop = $window.scrollTop();
		finalScroll = scrollTop - parseInt(delta*scrollDistance);

		TweenMax.to($window, scrollTime, {
			scrollTo : { y:finalScroll, autoKill:true },
			ease: Power1.easeOut,
			overwrite: 5
		});

	});
});
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