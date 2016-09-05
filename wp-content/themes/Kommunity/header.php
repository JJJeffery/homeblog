<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fabthemes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">


	<header id="masthead" class="site-header" role="banner">
		<div class="container"> <div class="row"> 

			<div class="col-sm-6">
				<div class="site-branding">
					
	<?php if (get_theme_mod(FT_scope::tool()->optionsName . '_logo', '') != '') { ?>
				<h1 class="site-title logo"><a class="mylogo" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img relWidth="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxWidth', 0)); ?>" relHeight="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxHeight', 0)); ?>" id="ft_logo" src="<?php echo get_theme_mod(FT_scope::tool()->optionsName . '_logo', ''); ?>" alt="" /></a></h1>
	<?php } else { ?>
				<h1 class="site-title logo"><a id="blogname" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php } ?>

				</div>			
			</div>

			<div class="col-sm-6">
				<div class="gate pull-right">

					<?php
					if ( is_user_logged_in() ) { ?>
							 <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout"> <i class="fa fa-unlock-alt"></i> Log out </a> 	
					<?php } else { ?>	
							<a href="<?php echo wp_login_url( get_permalink() ); ?>"><i class="fa fa-sign-in"></i> Sign in </a>
					<?php } ?>				
					<a href="#search-modal" data-toggle="modal"> <i class="fa fa-search"></i> Search </a>

				</div>
			</div>
		</div></div>
	</header><!-- #masthead -->


	<div class="main-nav">
		<div class="container"> <div class="row"> 
			<div class="col-md-12">
				<nav id="site-navigation" class="main-navigation" role="navigation">

					<a class="stickhome" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class="fa fa-home"></i></a>
					
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ,'menu_id' =>'kommunity') ); ?>
					<div class="sticky-gate pull-right">
						<?php
						if ( is_user_logged_in() ) { ?>
								 <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout"> <i class="fa fa-unlock-alt"></i> </a> 		
						<?php } else { ?>	
								 <a href="<?php echo wp_login_url( get_permalink() ); ?>"><i class="fa fa-sign-in"></i>  </a>
						<?php } ?>		
						<a href="#search-modal" data-toggle="modal"> <i class="fa fa-search"></i> </a>					
				</div>
				</nav><!-- #site-navigation -->
			</div>
		</div> </div>
	</div>


	<div id="content" class="site-content">
