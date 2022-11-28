<?php
    /* Template Name: Mörklila */
?>

<?php get_header(); ?>

<main class="memberships" style="min-height: 100vh;">
    <div class="memberships__wrapper">
        <div class="">
            <h1 class="memberships__title"><?php the_title(); ?></h1>
            <div class="memberships__text">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
