<?php /** The template for displaying Archive pages. **/
get_header();
$sidebar = weblusive_get_option('sidebar_archive');
$weblusive_sidebar_pos =  weblusive_get_option('sidebar_pos');
if (empty ($sidebar)) $weblusive_sidebar_pos = 'full';
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
					<h1 class="page-title"><span><?php printf( __( 'Search Results for: %s', 'unik' ), '<mark>' . get_search_query() . '</mark>' ); ?></span></h1>
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
	<?php if ($weblusive_sidebar_pos == 'left'):?><div class="col-md-4 side-div" ><?php get_sidebar($sidebar); ?></div><?php endif?>
	 <div class="<?php if ($weblusive_sidebar_pos == 'full' || empty($sidebar)):?>col-md-12<?php else:?>col-md-8<?php endif?>">
		<?php if ( have_posts() ) : ?>
			<?php get_template_part( 'loop', 'search' );?>
		<?php else : ?>
			<div id="post-0" class="blog-post no-results not-found">
				<div class="post-content">
					<h4><?php _e( 'Nothing Found', 'unik' ); ?></h4>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'unik' ); ?></p>
					</div><!-- .entry-content -->
				</div>
			</div><!-- #post-0 -->
		<?php endif; ?>
	</div>
	<?php if ($weblusive_sidebar_pos == 'right'):?><div class="col-md-4 side-div" ><?php get_sidebar($sidebar); ?></div><?php endif?>
</div>
<?php get_footer(); ?>