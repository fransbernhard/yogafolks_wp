<?php
    /* Template Name: Business */
?>

<?php get_header(); ?>

<main class="business">
    <div class="business__hero">
        <?= get_the_post_thumbnail(null, "full"); ?>
    </div>
    <div class="business__wrapper">
        <div class="business__content">
            <h1 class="business__title"><?php the_title(); ?></h1>
            <div class="wysiwyg">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

