<?php
define ( 'JS_PATH' , get_template_directory_uri().'/library/functions/shortcodes/shortcode.js');

function Unik_addbuttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_alc_custom_tinymce_plugin");
		add_filter('mce_buttons', 'register_alc_custom_button');
	}
}
function register_alc_custom_button($buttons) {
	array_push(
		$buttons,
		"Unik"
		); 
	return $buttons;
} 

function add_alc_custom_tinymce_plugin($plugin_array) {
	$plugin_array['UnikShortcodes'] = JS_PATH;
	return $plugin_array;
}
add_action('init', 'Unik_addbuttons');


/********************* PANEL **********************/

function alc_panel( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"anim"=>'',
        "class"=>''
	), $atts));
	$anim = empty($anim) ? '' : "animation $anim";
	$out = '<div class="panelshort unik-line-section '.$anim.' '.$class.'">
				'.do_shortcode ($content).'
			</div>';
    return $out;
}
add_shortcode('panel', 'alc_panel');

/**************************************************/


/********************* Well **********************/

function alc_well( $atts, $content = null ) {
 extract(shortcode_atts(array(
		'anim'=>'',
		'class'=>'',
		'boxbg'=>''
	), $atts));	
	
	$anim = empty($anim) ? '' : "animation $anim";
	$boxbg = (isset($boxbg) && $boxbg!=='') ? ' background-image:url('.$boxbg.') !important;' : '';
	$out = '<div class="box-section  '.$anim.' '.$class.'" style="'.$boxbg.'">'.do_shortcode ($content).'</div>';
    return $out;
}
add_shortcode('well', 'alc_well');

/**************************************************/


/***************** PROGRESS BAR *******************/

function alc_progressbar( $atts, $content = null ) {
    extract(shortcode_atts(array(
		"anim"=>'',
		"color"=>'',
		"meter" => '',
		"style" => '',
		"animated" => '',
		"title" => '',
		"class"=>'',
		'customcolor'=>''
	), $atts));
	$anim = (empty($anim) || $animated!=='') ? '' : "animation $anim";
	$out='';
	$cc=  isset($customcolor) ? "background-color:$customcolor" : '';
	$out .= '<div class="skills-progress  '.$class.' ">';
       if($title) $out.='<p>'.$title.'<span>'.$meter.'%</span></p>';
	$out.='<div class="progress  '.$style.' '.$animated.'">
		<div class="progress-bar '.$color.' '.$anim.'"  style="width:'.$meter.'%; '.$cc.'">';
       
         $out.='</div></div></div>';
		 
    return $out;
}
add_shortcode('progressbar', 'alc_progressbar');

/************************************************/


/************** Circular Progress Bar ***********/

function alc_circle( $atts, $content = null ) {
 extract(shortcode_atts(array(
	"meter"=>'', 
	"title"=>'',
	"anim"=>'',
	"class"=>'',
	), $atts));

	
	$anim = empty($anim) ? '' : "animation $anim";
	$randomId = mt_rand(0, 100000);
	$out = '
		<div class="skills-section '.$anim.' '.$class.'">
			<div id="circle'.$randomId.'" data-percent="'.$meter.'" data-background="#92bc39" data-forground="#fff" data-fontcolor="#b3b3b3"></div>
			<p>'.$title.'</p>
		</div>';
	
	$out.='<script type="text/javascript">
		jQuery(function() {
			DevSolutionSkill.init("circle'.$randomId.'")
		});
	</script>';
	
    return $out;
}
add_shortcode('circle', 'alc_circle');

/**************************************************/

/*************** Dropdown buttons *****************/

function alc_dropbutton_group( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '',
		'type'	=> '',
		'anim'=>'',
		'class'=>'',
	), $atts));
	$GLOBALS['dropbutton_count'] = 0;
	$randomId = mt_rand(0, 100000);
	$return = '';
    $anim = empty($anim) ? '' : "animation $anim";
	do_shortcode( $content );
	$counter = 1;
	if( is_array( $GLOBALS['dropbuttons'] ) ){
		foreach( $GLOBALS['dropbuttons'] as $dropbutton ){
			$dropbuttons[] = '<li><a href="'.$dropbutton['url'].'">'.do_shortcode($dropbutton['content']).'</a></li>';
			if ($dropbutton['divider'] == 1)
			{
				$dropbuttons[] = '<li class="divider"></li>';
			}
		}
		
		if ($type == 'split')
		{
			$return.='
			<div class="btn-group '.$anim.' '.$class.'">
				<button class="btn">'.$title.'</button>
				<button class="btn dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				</button>';
		}
		else
		{	
			$return.= '
			<div class="btn-group '.$anim.' '.$class.'">
				 <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">'.$title.'<span class="caret"></span></a>';
		}
		$return.= '<ul class="dropdown-menu" id="'.$randomId.'">'.implode( "\n", $dropbuttons ).'</ul>';
		$return.= '</div>';
		unset($GLOBALS['dropbuttons']);
	}
	return $return;
}
add_shortcode( 'dropbuttongroup', 'alc_dropbutton_group' );

/**************************************************/


/**************** DROPDOWN BUTTON *****************/

function alc_dropbutton( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => '',
	'url' => '',
	'divider' => '',
	), $atts));
	
	$x = $GLOBALS['dropbutton_count'];
	$GLOBALS['dropbuttons'][$x] = array( 'title' => $title, 'url' => $url, 'divider' => $divider, 'content' =>  $content );
	
	$GLOBALS['dropbutton_count']++;
}

add_shortcode( 'dropbutton', 'alc_dropbutton' );

/************************************************/

/******************* BUTTONS ********************/

function alc_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'size' => 'medium',
		'link' => '#',
		'color' => '',
		'status'=>'',
		'target' => '',
		'icon'=>'',
		'anim'=>'',
		'class'=>'',
	), $atts));
    
	$anim = empty($anim) ? '' : "animation $anim";
	$target = ($target) ? ' target="_blank"' : '';
	$out = '';
	
	$out.= '<a href="'.$link.'" '.$target.' class="btn '.$size.' '.$color.' '.$status.' '.$class.' '.$anim.'" ><i class="fa '.$icon.'"></i>'.do_shortcode($content).'</a>';
	return $out;
}
add_shortcode('button', 'alc_button');

/************************************************/


/****************** TABS ************************/

function alc_tab_group( $atts, $content ){
    extract(shortcode_atts(array(
        'position'=>'',
        'position'=>'',
        'anim'=>'',
        'class'=>'',
        ), $atts));
	$GLOBALS['tab_count'] = 0;	
	do_shortcode( $content );
    $rtl =  weblusive_get_option('rtl_mode');
	$anim = empty($anim) ? '' : "animation $anim";
	$randomId = mt_rand(0, 100000);
	$counter = 0;
	$tabs = array();
	$return = '<div class="'.$position.' '.$anim.' '.$class.'">';
		if( is_array( $GLOBALS['tabs'] ) ){
			foreach( $GLOBALS['tabs'] as $tab ){
				$active = ($counter == 0) ? ' class="active"' : '';
                $activeContent = ($counter == 0) ? 'active' : '';
				if($rtl){
					$tabs[] = '<li'.$active.'><a href="#tabs-'.$randomId.'" data-toggle="tab">'.$tab['title'].'<i class="fa '.$tab['icon'].'"></i></a></li>'; 
				}
				else{
				$tabs[] = '<li'.$active.'><a href="#tabs-'.$randomId.'" data-toggle="tab"><i class="fa '.$tab['icon'].'"></i>'.$tab['title'].'</a></li>';                
				}
				$tabcontent[] = '<div id="tabs-'.$randomId.'" class="tab-pane  '.$activeContent.'">'.do_shortcode($tab['content']).'</div>';	
				
				$randomId++;
				$counter ++;
			}
			
				$return.= '<ul class="nav nav-tabs ">'.implode( "\n", $tabs ).'</ul>';
				$return.= '<div class="tab-content">'.implode( "\n", $tabcontent ).'</div>';
			unset($GLOBALS['tabs']);
		}
	$return.='</div><div class="clearfix"></div>';
	return $return;
}
add_shortcode( 'tabgroup', 'alc_tab_group' );


function alc_tab( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Tab %d',
         'icon'=>''     
	), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content, 'icon'=>$icon );
	
	$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'alc_tab' );

/************************************************/


/*************** Vertical Navigation ************/
function alc_vernav_group( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '',
		'anim'=>'',
		'class'=>'',
	), $atts));
	$GLOBALS['vernav_count'] = 0;
	do_shortcode( $content );
    $anim = empty($anim) ? '' : "animation $anim";
	$return = '<div class="'.$anim.' '.$class.'" style="max-width: 340px; padding: 8px 0"><ul class="nav nav-list">';
	if (!empty($title)) $return.='<li class="nav-header">'.$title.'</li>';
	if( is_array( $GLOBALS['vernavs'] ) ){
		foreach( $GLOBALS['vernavs'] as $vernav ){
			$vernavs[] = ' 
				<li><a href="'.$vernav['link'].'">'.$vernav['title'].'</a></li>';	
		}
		$return.=implode( "\n", $vernavs );
		$return.= '</ul></div>';
		unset($GLOBALS['vernavs']);
	}
	return $return;
}
add_shortcode( 'vernavgroup', 'alc_vernav_group' );


function alc_vernav( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Nav %d',
	'link'	=> ''
	), $atts));
	
	$x = $GLOBALS['vernav_count'];
	$GLOBALS['vernavs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['vernav_count'] ), 'content' =>  $content, 'link' =>  $link );
	
	$GLOBALS['vernav_count']++;
}
add_shortcode( 'vernav', 'alc_vernav' );

