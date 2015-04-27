(function($) {


$(document).ready(function(){

  	$("#lightbox-layout").imagepicker();
  	$("#flyer-layout").imagepicker();
  	$("#stickytop-layout").imagepicker();


  // 	$(document).on('change', '#optin_layout', function(){
		// 	var addon = $(this).find("option:selected").attr("data-addon");
		// 	$("tr.addon-settings").addClass("hide");
		// 	$("tr[data-addon="+addon+"]").removeClass('hide');

		// console.log("adfsd");
		
		//  });


  	$(document).on('change', '#optin_type_hook', function(){
		var addon_layout = $(this).find("option:selected").attr("data-addon-layout");
			$("tr.addon-settings-layout").addClass("layout-hide");
			$("tr[data-addon-layout="+addon_layout+"]").removeClass('layout-hide');
	});

	$('tr.addon-settings-layout.'+layout_style).removeClass('layout-hide');

});


$(function() {
  $('#post_id, #page_id ').selectize({});
});



// $(document).on('keyup', '#editor_input', function(){
// 	alert('sd');
// });


	
}(jQuery));