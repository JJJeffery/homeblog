<!DOCTYPE html>
<!--[if IE 8]> 	<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>  

	<link rel="alternate" type="application/rss+xml" title="RSS2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.min.js" type="text/javascript"></script>
   	<?php $favicon = weblusive_get_option('favicon'); if(!empty($favicon)):?>
		<link rel="shortcut icon" href="<?php echo $favicon ?>" /> 
 	<?php endif?>
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/ie8.css" type="text/css" media="screen">
	<![endif]-->
	<?php if(weblusive_get_option('header_code')) echo  htmlspecialchars_decode(weblusive_get_option('header_code')); ?>
	<?php 
	(weblusive_get_option('theme_color')=='dark')? $bodyClass="dark" : $bodyClass='';
	//(isset($_GET['color']) && $_GET['color']=='dark')? $bodyClass="dark" : $bodyClass='';
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class($bodyClass); ?> >
	<?php 
	//for demo
	//(isset($_GET['menu']) && $_GET['menu']=='right')? $menuClass="right-menu-sidebar" : $menuClass='';
	$menuClass = weblusive_get_option('header_style');
	?>
    <div id="container" class="container <?php echo $menuClass//echo weblusive_get_option('header_style') ?>" >
<?php if (!is_page_template('under-construction.php')):?>	
	<div id="sidebar">
		<header class="sidebar-section <?php echo (weblusive_get_option('sticky_header')) ? 'fixed-head' : ''?>">
			<div class="header-logo">
				<?php 
					$logo = weblusive_get_option('logo'); 
					$logosettings =  weblusive_get_option('logo_setting');
				 ?>
				 <a href="<?php echo home_url() ?>" id="logo" class="logo">
					<?php if($logosettings == 'logo' && !empty($logo)):?>
						<img src="<?php echo $logo ?>" alt="<?php echo get_bloginfo('name')?>" id="logo-image" />
					<?php else:?>
						<?php echo get_bloginfo('name') ?>
					<?php endif?>
				 </a>
			</div>
			<a class="elemadded responsive-link" href="#"><?php _e('Menu', 'unik')?></a>
			<div class="navbar-vertical">
				<?php 
				$walker = new Unik_Menu_Walker;
				if(function_exists('wp_nav_menu')):
					wp_nav_menu( 
						array( 
							'theme_location' => 'primary_nav',
							'menu' =>'primary_nav', 
							'container'=>'', 
							'depth' => 4, 
							'menu_class' => 'main-menu',
							'walker' => $walker
						)  
					); 
				else:?>
					<ul class="sf-menu top-level-menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul>
				<?php endif; ?>
			</div>
		</header>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Primary Widget Area") ) :endif; ?>
	</div>
	<div id="content">
		<?php endif;?>
		<?php wp_reset_query()?>
  
