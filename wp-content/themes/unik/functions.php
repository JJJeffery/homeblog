<?php
/******************* DEFINE NAME/VERSION ********************/

$themename = "Unik";
$themefolder = "unik";

define ('theme_name', $themename );
define ('theme_ver' , 1 );

/************************************************************/

/********************* DEFINE MAIN PATHS ********************/
define('unik_SHORTCODES',  get_template_directory() . '/library/functions/shortcodes/ui.php' ); // Shortcut to the /addons/ directory
define('unik_PLUGINS',  get_template_directory() . '/addons' ); // Shortcut to the /addons/ directory


/*-----------------------------------------------------------------------------------*/
$adminPath 	=  get_template_directory() . '/library/admin-panel/';
$funcPath 	=  get_template_directory() . '/library/functions/';
$incPath 	=  get_template_directory() . '/library/includes/';

require_once ($funcPath . 'helper-functions.php');
require_once ($incPath . 'the_breadcrumb.php');
require_once ($incPath . 'OAuth.php');
require_once ($incPath . 'twitteroauth.php');
require_once ($incPath . 'portfolio_walker.php');
require_once ($funcPath . 'post-types.php');
require_once ($funcPath . 'widgets.php');
require_once ($funcPath . '/shortcodes/shortcode.php');

include (get_template_directory() . '/library/admin-panel/admin-ui.php');
include (get_template_directory() . '/library/admin-panel/admin-functions.php');
include (get_template_directory() . '/library/admin-panel/post-options.php');
include (get_template_directory() . '/library/admin-panel/custom-slider.php');
//include (get_template_directory() . '/library/admin-panel/notifier/update-notifier.php');
include (get_template_directory() . '/library/customizer/customizer.php');

/************************************************************/


