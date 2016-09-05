<?php 
$pageId = $post->ID;

$_SESSION['unik_page_id'] = $pageId;

$get_meta = get_post_custom($post->ID);

$weblusive_sidebar_pos = $get_meta["_weblusive_sidebar_pos"][0];
$portfolio_type = get_post_meta($post->ID, "_portfolio_type", $single = false);
$paginationEnabled = (isset($portfolio_type) && !(empty ($portfolio_type))) ? $portfolio_type[0] : 0;
$page_template_name = get_post_meta($post->ID,'_wp_page_template',true); 
if ($page_template_name !== 'homepage-template2.php')
{
	get_template_part('portfolio_header');
}

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
		case 'portfolio-template-3columns.php': case'homepage-template2.php':
			$itemsize = 'col3';	
			$thumbsize = 'portfolio-3-col';
			$itemlayout = 'column4';
			$colnumber = 3;			
		break;
				
	}


if( get_post_meta($post->ID, "_page_portfolio_num_items_page", $single = true) != '' && $paginationEnabled ) 
{ 
	$items_per_page = get_post_meta($post->ID, "_page_portfolio_num_items_page", $single = false);
} 
else 
{ // else don't paginate
	$items_per_page[0] = 777;
}
$loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $items_per_page[0])); 
?>
<?php the_content(); ?>
<div class="page-section row">
	<?php if ($weblusive_sidebar_pos == 'left'):?><div class="col-md-4 side-div" ><?php get_sidebar(); ?></div><?php endif?>
	<div class="<?php if ($weblusive_sidebar_pos == 'full'):?>col-md-12<?php else:?>col-md-8<?php endif?>">
		<div class="portfolio">
			<ul id="filterOptions" class="filter<?php if (!$paginationEnabled):?><?php echo ' non-paginated' ?><?php endif?>">
				<?php if ($paginationEnabled):?>
					<li><a href="<?php echo get_page_link($pageId) ?>" class="active"><?php _e('Show All', 'unik')?></a></li>
					<?php 
						$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
						$MyWalker = new PortfolioWalker2();
						$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '1');
						$categories = wp_list_categories ($args);
					?>
				<?php else: ?>
					<li><a href="#" class="active" data-filter="*"><?php _e('Show All', 'unik')?></a></li>
					<?php 
						$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);                                                 
						$MyWalker = new PortfolioWalker();
						$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '1');
						$categories = wp_list_categories ($args);
					?>
				<?php endif ?>
			</ul>
			<div class="portfolio-box <?php echo $itemsize?>">
				<?php 
				
				if( $cats == '' ): ?>
					<p><?php _e('No categories selected. To fix this, please login to your WP Admin area and set
						the categories you want to show by editing this page and setting one or more categories 
						in the multi checkbox field "Portfolio Categories".', 'unik')?>
					</p>
				<?php 
				else:
					// If the user hasn't set a number of items per page, then use JavaScript filtering
					if( $items_per_page == 777 ) : endif; 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					//  query the posts in selected terms
					$portfolio_posts_to_query = get_objects_in_term( explode( ",", $cats ), 'portfolio_category');
					if (!empty($portfolio_posts_to_query)):			
						$wp_query = new WP_Query( array( 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC', 'post__in' => $portfolio_posts_to_query, 'paged' => $paged, 'showposts' => $items_per_page[0] ) ); 
						
						if ($wp_query->have_posts()):  ?>
						<?php while ($wp_query->have_posts()) : 							
							$wp_query->the_post();
							$custom = get_post_custom($post->ID);
								 
							// Get the portfolio item categories
							$cats = wp_get_object_terms($post->ID, 'portfolio_category');
												   
													
							if ($cats):
								$cat_slugs = '';
								foreach( $cats as $cat ) {$cat_slugs .= $cat->slug . " ";}
							endif;
							?>
				
							<?php $link = ''; $thumbnail = get_the_post_thumbnail($post->ID, $thumbsize); ?>
							
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
						<?php endwhile; ?>
					<?php endif;?>
				<?php endif;?>
			<?php endif?>	
					
			</div>
		</div>
	</div>
	<?php if ($weblusive_sidebar_pos == 'right'):?><div class="col-md-4 side-div" ><?php get_sidebar(); ?></div><?php endif?>
</div>
<?php if ($paginationEnabled ):?>
	<?php if ( $wp_query->max_num_pages > 1 ): ?>
			<?php include(unik_PLUGINS . '/wp-pagenavi.php' ); wp_pagenavi(); ?> 
	<?php endif?>
<?php endif?>	
<?php get_template_part('portfolio_footer'); ?>