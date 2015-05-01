<div id="lightBox" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content clearfix">     
          <div class="modal-body">
            <div class="lightbox-optin-image">           
              <?php echo '<img src="' . plugins_url('../../assets/image/flyer-icon_tx.png', __FILE__ ) . '" > '; ?>
            </div>
            <div class="lightbox-optin-content">
                  <h3>Subscribe with us</h3>
                    <p> Hello there!!! </p>
                <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                  <div id = "optin-email-subcribe" class="form-group">                    
                  <input  type="email" name="optin_mail" value="" class="form-control" id="optin_mail" placeholder="Enter email" required>
                  </div>
                  <button id="optin-email-button" type="submit" class="btn btn-success ">Subscribe!!</button>
                </form>
            </div>
        </div>        
    </div>
  </div>
</div>

<script>
jQuery(document).ready(function ($) {
  var TIMER = <?php echo $OPTIN_TIMER; ?>; // jshint ignore:line

//hide a div after  seconds
  setTimeout( function(){
  $('#lightBox').modal('show');
  }, TIMER);
});
</script>