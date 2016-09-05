<?php


function panel_options() { 

	$categories_obj = get_categories('hide_empty=0');
	$categories = array();
	foreach ($categories_obj as $pn_cat) {
		$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
	}
	
	$sliders = array();
	$custom_slider = new WP_Query( array( 'post_type' => 'weblusive_slider', 'posts_per_page' => -1 ) );
	while ( $custom_slider->have_posts() ) {
		$custom_slider->the_post();
		$sliders[get_the_ID()] = get_the_title();
	}
	
	
$save='
	<div class="mpanel-submit">
		<input type="hidden" name="action" value="test_theme_data_save" />
        <input type="hidden" name="security" value="'. wp_create_nonce("test-theme-data").'" />
		<input name="save" class="mpanel-save" type="submit" value="Save Changes" />    
	</div>'; 
?>
		
		
<div id="save-alert"></div>

<div class="admin-panel">
	<div class="top-nav">
		<div class="logo"></div>
		<div class="right-info">
			
		</div>
		<div class="clear"></div>
	</div>
	<div class="admin-panel-tabs">
		<ul>
			<li class="weblusive-tabs main-settings"><a href="#tab1"><span></span>Main Settings</a></li>
			<li class="weblusive-tabs header"><a href="#tab2"><span></span>Header</a></li>
			<li class="weblusive-tabs footer"><a href="#tab3"><span></span>Footer</a></li>
			<li class="weblusive-tabs sidebars"><a href="#tab4"><span></span>Sidebars</a></li>
			<li class="weblusive-tabs styling"><a href="#tab6"><span></span>Styling</a></li>
			<li class="weblusive-tabs woocommerce"><a href="#tab5"><span></span>Woocommerce</a></li>
			<li class="weblusive-tabs blog"><a href="#tab8"><span></span>Blog settings</a></li>
			<li class="weblusive-tabs underconstruction"><a href="#tab9"><span></span>Under construct.</a></li>
			<li class="weblusive-tabs contact"><a href="#tab10"><span></span>Contact settings</a></li>
			<li class="weblusive-tabs advanced"><a href="#tab11"><span></span>Advanced</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- .admin-panel-tabs -->
	
	<div class="admin-panel-content">
	<form action="/" name="weblusive_form" id="weblusive_form">
		<div id="tab1" class="tabs-wrap">
			<h2>Main Settings</h2> <?php echo $save ?>
			<div class="weblusivepanel-item">
				<h3>Logo</h3>
				<?php
					weblusive_options(
						array( 	
						"name" => "Logo Setting",
						"id" => "logo_setting",
						"type" => "radio",
						"options" => array( "logo"=>"Custom Image Logo" ,"title"=>"Display Site Title" )
						)
					);
				?>
								
				<?php
					weblusive_options(
						array(	"name" => "Custom Logo Image",
								"id" => "logo",
								"help" => "Upload an image or specify an existing URL. If left blank, the default website name will be applied.",
								"type" => "upload"));
				?>
			</div>
			<div class="weblusivepanel-item">
				<h3>Favicon</h3>
				<?php
					weblusive_options(
					array(	
						"name" => "Custom Favicon",
						"id" => "favicon",
						"type" => "upload")
					);
				?>
			</div>
			
			<div class="weblusivepanel-item">
				<h3>Theme skin</h3>
				<?php weblusive_options(
					array(	
					"name" => "Theme skin",
					"id" => "theme_skin",
					"type" => "select",
					"options" => array('' => 'Default', 'skin2' => 'Skin 2', 'skin3' => 'Skin 3', 'skin4' => 'Skin 4', 'skin5' => 'Skin 5', 'skin6' => 'Skin 6',)
					)
				);
				?>		
			</div>
			<div class="weblusivepanel-item">
				<h3>Theme color scheme</h3>
				<?php weblusive_options(
					array(	
					"name" => "Light/Dark",
					"id" => "theme_color",
					"type" => "select",
					"options" => array('light' => 'Light', 'dark' => 'Dark')
					)
				);
				?>		
			</div>
			<div class="weblusivepanel-item">
				<h3>Theme layout</h3>
				<?php weblusive_options(
					array(	
					"name" => "Fixed/Fluid",
					"id" => "theme_layout",
					"type" => "select",
					"options" => array('fixed' => 'Fixed', 'fluid' => 'Fluid')
					)
				);
				?>		
			</div>
			<div class="weblusivepanel-item">
				<h3>RTL Mode</h3>
				<?php weblusive_options(
					array(	
						"name" => "Enable RTL",
						"id" => "rtl_mode",
						"help" => "Switch this on for Right to left direction languages like Arabic or Hebrew.",
						"type" => "checkbox")
					);
				?>		
			</div>
		</div>
		
		<div id="tab2" class="tabs-wrap">
			<h2>Header Settings</h2> <?php echo $save ?>
			
			<div class="weblusivepanel-item">
				<h3>Header Menus Settings</h3>
				<?php
					weblusive_options(
						array( 	
						"name" => "Menu position",
						"id" => "header_style",
						"type" => "select",
						"options" => array( ""=>"Left", "right-menu-sidebar"=>"Right")
						)
					);
                  /*              
					weblusive_options(
						array(	"name" => "Display a top bar",
								"id" => "topbar",
								"help" => "Set to display a bar above the navigation menu.",
								"type" => "checkbox"));	

					
					*/							
					weblusive_options(
						array(	
						"name" => "Sticky header",
						"id" => "sticky_header",
						"help" => "Make header stick to the top when scrolling through the content.",
						"type" => "checkbox")
					); 			
				?>		
			</div>
			
			<div class="weblusivepanel-item">
				<h3>Header title Settings</h3>
				<?php
					weblusive_options(
						array(	"name" => "Hide Breadcrumbs ",
								"id" => "hide_breadcrumbs",
								"type" => "checkbox")
							); 
				?>
				<?php
					weblusive_options(
						array(	"name" => "Hide titles",
								"id" => "hide_titles",
								"type" => "checkbox")
							); 
				?>
			</div>
						
			<div class="weblusivepanel-item">
				<h3>Header Code</h3>
				<div class="option-item">
					<small>Paste any custom javascript code you would like to put in header in this field.</small>
					<textarea id="header_code" name="weblusive_options[header_code]" style="width:100%" rows="7"><?php echo htmlspecialchars_decode(weblusive_get_option('header_code'));  ?></textarea>				
				</div>
			</div>
		</div> 
		
		<div id="tab3" class="tabs-wrap">
			<h2>Footer Settings</h2> <?php echo $save ?>

			<div class="weblusivepanel-item">

				<h3>Footer Elements</h3>
				<?php
				
					weblusive_options(
						array(	"name" => "Hide 'Go To Top' Icon",
								"id" => "hide_footer_top",
								"type" => "checkbox"));
				
					weblusive_options(
						array(	"name" => "Copyright text",
								"desc" => "",
								"id" => "footer_copyright",
								"type" => "textarea"));
					/*
					weblusive_options(
						array(	
						"name" => "Footer bottom content",
						"id" => "footer_text",
						"type" => "textarea",
						"help" => "Footer bottom right content ",
						)
					);
					 * 
					 */
				?>
			</div>
			
			<div class="weblusivepanel-item">
				<h3>Footer Widgets</h3>
				<div class="option-item">
					<?php weblusive_options(
						array( 	
						"name" => "Number of widgets",
						"id" => "footer_widgets",
						"type" => "select",
						"options" => array( "4"=>"4 widgets per column", "3"=>"3 widgets per column", "2"=>"2 widgets per column", "none"=>"Disable footer widgets" )
						)
					);
					?>
				</div>
			</div>
			<div class="weblusivepanel-item">
				<h3>Footer Code</h3>
				<div class="option-item">
					<small>Code added goes before the closing  &lt;/body&gt; tag. Useful for Google analytics code or any other script.</small>
					<textarea id="footer_code" name="weblusive_options[footer_code]" style="width:100%" rows="7"><?php echo htmlspecialchars_decode(weblusive_get_option('footer_code'));  ?></textarea>				
				</div>
			</div>	
		</div><!-- Footer Settings -->
		
		<div id="tab4" class="tab_content tabs-wrap">
			<h2>Sidebars</h2>	<?php echo $save ?>	
			
			<div class="weblusivepanel-item">
				<h3>Sidebar Position</h3>
				<div class="option-item">
					<?php
						$checked = 'checked="checked"';
						$weblusive_sidebar_pos = weblusive_get_option('sidebar_pos');
					?>
					<ul id="sidebar-position-options" class="weblusive-options">
						<li>
							<input id="_weblusive_sidebar_pos" name="weblusive_options[sidebar_pos]" type="radio" value="right" <?php if($weblusive_sidebar_pos == 'right' || !$weblusive_sidebar_pos ) echo $checked; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-right.png" /></a>
						</li>
						<li>
							<input id="_weblusive_sidebar_pos" name="weblusive_options[sidebar_pos]" type="radio" value="left" <?php if($weblusive_sidebar_pos == 'left') echo $checked; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-left.png" /></a>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="weblusivepanel-item">
				<h3>Add Sidebar</h3>
				<div class="option-item">
					<span class="label">Sidebar Name</span>
					
					<input id="sidebarName" type="text" size="56" style="direction:ltr; text-laign:left" name="sidebarName" value="" />
					<input id="sidebarAdd"  class="small_button" type="button" value="Add" />
					
					<ul id="sidebarsList">
					<?php $sidebars = weblusive_get_option( 'sidebars' ) ;
						if($sidebars){
							foreach ($sidebars as $sidebar) { ?>
						<li>
							<div class="widget-head"><?php echo $sidebar ?>  <input id="weblusive_sidebars" name="weblusive_options[sidebars][]" type="hidden" value="<?php echo $sidebar ?>" /><a class="del-sidebar"></a></div>
						</li>
							<?php }
						}
					?>
					</ul>
				</div>				
			</div>

			<div class="weblusivepanel-item" id="custom-sidebars">
				<h3>Custom Sidebars</h3>
				<?php
				
				$new_sidebars = array(''=> 'Default');
				if($sidebars){
					foreach ($sidebars as $sidebar) {
						$new_sidebars[$sidebar] = $sidebar;
					}
				}
							
				weblusive_options(				
					array(	"name" => "Portfolio Single Page Sidebar",
							"id" => "sidebar_portfolio",
							"type" => "select",
							"options" => $new_sidebars ));
							
				weblusive_options(				
					array(	"name" => "Blog Single Post Sidebar",
							"id" => "sidebar_post",
							"type" => "select",
							"options" => $new_sidebars ));
							
				weblusive_options(				
					array(	"name" => "Blog Archives Sidebar",
							"id" => "sidebar_archive",
							"type" => "select",
							"options" => $new_sidebars )); 
				
				?>
			</div>
		</div> 
		
		<!-- Styling -->
		<div id="tab6" class="tab_content tabs-wrap">
			<h2>Styling manager</h2>	<?php echo $save ?>	
			
			<div class="weblusivepanel-item">
				<h3>Custom CSS</h3>	
				<div class="option-item">
					<p><strong>Global CSS :</strong></p>
					<textarea id="weblusive_css" name="weblusive_options[css]" style="width:100%" rows="7"><?php echo weblusive_get_option('css');  ?></textarea>
				</div>	
				<div class="option-item">
					<p><strong>Portrait Tablets :</strong> 768px and above</p>
					<textarea id="weblusive_css" name="weblusive_options[css_tablets]" style="width:100%" rows="7"><?php echo weblusive_get_option('css_tablets');  ?></textarea>
				</div>
				<div class="option-item">
					<p><strong>Phones to tablets :</strong> 767px and below</p>
					<textarea id="weblusive_css" name="weblusive_options[css_wide_phones]" style="width:100%" rows="7"><?php echo weblusive_get_option('css_wide_phones');  ?></textarea>
				</div>
				<div class="option-item">
					<p><strong>Phones :</strong>480px and below</p>
					<textarea id="weblusive_css" name="weblusive_options[css_phones]" style="width:100%" rows="7"><?php echo weblusive_get_option('css_phones');  ?></textarea>
				</div>	
			</div>	

		</div> <!-- Styling -->
		<!-- Woocommerce -->
        <div id="tab5" class="tab_content tabs-wrap">
            <h2>Woocommerce</h2>	<?php echo $save ?>
            <div class="weblusivepanel-item">
                <h3>Visual options</h3>
                <?php
                weblusive_options(
                    array(
                        "name" => "Products per page",
                        "id" => "products_per_page",
                        "type" => "text",
                        "help" => "The default pagination value",
                    ));
              
					weblusive_options(
                    array(
                        "name" => "Products per row",
                        "id" => "products_per_row",
                        "type" => "select",
                        "help" => "How many products to show in one row",
                        "options" => array("columns-2" => '2', "columns-3" => '3', "columns-4" => "4",  "columns-6" => "6", "columns-1" => '1')
                    ));
					
					
					weblusive_options(
                    array(
                        "name" => "Hide related products",
                        "id" => "hide_related_products",
						"type" => "checkbox",
                        "help" => "Applies to product page"
                    ));
				  ?>
            </div>
			
        </div> <!-- End Woocommerce -->
		<div id="tab8" class="tab_content tabs-wrap">
			<h2>Blog Settings</h2> <?php echo $save ?>
                        
			<div class="weblusivepanel-item">
				<h3>Layout</h3>
				<?php
					 weblusive_options(
					array("name"=>"Blog layout",
					"id"=>"blog_layout",
					"type"=>"select",
					"options" => array( "1"=>"Default(1 column)" ,
						"2"=>"2 columns"
						)
					));
				?>
			</div>

			<div class="weblusivepanel-item">

				<h3>Listing</h3>
				<?php
					weblusive_options(
						array(	"name" => "Hide date",
								"id" => "blog_show_date",
								"type" => "checkbox")
							); 

					weblusive_options(
						array(	"name" => "Hide author",
								"id" => "blog_show_author",
								"type" => "checkbox")
							); 
 
					weblusive_options(
						array(	"name" => "Hide comment number",
								"id" => "blog_show_comments",
								"type" => "checkbox")
							); 
					weblusive_options(
						array(	"name" => "Read more button text",
								"id" => "blog_show_rmtext",
								"type" => "text")
							); 
                                
				?>
			</div>
			
			<div class="weblusivepanel-item">
				<h3>Custom Gravatar</h3>
				
				<?php
					weblusive_options(
						array(	"name" => "Custom Gravatar",
								"id" => "gravatar",
								"type" => "upload"));
				?>
			</div>	
			
		</div> <!-- Article Settings -->
		<!-- Under construction -->
		<div id="tab9" class="tab_content tabs-wrap">
			<h2>Under construction</h2>	<?php echo $save ?>	

			<div class="weblusivepanel-item">
				<h3>General settings</h3>
				<?php
					weblusive_options(
					array(	"name" => "Main title",
							"id" => "uc_maintitle",
							"type" => "text"));
					
					weblusive_options(
					array(	"name" => "Custom text",
							"id" => "uc_text",
							"type" => "textarea"));
					
					weblusive_options(
					array(	
					"name" => "Progress",
					"id" => "uc_progress",
					"type" => "select",
					"options" => array('10%' => '10%', '20%' => '20%', '30%' => '30%', '40%' => '40%', '50%' => '50%', '60%' => '60%', '70%' => '70%', '80%' => '80%', '90%' => '90%')
					));
					weblusive_options(
					array(	"name" => "Launching date (mm/dd/yyyy)",
							"id" => "uc_launchdate",
							"type" => "text",
							"help" => "Please insert the date in mm/dd/yyyy format otherwise the page won't work correctly. Example: 05/07/2015"));
				?>
			</div>	
				
			
	
		</div> <!-- End under construction -->
		
		<!-- Contact form page -->
		<div id="tab10" class="tab_content tabs-wrap">
			<h2>Contact page</h2>	<?php echo $save ?>	

			<div class="weblusivepanel-item">
				<h3>General settings</h3>
				<?php 
				weblusive_options(
				array(	"name" => "Email address",
						"id" => "contact_email",
						"type" => "text"));
				weblusive_options(
				array(	"name" => "Subject",
						"id" => "contact_subject",
						"type" => "text",
						"help" => "Will be set as subject for all e-mails coming from website."));
				weblusive_options(
				array(	"name" => "Contact Address (Google map)",
				"id" => "contact_address",
				"type" => "text",
				"help" => "Will display a Google map with your contact address."));
				weblusive_options(
				array(	"name" => "Error text",
				"id" => "contact_error",
				"type" => "text",
				"help" => "The message to display if there was an issue while sending the e-mail."));
				weblusive_options(
				array(	"name" => "Success text",
				"id" => "contact_success",
				"type" => "text",
				"help" => "The message to display if the e-mail is sent succesfully."));
						
				?>
			</div>	
				
			
	
		</div> <!-- End contact form -->
		
		<div id="tab11" class="tab_content tabs-wrap">
			<h2>Advanced Settings</h2>	<?php echo $save ?>	

			<div class="weblusivepanel-item">
				<h3>Branding</h3>
				<?php
					weblusive_options(
						array(	"name" => "Worpress Login page Logo",
								"id" => "dashboard_logo",
								"type" => "upload"));
				?>
			
			</div>
			<?php
				global $array_options ;
				
				$current_options = array();
				foreach( $array_options as $option ){
					if( get_option( $option ) )
						$current_options[$option] =  get_option( $option ) ;
				}
			?>
			
			<div class="weblusivepanel-item">
				<h3>Export</h3>
				<p class="info">If you are importing previously saved content, make sure to delete the content in the "Export" field.</p>
				<div class="option-item">
					<textarea style="width:100%" rows="7"><?php echo $currentsettings = base64_encode( serialize( $current_options )); ?></textarea>
				</div>
			</div>
			<div class="weblusivepanel-item">
				<h3>Import</h3>
				<div class="option-item">
					<textarea id="weblusive_import" name="weblusive_import" style="width:100%" rows="7"></textarea>
				</div>
			</div>
	
		</div>
		
		<div class="mo-footer">
			<?php echo $save; ?>
		</div>
		</form>
		

	</div><!-- .admin-panel-content -->
	<div class="clear"></div>
</div><!-- .admin-panel -->


<?php
}
?>