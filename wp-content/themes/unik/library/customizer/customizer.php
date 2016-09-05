<?php
function weblusive_customize($wp_manager){
	// remove unnecessary core sections & controls
        $wp_manager->remove_section( 'nav');
		$wp_manager->remove_section( 'title_tagline');
        $wp_manager->remove_section( 'static_front_page');
/**********************MAIN COLOR*************************/
		$wp_manager->add_section('main_color', array(
		'title'=>'Main Color',
		'priority'       => 1,
	));
	 
		 // Color control
        $wp_manager->add_setting( 'global_color', array(
            'default'        => '#8ab928',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'global_color', array(
            'label'   => 'Global theme color',
            'section' => 'main_color',
            'settings'   => 'global_color',
            'priority' => 2
        ) ) );
		
/***********************CUSTOM BACKGROUND****************/
	$wp_manager->add_section('cus_bg', array(
		'title'=>'Custom Background',
		'priority'       => 2,
	));
	 // WP_Customize_Image_Control
        $wp_manager->add_setting( 'bg_image', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'bg_image', array(
            'label'   => 'Background Image',
            'section' => 'cus_bg',
            'settings'   => 'bg_image',
            'priority' => 1
        ) ) );
		$wp_manager->add_setting( 'bg_repeat', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'bg_repeat', array(
            'label'   => 'Repeat',
            'section' => 'cus_bg',
            'type'    => 'select',
            'choices' => array(""=>"" ,"repeat"=>"repeat","no-repeat"=>"no-repeat","repeat-x"=>"repeat-x","repeat-y"=>"repeat-y"),
            'priority' => 2
        ) );
		$wp_manager->add_setting( 'bg_att', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'bg_att', array(
            'label'   => 'Attachment',
            'section' => 'cus_bg',
            'type'    => 'select',
            'choices' => array(""=>"" ,"fixed"=>"Fixed","scroll"=>"scroll"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'bg_hor', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'bg_hor', array(
            'label'   => 'Position Horizontal',
            'section' => 'cus_bg',
            'type'    => 'select',
            'choices' => array(""=>"" ,"left"=>"Left","right"=>"Right","center"=>"Center"),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'bg_ver', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'bg_ver', array(
            'label'   => 'Position Vertical',
            'section' => 'cus_bg',
            'type'    => 'select',
            'choices' => array(""=>"" ,"top"=>"Top","center"=>"center","bottom"=>"Bottom"),
            'priority' => 5
        ) );
		$wp_manager->add_setting('bg_size', array(
			'default'=>false,
			'transport' => 'refresh',
		));
		$wp_manager->add_control('bg_size',array(
			'type' => 'checkbox',
			'label' => 'Full screen background',
			'section' => 'cus_bg',
			'priority' => 6
		));
		
		 // Color control
        $wp_manager->add_setting( 'bg_color', array(
            'default'        => '#d9dcd7',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'bg_color', array(
            'label'   => 'Background Color',
            'section' => 'cus_bg',
            'settings'   => 'bg_color',
            'priority' => 7
        ) ) );
/******************************HEADER STYLING***********************/
		$wp_manager->add_section('header_bg', array(
		'title'=>'Header Background',
		'priority'       => 3,
	));
	 // WP_Customize_Image_Control
        $wp_manager->add_setting( 'header_bg_image', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'header_bg_image', array(
            'label'   => 'Header Background Image',
            'section' => 'header_bg',
            'settings'   => 'header_bg_image',
            'priority' => 1
        ) ) );
		$wp_manager->add_setting( 'header_bg_repeat', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'header_bg_repeat', array(
            'label'   => 'Repeat',
            'section' => 'header_bg',
            'type'    => 'select',
            'choices' => array(""=>"" ,"repeat"=>"repeat","no-repeat"=>"no-repeat","repeat-x"=>"repeat-x","repeat-y"=>"repeat-y"),
            'priority' => 2
        ) );
		$wp_manager->add_setting( 'header_bg_att', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'header_bg_att', array(
            'label'   => 'Attachment',
            'section' => 'header_bg',
            'type'    => 'select',
            'choices' => array(""=>"" ,"fixed"=>"Fixed","scroll"=>"scroll"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'header_bg_hor', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'header_bg_hor', array(
            'label'   => 'Position Horizontal',
            'section' => 'header_bg',
            'type'    => 'select',
            'choices' => array(""=>"" ,"left"=>"Left","right"=>"Right","center"=>"Center"),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'header_bg_ver', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'header_bg_ver', array(
            'label'   => 'Position Vertical',
            'section' => 'header_bg',
            'type'    => 'select',
            'choices' => array(""=>"" ,"top"=>"Top","center"=>"center","bottom"=>"Bottom"),
            'priority' => 5
        ) );
		
		 // Color control
        $wp_manager->add_setting( 'header_bg_color', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'header_bg_color', array(
            'label'   => 'Header Background Color',
            'section' => 'header_bg',
            'settings'   => 'header_bg_color',
            'priority' => 6
        ) ) );
/**************************TOP NAVIGATION SECTION************
		$wp_manager->add_section('top_nav', array(
		'title'=>'Top Bar Styling',
		'priority'       => 4,
	));
	 // WP_Customize_Image_Control
        $wp_manager->add_setting( 'topnav_bg_image', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'topnav_bg_image', array(
            'label'   => 'Background Image',
            'section' => 'top_nav',
            'settings'   => 'topnav_bg_image',
            'priority' => 1
        ) ) );
		 // Color control
        $wp_manager->add_setting( 'topnav_bg_color', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'topnav_bg_color', array(
            'label'   => 'Background Color',
            'section' => 'top_nav',
            'settings'   => 'topnav_bg_color',
            'priority' => 2
        ) ) );
		 // links color
        $wp_manager->add_setting( 'topnav_link_color', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'topnav_link_color', array(
            'label'   => 'Links Color',
            'section' => 'top_nav',
            'settings'   => 'topnav_link_color',
            'priority' => 3
        ) ) );
		 // links color
        $wp_manager->add_setting( 'topnav_link_color_hov', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'topnav_link_color_hov', array(
            'label'   => 'Links Color on mouse over',
            'section' => 'top_nav',
            'settings'   => 'topnav_link_color_hov',
            'priority' => 4
        ) ) );
		$wp_manager->add_setting( 'topnav_text', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );
		$wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'topnav_text', array(
            'label'   => 'Text color',
            'section' => 'top_nav',
            'settings'   => 'topnav_text',
            'priority' => 5
        ) ) );

/*************************MAIN NAVIGATION****************/
		$wp_manager->add_section('alc_nav', array(
		'title'=>'Main Navigation Styling',
		'priority'       => 5,
	));
		 // links color
        $wp_manager->add_setting( 'nav_links_color', array(
            'default'        => '#ffffff',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_links_color', array(
            'label'   => 'Top menu Color',
            'section' => 'alc_nav',
            'settings'   => 'nav_links_color',
            'priority' => 1
        ) ) );
		 $wp_manager->add_setting( 'nav_shadow_color', array(
            'default'        => '',
			 'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_shadow_color', array(
            'label'   => 'Top menu Shadow Color',
            'section' => 'alc_nav',
            'settings'   => 'nav_shadow_color',
            'priority' => 2
        ) ) );
		
		 $wp_manager->add_setting( 'nav_links_color_hover', array(
            'default'        => '',
			'transport' => 'refresh',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_links_color_hover', array(
            'label'   => 'Top menu mouseover color',
            'section' => 'alc_nav',
            'settings'   => 'nav_links_color_hover',
            'priority' => 3
        ) ) );
		
		
		 $wp_manager->add_setting( 'nav_shadow_color_hover', array(
            'default'        => '',
			'transport' => 'refresh',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_shadow_color_hover', array(
            'label'   => 'Top menu Shadow mouseover color',
            'section' => 'alc_nav',
            'settings'   => 'nav_shadow_color_hover',
            'priority' => 4
        ) ) );
		
		 $wp_manager->add_setting( 'nav_current_links_color', array(
            'default'        => '',
			 'transport' => 'refresh',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_current_links_color', array(
            'label'   => 'Top menu current link color',
            'section' => 'alc_nav',
            'settings'   => 'nav_current_links_color',
            'priority' => 5
        ) ) );
		
		 $wp_manager->add_setting( 'nav_current_bg', array(
            'default'        => '',
			'transport' => 'refresh',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_current_bg', array(
            'label'   => 'Top menu current link background',
            'section' => 'alc_nav',
            'settings'   => 'nav_current_bg',
            'priority' => 6
        ) ) );
		
		 $wp_manager->add_setting( 'nav_current_shadow_color', array(
            'default'        => '',
			'transport' => 'refresh',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_current_shadow_color', array(
            'label'   => 'Top menu current link shadow color',
            'section' => 'alc_nav',
            'settings'   => 'nav_current_shadow_color',
            'priority' => 7
        ) ) );
		
		 $wp_manager->add_setting( 'sub_nav_background', array(
            'default'        => '#8ab928',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'sub_nav_background', array(
            'label'   => 'Sub Menu Background',
            'section' => 'alc_nav',
            'settings'   => 'sub_nav_background',
            'priority' => 8
        ) ) );
		
		 $wp_manager->add_setting( 'sub_nav_color', array(
            'default'        => '#ffffff',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'sub_nav_color', array(
            'label'   => 'Sub Menu color',
            'section' => 'alc_nav',
            'settings'   => 'sub_nav_color',
            'priority' => 9
        ) ) );
		
		 $wp_manager->add_setting( 'nav_separator', array(
            'default'        => '',
			 'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_separator', array(
            'label'   => 'Link Divider Color',
            'section' => 'alc_nav',
            'settings'   => 'nav_separator',
            'priority' => 10
        ) ) );
