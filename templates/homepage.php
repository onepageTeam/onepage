<?php
/**
 *
 * Template Name: homepage
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 * 
 */
?>

<?php /* LOGO */ ?>
<img src="<?php the_field('homepage_logo', $pageId); ?>" alt="<?php the_field('homepage_title', $pageId) ?>" class="logoImg" />

<?php /* TITLE */ ?>
<h1><?php the_field('homepage_title', $pageId) ?></h1>

<?php /* SUBTITLE */ ?>
<p><?php the_field('homepage_subtitle', $pageId) ?></p>

<?php
if( get_field('homepage_cta_show', $pageId) ): ?>
<a href="#<?php echo sanitize_title( str_replace( get_permalink(), '', get_field('homepage_cta_link', $pageId) ) ); ?>" class="ctaLink"><?php the_field('homepage_cta_text', $pageId); ?></a>
<?php 
endif;

if( have_rows('theme_social_icons', 'option') ): ?>
<ul class="socialNetworkLink socicon">
	<?php
	while( have_rows('theme_social_icons', 'option') ): the_row(); ?>
	<li><a href="<?php the_sub_field("theme_social_icons_links") ?>" class="socicon-<?php the_sub_field("theme_social_icons_sites") ?>" target="_blank"></a></li>
	<?php
	endwhile; ?>
</ul> <!-- /.socialNetworkLink -->
<?php
endif;
?>
