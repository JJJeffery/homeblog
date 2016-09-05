<?php /*** The loop that displays posts.***/ 

$get_meta = get_post_custom($post->ID);
$blogLayout=  weblusive_get_option('blog_layout');
if (empty($blogLayout)) $blogLayout = 1;

//(isset($_GET['layout']))? $blogLayout=$_GET['layout'] : $blogLayout='';
//isset ($blogLayout) ? $blogLayout : $blogLayout=1;

$showdate = weblusive_get_option('blog_show_date'); 
$showcomments = weblusive_get_option('blog_show_comments'); 
$showauthor = weblusive_get_option('blog_show_author'); 
$showrmtext = weblusive_get_option('blog_show_rmtext'); 
$day = get_the_time('d'); $month = get_the_time('m'); $year = get_the_time('Y');
?>

<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'unik' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'unik' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php else:?>
 <?php if($blogLayout == 2 ):?><div class="row"><?php endif?>
	<?php while ( have_posts() ) : the_post(); ?>
        <?php $get_meta = get_post_custom($post->ID);		
		$mediatype = isset($get_meta["_blog_mediatype"]) ? $get_meta["_blog_mediatype"][0] : 'image';
		$videoId = isset($get_meta["_blog_video"]) ? $get_meta["_blog_video"][0] : ''; 
		$autoplay =  isset($get_meta["_blog_videoap"]) ? $get_meta["_blog_videoap"][0] : '0';
		$thumbnail = '';
		if ( has_post_thumbnail()) {
			$thumbnail  = get_the_post_thumbnail($post->ID, 'blog-list');
			if (empty($thumbnail)) $thumbnail = '<img src="http://placehold.it/310x223.png" alt="" />';
		}
		else {
			$thumbnail =  '<img src="http://placehold.it/310x223.png" alt="" />';
		}
	?>
     <!--1 columnn blog -->
	 
	 
    
<?php if($blogLayout==1) : ?>
<div id="post-<?php the_ID();?>" <?php post_class('blog-post'); ?>>
	<div class="post-box">
		<?php if(!$showdate || !$showauthor || !$showcomments):?>
			<ul class="post-tags">
				<?php if(!$showdate): ?>
					<li>
						<i class="fa fa-calendar-o"></i>
						<a href="<?php echo  get_day_link( $year, $month, $day ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
					</li>
				<?php endif; ?>
				<?php if(!$showauthor): ?>
					<li>
						<i class="fa fa-user"></i>
						<?php the_author_posts_link(); ?> 
					</li>
				<?php endif; ?>
				<?php if( 'open' == $post->comment_status && !$showcomments) : ?>
					 <li>
						 <i class="fa fa-comments"></i>                
						 <?php comments_popup_link( __( '0 comment', 'unik' ), __( '1 comment', 'unik' ), __( '% comments', 'unik' )); ?>                              
					 </li>
				<?php endif?>
			</ul>
		<?php endif?>
		<div class="post-gal" <?php if($showdate && $showauthor && $showcomments):?>style="width:100% !important"<?php endif?>>
		<?php if($mediatype== 'image' && !empty($thumbnail)):?>
            <a href="<?php the_permalink()?>"><?php echo $thumbnail; ?></a>
		<?php elseif ( $mediatype == "youtube" && $videoId):?>
			<iframe width="310" height="223" src="http://www.youtube.com/embed/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-youtube"></iframe>
		<?php elseif ( $mediatype == "vimeo" && $videoId):?>
			<iframe  width="310" height="223" src="http://player.vimeo.com/video/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-vimeo"></iframe>
		<?php elseif ( $mediatype == "dailymotion" && $videoId):?>
			<iframe  width="310" height="223" src="http://www.dailymotion.com/embed/video/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid dailymotion-vimeo"></iframe>
		<?php elseif ( $mediatype == "veoh" && $videoId):?>
			<iframe  width="310" height="223" src="http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay=<?php echo $autoplay?>&permalinkId=<?php echo $videoId?>" class="vid iframe-veoh"></iframe>
		<?php elseif ( $mediatype == "bliptv" && $videoId):?>
			<iframe  width="310" height="223" src="http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-bliptv"></iframe>
		<?php elseif ( $mediatype == "viddler" && $videoId):?>
			<iframe  width="310" height="223" src="http://www.viddler.com/embed/<?php echo $videoId?>e/?f=1&offset=0&autoplay=<?php echo $autoplay?>" class="vid iframe-viddler"></iframe>
		<?php elseif($mediatype== 'slider' && !empty($thumbnail)):?>
			<div class="flexslider">
				<ul class="slides">
					<?php 
					$argsThumb = array(
						'order'          => 'ASC',
						'post_type'      => 'attachment',
						'post_parent'    => $post->ID,
						'post_mime_type' => 'image',
						'post_status'    => null,
						//'exclude' => get_post_thumbnail_id()
					);
					$attachments = get_posts($argsThumb);
					if ($attachments) {
						foreach ($attachments as $attachment) {
							echo '<li><img src="'.wp_get_attachment_url($attachment->ID, 'full', false, false).'" alt="'.get_post_meta($attachment->ID, '_wp_attachment_image_alt', true).'" /></li>';
						}
					}?>
				</ul>
			</div>
		<?php endif?>
			<div class="hover-post">
				<a href="<?php the_permalink()?>"><?php echo (isset($showrmtext)&& !empty($showrmtext)) ? $showrmtext : 'Read More';?></a>
			</div>
		</div>
		<div class="post-content">
			<h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
			<?php echo do_shortcode(get_the_excerpt()); ?>
		</div>
	</div>
