<div class="optin-flyin-display" >
    <div class="flyin-optin-image">
       <a id="menu-close-flyin" href="#" class="btn btn-light btn-lg pull-right">X</a>
       
            <?php if(empty($OPTIN_IMAGE)): ?>  
              <img src="<?php echo plugins_url('../../assets/image/flyer-icon_tx.png', __FILE__ ) ?>"; ?>
            <?php else: ?>
              <img src="<?php echo $OPTIN_IMAGE ?>"; ?>
            <?php endif; ?>

    </div>    
    <div class="flyin-optin-content">
        <?php if(empty($OPTIN_DATA)): ?>  
          <h3>Subscribe with us</h3>
          <p> Hello there!!! </p>
        <?php else: ?>
           <?php echo $OPTIN_DATA; ?>
        <?php endif; ?> 

        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <div id = "optin-email-subcribe" class="form-group">
            <input  type="email" name="optin_mail" value="" class="form-control" id="optin_mail" placeholder="Enter email" required>
          </div>
        <button id="optin-email-button" type="submit" class="btn btn-primary ">Subscribe!!</button>
        </form>
    </div>
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