/*************************************************/


/***************** ACCORDION ********************/


function alc_accordion_group( $atts, $content ){
	extract(shortcode_atts(array(
        'anim'=>'',
        'class'=>'',
	), $atts));
	$GLOBALS['accordion_count'] = 0;
	$anim = empty($anim) ? '' : "animation $anim";
	$counter = 0;
	$accId=  mt_rand(0, 100);
	do_shortcode( $content );
   
	if( is_array( $GLOBALS['accordions'] ) ){
		foreach( $GLOBALS['accordions'] as $accordion ){
			$randomId=  mt_rand(0, 10000);
			$active = ($counter == 0) ? ' active ' : '';
			$activeContent=($counter==0 )? 'in' : '';
			$accordions[] = '
				<div class="accord-elem '.$active.'">		
					<div class="accord-title">
						<h3>'.$accordion['title'].'</h3>
						<a class="accord-link" href="#"></a>
					</div>    
					<div class="accord-content">
						'.do_shortcode($accordion['content']).'
					</div>
				</div>';	
			$counter++;
		}
		$return='<div class="accordion-box '.$anim.' '.$class.'" id="accordion-'.$accId.'">'.implode( "\n", $accordions ).'</div>';
		unset($GLOBALS['accordions']);
	}
	return $return;
}

add_shortcode( 'accordiongroup', 'alc_accordion_group' );
/***************/

function alc_accordion( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'accordion %d',
	), $atts));
	
	$x = $GLOBALS['accordion_count'];
	$GLOBALS['accordions'][$x] = array( 'title' => sprintf( $title, $GLOBALS['accordion_count'] ), 'content' =>  $content );
	
	$GLOBALS['accordion_count']++;
}

add_shortcode( 'accordion', 'alc_accordion' );
/************************************************/


/*************** TESTIMONIALS ********************/

function alc_testimonial_group( $atts, $content ){
	extract(shortcode_atts(array(
        'anim'=>'',
        'class'=>'',
		
	), $atts));
	$GLOBALS['testimonial_count'] = 0;
	$counter = 0;
	$randomId = mt_rand(0, 100000);
	do_shortcode( $content );
	$anim = empty($anim) ? '' : "animation $anim";
	$return = '
		<div class="testimonial-section '.$anim.' '.$class.'" >';
				if( is_array( $GLOBALS['testimonials'] ) ){
					foreach( $GLOBALS['testimonials'] as $testimonial ){
						$testimonials[] = '
						<li>';
							$testimonials[].='
							<img alt="'.$testimonial['title'].'" src="'.$testimonial['photo'].'">
							<div class="message-content">
								<p>'.do_shortcode($testimonial['content']).'</p>
								<h6>'.$testimonial['title'].' '.$testimonial['position'].' at <span>'.$testimonial['company'].'</span></h6>
							</div>				
						</li>';	
						$counter++;
					}
					$return.= '<ul class="bxslider testimonialshort'.$randomId.'">'.implode( "\n", $testimonials ).'</ul>';
					unset($GLOBALS['testimonials']);
				}
				$return.='
		</div>
		<script>
		jQuery(window).load(function(){
			jQuery(".testimonialshort'.$randomId.'").bxSlider({
			mode: "vertical"
		});
		});
		</script>';
	return $return;
}

add_shortcode( 'testimonialgroup', 'alc_testimonial_group' );

function alc_testimonial( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '',
		'position' => '',
        'photo'=>'',
		'company' => '',
		'website'=>'#'
	), $atts));
	
	$x = $GLOBALS['testimonial_count'];
	$GLOBALS['testimonials'][$x] = array( 'title' => sprintf( $title, $GLOBALS['testimonial_count'] ), 'position' => $position, 'website' => $website, 'company' => $company, 'photo'=>$photo, 'content' =>  $content );
	
	$GLOBALS['testimonial_count']++;
}

add_shortcode( 'testimonial', 'alc_testimonial' );

/************************************************/

/******************* Alertbox *******************/

function alc_alert( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"type"=>'',
		"title" => '',
		"anim"=>'',
		"class"=>''
	), $atts));
    $anim = empty($anim) ? '' : "animation $anim";
	$title = empty($title) ? '' : '<h4 class="alert-heading">'.$title.'</h4>';
	$out = '
	<div class="alert '.$type.' '.$anim.' '.$class.'">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		'.$title.do_shortcode($content).'
	</div>';
   return $out;
}
add_shortcode('alert', 'alc_alert');

/************************************************/




/****************** SLIDER ********************/
function alc_slider( $atts, $content ){
	$GLOBALS['slideritem_count'] = 0;
	extract(shortcode_atts(array(
		"anim"=>'',
		"class"=>'',
		"automatic" => 'false',
		"interval" => '7000'
	), $atts));
	do_shortcode( $content );
	$anim = empty($anim) ? '' : "animation $anim";
	
	if( is_array( $GLOBALS['sitems'] ) ){
		$icount = 0;
		foreach( $GLOBALS['sitems'] as $item ){
			$panes[] = '<li><img src="'.$item['image'].'" alt="'.$item['title'].'" />
							<p class="flex-caption">'.$item['title'].'</p>
						</li>';   		
			$icount ++ ;
		}
		$randomId = mt_rand(0, 100000);
		$return ='<div class="flexslidershort '.$anim.' '.$class.'" id="flexslider-'.$randomId.'"><ul class="slides">'.implode( "\n", $panes ).'</ul></div>';	
		unset($GLOBALS['sitems']);
	}
	$return.='
		<script>
		jQuery(document).ready(function() {
			jQuery("#flexslider-'.$randomId.'").flexslider({
			animation: "slide",
			slideshow: '.$automatic.',
			slideshowSpeed: '.$interval.',
			smoothHeight: true,
			
			// Primary Controls
			controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
					
			// Secondary Navigation
			keyboard: true,                 //Boolean: Allow slider navigating via keyboard left/right keys
			multipleKeyboard: false,        //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
			mousewheel: false,              //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
			pausePlay: false,               //Boolean: Create pause/play dynamic element
			pauseText: "Pause",             //String: Set the text for the "pause" pausePlay item
			playText: "Play",               //String: Set the text for the "play" pausePlay item 

			
			// Usability features
			pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
			pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
			useCSS: true,                   //{NEW} Boolean: Slider will use CSS3 transitions if available
			touch: true,                    //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
			video: true,                   //{NEW} Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches
			
			start: function(slider){
				jQuery("body").removeClass("loading");
			}
		 }); 
	});

	
	</script>';
	return $return;
}
add_shortcode('slider', 'alc_slider' );

/****/



function alc_slideritem( $atts, $content ){
	extract(shortcode_atts(array(
		'image' => '',
		'title' => '',
	), $atts));
	
	$x = $GLOBALS['slideritem_count'];
	$GLOBALS['sitems'][$x] = array( 'image' => $image, 'title' => $title, 'content' =>  $content );
	
	$GLOBALS['slideritem_count']++;
	
}
add_shortcode( 'slideritem', 'alc_slideritem' );

/************************************************/


/*******************Carousel********************/

function alc_carousel( $atts, $content ){
	$GLOBALS['caritem_count'] = 0;
	extract(shortcode_atts(array(
		'title' => '',
		'type' => 'custom',
		'automatic' => 'false',
		'min' => '1',
		'showarrows' => 'true',
		'max' => '6',
        'slwidth'=>'257',
        'slmargin'=>'0',
		'anim'=>'',
		'class'=>''
	), $atts));
	$randomId = mt_rand(0, 100000);
	$panes = array();	
	$anim= isset($anim)  ? "animation $anim" : '';
	$return = '';
	do_shortcode ($content);
        if($type=='brands') { $mc='clients';} else{$mc='';}
	if(isset( $GLOBALS['caritems']) && is_array( $GLOBALS['caritems'] ) ){
		$return.='
		<div class="carshort ">
				<ul class="clients-logo customcar'.$randomId.' '.$mc.'" id="'.$type.'" >';
					foreach( $GLOBALS['caritems'] as $item ){
						$panes[] = '<li>'.$item['content'].'</li>'; 
					}
					$return.=implode( "\n", $panes ).'
				</ul>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(".customcar'.$randomId.'").bxSlider({ 
					slideWidth: '.$slwidth.',
					minSlides: '.$min.',
					maxSlides: '.$max.',
					auto: '.$automatic.',
					slideMargin: '.$slmargin.',
					pager:false,
					controls: '.$showarrows.',
					nextText: "",
					prevText:""
				});
				})
		</script>';
	}
	return $return;
}

add_shortcode('carousel', 'alc_carousel' );
/***/

function alc_caritem( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => '',
	), $atts));
	$x = $GLOBALS['caritem_count'];
	$GLOBALS['caritems'][$x] = array('title' => $title, 'content' =>  do_shortcode ($content) );
	$GLOBALS['caritem_count']++;	
}
add_shortcode( 'caritem', 'alc_caritem' );

/************************************************/


/*************** Contact details ****************/

function alc_contact( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"address" => '',
		"tel" => '',
		"email" => '',
		"anim"=>'',
		"class"=>''
	), $atts));	
    $anim = empty($anim) ? '' : "animation $anim";
	$out = '<div class="contact-info-box '.$anim.' '.$class.'">
	<ul class="fa-ul ">';
		if ($address) $out.='<li><i class="fa fa-home"></i>'.$address.'</li>';
		if ($tel) $out.='<li ><i class=" fa fa-phone"></i>'.$tel.'</li>';
		if ($email) $out.='<li><i class=" fa fa-envelope"></i>'.$email.'</li>';
	$out.='</ul></div>';
   return $out;
}
add_shortcode('contact', 'alc_contact');

