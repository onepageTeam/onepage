<?php
/**
 *
 * Template Name: Flexible content
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 * 
 */

/* Set Bootstrap class */
$col_class = 'col-xs-12 col-sm-'. 12/count( get_field('flexible_content_columns', $pageId));



$content ='';

$content .= '<h1 class="col-xs-6 col-xs-offset-3">'. $pageData->post_title .'</h1>';

$content .= '<div class="content_margin">';
$content .= '<div class="col-xs-12">';
if(get_field('flexible_content_columns_title', $pageId))
    $content .=     '<h2>'. get_field('flexible_content_columns_title', $pageId) .'</h2>';
if(get_field('flexible_content_columns_subtitle', $pageId))
    $content .=     '<h3>'. get_field('flexible_content_columns_subtitle', $pageId) .'</h3>';
$content .= '</div>';


if( have_rows('flexible_content_columns', $pageId) ):
    while ( have_rows('flexible_content_columns', $pageId) ) : the_row();
        $content .= '<div class="'. $col_class .'">';
        if( have_rows('flexible_content_mixed', $pageId) ):
            while ( have_rows('flexible_content_mixed', $pageId) ) : the_row();
                $content .= '<div class="'. get_row_layout() .'">';
                if( get_row_layout() == 'flexible_content_mixed_image' ):
                	$content .=  '<img src="'. get_sub_field('flexible_content_mixed_image') .'" />';
                elseif( get_row_layout() == 'flexible_content_mixed_title' ): 
                    $content .= '<h3>'. (get_sub_field('flexible_content_mixed_title')) .'</h3>';
                elseif( get_row_layout() == 'flexible_content_mixed_text' ): 
                    $content .= nl2br(get_sub_field('flexible_content_mixed_text'));
                elseif( get_row_layout() == 'flexible_content_mixed_video' ): 
                	$content .= get_sub_field('flexible_content_mixed_video');
                endif;
                $content .= '</div>';
            endwhile;
        endif;
        $content .= '</div>';
    endwhile;
    $content .= '</div>';
endif;

echo $content;
?>
