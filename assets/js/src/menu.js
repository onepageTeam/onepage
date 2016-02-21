$(document).ready(function() {
	/* MENU BURGER */
	$("#nav-toggle").on("click", function(){		
		$(this).parent().toggleClass("active");
	});
});