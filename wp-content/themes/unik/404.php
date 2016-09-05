<?php get_header();?>
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
			<h1 class="page-title"><span><?php _e('Page not found', 'unik')?></span></h1>
		<?php endif; ?>    
    </div>
	<div class="pager-line">
		<?php if (!weblusive_get_option('hide_breadcrumbs')):?>
			<?php if(class_exists('the_breadcrumb')){ $albc = new the_breadcrumb; } ?>
		<?php endif; ?>
	</div>
</div>
<div class="blog-section">
            <div class="row">
               <div class="notfound"></div> 
               <p class="lost"></p>
               <div class="col-md-8 notfound_text col-md-offset-2">
                   <p class="notfound_description">
                       <?php _e('The page you are looking for seems to be missing.Go back, or return to yourcompany.com to choose a new direction.Please report any broken links to our team.', 'unik')?>
                   </p>
                   <a class="btn  btn-notfound" href="javascript: history.go(-1)"><i class="fa fa-undo"></i><?php _e('Return to previous page', 'unik')?></a>
                </div>
            </div>
        </div>

<?php get_footer(); ?>