/************************************************/


/************ FEATURED BLOCK****************/
function alc_fblock($atts, $content=NULL){
    extract(shortcode_atts(array(
		'type'=>'',
		'color'=>'',
        'anim'=>'',
		'title'=>'',
		'icon'=>'',
		'image'=>'',
		'link'=>'',
		'linkcaption' => '',
		'class'=>''
    ), $atts));
	$anim = empty($anim) ? '' : "animation $anim";
	$out='';
	if($type==1){
	$out.='<div class="features-post  '.$anim.' '.$class.'">
			<img src="'.$image.'" alt="'.$title.'">
			<h4 style="color:'.$color.'">'.$title.'</h4>
			<p style="color:'.$color.'">'.do_shortcode($content).'</p>
			<a href="'.$link.'" class="link-icon" style="background:'.$color.'">'.$linkcaption.'</a>
		  </div>';
	}elseif($type==2){
		$out.='<div class="services-section2 '.$anim.' '.$class.'">
					<div class="services-post">
							<span><i class="fa '.$icon.'"></i></span>
							<h2 style="color:'.$color.'">'.$title.'</h2>
							<p style="color:'.$color.'">'.do_shortcode($content).'</p>
							<a href="'.$link.'" style="color:'.$color.'; border-color:'.$color.'">'.$linkcaption.'</a>
						</div>
			   </div>';
	}elseif($type==3) {
		$out.='<div class="fblock3-main '.$anim.' '.$class.'"><div class="fblock3-short ">
				<span><i class="fa '.$icon.'"></i></span>
				<h3>'.$title.'</h3>									
			  </div></div>';
	}
    return $out;
}
add_shortcode('fblock', 'alc_fblock');

/*********************************************************/
/************ SERVICE BLOCK****************/
function alc_sblock($atts, $content=NULL){
    extract(shortcode_atts(array(
		'type'=>'',
		'color'=>'',
        'anim'=>'',
		'title'=>'',
		'icon'=>'',
		'count'=>'',
		'link'=>'',
		'linkcaption' => '',
		'class'=>''
    ), $atts));
	$anim = empty($anim) ? '' : "animation $anim";
	$out='';
	do_shortcode($content);
	if($type==1){
		$out.='
			<div class="services-section '.$anim.'  '.$class.'">
			<div class=" services-post">
				<div class="inner-services-post">
					<span><i class="fa '.$icon.'" style="color:'.$color.'"></i></span>
					<p style="color:'.$color.'">'.$title.'</p>
					<a href="'.$link.'" style="color:'.$color.'; border-color:'.$color.'">'.$linkcaption.'</a>
				</div>
			  </div></div>';
	}
	elseif ($type==2) {
		$out.='<div class="services-section3 '.$anim.'  '.$class.'">
			   <div class=" services-post">
				<div class="up-part">
					<h2>'.$title.'</h2>
					<span><i class="fa '.$icon.'"></i></span>
				</div>
				<a href="'.$link.'">+ '.$linkcaption.'</a>
			  </div></div>';
	}
	elseif ($type=='stat') {
		$out.='<div class="statistic-post '.$anim.'  '.$class.'">
				<span class="icon-stat"><i class="fa '.$icon.'" style="color:'.$color.'"></i></span>
				<p class="counter"><span class="timer" data-from="0" data-to="'.$count.'">'.$count.'</span></p>
				<p>'.$title.'</p>
			  </div>';
	}
	
    return $out;
}
add_shortcode('sblock', 'alc_sblock');

/*********************************************************/

/***************TITLE BLOCK***************************/
function alc_tblock($atts, $content=NULL){
    extract(shortcode_atts(array(
        'anim'=>'',
        'title'=>'', 
        'class'=>'',
    ), $atts));
	$anim = empty($anim) ? '' : "animation $anim";
    $out ='<h2 class="'.$anim.'  '.$class.' " >'.$title.'</h2>';
    
    return $out;
}

add_shortcode('tblock', 'alc_tblock');

/******************************************************/


/*************** Lead paragraph ***********************
function alc_lead($atts, $content=NULL){
    extract(shortcode_atts(array(
        'anim'=>'',
        'color'=>'',
        'position'=>'',
		'customcolor' => '',
        'class'=>'',
    ), $atts));
	$customcolor = (isset($customcolor) && !empty($customcolor))  ? 'color:'.$customcolor.' !important;' : '';
   $anim = empty($anim) ? '' : "animation $anim";
    $out ='<p class="lead '.$color.' '.$position.' '.$anim.' '.$class.'" style="'.$customcolor.'">'.do_shortcode($content).'</p>';
    
    return $out;
}

add_shortcode('lead', 'alc_lead');

/******************************************************/


/****************************REVEAL BOX****************/

function alc_reveal($atts, $content=NULL){
    extract(shortcode_atts(array(
        'type'=>'',
        'size'=>'',
        'color'=>'',
        'button'=>'', 
        'revtitle'=>'',
        'class'=>''
    ), $atts));
    $randomId=  mt_rand(0, 100000);
   
    $out='<a href="#myModal'.$randomId.'"  role="button" data-toggle="modal" class="btn '.$type.' '.$color.' '.$size.' '.$class.'">'.$button.'</a>';
    $out.='<div id="myModal'.$randomId.'"  class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">        
            <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 id="myModalLabel">'.$revtitle.'</h4>
	  </div>
	   <div class="modal-body">
		<p>'.do_shortcode($content).'</p>
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	  </div>
          </div>
          </div>
	 </div>';	
return $out;
}

add_shortcode('reveal', 'alc_reveal');

/*************************************************/

/************** PORTFOLIO LISTING ***************/

function alc_portlisting($atts, $content=NULL){
    extract(shortcode_atts(array(
		"limit" => 6,
		"featured" => 0,
		'anim'=>'',
		'class'=>'',
		'automatic' => 'false',
		), $atts));
 	global $post;
    $anim = empty($anim) ? '' : "animation $anim";
	$return = '';
    $counter = 0; 
	$isActive = '';
	$args = array('post_type' => 'portfolio', 'taxonomy'=> 'portfolio_category', 'showposts' => $limit, 'posts_per_page' => $limit, 'orderby' => 'date','order' => 'DESC');
	
	if ($featured)
	{
		$args['meta_key'] = '_portfolio_featured'; 
		$args['meta_value'] = '1';
	}
	
   	$query = new WP_Query($args);
	$return.='
	<div class="caroursel-work '.$anim.' '.$class.' carshort">
			<ul class="latest-work ">';
				if ($query->have_posts()):  
					while ($query->have_posts()) : 							
					$query->the_post();
					$custom = get_post_custom($post->ID);
					$link = ''; $thumbnail = get_the_post_thumbnail($post->ID, 'portfolio-3-col'); 
					$return.='
					<li>
						<div class="project-post">';
								if (!empty($thumbnail)): 
									$return.=$thumbnail; 
								else :
									 $return.='<img src="http://placehold.it/300x225" alt="'.__ ('No preview image', 'unik').'" />';
								endif;	
								$return.='<div class="hover-box">';
										if( !empty ( $custom['_portfolio_video'][0] ) ) : $link = $custom['_portfolio_video'][0]; 
										$return.='<a href="'.$link.'" class="zoom video" title="'.get_the_title().'">
											<i class="fa fa-film"></i>
										</a>';
									elseif( isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '' ) : 
										$return.='<a href="'.$custom['_portfolio_link'][0].'" class="link" title="'.get_the_title().'">
											<i class="fa fa-external-link "></i>
										</a>';
									elseif(isset( $custom['_portfolio_no_lightbox'][0] )  &&  $custom['_portfolio_no_lightbox'][0] !='' ) : $link = get_permalink(get_the_ID()); 
										$return.='<a href="'.$link.'" class="link" title="'.get_the_title().'">
											<i class="fa fa-file-o "></i>
										</a>';
									else : 
										$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); 
										$link = $full_image[0];
										$return.='<a href="'.$link.'" class="zoomshort"  title="'.get_the_title().'">
											<i class="fa fa-search"></i>
										</a>';
									endif;
								$return.='</div>';
							$return.='
						</div>
					</li>';		
					$counter ++; endwhile; 
				endif;
				$return.='
			</ul>
	</div>
	<script>
		jQuery(document).ready(function(){
			 jQuery(".latest-work").bxSlider({ 
				maxSlides: '.$limit.',
				auto: '.$automatic.',
				pager:false,
				slideWidth:180,
				slideMargin:30,
				nextText: "",
				prevText:""
			});
		});
	</script>';
	
	return $return;
}

add_shortcode('portlist', 'alc_portlisting');
/*************************************************/


/****** SHOW POSTS BY CATEGORY AND COUNT ********/

