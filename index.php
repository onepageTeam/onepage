<?php
/**
 * Koin
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 1.1

 Start with page.php
 Each sections are in home-page.php
 */



get_header(); 
?>

<div class="container-fluid">
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
					<section id="<?= sanitize_title($menu_item->title) ?>" class="<?= $templateName ?> row">
						<?php include('inc/background_manager.php'); ?>
						<div class="contentSection row">
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