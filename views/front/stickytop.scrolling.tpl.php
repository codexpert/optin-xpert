<div class= "stickytop-wrapper" id="stickytop-wrapper" data-spy="affix" data-offset-top="200">
  <div class="stickytop-affix">
       <a id="stickytop-close" href="#" class="btn pull-right">X</a>          
     <div clas="optin-text">                
         <?php echo $OPTIN_DATA; ?>
     </div>

  </div>
  <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div id = "optin-email-subcribe" class="form-group">                    
    <input  type="email" name="optin_mail" value="<?php echo $optin_mail; ?>" class="form-control" id="optin_mail" placeholder="Enter email" required>
    </div>
  <button id="optin-email-button" type="submit" class="btn btn-primary ">Subscribe!!</button>
  </form>
</div>



<script>
jQuery(document).ready(function ($) {

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