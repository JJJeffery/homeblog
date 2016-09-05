<?php /* Template Name: Shop page */ 

get_header();

$get_meta = get_post_custom($post->ID);
$percolumn = weblusive_get_option('products_per_row');
if (empty($percolumn)) $percolumn = 'columns-3';
$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
get_template_part( 'library/includes/page-head' ); 
?>
<div class="row">
	<div class="col-md-12">
		<div class="box-section banner-section">
			<div class="banner">
				<?php 
					//if ( has_post_thumbnail() ) { 
						//the_post_thumbnail();
					//} else{
						//echo '<img src="'.get_template_directory_uri().'/images/banner_def.jpg" alt="banner" />';
					//}
				?>
				<?php if (!weblusive_get_option('hide_titles')):?>
					<h1 class="page-title"><span><?php woocommerce_page_title(); ?></span></h1>
				<?php endif; ?>
				
			</div>
			<div class="pager-line">
				<?php if (!weblusive_get_option('hide_breadcrumbs')):?>
					 <?php if(function_exists('woocommerce_breadcrumb')){ woocommerce_breadcrumb(); } ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="page-section row">
	<?php if ($weblusive_sidebar_pos == 'left'):?><div class="col-md-4 side-div" ><?php get_sidebar(); ?></div><?php endif?>
	
	
	<div class="<?php if ($weblusive_sidebar_pos == 'full'):?>col-md-12<?php else:?>col-md-8<?php endif?> shop-section woocommerce-page <?php echo $percolumn?>">
		<?php woocommerce_content(); ?>
	</div>
	
	<?php if ($weblusive_sidebar_pos == 'right'):?><div class="col-md-4 side-div" ><?php get_sidebar(); ?></div><?php endif?>
</div>
<?php get_footer();?>