function alc_list_posts( $atts )
{
	extract( shortcode_atts( array(
		'category' => '',
		'title'=>'',
		'limit' => '5',
		'order' => 'DESC',
		'orderby' => 'date',
		'anim'=>'',
		'class'=>''
	), $atts) );
    $anim = empty($anim) ? '' : "animation $anim";
	$return = '';

	$query = array();

	if ( $category != '' )
		$query[] = 'category=' . $category;

	if ( $limit )
		$query[] = 'numberposts=' . $limit;

	if ( $order )
		$query[] = 'order=' . $order;

	if ( $orderby )
		$query[] = 'orderby=' . $orderby;

	$posts_to_show = get_posts( implode( '&', $query ) );
	$showdate = weblusive_get_option('blog_show_date'); 
	$showcomments = weblusive_get_option('blog_show_comments'); 
	$showauthor = weblusive_get_option('blog_show_author'); 
	$showrmtext = weblusive_get_option('blog_show_rmtext'); 
        
		$return = '
		<div class="related-posts blog-section '.$anim.' '.$class.'">';		
		foreach ($posts_to_show as $ps) 
		{
			$day = get_the_time('d', $ps->ID);
			$month = get_the_time('M', $ps->ID);
			$rmtext = (isset($showrmtext)&& !empty($showrmtext)) ? $showrmtext : 'Read More';
			$mediatype = isset($get_meta["_blog_mediatype"]) ? $get_meta["_blog_mediatype"][0] : 'image';
			$videoId = isset($get_meta["_blog_video"]) ? $get_meta["_blog_video"][0] : ''; 
			$autoplay =  isset($get_meta["_blog_videoap"]) ? $get_meta["_blog_videoap"][0] : '0';
			$return.='<div class="col-md-6"><div class="blog-post">
				<div class="post-box">
					<ul class="post-tags">';
						if(!$showdate): 
							$return.='<li><i class="fa fa-calendar-o"></i>
								<a href="'.get_day_link( $year, $month, $day ).'">'.get_the_date( get_option('date_format'), strtotime( get_the_date() ) ).'</a>
							</li>';
						endif;
						if(!$showauthor): 
							$return.='<li><i class="fa fa-user"></i><span>'.get_the_author($ps->ID).'</span></li>';
						endif;
						if( 'open' == $ps->comment_status && !$showcomments) : 
							$return.='<li><a href="#"><i class="fa fa-comments"></i>'.get_comments_number($ps->ID ).' '.__('Comments', 'unik').'</a></li>';
						endif;
					$return.='</ul>
					<div class="post-gal">';
						$thumbnail = get_the_post_thumbnail($ps->ID); $postmeta = get_post_custom($ps->ID); 
						if(!empty($thumbnail) && !isset($postmeta['_post_video'])):
							$return.=$thumbnail;
						elseif ( $mediatype == "youtube" && $videoId):
							$return.='<iframe width="310" height="223" src="http://www.youtube.com/embed/'.$videoId.'?autoplay='.$autoplay.'" class="vid iframe-youtube"></iframe>';
						elseif ( $mediatype == "vimeo" && $videoId):
							$return.='<iframe  width="310" height="223" src="http://player.vimeo.com/video/'.$videoId.'?autoplay='.$autoplay.'" class="vid iframe-vimeo"></iframe>';
						elseif ( $mediatype == "dailymotion" && $videoId):
							$return.='<iframe  width="310" height="223" src="http://www.dailymotion.com/embed/video/'.$videoId.'?autoplay='.$autoplay.'" class="vid dailymotion-vimeo"></iframe>';
						elseif ( $mediatype == "veoh" && $videoId):
							$return.='<iframe  width="310" height="223" src="http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay='.$autoplay.'&permalinkId='.$videoId.'" class="vid iframe-veoh"></iframe>';
						elseif ( $mediatype == "bliptv" && $videoId):
							$return.='<iframe  width="310" height="223" src="http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/'.$videoId.'?autoplay='.$autoplay.'" class="vid iframe-bliptv"></iframe>';
						elseif ( $mediatype == "viddler" && $videoId):
							$return.='<iframe  width="310" height="223" src="http://www.viddler.com/embed/'.$videoId.'e/?f=1&offset=0&autoplay='.$autoplay.'" class="vid iframe-viddler"></iframe>';
						elseif($mediatype== 'slider' && !empty($thumbnail)):
							$return.='<div class="flexslider">
								<ul class="slides">';
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
											$return.='<li><img src="'.wp_get_attachment_url($attachment->ID, 'full', false, false).'" alt="'.get_post_meta($attachment->ID, '_wp_attachment_image_alt', true).'" /></li>';
										}
									}
									$return.='
								</ul>
							</div>';
						else:
							$return.='<img src="http://placehold.it/310x223" alt="" />';
						endif;
						$return.='
						<div class="hover-post">
							<a href="'.get_permalink( $ps->ID ).'">'.$rmtext.'</a>
						</div>
					</div>
				</div>
				<h2><a href="'.get_permalink( $ps->ID ).'">'.$ps->post_title.'</a></h2>
			</div></div>';
		}
		$return.='</div>';                

	
	return $return;
}

add_shortcode('list_posts', 'alc_list_posts');

/************************************************/


/**************** RELATED POSTS *****************/
function related_posts_shortcode( $atts ) {
 
	extract(shortcode_atts(array(
	    'limit' => '5',
	), $atts));
 
	global $wpdb, $post, $table_prefix, $wp_embed;

	if ($post->ID) {
 
		$retval = '<div class="row">';
 
		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);
 
		// Do the query
		$q = "
			SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p
			WHERE tt.taxonomy ='post_tag'
				AND tt.term_taxonomy_id = tr.term_taxonomy_id
				AND tr.object_id  = p.ID
				AND tt.term_id IN ($tagslist)
				AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";
 
		$related = $wpdb->get_results($q);
 
		if ( $related ) {
			foreach($related as $r) {
				$get_meta = get_post_custom($r->ID);
				$video = isset($get_meta["_blog_video"]) ? $get_meta["_blog_video"][0] : ''; 
				$thumbnail = get_the_post_thumbnail($r->ID, 'blog-medium');
				$retval .= '
				<div class="col-md-4 col-sm-4">
					<div class="related-post-media">';
						if ($video):
							$retval.='<div class="flex-video">'.$wp_embed->run_shortcode('[embed width="262" height="197"]'.$video.'[/embed]').'</div>';	
						else:	
							if ($thumbnail !== ''):
								$retval.=$thumbnail;
							else:	
								$retval.='<img src = "http://placehold.it/550x403" alt="'.__('No Image', 'unik').'" />';
							endif;
						endif;		
					$retval .= '</div>
					<div class="related-post-content">
						<div class="related-post-title"><a href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></div>
						<div class="related-post-meta"><span class="meta-date">'.get_the_time('d M Y', $r->ID).'</span></div>
					</div>
				</div>';
			}
		} else {
			$retval .= '
			<div class="col-md-12"><p>'.__('No related posts for this one', 'unik').'</div>';
		}
		$retval .= '</div>';
		return $retval;
	}
	return;
}
add_shortcode('related_posts', 'related_posts_shortcode');

/*************** SOCIAL BUTTONS *****************/
function alc_social($atts, $content=NULL){
    extract( shortcode_atts( array(
		'anim'=>'',
        'class'=>'',
		'target' => '_blank'
	), $atts) );
    $anim = empty($anim) ? '' : "animation $anim";
    $GLOBALS['socbuttoncount']=0;
	$out = '';
	if ($target) $target = 'target="'.$target.'"';
	do_shortcode ($content);
    if(isset($GLOBALS['soc_buttons']) && is_array($GLOBALS['soc_buttons'])){
        foreach ($GLOBALS['soc_buttons'] as $soc){
            $soclink=$soc['link'];
            $socicon=$soc['icon'];
            $soc_buttons[]="<li><a href=\"$soclink\" $target class=\"".$socicon."\" title=".ucfirst($socicon)."><i class=\"fa fa-$socicon\"></i></a></li>";
        }
        $out='<div class="social-box '.$anim.' '.$class.'"><ul class="social-icons">'.implode("\n", $soc_buttons).'</ul></div>';
		unset($GLOBALS['soc_buttons']);
    }
    return $out;
}

add_shortcode('social', 'alc_social');

/*********************/
function alc_soc_button($atts, $content=NULL){
    extract(shortcode_atts(array(
        'icon'=>'',
        'link'=>''
    ), $atts));
    //do_shortcode ($content);
    $x= $GLOBALS['socbuttoncount'];
    $GLOBALS['soc_buttons'][$x]=array('icon'=> $icon, 'link'=>$link);
    $GLOBALS['socbuttoncount']++;

} 

add_shortcode('soc_button', 'alc_soc_button');
/**************************************************/


/***************** TEAM MEMBERS *******************/
function al_teammember($atts, $content=NULL){
    extract(shortcode_atts(array(
        'name'=>'',
        'phone'=>'',
		'email'=>'',
		'fax'=>'',
		'photo'=>'',
        'desc'=>'',
        'anim'=>'',
        'class'=>''
    ), $atts));
	$GLOBALS['sbcount']=0;
	$anim = empty($anim) ? '' : "animation $anim";
		do_shortcode ($content);
	$out = '';
		$out = '<div class="team-post '.$anim.' '.$class.'">
					<div class="left-part">
						<img class="img-responsive" alt="'.$name.'" src="'.$photo.'">';
						if(is_array($GLOBALS['tmsocbuttons'])){
							foreach ($GLOBALS['tmsocbuttons'] as $soc){
								$tmsocbuttons[]='<li><a href="'.$soc['tmlink'].'" target="_blank" class="'.$soc['tmicon'].'"><i class="fa fa-'.$soc['tmicon'].'"></i></a></li>';
							}
						$out.='<ul class="social-team">'.implode("\n", $tmsocbuttons).'</ul>';
						unset($GLOBALS['tmsocbuttons']);
						}
			$out.='</div>
			<div class="right-part">
				<h3>'.$name.'</h3>
				<ul class="contact-info">';
				if($phone) $out.='<li><i class="fa fa-phone"></i> '.$phone.'</li>';
				if($email) $out.='<li><i class="fa fa-envelope"></i> <a href="#">'.$email.'</a></li>';
				if($fax) $out.='<li><i class="fa fa-print"></i>'.$fax.'</li>';
				$out.='</ul>
					<a href="'.$desc.'">Details</a>
			</div></div>';                            
    return $out;
}

