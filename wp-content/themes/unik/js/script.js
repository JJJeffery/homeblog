/*jshint jquery:true */
/*global $:true */

var $ = jQuery.noConflict();

$(document).ready(function($) {
	"use strict";
  /* global DevSolutionSkill: false */ 
  
	/*----------------PROMO HEAD--------------------*/
	var sliderBanner = $('#banner .headpromo');
	try{		
		sliderBanner.bxSlider({
			auto: true,
			mode: 'vertical'
		});
	} catch(err) {
		//alert ('There was an issue displaying the slider');
	}
	// sticky header
	var headmar= $('.fixed-head').height()+20;
	$('.fixed-head').next('div').css('margin-top', headmar)
	

	/*-------------------------------------------------*/
	/* =  portfolio isotope
	/*-------------------------------------------------*/

	var winDow = $(window);
		// Needed variables
		var $container=$('.portfolio-box');
		var $filter=$('.filter.non-paginated');

		try{
			$container.imagesLoaded( function(){
				$container.show();
				$container.isotope({
					filter:'*',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});

			});
		} catch(err) {
		}

		winDow.bind('resize', function(){
			var selector = $filter.find('a.active').attr('data-filter');

			try {
				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 750,
						easing	: 'linear',
						queue	: false,
					}
				});
			} catch(err) {
			}
			return false;
		});
		
		// Isotope Filter 
		$filter.find('a').click(function(){
			var selector = $(this).attr('data-filter');

			try {
				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 750,
						easing	: 'linear',
						queue	: false,
					}
				});
			} catch(err) {

			}
			return false;
		});


	var filterItemA	= $('.filter li a');

		filterItemA.on('click', function(){
			var $this = $(this);
			if ( !$this.hasClass('active')) {
				filterItemA.removeClass('active');
				$this.addClass('active');
			}
		});

	/*-------------------------------------------------*/
	/* =  fullwidth carousell
	/*-------------------------------------------------*/
	try {
		$.browserSelector();
		// Adds window smooth scroll on chrome.
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	}
	
	/*-------------------------------------------------*/
	/* =  Scroll to TOP
	/*-------------------------------------------------*/

	var animateTopButton = $('.go-top'),
		htmBody = $('html, body');
		
	animateTopButton.click(function(){
	htmBody.animate({scrollTop: 0}, 'slow');
		return false;
	});

	/*-------------------------------------------------*/
	/* =  remove animation in mobile device
	/*-------------------------------------------------*/
	if ( winDow.width() < 992 ) {
		$('div.triggerAnimation').removeClass('animated');
		$('div.triggerAnimation').removeClass('triggerAnimation');
	}

	/*-------------------------------------------------*/
	/* =  flexslider
	/*-------------------------------------------------*/
	try {

		var SliderPost = $('.flexslider');

		SliderPost.flexslider({
			animation: "fade",
			slideshowSpeed: 3000,
			easing: "swing"
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  skills circle
	/*-------------------------------------------------
	
	try{
		DevSolutionSkill.init('circle'); 
		DevSolutionSkill.init('circle2'); 
		DevSolutionSkill.init('circle3'); 
		DevSolutionSkill.init('circle4');
	} catch(err) {
	}
	
	/*-------------------------------------------------*/
	/* =  Animated content
	/*-------------------------------------------------

	try {
		/* ================ ANIMATED CONTENT ================ 
        if ($(".animated")[0]) {
            $('.animated').css('opacity', '0');
        }

        $('.triggerAnimation').waypoint(function() {
            var animation = $(this).attr('data-animate');
            $(this).css('opacity', '');
            $(this).addClass("animated " + animation);

        },
                {
                    offset: '85%',
                    triggerOnce: true
                }
        );
	} catch(err) {

	}
	*/
   /* ---------------------------------------------------
	Animation on Scroll
-------------------------------------------------- */
		
		
$('.animation').waypoint(function(direction) {
  $(this).addClass('animation-active');
}, { offset: '100%' });

	
	/* ---------------------------------------------------------------------- */
	/*	magnific-popup
	/* ---------------------------------------------------------------------- */

	try {
		// Example with multiple objects
		$('.zoom, .zoomshort').magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			}
		});
	} catch(err) {

	}

	try {
		// Example with multiple objects
		$('.zoom.video').magnificPopup({
			type: 'iframe',
			gallery: {
				enabled: true
			}
		});
	} catch(err) {

	}

	/* ---------------------------------------------------------------------- */
	/*	Accordion
	/* ---------------------------------------------------------------------- */
	var clickElem = $('a.accord-link');

	clickElem.on('click', function(e){
		e.preventDefault();

		var $this = $(this),
			parentCheck = $this.parents('.accord-elem'),
			accordItems = $('.accord-elem'),
			accordContent = $('.accord-content');
			
		if( !parentCheck.hasClass('active')) {

			accordContent.slideUp(400, function(){
				accordItems.removeClass('active');
			});
			parentCheck.find('.accord-content').slideDown(400, function(){
				parentCheck.addClass('active');
			});

		} else {

			accordContent.slideUp(400, function(){
				accordItems.removeClass('active');
			});

		}
	});

	/* ---------------------------------------------------------------------- */
	/*	Tabs
	/* ---------------------------------------------------------------------- */
	var clickTab = $('.tab-links li a');

	clickTab.on('click', function(e){
		e.preventDefault();

		var $this = $(this),
			hisIndex = $this.parent('li').index(),
			tabCont = $('.tab-content'),
			tabContIndex = $(".tab-content:eq(" + hisIndex + ")");

		if( !$this.hasClass('active')) {

			clickTab.removeClass('active');
			$this.addClass('active');

			tabCont.slideUp(400);
			tabCont.removeClass('active');
			tabContIndex.delay(500).slideDown(400);
			tabContIndex.addClass('active');
		}
	});


	/*-------------------------------------------------*/
	/* = skills animate
	/*-------------------------------------------------*/

	try{

		var skillBar = $('.skills-section');
		skillBar.appear(function() {

			var animateElement = $(".meter > span");
			animateElement.each(function() {
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			});

		});
	} catch(err) {
	}

	/*-------------------------------------------------*/
	/* =  count increment
	/*-------------------------------------------------*/
	try {
		$('.statistic-post').appear(function() {
			$('.timer').countTo({
				speed: 4000,
				refreshInterval: 60,
				formatter: function (value, options) {
					return value.toFixed(options.decimals);
				}
			});
		});
	} catch(err) {

	}
	
	/*-------------------------------------------------*/
	/* = slider Testimonial
	/*-------------------------------------------------

	var slidertestimonial = $('.bxslider');
	try{		
		slidertestimonial.bxSlider({
			mode: 'vertical'
		});
	} catch(err) {
	}

	/*-------------------------------------------------*/
	/* =  Shop accordion
	/*-------------------------------------------------*/

	var AccordElement = $('a.accordion-link');

	AccordElement.on('click', function(e){
		e.preventDefault();
		var elemSlide = $(this).parent('li').find('.accordion-list-content');

		if( !$(this).hasClass('active') ) {
			$(this).addClass('active');
			elemSlide.slideDown(200);
		} else {
			$(this).removeClass('active');
			elemSlide.slideUp(200);			
		}
	});

	/* ---------------------------------------------------------------------- */
	/*	Contact Form
	/* ---------------------------------------------------------------------- 

	var submitContact = $('#submit_contact');

	submitContact.on('click', function(e){
		e.preventDefault();

		var $this = $(this);
		
		$.ajax({
			type: "POST",
			url: 'contact.php',
			dataType: 'json',
			cache: false,
			data: $('#contact-form').serialize(),
			success: function(data) {

				if(data.info !== 'error'){
					$this.parents('form').find('input[type=text],textarea,select').filter(':visible').val('');
					$('.inner-contact-form').fadeOut(200, function(){
						$('#msg-success').fadeIn(200);
					});
				} else {
					$('.inner-contact-form').fadeOut(200, function(){
						$('#msg-error').fadeIn(200);
					});
				}
			}
		});
	});

	/* ---------------------------------------------------------------------- */
	/*	menu responsive
	/* ---------------------------------------------------------------------- */
	var menuClick = $('a.elemadded'),
		navbarVertical = $('.navbar-vertical');
		
	menuClick.on('click', function(e){
		e.preventDefault();

		if( navbarVertical.hasClass('active') ){
			navbarVertical.removeClass('active');
		} else {
			navbarVertical.addClass('active');
		}
	});

	winDow.bind('resize', function(){
		navbarVertical.removeClass('active');
	});

});

