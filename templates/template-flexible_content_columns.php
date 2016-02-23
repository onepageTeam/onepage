<?php
/**
 *
 * Template Name: Flexible content columns
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 * 
 */

$content ='';

// check if the flexible content field has rows of data
echo '<h1>'. $pageData->post_title .'</h1>';

if(get_field('flexible_content_columns_title', $pageId))
    echo '<h2>'. get_field('flexible_content_columns_title', $pageId) .'</h2>';
if(get_field('flexible_content_columns_subtitle', $pageId))
    echo '<h3>'. get_field('flexible_content_columns_subtitle', $pageId) .'</h3>';



if( have_rows('flexible_content_columns', $pageId) ):
    $content .= '<div class="flexible_content_'. count( get_field('flexible_content_columns', $pageId) ) .'column">';

    while ( have_rows('flexible_content_columns', $pageId) ) : the_row();
        $content .= '<div class="flexible_content_column">';

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
