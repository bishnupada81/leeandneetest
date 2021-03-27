<?php 
/*
*Template Name: test
*/
get_header() ?>

<?php while(have_posts()):the_post(); ?>
<div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="hero-content">
        <div class="hero-text">
        <h1><?php the_title() ?></h1>
        </div>
    </div>
</div>
<div class="main-content container">
    <main class="text-center content-text">
         <p><?php the_content() ?></p>
    </main>
</div>
<?Php endwhile; ?>

<div class="our-client container">
    <div class="container-grid">
        <?php
        $args = array(
            'post_type' => 'test',
            'posts_per_page' => -1,
            'orderby' =>'title',
            'order' => 'ASC'
        );
        $client = new WP_Query($args);
        while($client->have_posts()):$client->the_post();?>
            <div class="content">
                <div class="thumbnail-image"><?php the_post_thumbnail('test'); ?></div>
                <h5><?php the_title(); ?></h5>
                <p><?php the_content(); ?></p>
            </div>
        <?php endwhile; wp_reset_postdata(); 
        ?>
    </div>
</div>

<?php get_footer() ?>