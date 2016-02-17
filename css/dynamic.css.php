<?php
  header('Content-type: text/css');
  // I can access any WP or theme functions
  // here to get values that will be used in
  // dynamic css below
?>
/**
 * THEME SETTINGS 
 **/

<?php
/* Titles */
if(get_field('theme_h1_size', 'option'))
	echo 'h1{font-size:'. get_field('theme_h1_size', 'option') .'px;}' . "\n";
if(get_field('theme_h2_size', 'option'))
	echo 'h2{font-size:'. get_field('theme_h2_size', 'option') .'px;}' . "\n";
if(get_field('theme_h3_size', 'option'))
	echo 'h3{font-size:'. get_field('theme_h3_size', 'option') .'px;}' . "\n";
if(get_field('theme_h4_size', 'option'))
	echo 'h4{font-size:'. get_field('theme_h4_size', 'option') .'px;}' . "\n";
if(get_field('theme_h5_size', 'option'))
	echo 'h5{font-size:'. get_field('theme_h5_size', 'option') .'px;}' . "\n";
if(get_field('theme_h6_size', 'option'))
	echo 'h6{font-size:'. get_field('theme_h6_size', 'option') .'px;}' . "\n";

if(get_field('theme_h1_color', 'option'))
	echo 'h1{color:'. get_field('theme_h1_color', 'option') .';}' . "\n";
if(get_field('theme_h2_color', 'option'))
	echo 'h2{color:'. get_field('theme_h2_color', 'option') .';}' . "\n";
if(get_field('theme_h3_color', 'option'))
	echo 'h3{color:'. get_field('theme_h3_color', 'option') .';}' . "\n";
if(get_field('theme_h4_color', 'option'))
	echo 'h4{color:'. get_field('theme_h4_color', 'option') .';}' . "\n";
if(get_field('theme_h5_color', 'option'))
	echo 'h5{color:'. get_field('theme_h5_color', 'option') .';}' . "\n";
if(get_field('theme_h6_color', 'option'))
	echo 'h6{color:'. get_field('theme_h6_color', 'option') .';}' . "\n";
/*
$theme_h1_other_styles = get_field('theme_h1_other_styles');
if( in_array('uppercase', $theme_h1_other_styles) )
	echo 'h1{text-transform:uppercase;}' . "\n";
if( in_array('underline', $theme_h1_other_styles) )
	echo 'h1{text-decoration:underline;}' . "\n";
if( in_array('bold', $theme_h1_other_styles) )
	echo 'h1{font-weight:600;}' . "\n";
if( in_array('italic', $theme_h1_other_styles) )
	echo 'h1{font-style:italic;}' . "\n";

$theme_h2_other_styles = get_field('theme_h2_other_styles');
if( in_array('uppercase', $theme_h2_other_styles) )
	echo 'h2{text-transform:uppercase;}' . "\n";
if( in_array('underline', $theme_h2_other_styles) )
	echo 'h2{text-decoration:underline;}' . "\n";
if( in_array('bold', $theme_h2_other_styles) )
	echo 'h2{font-weight:600;}' . "\n";
if( in_array('italic', $theme_h2_other_styles) )
	echo 'h2{font-style:italic;}' . "\n";

$theme_h3_other_styles = get_field('theme_h3_other_styles');
if( in_array('uppercase', $theme_h3_other_styles) )
	echo 'h3{text-transform:uppercase;}' . "\n";
if( in_array('underline', $theme_h3_other_styles) )
	echo 'h3{text-decoration:underline;}' . "\n";
if( in_array('bold', $theme_h3_other_styles) )
	echo 'h3{font-weight:600;}' . "\n";
if( in_array('italic', $theme_h3_other_styles) )
	echo 'h3{font-style:italic;}' . "\n";

$theme_h4_other_styles = get_field('theme_h4_other_styles');
if( in_array('uppercase', $theme_h4_other_styles) )
	echo 'h4{text-transform:uppercase;}' . "\n";
if( in_array('underline', $theme_h4_other_styles) )
	echo 'h4{text-decoration:underline;}' . "\n";
if( in_array('bold', $theme_h4_other_styles) )
	echo 'h4{font-weight:600;}' . "\n";
if( in_array('italic', $theme_h4_other_styles) )
	echo 'h4{font-style:italic;}' . "\n";

$theme_h5_other_styles = get_field('theme_h5_other_styles');
if( in_array('uppercase', $theme_h5_other_styles) )
	echo 'h5{text-transform:uppercase;}' . "\n";
if( in_array('underline', $theme_h5_other_styles) )
	echo 'h5{text-decoration:underline;}' . "\n";
if( in_array('bold', $theme_h5_other_styles) )
	echo 'h5{font-weight:600;}' . "\n";
if( in_array('italic', $theme_h5_other_styles) )
	echo 'h5{font-style:italic;}' . "\n";

$theme_h6_other_styles = get_field('theme_h6_other_styles');
if( in_array('uppercase', $theme_h6_other_styles) )
	echo 'h6{text-transform:uppercase;}' . "\n";
if( in_array('underline', $theme_h6_other_styles) )
	echo 'h6{text-decoration:underline;}' . "\n";
if( in_array('bold', $theme_h6_other_styles) )
	echo 'h6{font-weight:600;}' . "\n";
if( in_array('italic', $theme_h6_other_styles) )
	echo 'h6{font-style:italic;}' . "\n";
*/





