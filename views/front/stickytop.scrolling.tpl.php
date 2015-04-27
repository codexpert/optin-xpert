<div id="stickytop-wrapper">
   <div class="stickytop-affix">
     <a id="stickytop-close" href="#" class="btn pull-right">X</a>          
      <div clas="optin-text">                
        <?php echo $OPTIN_DATA; ?>
    </div>
  </div>
</div>';




<script>
jQuery(document).ready(function () {

  $('#stickytop-close').on('click',function(){
  $('#stickytop-wrapper').css({'display':'none'});

  });    

    //__footer popup show__//
    $('footer').waypoint(function(direction) {

    $('#stickytop-wrapper').addClass('in');

    }, {
  offset: '90%' 
  }) ;
});
</script>