<?php get_header(); ?>

<main class="single-treatment">
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <?php
                $bookLink = get_field('book_link');
            ?>
            <div class="single-treatment__hero">
                <?= get_the_post_thumbnail(null, "full"); ?>
            </div>
            <div class="single-treatment__wrapper">
                <div class="single-treatment__content">
                    <h1 class="single-treatment__title"><?php the_title(); ?></h1>
                    <div class="wysiwyg">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php if(!empty($bookLink)): ?>
                    <a
                        class="single-treatment__link"
                        href=<?= $bookLink['url']; ?>
                    ><?= __('Book'); ?></a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