/* Text */
if(get_field('theme_main_color', 'option'))
	echo 'p{color:'. get_field('theme_main_color', 'option') .';}' . "\n";
/* Link */
if(get_field('theme_link_color', 'option')){
	echo 'a{color:'. get_field('theme_link_color', 'option') .';}' . "\n";
	echo '.ctaLink,.soc li a{background-color:'. get_field('theme_link_color', 'option') .';}' . "\n";
	echo '.ctaLink:hover,.soc li a:hover,#menu-main-menu .active a{color:'. get_field('theme_link_color', 'option') .';}' . "\n";
}
if(get_field('theme_link_color_over', 'option')){
	echo '.ctaLink:hover,.soc li a:hover,#menu-main-menu .active a{background-color:'. get_field('theme_homepage_texte_color', 'option') .';}' . "\n";
}


/* Background */
if( get_field('theme_background_type', 'option') && get_field('theme_background_type', 'option') == 'color' && get_field('theme_background_color', 'option') )
	echo 'body{background-color:'. get_field('theme_background_color', 'option') .';}' . "\n";
?>




/**
 * SECTION BY SECTION
 **/
<?php
$menu_items = wp_get_nav_menu_items('Main Menu');
if( $menu_items ) {
	foreach ( (array) $menu_items as $key => $menu_item ) {
		$pageData = get_post( $menu_item->object_id );
		$pageId = $pageData->ID;
		$background_shape = get_field('shape_type', $pageId);
		$background_type = get_field('background_type', $pageId);
		$section = sanitize_title($menu_item->title);
		/**
		 * Pages Texts, Background and Shape
		 **/

		echo "\n\n\n";
		echo '/****'. $section .'****/'. "\n"
		?>/* Texts */
		<?php
		// p
		echo '#'. $section .', #'. $section .' p{';
		if(get_field("page_setting_p_font_family", $pageId))
			echo 'font-family:"'. get_field("page_setting_p_font_family", $pageId) .'"; ';
		if(get_field("page_setting_p_font_size", $pageId))
			echo 'font-size:'. get_field("page_setting_p_font_size", $pageId) .'px; ';
		if(get_field("page_setting_p_font_color", $pageId))
			echo 'color:'. get_field("page_setting_p_font_color", $pageId) .'; ';
		echo '}'. "\n";

		// Add for slider
		if(get_field("page_setting_p_font_color", $pageId))
			echo '#'. $section .' .bxslider-controls polygon{fill:'. get_field("page_setting_p_font_color", $pageId) .';} '. "\n";

		// a
		if(get_field("page_setting_a_font_color", $pageId)){
			echo '#'. $section .' a{color:'. get_field("page_setting_a_font_color", $pageId) .'; '. "\n";
			/*echo '#'. $section .' .bxslider-controls a:hover polygon{fill:'. get_field("page_setting_a_font_color", $pageId) .';} '. "\n";*/
		}
		
		//h1, h2, h3
		for ($i=1; $i <= 3; $i++) { 
			echo '#'. $section .', #'. $section .' h'. $i .'{';
			if(get_field('page_setting_h'. $i .'_font_family', $pageId))
				echo 'font-family:"'. get_field('page_setting_h'. $i .'_font_family', $pageId) .'"; ';
			if(get_field('page_setting_h'. $i .'_font_size', $pageId))
				echo 'font-size:'. get_field('page_setting_h'. $i .'_font_size', $pageId) .'px; ';
			if(get_field('page_setting_h'. $i .'_font_color', $pageId))
				echo 'color:'. get_field('page_setting_h'. $i .'_font_color', $pageId) .'; ';
			echo '}'. "\n";
		}

		echo "\n";
		?>/* Background color */
		<?php
		if($background_type == 'color')
			echo '#'. $section .' .bgSection{background-color:'. get_field("background_color_int", $pageId) .';}' . "\n";
		if(get_field('background_color_ext', $pageId))
			echo '#'. $section .' .bgSection.shape-tab_up:before, 
				  #'. $section .' .bgSection.shape-tab_down:after,
				  #'. $section .' .bgSection.shape-tab_up_down:before,
				  #'. $section .' .bgSection.shape-tab_up_down:after{background-color:'. get_field("background_color_ext", $pageId) .';}' . "\n";


		echo "\n";
		?>/* Background image */<?php
		if($background_type == 'image')
			echo '#'. $section .' .bgSection > div{background-image:url('. get_field("background_image", $pageId) .');}' . "\n";

		/**
		 * Template Flexible content columns
		 **/
		/* Columns alignment */
		if(get_field('flexible_content_columns_alignment', $pageId))
			echo '#'. $section .' flexible_content_1column, 
				  #'. $section .' .flexible_content_2column, 
				  #'. $section .' .flexible_content_3column, 
				  #'. $section .' .flexible_content_4column, 
				  #'. $section .' .flexible_content_5column, 
				  #'. $section .' .flexible_content_6column{text-align:'. get_field('flexible_content_columns_alignment', $pageId) .';}' . "\n";
		/* INSIDE Columns content alignment */
		if(get_field('flexible_content_inside_columns_content_alignment', $pageId))
			echo '#'. $section .' .flexible_content_column{text-align:'. get_field('flexible_content_inside_columns_content_alignment', $pageId) .';}' . "\n";

	}
}








?>