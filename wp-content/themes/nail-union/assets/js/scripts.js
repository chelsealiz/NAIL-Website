jQuery(document).ready(function($) {

  $(document).foundation();


  $('body').on('click', '#offcanvas-menu-trigger', function(){
    $('#offcanvas-menu').toggleClass('active');
    $('#offcanvas-menu-trigger').toggleClass('active');
    $('#offcanvas-menu-close').toggleClass('active');
    $('body').toggleClass('noscroll');
  });

  $('body').on('click', '#offcanvas-menu-close', function(){
    $('#offcanvas-menu').toggleClass('active');
    $('#offcanvas-menu-trigger').toggleClass('active');
    $('#offcanvas-menu-close').toggleClass('active');
    $('body').toggleClass('noscroll');
  });

  $('body').on('click', '.officer', function(){
    $('#dim-overlay').toggleClass('active');
    var popup = $(this).children('.main-popup');
    $(popup).toggleClass('active');
    $('body').toggleClass('noscroll');
  });

  $('body').on('click', '.officers-popup-close', function(event){
    $('#dim-overlay').toggleClass('active');
    var popup = $(this).parents('.main-popup');
    console.log(popup);
    $(popup).toggleClass('active');
    event.stopPropagation();
    $('body').toggleClass('noscroll');
  });

  $('body').on('click', '.lawyer', function(){
    $('#dim-overlay').toggleClass('active');
    var popup = $(this).children('.main-popup');
    $(popup).toggleClass('active');
    $('body').toggleClass('noscroll');
  });

  $('body').on('click', '.lawyers-popup-close', function(event){
    $('#dim-overlay').toggleClass('active');
    var popup = $(this).parents('.main-popup');
    console.log(popup);
    $(popup).toggleClass('active');
    event.stopPropagation();
    $('body').toggleClass('noscroll');
  });

  
  $('.pb-gallery-wrapper').slick({
    prevArrow: '<button type="button" class="slick-arrow slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button type="button" class="slick-arrow slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    adaptiveHeight: true,
    dots: false
  });

  $('.pb-gallery-thumbnails .thumbnail').on('click',function(e){
    var thm = $(this), index = thm.index(), gallery = thm.closest('.pb-gallery').find('.slick-slider');
    gallery.slick('slickGoTo',index);
  });

  // Remove empty P tags created by WP inside of Accordion and Orbit
  $('.accordion p:empty, .orbit p:empty').remove();

	// Makes sure last grid item floats left
	$('.archive-grid .columns').last().addClass( 'end' );

	// Adds Flex Video to YouTube and Vimeo Embeds
  $('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
    if ( $(this).innerWidth() / $(this).innerHeight() > 1.5 ) {
      $(this).wrap("<div class='widescreen flex-video'/>");
    } else {
      $(this).wrap("<div class='flex-video'/>");
    }
  });

});
