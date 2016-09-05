<?php /*** Portfolio Single Posts template. */ 

get_header(); 
$pageId = isset ($_SESSION['unik_page_id']) ? $_SESSION['unik_page_id'] : get_page_ID_by_page_template('portfolio-template.php');
$get_meta = get_post_custom($post->ID);

$portfolio_type = get_post_meta($pageId, "_portfolio_type", $single = false);
$paginationEnabled = (isset($portfolio_type) && !(empty ($portfolio_type))) ? $portfolio_type[0] : 0;
$page_template_name = get_post_meta($pageId,'_wp_page_template',true); 


$overridepos = isset($get_meta['_weblusive_sidebar_pos']) ? $get_meta['_weblusive_sidebar_pos'] : '';


$overridepos = (empty($overridepos)) ? 'default' : $overridepos[0];
$overridesidebar =  isset($get_meta['_weblusive_sidebar_post']) ? $get_meta['_weblusive_sidebar_post'] : '';
$overridesidebar = (empty($overridesidebar)) ? '' : $overridesidebar[0];

$sidebarPos = ($overridepos == 'default') ?  weblusive_get_option('sidebar_pos') : $overridepos;
$sidebar = ($overridesidebar == '') ?  weblusive_get_option('sidebar_portfolio') : $overridesidebar;

get_template_part( 'library/includes/page-head' ); 
get_template_part( 'inner-header', 'content'); 
?>

<div class="page-section row"> 
	<?php if (!empty($sidebar) && $sidebarPos=='left') :?><div class="col-md-4 side-div" ><?php dynamic_sidebar($sidebar)?></div><?php endif; ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="<?php if (empty($sidebar) || $sidebarPos == 'full'):?>col-md-12<?php else:?>col-md-8<?php endif?> ">
		<div class="single-post-container single-project ">
			<div class="single-post-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'unik' ), 'after' => '</div>' ) ); ?>
			</div>    
		</div>
	<?php endwhile; ?>	
	</div>
	<?php if (!empty($sidebar) && $sidebarPos=='right') :?><div class="col-md-4 side-div" ><?php dynamic_sidebar($sidebar)?></div><?php endif; ?>
</div>
<?php get_footer(); ?>