/*contact widget*/
function checkemail(emailaddress){
	"use strict";
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i); 
	return pattern.test(emailaddress); 
}
$(document).ready(function(){ 
	"use strict";
	$('#registerErrors, .widgetinfo').hide();		
	var $messageshort = false;
	var $emailerror = false;
	var $nameshort = false;
	var $namelong = false;
	
	$('#contactFormWidget input#wformsend').click(function(){ 
		var $name = $('#wname').val();
		var $email = $('#wemail').val();
		var $message = $('#wmessage').val();
		var $contactemail = $('#wcontactemail').val();
		var $contacturl = $('#wcontacturl').val();
		var $subject = $('#wsubject').val();
	
		if ($name !== '' && $name.length < 3){ $nameshort = true; } else { $nameshort = false; }
		if ($name !== '' && $name.length > 30){ $namelong = true; } else { $namelong = false; }
		if ($email !== '' && checkemail($email)){ $emailerror = true; } else { $emailerror = false; }
		if ($message !== '' && $message !== 'Message' && $message.length < 3){ $messageshort = true; } else { $messageshort = false; }
		
		$('#contactFormWidget .loading').animate({opacity: 1}, 250);
		
		if ($name !== '' && $nameshort !== true && $namelong !== true && $email !== '' && $emailerror !== false && $message !== '' && $messageshort !== true && $contactemail !== ''){ 
			$.post($contacturl, 
				{type: 'widget', contactemail: $contactemail, subject: $subject, name: $name, email: $email, message: $message}, 
				function(/*data*/){
					$('#contactFormWidget .loading').animate({opacity: 0}, 250);
					$('.form').fadeOut();
					$('#bottom #wname, #bottom #wemail, #bottom #wmessage').css({'border':'0'});
					$('.widgeterror').hide();
					$('.widgetinfo').fadeIn('slow');
					$('.widgetinfo').delay(2000).fadeOut(1000, function(){ 
						$('#wname, #wemail, #wmessage').val('');
						$('.form').fadeIn('slow');
					});
				}
			);
			
			return false;
		} else {
			$('#contactFormWidget .loading').animate({opacity: 0}, 250);
			$('.widgeterror').hide();
			$('.widgeterror').fadeIn('fast');
			$('.widgeterror').delay(3000).fadeOut(1000);
			
			if ($name === '' || $name === 'Name' || $nameshort === true || $namelong === true){ 
				$('#wname').css({'border-left':'4px solid #red'}); 
			} else { 
				$('#wname').css({'border-left':'4px solid #929DAC'}); 
			}
			
			if ($email === '' || $email === 'Email' || $emailerror === false){ 
				$('#wemail').css({'border-left':'4px solid red'});
			} else { 
				$('#wemail').css({'border-left':'4px solid #929DAC'}); 
			}
			
			if ($message === '' || $message === 'Message' || $messageshort === true){ 
				$('#wmessage').css({'border-left':'4px solid red'}); 
			} else { 
				$('#wmessage').css({'border-left':'4px solid #929DAC'}); 
			}
			
			return false;
		}
	});
});