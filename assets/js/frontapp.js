jQuery(document).ready(function($){

console.log(lightbox_layout);
console.log(flyer_layout);
console.log(stickytop_layout);


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
    $('.optin-content-flyin').addClass('flyer_layout1');
    //$('.optin-flyin-display').addClass('flyer_layout1');
    //$('.optin-header-flyin').addClass('flyer_layout1');
    break;

  case 'flyer-layout2':
    //  code...
    $('.optin-content-flyin').addClass('flyer_layout2');
    break;

  case 'flyer-layout3':
    //  code...
    $('.optin-content-flyin').addClass('flyer_layout3');
    $('.optin-flyin-display').addClass('flyer_layout3');
    break;

}

// if(lightbox_layout=='lightbox-layout3'){

//     $('.modal-content.clearfix').addClass('lightbox_layout');

// };



});