add_shortcode('teammember', 'al_teammember');

function al_tmsocbutton($atts, $content=NULL){
    extract(shortcode_atts(array(
        'tmicon'=>'',
        'tmlink'=>''
    ), $atts));
    
	$x = $GLOBALS['sbcount'] ;
    $GLOBALS['tmsocbuttons'][$x]=array('tmicon'=> $tmicon, 'tmlink'=>$tmlink, 'content' => $content);
    $GLOBALS['sbcount']++;
} 

add_shortcode('tmsocbutton', 'al_tmsocbutton');


/**************************************************/


/********************Ordered list*************
function alc_order( $atts, $content ){
	extract(shortcode_atts(array(
		'style' => '' ,
		'anim'=>'',
		'class'=>''
	), $atts));
	$GLOBALS['orderitem_count'] = 0;
	$anim = empty($anim) ? '' : "animation $anim";
	do_shortcode( $content );
	if( is_array( $GLOBALS['orderitems'] ) ){
		foreach( $GLOBALS['orderitems'] as $orderitem ){
			if ($orderitem['link'] !== ''){
				$orderitems[] = '<li><a href="'.$orderitem['link'].'">'.do_shortcode($orderitem['content']).'</a></li>';
			}
			else{
				$orderitems[] = '<li><span>'.do_shortcode($orderitem['content']).'</span></li>';
			}
		}
		$return = '<ol  class="'.$style.' '.$anim.' '.$class.'">'.implode( "\n", $orderitems ).'</ol>';
		unset($GLOBALS['orderitems']);
	}
	return $return;

}
add_shortcode( 'order', 'alc_order' );
/************

function alc_orderitem( $atts, $content ){
	extract(shortcode_atts(array(
                'link' => '',
	), $atts));
	$x = $GLOBALS['orderitem_count'];
	$GLOBALS['orderitems'][$x] = array('link'=>$link,  'content' =>  $content );
	
	$GLOBALS['orderitem_count']++;
	
}
add_shortcode( 'orderitem', 'alc_orderitem' );


/********************Unordered List*************

function alc_unorder( $atts, $content ){
	extract(shortcode_atts(array(
		'styles' => '',
		'anim'=>'',
		'class'=>''
	), $atts));
	$GLOBALS['unorderitem_count'] = 0;
	$anim = empty($anim) ? '' : "animation $anim";
	do_shortcode( $content );
	
	
	if( is_array( $GLOBALS['unorderitems'] ) ){
		foreach( $GLOBALS['unorderitems'] as $unorderitem ){
			$unorderitems[] ='<li>';
			if($unorderitem['icon']) $unorderitems[].='<i class="fa-li fa '.$unorderitem['icon'].' '.$unorderitem['icolor'].'"></i>';
			
			if ($unorderitem['link'] !== ''){
				$unorderitems[].='<a href="'.$unorderitem['link'].'" class="'.$unorderitem['itemcolor'].'">'.do_shortcode($unorderitem['content']).'</a></li>';	
			}
			else{
				$unorderitems[].='<span class="'.$unorderitem['itemcolor'].'">'.do_shortcode($unorderitem['content']).'</span></li>';	
			}
		}
		$return = '<ul class="'.$styles.' '.$anim.' '.$class.'">'.implode( "\n", $unorderitems ).'</ul>';
		unset($GLOBALS['unorderitems']);
	}
	return $return;

}
add_shortcode( 'unorder', 'alc_unorder' );
/************

function alc_unorderitem( $atts, $content ){
	extract(shortcode_atts(array(
		'link' => '',
		'itemcolor'=>'',
		'icon'=>'',
		'icolor'=>''
	), $atts));
	
	$x = $GLOBALS['unorderitem_count'];
	$GLOBALS['unorderitems'][$x] = array('link'=>$link, 'itemcolor'=>$itemcolor, 'icon'=>$icon, 'icolor'=>$icolor, 'content' =>  $content );
	
	$GLOBALS['unorderitem_count']++;
	
}
add_shortcode( 'unorderitem', 'alc_unorderitem' );

/*********************Blockquote************************

function alc_blockquote( $atts, $content = null ) {
	extract(shortcode_atts(array( 
		'author'=>'',
		'anim'=>'',
		'class'=>'',
		'position' => '',
		'company' => '',
		'align' => '',
		'website' => '#'
	), $atts));
	$anim = empty($anim) ? '' : "animation $anim";
	
	$out='
	<blockquote class="'.$anim.' '.$class.' '.$align.'">
        <p class="blockquote">'.do_shortcode($content).'</p>
        <small>
			'.$author.'
			<cite>'.$position.'</cite> 
			<a href="'.$website.'">'.$company.'</a>
		</small>
	</blockquote>';
	
    return $out;
}
add_shortcode('blockquote', 'alc_blockquote');

/*********************Label************************

function alc_label( $atts, $content = null ) {
 extract(shortcode_atts(array( 
     'color'=>'',
	 'customcolor' => '',
     'anim'=>'',
     'class'=>''
	), $atts));
	
	$customcolor= empty($customcolor)  ? '' : ' style="background-color:'.$customcolor.'"';
	$anim = empty($anim) ? '' : "animation $anim";
	$out='<span class="label '.$color.' '.$anim.' '.$class.'"'.$customcolor.'>'.do_shortcode($content).'</span>';
	
    return $out;
}
add_shortcode('label', 'alc_label');


/******************** Badge ***********************

function alc_badge( $atts, $content = null ) {
 extract(shortcode_atts(array( 
     'color'=>'',
	 'title' => '',
	 'customcolor' => '',
     'anim'=>'',
	 'position' => '',
     'class'=>''
	), $atts));
	
	$customcolor= empty($customcolor)  ? '' : ' style="background-color:'.$customcolor.' !important"';
	$anim = empty($anim) ? '' : "animation $anim";
	$out='<span class="badge '.$color.' '.$anim.' '.$position.' '.$class.'"'.$customcolor.'>'.$title.'</span>';
	
    return $out;
}
add_shortcode('badge', 'alc_badge');

/******************** Jumbotron **********************
function alc_jumbotron( $atts, $content = null ) {
 extract(shortcode_atts(array( 
     'anim'=>'',
     'class'=>''
	), $atts));
	$anim = empty($anim) ? '' : "animation $anim";
	
	$out='<div class="jumbotron '.$anim.' '.$class.'">'.do_shortcode($content).'</div>';
	
    return $out;
}
add_shortcode('jumbotron', 'alc_jumbotron');




/******************** Divider **********************/

function alc_divider( $atts, $content = null ) {
	extract(shortcode_atts(array( 
		'type'=>'',
		'position'=>'',
		'size'=>'',
		'customsize'=>'',
		'anim'=>'',
		'icon' => '',
		'class'=>''
		), $atts)
	);
	$out = '';
	$anim = empty($anim) ? '' : "animation $anim";
	$customsize = (isset($customsize) && !empty($customsize))  ? ' style="padding:'.$customsize.'px 0px !important"' : '';
	if($type=='circle_big'){
		$out='<hr class="'.$position.' '.$anim.' '.$class.'"'.$customsize.'>';
	}
	elseif ($type=='circle_small') {
		$out='<div class="hr-wrapper '.$anim.' '.$class.'"><hr class="'.$position.' hr-short"'.$customsize.'></div>';
	}
	elseif ($type=='hr-fade' || $type=='hr-double') {
		$out='<hr class="'.$type.'  '.$anim.' '.$class.'"'.$customsize.'>';
	}
	elseif ($type=='blank-spacer') {
		$out='<div class="'.$type.' '.$size.' '.$anim.' '.$class.'"'.$customsize.'></div>';
	}
	elseif ($type=='hr-icon') {
		$out='<div class="'.$type.' '.$size.' '.$anim.' '.$class.'"'.$customsize.'><hr/><i class="fa '.$icon.' icon-divider"></i></div>';
	}
	return $out;
}
add_shortcode('divider', 'alc_divider');
/************************************************/


/*********************TOOLTIP*********************

function alc_tooltip($atts, $content=NULL){
    extract(shortcode_atts(array(
        'type'=>'',
        'butcolor'=>'',
        'buttext'=>'',
        'butlink'=>'',
        'icon'=>'',
        'iconpos'=>'',
        'iconcolor'=>'',
        'tooltext'=>'',
        'toolpos'=>'',
        'anim'=>'',
        'class'=>''
    ),$atts));
	$randomId = mt_rand(0, 100000);
    $anim = empty($anim) ? '' : "animation $anim";
	if($type=='simple'){
		$out='<a href="'.$butlink.' " class="tooltip-on btn '.$butcolor.' '.$anim.' '.$class.'" title="'.str_replace('"',"'",do_shortcode($content)).'">'.$buttext.'</a>';
	}elseif ($type=='icon') {
		$out='<div class="tooltip-wrapper"><a href="'.$butlink.'" class="btn '.$butcolor.'">
				'.$buttext.'
				<span class="tooltip-on tooltipster-icon '.$iconpos.' '.$iconcolor.' '.$anim.' '.$class.'" title="'.str_replace('"',"'",do_shortcode($content)).'"><i class="fa '.$icon.'"></i></span>
			  </a></div>';
	}elseif ($type=='fixed-pos') {
		$out='<button class="btn '.$butcolor.' '.$anim.' '.$class.'" title="" data-placement="'.$toolpos.'" data-toggle="tooltip-boot" type="button" data-original-title="'.str_replace('"',"'",do_shortcode($content)).'">'.$buttext.'</button>';
	
	}elseif($type=='popover'){
		$out='<button class="btn '.$butcolor.' '.$anim.' '.$class.'" data-content="'.str_replace('"',"'",do_shortcode($content)).'" data-placement="'.$toolpos.'" data-toggle="popover" data-container="body" type="button" >'.$buttext.'</button>';
	}elseif($type=='text'){
		$out='<a title="" class="'.$anim.' '.$class.'" data-toggle="tooltip-boot" data-placement="'.$toolpos.'" href="'.$butlink.' " data-original-title="'.str_replace('"',"'",do_shortcode($content)).'">'.$buttext.'</a>';
	}
	return $out;
}

add_shortcode('tooltip', 'alc_tooltip');

/************************************************/


