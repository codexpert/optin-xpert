<div id="lightBox" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content clearfix">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
        </div>
          <div class="modal-body">
            <div clas="optin-text">                
              <?php echo $OPTIN_DATA; ?>
            </div>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<script>
jQuery(document).ready(function () {
  var TIMER = <?php echo $OPTIN_TIMER; ?>; // jshint ignore:line

//hide a div after  seconds
  setTimeout( function(){
  $('#lightBox').modal('show');
  }, TIMER);
});
</script>