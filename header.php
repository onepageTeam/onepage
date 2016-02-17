<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 */
?>

<!DOCTYPE> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head <?php language_attributes(); ?>>   
	<title><?php bloginfo('name');
		if (is_404()): ?> &raquo; <?php _e('Not Found');
			elseif (is_home()): ?> &raquo; <?php bloginfo('description');
			else:
			wp_title();
		endif;?>
	</title>   
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Cinzel:400,700' rel='stylesheet' type='text/css'>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /><?php wp_head(); ?>
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); <?php wp_head(); ?>
</head>

<body>
	<header id="mainMenu">
		<div id="nav-toggle" href="#"><span></span></div>
		<?php
		/* Remplace basic menu by the Walker */
		wp_nav_menu( array(
			'container' 		=> 'nav',
			'container_id'		=> '',
			'container_class'	=> '',
			'theme_location'	=> 'Main Menu',
			'menu'				=> 'Main Menu',
			'menu_id' 			=> '',
			'menu_class' 		=> false,
			'echo' 				=> true,
			'before' 			=> '',
			'after' 			=> '',
			'link_before' 		=> '',
			'link_after' 		=> '',
			'depth' 			=> 1,
			'walker' 			=> new description_walker())
		);
		?>
	</header>