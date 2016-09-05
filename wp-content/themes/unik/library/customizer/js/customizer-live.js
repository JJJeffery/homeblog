
( function( $ ) {
	
/******************global color****************************/
	wp.customize( 'global_color', function( value ) {
		value.bind( function( newval ) {
			$('header .main-menu li a').css('background-color', newval );
			$('.pager-line ul li').css('background-color', newval );
			$('.blog-section .blog-post .post-gal .hover-post a').css('background-color', newval );
			$('footer .up-footer, a.elemadded').css('background-color', newval );
			$('footer .footer-line a').css('background-color', newval );
			$('.tagcloud ul.wp-tag-cloud li a:hover').css('background-color', newval );
			$('#contactFormWidget input[type="submit"]').css('background-color', newval );
			$('.social-box ul li a').css('background-color', newval );
			$('.horizontal-tabs-box .nav-tabs li.active a').css('background-color', newval );
			$('.comment-content a.comment-reply-link').css('background-color', newval );
			$('.comment-form input[type="submit"]').css('background-color', newval );
			$('.project-post .hover-box a').css('background-color', newval );
			$('ul.filter li a.active').css('background-color', newval );
			$('.btn-default').css('background-color', newval );
			$('.team-post .right-part > a').css('background-color', newval );
			$('.accord-title').css('background-color', newval );
			$('.vertical-tabs-box .nav-tabs li.active a').css('background-color', newval );
			$('.testimonial-section .bx-wrapper .bx-pager.bx-default-pager a:hover').css('background-color', newval );
			$('.testimonial-section .bx-wrapper .bx-pager.bx-default-pager a.active').css('background-color', newval );
			$('.unik-line-section').css('background-color', newval );
			$('.flex-direction-nav .flex-next').css('background-color', newval );
			$('.flex-direction-nav .flex-prev').css('background-color', newval );
			$('.features-post a').css('background-color', newval );
			$('.services-section2 .services-post a').css('background-color', newval );
			$('.services-section2 .services-post span').css('background-color', newval );
			$('.services-section .services-post .inner-services-post a').css('background-color', newval );
			$('#contact-form button').css('background-color', newval );
			$('.comment-form button').css('background-color', newval );
			$('.services-section .services-post .inner-services-post a').css('background-color', newval );
			$('.services-section3 .services-post .up-part:after').css('background-color', newval );
			$('#wp-calendar caption, .single-portfolio .box-section.banner-section, .single-post .box-section.banner-section').css('background-color', newval );
			//colors
			$('.tagcloud ul.wp-tag-cloud li a').css('color', newval );
			$('.contact-info-box ul li i').css('color', newval );
			$('.services-section3 .services-post:hover .up-part span i').css('color', newval );
			$('.services-section3 .services-post:hover .up-part h2').css('color', newval );
			$('span.icon-stat i').css('color', newval );
			$('.features-post h4').css('color', newval );
			$('.services-section2 .services-post a:hover').css('color', newval );
			$('.services-section .services-post .inner-services-post span i').css('color', newval );
			$('.services-section .services-post .inner-services-post a:hover').css('color', newval );
			/*borders*/
			$('.tagcloud ul.wp-tag-cloud li a').css('border-color', newval );
			$('ul.flickr-list li a').css('border-color', newval );
			$('header .main-menu > li a:hover').css('border-left-color', newval );
			$('ul.main-menu li.active a').css('border-left-color', newval );
			$('ul.main-menu li.current-menu-parent>a').css('border-left-color', newval );
			$('.testimonial-section .bx-wrapper .bx-pager.bx-default-pager a:hover').css('border-color', newval );
			$('.testimonial-section .bx-wrapper .bx-pager.bx-default-pager a.active').css('border-color', newval );
			$(' ul.main-menu li.active a:after').css('border-color', newval );
			$('ul.main-menu li.current-menu-parent>a:after').css('border-color', newval );
			$('header .main-menu > li > a:hover:after').css('border-color', newval );
			$('.services-section3 .services-post:hover .up-part span').css('border-color', newval );
			$('services-section2 .services-post a:hover').css('border-color', newval );
			$('.services-section .services-post .inner-services-post a:hover').css('border-color', newval );

		} );
	} );
/****************Custom background**************************/
wp.customize( 'bg_image', function( value ) {
		value.bind( function( newval ) {
			$('body, body.dark').css('background-image', 'url('+newval+')');
		} );
	} );
wp.customize( 'bg_color', function( value ) {
		value.bind( function( newval ) {
			$('body, body.dark').css('background-color', newval );
		} );
	} );
wp.customize( 'bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('body, body.dark').css('background-repeat', newval );
		} );
	} );
