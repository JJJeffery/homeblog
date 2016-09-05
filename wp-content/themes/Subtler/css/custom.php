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
	$header 	= ft_of_get_option('fabthemes_header','');

	$bodycolor 	= ft_of_get_option('fabthemes_body_color','#fff');
	$bodytext 	= ft_of_get_option('fabthemes_body_text','#696969');

	$lighttext 	= ft_of_get_option('fabthemes_light_text','#888888');	
	$bordercolor= ft_of_get_option('fabthemes_border_color','#dddddd');		
	$titlecolor = ft_of_get_option('fabthemes_title_text','#111111');

	$primary 	= ft_of_get_option('fabthemes_primary_color','#ff6600');
	$secondary	= ft_of_get_option('fabthemes_secondary_color','#f4f4f4');

	$link 		= ft_of_get_option('fabthemes_link_color','');
	$hover 		= ft_of_get_option('fabthemes_hover_color','');
	
?>

#masthead{
	background-image: url('<?php echo $header ?>');
}

.featured-posts div.featpost a.readmore{
	background: <?php echo $primary ?>;
}
.entry-header h2.entry-title, 
.entry-header h1.entry-title,
.entry-header h2.entry-title a, 
.entry-header h1.entry-title a,
#comments h2.comments-title,
#comments ol.comment-list li .comment-body .comment-meta .comment-author,
.site-footer .footer-widgets .widget h1,
#comments #respond h3#reply-title ,
#authorarea h3{
	color: <?php echo $titlecolor ?>;
}


.entry-header .entry-meta:after,
#authorarea,
.entry-footer a.read-more, 
.entry-footer .com-box,
.site-footer .footer-widgets .widget ul li,
.site-footer .site-info,
.page-numbers a, .page-numbers a:hover, .page-numbers.current, .page-numbers.current:hover,
#comments h2.comments-title,
#comments ol.comment-list li .comment-body .comment-meta,
#comments #respond h3#reply-title {
	border-color:<?php echo $bordercolor ?>;
}

#authorarea img.avatar{
	background:<?php echo $bordercolor ?>;
}
.entry-header .cat-list a{
	color: <?php echo $primary ?>;
}
body,
.site-footer .footer-widgets .widget ul li ,
.site-footer .site-info a,
.entry-footer a.read-more, .entry-footer .com-box,
.site-footer .footer-widgets .widget ul li a{
	color: <?php echo $bodytext ?>;
}

#page,
.entry-header .entry-meta span {
	background: <?php echo $bodycolor ?>;
}

.page-numbers a:hover, .page-numbers.current, .page-numbers.current:hover,
#comments ol.comment-list li .comment-body,
.site-footer,
#authorarea{
	background: <?php echo $secondary ?>;	
}

#comments ol.comment-list li .comment-body:after{
	color:  <?php echo $secondary ?>;	
}

/* Links */

a:link, a:visited {
	color: <?php echo $link ?>;
}

a:hover,
a:focus,
a:active {
	color:<?php echo $hover ?>;
	text-decoration: none;
}