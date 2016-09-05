<?php get_header();

$sidebar = weblusive_get_option('sidebar_archive');
$sidebarPos =  weblusive_get_option('sidebar_pos');
if (empty ($sidebar)) $sidebarPos = 'full';
$blogLayout =  weblusive_get_option('blog_layout');
isset ($blogLayout) ? $blogLayout : $blogLayout==1;
?>
<div class="row">
	<div class="col-md-12">
		<div class="box-section banner-section">
			<div class="banner">
				<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					} else{
						echo '<img src="'.get_template_directory_uri().'/images/banner_def.jpg" alt="banner">';
					}
				?>
				<?php if (!weblusive_get_option('hide_titles')):?>
					<h1 class="page-title">
						<span>
							<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'unik' ), get_the_date() ); ?>
							<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'unik' ), get_the_date('F Y') ); ?>
							<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'unik' ), get_the_date('Y') ); ?>
							<?php elseif ( is_category() ) : ?>
							<?php single_cat_title();?>
							<?php else : ?>
							<?php _e( 'Blog Archives', 'unik' ); ?>
							<?php endif; ?>
						</span>
					</h1>
				<?php endif; ?>
			</div>
			<div class="pager-line">
				<?php if (!weblusive_get_option('hide_breadcrumbs')):?>
					<?php if(class_exists('the_breadcrumb')){ $albc = new the_breadcrumb; } ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="blog-section <?php if($blogLayout==1) echo 'col1'; ?> page-section row">
	<?php if ($sidebarPos == 'left'):?><div class="col-md-4 side-div" ><?php get_sidebar($sidebar); ?></div><?php endif?>
    <div class="<?php if ($sidebarPos == 'full' || empty($sidebar)):?>col-md-12<?php else:?>col-md-8<?php endif?>">
		<?php
			if ( have_posts() ) the_post();
			rewind_posts();       
			get_template_part( 'loop', 'archive' );
		?>
	</div>
	<?php if ($sidebarPos == 'right'):?><div class="col-md-4 side-div" ><?php get_sidebar($sidebar); ?></div><?php endif?>
</div>
<?php get_footer(); ?>