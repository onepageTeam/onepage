<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 */

get_header(); 
?>

<div id="mainContainer">
	<?php
		/* Get all the pages in sections for onePage */
		$menu_items = wp_get_nav_menu_items('Main Menu');
		if( $menu_items ) {
			foreach ( (array) $menu_items as $key => $menu_item ) {
				$pageData = get_post( $menu_item->object_id );
				$pageId = $pageData->ID;
				$templatePath = get_page_template_slug($pageId);
				$templateName = wp_basename( $templatePath, ".php");

				if($pageData->post_status == "publish"){
				?>
					<section id="<?= sanitize_title($menu_item->title) ?>" class="<?= $templateName ?>">
						<?php include('inc/background_manager.php'); ?>
						<div class="contentSection">
							<?php
							/* Display the template used OR display generic content */
							if(!@include($templatePath)){
								/*<h1><?= $pageData->post_title ?></h1>
								<p><?= $pageData->post_content ?></p>*/
							} else{
								/*include('/'. $templatePath);*/
							}

							?>
						</div>
					</section>

				<?php
				}
			}
		}
	?>

</div>

<?php get_footer(); ?>