 (function($) {
 $(document).ready(function () {



 // if(!$('#sidebar-pagebottom').hasClass('introduction')) {
 //            $('#sidebar-pagebottom').addClass('introduction');

 //        }


$('footer')
   .waypoint(function(direction) {
     // Highlight element when related content
     // is 10% percent from the bottom... 
     // remove if below
     $('#myModal').modal('show');
     getRelatedNavigation(this).toggleClass('active', direction === 'down');
   }, {
     offset: '90%' // 
   })


//  	$('.introduction').waypoint(function(event, direction) {
//    if (direction === 'down') {
//       // do this on the way down
//       alert('asd');
//    }
//    else {
//       // do this on the way back up through the waypoint
//    offset: '50%'  // trigger at middle of page.

//    }
// });


		// $('.introduction').waypoint(function(event, direction) {
		// 	//if (direction === 'down') {

		// 	//alert('test');
		// 	$('#myModal').modal('show');
		// //}
		//     //alert('You have scrolled to my waypoint.');
		    
		//     //notify("Hello World");
		// }, {
		//     offset: '70%'
		// });


// function setinterval() {
// //alert("test");
// $('#myModal').modal('show');
// }
// var myTimer = setTimeout(setinterval, 5000);

	});
}(jQuery));