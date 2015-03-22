(function($) {
 $(document).ready(function () {


     $('#menu-close').on('click',function(){
    $('#optin-flyin-wrapper').css({'display':'none'});
	});


	    // $('#myModalflyin').modal('show');
	     $("#optin-flyin-wrapper").animate({bottom: '0px'});
	   //   getRelatedNavigation(this).toggleClass('active', direction === 'down');
	   // }, {
	   //   offset: '90%' // 
	   // })

	});
}(jQuery));