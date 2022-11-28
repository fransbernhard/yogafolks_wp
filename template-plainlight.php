<?php
    /* Template Name: Ljuslila */
?>

<?php get_header(); ?>

<main class="activities">
    <div class="activities__wrapper">
        <div class="">
            <h1 class="activities__title"><?php the_title(); ?></h1>
            <div class="activities__text">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
