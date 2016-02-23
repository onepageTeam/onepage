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
	echo 'h1{border-bottom-color:'. get_field('theme_h1_color', 'option') .'; color:'. get_field('theme_h1_color', 'option') .';}' . "\n";
if(get_field('theme_h2_color', 'option'))
	echo 'h2{color:'. get_field('theme_h2_color', 'option') .';}' . "\n";
if(get_field('theme_h3_color', 'option'))
	echo 'h3{color:'. get_field('theme_h3_color', 'option') .';} .flexible_content_mixed_video{box-shadow: 15px -12px 0px '. get_field('theme_h3_color', 'option') .';}' . "\n";

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
	/* Links */
	echo 'a{color:'. get_field('theme_link_color', 'option') .';}' . "\n";
	echo 'a:hover{color:'. get_field('theme_link_color_over', 'option') .';}' . "\n";
	/* SVG */
	echo 'svg{fill:'. get_field('theme_link_color', 'option') .';}' . "\n";
	/* Buttons */
	echo '.btn{background-color:'. get_field('theme_link_color', 'option') .'; color:'. get_field('theme_link_color_over', 'option') .';}' . "\n";
	echo '.btn:hover,#menu-main-menu .active a{background-color:'. get_field('theme_link_color_over', 'option') .'; color:'. get_field('theme_link_color', 'option') .';}' . "\n";
}


/* Background */
if( get_field('theme_background_color', 'option') )
	echo 'body{background-color:'. get_field('theme_background_color', 'option') .';}' . "\n";
	echo '.shape_up > :nth-child(2), .shape_down > :nth-child(2){background-color:'. get_field('theme_background_color', 'option') .';}' . "\n";

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

		if( have_rows('page_setting_font_repeater', $pageId) && get_field('page_setting_font_custom', $pageId) ):
			$hasCustomLink = false;
			while ( have_rows('page_setting_font_repeater', $pageId) ) : the_row();
				$tag = get_sub_field('page_setting_font_tag', $pageId);
				if( $tag == 'a' ) {
					$hasCustomLink = true; 
					$page_setting_font_color = get_sub_field("page_setting_font_color", $pageId);
					$page_setting_font_color_hover = get_sub_field("page_setting_font_color_hover", $pageId);
				}
				echo '#'. $section .' '. get_sub_field('page_setting_font_tag', $pageId) .' {';
					if(get_sub_field("page_setting_font_family", $pageId))
						echo 'font-family:"'. get_sub_field("page_setting_font_family", $pageId) .'"; ';
					if(get_sub_field("page_setting_font_size", $pageId))
						echo 'font-size:'. get_sub_field("page_setting_font_size", $pageId) .'px; ';
					if(get_sub_field("page_setting_font_color", $pageId))
						echo 'border-color:'. get_sub_field("page_setting_font_color", $pageId) .'; color:'. get_sub_field("page_setting_font_color", $pageId) .'; ';
				echo '}'. "\n";


			endwhile;

			/* Hover */
			if($hasCustomLink){
			echo $hasCustomLink;
				echo '#'. $section .' a:hover{color:'. $page_setting_font_color_hover .';}' . "\n";
				echo '#'. $section .' svg{fill:'. $page_setting_font_color .';}' . "\n";
				echo '#'. $section .' .btn{background-color:'. $page_setting_font_color_hover .'; color:'. $page_setting_font_color .';}' . "\n";
				echo '#'. $section .' .btn:hover{background-color:'. $page_setting_font_color .'; color:'. $page_setting_font_color_hover .';}' . "\n";
			}

		endif;
	/* Links */
	/*echo 'a{color:'. get_field('theme_link_color', 'option') .';}' . "\n";
	echo 'a:hover{color:'. get_field('theme_link_color_over', 'option') .';}' . "\n";
	/* Buttons *
	echo '.ctaLink,.socicon li a{background-color:'. get_field('theme_link_color', 'option') .'; color:'. get_field('theme_link_color_over', 'option') .';}' . "\n";
	echo '.ctaLink:hover,.socicon li a:hover,#menu-main-menu .active a{background-color:'. get_field('theme_link_color_over', 'option') .'; color:'. get_field('theme_link_color', 'option') .';}' . "\n";*/
		/*echo '#'. $section .', #'. $section .' p{';
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
			/*echo '#'. $section .' .bxslider-controls a:hover polygon{fill:'. get_field("page_setting_a_font_color", $pageId) .';} '. "\n";*
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

		echo "\n";*/
		?>/* Background color */
		<?php
		if($background_type == 'color')
			echo '#'. $section .' .bgSection > div{background-color:'. get_field("background_color_int", $pageId) .';}' . "\n";
			echo '#'. $section .' .shape_up > span, #'. $section .' .shape_down > span{background-color:'. get_field('background_color_int', $pageId) .';}' . "\n";
		echo "\n";
		?>/* Background image */<?php
		if($background_type == 'image')
			echo '#'. $section .' .bgSection > div{background-image:url('. get_field("background_image", $pageId) .');}' . "\n";

		/**
		 * Template Flexible content columns
		 **/
		/* Columns alignment 
		TODO: REVOIR LES SELECTEUR */
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