wp.customize( 'bg_att', function( value ) {
		value.bind( function( newval ) {
			$('body, body.dark').css('background-attachment', newval );
		} );
	} );
wp.customize( 'bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('body, body.dark').css('background-position-x', newval );
		} );
	} );
wp.customize( 'bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('body, body.dark').css('background-position-y', newval );
		} );
	} );
wp.customize( 'bg_size', function( value ) {
		value.bind( function( newval ) {
			if(newval){
			$('body, body.dark').css('background-size', 'cover' );
		}
		} );
	} );
/****************Header section**************************/
wp.customize( 'header_bg_image', function( value ) {
		value.bind( function( newval ) {
			$('header .header-logo').css('background', 'url('+newval+')');
		} );
	} );
wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('header').css('background-color', newval );
			$('header .header-logo').css('background-color', newval );
			$('header .main-menu li a').css('background-color', newval );
		} );
	} );
wp.customize( 'header_bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('header .header-logo').css('background-repeat', newval );
		} );
	} );
wp.customize( 'header_bg_att', function( value ) {
		value.bind( function( newval ) {
			$('header .header-logo').css('background-attachment', newval );
		} );
	} );
wp.customize( 'header_bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('header .header-logo').css('background-position-x', newval );
		} );
	} );
wp.customize( 'header_bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('header .header-logo').css('background-position-y', newval );
		} );
	} );
/*****************************Content styling*******************/
wp.customize( 'title_content_bg_image', function( value ) {
		value.bind( function( newval ) {
			$('#content .banner').css('background', 'url('+newval+')');

		} );
	} );
wp.customize( 'title_content_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('#content .banner').css('background-color', newval );

		} );
	} );
wp.customize( 'title_content_bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('#content .banner').css('background-repeat', newval );
		} );
	} );
wp.customize( 'title_content_bg_att', function( value ) {
		value.bind( function( newval ) {
			$('#content .banner').css('background-attachment', newval );
		} );
	} );
wp.customize( 'title_content_bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('#content .banner').css('background-position-x', newval );
		} );
	} );
wp.customize( 'title_content_bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('#content .banner').css('background-position-y', newval );
		} );
	} );
	/***********************promo*********************/
wp.customize( 'promo_bg_image', function( value ) {
		value.bind( function( newval ) {
			$('#banner').css('background', 'url('+newval+')');
		} );
	} );
wp.customize( 'promo_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('#banner').css('background-color', newval );
		} );
	} );
wp.customize( 'promo_bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('#banner').css('background-repeat', newval );
		} );
	} );
wp.customize( 'promo_bg_att', function( value ) {
		value.bind( function( newval ) {
			$('#banner').css('background-attachment', newval );
		} );
	} );
wp.customize( 'promo_bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('#banner').css('background-position-x', newval );
		} );
	} );
wp.customize( 'promo_bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('#banner').css('background-position-y', newval );
		} );
	} );
/***************************Footer**************/
wp.customize( 'footer_bg_image', function( value ) {
		value.bind( function( newval ) {
			$('.up-footer').css('background', 'url('+newval+')');
		} );
	} );
wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.up-footer').css('background-color', newval );
		} );
	} );
