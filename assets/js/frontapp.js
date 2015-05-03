jQuery(document).ready(function($){

console.log(lightbox_layout);
console.log(flyer_layout);
console.log(stickytop_layout);

//$('#stickytop-wrapper').affix();
//$('#stickytop-wrapper').affix();
 $('#stickytop-wrapper').affix({
  offset: {
    top: 100,
    bottom: function () {
      return (this.bottom = $('.footer').outerHeight(true));
    }
  }
});

switch (lightbox_layout) {

  case 'lightbox-layout1':
    //  code...
    $('.modal-content.clearfix').addClass('lightbox_layout1');
    break;

  case 'lightbox-layout2':
    //  code...
    $('.modal-content.clearfix').addClass('lightbox_layout2');
    break;

  case 'lightbox-layout3':
    //  code...
    $('.modal-content.clearfix').addClass('lightbox_layout3');
    break;

}

switch (flyer_layout) {

  case 'flyer-layout1':
    //  code...
    $('.flyin-optin-content').addClass('flyer_layout1');
    //$('.optin-flyin-display').addClass('flyer_layout1');
    //$('.optin-header-flyin').addClass('flyer_layout1');
    break;

  case 'flyer-layout2':
    //  code...
    $('.flyin-optin-content').addClass('flyer_layout2');
    //$('.optin-flyin-display').addClass('flyer_layout3');
    $('.flyin-optin-image').addClass('flyer_layout2');
    break;

  case 'flyer-layout3':
    //  code...
    $('.flyin-optin-content').addClass('flyer_layout3');
    $('.optin-flyin-display').addClass('flyer_layout3');
     $('.flyin-optin-image').addClass('flyer_layout3');
    break;

}

switch (stickytop_layout) {

  case 'stickytop-layout1':
    //  code...
    $('.stickytop-wrapper').addClass('stickytop_layout1');
    //$('.optin-stickytop-display').addClass('stickytop_layout1');
    //$('.optin-header-stickytop').addClass('stickytop_layout1');
    break;

  case 'stickytop-layout2':
    //  code...
    $('.stickytop-wrapper').addClass('stickytop_layout2');
    //$('.optin-stickytop-display').addClass('stickytop_layout3');
    break;

  case 'stickytop-layout3':
    //  code...
    $('.stickytop-wrapper').addClass('stickytop_layout3');

    break;

}




});