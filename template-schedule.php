<?php 
    /* Template Name: Schema */ 

    $scheduleTypes = get_field('schedule_types');
?>

<?php get_header(); ?>

<main class="schedule">
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <h1 class="schedule__title"><?php the_title(); ?></h1>
            <div class="schedule__content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