/*********** LOAD ALL REQUIRED SCRIPTS AND STYLES ***********/
function unik_load_scripts()
{
	// Register or enqueue scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('migrate',  get_template_directory_uri(). '/js/jquery.migrate.js');
	wp_enqueue_script('mag-popup',  get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('bootstrap',  get_template_directory_uri(). '/js/bootstrap.js', array('jquery'), '3.0.1' );
	wp_enqueue_script('isotope', get_template_directory_uri() .'/js/jquery.isotope.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('jplayer-audio',  get_template_directory_uri().'/js/jplayer/jquery.jplayer.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('plugin-scroll', get_template_directory_uri().'/js/plugins-scroll.js', array('jquery'), '3.2', true);
	wp_enqueue_script('flex-slider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), '3.2', true);
	wp_enqueue_script('bx-slider', get_template_directory_uri().'/js/jquery.bxslider.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('retina', get_template_directory_uri().'/js/retina-1.1.0.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('imagesloaded', get_template_directory_uri() .'/js/jquery.imagesloaded.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('waypoint', get_template_directory_uri() .'/js/waypoint.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('flickr', get_template_directory_uri().'/addons/flickr/jflickrfeed.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('Validate',  get_template_directory_uri().'/js/jquery.validate.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('apear', get_template_directory_uri() .'/js/jquery.appear.js', array('jquery'), '3.2', true);
	wp_enqueue_script('raphael', get_template_directory_uri() .'/js/raphael-min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('scripts', get_template_directory_uri() .'/js/script.js', array('jquery'), '3.2', true);
	wp_enqueue_script('DevSolution', get_template_directory_uri() .'/js/DevSolutionSkill.min.js', array('jquery'), '3.2', true);
	wp_enqueue_script('CountTo', get_template_directory_uri() .'/js/jquery.countTo.js', array('jquery'), '3.2', true);
	
	if (is_page_template('contact-template.php')){
		$address = weblusive_get_option('contact_address');
		if (!empty($address))
		{
			wp_enqueue_script('Google-map-api',  'http://maps.google.com/maps/api/js?sensor=false');
			wp_enqueue_script('Google-map',  get_template_directory_uri().'/js/gmap3.min.js', array('jquery'), '3.2', true);
		}			
	}		
	if (is_page_template('under-construction.php'))
	{
		wp_enqueue_script('Under-construction',  get_template_directory_uri().'/js/jquery.countdown.js', array('jquery'), '3.2', true);
	}
}

function unik_load_styles(){
	$rtl =  weblusive_get_option('rtl_mode');
	$layout =  weblusive_get_option('theme_layout');
	wp_enqueue_style('bootstrap',  get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('mag-popup',  get_template_directory_uri().'/css/magnific-popup.css');
	wp_enqueue_style('flex-slider-styles',  get_template_directory_uri().'/css/flexslider.css');
	wp_enqueue_style('bx-slider-styles',  get_template_directory_uri().'/css/jquery.bxslider.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style('animate',  get_template_directory_uri().'/css/animate.css');
	$mainStyle=weblusive_get_option('theme_skin');
	//(isset($_GET['skin']))? $mainStyle=$_GET['skin'] : $mainStyle='';
	if(isset($mainStyle) && $mainStyle!=''){
		wp_enqueue_style('main-styles', get_stylesheet_directory_uri().'/css/skins/'.$mainStyle.'/style.css');
	}else{
		wp_enqueue_style('main-styles', get_stylesheet_directory_uri().'/style.css');
	}
	wp_enqueue_style('shotcodes_styles',  get_template_directory_uri().'/css/shotcodes_styles.css');
	wp_enqueue_style('jplayer-styles',  get_template_directory_uri().'/js/jplayer/skin/pink.flag/jplayer.pink.flag.css',false,'3.0.1','all');
	wp_enqueue_style('dynamic-styles',  get_template_directory_uri().'/css/dynamic-styles.php');
	if ($rtl){
		wp_enqueue_style('bootstrap-rtl',  get_template_directory_uri().'/css/bootstrap-rtl.css');
	}
	if ($layout == 'fluid'){
		wp_enqueue_style('fullwidth-style',  get_template_directory_uri().'/style-full-width.css');
	}
	
}
add_action( 'wp_enqueue_scripts', 'unik_load_styles' );
add_action( 'wp_enqueue_scripts', 'unik_load_scripts' );


// Load Google Fonts
function unik_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'unik-roboto', "$protocol://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic" );
    wp_enqueue_style( 'unik-opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300" );
}
add_action( 'wp_enqueue_scripts', 'unik_fonts' );

/************************************************************/


/************** THEME GENERAL SETUP FUNCTION ****************/
add_action( 'after_setup_theme', 'unik_setup' );
function unik_setup() {
	
	/**** LANGUAGE SETUP ****/
	load_theme_textdomain( 'unik',  get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file =  get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		
	require_once( $locale_file );
	
	/**** ADD SUPPORT FOR MENUS ****/
	add_theme_support( 'menus' );
	//Register Navigations
	add_action( 'init', 'my_custom_menus' );
	function my_custom_menus() {
		register_nav_menus(
			array(
				'primary_nav' => __( 'Primary Navigation', 'unik'),
		)
		);
	}

	/**** ADD SUPPORT FOR POST THUMBS ****/

	add_theme_support( 'post-thumbnails');
	// Define various thumbnail sizes
	add_image_size('portfolio-3-col', 256, 163, true); 
	add_image_size('portfolio-2-col', 395, 251, true);
	add_image_size('portfolio-alt', 317, 243, true); 
	add_image_size('blog-single', 850, 424, true);
	add_image_size('blog-list', 310, 223, true);
	add_image_size('blog-thumb', 50, 50, true);
	add_image_size('blog-thumb-3', 360, 276, true);
}

/******* FIX THE PORTFOLIO CATEGORY PAGINATION ISSUE ********/

$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
    global $option_posts_per_page;
    if ( is_tax( 'portfolio_category') ) {
		$pageId = get_page_ID_by_page_template('portfolio-template-3columns.php');
		if ($pageId)
		{
			$custom =  get_post_custom($pageId);
			$items_per_page = isset ($custom['_page_portfolio_num_items_page']) ? $custom['_page_portfolio_num_items_page'][0] : '777';
			return $items_per_page;
		}
		else
		{
			return 4;
		}
    } else {
        return $option_posts_per_page;
    }
}

/************************************************************/

function weblusive_get_option( $name ) {
	$get_options = get_option( 'weblusive_options' );
	
	if( !empty( $get_options[$name] ))
		return $get_options[$name];
		
	return false ;
}

//Docs Url
$docs_url = "http://".$themefolder.".weblusive-themes.com/documentation/";

// Redirect To Theme Options Page on Activation
if (is_admin() && isset($_GET['activated'])){
	wp_redirect(admin_url('admin.php?page=panel'));
}

/************************************************************/


/****************** REGISTER SIDEBARS ***********************/

add_filter('widget_text', 'do_shortcode');
add_filter('the_excerpt', 'do_shortcode');

add_action( 'widgets_init', 'unik_widgets_init' );
function unik_widgets_init() {
	$before_widget =  '<div id="%1$s" class="sidebar-section white-box %2$s">';
	$after_widget  =  '</div>';
	$before_title  =  '<h2>';
	$after_title   =  '</h2>';
					
	register_sidebar( array(
		'name' =>  __( 'Primary Widget Area', 'unik' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The Primary widget area', 'unik' ),
		'before_widget' => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
	) );
	
	
	$footer_widget_count = weblusive_get_option('footer_widgets');
	if($footer_widget_count !== 'none')
	{
		$columns = 'column3';
		switch($footer_widget_count)
		{
			case '4':
			$columns = 'col-md-3';
			break;
			case '3':
			$columns = 'col-md-4';
			break;
			case '2':
			$columns = 'col-md-6';
			break;
		}
		for($i = 1; $i<= $footer_widget_count; $i++)
		{
			unregister_sidebar('Footer Widget '.$i);
			if ( function_exists('register_sidebar') )
			register_sidebar(array(
				'name' => 'Footer Widget '.$i,
				'id'	=> 'footer-sidebar-'.$i,
				'before_widget' => '<div class="'.$columns.'"><div class=" widget footer-widgets">',
				'after_widget' => '</div></div>',
				'before_title' => '<h2>',
				'after_title' => '</h2>',
			));
		}
	}

	//Custom Sidebars
	$sidebars = weblusive_get_option( 'sidebars' ) ;
	if($sidebars){
		foreach ($sidebars as $sidebar) {
			register_sidebar( array(
				'name' => $sidebar,
				'id' => sanitize_title($sidebar),
				'before_widget' => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
			) );
		}
	}
}
/************************************************************/


/****************** CUSTOM LOGIN LOGO ***********************/

function unik_login_logo(){
	if( weblusive_get_option('dashboard_logo') )
    echo '<style  type="text/css"> h1 a {  background-image:url('.weblusive_get_option('dashboard_logo').')  !important; } </style>';  
}  
add_action('login_head',  'unik_login_logo'); 

/************************************************************/


/******************** CUSTOM GRAVATAR ***********************/

function unik_custom_gravatar ($avatar) {
	$weblusive_gravatar = weblusive_get_option( 'gravatar' );
	if($weblusive_gravatar){
		$custom_avatar = weblusive_get_option( 'gravatar' );
		$avatar[$custom_avatar] = "Custom Gravatar";
	}
	return $avatar;
}
add_filter( 'avatar_defaults', 'unik_custom_gravatar' ); 

/************************************************************/


/********************* CUSTOM TAG CLOUDS ********************/

function unik_custom_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'unik_custom_tag_cloud_widget' );

/************************************************************/


/****************** ENABLE SESSIONS *************************/

function unik_admin_init() {
	if (!session_id())
	session_start();
}

add_action('init', 'unik_admin_init');

/************************************************************/


add_theme_support( 'automatic-feed-links' );
if ( ! isset( $content_width ) ) $content_width = 960;

/************************************************************/

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

/****************** WOOCommerce HOOKS ***********************/

add_theme_support( 'woocommerce' );

function smarton_woopagination(){
	$perpage = weblusive_get_option('products_per_page');
	$prodperpage = 8;
	if (isset($perpage) && !empty($perpage)){
		$prodperpage =  $perpage;
	}
	return $prodperpage;
}

add_filter( 'loop_shop_per_page', 'smarton_woopagination', 20 );


/* Remove related products */
function wc_remove_related_products( $args ) {
	return array();
}

$hiderelated = weblusive_get_option('hide_related_products');
if ($hiderelated){
	add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 
}

function unik_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ul class="page-tree" itemprop="breadcrumb">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'unik' ),
        );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'unik_woocommerce_breadcrumbs' );
?>