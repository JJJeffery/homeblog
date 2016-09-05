<?php
	header("Content-type: text/css;");
	
	if( file_exists('../../../../wp-load.php') ) :
		include '../../../../wp-load.php';
	else:
		include '../../../../../wp-load.php';
	endif;
?>

<?php
	// Styles	
	$primary 	= ft_of_get_option('fabthemes_primary_color','#5173A1');
	$secondary	= ft_of_get_option('fabthemes_secondary_color','');
	$link 		= ft_of_get_option('fabthemes_link_color','');
	$hover 		= ft_of_get_option('fabthemes_hover_color','');
	
?>
#masthead,
.main-nav,
#search-modal .search-form .search-submit,
#intro-section,
#feature-section .home-feature span,
.top-header,
#comments ol.comment-list li .comment-body .comment-content a.comment-reply-link ,
#buddypress div.item-list-tabs ul li a span,
#buddypress div.item-list-tabs ul li a:hover span ,
#buddypress div.item-list-tabs ul li.selected a span,
#buddypress div.item-list-tabs ul li.current a span,
#buddypress button,
#buddypress a.button,
#buddypress input[type=submit],
#buddypress input[type=button],
#buddypress input[type=reset],
#buddypress ul.button-nav li a,
#buddypress div.generic-button a,
#buddypress .comment-reply-link,
a.bp-title-button,
#buddypress button:hover,
#buddypress a.button:hover,
#buddypress a.button:focus,
#buddypress input[type=submit]:hover,
#buddypress input[type=button]:hover,
#buddypress input[type=reset]:hover,
#buddypress ul.button-nav li a:hover,
#buddypress ul.button-nav li.current a,
#buddypress div.generic-button a:hover,
#buddypress .comment-reply-link:hover,
#comments #respond p.form-submit input
{
	background: <?php echo $primary ?>!important;
}


#search-modal .search-form .search-submit,
#secondary .widget h1.widget-title:after,
#footer-widgets .footer-widget h1.widget-title:after,
#buddypress button,
#buddypress a.button,
#buddypress input[type=submit],
#buddypress input[type=button],
#buddypress input[type=reset],
#buddypress ul.button-nav li a,
#buddypress div.generic-button a,
#buddypress .comment-reply-link,
a.bp-title-button,
#buddypress button:hover,
#buddypress a.button:hover,
#buddypress a.button:focus,
#buddypress input[type=submit]:hover,
#buddypress input[type=button]:hover,
#buddypress input[type=reset]:hover,
#buddypress ul.button-nav li a:hover,
#buddypress ul.button-nav li.current a,
#buddypress div.generic-button a:hover,
#buddypress .comment-reply-link:hover,
#comments #respond p.form-submit input
{
	border-color:<?php echo $primary ?>!important;
}

#intro-section .intro-box a{
	color:<?php echo $primary ?>!important;
}


#footer-widgets
{
	background: <?php echo $secondary ?>;
}

#masthead.stickyhead{
	background:#1d1d1d!important;
}

/* Links */

a, .hentry .entry-header .entry-meta span {
	color: <?php echo $link ?>;
}

a:visited {
	color: <?php echo $link ?>;
}

a:hover,
a:focus,
a:active {
	color:<?php echo $hover ?>;
	text-decoration: none;
}


