<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 Template name: Home
 * @package fabthemes
 */
get_header(); ?>

<!-- Slider section -->

<div id="intro-section">
	<div class="container"> <div class="row">

				<?php $intro_title  = ft_of_get_option('fabthemes_intro_title',''); ?>
				<?php $intro_text   = ft_of_get_option('fabthemes_intro_text',''); ?>
				<?php $intro_image  = ft_of_get_option('fabthemes_intro_pic',''); ?>
				<?php $intro_button = ft_of_get_option('fabthemes_intro_button',''); ?>
				<?php $intro_link   = ft_of_get_option('fabthemes_intro_link',''); ?>

		<div class="col-md-5 intro-pic">
				<?php $image = aq_resize( $intro_image, 460, 420, false,true,true ); //resize & crop the image ?>
				<?php if($image) : ?>
					 <img src="<?php echo $image ?>" alt=" " /> 
				<?php endif; ?>			
		</div>
		<div class="col-md-7 intro-box">
			<h2> <?php echo $intro_title ?> </h2>
			<p>  <?php echo $intro_text ?> </p>
			<a href="<?php echo $intro_link ?> "><?php echo $intro_button ?></a>
		</div>
	</div></div>
	
</div>

<!-- Features section -->

<div id="feature-section">
	<div class="container"><div class="row">

		<div class="col-md-4"> 
			<?php $feature_title1 = ft_of_get_option('fabthemes_feature_title1',''); ?>
			<?php $feature_text1 = ft_of_get_option('fabthemes_feature_text1',''); ?>
			<?php $feature_icon1 = ft_of_get_option('fabthemes_feature_icon1','fa-university'); ?>
			<?php $feature_url1 = ft_of_get_option('fabthemes_feature_url1',''); ?>
			<div class="home-feature">
				<span class="feature-icon">
					<i class="fa <?php echo $feature_icon1; ?>"></i>
				</span>
				<h2> <a href="<?php echo $feature_url1; ?>"> <?php echo $feature_title1; ?> </a></h2>
				<p> <?php echo $feature_text1; ?> </p>
			</div>
		</div>

		<div class="col-md-4">
			<?php $feature_title2 = ft_of_get_option('fabthemes_feature_title2',''); ?>
			<?php $feature_text2 = ft_of_get_option('fabthemes_feature_text2',''); ?>
			<?php $feature_icon2 = ft_of_get_option('fabthemes_feature_icon2','fa-university'); ?>
			<?php $feature_url2 = ft_of_get_option('fabthemes_feature_url2',''); ?>			
			<div class="home-feature">
				<span class="feature-icon">
					<i class="fa <?php echo $feature_icon2; ?>"></i>
				</span>
				<h2> <a href="<?php echo $feature_url2; ?>"> <?php echo $feature_title2; ?> </a> </h2>
				<p> <?php echo $feature_text2; ?>  </p>
			</div>			
		</div>

		<div class="col-md-4">
			<?php $feature_title3 = ft_of_get_option('fabthemes_feature_title3',''); ?>
			<?php $feature_text3 = ft_of_get_option('fabthemes_feature_text3',''); ?>
			<?php $feature_icon3 = ft_of_get_option('fabthemes_feature_icon3','fa-university'); ?>
			<?php $feature_url3 = ft_of_get_option('fabthemes_feature_url3',''); ?>				
			<div class="home-feature">
				<span class="feature-icon">
					<i class="fa <?php echo $feature_icon3; ?>"></i>
				</span>
				<h2> <a href="<?php echo $feature_url3; ?>">  <?php echo $feature_title3; ?> </a> </h2>
				<p> <?php echo $feature_text3; ?>  </p>
			</div>			
		</div>

	</div></div>
</div>

<!-- Buddypress items -->

<div id="bp-section">
	<div class="container"><div class="row">

		<div class="col-md-6">
			<div class="section-title">
				<h2> 
					<?php _e( 'Members ', 'fabthemes' );?>
					<span><?php _e( 'Most popular members  ', 'fabthemes' );?></span>
				</h2>
			</div>
			<div class="bp-members">
				<?php if ( bp_has_members( 'type=popular&max=8' ) ) : ?>    
					<ul class="clearfix">         
		                    <?php while ( bp_members() ) : bp_the_member(); ?>  

		                    <li class="bp-popover"> 
		                    	<a tabindex="0" class="bp-member"><?php bp_member_avatar('type=full&width=125&height=125') ?></a> 

								<div class="bp-home-title" style="display: none">
									<a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
								</div>              
								<div class="bp-home-content" style="display: none">
									<div>   
										<?php bp_member_last_active(); ?>

							          	<?php if ( bp_get_member_latest_update() ) : ?>
							               <span class="update"> <?php bp_member_latest_update(); ?></span>
							           	<?php endif; ?>

										<?php do_action( 'bp_directory_members_actions' ); ?> 
									</div>
								</div>  
		                    </li>

		                    <?php endwhile; ?>
				    </ul>
				<?php endif; ?>		
			</div>
		</div>

		<div class="col-md-6">
			<div class="section-title">
				<h2> 
					<?php _e( 'Groups ', 'fabthemes' );?>
					<span><?php _e( 'Most active groups ', 'fabthemes' );?></span>
				</h2>
			</div>	

			<div class="bp-groups">
				<?php if ( bp_has_groups('type=popular&max=8') ) : ?>
					<ul class="clearfix">
						<?php while ( bp_groups() ) : bp_the_group(); ?>
				 		<li class="bp-popover"> 
				            <a tabindex="0" class="bp-member"><?php bp_group_avatar( 'type=full&width=125&height=125' ) ?></a> 

							<div class="bp-home-title" style="display: none">
									<a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a>
								</div>              
								<div class="bp-home-content" style="display: none">
									<div>   
										<?php bp_group_type() ?> / <?php bp_group_member_count() ?>
										<?php bp_group_join_button() ?>
									</div>
								</div>  

				        </li>
			            <?php endwhile; ?>
				   </ul>
				<?php endif; ?>		
			</div>		
			
		</div>

	</div></div>
</div>

<!-- Latest posts -->

<div id="home-posts">
	<div class="container"><div class="row">

		<div class="col-md-12">
			<div class="section-title">
				<h2> <?php _e( 'Latest posts ', 'fabthemes' );?>
					<span><?php _e( 'Recent articles from our blog ', 'fabthemes' );?></span>
				</h2>
			</div>
		</div>
		<?php 
			
			$args = array( 'posts_per_page' => 3 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); 
		?>

		<div class="col-md-4">
			<div class="latest-entries">

				<?php 
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
				$image = aq_resize( $img_url, 960, 460, true,true,true ); //resize & crop the image
				?>
				<?php if($image) : ?>
					<a href="<?php the_permalink();?>"> <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /> </a>
				<?php endif; ?>

				<h2> <a href="<?php the_permalink();?>"> <?php the_title(); ?> </a></h2>
				<div class="entry-meta">
					<?php _e( 'Posted in ', 'fabthemes' );?> <?php the_category(', '); ?>
				</div>
				<?php the_excerpt(); ?>
			
			</div>
		</div>

		<?php 
			endwhile;
		    wp_reset_postdata();
		?>


	</div></div>
</div>

<?php get_footer(); ?>
