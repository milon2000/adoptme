<?php
/**
 * Template Name: Project layout
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hairball!
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main-project">

		<section class="cats">
<div class="cats__wrapper">
<ul class="cats__single">

<?php
$args = array(
    'post_type' => 'project',
    'post_per_page' => 50,
    'nopaging' => true, 
);
$projects = new WP_Query($args);

while($projects->have_posts()) {
    $projects->the_post();

?>
  

        <li class="cats__list"><a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $size = 'companies_thumb');?>"><div><h3 class="cats__title"><?php the_title();?></h3></div></a></li>
        
    <?php } wp_reset_query();?>
    </ul><!--.cats__single-->

</div><!--.cats__wrapper-->

</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();