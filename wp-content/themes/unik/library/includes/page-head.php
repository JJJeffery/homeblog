<?php
global $get_meta, $post;
if (empty($get_meta)) $get_meta = get_post_custom($post->ID);
if(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] != 'none' ):
	
	$orig_post = $post;
	
	if(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'promotext' ){
		if( !empty( $get_meta["_weblusive_promotext"][0] ) ){
			$promos = explode('*', $get_meta["_weblusive_promotext"][0]);
			$promonumber = count ($promos);
			?>
			<div id="banner" class="box-section">
					<ul class="headpromo">
						<?php for ($i=0; $i<$promonumber; $i++):?>
							<li>
								<p><?php echo  $promos[$i] ?></p>
							</li>
						<?php endfor?>
					</ul>
			</div>
		<?php }
	}
	/*
	elseif(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'revslider' ){
		$revslider =  $get_meta["_weblusive_revslider"][0];
		if( !empty($revslider) ){
			if (function_exists('putRevSlider'))
			{	
				echo '<div id="slider" class="revolution-slider">
						<div class="fullwidthbanner-container">
							<div class="fullwidthbanner">'.do_shortcode($revslider).'</div></div></div>';
			}
			else
			{
				'Please install the "Revolution slider" plugin to be able to display it on the page.';
			}
		}
	}
	 * 
	 */
	elseif(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'thumb' || (isset( $get_meta['_weblusive_post_head'][0]) && empty( $get_meta['_weblusive_post_head'][0] ) && weblusive_get_option( 'post_featured' ) ) ){
		?><div class="single-post-thumb">
			<?php the_post_thumbnail('full', array('class'=>'page-thumb') ); ?> 
		</div>
		<?php $thumb_caption = get_post(get_post_thumbnail_id())->post_excerpt;
			if( !empty($thumb_caption) ){ ?><div class="single-post-caption"><?php echo $thumb_caption ?></div> <?php 
		} 
	}
	elseif(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'lightbox' && has_post_thumbnail($post->ID)){

		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id,'large');  
		$image_url = $image_url[0];
	
		?>
		<div class="single-post-thumb head-lightbox">
			<a href="<?php echo $image_url; ?>" class="page-lightbox zoom" ><?php the_post_thumbnail('medium'); ?></a>
		</div>
		<?php $thumb_caption = get_post(get_post_thumbnail_id())->post_excerpt;
			if( !empty($thumb_caption) ){ ?><div class="single-post-caption"><?php echo $thumb_caption ?></div> <?php }
	}
	elseif(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'slider' && !empty( $get_meta['_weblusive_post_slider'][0] ) ){
		
		$speed = weblusive_get_option( 'slit_slider_speed' );
		$time = weblusive_get_option( 'slit_slider_time' );
	
		if( !$speed || $speed == ' ' || !is_numeric($speed))	$speed = 7000 ;
		if( !$time || $time == ' ' || !is_numeric($time))	$time = 600;
		
		$custom_slider_args = array( 'post_type' => 'weblusive_slider', 'p' => $get_meta['_weblusive_post_slider'][0] );
		$custom_slider = new WP_Query( $custom_slider_args );
		
		while ( $custom_slider->have_posts() ) : $custom_slider->the_post();
			$custom = get_post_custom($post->ID);
			$slider = isset ($custom["custom_slider"]) ? unserialize( $custom["custom_slider"][0]) : '';
			$number = count($slider);
				
		if( $slider ):?>
			<div id="slider" class="box-section">
				<div class="flexslider">
					<ul class="slides">
						<?php foreach( $slider as $slide ): ?>
							<li>
								<?php if( !empty( $slide['link'] ) ):?><a href="<?php echo $slide['link']?>"><?php endif?>
									<img src="<?php $image =  wp_get_attachment_image_src( $slide['id'], 'full'); echo $image[0] ?>" alt="<?php echo $slide['id'] ?>"/>
								<?php if( !empty( $slide['link'] ) ):?></a><?php endif?>
								<?php if( !empty( $slide['caption'] ) ):?>
									<p class="flex-caption"><?php echo stripslashes($slide['caption']) ; ?></p>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		<?php 
		else:
			?><p class="warning"><i class="icon-warning-sign"></i><?php _e('No slider items were found in the selected slider. Please make sure to create some via "Slider" section in your admin panel.', 'unik');?></p><?php
		endif;
	endwhile; ?>
<?php }

	$post = $orig_post;
	wp_reset_query();
	
 endif; ?>