/****************** Lightbox ********************

function alc_lightbox( $atts, $content = null ) {
	extract(shortcode_atts(array( 
		'type'=>'',
		'thumbnail'=>'',
		'image'=>'',
		'src'=>'',
		'anim'=>'',
		'class'=>'',
		'alignment' => ''
	), $atts));
    $out = '';
	$anim = empty($anim) ? '' : "animation $anim";
	$src = empty($image) ? $src : $image;
	$out.='<a href="'.$src.'" class="'.$anim.' '.$class.' '.$alignment.'"  data-lightbox="'.$type.'" title="'.do_shortcode($content).'"><img src="'.$thumbnail.'" alt="" class="img-responsive thumbnail"></a>';
	
    return $out;
}
add_shortcode('lightbox', 'alc_lightbox');
/*****************************************/


/************** Thumbnail ****************

function alc_thumbnail( $atts, $content = null ) {
	extract(shortcode_atts(array( 
		'type'=>'',
		'image'=>'',
		'alignment'=>'',
		'tooltip' => '',
		'anim'=>'',
		'alt' => '',
		'class'=>''
	), $atts));
	$anim = empty($anim) ? '' : "animation $anim";
	$out='';
	
	if($type=='text-thumb') $out.='<div class="thumbnail">';
	if ($tooltip){
		$out.='<img alt="'.$alt.'" class="tooltip-on '.$type.' '.$anim.' '.$alignment.' '.$class.'" src="'.$image.'" title="'.$tooltip.'" />';
	}
	else{
		$out.='<img alt="'.$alt.'" class="'.$type.' '.$anim.' '.$alignment.' '.$class.'" src="'.$image.'" />';
	}
	
	if($type=='text-thumb') $out.='<div class="caption">'.do_shortcode($content).'</div></div>';
	
    return $out;
}
add_shortcode('thumbnail', 'alc_thumbnail');
/*****************************************/


/****************** IMAGE ****************

function alc_regimage( $atts, $content = null ) {
 extract(shortcode_atts(array( 
     'alignment'=>'',
     'image'=>'',
	 'alt'=>'',
	 'link'=>'',
	 'tooltip' => '',
     'anim'=>'',
     'class'=>''
	), $atts));
	
	$anim = empty($anim) ? '' : "animation $anim";
	$out = '';
	if ($link) $out.='<a href="'.$link.'">';
	if ($tooltip){
		$out.='<img alt="'.$alt.'" class="tooltip-on '.$alignment.' '.$anim.' '.$class.'" src="'.$image.'" title="'.$tooltip.'" />'; 
	}
	else{
		$out.='<img alt="'.$alt.'" class="'.$alignment.' '.$anim.' '.$class.'" src="'.$image.'" />'; 
	}
	if ($link) $out.='</a>'; 
    return $out;
}
add_shortcode('regimage', 'alc_regimage');


/********************Gallery*************

function alc_smgallery( $atts, $content ){
	extract(shortcode_atts(array( 
		'type'=>'',
		'columns' => '',
		'anim'=>'',
		'class'=>''
	), $atts));
	
    $anim = empty($anim) ? '' : "animation $anim";
	$GLOBALS['smimage_count'] = 0;
	do_shortcode( $content );
	$randomID=  mt_rand(0, 1000);
	$return = '';
	if( is_array( $GLOBALS['smimages'] ) ){
		foreach( $GLOBALS['smimages'] as $smimage ){
			$smimages[]='';
			if($type=='gallery') $smimages[].='<li>';
				$smimages[].= '<a href="'.$smimage['link'].'" title="'.do_shortcode($smimage['content']).'" class="" ><img alt="" src="'.$smimage['link'].'" /></a>';
			if($type=='gallery') $smimages[].='</li>';
		}
       $out = ($type=='gallery') ? '<ul class="'.$type.' '.$columns.' lightbox-gallery '.$anim.' '.$class.'" >' : '<div id="montage-'.$randomID.'" class="'.$type.' lightbox-gallery '.$anim.' '.$class.'">';
       $outend = ($type=='gallery') ? '</ul>' : '</div>';
       $return = $out.implode( "\n", $smimages ).$outend;
		if($type=='simple-gallery'){
			$return.='<script type="text/javascript">
				jQuery(function() {
				
				var $container 	= jQuery("#montage-'.$randomID.'"),
				$imgs		= $container.find("img").hide(),
				totalImgs	= $imgs.length,
				cnt			= 0;
				$imgs.each(function(i) {
					var $img	= jQuery(this);
					gfx(\'<img alt=""/>\').load(function() {
						++cnt;
						if( cnt === totalImgs ) {
							$imgs.show();
							$container.montage({
								minw : 100,
								alternateHeight : true,
								alternateHeightRange : {
									min	: 100,
									max	: 350,
									},
								margin : 0,
								fillLastRow : true
							});

						}
					}).attr("src",$img.attr("src"));
				});	
			});
            </script>';
		}
        unset($GLOBALS['smimages']);        
	}
	return $return;

}
add_shortcode( 'smgallery', 'alc_smgallery' );
/************

function alc_smimage( $atts, $content ){
	extract(shortcode_atts(array(
		'link' => '',
	), $atts));
	
	$x = $GLOBALS['smimage_count'];
	$GLOBALS['smimages'][$x] = array( 'link'=>$link, 'content' =>  $content );
	
	$GLOBALS['smimage_count']++;
}
add_shortcode( 'smimage', 'alc_smimage' );

/**********************PARALLAX*************************
function alc_fullbg($atts, $content=NULL){
		extract(shortcode_atts(array(
			'bgcolor'=>'',
			'bgrepeat'=>'',
			'bgimage'=>'',
			'class'=>'',
			'padding' => '',
			'custompadding' => '',
			'notopborder' => '',
			'scrollspeed' => '0.6',
			'nobottomborder' => '',
			'videourl' => '',
			'mute' => 'true',
			'autoplay' => 'true',
			'loop' => 'false',
			'showcontrols' => 'true',
			'quality' => 'default',
			"height" => '',
			'type' => ''
		), $atts));
		$GLOBALS['sbcount']=0;
		
		do_shortcode ($content);
		$randomId = mt_rand(0, 100000);
		
		$bgcolor = (isset($bgcolor) && $bgcolor!=='') ? ' background-color:'.$bgcolor.' !important;' : '';
		$bgimage = (isset($bgimage) && $bgimage!=='') ? ' background-image:url('.$bgimage.') !important;' : '';
		$bgrepeat = (isset($bgrepeat) && $bgrepeat!=='')? ' background-repeat:'.$bgrepeat.' !important;' : '';
		$height = empty($height) ? '' : 'style="height:'.$height.'px;"';
		
		$elements = $bgcolor.$bgimage.$bgrepeat;
		$custompadding = (isset($custompadding) && !empty($custompadding))  ? ' padding:'.$custompadding.'px !Important' : '';
		$out = '';
		if ($type == 'parallax'){
			$out.= '
			<div class="fullsize padding-none">
				<div class="parallax-wrapper parallax-background '.$class.'" data-stellar-background-ratio="'.$scrollspeed.'" style="'.$elements.'">
					<div class="parallax-wrapper-inner '.$padding.'"  style="'.$custompadding.'" id="'.$randomId.'">'.do_shortcode($content).'</div>
				</div>
			</div>';
		}
		else{
			$out.= '<div class="fullsize fullsize-background '.$notopborder.' '.$nobottomborder.'" style="'.$elements.'">';
				if($type == 'wvideo'){ $out.='<div id="ytwrapper'.$randomId.'" '.$height.'><div id="ytvideo'.$randomId.'" class="player '.$padding.'" style="display:block !important; margin: auto '.$custompadding.'">';}
					$out.= do_shortcode($content);
				if($type == 'wvideo') {$out.='</div></div>';}
			$out.='</div>';
			$out.='<script>
			jQuery(function(){
				jQuery("#ytvideo'.$randomId.'").mb_YTPlayer({
					showControls : '.$showcontrols.',
					videoURL:"'.$videourl.'", 
					containment:"#ytwrapper'.$randomId.'",
					startAt:0,
					mute:'.$mute.',
					autoPlay:'.$autoplay.',
					loop:'.$loop.',
					opacity:1,
					quality:"'.$quality.'"
					}
				);
			});
			</script>';
		}
		
		return $out;
	}

add_shortcode('fullbg', 'alc_fullbg');

/*********************************************************/


/**************************** ICON ***********************/

