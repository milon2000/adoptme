<?php get_header(); ?>

<section class="about__text-area">
    <?php if( get_theme_mod( 'about_block') != "" ): ?>
                    <p class=" adoptme__text about__text">
                    <?php echo get_theme_mod( 'about_block'); ?>
    </p>
    <?php endif;?>
    <button class="adoptme__button about__button">Read More</button>
</section><!--.quotation-text-area-->

<section class="how-it-works">
    <div class="how-it-works__wrapper">

        <div class="how-it-works__column">
            <figure class="how-it-works__img"><img src="<?php echo get_template_directory_uri(); ?>/images/cats1.png" /></figure>
            <h4 class="how-it-works__title">Match the cat</h4>
            <p class="how-it-works__description">Ut enim ad minima veniam, quis nostrum exercitationem ullam.</p>
        </div><!--.how-it-works__column-->

        <div class="how-it-works__column">
        <figure class="how-it-works__img"><img src="<?php echo get_template_directory_uri(); ?>/images/cats2.png" /></figure>
            <h4 class="how-it-works__title">Fill in the questionnaire</h4>
            <p class="how-it-works__description">Ut enim ad minima veniam, quis nostrum exercitationem ullam.</p>
        </div><!--.how-it-works__column-->

        <div class="how-it-works__column">
        <figure class="how-it-works__img"><img src="<?php echo get_template_directory_uri(); ?>/images/cats3.png" /></figure>
            <h4 class="how-it-works__title">Pick up the cat</h4>
            <p class="how-it-works__description">Ut enim ad minima veniam, quis nostrum exercitationem ullam.</p>
        </div><!--.how-it-works__column-->

    </div><!--.how-it-works__wrapper-->
</section><!--how-it-works-->


<section class="featured-cat">
<?php
$args = array(
    'post_type' => 'project',
    'orderby' => 'rand',
    'posts_per_page'=> 1
    
);


$my_query = new WP_Query($args);

    while($my_query->have_posts()){
      
        $my_query->the_post(); ?>

        <div class="featured-cat__wrapper">
            <div class="featured-cat__cat-description">
            <h3 class="featured-cat__title"><?php the_title();?></h3>
            <p class="adoptme__text featured-cat__description">eaque ipsa beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
            <a href="<?php the_permalink();?>"><button class="adoptme__button featured-cat__button">Adopt me</button></a>
            
        
    </div><!--.featured-cat__cat-description-->
    <figure class="featured-cat__cat-photo">
            <img src="<?php the_post_thumbnail_url();?>"/>
        </figure><!--.featured-cat__cat-photo-->
        </div><!--.featured-cat__wrapper-->
        <?php
      
  } wp_reset_query();?>
    </section>


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


<?php get_footer(); ?>