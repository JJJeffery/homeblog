<?php
add_action('init', 'weblusive_slider_register');
 
function weblusive_slider_register() {
 
	$labels = array(
		'name' => 'Sliders',
		'singular_name' => 'Slider',
		'add_new_item' => 'Add New Slider',
	);
 
	$args = array(
		'labels' => $labels,
		'public' => false,
		'show_ui' => true,
		'menu_icon' => get_template_directory_uri().'/library/admin-panel/images/slider_items.png',
		'can_export' => true,
		'exclude_from_search' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 6,
		'rewrite' => array('slug' => 'slider'),
		'supports' => array('title')
	  ); 
 	   
	register_post_type( 'weblusive_slider' , $args );
}


add_action("admin_init", "weblusive_slider_init");
 
function weblusive_slider_init(){
  add_meta_box("weblusive_slider_slides", "Slides", "weblusive_slider_slides", "weblusive_slider", "normal", "high");
}
 

function weblusive_slider_slides(){
	global $post;
	$custom = get_post_custom($post->ID);
	$slider = isset ($custom["custom_slider"]) ? unserialize( $custom["custom_slider"][0]) : '';
  
	wp_enqueue_script( 'weblusive-admin-slider' );  
	wp_print_scripts('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
		
  ?>
  <script>
  jQuery(document).ready(function() {
  
	jQuery(function() {
		jQuery( "#weblusive-slider-items" ).sortable({placeholder: "ui-state-highlight"});
	});

	function custom_slider_uploader(field) {
		var button = "#upload_"+field;
		jQuery(button).click(function() {
			window.restore_send_to_editor = window.send_to_editor;
			tb_show('', 'media-upload.php?referer=weblusive-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0');
			weblusive_set_slider_img(field);
			return false;
		});

	}
	function weblusive_set_slider_img(field) {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			
			if(typeof imgurl == 'undefined') 
				imgurl = jQuery(html).attr('src');
			
			
			classes = jQuery('img', html).attr('class');
			if(typeof classes != 'undefined')
				id = classes.replace(/(.*?)wp-image-/, '');
			
			if(typeof classes == 'undefined'){ 
				classes = jQuery(html).attr('class');
				if(typeof classes != 'undefined')
					id = classes.replace(/(.*?)wp-image-/, '');
			}
			if (typeof nextCell === "undefined") var nextCell = 0;	
			jQuery('#weblusive-slider-items').append('<li id="listItem_'+ nextCell +'" class="ui-state-default"><div class="widget-content option-item"><p class="hint-title">Main parameters</p><div class="slider-img"><img src="'+imgurl+'" alt=""></div><label for="custom_slider['+ nextCell +'][caption]"><span style="float:left" >Slide Caption :</span><textarea name="custom_slider['+ nextCell +'][caption]" id="custom_slider['+ nextCell +'][caption]"></textarea></label><input id="custom_slider['+ nextCell +'][id]" name="custom_slider['+ nextCell +'][id]" value="'+id+'" type="hidden" /><a class="del-cat"></a></div></li>');
			nextCell ++ ;
			tb_remove();
			window.send_to_editor = window.restore_send_to_editor;
		}
	};
	
	custom_slider_uploader("add_slide");
	
});

  </script>
  
 <input id="upload_add_slide" type="button" class="mpanel-save" value="Add New Slide">

	<ul id="weblusive-slider-items">
	<?php
	if( $slider ){
	$i=0;
	foreach( $slider as $slide ):
		$i++; ?>
		<li id="listItem_<?php echo $i ?>"  class="ui-state-default zebra-table">
			<div class="widget-content option-item">
				<p class="hint-title">Main parameters</p>
				<div class="slider-img"><?php echo wp_get_attachment_image( $slide['id'] , 'thumbnail' );  ?></div>
				<label for="custom_slider[<?php echo $i ?>][caption]"><span style="float:left" >Slide text :</span><textarea name="custom_slider[<?php echo $i ?>][caption]" id="custom_slider[<?php echo $i ?>][caption]"><?php echo stripslashes($slide['caption']) ; ?></textarea></label>
				<label for="custom_slider[<?php echo $i ?>][link]">
					<span style="float:left" >Slide URL (Optional) :</span>
					<input type="text" name="custom_slider[<?php echo $i ?>][link]" id="custom_slider[<?php echo $i ?>][link]" value="<?php echo isset($slide['link']) ? stripslashes($slide['link']) : ''; ?>" />
				</label>
				<input id="custom_slider[<?php echo $i ?>][id]" name="custom_slider[<?php echo $i ?>][id]" value="<?php  echo $slide['id']  ?>" type="hidden" />
				<a class="del-cat"></a>
			</div>
		</li>
	<?php endforeach; 
	}else{
		echo ' <p> Use the button above to add slides.</p>';
	}?>
	</ul>
	<?php if( $slider ):?><script> var nextCell = <?php echo $i+1 ?> ;</script><?php endif?>
  <?php
}
 


add_action('save_post', 'save_slide');
function save_slide(){
  global $post;
  
  	if( isset($_POST['custom_slider']) && $_POST['custom_slider'] != "" ){
		update_post_meta($post->ID, 'custom_slider' , $_POST['custom_slider']);		
	}
	else{ 
		if (isset($post->ID))
		delete_post_meta($post->ID, 'custom_slider' );
	}
}


add_filter("manage_edit-weblusive_slider_columns", "weblusive_slider_edit_columns");
function weblusive_slider_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Title",
	"slides" => "Number of Slides",
    "date" => "Date",
  );
 
  return $columns;
}


add_action("manage_weblusive_slider_posts_custom_column",  "weblusive_slider_custom_columns");
function weblusive_slider_custom_columns($column){
	global $post;
	
	switch ($column) {
		case "slides":
			$custom_slider_args = array( 'post_type' => 'weblusive_slider', 'p' => $post->ID );
			$custom_slider = new WP_Query( $custom_slider_args );
			while ( $custom_slider->have_posts() ) {
				$number =0;
				$custom_slider->the_post();
				$custom = get_post_custom($post->ID);
				if( !empty($custom["custom_slider"][0])){
					$slider = unserialize( $custom["custom_slider"][0] );
					echo $number = count($slider);
				}
				else echo 0;
			}
		break;
	}
}

?>