function alc_smicon( $atts, $content = null ) {
    extract(shortcode_atts(array(
		"icon"=>'',
		"type" => '',
		"color"=>'',
		"size" => '',
		"bgcolor" => '',
		'anim'=>'',
		'class'=>''
	), $atts));
    $anim = empty($anim) ? '' : "animation $anim";
    ($type=='icon-border-round' || $type=='icon-border-radius') ? $cl=$color : $cl=$bgcolor;
	$out = '<div class="icon-wrapper '.$type.' '.$size.' '.$cl.' '.$anim.' '.$class.'"><i class="fa '.$icon.' '.$color.'"></i></div>';
            return $out;
}
add_shortcode('smicon', 'alc_smicon');
/*********************************************************/


/***************** ICON Box *******************/

function alc_iconbox( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'icon'=>'',
		'link'=>'',
        'anim'=>'',
        'class'=>''
	), $atts));
    $anim= isset($anim)  ? "animation $anim" : '';
	$out = '<a href="'.$link.'" class="iconbox '.$anim.' '.$class.'"><i class="fa '.$icon.'"></i></a>';
            return $out;
}
add_shortcode('iconbox', 'alc_iconbox');

/******************************************************/


/********************* CONTACT FORM **********************

function alc_cform( $atts, $content = null ) {
    extract(shortcode_atts(array(
		"email"=>'',
                "subject" => '',
                "success"=>'',
                'anim'=>'',
                'class'=>''
	), $atts));	
    do_shortcode ($content);
   $anim = empty($anim) ? '' : "animation $anim";
	$out = '<form method="POST" action="#" id="contactFormShortcode class="'.$anim.' '.$class.'">
            <div class="cforminfo"><i class="fa fa-envelope color-success"></i>'.$success.'</div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group control-group">
                                <input class="form-control" type="text" name="cformname" id="cformname" placeholder="Name">
                            </div>
                        </div>                        
                        <div class="col-sm-6">
                            <div class="form-group control-group">
                                <input class="form-control" type="text" name="cformemail" id="cformemail" placeholder="Email">
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group control-group">
                                <textarea class="form-control" rows="5" name="cformtext" id="cformtext" placeholder="Message"></textarea>
                            </div>
  			</div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center"><input class="btn btn-primary btn-lg" id="cformsend" type="submit" value="Send Your Message!"></div>
  			</div>                        
                    </div>
                    <div class="loading"></div>
                    <div>
                        <input type="hidden" name="cformcontactemail" id="cformcontactemail" value="'.$email.'" />
                        <input type="hidden" name="cformcontactsubject" id="cformcontactsubject" value="'.$subject.'" />
			<input type="hidden" value="'.home_url().'" id="cformcontactwebsite" name="cformcontactwebsite" />
			<input type="hidden" name="cformcontacturl" id="cformcontacturl" value="'.get_template_directory_uri().'/shortcodes/contact-process.php" />
                    </div>
                    <div class="cformerror"></div>
                    
                </form>';
            return $out;
}
add_shortcode('cform', 'alc_cform');
/*********************************************************

function mapme($attr) {
	$number = mt_rand(0, 100000);
	$randomId = "googlemap".$number;
	// default atts
	$attr = shortcode_atts(array(	
		'lat'   => '0', 
		'lon'    => '0',
		'z' => '14',
		'w' => '300',
		'h' => '300',
		'maptype' => 'ROADMAP',
		'address' => '',
		'kml' => '',
		'marker' => '',
		'markerimage' => '',
		'traffic' => 'no',
		'infowindow' => '',
		'class' => ''
		), $attr);
							
	$returnme = '<div class="map-split"><div id="' .$randomId . '" style="width:' . $attr['w'] . 'px;height:' . $attr['h'] . 'px;" class="'.$attr['class'].'"></div></div>
  
	<script type="text/javascript">
    	var latlng = new google.maps.LatLng(' . $attr['lat'] . ', ' . $attr['lon'] . ');
		var myOptions = {
			zoom: ' . $attr['z'] . ',
			center: latlng,
			mapTypeId: google.maps.MapTypeId.' . $attr['maptype'] . '
		};
		var ' . $randomId . ' = new google.maps.Map(document.getElementById("' . $randomId . '"),
		myOptions);
		';
				
		//kml
		if($attr['kml'] != '') 
		{
			//Wordpress converts "&" into "&#038;", so converting those back
			$thiskml = str_replace("&#038;","&",$attr['kml']);		
			$returnme .= '
			var kmllayer = new google.maps.KmlLayer(\'' . $thiskml . '\');
			kmllayer.setMap(' . $randomId . ');
			';
		}
		
		//traffic
		if($attr['traffic'] == 'yes')
		{
			$returnme .= '
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(' . $randomId . ');
			';
		}
	
		//address
		if($attr['address'] != '')
		{
			$returnme .= '
		    var geocoder_' . $randomId . ' = new google.maps.Geocoder();
			var address = \'' . $attr['address'] . '\';
			geocoder_' . $randomId . '.geocode( { \'address\': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					' . $randomId . '.setCenter(results[0].geometry.location);
					';
					
					if ($attr['marker'] !='')
					{
						//add custom image
						if ($attr['markerimage'] !='')
						{
							$returnme .= 'var image = "'. $attr['markerimage'] .'";';
						}
						$returnme .= '
						var marker = new google.maps.Marker({
							map: ' . $randomId . ', 
							';
							if ($attr['markerimage'] !='')
							{
								$returnme .= 'icon: image,';
							}
						$returnme .= '
							position: ' . $randomId . '.getCenter()
						});
						';

						//infowindow
						if($attr['infowindow'] != '') 
						{
							//first convert and decode html chars
							$thiscontent = htmlspecialchars_decode($attr['infowindow']);
							$returnme .= 'var contentString = \'' . $thiscontent . '\'
								var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
										
							google.maps.event.addListener(marker, \'click\', function() {
							  infowindow.open(' . $randomId . ',marker);
							});
				
							';
						}


					}
			$returnme .= '
				} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
			});
			';
		}

		//marker: show if address is not specified
		if ($attr['marker'] != '' && $attr['address'] == '')
		{
			//add custom image
			if ($attr['markerimage'] !='')
			{
				$returnme .= 'var image = "'. $attr['markerimage'] .'";';
			}

			$returnme .= '
				var marker = new google.maps.Marker({
				map: ' . $arandomId . ', 
				';
				if ($attr['markerimage'] !='')
				{
					$returnme .= 'icon: image,';
				}
			$returnme .= '
				position: ' . $randomId . '.getCenter()
			});
			';

			//infowindow
			if($attr['infowindow'] != '') 
			{
				$returnme .= '
				var contentString = \'' . $attr['infowindow'] . '\';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
							
				google.maps.event.addListener(marker, \'click\', function() {
				  infowindow.open(' . $randomId . ',marker);
				});
	
				';
			}


		}

		$returnme .= '</script>';

		return $returnme;
	?>
    

	<?php
}
add_shortcode('map', 'mapme');

/***********  VIDEOS  ****************/

function alc_video($atts, $content=null) {
	extract(shortcode_atts(array(
			'site' => 'youtube',
			'id' => '',
			'width' => '420',
			'height' => '255',
			'autoplay' => '0',
			"anim"=>'',
			"class"=>''
		), $atts)
	);
        $anim= isset($anim)  ? "animation $anim" : '';
	if ( $site == "youtube" ) { $src = 'http://www.youtube.com/embed/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "vimeo" ) { $src = 'http://player.vimeo.com/video/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "dailymotion" ) { $src = 'http://www.dailymotion.com/embed/video/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "veoh" ) { $src = 'http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay='.$autoplay.'&permalinkId='.$id; }
	else if ( $site == "bliptv" ) { $src = 'http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/'.$id; }
	else if ( $site == "viddler" ) { $src = 'http://www.viddler.com/embed/'.$id.'e/?f=1&offset=0&autoplay='.$autoplay; }
	
	if ( $id != '' ) {
		return '<div class="videoshort '.$anim.' '.$class.'"><iframe width="'.$width.'" height="'.$height.'" src="'.$src.'" class="vid iframe-'.$site.'"></iframe></div>';
	}
}
add_shortcode('evideo','alc_video');

/************************************************/



/************ LOCAL AUDIO (HTML 5) **************/

function alc_audio($atts, $content = null) {
    extract(shortcode_atts(array(
            "title" => '',
			"poster" => '',
			"m4a"  => '',
			"mp3"  => '',
			"ogg"	=> '',
			'anim'=>'',
			'class'=>'',
    ), $atts));
 	
	$poster = ($poster == '') ? get_template_directory_uri().'/images/music.jpg' : $poster;
	$randomId = mt_rand(0, 100000);  
	$return = '	<script type="text/javascript">jQuery(document).ready(function($){
		$("#jquery_jplayer_'.$randomId.'").jPlayer({
			ready: function () {
				$(this).jPlayer("setMedia", {
					m4a: "'.$m4a.'",
					mp3: "'. $mp3 .'",
					oga: "'.$ogg.'",
					poster: "'.$poster.'"
				});
			},
			play: function() { // To avoid both jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			repeat: function(event) { // Override the default jPlayer repeat event handler
				if(event.jPlayer.options.loop) {
					$(this).unbind(".jPlayerRepeat").unbind(".jPlayerNext");
					$(this).bind($.jPlayer.event.ended + ".jPlayer.jPlayerRepeat", function() {
						$(this).jPlayer("play");
					});
				} else {
					$(this).unbind(".jPlayerRepeat").unbind(".jPlayerNext");
					$(this).bind($.jPlayer.event.ended + ".jPlayer.jPlayerNext", function() {
						$("#jquery_jplayer_'.$randomId.'").jPlayer("play", 0);
					});
				}
			},
			swfPath: "'.get_template_directory_uri().'/js/jplayer",
			supplied: "m4a, oga",
			wmode: "window",
			size: {width: "100%",height: "auto",cssClass: "jp-audio-standard"},
			cssSelectorAncestor: "#jp_container_'.$randomId.'"
		});
			});
		</script>';
		
		$return.= '	
		<div class="singlesong six columns '.$anim.' '.$class.'">     
			<div id="jquery_jplayer_'.$randomId.'" class="jp-jplayer"></div>           
			<div id="jp_container_'.$randomId.'" class="jp-audio">
				<div class="jp-type-single">
					<div class="jp-gui jp-interface">
						<ul class="jp-controls">
							<li><a href="javascript:;" class="jp-play" tabindex="1">play></a></li>
							<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
							<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
							<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
							<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
							<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
						</ul>
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
						<div class="jp-time-holder">
							<div class="jp-current-time"></div>
							<div class="jp-duration"></div>
	
							<ul class="jp-toggles">
								<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
								<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
							</ul>
						</div>
					</div>
					<div class="jp-title">
						<ul>
							<li>'.$title.'</li>
						</ul>
					</div>
					<div class="jp-no-solution">
						<span>Update Required</span>
						To play the media you will need to either update your browser to a recent version or update your Flash plugin.
					</div>
				</div>
			</div>
		</div>';
	return $return;
	
}
add_shortcode("audio", "alc_audio"); 

