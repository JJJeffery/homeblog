<?php echo '<style type="text/css">' ;?>
		<?php $globalcolor = get_theme_mod('global_color'); $rtl =  weblusive_get_option('rtl_mode'); if (!empty($globalcolor)):?>
		/******************global color****************************/
		/*backgrounds*/
		header .main-menu li a,	.pager-line ul li,.blog-section .blog-post .post-gal .hover-post a,	footer .up-footer,
		footer .footer-line a, .tagcloud ul.wp-tag-cloud li a:hover, #contactFormWidget input[type="submit"], .social-box ul li a,
		.horizontal-tabs-box .nav-tabs li.active a,	.comment-content a.comment-reply-link, .comment-form input[type="submit"],
		.project-post .hover-box a,	ul.filter li a.active, ul.filter li a:hover ,.btn-default, .btn-default:hover, .team-post .right-part > a,.accord-title,
		.vertical-tabs-box .nav-tabs li.active a, .testimonial-section .bx-wrapper .bx-pager.bx-default-pager a:hover,
		.testimonial-section .bx-wrapper .bx-pager.bx-default-pager a.active, .unik-line-section, .dark .unik-line-section, .flex-direction-nav .flex-next,
		.flex-direction-nav .flex-prev,	.features-post a, .services-section2 .services-post a, .services-section2 .services-post span,
		.services-section .services-post .inner-services-post a, #contact-form button, .comment-form button, .single-portfolio .box-section.banner-section,
		.services-section .services-post .inner-services-post a,#contact-form input[type="text"]:focus + span i, a.elemadded,
		.comment-form input[type="text"]:focus + span i, .services-section3 .services-post:hover a,#banner, .single-post .box-section.banner-section,
		#wp-calendar caption, .services-section3 .services-post .up-part:after, a.iconbox:hover, table th,.fblock3-short:hover  span, ul.feature-list li a,
		.dark .vertical-tabs-box .nav-tabs li.active a, .dark .horizontal-tabs-box .nav-tabs li.active a, .services-section2 .services-post a:hover, .progress-bar,
		.float-image-section .float-box a, .float-image-section .float-box a:hover, .pricing-section ul.pricing-table li:first-child, .pricing-section ul.pricing-table li a,
		.unik-section ul.feature-list li a, ul.feature-list li a, .services-section .services-post .inner-services-post a:hover{
			background-color:<?php echo $globalcolor ?>;
		}
		.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, 
		.woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, 
		.woocommerce-page #content input.button.alt, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, 
		.woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, 
		.woocommerce #content input.button, .woocommerce-page #content input.button, .woocommerce #content div.product div.images img, 
		.woocommerce div.product div.images img, .woocommerce-page #content div.product div.images img, .woocommerce-page div.product div.images img{
			background:<?php echo $globalcolor ?> !important;
		}
		/*colors*/
		.tagcloud ul.wp-tag-cloud li a,	.contact-info-box ul li i, .services-section3 .services-post:hover .up-part span i, .blog-section .blog-post .post-box ul.post-tags li a:hover,
		.services-section3 .services-post:hover .up-part h2, span.icon-stat i, .features-post h4, .pow-section h1, .fontawesome-section ul.icon-list li i, .features-section3 h1,
		.services-section2 .services-post a:hover,.services-section .services-post .inner-services-post span i, .skills-progress p,
		.services-section .services-post .inner-services-post a:hover, a.iconbox i,.fblock3-short span i,.fblock3-short:hover h3{
			color:<?php echo $globalcolor ?>;
		}
		/*borders*/
		.tagcloud ul.wp-tag-cloud li a,#contact-form input[type="text"]:focus + span i,.comment-form input[type="text"]:focus + span i,
		.tagcloud ul.wp-tag-cloud li a,	ul.flickr-list li a, .testimonial-section .bx-wrapper .bx-pager.bx-default-pager a:hover,
		.testimonial-section .bx-wrapper .bx-pager.bx-default-pager a.active,.services-section3 .services-post:hover .up-part span, .sticky,
		.services-section2 .services-post a:hover, .services-section .services-post .inner-services-post a:hover, a.iconbox,.fblock3-short:hover  span{
			border-color:<?php echo $globalcolor ?>;
		}
		header .main-menu > li a:hover,	ul.main-menu li.active a,
		ul.main-menu li.active a:after,		ul.main-menu li.current-menu-parent>a:after, header .main-menu > li > a:hover:after{
			border-left-color:<?php echo $globalcolor ?>;
		}
		<?php if ($rtl):?>
		ul.main-menu li.active>a:after, ul.main-menu li.current-menu-parent>a:after, header .main-menu > li > a.active, header .main-menu > li a:hover,
			ul.main-menu li.active>a, ul.main-menu ul li.current-menu-parent>a{border-right-color:<?php echo $globalcolor ?>}
		<?php endif?>
		<?php endif?>
		<?php if(true===get_theme_mod('bg_size') && (get_theme_mod('bg_image') || get_theme_mod('bg_color'))) :?>		
		/****************Custom background**************************/
		body, body.dark{
			background-color:<?php echo get_theme_mod('bg_color'); ?>;
			background: url('<?php echo get_theme_mod('bg_image'); ?>') no-repeat center center fixed;
			background-size: cover;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			
		}<?php elseif(false===get_theme_mod('bg_size') && (get_theme_mod('bg_image') || get_theme_mod('bg_color'))) : ?>
		/****************Custom background**************************/
		body, body.dark{
			<?php if(get_theme_mod('bg_color')) : ?>background-color:<?php echo get_theme_mod('bg_color'); ?>; <?php endif; ?>
			<?php if(get_theme_mod('bg_image')) : ?>background-image:url('<?php   echo get_theme_mod('bg_image') ?>');   <?php endif; ?>
			<?php if(get_theme_mod('bg_repeat')) : ?>background-repeat:<?php echo get_theme_mod('bg_repeat');?>; <?php endif; ?>
			<?php if(get_theme_mod('bg_att')) : ?>background-attachment:<?php echo get_theme_mod('bg_att');?>; <?php endif; ?>
			<?php if(get_theme_mod('bg_hor')) : ?>background-position-x:<?php echo get_theme_mod('bg_hor');  ?>; <?php endif; ?>
			<?php if(get_theme_mod('bg_ver')) : ?>background-position-y:<?php echo  get_theme_mod('bg_ver');?> <?php endif; ?>
		}<?php endif;?>
		<?php if( get_theme_mod('header_bg_color') || get_theme_mod('header_bg_image') || get_theme_mod('header_bg_repeat')):?>
			/*************************Header*****************/
			header, header .header-logo{
				background-color:<?php echo get_theme_mod('header_bg_color'); ?>;
				<?php if(get_theme_mod('header_bg_image')) : ?>
				background:url('<?php   echo get_theme_mod('header_bg_image') ?>');   
				<?php endif; ?>
				background-repeat:<?php echo get_theme_mod('header_bg_repeat');?>;
				background-attachment:<?php echo get_theme_mod('header_bg_att');?>;
				background-position-x:<?php echo get_theme_mod('header_bg_hor');  ?>;
				background-position-y:<?php echo  get_theme_mod('header_bg_ver');?>
			}
			<?php if(get_theme_mod('header_bg_color')):?>
			header .main-menu li a{
				background-color:<?php echo get_theme_mod('header_bg_color'); ?>;
			}
			<?php endif?>
		<?php endif?>
		<?php if( get_theme_mod('title_content_bg_color') || get_theme_mod('title_content_bg_image')):?>
		/******************content********************/
		#content .banner{
			background-color:<?php echo get_theme_mod('title_content_bg_color'); ?>;
			<?php if(get_theme_mod('title_content_bg_image')) : ?>
			background:url('<?php   echo get_theme_mod('title_content_bg_image') ?>');   
			<?php endif; ?>
			background-repeat:<?php echo get_theme_mod('title_content_bg_repeat');?>;
			background-attachment:<?php echo get_theme_mod('title_content_bg_att');?>;
			background-position-x:<?php echo get_theme_mod('title_content_bg_hor');  ?>;
			background-position-y:<?php echo  get_theme_mod('title_content_bg_ver');?>
		}
		<?php endif?>
		<?php if (get_theme_mod('promo_bg_image') || get_theme_mod('promo_bg_color')):?>
		#banner{
			background-color:<?php echo get_theme_mod('promo_bg_color'); ?>;
			<?php if(get_theme_mod('promo_bg_image')) : ?>
			background:url('<?php echo get_theme_mod('promo_bg_image') ?>');   
			<?php endif; ?>
			background-repeat:<?php echo get_theme_mod('promo_bg_repeat');?>;
			background-attachment:<?php echo get_theme_mod('promo_bg_att');?>;
			background-position-x:<?php echo get_theme_mod('promo_bg_hor');  ?>;
			background-position-y:<?php echo  get_theme_mod('promo_bg_ver');?>
		}
		<?php endif?>
		<?php if(get_theme_mod('footer_bg_image') || get_theme_mod('footer_bg_color')):?>
		/********************footer*******************/
		footer .up-footer{
			<?php if(get_theme_mod('footer_bg_color')): ?>background-color: <?php echo get_theme_mod('footer_bg_color')?>;<?php endif?>
			<?php if(get_theme_mod('footer_bg_image')) : ?>background:url('<?php echo get_theme_mod('footer_bg_image') ?>');<?php endif; ?>
			<?php if(get_theme_mod('footer_bg_repeat')): ?>background-repeat: <?php echo get_theme_mod('footer_bg_repeat')?>;<?php endif?>
			<?php if(get_theme_mod('footer_bg_att')): ?>background-attachment: <?php echo get_theme_mod('footer_bg_att')?>;<?php endif?>
			<?php if(get_theme_mod('footer_bg_hor')): ?>background-position-x: <?php echo get_theme_mod('footer_bg_hor')?>;<?php endif?>
			<?php if(get_theme_mod('footer_bg_ver')): ?>background-position-y: <?php echo get_theme_mod('footer_bg_ver')?>;<?php endif?>
		}
		<?php endif?>
		<?php $ftc = get_theme_mod('footer_title_color'); if (!empty($ftc)):?>
			footer .up-footer h2{color:<?php echo $ftc ?>;}
		<?php endif?>
		<?php $flc = get_theme_mod('footer_links_color'); if (!empty($flc)):?>
		.footer-widgets a{color:<?php echo $flc ?>;}
		<?php endif?>
		<?php $flch = get_theme_mod('footer_links_color_hov'); if (!empty($flch)):?>
		.footer-widgets a:hover{color:<?php echo $flch ?>;}
		<?php endif?>
		<?php if(get_theme_mod('link_color') || get_theme_mod('link_decor')):?>
		/***********************Links*************************/
		a{
			color:<?php echo get_theme_mod('link_color'); ?> !important;
			text-decoration:<?php echo get_theme_mod('link_decor'); ?> !important;
		}
		<?php endif?>
		<?php if(get_theme_mod('link_color_hov') || get_theme_mod('link_decor_hov')):?>
		a:hover{
			color:<?php echo get_theme_mod('link_color_hov'); ?> !important;
			text-decoration:<?php echo get_theme_mod('link_decor_hov'); ?> !important;
		}
		<?php endif?>
		<?php if(get_theme_mod('nav_links_color') || get_theme_mod('nav_shadow_color')):?>
		header .main-menu > li>a{
			<?php if(get_theme_mod('nav_links_color')):?>color:<?php echo get_theme_mod('nav_links_color'); ?> !important;<?php endif?>
			<?php $navshadow =  get_theme_mod('nav_shadow_color'); echo (isset($navshadow)&& !empty($navshadow) ) ? 'text-shadow: 0 1px 1px '.$navshadow.'  !important;' : '';?>
		}
		<?php endif?>
		<?php if(get_theme_mod('nav_links_color_hover') || get_theme_mod('nav_shadow_color_hover')):?>
		header .main-menu > li>a:hover{
			<?php if(get_theme_mod('nav_links_color_hover')):?>color:<?php echo get_theme_mod('nav_links_color_hover'); ?> !important;<?php endif?>
			<?php if(get_theme_mod('nav_shadow_color_hover')):?>text-shadow: 0 1px 1px <?php echo get_theme_mod('nav_shadow_color_hover'); ?> !important;<?php endif?>
		}
		<?php endif?>
		ul.main-menu li.active a, ul.main-menu li.current-menu-parent>a{
			<?php $nclc = get_theme_mod('nav_current_links_color'); if($nclc):?> color:<?php echo $nclc?> !important;<?php endif?>
			<?php $nclb = get_theme_mod('nav_current_bg'); if($nclb):?>background-color:<?php echo $nclb?> !important;<?php endif?>
			<?php $ncsc = get_theme_mod('nav_current_shadow_color'); if($ncsc):?>text-shadow: 0 1px 1px <?php echo $ncsc ?> !important;<?php endif?>
		}
		<?php if(get_theme_mod('sub_nav_color') || get_theme_mod('sub_nav_background')):?>
		ul.main-menu .drop-down li a{
			<?php if(get_theme_mod('sub_nav_color')):?>color:<?php echo get_theme_mod('sub_nav_color'); ?> !important;<?php endif?>
			<?php if(get_theme_mod('sub_nav_background')):?>background-color:<?php echo get_theme_mod('sub_nav_background'); ?> !important;<?php endif?>
		}
		<?php endif?>
		<?php if (get_theme_mod('nav_separator')):?>
		ul.main-menu li a{
			border-bottom-color:<?php echo get_theme_mod('nav_separator'); ?> !important;
		}
		<?php endif?>
		<?php
		function unik_enqueue_font ( $got_font) {
			if ($got_font) {
			
				
				$font_pieces = explode(":", $got_font);
				
				$font_name = $font_pieces[0];
				$font_type = $font_pieces[1];
				
				if( $font_type == 'non-google' ){
					
				}elseif( $font_type == 'early-google'){
					$font_name_link = str_replace (" ","", $font_pieces[0] );
					$protocol = is_ssl() ? 'https' : 'http';
					wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/earlyaccess/'.$font_name_link.'.css');
				}else{
					$font_name_link = str_replace (" ","+", $font_pieces[0] );
					$font_variants = str_replace ("|",",", $font_pieces[1] );
					$protocol = is_ssl() ? 'https' : 'http';
					wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/css?family='.$font_name_link.':'.$font_variants);
				}
				return $font_name;      
			}
				 
		}
		?>
		body, p, .blog-section.col1 .post-content, .single-post-content, .accord-content, .tab-content .tab-pane{
		
			<?php $maintyp=get_theme_mod('main_typ_font'); echo (isset($maintyp) && !empty($maintyp) ) ? 'font-family:'.unik_enqueue_font($maintyp).' !important;' : '' ?>
			<?php $maintypcol=get_theme_mod('main_typ_col'); echo (isset($maintypcol) && !empty($maintypcol) ) ? 'color:'.$maintypcol.';' : '' ?>
			<?php $maintypsize=get_theme_mod('main_typ_size'); echo (isset($maintypsize) && !empty($maintypsize) ) ? 'font-size:'.$maintypsize.'px ;' : '' ?>
			<?php $maintypweight=get_theme_mod('main_typ_weight'); echo (isset($maintypweight) && !empty($maintypweight) ) ? 'font-weight:'.$maintypweight.';' : '' ?>
			<?php $maintypstyle=get_theme_mod('main_typ_style'); echo (isset($maintypstyle) && !empty($maintypstyle) ) ? 'font-style:'.$maintypstyle.';' : '' ?>
		}
		header a.logo{
			<?php $logtyp=get_theme_mod('log_typ_font'); echo (isset($logtyp) && !empty($logtyp) ) ? 'font-family:'.unik_enqueue_font($logtyp).' !important;' : '' ?>
			<?php $logtypcol=get_theme_mod('log_typ_col'); echo (isset($logtypcol) && !empty($logtypcol) ) ? 'color:'.$logtypcol.';' : '' ?>
			<?php $logtypsize=get_theme_mod('log_typ_size'); echo (isset($logtypsize) && !empty($logtypsize) ) ? 'font-size:'.$logtypsize.'px;' : '' ?>
			<?php $logtypweight=get_theme_mod('log_typ_weight'); echo (isset($logtypweight) && !empty($logtypweight) ) ? 'font-weight:'.$logtypweight.';' : '' ?>
			<?php $logtypstyle=get_theme_mod('log_typ_style'); echo (isset($logtypstyle) && !empty($logtypstyle) ) ? 'font-style:'.$logtypstyle.';' : '' ?>
		}
		header ul.main-menu li a{
			<?php $navtyp=get_theme_mod('nav_typ_font'); echo (isset($navtyp) && !empty($navtyp) ) ? 'font-family:'.unik_enqueue_font($navtyp).' !important;' : '' ?>
			<?php $navtypcol=get_theme_mod('nav_typ_col'); echo (isset($navtypcol) && !empty($navtypcol) ) ? 'color:'.$navtypcol.';' : '' ?>
			<?php $navtypsize=get_theme_mod('nav_typ_size'); echo (isset($navtypsize) && !empty($navtypsize) ) ? 'font-size:'.$navtypsize.'px;' : '' ?>
			<?php $navtypweight=get_theme_mod('nav_typ_weight'); echo (isset($navtypweight) && !empty($navtypweight) ) ? 'font-weight:'.$navtypweight.';' : '' ?>
			<?php $navtypstyle=get_theme_mod('nav_typ_style'); echo (isset($navtypstyle) && !empty($navtypstyle) ) ? 'font-style:'.$navtypstyle.';' : '' ?>
		}
		h1, .pow-section h1, .features-section3 h1{
			<?php $h1typ=get_theme_mod('h1_typ_font'); echo (isset($h1typ) && !empty($h1typ) ) ? 'font-family:'.unik_enqueue_font($h1typ).' !important;' : '' ?>
			<?php $h1typcol=get_theme_mod('h1_typ_col'); echo (isset($h1typcol) && !empty($h1typcol) ) ? 'color:'.$h1typcol.';' : '' ?>
			<?php $h1typsize=get_theme_mod('h1_typ_size'); echo (isset($h1typsize) && !empty($h1typsize) ) ? 'font-size:'.$h1typsize.'px ;' : '' ?>
			<?php $h1typweight=get_theme_mod('h1_typ_weight'); echo (isset($h1typweight) && !empty($h1typweight) ) ? 'font-weight:'.$h1typweight.';' : '' ?>
			<?php $h1typstyle=get_theme_mod('h1_typ_style'); echo (isset($h1typstyle) && !empty($h1typstyle) ) ? 'font-style:'.$h1typstyle.';' : '' ?>
		}
		h2{
			<?php $h2typ=get_theme_mod('h2_typ_font'); echo (isset($h2typ) && !empty($h2typ) ) ? 'font-family:'.unik_enqueue_font($h2typ).' !important;' : '' ?>
			<?php $h2typcol=get_theme_mod('h2_typ_col'); echo (isset($h2typcol) && !empty($h2typcol) ) ? 'color:'.$h2typcol.';' : '' ?>
			<?php $h2typsize=get_theme_mod('h2_typ_size'); echo (isset($h2typsize) && !empty($h2typsize) ) ? 'font-size:'.$h2typsize.'px ;' : '' ?>
			<?php $h2typweight=get_theme_mod('h2_typ_weight'); echo (isset($h2typweight) && !empty($h2typweight) ) ? 'font-weight:'.$h2typweight.';' : '' ?>
			<?php $h2typstyle=get_theme_mod('h2_typ_style'); echo (isset($h2typstyle) && !empty($h2typstyle) ) ? 'font-style:'.$h2typstyle.';' : '' ?>
		}
		h3{
			<?php $h3typ=get_theme_mod('h3_typ_font'); echo (isset($h3typ) && !empty($h3typ) ) ? 'font-family:'.unik_enqueue_font($h3typ).' !important;' : '' ?>
			<?php $h3typcol=get_theme_mod('h3_typ_col'); echo (isset($h3typcol) && !empty($h3typcol) ) ? 'color:'.$h3typcol.';' : '' ?>
			<?php $h3typsize=get_theme_mod('h3_typ_size'); echo (isset($h3typsize) && !empty($h3typsize) ) ? 'font-size:'.$h3typsize.'px ;' : '' ?>
			<?php $h3typweight=get_theme_mod('h3_typ_weight'); echo (isset($h3typweight) && !empty($h3typweight) ) ? 'font-weight:'.$h3typweight.';' : '' ?>
			<?php $h3typstyle=get_theme_mod('h3_typ_style'); echo (isset($h3typstyle) && !empty($h3typstyle) ) ? 'font-style:'.$h3typstyle.';' : '' ?>
		}
		h4{
			<?php $h4typ=get_theme_mod('h4_typ_font'); echo (isset($h4typ) && !empty($h4typ) ) ? 'font-family:'.unik_enqueue_font($h4typ).' !important;' : '' ?>
			<?php $h4typcol=get_theme_mod('h4_typ_col'); echo (isset($h4typcol) && !empty($h4typcol) ) ? 'color:'.$h4typcol.';' : '' ?>
			<?php $h4typsize=get_theme_mod('h4_typ_size'); echo (isset($h4typsize) && !empty($h4typsize) ) ? 'font-size:'.$h4typsize.'px ;' : '' ?>
			<?php $h4typweight=get_theme_mod('h4_typ_weight'); echo (isset($h4typweight) && !empty($h4typweight) ) ? 'font-weight:'.$h4typweight.';' : '' ?>
			<?php $h4typstyle=get_theme_mod('h4_typ_style'); echo (isset($h4typstyle) && !empty($h4typstyle) ) ? 'font-style:'.$h4typstyle.';' : '' ?>
		}
		h5{
			<?php $h5typ=get_theme_mod('h5_typ_font'); echo (isset($h5typ) && !empty($h5typ) ) ? 'font-family:'.unik_enqueue_font($h5typ).' !important;' : '' ?>
			<?php $h5typcol=get_theme_mod('h5_typ_col'); echo (isset($h5typcol) && !empty($h5typcol) ) ? 'color:'.$h5typcol.';' : '' ?>
			<?php $h5typsize=get_theme_mod('h5_typ_size'); echo (isset($h5typsize) && !empty($h5typsize) ) ? 'font-size:'.$h5typsize.'px ;' : '' ?>
			<?php $h5typweight=get_theme_mod('h5_typ_weight'); echo (isset($h5typweight) && !empty($h5typweight) ) ? 'font-weight:'.$h5typweight.';' : '' ?>
			<?php $h5typstyle=get_theme_mod('h5_typ_style'); echo (isset($h5typstyle) && !empty($h5typstyle) ) ? 'font-style:'.$h5typstyle.';' : '' ?>
		}
		h6{
			<?php $h6typ=get_theme_mod('h6_typ_font'); echo (isset($h6typ) && !empty($h6typ) ) ? 'font-family:'.unik_enqueue_font($h6typ).' !important;' : '' ?>
			<?php $h6typcol=get_theme_mod('h6_typ_col'); echo (isset($h6typcol) && !empty($h6typcol) ) ? 'color:'.$h6typcol.';' : '' ?>
			<?php $h6typsize=get_theme_mod('h6_typ_size'); echo (isset($h6typsize) && !empty($h6typsize) ) ? 'font-size:'.$h6typsize.'px ;' : '' ?>
			<?php $h6typweight=get_theme_mod('h6_typ_weight'); echo (isset($h6typweight) && !empty($h6typweight) ) ? 'font-weight:'.$h6typweight.';' : '' ?>
			<?php $h6typstyle=get_theme_mod('h6_typ_style'); echo (isset($h6typstyle) && !empty($h6typstyle) ) ? 'font-style:'.$h6typstyle.';' : '' ?>
		}
		.banner h1 span{
			<?php $ptittyp=get_theme_mod('ptit_typ_font'); echo (isset($ptittyp) && !empty($ptittyp) ) ? 'font-family:'.unik_enqueue_font($ptittyp).' !important;' : '' ?>
			<?php $ptittypcol=get_theme_mod('ptit_typ_col'); echo (isset($ptittypcol) && !empty($ptittypcol) ) ? 'color:'.$ptittypcol.';' : '' ?>
			<?php $ptittypsize=get_theme_mod('ptit_typ_size'); echo (isset($ptittypsize) && !empty($ptittypsize) ) ? 'font-size:'.$ptittypsize.'px ;' : '' ?>
			<?php $ptittypweight=get_theme_mod('ptit_typ_weight'); echo (isset($ptittypweight) && !empty($ptittypweight) ) ? 'font-weight:'.$ptittypweight.';' : '' ?>
			<?php $ptittypstyle=get_theme_mod('ptit_typ_style'); echo (isset($ptittypstyle) && !empty($ptittypstyle) ) ? 'font-style:'.$ptittypstyle.';' : '' ?>
		}
		.pager-line ul li a, .pager-line ul li{
			<?php $bredtyp=get_theme_mod('bred_typ_font'); echo (isset($bredtyp) && !empty($bredtyp) ) ? 'font-family:'.unik_enqueue_font($bredtyp).' !important;' : '' ?>
			<?php $bredtypcol=get_theme_mod('bred_typ_col'); echo (isset($bredtypcol) && !empty($bredtypcol) ) ? 'color:'.$bredtypcol.';' : '' ?>
			<?php $bredtypsize=get_theme_mod('bred_typ_size'); echo (isset($bredtypsize) && !empty($bredtypsize) ) ? 'font-size:'.$bredtypsize.'px ;' : '' ?>
			<?php $bredtypweight=get_theme_mod('bred_typ_weight'); echo (isset($bredtypweight) && !empty($bredtypweight) ) ? 'font-weight:'.$bredtypweight.';' : '' ?>
			<?php $bredtypstyle=get_theme_mod('bred_typ_style'); echo (isset($bredtypstyle) && !empty($bredtypstyle) ) ? 'font-style:'.$bredtypstyle.';' : '' ?>
		}
		.pager-line ul li:before{
			<?php if(get_theme_mod('bred_typ_col')):?>color:<?php echo get_theme_mod('bred_typ_col'); ?> ;<?php endif?>
			<?php if(get_theme_mod('bred_typ_size')):?>font-size:<?php echo get_theme_mod('bred_typ_size').'px'; ?> ;<?php endif?>
			<?php if(get_theme_mod('bred_typ_weight')):?>font-weight:<?php echo get_theme_mod('bred_typ_weight'); ?> ;<?php endif?>
			<?php if(get_theme_mod('bred_typ_style')):?>font-style:<?php echo get_theme_mod('bred_typ_style'); ?> ;<?php endif?>
		}
		#sidebar .sidebar-section.white-box h2{
			<?php $wtittyp=get_theme_mod('wtit_typ_font'); echo (isset($wtittyp) && !empty($wtittyp) ) ? 'font-family:'.unik_enqueue_font($wtittyp).' !important;' : '' ?>
			<?php $wtittypcol=get_theme_mod('wtit_typ_col'); echo (isset($wtittypcol) && !empty($wtittypcol) ) ? 'color:'.$wtittypcol.';' : '' ?>
			<?php $wtittypsize=get_theme_mod('wtit_typ_size'); echo (isset($wtittypsize) && !empty($wtittypsize) ) ? 'font-size:'.$wtittypsize.'px ;' : '' ?>
			<?php $wtittypweight=get_theme_mod('wtit_typ_weight'); echo (isset($wtittypweight) && !empty($wtittypweight) ) ? 'font-weight:'.$wtittypweight.';' : '' ?>
			<?php $wtittypstyle=get_theme_mod('wtit_typ_style'); echo (isset($wtittypstyle) && !empty($wtittypstyle) ) ? 'font-style:'.$wtittypstyle.';' : '' ?>
		}
		footer .up-footer h2{
			<?php $ftittyp=get_theme_mod('ftit_typ_font'); echo (isset($ftittyp) && !empty($ftittyp) ) ? 'font-family:'.unik_enqueue_font($ftittyp).' !important;' : '' ?>
			<?php $ftittypcol=get_theme_mod('ftit_typ_col'); echo (isset($ftittypcol) && !empty($ftittypcol) ) ? 'color:'.$ftittypcol.';' : '' ?>
			<?php $ftittypsize=get_theme_mod('ftit_typ_size'); echo (isset($ftittypsize) && !empty($ftittypsize) ) ? 'font-size:'.$ftittypsize.'px ;' : '' ?>
			<?php $ftittypweight=get_theme_mod('ftit_typ_weight'); echo (isset($ftittypweight) && !empty($ftittypweight) ) ? 'font-weight:'.$ftittypweight.';' : '' ?>
			<?php $ftittypstyle=get_theme_mod('ftit_typ_style'); echo (isset($ftittypstyle) && !empty($ftittypstyle) ) ? 'font-style:'.$ftittypstyle.';' : '' ?>
		}
<?php echo '</style>'; ?>