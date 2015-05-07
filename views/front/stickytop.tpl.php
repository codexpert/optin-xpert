<div id="stickytop-wrapper" class="stickytop-wrapper clearfix">
  <div class="stikcytop-optin-content">
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
        <p>Subscribe and learn of new tools</p>
      <?php else: ?>
         <?php echo $OPTIN_DATA; ?>
      <?php endif; ?> 
    </div>

        <div class="stickytop-optin-content">
          <form id="tx-optin-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div id = "optin-email-subcribe" class="form-group">
            <input  type="email" name="optin_mail" value="<?php echo $optin_mail; ?>" class="form-control" id="optin_mail" placeholder="Enter email" required>
            </div>
            <button id="optin-stiky-email-button" type="submit" class="btn btn-success ">Subscribe!!</button>
          </form>
      </div>
    </div>
</div>


<?php if($OPTIN_TIMER === "scrolldown"): ?>
<script> 
    jQuery(document).ready(function ($) {
     
      $('#stickytop-close').on('click',function(){
      $('#stickytop-wrapper').css({'display':'none'});
     
      });  

    var waypoint = new Waypoint({
      element: document.querySelector('body'),
      handler: function(direction) {
         $('#stickytop-wrapper').addClass('in');
      },
      offset: '-90%' 
    });

    });
</script>


 <?php else: ?>
  <script>
    jQuery(document).ready(function ($) {
       
    var TIMER = <?php echo $OPTIN_TIMER; ?>; // jshint ignore:line

        $('#stickytop-close').on('click',function(){
        $('#stickytop-wrapper').css({'display':'none'});
        $('body').css({'margin-top':'0'});
      });

      setTimeout( function(){
        $('body').css({'margin-top':'60px'});
        $('#stickytop-wrapper').addClass('in');
      }, TIMER );

    });
    </script>
<?php endif; ?>

