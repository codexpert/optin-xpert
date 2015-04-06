(function($) {
 $(document).ready(function () {

		$("#optin_type_hook").on('change',function(){
			$(this).closest('#backend_form_optin').find('.optin-timer').removeClass('optin-timer-none');
		});

		$('.layout-flyer-1').on('click',function(){
			var shortClosest      = $(this).closest('.form-table');
			var flyer_one_header  = "Join Our Weekly newsletters ";
			var flyer_one_para    = "Receive the most recent news";
			var flyer_one_image   = "Receive the most recent news";
			shortClosest.find('.flyer-pre-front > h2').text(flyer_one_header);
            shortClosest.find('.xpert-optin-preview').removeClass('xpert-optin-preview-none');
		});

	});
}(jQuery));
