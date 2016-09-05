<?php /* Template Name: Contact Form */ 

get_header();

$get_meta = get_post_custom($post->ID);
$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
get_template_part( 'library/includes/page-head' ); 
get_template_part( 'inner-header', 'content'); 
$options = array(
		weblusive_get_option('contact_error'), 
		weblusive_get_option('contact_success'),
		weblusive_get_option('contact_subject'), 
		weblusive_get_option('contact_email'), 		
	);
$address = weblusive_get_option('contact_address'); 
if (!empty($address)):?>
<script type="text/javascript">   
jQuery(function(){
	jQuery('#map').gmap3({
		action: 'addMarker',
		address: "<?php echo htmlspecialchars($address)?>",
		infowindow:{
		options:{
			content: "<?php echo $address?>"
			},
			},
		map:{
			center: true,
			zoom: 14,
			},
		
		},
		{action: 'setOptions', args:[{scrollwheel:false}]}		
		);	  
	});
</script> 
<?php endif?> 
<?php if (!empty($address)):?>
	<div class="box-section map-section">
		<h2><?php _e('OUR LOCATION', 'unik')?></h2>
		<div id="map" class="gmap3 map_location map"></div>
	</div>
<?php endif?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="box-section contact-section">
	<h2><?php _e('Contact us', 'unik'); ?></h2>
    <form method="POST" class="contactForm" id="contact-form">
		<div id="status"></div>
        <div class="text-fields">
			<div class="float-input">
				<input type="text" placeholder="<?php _e('Name', 'unik')?>" name="name" id="name" />
                <span><i class="fa fa-user"></i></span>
                <?php if(isset($nameError) && $nameError != ''): ?><span class="errorarr"><?php echo $nameError;?></span><?php endif;?>
            </div>
            <div class="float-input">
				<input type="text" placeholder="<?php _e('E-mail', 'unik')?>" name="mail" id="mail" />
                <span><i class="fa fa-envelope-o"></i></span>
                <?php if(isset($emailError) && $emailError != ''): ?><span class="errorarr"><?php echo $emailError;?></span><?php endif;?>
            </div>
			<div class="float-input">
				<input type="text" placeholder="<?php _e('Website', 'unik')?>" name="website" id="website" />
                <span><i class="fa fa-link"></i></span>
            </div>
        </div>
		<div class="comment-area">
			<textarea name="comment" id="comment" placeholder="<?php _e('Message', 'unik')?>"></textarea>
            <?php if(isset($messageError) && $messageError != ''): ?><span class="errorarr"><?php echo $messageError;?></span><?php endif;?>
		</div>
        <div class="submit-area">
			<button type="submit" id="submit_contact" name="send">
				<i class="fa fa-envelope-o"></i>
				<?php _e('Send Now', 'unik')?>
			</button>
			<input type="hidden" name = "options" value="<?php echo implode('|', $options) ?>" />
		</div>
    </form>
</div>
<?php endwhile; ?>	
<script type="text/javascript">
<!-- Contact form validation
jQuery(document).ready(function(){

  jQuery(".contactForm").validate({
	submitHandler: function() {
	
		var postvalues =  jQuery("#contact-form").serialize();
		
		jQuery.ajax
		 ({
		   type: "POST",
		  url: "<?php echo get_template_directory_uri().'/contact.php'; ?>",
		   data: postvalues,
		   success: function(response)
		   {
		 	 jQuery("#status").html(response).show('normal');
		     jQuery('#comment, #mail, #name').val("");
		   }
		 });
		return false;
		
    },
	focusInvalid: true,
	focusCleanup: false,
	//errorLabelContainer: jQuery("#registerErrors"),
  	rules: 
	{
		name: {required: true},
		mail: {required: true, minlength: 6,maxlength: 50, email:true},
		comment: {required: true, minlength: 6}
	},
	
	messages: 
	{
		name: {required: "<?php _e( 'Name is required', 'unik' ); ?>"},
		mail: {required: "<?php _e( 'E-mail is required', 'unik' ); ?>", email: "<?php _e( 'Please provide a valid e-mail', 'unik' ); ?>", minlength:"<?php _e( 'E-mail address should contain at least 6 characters', 'unik' ); ?>"},
		comment: {required: "<?php _e( 'Message is required', 'unik' ); ?>"}
	},
	
	 errorPlacement: function(error, element) 
	{
		 error.insertAfter(element);
	},
	invalidHandler: function()
	{
		//jQuery("body").animate({ scrollTop: 0 }, "slow");
	}
	
});
});
-->
</script>


<?php get_footer(); ?>