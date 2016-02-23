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
$content .= '<h1 class="col-xs-6 col-xs-offset-3">'. $pageData->post_title .'</h1>';

$content .= '<div class="content_margin text-'. $extraClass_title_alignment .'">';
$content .= '<div class="col-xs-12">';
if(get_field('template_slides_title', $pageId))
    $content .=     '<h2>'. get_field('template_slides_title', $pageId) .'</h2>';
if(get_field('template_slides_subtitle', $pageId))
    $content .=     '<h3>'. get_field('template_slides_subtitle', $pageId) .'</h3>';
$content .= '</div>';




if( get_field('template_slides_gallery_types', $pageId) == 'text' ):
echo 'test';
    if( have_rows('template_slides_text_gallery', $pageId) ):
        $content .= '<ul class="template_slider">';
        while ( have_rows('template_slides_text_gallery', $pageId) ) : the_row();
            $content .= '<li>';
            if( get_sub_field('template_slides_text_gallery_text', $pageId) )
                $content .=  '<h4>'. get_sub_field('template_slides_text_gallery_text', $pageId) .'</h4>';
            if( get_sub_field('template_slides_text_gallery_author', $pageId) )
                $content .=  '<p>'. get_sub_field('template_slides_text_gallery_author', $pageId) .'</p>';
            $content .= '</li>';
        endwhile;
        $content .= '</ul>';
    endif;

endif;






echo $content;
?>
