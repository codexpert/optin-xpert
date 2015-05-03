<div class= "stickytop-wrapper" id="stickytop-wrapper" data-spy="affix" data-offset-top="200">
  <div class="stickytop-affix stikcytop-optin-content">
       <a id="stickytop-close" href="#" class="btn pull-right">X</a>

    <div class="stickytop-optin-image">
      <?php if(empty($OPTIN_IMAGE)): ?>  
        <img src="<?php echo plugins_url('../../assets/image/flyer-icon_tx.png', __FILE__ ) ?>"; ?>
      <?php else: ?>
        <img src="<?php echo $OPTIN_IMAGE ?>"; ?>
      <?php endif; ?> 
    </div>

    <div class="stickytop-text">
      <?php if(empty($OPTIN_DATA)): ?>  
        <h3>Subscribe with us</h3>
        <p> Hello there!!! </p>
      <?php else: ?>
         <?php echo $OPTIN_DATA; ?>
      <?php endif; ?> 
    </div>

        <div class="stickytop-optin-content">
          <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div id = "optin-email-subcribe" class="form-group">
            <input  type="email" name="optin_mail" value="<?php echo $optin_mail; ?>" class="form-control" id="optin_mail" placeholder="Enter email" required>
            </div>
            <button id="optin-stiky-email-button" type="submit" class="btn btn-success ">Subscribe!!</button>
          </form>
      </div>
    </div>
</div>

<script>
jQuery(document).ready(function ($) {

var TIMER = <?php echo $OPTIN_TIMER; ?>; // jshint ignore:line

    $('#stickytop-close').on('click',function(){
    $('#stickytop-wrapper').css({'display':'none'});

  });

  setTimeout( function(){
    $('#stickytop-wrapper').addClass('in');
  }, TIMER );

});
</script>
