<div class="optin-flyin-display" >
  <div class="optin-flyin-content">
    <a id="menu-close-flyin" href="#" class="btn btn-light btn-lg pull-right">X</a>
  </div>
<div clas="text">
  <h1>Title</h1>
  <?php echo $OPTIN_DATA; ?>
</div>
</div>
         

<script>
jQuery(document).ready(function ($) {

  $('#menu-close-flyin').on('click',function(){

     $('.optin-flyin-display').css({'display':'none'});

  });

    //__footer popup show__//
    $('footer').waypoint(function(direction) {
     $('.optin-flyin-display').animate({bottom: '0px'});
    }, {

   offset: '90%' // 
  }) ;
});
</script>