wp.customize( 'footer_bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('.up-footer').css('background-repeat', newval );
		} );
	} );
wp.customize( 'footer_bg_att', function( value ) {
		value.bind( function( newval ) {
			$('.up-footer').css('background-attachment', newval );
		} );
	} );
wp.customize( 'footer_bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('.up-footer').css('background-position-x', newval );
		} );
	} );
wp.customize( 'footer_bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('.up-footer').css('background-position-y', newval );
		} );
	} );
wp.customize( 'footer_title_color', function( value ) {
		value.bind( function( newval ) {
			$('footer .up-footer h2').css('color', newval );
		} );
	} );
wp.customize( 'footer_links_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widgets a').css('color', newval );
		} );
	} );
wp.customize( 'footer_links_color_hov', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widgets a:hover').css('color', newval );
		} );
	} );
/*********************************Links**********************/
wp.customize( 'link_color', function( value ) {
		value.bind( function( newval ) {
			$('a').css('color', newval );
		} );
	} );
wp.customize( 'link_decor', function( value ) {
		value.bind( function( newval ) {
			$('a').css('text-decoration', newval);
		} );
	} );
wp.customize( 'link_color_hov', function( value ) {
		value.bind( function( newval ) {
			$('a').hover(function(){
				$(this).css("color",newval);

			});
		} );
	} );
wp.customize( 'link_decor_hov', function( value ) {
		value.bind( function( newval ) {
			$('a').hover(function(){
				$(this).css("text-decoration",newval);

			});
		} );
	} );
/********************Main Navigation*******************/
wp.customize( 'nav_links_color', function( value ) {
		value.bind( function( newval ) {
			$('.main-menu li a').css('color', newval );
		} );
	} );
wp.customize( 'nav_shadow_color', function( value ) {
		value.bind( function( newval ) {
			$('header .main-menu > li> a').css('text-shadow', ' 0 1px 1px '+newval );
		} );
	} );
wp.customize( 'nav_links_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('header .main-menu > li > a').hover(function(){
				$(this).css("color",newval);

			});
		} );
	} );
wp.customize( 'nav_shadow_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('header .main-menu > li a:hover').css('text-shadow', ' 0 1px 1px '+newval );
		} );
	} );
wp.customize( 'nav_current_links_color', function( value ) {
		value.bind( function( newval ) {
			$('ul.main-menu li.current-menu-parent>a').css('color', newval );
		} );
	} );
wp.customize( 'nav_current_bg', function( value ) {
		value.bind( function( newval ) {
			$('ul.main-menu li.current-menu-parent>a').css('background-color', newval );
		} );
	} );
wp.customize( 'nav_current_shadow_color', function( value ) {
		value.bind( function( newval ) {
			$('ul.main-menu li.current-menu-parent>a').css('text-shadow', ' 0 1px 1px '+newval );
		} );
	} );
wp.customize( 'sub_nav_background', function( value ) {
		value.bind( function( newval ) {
			$('ul.main-menu .drop-down li a').css('background-color', newval );
		} );
	} );
wp.customize( 'sub_nav_color', function( value ) {
		value.bind( function( newval ) {
			$('ul.main-menu .drop-down li a').css('color', newval );
		} );
	} );
wp.customize( 'nav_separator', function( value ) {
		value.bind( function( newval ) {
			$('ul.main-menu  li a').css('border-bottom-color', newval );
		} );
	} );
	
