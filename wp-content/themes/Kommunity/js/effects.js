jQuery(document).ready(function($){

    $('li.bp-popover').popover({
    	trigger:'focus',
    	selector : '.bp-member',
        placement : 'bottom',
        html :true,
        title: function() {
          return $(this).siblings('.bp-home-title').html();
        },
        content: function() {
          return $(this).siblings('.bp-home-content').html();
        }        
    });

// Mobile menu
  jQuery('#kommunity').tinyNav();

});


jQuery(window).scroll(function() {
if (jQuery(this).scrollTop() > 110){  
    jQuery('.main-nav').addClass("stickyhead");
    jQuery('body').addClass("fix-body");
  }
  else{
    jQuery('.main-nav').removeClass("stickyhead");
    jQuery('body').removeClass("fix-body");
  }
});