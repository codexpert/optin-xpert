<div id="stickytop-wrapper" data-spy="affix" data-offset-top="200">
  <div class="stickytop-affix">
       <a id="stickytop-close" href="#" class="btn pull-right">X</a>          
     <div clas="optin-text">                
         <?php echo $OPTIN_DATA; ?>
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