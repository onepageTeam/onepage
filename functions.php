<?php
/**
 * koin
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 */




/**
 * One Page only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}



/**
 * Insert CSS files
 */
function wp_load_all_css(){
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/main-min.css' );
}
add_action( 'wp_enqueue_scripts', 'wp_load_all_css', 1 );



/**
 * Insert JS files
 */
function wp_load_all_js(){
    wp_enqueue_script( 'onepage', get_template_directory_uri() .'/assets/js/main-min.js', $deps = array(), $ver = false, true );
}
add_action( 'wp_enqueue_scripts', 'wp_load_all_js' );



/**********************************************************************************************
 *********************************** CUSTOM SITE ***********************************
 ***************************************************************************/

/**
 * MENU
 */
class description_walker extends Walker_Nav_Menu{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="#'   . esc_attr( sanitize_title($item->title)        ) .'"' : '';

		$prepend = '';
		$append = '';
		$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

		if($depth != 0){
			$description = $append = $prepend = "";
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


/**
 * Shut down comment on pages (not post)
 */
function wpc_comments_closed( $open, $post_id ) {
	$post = get_post( $post_id );
	if ('page' == $post->post_type)
		$open = false;
		return $open;
	}
add_filter('comments_open', 'wpc_comments_closed', 10, 2);








/*
Plugin Name: Dynamic CSS using Ajax
Plugin URI: https://github.com/soderlind/
Description:
Author: Per Soderlind
Version: 0.1.0
Author URI: http://soderlind.no
*/
if ( !defined( 'ABSPATH' ) ) {
    die( 'Cheating, are we?' );
}
define( 'DYNAMICCSS_VERSION', '0.1.0' );

function dynamic_css_enqueue() {
    wp_enqueue_style( 'dynamic-flags', admin_url( 'admin-ajax.php' ).'?action=dynamic_css&_wpnonce=' . wp_create_nonce( 'dynamic-css-nonce' ), false,  DYNAMICCSS_VERSION );
}

function dynamic_css() { // Don't wrap function dynamic_css() in if(!is_admin()){ , the call from admin-ajax.php will be from admin
    $nonce = $_REQUEST['_wpnonce'];
    if ( ! wp_verify_nonce( $nonce, 'dynamic-css-nonce' ) ) {
        die( 'invalid nonce' );
    } else {
        /**
         * NOTE: Using require or include to call an URL ,created by plugins_url() or get_template_directory(), can create the following error:
         *       Warning: require(): http:// wrapper is disabled in the server configuration by allow_url_include=0
         *       Warning: require(http://domain/path/flags/css.php): failed to open stream: no suitable wrapper could be found
         *       Fatal error: require(): Failed opening required 'http://domain/path/css.php'
         */
        require dirname( __FILE__ ) . '/css/dynamic.css.php'; //use echo, printf etc in css.php and write to standard out.
    }
    exit;
}

add_action( 'wp_ajax_dynamic_css', 'dynamic_css' );
add_action( 'wp_ajax_nopriv_dynamic_css', 'dynamic_css' );
add_action( 'wp_enqueue_scripts', 'dynamic_css_enqueue' ); //wp_enqueue_scripts = load on front-end
















/**********************************************************************************************
 *********************************** CUSTOM ADMIN ***********************************
 ***************************************************************************/


/**
 * Custom CSS for admin 
 */
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
	wp_enqueue_style('admin_styles' , get_template_directory_uri().'/css/admin_style.css');
}



/**
 * One Page Menu BACKEND -- KOINKOIN
 */
if ( ! function_exists( 'OnePage_setup' ) ) :
	function OnePage_setup() {
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Main Menu', 'OnePage' )//,
			//'footer'  => __( 'Footer Menu', 'OnePage' ),
		) );
	}
endif; // OnePage_setup
add_action( 'after_setup_theme', 'OnePage_setup' );



// Remove Post meta boxes (https://codex.wordpress.org/Function_Reference/remove_meta_box)
if (is_admin()) :
	function my_remove_meta_boxes() {
	remove_meta_box('pageparentdiv', 'page', 'side');
	}
	add_action( 'admin_menu', 'my_remove_meta_boxes' );
endif;




// Remove link from admin
add_action( 'admin_menu', 'remove_menu_links' );
function remove_menu_links() {
    global $submenu;

    // Remove Comments menu item for all (http://code.tutsplus.com/articles/customizing-the-wordpress-admin-custom-admin-menus--wp-33200)
    remove_menu_page( 'edit-comments.php' );
    // Remove media
    remove_menu_page('upload.php');
    // Remove Cutomize
    unset($submenu['themes.php'][6]);

    // Still need to update cap requirements even when hidden
    foreach( $submenu['upload.php'] as $position => $data ) {
        $submenu['upload.php'][$position][1] = 'manage_options';
    }
}



// Rename Posts to News in Menu
add_action( 'admin_menu', 'wptutsplus_change_post_menu_label' );
function wptutsplus_change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Articles';
    $submenu['edit.php'][10][0] = 'Nouvel article';
}
/*
apply_filters("set_post_connector_from_template", $connector_to_use, $post);*/





/**
 * THEME OPTIONS
 */
/* Create the section for customizing the theme */
if( function_exists('acf_add_options_page') ) {
	/* THEME SETTINGS */
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	/* PRODUCTS
	acf_add_options_page(array(
		'page_title' 	=> 'Products',
		'menu_title'	=> 'Products',
		'menu_slug' 	=> 'products',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Categories',
		'menu_title'	=> 'Categories',
		'parent_slug'	=> 'products',
	)); */
}


