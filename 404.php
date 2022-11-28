<?php get_header(); ?>

<main class="main error">
    <section class="section section--error">
        <h1 class="error__title"><?php the_field("error_title", "option"); ?></h1>
        <div class="error__text"><?php the_field("error_text", "option") ?></div>
    </section>
</main>

<?php get_footer(); ?>
