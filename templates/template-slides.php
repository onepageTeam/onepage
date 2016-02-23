<?php
/**
 *
 * Template Name: Slides
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 * 
 */

$content ='';

// check if the flexible content field has rows of data
echo '<h1>'. $pageData->post_title .'</h1>';

if( have_rows('template_slides_slides', $pageId) ):
    $content .= '<ul class="template_slider">';
    while ( have_rows('template_slides_slides', $pageId) ) : the_row();
		$content .= '<li>';
        if( get_sub_field('template_slides_Slide_title', $pageId) )
            $content .=  '<h2>'. get_sub_field('template_slides_Slide_title', $pageId) .'</h2>';
        if( get_sub_field('template_slides_text', $pageId) )
            $content .=  '<h2>'. get_sub_field('template_slides_text', $pageId) .'</h2>';
        $content .= '</li>';
    endwhile;
    $content .= '</ul>';
endif;


echo $content;
?>
