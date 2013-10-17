	// // Accordion Handle
	// $('.acc-handle').click( function() {
	// 	var trig = $(this),
	// 		panel = trig.parent().next(".acc-panel")
	// 	trig.toggleClass("active");
	// 	panel.toggleClass("active");
	// 	if(panel.hasClass("active")) panel.css("height", panel[0].scrollHeight);
	// 	else panel.css("height", '');
	// });

	// // Download Form Handle
	// $('.d-handle').click(function(){
	// 	var trig = $(this),
	// 		panel = trig.parents(".acc-panel"),
	// 		form = panel.find(".d-form");
	// 	form.toggleClass("active");
	// 	if(form.hasClass("active")) {
	// 		panel.css("height", panel[0].scrollHeight);
	// 	}else{
	// 		panel.css("height", $("div", panel).first()[0].scrollHeight);
	// 	}
	// });

	// //Handle Window change
	// $(window).resize(function(){
	// 	$(".acc-panel.active").each(function(){
	// 		$(this).css("height", $(this)[0].scrollHeight);
	// 	});
	// });