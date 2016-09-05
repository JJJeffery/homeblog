<?php /* Template Name: Blog */

get_header();
$catid = get_query_var('cat');
$cat = get_category($catid);

$get_meta = get_post_custom($post->ID);
$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
get_template_part( 'library/includes/page-head' ); 
?>

<div class="blog-section col1 page-section">
	<?php if ($weblusive_sidebar_pos == 'left'):?><div class="col-md-4 side-div" ><?php get_sidebar(); ?></div><?php endif?>
	<div class="<?php if ($weblusive_sidebar_pos == 'full'):?>full-content<?php else:?>col-md-8<?php endif?>">

		<?php 
		$temp = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		$pp = get_option('posts_per_page');
		$wp_query->query('posts_per_page='.$pp.'&paged='.$paged);			
		get_template_part( 'loop', 'index' );
		wp_link_pages();
		?>
	</div>
	<?php if ($weblusive_sidebar_pos == 'right'):?><div class="col-md-4 side-div" ><?php get_sidebar(); ?></div><?php endif?>
       
</div>

<?php get_footer(); ?>