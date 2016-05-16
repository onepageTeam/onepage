<?php
/**
 * koin
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 */


add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

/**
 * One Page only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}



function call_scripts_and_stylesheets() {
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_script( 'TweenMax', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'ScrollToPlugin', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'main_js', get_template_directory_uri() .'/assets/js/main.js', array(), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'call_scripts_and_stylesheets' );



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
        require dirname( __FILE__ ) . '/inc/dynamic.css.php'; //use echo, printf etc in css.php and write to standard out.
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
function admin_styles() {
	wp_enqueue_style('admin_styles' , get_template_directory_uri().'/assets/css/admin.min.css');
}
add_action('admin_head', 'admin_styles');



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



// Remove link from admin
add_action( 'admin_menu', 'remove_menu_links' );
function remove_menu_links() {
    global $submenu;

    // Remove Comments menu item for all (http://code.tutsplus.com/articles/customizing-the-wordpress-admin-custom-admin-menus--wp-33200)
    remove_menu_page( 'edit-comments.php' );
    // Remove Cutomize
    unset($submenu['themes.php'][6]);

    // Still need to update cap requirements even when hidden
    foreach( $submenu['upload.php'] as $position => $data ) {
        $submenu['upload.php'][$position][1] = 'manage_options';
    }
}



// Rename 'Posts' to 'Blog' in Menu
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





/**********************************************************************************************
 *********************************** CUSTOM FUNCTIONS ***********************************
 ***************************************************************************/


/* Post URLs to IDs function, supports custom post types - borrowed and modified from url_to_postid() in wp-includes/rewrite.php */
function bwp_url_to_postid($url)
{
	global $wp_rewrite;

	$url = apply_filters('url_to_postid', $url);

	// First, check to see if there is a 'p=N' or 'page_id=N' to match against
	if ( preg_match('#[?&](p|page_id|attachment_id)=(\d+)#', $url, $values) )	{
		$id = absint($values[2]);
		if ( $id )
			return $id;
	}

	// Check to see if we are using rewrite rules
	$rewrite = $wp_rewrite->wp_rewrite_rules();

	// Not using rewrite rules, and 'p=N' and 'page_id=N' methods failed, so we're out of options
	if ( empty($rewrite) )
		return 0;

	// Get rid of the #anchor
	$url_split = explode('#', $url);
	$url = $url_split[0];

	// Get rid of URL ?query=string
	$url_split = explode('?', $url);
	$url = $url_split[0];

	// Add 'www.' if it is absent and should be there
	if ( false !== strpos(home_url(), '://www.') && false === strpos($url, '://www.') )
		$url = str_replace('://', '://www.', $url);

	// Strip 'www.' if it is present and shouldn't be
	if ( false === strpos(home_url(), '://www.') )
		$url = str_replace('://www.', '://', $url);

	// Strip 'index.php/' if we're not using path info permalinks
	if ( !$wp_rewrite->using_index_permalinks() )
		$url = str_replace('index.php/', '', $url);

	if ( false !== strpos($url, home_url()) ) {
		// Chop off http://domain.com
		$url = str_replace(home_url(), '', $url);
	} else {
		// Chop off /path/to/blog
		$home_path = parse_url(home_url());
		$home_path = isset( $home_path['path'] ) ? $home_path['path'] : '' ;
		$url = str_replace($home_path, '', $url);
	}

	// Trim leading and lagging slashes
	$url = trim($url, '/');

	$request = $url;
	// Look for matches.
	$request_match = $request;
	foreach ( (array)$rewrite as $match => $query) {
		// If the requesting file is the anchor of the match, prepend it
		// to the path info.
		if ( !empty($url) && ($url != $request) && (strpos($match, $url) === 0) )
			$request_match = $url . '/' . $request;

		if ( preg_match("!^$match!", $request_match, $matches) ) {
			// Got a match.
			// Trim the query of everything up to the '?'.
			$query = preg_replace("!^.+\?!", '', $query);

			// Substitute the substring matches into the query.
			$query = addslashes(WP_MatchesMapRegex::apply($query, $matches));

			// Filter out non-public query vars
			global $wp;
			parse_str($query, $query_vars);
			$query = array();
			foreach ( (array) $query_vars as $key => $value ) {
				if ( in_array($key, $wp->public_query_vars) )
					$query[$key] = $value;
			}

		// Taken from class-wp.php
		foreach ( $GLOBALS['wp_post_types'] as $post_type => $t )
			if ( $t->query_var )
				$post_type_query_vars[$t->query_var] = $post_type;

		foreach ( $wp->public_query_vars as $wpvar ) {
			if ( isset( $wp->extra_query_vars[$wpvar] ) )
				$query[$wpvar] = $wp->extra_query_vars[$wpvar];
			elseif ( isset( $_POST[$wpvar] ) )
				$query[$wpvar] = $_POST[$wpvar];
			elseif ( isset( $_GET[$wpvar] ) )
				$query[$wpvar] = $_GET[$wpvar];
			elseif ( isset( $query_vars[$wpvar] ) )
				$query[$wpvar] = $query_vars[$wpvar];

			if ( !empty( $query[$wpvar] ) ) {
				if ( ! is_array( $query[$wpvar] ) ) {
					$query[$wpvar] = (string) $query[$wpvar];
				} else {
					foreach ( $query[$wpvar] as $vkey => $v ) {
						if ( !is_object( $v ) ) {
							$query[$wpvar][$vkey] = (string) $v;
						}
					}
				}

				if ( isset($post_type_query_vars[$wpvar] ) ) {
					$query['post_type'] = $post_type_query_vars[$wpvar];
					$query['name'] = $query[$wpvar];
				}
			}
		}

			// Do the query
			$query = new WP_Query($query);
			if ( !empty($query->posts) && $query->is_singular )
				return $query->post->ID;
			else
				return 0;
		}
	}
	return 0;
}