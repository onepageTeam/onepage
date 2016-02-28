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

$content .= '<div class="col-xs-8 col-xs-offset-2 text-'. $extraClass_title_alignment .'">';
if(get_field('template_slides_title', $pageId))
    $content .=     '<h2>'. get_field('template_slides_title', $pageId) .'</h2>';
if(get_field('template_slides_subtitle', $pageId))
    $content .=     '<h3>'. get_field('template_slides_subtitle', $pageId) .'</h3>';
$content .= '</div>';



$content .= '<div class="col-xs-8 col-xs-offset-2 text-'. $extraClass_title_alignment .'">';
$content .= '<ul class="template_slider" data-slider_options_pause="0">';
while ( have_rows('template_slides_repeater', $pageId) ) : the_row();
    $content .= '<li>';
    while ( have_rows('template_slides_flex', $pageId) ) : the_row();

        if( get_row_layout() == 'template_slides_flex_text' ):
            $content .=  '<p>'. get_sub_field('template_slides_flex_text_text', $pageId) .'</p>';
        endif;

        if( get_row_layout() == 'template_slides_flex_quote' ):
            $content .=  '<p class="quote">'. get_sub_field('template_slides_flex_quote_quote', $pageId) .'</p>';
            $content .=  '<p class="author">'. get_sub_field('template_slides_flex_quote_author', $pageId) .'</p>';
        endif;

        if( get_row_layout() == 'template_slides_flex_btn' ):
            switch ( get_sub_field('template_slides_flex_btn_choice') ) {
                case 'internal_link':
                    $post_id_of_link = bwp_url_to_postid( get_sub_field('template_slides_flex_btn_internal_link', $pageId) );
                    $anchor .=  esc_attr( sanitize_title( get_the_title($post_id_of_link) ) );
                    $content .=  '<a href="#'. $anchor .'" class="btn">'. get_sub_field('template_slides_flex_btn_internal_link_text', $pageId) .'</a>';
                    $url = get_sub_field('template_slides_flex_btn_internal_link', $pageId);

                    break;
                case 'external_link':
                    $content .=  '<a href="'. get_sub_field('template_slides_flex_btn_external_link', $pageId) .'" class="btn" target="_blank">'. get_sub_field('template_slides_flex_btn_external_link_text', $pageId) .'</a>';
                    break;
                case 'file':
                    $content .=  '<a href="'. get_sub_field('template_slides_flex_btn_internal_link', $pageId) .'" class="btn">'. get_sub_field('template_slides_flex_btn_internal_link_text', $pageId) .'</a>';
                    break;
                
                default:
                    # code...
                    break;
            }

        endif;

    endwhile;
    $content .= '</li>';
endwhile;
$content .= '</ul>';
$content .=     '<div class="bxslider-controls">';
$content .=         '<a href="#" class="template_slider_btn_prev"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 197.402 197.402" xml:space="preserve"><polygon points="146.883,197.402 45.255,98.698 146.883,0 152.148,5.418 56.109,98.698 152.148,191.98"/></svg></a>';
$content .=         '<a href="#" class="template_slider_btn_next"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 197.402 197.402" xml:space="preserve"><polygon points="146.883,197.402 45.255,98.698 146.883,0 152.148,5.418 56.109,98.698 152.148,191.98"/></svg></a>';
$content .=     '</div>';
$content .= '</div>';







echo $content;
?>
