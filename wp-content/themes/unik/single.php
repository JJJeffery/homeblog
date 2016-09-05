<?php /** The Template for displaying all single posts. **/

get_header(); 
$get_meta = get_post_custom($post->ID);

$overridepos = isset($get_meta['_weblusive_sidebar_pos']) ? $get_meta['_weblusive_sidebar_pos'] : '';
$overridepos = (empty($overridepos)) ? 'default' : $overridepos[0];
$overridesidebar =  isset($get_meta['_weblusive_sidebar_post']) ? $get_meta['_weblusive_sidebar_post'] : '';
$overridesidebar = (empty($overridesidebar)) ? '' : $overridesidebar[0];

$sidebarPos = ($overridepos == 'default') ?  weblusive_get_option('sidebar_pos') : $overridepos;
$sidebar = ($overridesidebar == '') ?  weblusive_get_option('sidebar_post') : $overridesidebar;

$showdate = weblusive_get_option('blog_show_date'); 
$showcomments = weblusive_get_option('blog_show_comments'); 
$showauthor = weblusive_get_option('blog_show_author'); 

get_template_part( 'library/includes/page-head' ); 
get_template_part( 'inner-header', 'content'); 
?>

<div class="page-section row">
	<?php if (!empty($sidebar) && $sidebarPos=='left') :?><div class="col-md-4 side-div" ><?php get_sidebar($sidebar)?></div><?php endif; ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="<?php if (empty($sidebar) || $sidebarPos == 'full'):?>col-md-12<?php else:?>col-md-8<?php endif?>">
	
		<div class="single-post-container">
			<?php 
			$get_meta = get_post_custom($post->ID);
			$mediatype = isset($get_meta["_blog_mediatype"]) ? $get_meta["_blog_mediatype"][0] : 'image';
			$videoId = isset($get_meta["_blog_video"]) ? $get_meta["_blog_video"][0] : ''; 
			$autoplay =  isset($get_meta["_blog_videoap"]) ? $get_meta["_blog_videoap"][0] : '0';
			$thumbnail = get_the_post_thumbnail($post->ID, 'blog-single');
			?>
			<?php if ( $mediatype == "youtube" && $videoId):?>
				<iframe width="850" height="424" src="http://www.youtube.com/embed/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-youtube"></iframe>
			<?php elseif ( $mediatype == "vimeo" && $videoId):?>
				<iframe width="850" height="424" src="http://player.vimeo.com/video/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-vimeo"></iframe>
			<?php elseif ( $mediatype == "dailymotion" && $videoId):?>
				<iframe width="850" height="424" src="http://www.dailymotion.com/embed/video/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid dailymotion-vimeo"></iframe>
			<?php elseif ( $mediatype == "veoh" && $videoId):?>
				<iframe width="850" height="424" src="http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay=<?php echo $autoplay?>&permalinkId=<?php echo $videoId?>" class="vid iframe-veoh"></iframe>
			<?php elseif ( $mediatype == "bliptv" && $videoId):?>
				<iframe width="850" height="424" src="http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/<?php echo $videoId?>?autoplay=<?php echo $autoplay?>" class="vid iframe-bliptv"></iframe>
			<?php elseif ( $mediatype == "viddler" && $videoId):?>
				<iframe width="850" height="424" src="http://www.viddler.com/embed/<?php echo $videoId?>e/?f=1&offset=0&autoplay=<?php echo $autoplay?>" class="vid iframe-viddler"></iframe>
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
			<div class="single-post-content">
				<h1><?php the_title()?></h1>
				<ul class="post-tags">
					<?php if(!$showdate): ?>
						<li>
							<i class="fa fa-calendar-o"></i>
							<span><?php echo get_the_time('M d, Y'); ?></span>    
						</li>
					<?php endif; ?>
					<?php if(!$showauthor): ?>
						<li>
							<i class="fa fa-user"></i>
							<span><?php the_author() ?></span>    
						</li>
					<?php endif; ?>
					<?php if( 'open' == $post->comment_status && !$showcomments) : ?>
						 <li>
							 <i class="fa fa-comments"></i>                
							 <?php comments_popup_link( __( '0 comment', 'unik' ), __( '1 comment', 'unik' ), __( '% comments', 'unik' )); ?>                              
						 </li>
					<?php endif?>
				</ul>
				<?php the_content()?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'unik' ), 'after' => '</div>' ) ); ?>
	
				<div class="comment-section">
					<?php if( 'open' == $post->comment_status) comments_template(); ?>
					<?php $test = false; if ($test) {comment_form();} ?>
				</div>
			</div>
		</div>
	</div>
    <?php endwhile; ?>	
	<?php if (!empty($sidebar) && $sidebarPos=='right') :?><div class="col-md-4 side-div" ><?php get_sidebar($sidebar)?></div><?php endif; ?>
</div>
<?php get_footer(); ?>