/************************************************/

/************ LOCAL VIDEO (HTML 5) **************/

function alc_sh_video($atts, $content = null) {
    extract(shortcode_atts(array(
            "title" => '',
			"poster" => '',
			"m4v"  => '',
			"mp4"  => '',
			"ogv"	=> '',
			'anim'=>'',
			'class'=>'',
    ), $atts));
 	
	$poster = ($poster == '') ? get_template_directory_uri().'/images/video.jpg' : $poster;
	$randomId = mt_rand(0, 100000);  
	$return = '<script type="text/javascript">jQuery(document).ready(function($){
			$("#jquery_jplayer_'.$randomId.'").jPlayer({
				option: {"fullscreen": true},
				ready: function () {
					$(this).jPlayer("setMedia", {
						m4v: "'.$m4v.'",
						mp4: "'.$mp4.'",
						ogv: "'.$ogv.'",
						poster: "'.$poster.'"
					});
				},
				play: function() { // To avoid both jPlayers playing together.
					$(this).jPlayer("pauseOthers");
				},
				repeat: function(event) { // Override the default jPlayer repeat event handler
					if(event.jPlayer.options.loop) {
						$(this).unbind(".jPlayerRepeat").unbind(".jPlayerNext");
						$(this).bind($.jPlayer.event.ended + ".jPlayer.jPlayerRepeat", function() {
							$(this).jPlayer("play");
						});
					} else {
						$(this).unbind(".jPlayerRepeat").unbind(".jPlayerNext");
						$(this).bind($.jPlayer.event.ended + ".jPlayer.jPlayerNext", function() {
							$("#jquery_jplayer_'.$randomId.'").jPlayer("play", 0);
						});
					}
				},
				swfPath: "'.get_template_directory_uri().'/js/jplayer",
				supplied: "ogv, m4v",
				size: {width: "100%",height: "auto",cssClass: "jp-video-standard"},
				cssSelectorAncestor: "#jp_container_'.$randomId.'"
			});
		});
	</script>';
	
	$return.= '	
	<div class="singlesong featured-image '.$anim.' '.$class.'">
		<div id="jp_container_'.$randomId.'" class="jp-video jp-video-standard filterable-2col-videowrap">
			<div class="jp-type-single">
				<div id="jquery_jplayer_'.$randomId.'" class="jp-jplayer"></div>
				<div class="jp-gui">
					<div class="jp-video-play">
						<a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
					</div>
					<div class="jp-interface">
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>
						<div class="jp-controls-holder">
							<ul class="jp-controls">
								<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
								<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
								<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
								<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
								<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
								<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
							</ul>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
							<ul class="jp-toggles">
								<li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
								<li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
								<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
								<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
							</ul>
						</div>
						<div class="jp-title">
							<ul>
								<li>'.$title.'</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="jp-no-solution">
					<span>Update Required</span>
					To play the media you will need to either update your browser to a recent version or update your Flash plugin.
				</div>
			</div>
		</div>
	</div>';
	return $return;	
}
add_shortcode("shvideo", "alc_sh_video"); 

/************************************************/
/******************** Pricing Tables *********************/

function alc_pricingtable( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '',
		'price'	=> '',
		'submiturl'	=> '',
		'submitcaption'	=> '',
		'anim'=>'',
		'class'=>''
	), $atts));
	$GLOBALS['pcolumn_count'] = 0;
	$anim = empty($anim) ? '' : "animation $anim";
	$return = '';
	do_shortcode( $content );
	if( is_array( $GLOBALS['pcolumns'] ) ){
		foreach( $GLOBALS['pcolumns'] as $pcolumn ){
			$pcolumns[] = '<li class="bullet-item"><p>'.do_shortcode($pcolumn['content']).'</p></li>';
		}
		$return.= '<div class="pricing-section '.$anim.' '.$class.'">
		<ul class="pricing-table basic">
			<li class="title"><p>'.$title.'</p><span>'.$price.'</span></li>
			'.implode( "\n", $pcolumns ).'
			<li class="cta-button"><a class="btn-default" href="'.$submiturl.'">'.$submitcaption.'</a></li>
		</ul></div>';
		unset($GLOBALS['pcolumns']);
		
	}
	return $return;
}
add_shortcode( 'pricingtable', 'alc_pricingtable' );
/*****************/


function alc_pricingcolumn( $atts, $content ){
	$x = $GLOBALS['pcolumn_count'];
	$GLOBALS['pcolumns'][$x] = array('content' =>  $content );
	$GLOBALS['pcolumn_count']++;
}

add_shortcode( 'pricingcolumn', 'alc_pricingcolumn' );
/******************************************************/
/********************featured list*************/
function alc_flist( $atts, $content ){
	extract(shortcode_atts(array(
		'anim'=>'',
		'class'=>''
	), $atts));
	$GLOBALS['flistitem_count'] = 0;
	$anim = empty($anim) ? '' : "animation $anim";
	do_shortcode( $content );
	if( is_array( $GLOBALS['flistitems'] ) ){
		foreach( $GLOBALS['flistitems'] as $flistitem ){
				$flistitems[] = '<li>
									<a href="'.$flistitem['link'].'"><i class="fa '.$flistitem['icon'].'"></i></a>
									<h3>'.$flistitem['title'].'</h3>
									<p>'.do_shortcode($flistitem['content']).'</p>
								 </li>';

		}
		$return = '<ul  class="feature-list '.$anim.' '.$class.'">'.implode( "\n", $flistitems ).'</ul>';
		unset($GLOBALS['flistitems']);
	}
	return $return;

}
add_shortcode( 'flist', 'alc_flist' );
/************/

function alc_flistitem( $atts, $content ){
	extract(shortcode_atts(array(
			'link' => '',
			'title'=>'',
			'icon'=>''
		
	), $atts));
	$x = $GLOBALS['flistitem_count'];
	$GLOBALS['flistitems'][$x] = array('link'=>$link, 'title'=>$title, 'icon'=>$icon,  'content' =>  $content );
	
	$GLOBALS['flistitem_count']++;
	
}
add_shortcode( 'listitem', 'alc_flistitem' );

/*********************** COLUMNS *************************/

function Unik_one_whole( $atts, $content = null ) {
	return '<div class="col-md-12">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_whole', 'Unik_one_whole');


function Unik_one_half( $atts, $content = null ) {
	return '<div class="col-md-6">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'Unik_one_half');

function Unik_one_third( $atts, $content = null ) {
	return '<div class="col-md-4">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'Unik_one_third');

function Unik_two_third( $atts, $content = null ) {
	return '<div class="col-md-8">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'Unik_two_third');

function Unik_one_fourth( $atts, $content = null ) {

	return '<div class="col-md-3">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'Unik_one_fourth');

function Unik_three_fourth( $atts, $content = null ) {
	return '<div class="col-md-9">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'Unik_three_fourth');

function Unik_one_sixth( $atts, $content = null ) {
	
	return '<div class="col-md-2">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'Unik_one_sixth');

function Unik_five_twelveth( $atts, $content = null ) {
	
	return '<div class="col-md-5">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_twelveth', 'Unik_five_twelveth');

function Unik_seven_twelveth( $atts, $content = null ) {
	
	return '<div class="col-md-7">' . do_shortcode($content) . '</div>';
}
add_shortcode('seven_twelveth', 'Unik_seven_twelveth');

function Unik_five_sixth( $atts, $content = null ) {
	
	return '<div class="col-md-10">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'Unik_five_sixth');

function Unik_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'Unik_row');


/************************************************/


/******************** CLEAR *********************/

function alc_clear($atts, $content = null) {	
	return '<div class="clearfix"></div>';
}
add_shortcode('clear', 'alc_clear');


/******** SHORTCODE SUPPORT FOR WIDGETS *********/

if (function_exists ('shortcode_unautop')) {
	add_filter ('widget_text', 'shortcode_unautop');
}
add_filter ('widget_text', 'do_shortcode');

/************************************************/
?>