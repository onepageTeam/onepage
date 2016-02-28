<?php
/**
 *
 * Template Name: Blog
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 * 
 */
?>


<h2>Recent Posts</h2>
<ul>
<?php
	$args = array( 'numberposts' => '5' );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
	}
?>
</ul>