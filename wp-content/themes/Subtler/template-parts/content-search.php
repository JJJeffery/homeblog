<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fabthemes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a href=" <?php the_permalink(); ?>" class="read-more"> <i class="fa fa-plus"></i> <?php _e('Read More', 'fabthemes'); ?> </a>
		<ul class="sharebtn">
			<li class="twit" >  <a href="https://twitter.com/share?url=<?php echo esc_url( get_permalink() ) ?>&amp;text=<?php echo get_the_title() ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<li class="faceb"> <a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ) ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<li class="googl">  <a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ) ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		</ul>
		<div class="clear"></div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
