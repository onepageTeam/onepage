<?php
$background_shape = get_field('shape_type', $pageId);
$background_type = get_field('background_type', $pageId);
$background_color_ext = get_field('background_color_ext', $pageId);

if( !isset($template_slider_number) ){
	/*$template_slider_number = 0;*/
}

$content = '<div class="bgSection '. $background_shape .' '. $background_type .' '. $background_color_ext .'">';

switch ($background_type) {
	case 'color':
		$content .= '<div></div>';

		break;
	
	case 'image':
		$content .= '<div></div>';

		break;
	
	case 'slider':
		$containerStyle = '';
		$background_slider_imgs = get_field('background_slider_imgs', $pageId);
		$background_slider_duration = get_field('background_slider_duration', $pageId);

		$content .= '<div class="container">';
        $content .= '<ul class="template_slider" data-background_slider_duration="'. $background_slider_duration .'">';
		foreach( $background_slider_imgs as $image ):
            $content .= '<li style="background-image:url('. $image['sizes']['large'] .');">';
            $content .= '</li>';
        endforeach;
        $content .= '</ul>';
        $content .= '</div>';

		// Check .bxslider-controls also bellow

		break;
	
	case 'video':
		$content .= '<div class="container">';
		/*$content .= '<iframe src="http://www.youtube.com/embed/841VcS9IxDc?autoplay=1&controls=0&loop=1&showinfo=0&modestbranding=1&disablekb=1&enablejsapi=1&playerapiid=ytplayer&version=3&fs=0" type="text/html" frameborder="0" class="bgVideo"></iframe>';
		$content .= '<iframe
							 src="//www.youtube.com/embed/841VcS9IxDc?autoplay=1&controls=0&enablejsapi=0&fs=0&loop=1&modestbranding=1&rel=0&showinfo=0&iv_load_policy=3"
frameborder="0" allowfullscreen class="bgVideo">';*/
		$content .= 	$background;
		$content .= '</div>'; // .container

		break;
	
	default:
		# code...
		break;
}

$content .= '</div>'; // /.bgSection

if($background_type == 'slider') {
	$content .= '<div class="bxslider-controls">';
	$content .= 	'<a href="#" class="template_slider_btn_prev"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 197.402 197.402" xml:space="preserve"><polygon points="146.883,197.402 45.255,98.698 146.883,0 152.148,5.418 56.109,98.698 152.148,191.98"/></svg></a>';
	$content .= 	'<a href="#" class="template_slider_btn_next"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 197.402 197.402" xml:space="preserve"><polygon points="146.883,197.402 45.255,98.698 146.883,0 152.148,5.418 56.109,98.698 152.148,191.98"/></svg></a>';
	$content .= '</div>'; // /.bgSection
}

echo $content;
?>
