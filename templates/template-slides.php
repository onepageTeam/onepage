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
$content .= '<ul class="template_slider" data-slider_options_pause="'. get_field('template_slides_slider_duration', $pageId) .'">';
while ( have_rows('template_slides_repeater', $pageId) ) : the_row();
    $content .= '<li>';
    while ( have_rows('template_slides_flex', $pageId) ) : the_row();

        if( get_row_layout() == 'template_slides_flex_text' ):
            $content .=  '<p>'. get_sub_field('template_slides_flex_text_text', $pageId) .'</p>';
        endif;

        if( get_row_layout() == 'template_slides_flex_quote' ):
            $content .=  '<p class="quote"><span class="img_quote_open"><svg xmlns="http://www.w3.org/2000/svg" version="1"><path d="M24.295 26.864C19.2 21.144 22.71 11.19 26.952 7.342c3.615-3.28 9.605-5.96 10.17-5.024.897 1.49-2.636 2.547-5.293 4.938-3.317 3.586-4.43 5.198.158 7.22 4.92 2.22 5.013 4.392 5.17 7.154.4 6.954-7.89 10.207-12.863 5.234zM5.123 26.765C.028 21.045 3.538 11.09 7.78 7.243c3.614-3.28 9.604-5.96 10.17-5.024.897 1.49-2.636 2.546-5.293 4.937-3.316 3.586-4.43 5.198.16 7.22 4.917 2.22 5.012 4.392 5.17 7.154.398 6.955-7.89 10.208-12.864 5.235z"/></svg></span>'. get_sub_field('template_slides_flex_quote_quote', $pageId) .'</p>';
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
                    $content .=  '<a href="'. get_sub_field('template_slides_flex_btn_file_link', $pageId) .'" class="btn" target="_blank">'. get_sub_field('template_slides_flex_btn_file_link_text', $pageId) .'</a>';
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
