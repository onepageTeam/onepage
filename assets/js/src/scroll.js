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