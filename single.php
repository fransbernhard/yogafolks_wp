<?php get_header(); ?>

<main class="single">
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <?php
                $glofox_link = get_field('glofox_link');
            ?>
            <div class="single__hero">
                <?= get_the_post_thumbnail(null, "full"); ?>
            </div>
            <div class="single__wrapper">
                <div class="single__content">
                    <h1 class="single__title"><?php the_title(); ?></h1>
                    <div class="wysiwyg">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php if(!empty($glofox_link)): ?>
                    <a
                        class="single__link"
                        href=<?= $glofox_link; ?>
                    ><?= __('Book'); ?></a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer();?>
