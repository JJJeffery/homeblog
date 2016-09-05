<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fabthemes
 */
?>

	</div><!-- #content -->

	<div id="footer-widgets" class="clearfix">
		<div class="container"> <div class="row"> 
			<div class="col-md-4">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="col-md-4">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="col-md-4">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>						
		</div></div>
	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container"> <div class="row"> 
			<div class="site-info col-md-12">
			Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?> <br>
			<?php fflink(); ?> | <a href="http://fabthemes.com/<?php echo FT_scope::tool()->themeName ?>/" ><?php echo FT_scope::tool()->themeName ?> WordPress Theme</a>
			</div><!-- .site-info -->
		</div></div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

    <!-- Modal HTML -->
    <div id="search-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Search site</h3>
                </div>
                <div class="modal-body">
                   <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