/*************************CONTENT STYLING******************/
		$wp_manager->add_section('alc_content', array(
		'title'=>'Content Styling',
		'priority'       => 6,
	));
	 // WP_Customize_Image_Control
        $wp_manager->add_setting( 'title_content_bg_image', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'title_content_bg_image', array(
            'label'   => 'Title/Breadcrumb Block Background Image',
            'section' => 'alc_content',
            'settings'   => 'title_content_bg_image',
            'priority' => 1
        ) ) );
		$wp_manager->add_setting( 'title_content_bg_repeat', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'title_content_bg_repeat', array(
            'label'   => 'Repeat',
            'section' => 'alc_content',
            'type'    => 'select',
            'choices' => array(""=>"" ,"repeat"=>"repeat","no-repeat"=>"no-repeat","repeat-x"=>"repeat-x","repeat-y"=>"repeat-y"),
            'priority' => 2
        ) );
		$wp_manager->add_setting( 'title_content_bg_att', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'title_content_bg_att', array(
            'label'   => 'Attachment',
            'section' => 'alc_content',
            'type'    => 'select',
            'choices' => array(""=>"" ,"fixed"=>"Fixed","scroll"=>"scroll"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'title_content_bg_hor', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'title_content_bg_hor', array(
            'label'   => 'Position Horizontal',
            'section' => 'alc_content',
            'type'    => 'select',
            'choices' => array(""=>"" ,"left"=>"Left","right"=>"Right","center"=>"Center"),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'title_content_bg_ver', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'title_content_bg_ver', array(
            'label'   => 'Position Vertical',
            'section' => 'alc_content',
            'type'    => 'select',
            'choices' => array(""=>"" ,"top"=>"Top","center"=>"center","bottom"=>"Bottom"),
            'priority' => 5
        ) );
		 // Color control
        $wp_manager->add_setting( 'title_content_bg_color', array(
            'default'        => '#ffffff',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'main_content_bg_color', array(
            'label'   => 'Title/Breadcrumb Block Background Color',
            'section' => 'alc_content',
            'settings'   => 'title_content_bg_color',
            'priority' => 6
        ) ) );
		  $wp_manager->add_setting( 'promo_bg_image', array(
            'default'        => '',
			  'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'promo_bg_image', array(
            'label'   => 'Promo Block Background Image',
            'section' => 'alc_content',
            'settings'   => 'promo_bg_image',
            'priority' => 7
        ) ) );
		$wp_manager->add_setting( 'promo_bg_repeat', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'promo_bg_repeat', array(
            'label'   => 'Repeat',
            'section' => 'alc_content',
            'type'    => 'select',
            'choices' => array(""=>"" ,"repeat"=>"repeat","no-repeat"=>"no-repeat","repeat-x"=>"repeat-x","repeat-y"=>"repeat-y"),
            'priority' => 8
        ) );
		$wp_manager->add_setting( 'promo_bg_att', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'promo_bg_att', array(
            'label'   => 'Attachment',
            'section' => 'alc_content',
            'type'    => 'select',
            'choices' => array(""=>"" ,"fixed"=>"Fixed","scroll"=>"scroll"),
            'priority' => 9
        ) );
		$wp_manager->add_setting( 'promo_bg_hor', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'promo_bg_hor', array(
            'label'   => 'Position Horizontal',
            'section' => 'alc_content',
            'type'    => 'select',
            'choices' => array(""=>"" ,"left"=>"Left","right"=>"Right","center"=>"Center"),
            'priority' => 10
        ) );
		$wp_manager->add_setting( 'promo_bg_ver', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'promo_bg_ver', array(
            'label'   => 'Position Vertical',
            'section' => 'alc_content',
            'type'    => 'select',
            'choices' => array(""=>"" ,"top"=>"Top","center"=>"center","bottom"=>"Bottom"),
            'priority' => 11
        ) );
		 // Color control
        $wp_manager->add_setting( 'promo_bg_color', array(
            'default'        => '#8ab928',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'promo_bg_color', array(
            'label'   => 'Promo Block Background Color',
            'section' => 'alc_content',
            'settings'   => 'promo_bg_color',
            'priority' => 12
        ) ) );
/*********************FOOTER STYLING********************/
		$wp_manager->add_section('alc_footer', array(
		'title'=>'Footer Styling',
		'priority'       => 7,
	));
	 // WP_Customize_Image_Control
        $wp_manager->add_setting( 'footer_bg_image', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'footer_bg_image', array(
            'label'   => 'Footer Background Image',
            'section' => 'alc_footer',
            'settings'   => 'footer_bg_image',
            'priority' => 1
        ) ) );
		$wp_manager->add_setting( 'footer_bg_repeat', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'footer_bg_repeat', array(
            'label'   => 'Repeat',
            'section' => 'alc_footer',
            'type'    => 'select',
            'choices' => array(""=>"" ,"repeat"=>"repeat","no-repeat"=>"no-repeat","repeat-x"=>"repeat-x","repeat-y"=>"repeat-y"),
            'priority' => 2
        ) );
		$wp_manager->add_setting( 'footer_bg_att', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'footer_bg_att', array(
            'label'   => 'Attachment',
            'section' => 'alc_footer',
            'type'    => 'select',
            'choices' => array(""=>"" ,"fixed"=>"Fixed","scroll"=>"scroll"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'footer_bg_hor', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'footer_bg_hor', array(
            'label'   => 'Position Horizontal',
            'section' => 'alc_footer',
            'type'    => 'select',
            'choices' => array(""=>"" ,"left"=>"Left","right"=>"Right","center"=>"Center"),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'footer_bg_ver', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'footer_bg_ver', array(
            'label'   => 'Position Vertical',
            'section' => 'alc_footer',
            'type'    => 'select',
            'choices' => array(""=>"" ,"top"=>"Top","center"=>"center","bottom"=>"Bottom"),
            'priority' => 5
        ) );
		 // Color control
        $wp_manager->add_setting( 'footer_bg_color', array(
            'default'        => '#8ab928',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'footer_bg_color', array(
            'label'   => 'Footer Background Color',
            'section' => 'alc_footer',
            'settings'   => 'footer_bg_color',
            'priority' => 6
        ) ) );
		$wp_manager->add_setting( 'footer_title_color', array(
            'default'        => '#ffffff',
			'transport' => 'postMessage',
        ) );
		$wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'footer_title_color', array(
            'label'   => 'Footer Widget Title color',
            'section' => 'alc_footer',
            'settings'   => 'footer_title_color',
            'priority' => 7
        ) ) );
		 // links color
        $wp_manager->add_setting( 'footer_links_color', array(
            'default'        =>' #ffffff',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'footer_links_color', array(
            'label'   => 'Footer Links Color',
            'section' => 'alc_footer',
            'settings'   => 'footer_links_color',
            'priority' => 8
        ) ) );
		 // links color
        $wp_manager->add_setting( 'footer_links_color_hov', array(
            'default'        => '#ffffff',
			'transport' => 'refresh',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'footer_link_color_hov', array(
            'label'   => 'Footer Links Color on mouse over',
            'section' => 'alc_footer',
            'settings'   => 'footer_links_color_hov',
            'priority' => 9
        ) ) );
		
/***********************LINK SECTION*****************/
		
		$wp_manager->add_section('alc_link', array(
		'title'=>'Links Styling',
		'priority'       => 8,
	));
		 // links color
        $wp_manager->add_setting( 'link_color', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'link_color', array(
            'label'   => 'Links Color',
            'section' => 'alc_link',
            'settings'   => 'link_color',
            'priority' => 1
        ) ) );
		
		//links decoration
		$wp_manager->add_setting( 'link_decor', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'link_decor', array(
            'label'   => 'Links Decoration',
            'section' => 'alc_link',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through"),
            'priority' => 2
        ) );
		 // links color hover
        $wp_manager->add_setting( 'link_color_hov', array(
            'default'        => '',
			'transport' => 'refresh',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'link_color_hov', array(
            'label'   => 'Links Color on mouse over',
            'section' => 'alc_link',
            'settings'   => 'link_color_hov',
            'priority' => 3
        ) ) );
		
		//links decoration
		$wp_manager->add_setting( 'link_decor_hov', array(
            'default'        => '',
			'transport' => 'refresh',
        ) );

        $wp_manager->add_control( 'link_decor_hov', array(
            'label'   => 'Links Decoration on mouse over',
            'section' => 'alc_link',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through"),
            'priority' => 4
        ) );
/**************************************************************/
/**************************TYPOGRAPHY***************************************/
require_once('google_font_list.php');
/*main typography*/
		$wp_manager->add_section('main_typ', array(
		'title'=>'Main Typography',
		'priority'       => 9,
		));
		$wp_manager->add_setting( 'main_typ_col', array(
            'default'        => '#919191',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'main_typ_col', array(
            'label'   => 'Color',
            'section' => 'main_typ',
            'settings'   => 'main_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'main_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'main_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'main_typ',
            'settings'   => 'main_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'main_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'main_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'main_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'main_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'main_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'main_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'main_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'main_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'main_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*textual logo*/
		$wp_manager->add_section('log_typ', array(
		'title'=>'Textual Logo',
		'priority'       => 10,
		));
		$wp_manager->add_setting( 'log_typ_col', array(
            'default'        => '#444444',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'log_typ_col', array(
            'label'   => 'Color',
            'section' => 'log_typ',
            'settings'   => 'log_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'log_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'log_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'log_typ',
            'settings'   => 'log_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'log_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'log_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'log_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'log_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'log_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'log_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'log_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'log_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'log_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*main navigation*/
		$wp_manager->add_section('nav_typ', array(
		'title'=>'Main Navigation Typography',
		'priority'       => 11,
		));
		$wp_manager->add_setting( 'nav_typ_col', array(
            'default'        => '#ffffff',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'nav_typ_col', array(
            'label'   => 'Color',
            'section' => 'nav_typ',
            'settings'   => 'nav_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'nav_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'nav_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'nav_typ',
            'settings'   => 'nav_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'nav_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'nav_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'nav_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'nav_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'nav_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'nav_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'nav_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'nav_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'nav_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*ptit styling*/
		$wp_manager->add_section('ptit_typ', array(
		'title'=>'Page Title',
		'priority'       => 12,
		));
		$wp_manager->add_setting( 'ptit_typ_col', array(
            'default'        => '#ffffff',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'ptit_typ_col', array(
            'label'   => 'Color',
            'section' => 'ptit_typ',
            'settings'   => 'ptit_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'ptit_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'ptit_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'ptit_typ',
            'settings'   => 'ptit_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'ptit_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'ptit_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'ptit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'ptit_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'ptit_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'ptit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'ptit_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'ptit_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'ptit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*bredcrumb styling*/
		$wp_manager->add_section('bred_typ', array(
		'title'=>'Breadcrumb',
		'priority'       => 13,
		));
		$wp_manager->add_setting( 'bred_typ_col', array(
            'default'        => '#ffffff',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'bred_typ_col', array(
            'label'   => 'Color',
            'section' => 'bred_typ',
            'settings'   => 'bred_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'bred_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'bred_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'bred_typ',
            'settings'   => 'bred_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'bred_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'bred_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'bred_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'bred_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'bred_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'bred_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'bred_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'bred_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'bred_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*Widget Title styling*/
		$wp_manager->add_section('wtit_typ', array(
		'title'=>'Widget Title',
		'priority'       => 14,
		));
		$wp_manager->add_setting( 'wtit_typ_col', array(
            'default'        => '#444444',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'wtit_typ_col', array(
            'label'   => 'Color',
            'section' => 'wtit_typ',
            'settings'   => 'wtit_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'wtit_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'wtit_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'wtit_typ',
            'settings'   => 'wtit_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'wtit_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'wtit_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'wtit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'wtit_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'wtit_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'wtit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'wtit_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'wtit_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'wtit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*ftit styling*/
		$wp_manager->add_section('ftit_typ', array(
		'title'=>'Footer Widget Title',
		'priority'       => 15,
		));
		$wp_manager->add_setting( 'ftit_typ_col', array(
            'default'        => '#ffffff',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'ftit_typ_col', array(
            'label'   => 'Color',
            'section' => 'ftit_typ',
            'settings'   => 'ftit_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'ftit_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'ftit_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'ftit_typ',
            'settings'   => 'ftit_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'ftit_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'ftit_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'ftit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'ftit_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'ftit_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'ftit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'ftit_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'ftit_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'ftit_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*h1 styling*/
		$wp_manager->add_section('h1_typ', array(
		'title'=>'H1 styling',
		'priority'       => 16,
		));
		$wp_manager->add_setting( 'h1_typ_col', array(
            'default'        => '#000000',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'h1_typ_col', array(
            'label'   => 'Color',
            'section' => 'h1_typ',
            'settings'   => 'h1_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'h1_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'h1_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'h1_typ',
            'settings'   => 'h1_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'h1_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h1_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'h1_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'h1_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h1_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'h1_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'h1_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h1_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'h1_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*h2 styling*/
		$wp_manager->add_section('h2_typ', array(
		'title'=>'H2 styling',
		'priority'       => 17,
		));
		$wp_manager->add_setting( 'h2_typ_col', array(
            'default'        => '#000000',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'h2_typ_col', array(
            'label'   => 'Color',
            'section' => 'h2_typ',
            'settings'   => 'h2_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'h2_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'h2_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'h2_typ',
            'settings'   => 'h2_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'h2_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h2_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'h2_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'h2_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h2_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'h2_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'h2_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h2_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'h2_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*h3 styling*/
		$wp_manager->add_section('h3_typ', array(
		'title'=>'H3 styling',
		'priority'       => 18,
		));
		$wp_manager->add_setting( 'h3_typ_col', array(
            'default'        => '#000000',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'h3_typ_col', array(
            'label'   => 'Color',
            'section' => 'h3_typ',
            'settings'   => 'h3_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'h3_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'h3_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'h3_typ',
            'settings'   => 'h3_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'h3_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h3_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'h3_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'h3_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h3_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'h3_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'h3_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h3_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'h3_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*h4 styling*/
		$wp_manager->add_section('h4_typ', array(
		'title'=>'H4 styling',
		'priority'       => 19,
		));
		$wp_manager->add_setting( 'h4_typ_col', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'h4_typ_col', array(
            'label'   => 'Color',
            'section' => 'h4_typ',
            'settings'   => 'h4_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'h4_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'h4_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'h4_typ',
            'settings'   => 'h4_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'h4_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h4_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'h4_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'h4_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h4_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'h4_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'h4_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h4_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'h4_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*h5 styling*/
		$wp_manager->add_section('h5_typ', array(
		'title'=>'H5 styling',
		'priority'       => 20,
		));
		$wp_manager->add_setting( 'h5_typ_col', array(
            'default'        => '#000000',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'h5_typ_col', array(
            'label'   => 'Color',
            'section' => 'h5_typ',
            'settings'   => 'h5_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'h5_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'h5_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'h5_typ',
            'settings'   => 'h5_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'h5_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h5_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'h5_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'h5_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h5_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'h5_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'h5_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h5_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'h5_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );
/*h6 styling*/
		$wp_manager->add_section('h6_typ', array(
		'title'=>'H6 styling',
		'priority'       => 21,
		));
		$wp_manager->add_setting( 'h6_typ_col', array(
            'default'        => '#000000',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'h6_typ_col', array(
            'label'   => 'Color',
            'section' => 'h6_typ',
            'settings'   => 'h6_typ_col',
            'priority' => 1
        ) ) );
        $wp_manager->add_setting( 'h6_typ_font', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( new Google_Fonts_List_Control( $wp_manager, 'h6_typ_font', array(
            'label'   => 'Font Family',
            'section' => 'h6_typ',
            'settings'   => 'h6_typ_font',
            'priority' => 2
        ) ) );
		$wp_manager->add_setting( 'h6_typ_size', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h6_typ_size', array(
            'label'   => 'Font Size',
            'section' => 'h6_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31", "32"=>"32", "33"=>"33", "34"=>"34", "35"=>"35", "36"=>"36", "37"=>"37", "38"=>"38", "39"=>"39", "40"=>"40", "41"=>"41", "42"=>"42", "43"=>"43", "44"=>"44", "45"=>"45", "46"=>"46", "47"=>"47", "48"=>"48", "49"=>"49", "50"=>"50", "51"=>"51", "52"=>"52", "53"=>"53", "54"=>"54", "55"=>"55", "56"=>"56", "57"=>"57", "58"=>"58", "59"=>"59", "60"=>"60", "61"=>"61", "62"=>"62", "63"=>"63", "64"=>"64", "65"=>"65", "66"=>"66", "67"=>"67", "68"=>"68", "69"=>"69", "70"=>"70", "71"=>"71", "72"=>"72", "73"=>"73", "74"=>"74", "75"=>"75", "76"=>"76", "77"=>"77", "78"=>"78", "79"=>"79", "80"=>"80", "81"=>"81", "82"=>"82", "83"=>"83", "84"=>"84", "85"=>"85", "86"=>"86", "87"=>"87", "88"=>"88", "89"=>"89", "90"=>"90", "91"=>"91", "92"=>"92", "93"=>"93", "94"=>"94", "95"=>"95", "96"=>"96", "97"=>"97", "98"=>"98", "99"=>"99", "100"=>"100"),
            'priority' => 3
        ) );
		$wp_manager->add_setting( 'h6_typ_weight', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h6_typ_weight', array(
            'label'   => 'Font Weight',
            'section' => 'h6_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal", "bold"=>"Bold","lighter"=>"Lighter","bolder"=>"Bolder", "100"=>"100", "200"=>"200", "300"=>"300", "400"=>"400", "500"=>"500", "600"=>"600", "700"=>"700", "800"=>"800", "900"=>"900" ),
            'priority' => 4
        ) );
		$wp_manager->add_setting( 'h6_typ_style', array(
            'default'        => '',
			'transport' => 'postMessage',
        ) );

        $wp_manager->add_control( 'h6_typ_style', array(
            'label'   => 'Font Style',
            'section' => 'h6_typ',
            'type'    => 'select',
            'choices' => array(""=>"Default" ,"normal"=>"Normal","italic"=>"Italic","oblique"=>"Oblique"),
            'priority' => 5
        ) );

}
add_action( 'customize_register', 'weblusive_customize' );


/******************************Live prieview***********************/
 function weblusive_live_preview() {
      wp_enqueue_script( 
           'weblusive-live-customizer', // Give the script a unique ID
           get_template_directory_uri() . '/library/customizer/js/customizer-live.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional) 
           true // Specify whether to put in footer (leave this true)
      );
   }
add_action( 'customize_preview_init', 'weblusive_live_preview' );
function include_style(){
	include  ('generate_style.php'); 
}
add_action( 'wp_head', 'include_style');
?>
