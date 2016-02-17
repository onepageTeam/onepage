<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 */
?>

	</div><!-- .site-content -->

	<footer role="contentinfo">
			<?php
				do_action( 'twentyfifteen_credits' );
			?>
			<p> Copyright &#169; <?php print(date('Y')); ?> <?php bloginfo('name'); ?> <br />
				Blog propulsé par <a href="http://koin.koin/">koin</a> 
				et con&ccedil;u par <a href="http://www.koin.koin">koin</a></p>
	</footer>

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>