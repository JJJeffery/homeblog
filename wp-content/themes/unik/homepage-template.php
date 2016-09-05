<?php /* Template Name: Homepage */ 
get_header();?>

<?php
	$get_meta = get_post_custom($post->ID);
	$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
	get_template_part( 'library/includes/page-head' ); 
?>
<div class="page-section row">
	<?php if ($weblusive_sidebar_pos == 'left'):?><div class="col-md-4 side-div" ><?php get_sidebar(); ?></div><?php endif?>
    <div class="<?php if ($weblusive_sidebar_pos == 'full'):?>col-md-12<?php else:?>col-md-8<?php endif?>">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
        <?php endwhile; ?>	
	</div>
	<?php if ($weblusive_sidebar_pos == 'right'):?><div class="col-md-4 side-div" ><?php get_sidebar(); ?></div><?php endif?>
</div>             
<?php get_footer();?>