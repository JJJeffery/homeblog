<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fabthemes
 */

get_header(); ?>
<div class="col-md-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'single' ); ?>


		<div id="cooler-nav" class="post-thumb-navigation">
			<div class="row"> 

				<?php $prevPost = get_previous_post(true);
				if($prevPost) {?>
				<div class="col-sm-6"><div class="nav-box previous">
					<?php 
					$thumb = get_post_thumbnail_id($prevPost->ID);
					$img_url = wp_get_attachment_url( $thumb,'full' );
					$image = aq_resize( $img_url, 768, 300, true,true,true );
					$imgpic = '<img src=" '.$image.' " />';
					?>

					<?php previous_post_link('%link'," $imgpic ", TRUE); ?>
					<h4><?php echo get_the_title( $prevPost->ID ); ?></h4> 
				</div></div>

				<?php } $nextPost = get_next_post(true);
				if($nextPost) { ?>
				
				<div class="col-sm-6"><div class="nav-box next"> 
					<?php 
					$thumb = get_post_thumbnail_id($nextPost->ID);
					$img_url = wp_get_attachment_url( $thumb,'full' );
					$image = aq_resize( $img_url, 768, 300, true,true,true );
					$imgpic = '<img src=" '.$image.' " />';
					?>
					<?php next_post_link('%link'," $imgpic ", TRUE); ?>
					<h4><?php echo get_the_title( $nextPost->ID ); ?></h4> 
				</div></div>
				<?php } ?>
				
			</div>
		</div><!--#cooler-nav div -->


			<?php 

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