</div>
<?php elseif($blogLayout==2) :?>
<div class="col-md-6">
	<article id="post-<?php the_ID();?>" <?php post_class('blog-post'); ?>>
		<div class="post-box">
		<ul class="post-tags">
			<?php if(!$showdate): ?>
				<li>
					<i class="fa fa-calendar-o"></i>
					<a href="<?php echo  get_day_link( $year, $month, $day ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
				</li>
			<?php endif; ?>
			<?php if(!$showauthor): ?>
				<li>
					<i class="fa fa-user"></i>
					<?php the_author_posts_link(); ?>    
				</li>
			<?php endif; ?>
			<?php if( 'open' == $post->comment_status && !$showcomments) : ?>
				 <li>
					 <i class="fa fa-comments"></i>                
					 <?php comments_popup_link( __( 'No comments', 'unik' ), __( '1 comment', 'unik' ), __( '% comments', 'unik' )); ?>                              
				 </li>
			<?php endif?>
		</ul>
		<div class="post-gal">
		<?php if($mediatype== 'image' && !empty($thumbnail)):?>
            <a href="<?php the_permalink()?>"><?php echo $thumbnail; ?></a>
		<?php elseif ( $mediatype == "youtube" && $videoId):?>
			<iframe width="310" height="223" src="http://www.youtube.com/embed/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-youtube"></iframe>
		<?php elseif ( $mediatype == "vimeo" && $videoId):?>
			<iframe  width="310" height="223" src="http://player.vimeo.com/video/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-vimeo"></iframe>
		<?php elseif ( $mediatype == "dailymotion" && $videoId):?>
			<iframe  width="310" height="223" src="http://www.dailymotion.com/embed/video/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid dailymotion-vimeo"></iframe>
		<?php elseif ( $mediatype == "veoh" && $videoId):?>
			<iframe  width="310" height="223 src="http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay=<?php echo $autoplay?>&permalinkId=<?php echo $videoId?>" class="vid iframe-veoh"></iframe>
		<?php elseif ( $mediatype == "bliptv" && $videoId):?>
			<iframe  width="310" height="223" src="http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-bliptv"></iframe>
		<?php elseif ( $mediatype == "viddler" && $videoId):?>
			<iframe  width="310" height="223" src="http://www.viddler.com/embed/<?php echo $videoId?>e/?f=1&offset=0&autoplay=<?php echo $autoplay?>" class="vid iframe-viddler"></iframe>
		<?php elseif($mediatype== 'slider' && !empty($thumbnail)):?>
			<div class="flexslider">
				<ul class="slides">
					<?php 
					$argsThumb = array(
						'order'          => 'ASC',
						'post_type'      => 'attachment',
						'post_parent'    => $post->ID,
						'post_mime_type' => 'image',
						'post_status'    => null,
						//'exclude' => get_post_thumbnail_id()
					);
					$attachments = get_posts($argsThumb);
					if ($attachments) {
						foreach ($attachments as $attachment) {
							echo '<li><img src="'.wp_get_attachment_url($attachment->ID, 'full', false, false).'" alt="'.get_post_meta($attachment->ID, '_wp_attachment_image_alt', true).'" /></li>';
						}
					}?>
				</ul>
			</div>
		<?php endif?>
			<div class="hover-post">
				<a href="<?php the_permalink()?>"><?php echo (isset($showrmtext)&& !empty($showrmtext)) ? $showrmtext : 'Read More';?></a>
			</div>
		</div>
	</div>
	<h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
  </article>
</div>
<?php endif; ?>
	<?php endwhile;?>
         <?php if($blogLayout == 2 ):?></div><?php endif?>
<?php endif; ?>
<?php if ( $wp_query->max_num_pages > 1 ): ?>
	<div class="pagination-list">
		<?php include(unik_PLUGINS . '/wp-pagenavi.php' ); wp_pagenavi(); ?> 
	</div>
<?php endif?>