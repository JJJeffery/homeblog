<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fabthemes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('dynpost animated'); ?>>
	<header class="entry-header">

		<div class="cat-list">
			<?php the_category( ' ' );  ?>
		</div>
		<?php
 			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
		<span> <?php _e('Posted by','fabthemes');?> <?php the_author(); ?> <?php _e('on','fabthemes');?>  <?php echo get_the_date( 'Y-m-d' ); ?> </span> 
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

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
