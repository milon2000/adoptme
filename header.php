<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adopt_Me!
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adoptme' ); ?></a>

	<header id="masthead" class="site-header">
	
		<div class="site-branding">
		<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$adoptme_description = get_bloginfo( 'description', 'display' );
			if ( $adoptme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $adoptme_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<div class="nav-toggle">
		<div class="nav-toggle-bar"></div>
		</div><!--.nav-toggle-->
		<nav id="site-navigation" class="nav">
		
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
			<div class="social-media">
		<?php if( get_theme_mod( 'facebook_block') != "" ): ?>
				
               <a class="social-icon"href="<?php echo get_theme_mod( 'facebook_block'); ?>"target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" /></a>
				
			<?php endif;?>

			<?php if( get_theme_mod( 'instagram_block') != "" ): ?>
				
				<a class="social-icon" href="<?php echo get_theme_mod( 'instagram_block'); ?>"target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" /></a>
				 
			 <?php endif;?>
			 <?php if( get_theme_mod( 'twitter_block') != "" ): ?>
				
				<a class="social-icon" href="<?php echo get_theme_mod( 'twitter_block'); ?>"target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" /></a>
				 
			 <?php endif;?>
		</div><!--.site-footer__social-media-->
		</nav><!-- #site-navigation -->
		
	

	<?php if ( get_header_image() && is_front_page() ) : ?>
		<div class="header-section">

			<figure class="header-image">
				<?php the_header_image_tag(); ?>
			</figure><!--.header-image-->

			<figure class="header-quotation">

			<?php if( get_theme_mod( 'header_quot_block') != "" ): ?>
				<q class="site-quotation"><span>
                <?php echo get_theme_mod( 'header_quot_block'); ?>
				</span></q>
			<?php endif;?>
				
			<?php if( get_theme_mod( 'header_author_block') != "" ): ?>
				<figcaption class="quotation-author">
                <?php echo get_theme_mod( 'header_author_block'); ?>
				</figcaption>
			<?php endif;?>		
			
				
			</figure><!--header-quotation-->
			
		</div><!--.header-section-->

	<?php endif; // End header image check. ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
