<div class="row">
	<div class="col-md-12">
		<div class="box-section banner-section">
			<div class="banner">
				<?php 
					$thumbnail = get_the_post_thumbnail();
					if(!empty($thumbnail) && !is_single()) {
						the_post_thumbnail();
					} 
					
				?>
				<?php if (!weblusive_get_option('hide_titles')):?>
					<h1 class="page-title"><span><?php the_title(); ?></span></h1>
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