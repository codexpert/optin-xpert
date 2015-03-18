 (function($) {


 $(document).ready(function () {

 	

// (function($) {
//  	 $(document).ready(function () {


//  	 alert('test');


 if(!$('#sidebar-pagebottom').hasClass('introduction')) {
            $('#sidebar-pagebottom').addClass('introduction');

        }


 //$("#myModal").addClass("introduction");
 // alert('sdfs');

		$('.introduction').waypoint(function() {

			//alert('test');
			$('#myModal').modal('show');
		    //alert('You have scrolled to my waypoint.');
		    
		    //notify("Hello World");
		}, {
		    offset: '70%'
		});


function setinterval() {
//alert("test");
$('#myModal').modal('show');
}
var myTimer = setTimeout(setinterval, 5000);

	});
}(jQuery));