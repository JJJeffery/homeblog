<?php
$options = get_option('softpress');	

/*------------[ Meta ]-------------*/
if ( ! function_exists( 'mts_meta' ) ) {
	function mts_meta() { 
	global $options
?>
<?php if ($options['mts_favicon'] != '') { ?>
<link rel="icon" href="<?php echo $options['mts_favicon']; ?>" type="image/x-icon" />
<?php } ?>
<!--iOS/android/handheld specific -->	
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php }
}

/*------------[ Head ]-------------*/
if ( ! function_exists( 'mts_head' ) ) {
	function mts_head() { 
	global $options
?>
<!--start fonts-->
<?php if ($options['mts_title_font'] == 'Arial') { ?>
<?php } else { ?>
<?php if ($options['mts_title_font'] != '' || $options['mts_google_title_font'] != '') { ?>
<link href="http://fonts.googleapis.com/css?family=<?php if ($options['mts_google_title_font'] != '') { ?><?php echo $options['mts_google_title_font']; ?><?php } else { ?><?php echo $options['mts_title_font']; ?><?php } ?>:400,700" rel="stylesheet" type="text/css">
<style type="text/css">
.title, h1,h2,h3,h4,h5,h6, .flex-caption .slidertitle, #tabber ul.tabs li a, .fn { font-family: '<?php if ($options['mts_google_title_font'] != '') { ?><?php echo $options['mts_google_title_font']; ?><?php } else { ?><?php echo $options['mts_title_font']; ?><?php } ?>', sans-serif;}
</style>
<?php } ?>
<?php } ?>
<?php if ($options['mts_content_font'] == 'Arial') { ?>
<?php } else { ?>
<?php if ($options['mts_content_font'] != '' || $options['mts_google_content_font'] != '') { ?>
<link href="http://fonts.googleapis.com/css?family=<?php if ($options['mts_google_content_font'] != '') { ?><?php echo $options['mts_google_content_font']; ?><?php } else { ?><?php echo $options['mts_content_font']; ?><?php } ?>:400,400italic,700,700italic" rel="stylesheet" type="text/css">
<style type="text/css">
body {font-family: '<?php if ($options['mts_google_content_font'] != '') { ?><?php echo $options['mts_google_content_font']; ?><?php } else { ?><?php echo $options['mts_content_font']; ?><?php } ?>', sans-serif;}
</style>
<?php } ?>
<?php } ?>
<!--end fonts-->
<style type="text/css">
<?php if ($options['mts_logo'] != '') { ?>
#header h1, #header h2 {text-indent: -999em; min-width:111px; margin-bottom:0; }
#header h1 a, #header h2 a {background: url(<?php echo $options['mts_logo']; ?>) no-repeat; min-width: 111px; display: block; line-height: 26px; }
<?php } ?>
<?php if($options['mts_bg_color'] != '') { ?>
body {background-color:<?php echo $options['mts_bg_color']; ?>;}
<?php } ?>
<?php if ($options['mts_bg_pattern_upload'] != '') { ?>
body {background-image: url(<?php echo $options['mts_bg_pattern_upload']; ?>);}
<?php } else { ?>
<?php if($options['mts_bg_pattern'] != '') { ?>
body {background-image:url(<?php echo get_template_directory_uri(); ?>/images/<?php echo $options['mts_bg_pattern']; ?>.png);}
<?php } ?>
<?php } ?>
<?php if ($options['mts_color_scheme'] != '') { ?>
.readMore2 a,#cancel-comment-reply-link:hover,blockquote:after,.readMore2 a:hover,.tagcloud a:hover,.home_page .readMore a:hover,.current_page_item a, .nav-previous a:hover,.nav-next a:hover,#commentform input#submit,#searchform input[type="submit"],.home_menu_item,.secondary-navigation a:hover, .post-date-ribbon,.currenttext, .pagination a:hover,.mts-subscribe input[type="submit"], #tabber .inside li:hover:before, #tabber .inside li:hover:after {background-color:<?php echo $options['mts_color_scheme']; ?>; }
#page, #header, #sidebars .widget, .footer-widgets, .tagcloud a, .related-posts, .postauthor, #commentsAdd, #tabber, .pagination, .single_post, .single_page, #comments, .ss-full-width {border-color:<?php echo $options['mts_color_scheme']; ?>; }
.comment time,#tabber .inside li .meta b,footer .widget li a:hover,.related-posts a,.reply a:hover,#tabber .inside li div.info .entry-title a:hover, #navigation ul ul a:hover,.single_post a, a:hover, #logo a, .textwidget a, #commentform a, #tabber .inside li a, .copyrights a:hover, a, .comment_mt b, .sidebar.c-4-12 a:hover {color:<?php echo $options['mts_color_scheme']; ?>; }
.relatedthumb:hover{color:<?php echo $options['mts_color_scheme']; ?> !important;}
#tabber .tabs a.selected{
	border-top-color:<?php echo $options['mts_color_scheme']; ?> !important;
	}
.tabposthover,blockquote,footer .container ,.ex_color_bottom{
	border-bottom-color:<?php echo $options['mts_color_scheme']; ?> !important;
}
.postauthor,.related-posts,#commentsAdd,#comments{
	border-top:4px solid #666666 !important;
	border-bottom:4px solid <?php echo $options['mts_color_scheme']; ?> !important;
	}
.comment_text_area,.ex_color_bottom2{
	border-bottom:1px solid <?php echo $options['mts_color_scheme']; ?> !important;
	}
<?php } ?>
<?php if($options['mts_floating_social'] == '1') { ?>
.shareit { top: 305px; left: auto; z-index: 100; margin: 0 0 0 -149px; width: 90px; position: fixed; overflow: hidden; padding: 5px; background: white; }
.share-item {margin: 2px;}
<?php } ?>
<?php if ($options['mts_layout'] == 'sclayout') { ?>
.article { float: right; margin-right:3%;}
.sidebar.c-4-12 { float: left; margin-right: 0; }
<?php if($options['mts_floating_social'] == '1') { ?>
.shareit { margin: 0 630px 0; }
<?php } ?>
<?php } ?>
<?php if($options['mts_author_comment'] == '1') { ?>
.bypostauthor .avatar {border: 2px solid #000; }
.bypostauthor .reply {border-bottom: 0; }
<?php } ?>
<?php echo $options['mts_custom_css']; ?>
</style>
<?php echo $options['mts_header_code']; ?>
<?php }
}
/*------------[ footer ]-------------*/
if ( ! function_exists( 'mts_footer' ) ) {
	function mts_footer() { 
	global $options
?>
<!--Twitter Button Script------>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<!--Facebook Like Button Script------>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=136911316406581";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--start slider-->
<?php if($options['mts_featured_slider'] == '1') { ?>
<?php if( is_home() ) { ?>
<script type="text/javascript">
jQuery(document).ready(function(e) {
   (function($){
	$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "fade",
		pauseOnHover: true,
		controlsContainer: ".flex-container",
		controlNav:false,
		directionNav:true
	});
	});
   }(jQuery));
});
</script>
<?php } ?>
<?php } ?>
<!--end slider-->
<!--start lightbox-->
<?php if($options['mts_lightbox'] == '1') { ?>
<script type="text/javascript">  
jQuery(document).ready(function($) {
$("a[href$='.jpg'], a[href$='.jpeg'], a[href$='.gif'], a[href$='.png']").prettyPhoto({
slideshow: 5000,
autoplay_slideshow: false,
animationSpeed: 'normal',
padding: 40,
opacity: 0.35,
showTitle: true,
social_tools: false
});
})
</script>
<?php } ?>
<!--end lightbox-->
<script type="text/javascript">
jQuery(document).ready(function(e) {
    (function($){
		$('.ad-125').parent('.widget-sidebar').addClass('hide_ad125');
		$('.ad-300').parent('.widget-sidebar').addClass('remove_marg_ad300');
		function placholder_text(parm){
			$(parm).focus(function(){
  				$(this).attr('placeholder','');
			});
			$(parm).focusout(function(){
			 	$(this).attr('placeholder','Search this site...');
			});
		}		
		placholder_text('.sidebar #s');
		placholder_text('.search_li #s');
		
		$('.comment-author').parent('div').addClass('commentContainer');
		$('.commentContainer').wrapInner('<div class="commentCInner"></div>');
		$('.excerpt .readMore a').hover(function(e) {
			$(this).parents('.excerpt .readMore').addClass('ex_color_bottom');
		});
		$('.excerpt .readMore a').mouseout(function(e) {
			$(this).parents('.excerpt .readMore').removeClass('ex_color_bottom');
		});
		$('.widget-sidebar #searchform').parent('li').addClass('cust_search');
		$('.readMore2 a').hover(function(e) {
            $(this).parents('.readMore2').addClass('ex_color_bottom2');
        });
		$('.readMore2 a').mouseout(function(e) {
			$(this).parents('.readMore2').removeClass('ex_color_bottom2');
		});
		$('.secondary-navigation #navigation ul ul a').each(function(index, element) {
            $(this).append('<span>&raquo;</span>');
        });
		//var linat = $('.children li').parent('li').children('.comment-reply-link').attr('href');
		$('.children li').append('<span class="reply-icon"> </span>');
		
		
	}(jQuery));
});
</script>
<!--start footer code-->
<?php if ($options['mts_analytics_code'] != '') { ?>
<?php echo $options['mts_analytics_code']; ?>
<?php } ?>
<!--end footer code-->
<?php }
}

/*------------[ Copyrights ]-------------*/
if ( ! function_exists( 'mts_copyrights_credit' ) ) {
	function mts_copyrights_credit() { 
	global $options
?>
<!--start copyrights-->
<div class="row" id="copyright-note">
<span><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> Copyright &copy; <?php echo date("Y") ?>.</span>
<div class="top"><?php echo $options['mts_copyrights']; ?> <a href="#top" class="toplink">Back to Top &uarr;</a></div>
</div>
<!--end copyrights-->
<?php }
}

?>