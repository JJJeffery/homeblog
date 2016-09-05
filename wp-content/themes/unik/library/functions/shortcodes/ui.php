<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
$fonturl = 'http://fortawesome.github.io/Font-Awesome/icons/';
$icondir = get_template_directory_uri().'/library/functions/shortcodes/images'; 
$hintimg = get_template_directory_uri().'/library/functions/shortcodes/images/smicon.png'; 


?>
<!DOCTYPE html>
<head>
	<?php 
	wp_print_scripts('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	do_action('admin_print_styles');
	
	?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/library/functions/shortcodes/main.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/library/admin-panel/js/colorpicker.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/library/admin-panel/js/tipsy.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/library/functions/shortcodes/tabs.js"></script>
	
	<script type="text/javascript" src="../../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	
	<script>
	jQuery(document).ready(function() {
		jQuery('.tooltip').tipsy({fade: true, gravity: 'n'});
	});
	</script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/library/admin-panel/style.css" type="text/css" media="all" />
	<link rel='stylesheet' href='shortcode.css' type='text/css' media='all' />
<?php $page = isset($_GET['page']) ? htmlentities($_GET['page']) : 'unik'; if( $page == 'unik' ){
?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('.tabs-1').jQueryTab({

				//classes settings
				tabClass:'uniktabs',                // class of the tabs
				accordionClass:'accordion_tabs',            // class of the header of accordion on smaller screens
				contentWrapperClass:'tab_content_wrapper',  // class of content wrapper
				contentClass:'tab_content',         // class of container
				activeClass:'active',               // name of the class used for active tab

				//feature settings
				responsive:true,                // enable accordian on smaller screens
				responsiveBelow:400,             // the breakpoint
				collapsible:true,               // allow all tabs to collapse on accordians
				useCookie: false,                // remember last active tab using cookie
				openOnhover: false,             // open tab on hover
				initialTab: 1,                  // tab to open initially; start count at 1 not 0

				//tabs transition settings      fade, flip, scaleUp, slideLeft, etc.
				tabInTransition: 'fadeIn',              // classname for showing in the tab content
				tabOutTransition: 'fadeOut',            // classname for hiding the tab content

				//accordion transition settings
				accordionTransition: 'slide',           // transitions to use - normal or slide
				accordionIntime:500,                // time for animation IN (1000 = 1s)
				accordionOutTime:400,               // time for animation OUT (1000 = 1s)

				//api functions
				before: function(){},               // function to call before tab is opened
				after: function(){}             // function to call after tab is opened

		});
		
		//jQuery('.tooltip').tipsy({fade: true, gravity: 'n'});
		});
		var shortcode = {
			e: '',
			init: function(e) {
				shortcode.e = e;
				
			},
			insert: function createUnikShortcode(e, page, dialogwidth, dialogheight) {
				e.windowManager.open({url : '<?php echo get_template_directory_uri()?>/library/functions/shortcodes/ui.php?page='+page, width : dialogwidth, height : dialogheight});
				//tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				//tinyMCEPopup.close();
			},
			quickinsert: function createQuickShortcode(e, tag){
				var output = '['+tag+']'+ '[/'+tag+']';
				e.execCommand('mceInsertContent', false, output);
			}
		}
		tinyMCEPopup.onInit.add(shortcode.init, shortcode);
	</script>
	<title>Unik shortcodes listing</title>
</head>
<body>
<form id="UnikShortcode">
	<div class="tabs-1">
		<ul class="uniktabs">
			<li><a href="#tab1">Layout</a></li>
			<li><a href="#tab2">Typography</a></li>
			<li><a href="#tab-copyright">Content</a></li>
			<li><a href="#tab4">Posts Listing</a></li>
			<li><a href="#tab5">Contact</a></li>
		</ul>
		<section class="tab_content_wrapper">
			<article class="tab_content" id="tab1">
				<ul class="shortcode-list">
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'row')" class="mo-help tooltip" title="Add Row">
							<figure>
								<img src="<?php echo $icondir?>/gfx-row.png" alt="Add Row" /> 
								<figcaption>Row</figcaption>
							</figure>
						</a>
					</li> 
					
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_whole')" class="mo-help tooltip" title="Add Full Width Column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-full-column.png" alt="Add Fullwidth column" /> 
								<figcaption>1/1 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_half')" class="mo-help tooltip" title="Add One half column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-half-column.png" alt="Add One half column" /> 
								<figcaption>1/2 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_third')" class="mo-help tooltip" title="Add One third column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-three-column.png" alt="Add One third column" /> 
								<figcaption>1/3 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_fourth')" class="mo-help tooltip" title="Add One fourth column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-fourth-column.png" alt="Add One fourth column" /> 
								<figcaption>1/4 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_sixth')" class="mo-help tooltip" title="Add One sixth column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-six-column.png" alt="Add One sixth column" /> 
								<figcaption>1/6 Column</figcaption>
							</figure>
						</a>
					</li> 
					
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'two_third')" class="mo-help tooltip" title="Add Two third column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-2-three-column.png" alt="Add Two third column" /> 
								<figcaption>2/3 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'three_fourth')" class="mo-help tooltip" title="Add Three fourth column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-3-four-column.png" alt="Add Three fourth column" /> 
								<figcaption>3/4 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'five_sixth')" class="mo-help tooltip" title="Add Five sixth column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-five-sixth-column.png" alt="Add Five sixth column" /> 
								<figcaption>5/6 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'five_twelveth')" class="mo-help tooltip" title="Add Five twelveth column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-five-twelve-column.png" alt="Add Five twelveth column" /> 
								<figcaption>5/12 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'seven_twelveth')" class="mo-help tooltip" title="Add Seven twelveth column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-seven-twelve-column.png" alt="Add Seven twelveth column" /> 
								<figcaption>7/12 Column</figcaption>
							</figure>
						</a>
					</li> 
				
					
				</ul>
				<div class="clear"></div>
			</article>
			<article class="tab_content" id="tab2">
				<ul class="shortcode-list">
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'tblock', 600, 480)" class="mo-help tooltip" title="Add heading title">
							<figure>
								<img src="<?php echo $icondir?>/tblock.png" alt="Add heading title" /> 
								<figcaption>Custom heading title</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'iconbox', 600, 600)" class="mo-help tooltip" title="Add Icon box">
							<figure>
								<img src="<?php echo $icondir?>/smicon.png" alt="Add Icon box" /> 
								<figcaption>Icon Box</figcaption>
							</figure>
						</a>
					</li>
					
				</ul>
				<div class="clear"></div>
			</article>
			<article class="tab_content" id="tab-copyright">
				<ul class="shortcode-list">
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'well', 600, 450)" class="mo-help tooltip" title="Add Content box">
							<figure>
								<img src="<?php echo $icondir?>/well.png" alt="Insert a well" /> 
								<figcaption>Content box</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'teammember', 800, 600)" class="mo-help tooltip" title="Add a team member">
							<figure>
								<img src="<?php echo $icondir?>/teammember.png" alt="Add a team member" /> 
								<figcaption>Team member</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'progress', 600, 450)" class="mo-help tooltip" title="Add Progress bar">
							<figure>
								<img src="<?php echo $icondir?>/progress.png" alt="Add Progress bar" /> 
								<figcaption>Progress bar</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'circle', 600, 450)" class="mo-help tooltip" title="Add Circular progress bar">
							<figure>
								<img src="<?php echo $icondir?>/circle.png" alt="Add Circular progress bar" /> 
								<figcaption>Circular progress bar</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'button', 600, 450)" class="mo-help tooltip" title="Add Regular button">
							<figure>
								<img src="<?php echo $icondir?>/button.png" alt="Add Regular button" /> 
								<figcaption>Standard Button</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'dropdown', 600, 450)" class="mo-help tooltip" title="Add Dropdown Button">
							<figure>
								<img src="<?php echo $icondir?>/dropdown.png" alt="Add Dropdown Button" /> 
								<figcaption>Dropdown Button</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'vernav', 600, 375)" class="mo-help tooltip" title="Add Vertical navigation">
							<figure>
								<img src="<?php echo $icondir?>/vernav.png" alt="Add Vertical navigation" /> 
								<figcaption>Vertical navigation</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'tabs', 600, 450)" class="mo-help tooltip" title="Add Tab">
							<figure>
								<img src="<?php echo $icondir?>/tabs.png" alt="Add Tab" /> 
								<figcaption>Tab</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'accordion', 600, 450)" class="mo-help tooltip" title="Add Accordion">
							<figure>
								<img src="<?php echo $icondir?>/accordion.png" alt="Add Accordion" /> 
								<figcaption>Accordion</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'testimonial', 800, 630)" class="mo-help tooltip" title="Add Testimonial">
							<figure>
								<img src="<?php echo $icondir?>/testimonial.png" alt="Add Testimonial" /> 
								<figcaption>Testimonial</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'alert', 600, 450)" class="mo-help tooltip" title="Add Alert box">
							<figure>
								<img src="<?php echo $icondir?>/alert.png" alt="Add Alert box" /> 
								<figcaption>Alert box</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'slider', 800, 600)" class="mo-help tooltip" title="Add Slider">
							<figure>
								<img src="<?php echo $icondir?>/slider.png" alt="Add Slider" /> 
								<figcaption>Slider</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'carousel', 600, 450)" class="mo-help tooltip" title="Add Carousel">
							<figure>
								<img src="<?php echo $icondir?>/carousel.png" alt="Add Carousel" /> 
								<figcaption>Carousel</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'panel', 600, 450)" class="mo-help tooltip" title="Insert a panel">
							<figure>
								<img src="<?php echo $icondir?>/panel.png" alt="Insert a panel" /> 
								<figcaption>Panel</figcaption>
							</figure>
						</a>
					</li>
					
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'fblock', 600, 450)" class="mo-help tooltip" title="Add featured block">
							<figure>
								<img src="<?php echo $icondir?>/fblock.png" alt="Add featured block" /> 
								<figcaption>Featured block</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'sblock', 600, 450)" class="mo-help tooltip" title="Add service block">
							<figure>
								<img src="<?php echo $icondir?>/promo.png" alt="Add service block" /> 
								<figcaption>Service block</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'flist', 600, 450)" class="mo-help tooltip" title="Add Feature List">
							<figure>
								<img src="<?php echo $icondir?>/flist.png" alt="Add Feature List" /> 
								<figcaption>Feature List</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'reveal', 600, 450)" class="mo-help tooltip" title="Add modal box">
							<figure>
								<img src="<?php echo $icondir?>/reveal.png" alt="Add modal box" /> 
								<figcaption>Modal box</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'social', 600, 450)" class="mo-help tooltip" title="Add Social Button">
							<figure>
								<img src="<?php echo $icondir?>/social.png" alt="Add Social Button" /> 
								<figcaption>Social Button</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'audio', 600, 450)" class="mo-help tooltip" title="Add audio">
							<figure>
								<img src="<?php echo $icondir?>/audio.png" alt="Add audio" /> 
								<figcaption>Audio</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'video', 600, 450)" class="mo-help tooltip" title="Add video">
							<figure>
								<img src="<?php echo $icondir?>/video.png" alt="Add video" /> 
								<figcaption>Video</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'shvideo', 600, 450)" class="mo-help tooltip" title="Add Self hosted video">
							<figure>
								<img src="<?php echo $icondir?>/shvideo.png" alt="Add Self hosted video" /> 
								<figcaption>Self Hosted Video</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'pricingtable', 600, 450)" class="mo-help tooltip" title="Add pricing Table">
							<figure>
								<img src="<?php echo $icondir?>/table.png" alt="Add Pricing Table" /> 
								<figcaption>Pricing Table</figcaption>
							</figure>
						</a>
					</li>
					
				
				</ul>
				<div class="clear"></div>
			</article>
			<article class="tab_content" id="tab4">
				<ul class="shortcode-list">
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'portlisting', 600, 450)" class="mo-help tooltip" title="Add Portfolio posts listing">
							<figure>
								<img src="<?php echo $icondir?>/portlist.png" alt="Add Portfolio posts listing" /> 
								<figcaption>Portfolio Listing</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'bloglisting', 600, 450)" class="mo-help tooltip" title="Add Blog posts listing">
							<figure>
								<img src="<?php echo $icondir?>/blog.png" alt="Add Blog posts listing" /> 
								<figcaption>Post Listing</figcaption>
							</figure>
						</a>
					</li>
				</ul>
				<div class="clear"></div>
			</article>
			<article class="tab_content" id="tab5">
				<ul class="shortcode-list">
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'contact', 600, 450)" class="mo-help tooltip" title="Add Contact details">
							<figure>
								<img src="<?php echo $icondir?>/contact.png" alt="Add Contact details" /> 
								<figcaption>Contact details</figcaption>
							</figure>
						</a>
					</li>
				</ul>
				<div class="clear"></div>
				
			</article>
		</section>
	</div>
