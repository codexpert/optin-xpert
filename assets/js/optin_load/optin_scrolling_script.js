(function($) {
 $(document).ready(function () {

	//__footer popup show__//
	$('footer').waypoint(function(direction) {
	     // Highlight element when related content
	     // is 10% percent from the bottom... 
	     // remove if below
	     $('#myModal').modal('show');
	     getRelatedNavigation(this).toggleClass('active', direction === 'down');
	   }, {
	     offset: '90%' // 
	   })

	});
}(jQuery));