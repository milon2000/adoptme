<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adopt_Me!
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-footer__social-media">
		<?php if( get_theme_mod( 'facebook_block') != "" ): ?>
				
               <a class="site-footer__social-icon"href="<?php echo get_theme_mod( 'facebook_block'); ?>"target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" /></a>
				
			<?php endif;?>

			<?php if( get_theme_mod( 'instagram_block') != "" ): ?>
				
				<a class="site-footer__social-icon" href="<?php echo get_theme_mod( 'instagram_block'); ?>"target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" /></a>
				 
			 <?php endif;?>
			 <?php if( get_theme_mod( 'twitter_block') != "" ): ?>
				
				<a class="site-footer__social-icon" href="<?php echo get_theme_mod( 'twitter_block'); ?>"target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" /></a>
				 
			 <?php endif;?>
		</div><!--.site-footer__social-media-->
		<div class="site-info">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'adoptme' ), 'Adopt me!', '<a href="http://underscores.me/">Mila Kozlowska</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
