<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fabthemes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile"   href="http://gmpg.org/xfn/11">
<link rel="pingback"  href="<?php bloginfo( 'pingback_url' ); ?>">

<link href='https://fonts.googleapis.com/css?family=Lato:900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="stmenu">
	<nav id="site-navigation" class="sidebar-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->
	<div class="search-box">
		<?php get_search_form();?>
	</div>
	<?php get_sidebar(); ?>
</div>	

<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="container"> <div class="row">
			<div class="col-md-12"> 
				<div class="top"> 
					<div class="site-branding">

					
	<?php if (get_theme_mod(FT_scope::tool()->optionsName . '_logo', '') != '') { ?>
				<h1 class="site-title logo"><a class="mylogo" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img relWidth="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxWidth', 0)); ?>" relHeight="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxHeight', 0)); ?>" id="ft_logo" src="<?php echo get_theme_mod(FT_scope::tool()->optionsName . '_logo', ''); ?>" alt="" /></a></h1>
	<?php } else { ?>
				<h1 class="site-title logo"><a id="blogname" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php } ?>


					</div><!-- .site-branding -->
					<div class="nav-switch"><i class="fa fa-bars"></i> <i class="fa fa-times"></i></div>

				</div>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->

				<?php if ( is_home() && !is_paged() ) { ?>
					<!-- Featured posts if home  -->
					<div class="featured-posts">
							<?php
							$slidecount = ft_of_get_option('fabthemes_slide_count','2');
							$slidecat = ft_of_get_option('fabthemes_slide_cat','1'); 
							$args = array( 'posts_per_page' => $slidecount , 'cat' => $slidecat );
							$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
								<div class="featpost">
									<h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
									<?php the_excerpt(); ?>
									<a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More','fabthemes' );?></a>
								</div>
							<?php endforeach; 
							wp_reset_postdata();?>
					</div>
				<?php } elseif ( is_single()) { ?>
					<header class="page-header">
						<h1> <?php _e('Blog Post','fabthemes');?></h1>		
					</header><!-- .entry-header -->
				<?php } elseif ( is_archive()) { ?>
					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
				<?php } elseif ( is_page()) { ?>
					<header class="page-header">
						<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
					</header><!-- .page-header -->
				<?php } elseif ( is_search()) { ?>
					<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'fabthemes' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->				
				<?php } elseif ( is_404()) { ?>
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'fabthemes' ); ?></h1>
					</header><!-- .page-header -->
				<?php } ?>

			</div>
		</div></div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container"> <div class="row"> 