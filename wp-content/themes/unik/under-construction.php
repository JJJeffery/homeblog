<?php /* Template Name: Under Construction */ ?>

<?php get_header();
if (weblusive_get_option('uc_launchdate')):
   $date = explode('/', weblusive_get_option('uc_launchdate'));
	?>
	<script type="text/javascript">
		jQuery(document).ready(function(){ 			
			jQuery('div.clock').countdown("<?php echo $date[0]?>/<?php echo $date[1]?>/<?php echo $date[2]?>", function(event) {
				var $this = jQuery(this);
				switch(event.type) {
					case "seconds":
					case "minutes":
					case "hours":
					case "days":
					case "weeks":
					case "daysLeft":
						$this.find('span#'+event.type).html(event.value);
					break;
					case "finished":
					$this.hide();
						break;
				}
			});
		}); 
	</script> 
	<?php 
endif;
?>

<?php
	$get_meta = get_post_custom($post->ID);
	$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
	get_template_part( 'library/includes/page-head' ); 
?>

<div class="fullwidth-box under-box" style="margin-left:0; padding:40px 0 !Important">
	<div  id="uc-content">
		<div class="row">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="col-md-12">
					<?php if(weblusive_get_option( 'uc_maintitle' )):?>
					<h1><?php echo weblusive_get_option( 'uc_maintitle' ) ?></h1>
					<?php endif?>
					<?php if(weblusive_get_option( 'uc_text' )):?>
					<div class="uc-text col-md-12">
						<?php echo weblusive_get_option( 'uc_text' ) ?>
					</div>
					<?php endif?>
					<?php if(weblusive_get_option( 'uc_progress' )):?>
					<div class="col-md-10 col-md-offset-1">
					<div class="progress progress-striped active">
						<div class="progress-bar progress-unik" style="width:<?php echo weblusive_get_option( 'uc_progress' )?>"><i class="fa fa-gears"></i></div>
					</div>
				</div>
				<?php endif?>
				<div class="row clock">                
					<div class="col-md-2">
						<p><span id="weeks"></span><?php _e('Weeks', 'unik')?></p>
					</div>
					<div class="col-md-2">
						<p><span id="daysLeft"></span><?php _e('Days', 'unik')?></p>
					</div>                    
					<div class="col-md-2">
						<p><span id="hours"></span><?php _e('Hours', 'unik')?></p>
					</div>
					<div class="col-md-2">
						<p><span id="minutes"></span><?php _e('Minutes', 'unik')?></p>
					</div>
					<div class="col-md-2">
						<p><span id="seconds"></span><?php _e('Seconds', 'unik')?></p>
					</div>
				</div>
				<div class="col-md-12"><?php the_content(); ?></div>
			<?php endwhile; ?>	
		</div>
	</div>
</div>
</div>
<?php get_footer();?>