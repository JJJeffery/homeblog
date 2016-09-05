<form action="<?php echo site_url() ?>" method="get" id="search-bar" class="search-widget">
	<input type="search" placeholder="<?php _e('Search here...', 'unik');?>" name="s" id="search" value="<?php the_search_query(); ?>">
	<button type="submit">
            <i class="fa fa-search"></i>
	</button>
</form>