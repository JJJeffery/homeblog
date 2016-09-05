<?php get_header();
get_template_part('portfolio_header'); 
	//global $paged;
 	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	$pageId = $_SESSION['unik_page_id'];
	if (!$pageId) $pageId = get_page_ID_by_page_template('portfolio-template-3columns.php');
	$get_meta = get_post_custom($pageId);
	//$weblusive_sidebar_pos = $get_meta["_weblusive_sidebar_pos"][0];
	get_template_part( 'library/includes/page-head' ); 

	$portfolio_type = get_post_meta($pageId, "_portfolio_type", $single = false);
	$paginationEnabled = (isset($portfolio_type) && !(empty ($portfolio_type))) ? $portfolio_type[0] : 0;
	$page_template_name = get_post_meta($pageId,'_wp_page_template',true); 


	$itemsize = 'col3';	
	$itemlayout = 'column4';	
	$colnumber = 3;
	$thumbsize = 'portfolio-3-col';
	// Check which layout was selected
	switch($page_template_name)
	{
                case 'portfolio-template-2columns.php':
			$itemsize = 'col2';	
			$thumbsize = 'portfolio-2-col';
			$itemlayout = 'column6';
			$colnumber = 2;			
		break;
		case 'portfolio-template-3columns.php':
			$itemsize = 'col3';	
			$thumbsize = 'portfolio-3-col';
			$itemlayout = 'column4';
			$colnumber = 3;			
		break;
		
	}
?>
<div class="portfolio">
	<ul id="filterOptions" class="filter">
		<li><a href="<?php echo get_page_link($pageId) ?>"><?php _e('Show All', 'unik')?></a></li>
		<?php 
			$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
			$MyWalker = new PortfolioWalker2();
			$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '1');
			$categories = wp_list_categories ($args);
		?>
		<!-- End Portfolio Navigation -->
	</ul>		
	<div class="portfolio-box <?php echo $itemsize?>">
		<?php
		$counter=1;
		if ($wp_query->have_posts()):
			while ($wp_query->have_posts()) : 							
				$wp_query->the_post();
				$custom = get_post_custom($post->ID);
				// Get the portfolio item categories
				$cats = wp_get_object_terms($post->ID, 'portfolio_category');
				if ($cats):
					$cat_slugs = '';
					foreach( $cats as $cat ) {$cat_slugs .= $cat->slug . " ";}
				endif;
				$link = ''; $thumbnail = get_the_post_thumbnail($post->ID, $thumbsize);
				?>
					
				<div class="project-post <?php echo $cat_slugs; ?>">
					<?php if (!empty($thumbnail)): ?>
						<?php the_post_thumbnail($thumbsize, array('class' => 'cover')); ?>
					<?php else :?>
						 <img src="<?php echo get_template_directory_uri()?>/images/picture.jpg" alt="<?php _e ('No preview image', 'unik') ?>" />
					<?php endif?>
					<div class="hover-box">

						<?php if( !empty ( $custom['_portfolio_video'][0] ) ) : $link = $custom['_portfolio_video'][0]; ?>
							<a href="<?php echo $link ?>" class="zoom video" title="<?php the_title() ?>">
								<i class="fa fa-film"></i>
							</a>
						<?php elseif( isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '' ) : ?>
							<a href="<?php echo $custom['_portfolio_link'][0] ?>" class="link" title="<?php the_title() ?>">
								<i class="fa fa-external-link "></i>
							</a>
						<?php elseif(  isset( $custom['_portfolio_no_lightbox'][0] )  &&  $custom['_portfolio_no_lightbox'][0] !='' ) : $link = get_permalink(get_the_ID());  ?>
							<a href="<?php echo $link; ?>" class="link" title="<?php the_title() ?>">
								<i class="fa fa-file-o "></i>
							</a>
						<?php else : ?>
							<?php  
								$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); 
								$link = $full_image[0];
							?>
							<a href="<?php echo $link ?>" class="zoom" title="<?php the_title() ?>">
								<i class="fa fa-search"></i>
							</a>
						<?php   endif; ?>  
					</div>
				</div>			
			<?php $counter++; endwhile; ?>				
		<?php endif?>
	</div>
</div>
<?php if ($paginationEnabled ):?>
	<?php if ( $wp_query->max_num_pages > 1 ): ?>
		<div class="pagination-list">
			<?php include(unik_PLUGINS . '/wp-pagenavi.php' ); wp_pagenavi(); ?> 
			<div class="clear"></div>
		</div>
	<?php endif?>
<?php endif?>
<?php get_template_part('portfolio_footer'); ?>
<?php get_footer() ?>