/**************************TYPOGRAPHY***************************************/
//get font name 
function get_font(font){
	var fullFont=font;
	var mainFont=fullFont.split(':');
	var font_name=mainFont[0];
	var font_type=mainFont[1];
	var font_name_link='';
	if( font_type == 'non-google' ){
	}
	else if( font_type == 'early-google'){
		 font_name_link = mainFont[0].replace(" ","");
		$('head').append('<link href="http://fonts.googleapis.com/earlyaccess/'+font_name_link+'.css" rel="stylesheet" type="text/css">');
	}else{
		font_name_link =  mainFont[0].replace(" ","+");
		var font_variants = mainFont[1].replace("|",",");
		$('head').append('<link href="http://fonts.googleapis.com/css?family='+font_name_link+':'+font_variants+'" rel="stylesheet" type="text/css">');
	}
	return font_name;
}
/*main typography*/
wp.customize( 'main_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('body').css('font-family', font);
			$('p').css('font-family', font );
			$('.blog-section.col1 .post-content').css('font-family', font );
			$('.single-post-content').css('font-family', font);
			$('.accord-content').css('font-family', font );
			$('.tab-content .tab-pane').css('font-family', font);
		} );
	} );
wp.customize( 'main_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
			$('p').css('color', newval );
			$('.blog-section.col1 .post-content').css('color', newval );
			$('.single-post-content').css('color', newval );
			$('.accord-content').css('color', newval );
			$('.tab-content .tab-pane').css('color', newval );
		} );
	} );
wp.customize( 'main_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('body').css('font-size', newval+'px' );
			$('p').css('font-size', newval+'px' );
			$('.blog-section.col1 .post-content').css('font-size', newval+'px' );
			$('.single-post-content').css('font-size', newval+'px' );
			$('.accord-content').css('font-size', newval+'px' );
			$('.tab-content .tab-pane').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'main_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('body').css('font-weight', newval );
			$('p').css('font-weight', newval );
			$('.blog-section.col1 .post-content').css('font-weight', newval );
			$('.single-post-content').css('font-weight', newval );
			$('.accord-content').css('font-weight', newval );
			$('.tab-content .tab-pane').css('font-weight', newval );
		} );
	} );
wp.customize( 'main_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('body').css('font-style', newval );
			$('p').css('font-style', newval );
			$('.blog-section.col1 .post-content').css('font-style', newval );
			$('.single-post-content').css('font-style', newval );
			$('.accord-content').css('font-style', newval );
			$('.tab-content .tab-pane').css('font-style', newval );
		} );
	} );
/*textula logo*/
wp.customize( 'log_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('header a.logo').css('font-family', font);
		} );
	} );
wp.customize( 'log_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('header a.logo').css('color', newval );
		} );
	} );
wp.customize( 'log_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('header a.logo').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'log_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('header a.logo').css('font-weight', newval );
		} );
	} );
wp.customize( 'log_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('header a.logo').css('font-style', newval );
		} );
	} );
/*main Navigation*/
wp.customize( 'nav_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('header ul.main-menu li a').css('font-family', font);
		} );
	} );
wp.customize( 'nav_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('header ul.main-menu li a').css('color', newval );
		} );
	} );
wp.customize( 'nav_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('header ul.main-menu li a').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'nav_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('header ul.main-menu li a').css('font-weight', newval );
		} );
	} );
wp.customize( 'nav_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('header ul.main-menu li a').css('font-style', newval );
		} );
	} );
/*h1 styling*/
wp.customize( 'h1_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h1').css('font-family', font);
		} );
	} );
wp.customize( 'h1_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('color', newval );
		} );
	} );
wp.customize( 'h1_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h1_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('font-weight', newval );
		} );
	} );
wp.customize( 'h1_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('font-style', newval );
		} );
	} );
/*h2 styling*/
wp.customize( 'h2_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h2').css('font-family', font);
		} );
	} );
wp.customize( 'h2_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h2').css('color', newval );
		} );
	} );
wp.customize( 'h2_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h2').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h2_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h2').css('font-weight', newval );
		} );
	} );
wp.customize( 'h2_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h2').css('font-style', newval );
		} );
	} );
/*h3 styling*/
wp.customize( 'h3_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h3').css('font-family', font);
		} );
	} );
wp.customize( 'h3_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h3').css('color', newval );
		} );
	} );
