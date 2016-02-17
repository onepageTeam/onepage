

<?php
    $menu = wp_get_nav_menu_object( 'Main Menu' );

    $menu_items = wp_get_nav_menu_items($menu->term_id);
    foreach ( (array) $menu_items as $key => $menu_item ) {
		$pageData = get_post( $menu_item->object_id );
		
		$dataToDisplay = '<section id="'. sanitize_title($menu_item->title) .'">';
		$dataToDisplay .= 	'<h1>'. $pageData->post_title .'</h1>';
		$dataToDisplay .= 	'<p>'. $pageData->post_content .'</p>';
		$dataToDisplay .= '</section>';
		echo $dataToDisplay;
    }
?>