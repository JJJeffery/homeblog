<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fabthemes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="cat-list">
			<?php the_category( ' ' );  ?>
		</div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' );
	
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
		<span> <?php _e('Posted by','fabthemes');?> <?php the_author(); ?> <?php _e('on','fabthemes');?>  <?php echo get_the_date( 'Y-m-d' ); ?> </span> 		
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php 
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
	$image = aq_resize( $img_url, 1200, 600, true,true,true ); //resize & crop the image
	?>
	<?php if($image) : ?>
		<div class="single-img"> 
			<img class="postimg" src="<?php echo $image ?>" />	
			<div class="overlay"></div>		
		</div>

	<?php endif; ?>		


	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fabthemes' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fabthemes' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="com-box">
			<i class="fa fa-comment"></i> <?php comments_number( 'no responses', 'one response', '% responses' ); ?>
		</div>
		<ul class="sharebtn">
			<li class="twit" >  <a href="https://twitter.com/share?url=<?php echo esc_url( get_permalink() ) ?>&amp;text=<?php echo get_the_title() ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<li class="faceb"> <a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ) ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<li class="googl">  <a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ) ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		</ul>
		<div class="clear"></div>
	</footer><!-- .entry-footer -->

	<div id="authorarea">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?>
		<h3>About <?php echo get_the_author(); ?></h3>
		<div class="authorinfo">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">View all posts by <?php echo get_the_author(); ?> <span class="meta-nav">&rarr;</span></a>
		</div>
	</div>

</article><!-- #post-## -->