</form>
<!--/*************************************/ -->

<?php
} elseif( $page == 'panel' ){
?>
	<script type="text/javascript">
		var AddPanel = {
			e: '',
			init: function(e) {
				AddPanel.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var PanelContent = jQuery('#PanelContent').val();
                var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();

				var output = '[panel ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					
				output += ']'+PanelContent+'[/panel]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddPanel.init, AddPanel);

	</script>
	<title>Add Panel</title>

</head>
<body>
<form id="GalleryShortcode">
     <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>	
	<p>
		<label for="PanelContent">Content </label>
		<textarea id="PanelContent" name="PanelContent" col="20"></textarea>
	</p>
        <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:AddPanel.insert(AddPanel.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'well' ){
?>
	<script type="text/javascript">
		var well = {
			e: '',
			init: function(e) {
				well.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var boxbg=jQuery('#boxphoto0-img').val();
				var WellContent = jQuery('#WellContent').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();

				var output = '[well ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if (boxbg){
					output+= 'boxbg="'+boxbg+'" ';
				}
				output += ']'+WellContent+'[/well]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(well.init, well);

	</script>
	<title>Add Content Box</title>

</head>
<body>
<form id="GalleryShortcode">
      <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
     <div class="wrap-list">
			<label for="upload_boxphoto0_button">Block Photo:</label>
			<input id="boxphoto0-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="boxphoto0" value="" />
			<input id="upload_boxphoto0_button" type="button" class="small_button" value="Upload" />
			<div id="boxphoto0-preview" class="img-preview" <?php if(!weblusive_get_option('boxphoto0')) echo 'style="display:none;"' ?>>
				<img src="<?php if(weblusive_get_option('boxphoto0')) echo weblusive_get_option('boxphoto0'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
				<a class="del-img" title="Delete"></a>
			</div>
			<div class="clear"></div>
		</div>   
	<p>
		<label for="WellContent">Content : </label>
		<textarea id="WellContent" name="WellContent" col="20"></textarea>
	</p>
        <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:well.insert(well.e)">Insert</a></div>
<!--/*************************************/ -->
<?php } elseif( $page == 'progress' ){
?>
	<script type="text/javascript">
		var AddProgress = {
			e: '',
			init: function(e) {
				AddProgress.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				var ProgressColor = jQuery('#ProgressColor').val();
				var ProgressAnim = jQuery('#ProgressAnim').val();
				var ProgressStyle = jQuery('#ProgressStyle').val();
				var ProgressMeter = jQuery('#ProgressMeter').val();
				var ProgressTitle = jQuery('#ProgressTitle').val();
				var CustomColor = jQuery('#ProgressCustomColor').val();
				var output = '[progressbar ';
					if(anim){
							output+=' anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					
					if(ProgressColor) {
						output += 'color="'+ProgressColor+'" ';
					}
					if(ProgressMeter) {
						output += 'meter="'+ProgressMeter+'" ';
					}
					if(ProgressAnim) {
						output += 'animated="'+ProgressAnim+'" ';
					}
					
					if(ProgressStyle) {
						output += 'style="'+ProgressStyle+'" ';
					}
					if(ProgressTitle) {
						output += 'title="'+ProgressTitle+'" ';
					}
					if(CustomColor) {
						output += 'customcolor="'+CustomColor+'" ';
					}
					
				
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddProgress.init, AddProgress);

	</script>
	<title>Add Progress bar</title>

</head>
<body>
<form id="GalleryShortcode">
	<script> 
		jQuery(function(){
			jQuery("#animcontent").load("animation.html"); 
			jQuery("#ProgressType").change(function(){
				var selected = jQuery('#ProgressType').val();
				if (selected == 'bars-slim'){
					jQuery("#pi-wrapper").hide();
				}
				else{
					jQuery("#pi-wrapper").show();
				}
			});
		});
    </script>
    <p id="animcontent"></p>
	
        <p>
		<label for="ProgressColor">Color :</label>
		<select id="ProgressColor" name="ProgressColor">
			<option value="">Default</option>
			<option value="progress-bar-info">Info</option>
			<option value="progress-bar-success">Success</option>
			<option value="progress-bar-danger">Danger</option>
			<option value="progress-bar-warning">Warning</option>
		</select>
	</p>
	<p>
		<label for="ProgressCustomColor">Custom color :</label>
		<div id="ProgressCustomColorcolorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="ProgressCustomColor" id="ProgressCustomColor" type="text" value="" />			
		<script>
			jQuery(document).ready(function() {
				jQuery('#ProgressCustomColorcolorSelector').ColorPicker({
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#ProgressCustomColorcolorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#ProgressCustomColor').val('#'+hex);
					}
				});
			});
		</script>
	</p>
	<p>
		<label for="ProgressStyle">Style :</label>
		<select id="ProgressStyle" name="ProgressStyle">
			<option value="">Regular</option>
			<option value="progress-striped">Striped</option>	
		</select>
	</p>
	<p>
		<label for="ProgressAnim">Animated :</label>
		<select id="ProgressAnim" name="ProgressAnim">
			<option value="">No</option>
			<option value="active">Yes</option>
		</select>
	</p>
	
	
	<p>
		<label for="ProgressMeter">Progress meter :</label>
		<select id="ProgressMeter" name="ProgressMeter">
			<option value="1">1%</option>
			<option value="2">2%</option>
			<option value="3">3%</option>
			<option value="4">4%</option>
			<option value="5">5%</option>
			<option value="6">6%</option>
			<option value="7">7%</option>
			<option value="8">8%</option>
			<option value="9">9%</option>
			<option value="10">10%</option>
			<option value="11">11%</option>
			<option value="12">12%</option>
			<option value="13">13%</option>
			<option value="14">14%</option>
			<option value="15">15%</option>
			<option value="16">16%</option>
			<option value="17">17%</option>
			<option value="18">18%</option>
			<option value="19">19%</option>
			<option value="20">20%</option>
			<option value="21">21%</option>
			<option value="22">22%</option>
			<option value="23">23%</option>
			<option value="24">24%</option>
			<option value="25">25%</option>
			<option value="26">26%</option>
			<option value="27">27%</option>
			<option value="28">28%</option>
			<option value="29">29%</option>
			<option value="30">30%</option>
			<option value="31">31%</option>
			<option value="32">32%</option>
			<option value="33">33%</option>
			<option value="34">34%</option>
			<option value="35">35%</option>
			<option value="36">36%</option>
			<option value="37">37%</option>
			<option value="38">38%</option>
			<option value="39">39%</option>
			<option value="40">40%</option>
			<option value="41">41%</option>
			<option value="42">42%</option>
			<option value="43">43%</option>
			<option value="44">44%</option>
			<option value="45">45%</option>
			<option value="46">46%</option>
			<option value="47">47%</option>
			<option value="48">48%</option>
			<option value="49">49%</option>
			<option value="50">50%</option>
			<option value="51">51%</option>
			<option value="52">52%</option>
			<option value="53">53%</option>
			<option value="54">54%</option>
			<option value="55">55%</option>
			<option value="56">56%</option>
			<option value="57">57%</option>
			<option value="58">58%</option>
			<option value="59">59%</option>
			<option value="60">60%</option>
			<option value="61">61%</option>
			<option value="62">62%</option>
			<option value="63">63%</option>
			<option value="64">64%</option>
			<option value="65">65%</option>
			<option value="66">66%</option>
			<option value="67">67%</option>
			<option value="68">68%</option>
			<option value="69">69%</option>
			<option value="70">70%</option>
			<option value="71">71%</option>
			<option value="72">72%</option>
			<option value="73">73%</option>
			<option value="74">74%</option>
			<option value="75">75%</option>
			<option value="76">76%</option>
			<option value="77">77%</option>
			<option value="78">78%</option>
			<option value="79">79%</option>
			<option value="80">80%</option>
			<option value="81">81%</option>
			<option value="82">82%</option>
			<option value="83">83%</option>
			<option value="84">84%</option>
			<option value="85">85%</option>
			<option value="86">86%</option>
			<option value="87">87%</option>
			<option value="88">88%</option>
			<option value="89">89%</option>
			<option value="90">90%</option>
			<option value="91">91%</option>
			<option value="92">92%</option>
			<option value="93">93%</option>
			<option value="94">94%</option>
			<option value="95">95%</option>
			<option value="96">96%</option>
			<option value="97">97%</option>
			<option value="98">98%</option>
			<option value="99">99%</option>
			<option value="100">100%</option>
		</select>
	</p>
	<p>
		<label for="ProgressTitle">Title :</label>
		<input id="ProgressTitle" name="ProgressTitle" type="text" value="" />
	</p>
	
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:AddProgress.insert(AddProgress.e)">Insert</a></div>
<!--/*************************************/ --> 

<?php } elseif( $page == 'circle' ){
?>
	<script type="text/javascript">
		var circle = {
			e: '',
			init: function(e) {
				circle.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
               
				var meter = jQuery('#meter').val();
				var title = jQuery('#title').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
		
				var output = '[circle ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					
					if(meter) {
						output += 'meter="'+meter+'" ';
					}
					if(title) {
						output += 'title="'+title+'" ';
					}
					/*if(size) {
						output += 'size="'+size+'" ';
					}*/
                                				
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(circle.init, circle);

	</script>
	<title>Add Circle Progress bar</title>

</head>
<body>
<form id="GalleryShortcode">
     <script> 
    jQuery(function(){
		jQuery("#animcontent").load("animation.html"); 
		
	});
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="meter">Progress meter :</label>
		<select id="meter" name="meter">
			<option value="1">1%</option>
			<option value="2">2%</option>
			<option value="3">3%</option>
			<option value="4">4%</option>
			<option value="5">5%</option>
			<option value="6">6%</option>
			<option value="7">7%</option>
			<option value="8">8%</option>
			<option value="9">9%</option>
			<option value="10">10%</option>
			<option value="11">11%</option>
			<option value="12">12%</option>
			<option value="13">13%</option>
			<option value="14">14%</option>
			<option value="15">15%</option>
			<option value="16">16%</option>
			<option value="17">17%</option>
			<option value="18">18%</option>
			<option value="19">19%</option>
			<option value="20">20%</option>
			<option value="21">21%</option>
			<option value="22">22%</option>
			<option value="23">23%</option>
			<option value="24">24%</option>
			<option value="25">25%</option>
			<option value="26">26%</option>
			<option value="27">27%</option>
			<option value="28">28%</option>
			<option value="29">29%</option>
			<option value="30">30%</option>
			<option value="31">31%</option>
			<option value="32">32%</option>
			<option value="33">33%</option>
			<option value="34">34%</option>
			<option value="35">35%</option>
			<option value="36">36%</option>
			<option value="37">37%</option>
			<option value="38">38%</option>
			<option value="39">39%</option>
			<option value="40">40%</option>
			<option value="41">41%</option>
			<option value="42">42%</option>
			<option value="43">43%</option>
			<option value="44">44%</option>
			<option value="45">45%</option>
			<option value="46">46%</option>
			<option value="47">47%</option>
			<option value="48">48%</option>
			<option value="49">49%</option>
			<option value="50">50%</option>
			<option value="51">51%</option>
			<option value="52">52%</option>
			<option value="53">53%</option>
			<option value="54">54%</option>
			<option value="55">55%</option>
			<option value="56">56%</option>
			<option value="57">57%</option>
			<option value="58">58%</option>
			<option value="59">59%</option>
			<option value="60">60%</option>
			<option value="61">61%</option>
			<option value="62">62%</option>
			<option value="63">63%</option>
			<option value="64">64%</option>
			<option value="65">65%</option>
			<option value="66">66%</option>
			<option value="67">67%</option>
			<option value="68">68%</option>
			<option value="69">69%</option>
			<option value="70">70%</option>
			<option value="71">71%</option>
			<option value="72">72%</option>
			<option value="73">73%</option>
			<option value="74">74%</option>
			<option value="75">75%</option>
			<option value="76">76%</option>
			<option value="77">77%</option>
			<option value="78">78%</option>
			<option value="79">79%</option>
			<option value="80">80%</option>
			<option value="81">81%</option>
			<option value="82">82%</option>
			<option value="83">83%</option>
			<option value="84">84%</option>
			<option value="85">85%</option>
			<option value="86">86%</option>
			<option value="87">87%</option>
			<option value="88">88%</option>
			<option value="89">89%</option>
			<option value="90">90%</option>
			<option value="91">91%</option>
			<option value="92">92%</option>
			<option value="93">93%</option>
			<option value="94">94%</option>
			<option value="95">95%</option>
			<option value="96">96%</option>
			<option value="97">97%</option>
			<option value="98">98%</option>
			<option value="99">99%</option>
			<option value="100">100%</option>
		</select>
	</p>
	<p>
		<label for="title">Title :</label>
		<input id="title" name="title" type="text" value="" />
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:circle.insert(circle.e)">Insert</a></div>
    <!--/*************************************/ -->
<?php } elseif( $page == 'dropdown' ){ ?>

	<script type="text/javascript">
		var DropdownButton = {
			e: '',
			init: function(e) {
				DropdownButton.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
			
				var output = "[dropbuttongroup ";
				var Type = jQuery('#Type').val();
				var Title = jQuery('#Title').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				
				if(Type) {
					output+= ' type="'+Type+'"';
				}
				
				if(Title) {
					output+= ' title="'+Title+'"';
				}
				
				output += "]";
				
				jQuery("input[id^=dropbutton_title]").each(function(intIndex, objValue) {
				
					output +='[dropbutton';
					output += ' title="'+jQuery(this).val()+'"';
					var obj1 = jQuery('input[id^=dropbutton_url]').get(intIndex);
					output += ' url= "'+obj1.value+'"';
					
					var obj2 = jQuery('select[id^=dropbutton_divider]').get(intIndex);
					output += ' divider= "'+obj2.value+'"]';
										
					var obj = jQuery('input[id^=Content]').get(intIndex);
					output += obj.value;
					output += "[/dropbutton]";
				});
				
				
				output += '[/dropbuttongroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(DropdownButton.init, DropdownButton);

		jQuery(document).ready(function() {
			jQuery("#add-dropbutton").click(function() {
				jQuery('#DropbuttonShortcodeContent').append('<p><label for="dropbutton_title[]">Item Title</label><input id="dropbutton_title[]" name="dropbutton_title[]" type="text" value="" /></p><p><label for="dropbutton_url[]">Item URL</label><input id="dropbutton_url[]" name="dropbutton_url[]" type="text" value="" /></p><p><label for="Content[]">Item Content</label><input id="Content[]" name="Content[]" type="text" value="" /></p><p><label for="dropbutton_divider[]">Insert divider after item</label><select id="dropbutton_divider[]" name="dropbutton_divider[]"><option value="0">No</option><option value="1">Yes</option></select></p>	<hr class="divider" />');
			});
		});
		
	</script>
	<title>Add Dropdown button</title>

</head>
<body>
<form id="DropbuttonShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<div id="DropbuttonShortcodeContent">
		<p>
			<label for="Title">Title</label>
			<input id="Title" name="Title" type="text" value="" />
		</p>
		<p>
			<label for="Type">Type :</label>
			<select id="Type" name="Type">
				<option value="">Default</option>
				<option value="split">Split</option>
			</select>		
		</p>
		 <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
		<hr class="divider" />
		<p>
			<label for="dropbutton_title[]">Item Title</label>
			<input id="dropbutton_title[]" name="dropbutton_title[]" type="text" value="" />
		</p>
		<p>
			<label for="dropbutton_url[]">Item URL</label>
			<input id="dropbutton_url[]" name="dropbutton_url[]" type="text" value="" />
		</p>
		<p>
			<label for="Content[]">Item Content</label>
			<input id="Content[]" name="Content[]" type="text" value="" />
		</p>
		<p>
			<label for="dropbutton_divider[]">Insert divider after item</label>
			<select id="dropbutton_divider[]" name="dropbutton_divider[]">
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>	
		</p>
		<hr class="divider" />
	</div>
    
	<strong><a style="cursor: pointer;" id="add-dropbutton">+ Add Item</a></strong>
   
</form>
<div class="mce-foot"><a class="add" href="javascript:DropdownButton.insert(DropdownButton.e)">Insert</a></div>
<!--/*************************************/ --> 

<?php
} elseif( $page == 'button' ){
 ?>
 	<script type="text/javascript">
		var AddButton = {
			e: '',
			init: function(e) {
				AddButton.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var ButtonColor = jQuery('#ButtonColor').val();
				var ButtonSize = jQuery('#ButtonSize').val();				
				var ButtonLink = jQuery('#ButtonLink').val();
				var ButtonStatus = jQuery('#ButtonStatus').val();
				var ButtonText = jQuery('#ButtonText').val();
				var ButtonTarget = jQuery('#ButtonTarget').val();
				var ButtonIcon = jQuery('#ButtonIcon').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
                                
				var output = '[button ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					if(ButtonColor) {
						output += 'color="'+ButtonColor+'" ';
					}
					if(ButtonSize) {
						output += 'size="'+ButtonSize+'" ';
					}
					
					if(ButtonStatus){
						output += 'status="'+ButtonStatus+'" ';
					}
					
					if(ButtonLink) {
						output += 'link="'+ButtonLink+'" ';
					} 
					if(ButtonIcon){
							output += 'icon="'+ButtonIcon+'" ';
					}
					if(ButtonTarget) {
						output += 'target="_blank" ';
					}

				output += ']'+ButtonText+'[/button]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddButton.init, AddButton);

	</script>
	<title>Add Buttons</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="ButtonColor">Button Color:</label>
		<select id="ButtonColor" name="ButtonColor">
			<option value="btn-default">Default</option>
			<option value="btn-primary">Primary</option>
			<option value="btn-info">Info</option>
			<option value="btn-success">Success</option>
			<option value="btn-warning">Warning</option>
			<option value="btn-danger">Danger</option>
		</select>
	</p>
	<p>
		<label for="ButtonSize">Button Size :</label>
		<select id="ButtonSize" name="ButtonSize">		
			<option value="">Default</option>
            <option value="btn-lg">Large</option>
			<option value="btn-sm">Small</option>
			<option value="btn-xs">Very Small</option>	
		</select>
	</p>        
        <p>
		<label for="ButtonStatus">Button Status:</label>
		<select id="ButtonStatus" name="ButtonStatus">
			<option value="">Enabled</option>
			<option value="disabled">Disabled</option>
		</select>
	</p>
        
	<p>
		<label for="ButtonLink">Button Link :</label>
		<input id="ButtonLink" name="ButtonLink" type="text" value="http://" />
	</p>
	<p>
		<label for="ButtonTarget">Open Link in a new window : </label>
		<input id="ButtonTarget" name="ButtonTarget" type="checkbox"  />
	</p>
	<p>
		<label for="ButtonText">Button Text :</label>
		<input id="ButtonText" name="ButtonText" type="text" value="" />
	</p>
    <p>
		<label for="ButtonIcon">Button Icon :</label>
		<input id="ButtonIcon" name="ButtonIcon" type="text" value=""/>
        <small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:AddButton.insert(AddButton.e)">Insert</a></div>
<!--/*************************************/ -->

<!--/*************************************/ -->

<?php } elseif( $page == 'tabs' ){ ?>

	<script type="text/javascript">
		var tabs = {
			e: '',
			init: function(e) {
				tabs.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var position=jQuery('#position').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				
				var output = '[tabgroup position="'+position+'" ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					output+= ']';
				jQuery("input[id^=tab_title]").each(function(intIndex, objValue) {
                    var icon=jQuery('input[id^=tab_icon]').get(intIndex);
					output +='[tab title="'+jQuery(this).val()+'" icon="'+icon.value+'"]';
					var obj = jQuery('textarea[id^=Content]').get(intIndex);
					output += obj.value;
					output += "[/tab]";
				});
				
				
				output += '[/tabgroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(tabs.init, tabs);

		jQuery(document).ready(function() {
			jQuery("#add-tab").click(function() {
				jQuery('#TabShortcodeContent').append('<p><label for="tab_title[]">Tab Title</label><input id="tab_title[]" name="tab_title[]" type="text" value="" /></p><p><label for="tab_icon[]">Tab Icon</label><input id="tab_icon[]" name="tab_icon[]" type="text" value="" /><small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small> </p><p><label for="Content[]">Tab Content</label><textarea  style="height:100px;  width:400px;" id="Content[]" name="Content[]" type="text" value=""></textarea></p>	<hr class="divider" />');
			});
		});

	</script>
	<title>Add Tabs</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
    <p>
        <label for="position">Tab Position</label>
        <select id="position" name="position">
            <option value="horizontal-tabs-box">Horizontal</option>
            <option value="vertical-tabs-box">Vertical</option>
        </select>
    </p>
	<div id="TabShortcodeContent">
		<p>
			<label for="tab_title[]">Tab Title</label>
			<input id="tab_title[]" name="tab_title[]" type="text" value="" />
		</p>
			<p>
			<label for="tab_icon[]">Tab Icon</label>
			<input id="tab_icon[]" name="tab_icon[]" type="text" value="" />
					<small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>

		</p>
		<p>
			<label for="Content[]">Tab Content</label>
			<textarea style="height:100px; width:400px;" id="Content[]" name="Content[]" type="text" value="" ></textarea>
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-tab">+ Add Tab</a></strong>
    <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:tabs.insert(tabs.e)">Insert</a></div>
<!--/*************************************/ -->
<?php } elseif( $page == 'vernav' ){ ?>

	<script type="text/javascript">
		var vernav = {
			e: '',
			init: function(e) {
				vernav.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
			
				var output = "[vernavgroup";
				
				var maintitle = jQuery('#vntitle').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				if (anim){
					output+= ' anim="'+anim+'" ';
				}
				if(addclass){
					output+=' class="'+addclass+'" ';
				}

				if(maintitle) {
					output += ' title="'+maintitle+'" ';
				}
				output += "]";
				
				jQuery("input[id^=vernav_title]").each(function(intIndex, objValue) {
					output +='[vernav title="'+jQuery(this).val()+'" ';
					var obj2 = jQuery('input[id^=vernav_link]').get(intIndex);
					output += 'link= "'+obj2.value+'"]';
					output += "[/vernav]";
				});
				
				
				output += '[/vernavgroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(vernav.init, vernav);

		jQuery(document).ready(function() {
			jQuery("#add-vernav").click(function() {
				jQuery('#VernavShortcodeContent').append('<p><label for="vernav_title[]">Title</label><input id="vernav_title[]" name="vernav_title[]" type="text" value="" /></p><p><label for="vernav_link[]">URL</label><input id="vernav_link[]" name="vernav_link[]" type="text" value="" /></p>	<hr class="divider" />');
			});
		});

	</script>
	<title>Add Vertical Navigation</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<div id="VernavShortcodeContent">
		<p>
			<label for="vntitle">Header title</label>
			<input id="vntitle" name="vntitle" type="text" value="" />
		</p>
		<hr class="divider" />
		<p>
			<label for="vernav_title[]">Title</label>
			<input id="vernav_title[]" name="vernav_title[]" type="text" value="" />
		</p>
		<p>
			<label for="vernav_link[]">URL</label>
			<input id="vernav_link[]" name="vernav_link[]" type="text" value="" />
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-vernav">+ Add Navigation item</a></strong>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />	
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:vernav.insert(vernav.e)">Insert</a></div>
<!--/*************************************/ -->


<?php } elseif( $page == 'toggle' ){ ?>

	<script type="text/javascript">
		var toggle = {
			e: '',
			init: function(e) {
				toggle.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
                                
				var output = "[togglegroup";
					var anim=jQuery('#anim').val();
					var addclass=jQuery('#class').val();
                                
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
				output+= ']';
				jQuery("input[id^=toggle_title]").each(function(intIndex, objValue) {
					output +='[toggle title="'+jQuery(this).val()+'"]';
					var obj = jQuery('textarea[id^=Content]').get(intIndex);
					output += obj.value;
					output += "[/toggle]";
				});
				
				
				output += '[/togglegroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(toggle.init, toggle);

		jQuery(document).ready(function() {
			jQuery("#add-toggle").click(function() {
				jQuery('#ToggleShortcodeContent').append('<p><label for="toggle_title[]">Toggle Title</label><input id="toggle_title[]" name="toggle_title[]" type="text" value="" /></p><p><label for="Content[]">Toggle Content</label><textarea  style="height:100px;  width:400px;" id="Content[]" name="Content[]" type="text" value=""></textarea></p>	<hr class="divider" />');
			});
		});

	</script>
	<title>Add Toggle</title>

</head>
<body>
<form id="TogglesShortcode">
     <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<div id="ToggleShortcodeContent">
		<p>
			<label for="toggle_title[]">Toggle Title</label>
			<input id="toggle_title[]" name="toggle_title[]" type="text" value="" />
		</p>
		<p>
			<label for="Content[]">Toggle Content</label>
			<textarea style="height:100px; width:400px;" id="Content[]" name="Content[]" type="text" value="" ></textarea>
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-toggle">+ Add Toggle</a></strong>
    <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:toggle.insert(toggle.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'accordion' ){ ?>

	<script type="text/javascript">
		var accordion = {
			e: '',
			init: function(e) {
				accordion.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();

				var output = '[accordiongroup  ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				output+= ']';
				jQuery("input[id^=accordion_title]").each(function(intIndex, objValue) {
					output +='[accordion title="'+jQuery(this).val()+'" ]';
					var obj = jQuery('textarea[id^=Content]').get(intIndex);
					output += obj.value;
					output += "[/accordion]";
				});
				
				output += '[/accordiongroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
			}
		}
		tinyMCEPopup.onInit.add(accordion.init, accordion);

		jQuery(document).ready(function() {
			jQuery("#add-accordion").click(function() {
				jQuery('#accordionShortcodeContent').append('<p><label for="accordion_title[]">accordion Title</label><input id="accordion_title[]" name="accordion_title[]" type="text" value="" /></p><p><label for="Content[]">accordion Content</label><textarea  style="height:100px;  width:400px;" id="Content[]" name="Content[]" type="text" value=""></textarea></p>	<hr class="divider" />');
			});
		});

	</script>
	<title>Add accordion</title>

</head>
<body>
<form id="accordionsShortcode">
     <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
    	<div id="accordionShortcodeContent">
		<p>
			<label for="accordion_title[]">Title</label>
			<input id="accordion_title[]" name="accordion_title[]" type="text" value="" />
		</p>
		
		<p>
			<label for="Content[]">Content</label>
			<textarea style="height:100px; width:400px;" id="Content[]" name="Content[]" type="text" value="" ></textarea>
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-accordion">+ Add accordion tab</a></strong>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:accordion.insert(accordion.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'testimonial' ){ ?>
	<script type="text/javascript">
		
		var Testimonial = {
			e: '',
			init: function(e) {
				Testimonial.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
				
				var output = '[testimonialgroup ';
				
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				output+= ']';
				jQuery("input[id^=authorName]").each(function(intIndex, objValue) {
					output +='[testimonial title="'+jQuery(this).val()+'"';
					var position = jQuery('input[id^=authorPosition]').get(intIndex);
					if (position) output += ' position="'+position.value+'"';
					
					var company = jQuery('input[id^=authorCompany]').get(intIndex);
					if (company) output += ' company="'+company.value+'"';
										
					var photoholder = '#authorphoto'+intIndex+'-img';
					var photo=jQuery(photoholder).val();
					if(photo) output+=' photo="'+photo+'"';
					
					output += "]";
					var obj = jQuery('textarea[id^=Content]').get(intIndex);
					output += obj.value;
					output += "[/testimonial]";
					
				});
				
				
				output += '[/testimonialgroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
			}
		}
		tinyMCEPopup.onInit.add(Testimonial.init, Testimonial);
		jQuery(document).ready(function() {
			var counter = 0;
			var photo = '';
			jQuery("#add-testimonial").click(function() {
				counter++;
				photo = 'authorphoto' + counter;
				
				weblusive_styling_uploader(photo);
				jQuery('#testimonialShortcodeContent').append('<p><label for="authorName[]">Author Name</label><input id="authorName[]" name="authorName[]" type="text" value="" /></p><p><label for="authorPosition[]">Author Position</label><input id="authorPosition[]" name="authorPosition[]" type="text" value="" /></p><p><label for="authorCompany[]">Author Company</label><input id="authorCompany[]" name="authorCompany[]" type="text" value="" /></p><div class="wrap-list"><label for="upload_authorphoto'+counter+'_button">Author Photo:</label><input id="authorphoto'+counter+'-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="authorphoto'+counter+'" value="" /><input id="upload_authorphoto'+counter+'_button" type="button" class="small_button" value="Upload" /><div id="authorphoto'+counter+'-preview" class="img-preview" <?php if(!weblusive_get_option('authorphoto')) echo 'style="display:none;"' ?>><img src="<?php if(weblusive_get_option('authorphoto')) echo weblusive_get_option('authorphoto'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" /><a class="del-img" title="Delete"></a></div><div class="clear"></div></div><p><label for="Content[]">Text</label><textarea  style="height:100px;  width:400px;" id="Content[]" name="Content[]" type="text" value=""></textarea></p><hr class="divider" />');
			});
		});
	
	</script>
	<title>Insert Testimonial</title>
</head>
<body>
<form id="GalleryShortcode">
     <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
	<hr class="divider" />
	<div id="testimonialShortcodeContent">
		<p>
			<label for="authorName[]">Author Name</label>
			<input id="authorName[]" name="authorName[]" type="text" value="" />
		</p>
		<p>
			<label for="authorPosition[]">Author Position</label>
			<input id="authorPosition[]" name="authorPosition[]" type="text" value="" />
		</p>
		<p>
			<label for="authorCompany[]">Author Company</label>
			<input id="authorCompany[]" name="authorCompany[]" type="text" value="" />
		</p>
		
		<div class="wrap-list">
			<label for="upload_authorphoto0_button">Author Photo:</label>
			<input id="authorphoto0-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="authorphoto0" value="" />
			<input id="upload_authorphoto0_button" type="button" class="small_button" value="Upload" />
			<div id="authorphoto0-preview" class="img-preview" <?php if(!weblusive_get_option('authorphoto0')) echo 'style="display:none;"' ?>>
				<img src="<?php if(weblusive_get_option('authorphoto0')) echo weblusive_get_option('authorphoto0'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
				<a class="del-img" title="Delete"></a>
			</div>
			<div class="clear"></div>
		</div>
		<p>
			<label for="Content[]">Text : </label>
			<textarea id="Content[]" name="Content[]" col="20"></textarea>
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-testimonial">+ Add another testimonial</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:Testimonial.insert(Testimonial.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'alert' ){ ?>

	<script type="text/javascript">
		var alert = {
			e: '',
			init: function(e) {
				alert.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
                            
                var alertTitle=jQuery('#alertTitle').val();
				var alertType = jQuery('#alertType').val();
				var Content = jQuery('#Content').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();

				
				var output = '[alert ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if(alertTitle){
					output+= 'title="'+alertTitle+'" ';
				}
				if(alertType) {
					output += 'type="'+alertType+'"';
				}
			
				output += ']'+Content+'[/alert]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(alert.init, alert);

	</script>
	<title>Add Alert box</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="alertType">Type :</label>
		<select id="alertType" name="alertType">
			<option value="alert-danger">Danger</option>
			<option value="alert-success">Success</option>
			<option value="alert-warning">Warning</option>
			<option value="alert-info">Info</option>
		</select>
	</p>
	<p>
		<label for="alertTitle">Title :</label>
		<input type="text" id="alertTitle" name="alertTitle" />
	</p>
	<p>
		<label for="Content">Content : </label>
		<textarea id="Content" name="Content" col="20"></textarea>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:alert.insert(alert.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'slider' ){ ?>
	
	<script type="text/javascript">
		var Slider = {
			e: '',
			init: function(e) {
				Slider.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				var auto = jQuery('#auto').val();
				var interval = jQuery('#interval').val(); 
				
				var output = "[slider ";
			
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if(auto) {
					output += ' automatic="'+auto+'"';
				}
				if(interval) {
					output += ' interval="'+interval+'"';
				}
				output += "]";
				
				jQuery("input[id^=slide_title]").each(function(intIndex, objValue) {
					output +='[slideritem title="'+jQuery(this).val()+'"';
					//var obj = jQuery('input[id^=slide_image]').get(intIndex);
					var photoholder = '#slideimage'+intIndex+'-img';
					var photo=jQuery(photoholder).val();
					if(photo) output+=' image="'+photo+'"]';
					
					//output += ' image="'+ obj.value +'"]';
					output += "[/slideritem]";
				});
				
				output += '[/slider]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(Slider.init, Slider);

		jQuery(document).ready(function() {
			
			var counter = 0;
			var photo = '';
			
			jQuery("#interval-holder").hide();
			jQuery("#auto").change(function(){
				var selected = jQuery('#auto').val();
				if (selected == 'true'){
					jQuery("#interval-holder").show();
				}
				else{
					jQuery("#interval-holder").hide();
				}
			});
			
			jQuery("#add-slide").click(function() {
				counter++;
				photo = 'slideimage' + counter;
				weblusive_styling_uploader(photo);
				jQuery('#SlideShortcodeContent').append('<p><label for="slide_title[]">Slide Title</label><input id="slide_title[]" name="slide_title[]" type="text" value="" /></p><div class="wrap-list"><label for="upload_slideimage'+counter+'_button">Slide image:</label><input id="slideimage'+counter+'-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="slideimage'+counter+'" value="" /><input id="upload_slideimage'+counter+'_button" type="button" class="small_button" value="Upload" /><div id="slideimage'+counter+'-preview" class="img-preview" <?php if(!weblusive_get_option('slideimage')) echo 'style="display:none;"' ?>><img src="<?php if(weblusive_get_option('slideimage')) echo weblusive_get_option('slideimage'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" /><a class="del-img" title="Delete"></a></div><div class="clear"></div></div>	<hr class="divider" />');
			});
		});
		
	</script>
	<title>Add Slider</title>

</head>
<body>

<form id="SliderShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    
	<div id="SlideShortcodeContent">
		<p id="animcontent"></p>
		<p>
			<label for="auto">Automatic sliding</label>
			<select id="auto" name="auto">
				<option value="false">No</option>
				<option value="true">Yes</option>
			</select>
		</p>
		<p id="interval-holder">
			<label for="interval">Interval</label>
			<select id="interval" name="interval">
				<option value="1000">1 Seconds</option>
				<option value="2000">2 Seconds</option>
				<option value="3000">3 Seconds</option>
				<option value="4000">4 Seconds</option>
				<option value="5000">5 Seconds</option>
				<option value="6000">6 Seconds</option>
				<option value="7000" selected="selected">7 Seconds</option>
				<option value="8000">8 Seconds</option>
				<option value="9000">9 Seconds</option>
				<option value="10000">10 Seconds</option>
				<option value="11000">11 Seconds</option>
				<option value="12000">12 Seconds</option>
				<option value="13000">13 Seconds</option>
				<option value="14000">14 Seconds</option>
				<option value="15000">15 Seconds</option>
				<option value="16000">16 Seconds</option>
				<option value="17000">17 Seconds</option>
				<option value="18000">18 Seconds</option>
				<option value="19000">19 Seconds</option>
				<option value="20000">20 Seconds</option>
			</select>
		</p>
		<p>
			<label for="class">Extra Class</label>
			<input id="class" name="class" type="text" value="" />
		</p>
		<hr class="divider" />
		<p>
			<label for="slide_title[]">Slide Title</label>
			<input id="slide_title[]" name="slide_title[]" type="text" value="" />
		</p>
		
		<div class="wrap-list">
			<label for="upload_slideimage0_button">Slide image:</label>
			<input id="slideimage0-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="slideimage0" value="" />
			<input id="upload_slideimage0_button" type="button" class="small_button" value="Upload" />
			<div id="slideimage0-preview" class="img-preview" <?php if(!weblusive_get_option('slideimage0')) echo 'style="display:none;"' ?>>
				<img src="<?php if(weblusive_get_option('slideimage0')) echo weblusive_get_option('slideimage0'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
				<a class="del-img" title="Delete"></a>
			</div>
			<div class="clear"></div>
		</div>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-slide">+ Add Slide</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:Slider.insert(Slider.e)">Insert</a></div>

<?php } elseif( $page == 'carousel' ){ ?>
	
	<script type="text/javascript">
		var Carousel = {
			e: '',
			init: function(e) {
				Carousel.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
			
				var output = "[carousel ";
				var type=jQuery('#carouselType').val();
				var auto = jQuery('#carouselAuto').val();
				var interval = jQuery('#carouselInterval').val(); 
				var slwidth = jQuery('#carouselWidth').val();
                var slmargin = jQuery('#carouselMargin').val();
				var min = jQuery('#carouselMin').val();
				var max = jQuery('#carouselMax').val();
				var anim=jQuery('#anim').val();
				var showarrows=jQuery('#showarrows').val(); 
				var addclass=jQuery('#class').val();
				
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}	
				
				if(type) {
					output += 'type="'+type+'" ';
				}
				
				if(auto) {
					output += ' automatic="'+auto+'"';
				}
				if(interval) {
					output += ' interval="'+interval+'"';
				}
				if(min) {
					output += ' min="'+min+'"';
				}
				if(max) {
					output += ' max="'+max+'"';
				}
				if(slwidth) {
					output += ' slwidth="'+slwidth+'"';
				}
				if(slmargin) {
					output += ' slmargin="'+slmargin+'"';
				}
				if(showarrows){
					output+=' showarrows="'+showarrows+'" ';
				}
                               
				output += "]";
				
				jQuery("textarea[id^=carousel_content]").each(function(intIndex, objValue) {
					output +='[caritem]'+jQuery(this).val()+'[/caritem]';
				});
				
				output += '[/carousel]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(Carousel.init, Carousel);

		jQuery(document).ready(function() {
			jQuery("#interval-holder").hide();
			jQuery("#carouselAuto").change(function(){
				var selected = jQuery('#carouselAuto').val();
				if (selected == 'true'){
					jQuery("#interval-holder").show();
				}
				else{
					jQuery("#interval-holder").hide();
				}
			});
			jQuery("#add-carousel").click(function() {
				jQuery('#SlideShortcodeContent').append('<p><label for="carousel_content[]">Slide Content</label><textarea id="carousel_content[]" name="carousel_content[]" type="text" value="" ></textarea><hr /></p>');
			});
		});
		
	</script>
	<title>Add Carousel slide</title>

</head>
<body>

<form id="CarouselShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<div id="SlideShortcodeContent">
		<p>
			<label for="carouselType">Type</label>
			<select id="carouselType" name="carouselType">
				<option value="">Default</option>
				<option value="brands">Brand slider</option>
			</select>
		</p>
		<p>
			<label for="carouselAuto">Automatic sliding</label>
			<select id="carouselAuto" name="carouselAuto">
				<option value="false">No</option>
				<option value="true">Yes</option>
			</select>
		</p>
		<p id="interval-holder">
			<label for="carouselInterval">Interval</label>
			<select id="carouselInterval" name="carouselInterval">
				<option value="1000">1 Seconds</option>
				<option value="2000">2 Seconds</option>
				<option value="3000" selected="selected">3 Seconds</option>
				<option value="4000">4 Seconds</option>
				<option value="5000">5 Seconds</option>
				<option value="6000">6 Seconds</option>
				<option value="7000">7 Seconds</option>
				<option value="8000">8 Seconds</option>
				<option value="9000">9 Seconds</option>
				<option value="10000">10 Seconds</option>
				<option value="11000">11 Seconds</option>
				<option value="12000">12 Seconds</option>
				<option value="13000">13 Seconds</option>
				<option value="14000">14 Seconds</option>
				<option value="15000">15 Seconds</option>
				<option value="16000">16 Seconds</option>
				<option value="17000">17 Seconds</option>
				<option value="18000">18 Seconds</option>
				<option value="19000">19 Seconds</option>
				<option value="20000">20 Seconds</option>
			</select>
		</p>
		<p>
			<label for="carouselMin">Min. visible items</label>
			<input id="carouselMin" name="carouselMin" type="text" value="1" />
		</p>
		<p>
			<label for="carouselMax">Max. visible items</label>
			<input id="carouselMax" name="carouselMax" type="text" value="6" />
		</p>
		 <p>
			<label for="carouselWidth">Slide width</label>
			<input id="carouselWidth" name="carouselWidth" type="text" value="" />
		</p>
		<p>
			<label for="carouselMargin">Slide margin</label>
			<input id="carouselMargin" name="carouselMargin" type="text" value="" />
		</p>
		<p>
			<label for="showarrows">Show arrows</label>
			<select id="showarrows" name="hidearrows">
				<option value="true">Yes</option>
				<option value="false">No</option>
			</select>
		</p>
		<p>
			<label for="carousel_content[]">Slide Content</label>
			<textarea id="carousel_content[]" name="carousel_content[]" type="text" value="" ></textarea>
		</p>
		<p>
			<label for="class">Extra Class</label>
			<input id="class" name="class" type="text" value="" />
		</p>
		<hr />
	</div>
	<strong><a style="cursor: pointer;" id="add-carousel">+ Add slide</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:Carousel.insert(Carousel.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'contact' ){ ?>
	<script type="text/javascript">
		
		var Contact = {
			e: '',
			init: function(e) {
				Contact.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var address = jQuery('#Contactaddress').val();
				var tel = jQuery('#Contacttel').val();
				var email = jQuery('#Contactemail').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				
				var output = '[contact ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if(address) {
					output += 'address="'+address+'" ';
				}
				
				if(tel) {
					output += 'tel="'+tel+'" ';
				}
                
				if(email) {
					output += 'email="'+email+'" ';
				}
                
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(Contact.init, Contact);

	</script>
	<title>Insert contact details</title>

</head>
<body>

<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="Contactaddress">Address</label>
		<input id="Contactaddress" name="Contactaddress" type="text" value="" />
	</p>
	<p>
		<label for="Contacttel">Telephone</label>
		<input id="Contacttel" name="Contacttel" type="text" value="" />
	</p>
        
	<p>
		<label for="Contactemail">E-mail</label>
		<input id="Contactemail" name="Contactemail" type="text" value="" />
	</p>

	
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:Contact.insert(Contact.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif($page=='fblock') {?>
    <script type="text/javascript">
        var fblock={
            e: '',
            init: function(e){
                fblock.e=e,
                tinyMCEPopup.resizeToInnerSize();
            },
            insert: function createGalleryShortcode(e){
                var Type=jQuery('#fblockType').val();
                var Title=jQuery('#fblockTitle').val();
				var Icon=jQuery('#fblockIcon').val();
                var Image=jQuery('#blockphoto0-img').val();
                var Fcontent=jQuery('#fblockContent').val();
                var Link=jQuery('#fblockLink').val();
				var LinkCaption=jQuery('#fblockLinkCaption').val();
				var color=jQuery('#fblockCustomColor').val();
				
                var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
		
                var output='[fblock ';
				if(Type){
                    output+=' type="'+Type+'"';
                }
                if (anim){
                    output+= ' anim="'+anim+'" ';
                }
                if(addclass){
                    output+=' class="'+addclass+'" ';
                }
               if (color){
                    output+= ' color="'+color+'" ';
                }
                if(Title){
                    output+=' title="'+Title+'"';
                }
				if(Icon){
                    output+=' icon="'+Icon+'"';
                }
                if(Image){
                    output+=' image="'+Image+'"';
                }
                
                if(Link){
                    output+=' link="'+Link+'"';
                }
				if(LinkCaption){
                    output+=' linkcaption="'+LinkCaption+'"';
                }
                
                output+=']'+Fcontent+'[/fblock]';
                tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		tinyMCEPopup.close();
            }
        }
        tinyMCEPopup.onInit.add(fblock.init, fblock);
    </script>
    <title>Insert Featured Block</title>
</head>
<body>
    <form id="GalleryShortcode">
         <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="fblockType">Block Type:</label>
		<select id="fblockType" name="fblockType">
			<option value="1">Default</option>
			<option value="2">Service</option>
			<option value="3">Alternative</option>
		</select>
	</p>
	<p>
		<label for="fblockCustomColor">Custom color :</label>
		<div id="fblockCustomColorcolorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="fblockCustomColor" id="fblockCustomColor" type="text" value="" />			
		<script>
			jQuery(document).ready(function() {
				jQuery('#fblockCustomColorcolorSelector').ColorPicker({
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#fblockCustomColorcolorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#fblockCustomColor').val('#'+hex);
					}
				});
			});
		</script>
	</p>
	<p>
		<label for="fblockTitle">Block Title:</label>
		<input type="text" id="fblockTitle">
	</p>
	 <p>
		<label for="fblockIcon">Block Icon:</label>
		<input type="text" id="fblockIcon">
		<small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>
	</p>
	 <div class="wrap-list">
			<label for="upload_blockphoto0_button">Block Photo:</label>
			<input id="blockphoto0-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="blockphoto0" value="" />
			<input id="upload_blockphoto0_button" type="button" class="small_button" value="Upload" />
			<div id="blockphoto0-preview" class="img-preview" <?php if(!weblusive_get_option('blockphoto0')) echo 'style="display:none;"' ?>>
				<img src="<?php if(weblusive_get_option('blockphoto0')) echo weblusive_get_option('blockphoto0'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
				<a class="del-img" title="Delete"></a>
			</div>
			<div class="clear"></div>
		</div>
	<p>
		<label for="fblockContent">Block Content:</label>
		<textarea id="fblockContent" style="width:200px; height:50px"></textarea>
		<small>This field is optional</small>
	</p>
	<p>
		<label for="fblockLink">Block Link:</label>
		<input type="text" id="fblockLink">
	</p>
	<p>
		<label for="fblockLinkCaption">Block Link caption:</label>
		<input type="text" id="fblockLinkCaption">
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:fblock.insert(fblock.e)">Insert</a></div>
<!--/*************************************/ -->
<?php } elseif($page=='sblock') {?>
    <script type="text/javascript">
        var sblock={
            e: '',
            init: function(e){
                sblock.e=e,
                tinyMCEPopup.resizeToInnerSize();
            },
            insert: function createGalleryShortcode(e){
				var Type=jQuery('#sblockType').val();
				var color=jQuery('#CustomColor').val();
                var Title=jQuery('#sblockTitle').val();
                var Icon=jQuery('#sblockIcon').val();
				var Count=jQuery('#statCount').val();
                var Link=jQuery('#sblockLink').val();
				var LinkCaption=jQuery('#sblockLinkCaption').val();
				
                var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
		
                var output='[sblock ';
				if (Type){
                    output+= ' type="'+Type+'" ';
                }
                if (anim){
                    output+= ' anim="'+anim+'" ';
                }
                if(addclass){
                    output+=' class="'+addclass+'" ';
                }
				if (color){
                    output+= ' color="'+color+'" ';
                }
                if(Title){
                    output+=' title="'+Title+'"';
                }
                if(Icon){
                    output+=' icon="'+Icon+'"';
                }
                if(Count){
                    output+=' count="'+Count+'"';
                }
                if(Link){
                    output+=' link="'+Link+'"';
                }
				if(LinkCaption){
                    output+=' linkcaption="'+LinkCaption+'"';
                }
                
                output+='/]';
                tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		tinyMCEPopup.close();
            }
        }
        tinyMCEPopup.onInit.add(sblock.init, fblock);
    </script>
    <title>Insert Service Block</title>
</head>
<body>
    <form id="GalleryShortcode">
         <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="sblockType">Block Type:</label>
		<select id="sblockType" name="sblockType">
			<option value="1">Type 1</option>
			<option value="2">Type 2</option>
			<option value="stat">Statistic</option>
		</select>
	</p>
	<p>
		<label for="CustomColor">Custom color :</label>
		<div id="CustomColorcolorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="CustomColor" id="CustomColor" type="text" value="" />			
		<script>
			jQuery(document).ready(function() {
				jQuery('#CustomColorcolorSelector').ColorPicker({
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#CustomColorcolorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#CustomColor').val('#'+hex);
					}
				});
			});
		</script>
	</p>
	<p>
		<label for="sblockTitle">Block Title:</label>
		<input type="text" id="sblockTitle">
	</p>
	 
	 <p>
		<label for="sblockIcon">Block Icon:</label>
		<input type="text" id="sblockIcon">
		<small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>
	</p>
	<p>
		<label for="statCount">Statistic count</label>
		<input id="statCount" type="text">
		<small>Only for statistic type</small>
	</p>
	<p>
		<label for="sblockLink">Block Link:</label>
		<input type="text" id="sblockLink">
	</p>
	<p>
		<label for="sblockLinkCaption">Block Link caption:</label>
		<input type="text" id="sblockLinkCaption">
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:sblock.insert(sblock.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif($page=='tblock'){ ?>
<script type="text/javascript">
    var tblock={
        e:'',
        init:function(e){
            tblock.e=e;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert:function createGalleryShortcode(e){
            var Title=jQuery('#tblockTitle').val();
            var anim=jQuery('#anim').val();
            var addclass=jQuery('#class').val();
            var output='[tblock ';
            if (anim){
                output+= 'anim="'+anim+'" ';
            }
            if(addclass){
                output+='class="'+addclass+'" ';
            }
            if(Title){
                output+=' title="'+Title+'"';
            }
            output+='/]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    }
    tinyMCEPopup.onInit.add(tblock.init, tblock);
</script>
<title>Add Title Block</title>
</head>
<body>
    <form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
        <p>
            <label for="tblockTitle">Title:</label>
            <input type="text" id="tblockTitle">
        </p>
        <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:tblock.insert(tblock.e)">Insert</a></div>
<!--/*************************************/ -->



<?php } elseif($page=='iconbox'){ ?>
<script type="text/javascript">
    var iconbox={
        e:'',
        init:function(e){
            iconbox.e=e;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert:function createGalleryShortcode(e){

			var Icon=jQuery('#tblockIcon').val();
			var link=jQuery('#link').val();
			var anim=jQuery('#anim').val();
            var addclass=jQuery('#extraclass').val();
			
            var output='[iconbox ';
            if (anim){
                output+= ' anim="'+anim+'" ';
            }
			if (addclass){
                output+= ' class="'+addclass+'" ';
            }
			if (link){
                output+= ' link="'+link+'" ';
            }
			
            if(Icon){
                output+=' icon="'+Icon+'"';
            }

            output+='/]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    }
    tinyMCEPopup.onInit.add(iconbox.init, iconbox);
</script>
<title>Add Icon box</title>
</head>
<body>
<form id="GalleryShortcode">
	<script> 
	jQuery(function(){
	  jQuery("#animcontent").load("animation.html"); 
	});
	</script>
	<p id="animcontent"></p>
	
	<p>
		<label for="tblockIcon"> Icon:</label>
		<input type="text" id="tblockIcon">
		<small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>
	</p>
	<p>
		<label for="link">Link</label>
		<input type="text" id="link" name="link">
	</p>
	<p>
		<label for="extraclass">Extra class</label>
		<input type="text" id="extraclass" name="extraclass">
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:iconbox.insert(iconbox.e)">Insert</a></div>
<!--/*************************************/ -->




<?php } elseif($page=='reveal') { ?>
<script type="text/javascript">
    var reveal={
        e:'',
        init:function(e){
            reveal.e=e;
            tinyMcePopup.resizeToInnerSize();
        },
        insert: function createGalleryShortcode(e){
            var ButtonColor = jQuery('#ButtonColor').val();
            var Buttonsize = jQuery('#Buttonsize').val();
            var Buttontext = jQuery('#Buttontext').val();
            var RevTitle = jQuery('#revTitle').val();
            var RevContent = jQuery('#revContent').val();
            var addclass=jQuery('#class').val();
            
            var output = '[reveal ';
         
            if(addclass){
                output+='class="'+addclass+'" ';
            }
            if(ButtonColor) {
                output += ' color="'+ButtonColor+'" ';
            }
            if(Buttonsize) {
                output += ' size="'+Buttonsize+'" ';
            }
           
            if(Buttontext){
                output+=' button="'+Buttontext+'"';
            }
           
            if(RevTitle){
                output+=' revtitle="'+RevTitle+'"';
            }
            

            output += ']'+RevContent+'[/reveal]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
	
	}
}
tinyMCEPopup.onInit.add(reveal.init, reveal);

</script>
<title>Add Reveal Box</title>
</head>
<body>
    <form id="GalleryShortcode">
       
	<p>
		<label for="ButtonColor">Button Color:</label>
		<select id="ButtonColor" name="ButtonColor">
			<option value="btn-default">Default</option>
			<option value="btn-primary">Primary</option>
			<option value="btn-info">Info</option>
			<option value="btn-success">Success</option>
			<option value="btn-warning">Warning</option>
			<option value="btn-danger">Danger</option>
		</select>
	</p>
	<p>
		<label for="ButtonSize">Button Size :</label>
		<select id="ButtonSize" name="ButtonSize">
			<option value="btn-lg">Large</option>
			<option value="">Default</option>
			<option value="btn-sm">Small</option>
			<option value="btn-xs">Very small</option>	
		</select>
	</p>
	
	<p>
		<label for="Buttontext">Button Text :</label>
		<input id="Buttontext" name="Buttontext" type="text" value="" />
	</p>
	<hr>
   
	<p>
		<label for="revTitle">Modal Box Title</label>
		<input type="text" id="revTitle" name="revTitle">
	</p>
	<p>
		<label for="revContent">Modal Box Content</label>
		<textarea id="revContent" name="revContent" col="20"></textarea>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:reveal.insert(reveal.e)">Insert</a></div>
<!--/*************************************/ -->
<?php } elseif( $page == 'portlisting' ){ ?>

	<script type="text/javascript">
		var portlisting = {
			e: '',
			init: function(e) {
				portlisting.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var limit = jQuery('#portfolioLimit').val();
				var auto = jQuery('#carouselAuto').val();
				var featured = jQuery('#portfolioFeatured').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				
				
				var output = '[portlist';
				if (anim){
					output+= ' anim="'+anim+'"';
				}
				if(auto) {
					output += ' automatic="'+auto+'"';
				}
				
				if(addclass){
					output+=' class="'+addclass+'"';
				}
				if(limit) {
					output += ' limit="'+limit+'"';
				}
				
				
				if(featured) {
					output += ' featured="'+featured+'"';
				}
				
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(portlisting.init, portlisting);

	</script>
	<title>Add Portfolio Listing</title>

</head>
<body>
<form id="GalleryShortcode">
     <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="portfolioLimit">Items limit</label>
		<input id="portfolioLimit" name="portfolioLimit" type="Text" value="6" />
	</p>
	<p>
		<label for="portfolioFeatured">Type of items to show</label>
		<select id="portfolioFeatured" name="portfolioFeatured">
			<option value="0">All items</option>
			<option value="1">Only featured items</option>
		</select>
	</p>
	<p>
		<label for="carouselAuto">Automatic sliding</label>
		<select id="carouselAuto" name="carouselAuto">
			<option value="false">No</option>
			<option value="true">Yes</option>
		</select>
	</p>
	
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:portlisting.insert(portlisting.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'bloglisting' ){ ?>

	<script type="text/javascript">
		var blogList = {
			e: '',
			init: function(e) {
				blogList.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var limit = jQuery('#blogLimit').val();
				var category = jQuery('#blogCategory').val();
				var order = jQuery('#blogOrder').val();
				var orderby = jQuery('#blogOrderby').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				
				var output = '[list_posts ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				
				if(limit) {
					output += ' limit="'+limit+'"';
				}
				if(category) {
					output += ' category="'+category+'"';
				}
				
				if(order) {
					output += ' order="'+order+'"';
				}
				if(orderby) {
					output += ' orderby="'+orderby+'"';
				}

				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(blogList.init, blogList);

	</script>
	<title>Add Blog Listing</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	
	<p>
		<label for="blogLimit">Items limit</label>
		<input id="blogLimit" name="blogLimit" type="Text" value="5" />
	</p>
	<p>
		<label for="blogCategory">Category</label>
		<input id="blogCategory" name="blogCategory" type="Text" value="" />
		<br /><small style="margin-left:150px">Specify category Id or leave blank to display items from all categories.</small>
	</p>
	
	<p>
		<label for="blogOrder">Posts order</label>
		<select id="blogOrder" name="blogOrder">
			<option value="DESC">Descending</option>
			<option value="ASC">Ascending</option>
		</select>
	</p>
	<p>
		<label for="blogOrderby">Order by:</label>
		<select id="blogOrderby" name="blogOrderby">
			<option value="date">Date</option>
			<option value="id">ID</option>
			<option value="author">Author</option>
			<option value="title">Title</option>
			<option value="comment_count">Number of comments</option>
			<option value="rand">Randomly</option>
		</select>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:blogList.insert(blogList.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif($page=='social') { ?>
<script type="text/javascript">
    var social={
        e:'',
        init:function(e){
            social.e=e;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function createGalleryShortCode(e){
            
            var Icon = jQuery('#icon').val();
            var Link = jQuery('#link').val();
            var anim = jQuery('#anim').val();
			var target = jQuery('#social_target').val();
			
            var addclass=jQuery('#class').val();
					
            var output = '[social ';
            if (anim){
                output+= ' anim="'+anim+'" ';
            }
            if(addclass){
                output+=' class="'+addclass+'" ';
            }
			
			  if(target){
                output+=' target="'+target+'" ';
            }
            output+= ']';
            jQuery("select[id^=icon]").each(function(intIndex, objValue) {
		output +='[soc_button icon="'+jQuery(this).val()+'"';
		var obj = jQuery('input[id^=link]').get(intIndex);
		output += ' link="'+obj.value+'" ';
		output += "/]";
            });
				
            output += '[/social]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    }
    tinyMCEPopup.onInit.add(social.init, social);
    jQuery(document).ready(function() {
        jQuery("#add-social").click(function() {
            jQuery('#SocShortcodeContent').append('<p><label for="icon[]">Social Button</label><select id="icon[]" name="icon[]"><option value="bitbucket">Bitbucket</option><option value="dribbble">Dribble</option><option value="facebook">Facebook</option><option value="flickr">Flickr</option><option value="github">Github</option><option value="google-plus">Google+</option><option value="instagram">Instagram</option><option value="linkedin">LinkedIn</option><option value="pinterest">Pinterest</option><option value="skype">Skype</option><option value="stack-exchange">Stackexchange</option>        <option value="tumblr">Tumblr</option><option value="twitter">Twitter</option><option value="vk">Vkontakte</option><option value="youtube">Youtube</option></select></p><p><label for="link[]">Link to:</label><input type="text" id="link[]" name="link[]"></p><hr class="divider" />');
    });
    });
</script>
<title>Add Social Button</title>
</head>
<body>
    <form id="GalleryShortcode">
        <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
		<p id="animcontent"></p>
		
		<p>
			<label for="social_target">Link target</label>
			<select id="social_target" name="social_target">
				<option value="_blank">Open in new page</option>
				<option value="">Open in same page</option>
			</select>
        </p>
		<p>
			<label for="class">Extra Class (optional)</label>
			<input id="class" name="class" type="text" value="" />
        </p>
        <div id="SocShortcodeContent">
            <p>
				<label for="icon[]">Social Button</label>
				<select id="icon[]" name="icon[]">
					<option value="bitbucket">Bitbucket</option>
					<option value="dribbble">Dribble</option>
					<option value="facebook">Facebook</option>
					<option value="flickr">Flickr</option>
					<option value="github">Github</option>
					<option value="google-plus">Google+</option>
					<option value="instagram">Instagram</option>
					<option value="linkedin">LinkedIn</option>
					<option value="pinterest">Pinterest</option>
					<option value="skype">Skype</option>
					<option value="stack-exchange">Stackexchange</option>        
					<option value="tumblr">Tumblr</option>
					<option value="twitter">Twitter</option>
					<option value="vk">Vkontakte</option>
					<option value="youtube">Youtube</option>
				</select>
            </p>
            <p>
                <label for="link[]">Link to (without http):</label>
                <input type="text" id="link[]" name="link[]">
            </p>
			
            <p>
                <hr class="divider" />  
            </p>
        </div>
        <strong><a style="cursor: pointer;" id="add-social">+ Add Social Button</a></strong>
    </form>
	<div class="mce-foot"><a class="add" href="javascript:social.insert(social.e)">Insert</a></div>
<!--/*************************************/ -->


<?php } elseif($page=='teammember') { ?>
<script type="text/javascript">
    var team={
        e:'',
        init:function(e){
            team.e=e;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function createGalleryShortCode(e){
			var name = jQuery('#membername').val();
			var phone = jQuery('#memberphone').val();
			var fax = jQuery('#memberfax').val();
			var email = jQuery('#memberemail').val();
			var photo = jQuery('#memberphoto-img').val();
			var desclink=jQuery('#memberdesc').val();
			var anim=jQuery('#anim').val();
			var addclass=jQuery('#class').val();

			var output = '[teammember ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if(phone) {
					output += ' phone="'+phone+'"';
				}
				if(name) {
					output += ' name="'+name+'"';
				}
				if(fax) {
					output += ' fax="'+fax+'"';
				}
				if(email) {
					output += ' email="'+email+'"';
				}
				if(desclink) {
					output += ' desc="'+desclink+'"';
				}			
				if(photo) {
					output += ' photo="'+photo+'"';
				}  
			output += ']';
			
            jQuery("select[id^=tmicon]").each(function(intIndex, objValue) {
				output +='[tmsocbutton tmicon="'+jQuery(this).val()+'"';
				var obj = jQuery('input[id^=tmlink]').get(intIndex);
				output += ' tmlink="'+obj.value+'" ';
				output += "/]";
            });
				
            output += '[/teammember]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    }
    tinyMCEPopup.onInit.add(team.init, team);
    jQuery(document).ready(function() {
        jQuery("#add-social").click(function() {
            jQuery('#TeamMemberContent').append('<p><label for="tmicon[]">Social Button</label><select id="tmicon[]" name="tmicon[]"><option value="bitbucket">Bitbucket</option><option value="dribbble">Dribble</option><option value="facebook">Facebook</option><option value="flickr">Flickr</option><option value="github">Github</option><option value="google-plus">Google+</option><option value="instagram">Instagram</option><option value="linkedin">LinkedIn</option><option value="pinterest">Pinterest</option><option value="skype">Skype</option><option value="stack-exchange">Stackexchange</option><option value="tumblr">Tumblr</option><option value="twitter">Twitter</option><option value="vk">Vkontakte</option><option value="youtube">Youtube</option></select></p><p><label for="tmlink[]">Link to:</label><input type="text" id="tmlink[]" name="tmlink[]"></p><hr class="divider" />');
		});
    });
    
</script>
<title>Add Team Member</title>
</head>
<body>
<form id="GalleryShortcode">
	<script> 
	jQuery(function(){
	  jQuery("#animcontent").load("animation.html"); 
	});
	</script>
    <p id="animcontent"></p>
	<div id="TeamMemberContent">
		<p>
			<label for="membername">Name</label>
			<input type="text" id="membername" name="membername" />
		</p>
		<p>
			<label for="memberphone">Phone number</label>
			<input type="text" id="memberphone" name="memberphone" />
		</p>
		<p>
			<label for="memberemail">Email address</label>
			<input type="text" id="memberemail" name="memberemail" />
		</p>
		<p>
			<label for="memberfax">Fax</label>
			<input type="text" id="memberfax" name="memberfax" />
		</p>
		<div class="wrap-list">
			<label for="upload_memberphoto_button">Photo:</label>
			<input id="memberphoto-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="memberphoto" value="" />
			<input id="upload_memberphoto_button" type="button" class="small_button" value="Upload" />
			<div id="memberphoto-preview" class="img-preview" <?php if(!weblusive_get_option('memberphoto')) echo 'style="display:none;"' ?>>
				<img src="<?php if(weblusive_get_option('memberphoto')) echo weblusive_get_option('memberphoto'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
				<a class="del-img" title="Delete"></a>
			</div>
			<div class="clear"></div>
		</div>		   
		<p>
			<label for="desc">Link to member info</label>
			<input type="text" id="memberdesc" name="memberdesc"/>
		</p>
		<p>
			<label for="class">Extra Class</label>
			<input id="class" name="class" type="text" value="" />
		</p>
		<hr class="divider" />
		<p>
			<label for="tmicon[]">Social Button</label>
			<select id="tmicon[]" name="tmicon[]">
				<option value="bitbucket">Bitbucket</option>
				<option value="dribbble">Dribble</option>
				<option value="facebook">Facebook</option>
				<option value="flickr">Flickr</option>
				<option value="github">Github</option>
				<option value="google-plus">Google+</option>
				<option value="instagram">Instagram</option>
				<option value="linkedin">LinkedIn</option>
				<option value="pinterest">Pinterest</option>
				<option value="skype">Skype</option>
				<option value="stack-exchange">Stackexchange</option>        
				<option value="tumblr">Tumblr</option>
				<option value="twitter">Twitter</option>
				<option value="vk">Vkontakte</option>
				<option value="youtube">Youtube</option>
			</select>
		</p>
		<p>
			<label for="tmlink[]">Link to (without http):</label>
			<input type="text" id="tmlink[]" name="tmlink[]">
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-social">+ Add Social Button</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:team.insert(team.e)">Insert</a></div>
<!--/*************************************/ -->


<?php } elseif( $page == 'divider' ){
?>
<script type="text/javascript">
	var divider = {
		e: '',
		init: function(e) {
			divider.e = e;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert: function createGalleryShortcode(e) {
			var type=jQuery('#type').val();
			var pos=jQuery('#pos').val();
			var icon=jQuery('#icon').val();
			var size = jQuery('#size').val();
			var customsize = jQuery('#customsize').val();
			
			var anim=jQuery('#anim').val();     
			var addclass=jQuery('#class').val();        
							
			var output = '[divider ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if(type) {
					output += 'type="'+type+'" ';
				}
				if(pos) {
					output += 'position="'+pos+'" ';
				}
				if(icon) {
					output += 'icon="'+icon+'" ';
				}
				if(size) {
					output += 'size="'+size+'" ';
				}
				if(customsize) {
					output += 'customsize="'+customsize+'" ';
				}
				
			output += '/]';
			tinyMCEPopup.execCommand('mceReplaceContent', false, output);
			tinyMCEPopup.close();
			
		}
	}
	tinyMCEPopup.onInit.add(divider.init, divider);

</script>
<title>Add Divider</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
		jQuery("#animcontent").load("animation.html"); 
	  
		jQuery("#iconwrap").hide(); 
		jQuery("#type").change(function(){
			var selected = jQuery('#type').val();
			if (selected == 'blank-spacer'){
				jQuery("#poswrap, #animcontent").hide();
			}
			else{
				jQuery("#poswrap, #animcontent").show();
			}
			if (selected == 'hr-icon'){
				jQuery("#iconwrap").show(); 
			}
			if (selected == 'hr-fade' || selected == 'hr-double'){
				jQuery("#poswrap").hide();  
			}
	   });
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="type">Type:</label>
		<select  id="type" name="type">
			<option value="circle_big">Circle Big</option>
			<option value="circle_small">Circle Small</option>
			<option value="hr-fade">Fade Margins</option>
			<option value="hr-double">Double</option>
			<option value="blank-spacer">Blank Spacer</option>
			<option value="hr-icon">Icon</option>
		</select>
	</p>
	<p id="iconwrap">
		<label for="icon">Icon: </label>
		<input type="text" id="icon" name="icon" />
        <small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>
	</p>
	<p id="poswrap">
		<label for="pos">Position:</label>
		<select id="pos" name="pos">
			<option value="hr-circle-left">Left</option>
			<option value="hr-circle-center">Center</option>
			<option value="hr-circle-right">Right</option>
		</select>
	</p>
	
	<p>
		<label for="size">Size:</label>
		<select id="size" name="size">
			<option value="padding-xsmall">Very Small</option>
			<option value="padding-small">Small</option>
			<option value="padding-medium">Medium</option>
			<option value="padding-large">Large</option>
		</select>
	</p>
	<p>
		<label for="customsize">Custom Size:</label>
		<input type="text" id="customsize" name="customsize" maxlength="3" style="width:50px" /> px
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:divider.insert(divider.e)">Insert</a></div>
<!--/*************************************/ -->


<!--/*************************************/ -->
<?php } elseif( $page == 'smicon' ){
?>
	<script type="text/javascript">
		var smicon = {
			e: '',
			init: function(e) {
				smicon.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var smiconIcon = jQuery('#smiconIcon').val();
				var smiconType = jQuery('#smiconType').val();
				var smiconColor = jQuery('#smiconColor').val();
				var smiconSize = jQuery('#smiconSize').val();
				var bgcolor = jQuery('#bgcolor').val();
				var anim=jQuery('#anim').val();     
				var addclass=jQuery('#class').val();
               
				var output = '[smicon ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}   
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					if(smiconIcon) {
						output += 'icon="'+smiconIcon+'" ';
					}
		
					if(smiconType) {
						output += 'type="'+smiconType+'" ';
					}
                    if(smiconColor) {
						output += 'color="'+smiconColor+'" ';
					}
					if(smiconSize) {
						output += 'size="'+smiconSize+'" ';
					}
					if(bgcolor) {
						output += 'bgcolor="'+bgcolor+'" ';
					}
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
			}
		}
		tinyMCEPopup.onInit.add(smicon.init, smicon);
	</script>
	<title>Add Icon</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
		jQuery(function(){
		  jQuery("#animcontent").load("animation.html"); 
		});
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="smiconIcon">Icon :</label>
		<input id="smiconIcon" name="smiconIcon" type="text" value=""/>
		<small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>
	</p>
	<p>
		<label for="smiconType">Type :</label>
		<select id="smiconType" name="smiconType">
			<option value="icon-full-round">Full Round</option>
			<option value="icon-border-round">Border Round</option>
			<option value="icon-full-radius">Full Radius</option>
			<option value="icon-border-radius">Border Radius</option>
		</select>
	</p>
	<p>
		<label for="smiconColor">Color :</label>
		<select id="smiconColor" name="smiconColor">
			<option value="color-white">White</option>
			<option value="color-default0">Default</option>
			<option value="color-default">Primary</option>
			<option value="color-info">Info</option>
			<option value="color-success">Success</option>
			<option value="color-danger">Danger</option>
			<option value="color-orange">Orange</option>
			<option value="color-purple">Purple</option>
		</select>
	</p>
	<p>
		<label for="smiconSize">Size :</label>
		<select id="smiconSize" name="smiconSize">
			<option value="">Small</option>
			<option value="fa-lg">Default</option>
			<option value="fa-2x">2X</option>	
			<option value="fa-3x">3X</option>	
			<option value="fa-4x">4X</option>	
			<option value="fa-5x">5X</option>	
		</select>
	</p>
	<p>
		<label for="bgcolor">Icon background color:</label>
		<select id="bgcolor" name="bgcolor">
			<option value="">None</option>
			<option value="bg-color-default">Primary</option>
			<option value="bg-color-info">Info</option>
			<option value="bg-color-success">Success</option>
			<option value="bg-color-orange">Orange</option>
			<option value="bg-color-danger">Danger</option>
			<option value="bg-color-purple">Purple</option>
		</select>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:smicon.insert(smicon.e)">Insert</a></div>
<!--/*************************************/ --> 
<!--/*************************************/ -->

<?php } elseif( $page == 'video' ){ ?>

	<script type="text/javascript">
		var Video = {
			e: '',
			init: function(e) {
				Video.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var site = jQuery('#site').val();
				var id = jQuery('#id').val();
				var width = jQuery('#width').val();
				var height = jQuery('#height').val();
				var autoplay = jQuery('#autoplay').val();
                                var anim=jQuery('#anim').val();
                                var addclass=jQuery('#class').val();
                                
				var output = '[evideo ';
				if (anim){
                                    output+= 'anim="'+anim+'" ';
                                }
                                if(addclass){
                                    output+='class="'+addclass+'" ';
                                }
				if(id) {
					output += 'id="'+id+'" ';
				}
				
				if(site) {
					output += ' site="'+site+'" ';
				}
				
				if(width) {
					output += ' width="'+width+'" ';
				}
				if(height) {
					output += ' height="'+height+'" ';
				}
				
				if(autoplay) {
					output += ' autoplay="'+autoplay+'" ';
				}

				output += ' /]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(Video.init, Video);

	</script>
	<title>Add Video</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="site">Website : </label>
		<select id="site" name="site">
			<option value="youtube">Youtube</option>
			<option value="vimeo">Vimeo</option>
			<option value="dailymotion">Dailymotion</option>
			<option value="bliptv">BlipTV</option>
			<option value="veoh">Veoh</option>
			<option value="viddler">Viddler</option>
		</select>
	</p>
	<p>
		<label for="id">Id (Copy the ID from video URL here) :</label>
		<input id="id" name="id" type="text" value="" />
	</p>
	<p>
		<label for="width">Width :</label>
		<input style="width:40px;" id="width" name="width" type="text" value="" />
	</p>
	<p>
		<label for="height">Height :</label>
		<input style="width:40px;"  id="height" name="height" type="text" value="" />
	</p>
	<p>
		<label for="autoplay">Autoplay : </label>
		<select id="autoplay" name="autoplay">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
	<p><a class="add" href="javascript:Video.insert(Video.e)">insert into post</a></p>
</form>
<!--/*************************************/ -->

<?php } elseif( $page == 'audio' ){ ?>

	<script type="text/javascript">
		var AddAudio = {
			e: '',
			init: function(e) {
				AddAudio.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				
				var title = jQuery('#audioTitle').val();
				var poster = jQuery('#audioPoster').val();
				var mp3Url = jQuery('#mp3Url').val();
				var m4aUrl = jQuery('#m4aUrl').val();
				var oggUrl = jQuery('#oggUrl').val();
				var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
				
				var output = '[audio ';
				if (anim){
                   output+= 'anim="'+anim+'" ';
                }
                if(addclass){
                   output+='class="'+addclass+'" ';
                }
				if(title) {
					output += 'title="'+title+'" ';
				}	
				if(poster) {
					output += ' poster="'+poster+'" ';
				}	
				if(mp3Url) {
					output += ' mp3="'+mp3Url+'" ';
				}				
				if(m4aUrl) {
					output += ' m4a="'+m4aUrl+'" ';
				}				
				if(oggUrl) {
					output += ' ogg="'+oggUrl+'" ';
				}

				output += ' /]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddAudio.init, AddAudio);

	</script>
	<title>Add Native audio</title>

</head>
<body>
<form id="GalleryShortcode">
	<script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
	<p id="animcontent"></p>
	<p>
		<label for="audioTitle">Title : </label>
		<input id="audioTitle" name="audioTitle" type="text" value="" />
	</p>
	<p>
		<label for="audioPoster">Poster image : </label>
		<input id="audioPoster" name="audioPoster" type="text" value="" />
	</p>
	<p>
		<label for="mp3Url">Mp3 file Url : </label>
		<input id="mp3Url" name="mp3Url" type="text" value="" />
	</p>
	<p>
		<label for="m4aUrl">M4A file Url : </label>
		<input id="m4aUrl" name="m4aUrl" type="text" value="" />
	</p>
	<p>
		<label for="oggUrl">OGG file Url : </label>
		<input id="oggUrl" name="oggUrl" type="text" value="" />
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
	
	<p><a class="add" href="javascript:AddAudio.insert(AddAudio.e)">insert into post</a></p>
</form>
<!--/*************************************/ -->
<?php } elseif( $page == 'shvideo' ){ ?>

	<script type="text/javascript">
		var shVideo = {
			e: '',
			init: function(e) {
				shVideo.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				
				var title = jQuery('#videoTitle').val();
				var poster = jQuery('#videoPoster').val();
				var mp4Url = jQuery('#mp4Url').val();
				var m4vUrl = jQuery('#m4vUrl').val();
				var ogvUrl = jQuery('#ogvUrl').val();
				var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
				

				var output = '[shvideo ';
				if (anim){
                   output+= 'anim="'+anim+'" ';
                }
                if(addclass){
                   output+='class="'+addclass+'" ';
                }
				if(title) {
					output += 'title="'+title+'" ';
				}	
				if(poster) {
					output += ' poster="'+poster+'" ';
				}	
				if(mp4Url) {
					output += 'mp4="'+mp4Url+'" ';
				}				
				if(m4vUrl) {
					output += 'm4v="'+m4vUrl+'" ';
				}				
				if(ogvUrl) {
					output += 'ogv="'+ogvUrl+'" ';
				}

				output += ' /]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(shVideo.init, shVideo);

	</script>
	<title>Add Native video</title>

</head>
<body>
<form id="GalleryShortcode">
	<script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
	<p id="animcontent"></p>
	<p>
		<label for="videoTitle">Title : </label>
		<input id="videoTitle" name="videoTitle" type="text" value="" />
	</p>
	<p>
		<label for="videoPoster">Poster image : </label>
		<input id="videoPoster" name="videoPoster" type="text" value="" />
	</p>
	<p>
		<label for="mp4Url">Mp4 file Url : </label>
		<input id="mp4Url" name="mp4Url" type="text" value="" />
	</p>
	<p>
		<label for="m4vUrl">M4V file Url : </label>
		<input id="m4vUrl" name="m4vUrl" type="text" value="" />
	</p>
	<p>
		<label for="ogvUrl">OGV file Url : </label>
		<input id="ogvUrl" name="ogvUrl" type="text" value="" />
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
	
	<p><a class="add" href="javascript:shVideo.insert(shVideo.e)">insert into post</a></p>
</form>

<!--/*************************************/ -->
<!--/*************************************/ -->

<?php } elseif( $page == 'pricingtable' ){ ?>

	<script type="text/javascript">
		var PricingTable = {
			e: '',
			init: function(e) {
				PricingTable.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
			
				var output = "[pricingtable";
				var title = jQuery('#pttitle').val();
				var price = jQuery('#ptprice').val();
				var submitcaption = jQuery('#ptsubmitcaption').val();
				var submiturl = jQuery('#ptsubmiturl').val();
				var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
				

				
				if (anim){
                   output+= ' anim="'+anim+'" ';
                }
                if(addclass){
                   output+=' class="'+addclass+'" ';
                }
				
				if(title) {
					output+= ' title="'+title+'"';
				}
				
				if(price) {
					output+= ' price="'+price+'"';
				}
				
				
				if(submitcaption) {
					output+= ' submitcaption="'+submitcaption+'"';
				}
				
				if(submiturl) {
					output+= ' submiturl="'+submiturl+'"';
				}
				
				output += "]";
				
				jQuery("input[id^=ptcontent]").each(function(intIndex, objValue) {
					//var obj = jQuery(this).get(intIndex);
					output += "[pricingcolumn]" + jQuery(this).val()+"[/pricingcolumn]";
				});
				
				
				output += '[/pricingtable]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(PricingTable.init, PricingTable);

		jQuery(document).ready(function() {
			jQuery("#add-tablefield").click(function() {
				jQuery('#PricingTableShortcodeContent').append('<p><label for="ptcontent[]">Column content</label><input id="ptcontent[]" name="ptcontent[]" type="text" value="" /></p>');
			});
		});
		
	</script>
	<title>Add Pricing table</title>

</head>
<body>
<form id="PricingTableShortcode">
<div id="PricingTableShortcodeContent">
	<script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
	<p id="animcontent"></p>
	<p>
		<label for="pttitle">Title</label>
		<input id="pttitle" name="pttitle" type="text" value="" />
	</p>
	<p>
		<label for="ptprice">Price :</label>
		<input id="ptprice" name="ptprice" type="text" value="" />
	</p>
	<p>
		<label for="ptsubmitcaption">Submit caption</label>
		<input id="ptsubmitcaption" name="ptsubmitcaption" type="text" value="" />
	</p>
	<p>
		<label for="ptsubmiturl">Submit URL</label>
		<input id="ptsubmiturl" name="ptsubmiturl" type="text" value="" />
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
	<hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />
	
	<p>
		<label for="ptcontent[]">Column content</label>
		<input id="ptcontent[]" name="ptcontent[]" type="text" value="" />
	</p>
	
	<hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />
</div>
	<strong><a style="cursor: pointer;" id="add-tablefield">+ Add another column</a></strong>
	<p><a class="add" href="javascript:PricingTable.insert(PricingTable.e)">insert into post</a></p>
</form>
<!--/*************************************/ --> 
<?php } elseif( $page == 'flist' ){ ?>

	<script type="text/javascript">
		var flist = {
			e: '',
			init: function(e) {
				flist.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
			
				var output = "[flist";
				var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
				if (anim){
                   output+= ' anim="'+anim+'" ';
                }
                if(addclass){
                   output+=' class="'+addclass+'" ';
                }				
				output += "]";
				
				jQuery("input[id^=itemLink]").each(function(intIndex, objValue) {
				output +='[listitem link="'+jQuery(this).val()+'"';
				var icon=jQuery('input[id^=itemicon]').get(intIndex);;
				output+=' icon="'+icon.value+'"';
				var title = jQuery('input[id^=itemtitle]').get(intIndex);;
				output+=' title="'+title.value+'"]';
				var obj = jQuery('input[id^=itemcontent]').get(intIndex);
				output += obj.value;
				output += '[/listitem]';
			});
				
				
				output += '[/flist]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(flist.init, flist);

		jQuery(document).ready(function() {
			jQuery("#add-listitem").click(function() {
				jQuery('#FeaturedListShortcodeContent').append('<p><label for="itemtitle">Item Title</label><input id="itemtitle" name="itemtitle" type="text" value="" /></p><p><label for="itemicon">Item Icon</label><input id="itemicon" name="itemicon" type="text" value="" /><small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small></p><p><label for="itemLink">Item Link To</label><input id="itemLink" name="itemLink" type="text" value="" /></p><p><label for="itemcontent">Item Content Text</label><input id="itemcontent" name="itemcontent" type="text" value="" /></p><hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />');
			});
		});
		
	</script>
	<title>Add Feature List</title>

</head>
<body>
<form id="FeaturedListShortcode">
<div id="FeaturedListShortcodeContent">
	<script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
	<p id="animcontent"></p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
	<hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />
	<p>
		<label for="itemtitle">Item Title</label>
		<input id="itemtitle" name="itemtitle" type="text" value="" />
	</p>
	<p>
		<label for="itemicon">Item Icon</label>
		<input id="itemicon" name="itemicon" type="text" value="" />
		<small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>
	</p>
	<p>
		<label for="itemLink">Item Link To</label>
		<input id="itemLink" name="itemLink" type="text" value="" />
	</p>
	<p>
		<label for="itemcontent">Item Content Text</label>
		<input id="itemcontent" name="itemcontent" type="text" value="" />
	</p>
	
	<hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />
</div>
	<strong><a style="cursor: pointer;" id="add-listitem">+ Add List Item</a></strong>
	<p><a class="add" href="javascript:flist.insert(flist.e)">insert into post</a></p>
</form>
<!--/*************************************/ --> 

<?php } ?>

</body>
</html>