wp.customize( 'h3_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h3').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h3_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h3').css('font-weight', newval );
		} );
	} );
wp.customize( 'h3_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h3').css('font-style', newval );
		} );
	} );
/*h4 styling*/
wp.customize( 'h4_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h4').css('font-family', font);
		} );
	} );
wp.customize( 'h4_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h4').css('color', newval );
		} );
	} );
wp.customize( 'h4_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h4').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h4_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h4').css('font-weight', newval );
		} );
	} );
wp.customize( 'h4_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h4').css('font-style', newval );
		} );
	} );
/*h5 styling*/
wp.customize( 'h5_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h5').css('font-family', font);
		} );
	} );
wp.customize( 'h5_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h5').css('color', newval );
		} );
	} );
wp.customize( 'h5_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h5').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h5_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h5').css('font-weight', newval );
		} );
	} );
wp.customize( 'h5_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h5').css('font-style', newval );
		} );
	} );
/*h6 styling*/
wp.customize( 'h6_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h6').css('font-family', font);
		} );
	} );
wp.customize( 'h6_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h6').css('color', newval );
		} );
	} );
wp.customize( 'h6_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h6').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h6_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h6').css('font-weight', newval );
		} );
	} );
wp.customize( 'h6_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h6').css('font-style', newval );
		} );
	} );

/*Page title styling*/
wp.customize( 'ptit_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('.banner h1 span').css('font-family', font);
		} );
	} );

wp.customize( 'ptit_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('.banner h1 span').css('color', newval );
		} );
	} );
wp.customize( 'ptit_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('.banner h1 span').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'ptit_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('.banner h1 span').css('font-weight', newval );
		} );
	} );
wp.customize( 'ptit_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('.banner h1 span').css('font-style', newval );
		} );
	} );
/*breadcrumb styling*/
wp.customize( 'bred_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('.pager-line ul li a').css('font-family', font);
			$('.pager-line ul li').css('font-family', font);
		} );
	} );
wp.customize( 'bred_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('.pager-line ul li a').css('color', newval );
			$('.pager-line ul li').css('color', newval );
			$('.pager-line ul li:before').css('color', newval );
		} );
	} );
wp.customize( 'bred_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('.pager-line ul li a').css('font-size', newval+'px' );
			$('.pager-line ul li').css('font-size', newval+'px' );
			$('.pager-line ul li:before').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'bred_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('.pager-line ul li a').css('font-weight', newval );
			$('.pager-line ul li').css('font-weight', newval );
			$('.pager-line ul li:before').css('font-weight', newval );
		} );
	} );
wp.customize( 'bred_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('.pager-line ul li a').css('font-style', newval );
			$('.pager-line ul li').css('font-style', newval );
			$('.pager-line ul li:before').css('font-style', newval );
			
		} );
	} );
/*Widget title styling*/
wp.customize( 'wtit_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('#sidebar .sidebar-section.white-box h2').css('font-family', font);
		} );
	} );

wp.customize( 'wtit_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar .sidebar-section.white-box h2').css('color', newval );
		} );
	} );
wp.customize( 'wtit_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar .sidebar-section.white-box h2').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'wtit_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar .sidebar-section.white-box h2').css('font-weight', newval );
		} );
	} );
wp.customize( 'wtit_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar .sidebar-section.white-box h2').css('font-style', newval );
		} );
	} );
/*Footer Widget title styling*/
wp.customize( 'ftit_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('footer .up-footer h2').css('font-family', font);
		} );
	} );

wp.customize( 'ftit_typ_col', function( value ) {
		value.bind( function( newval ) {			
			$('footer .up-footer h2').css('color', newval );
		} );
	} );
wp.customize( 'ftit_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('footer .up-footer h2').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'ftit_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('footer .up-footer h2').css('font-weight', newval );
		} );
	} );
wp.customize( 'ftit_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('footer .up-footer h2').css('font-style', newval );
		} );
	} );
} )( jQuery );


