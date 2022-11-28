<?php
    /* Template Name: Treatments */

    global $post;

    $categories = get_categories([
        'taxonomy' => "treatment_category",
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => true
    ]);

    $activeCategorySlug = isset($_GET["type"]) ? $_GET["type"] : $categories[0]->slug;

    $items = get_posts([
		'post_type' => 'treatment',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'treatment_category',
                'field' => 'slug',
                'terms' => $activeCategorySlug,
            ]
        ],
        'orderby' => 'title',
        'order' => 'ASC'
    ]);
?>

<?php get_header(); ?>

<main class="treatments">
    <div class="treatments__wrapper">
        <h1 class="treatments__title"><?= $post->post_title; ?></h1>
        <?php if(!empty($post->post_content)): ?>
            <div class="treatments__text">
                <?= $post->post_content; ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($categories)):?>
            <ul class="treatments__filter">
                <?php foreach($categories as $category): ?>
                    <li class="treatments__filter__item">
                        <a
                            class="treatments__filter__link <?= $category->slug === $activeCategorySlug ? 'treatments__filter__link--active' : ''; ?>"
                            href="?type=<?= $category->slug; ?>"
                        >
                            <?= $category->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>

        <?php if(!empty($items)): ?>
            <div class="treatments__list">
                <?php foreach($items as $item): ?>
                    <?php
                        $listImage = get_field('list_image', $item->ID);
                        $listImageUrl = $listImage ? $listImage['url'] : get_the_post_thumbnail_url($item->ID, 'post-thumbnail');

                        $listTitle = get_field('list_title', $item->ID);
                        $listTitle = $listTitle ? $listTitle : $item->post_title;

                        $bookLink = get_field('book_link', $item->ID);
                    ?>
                    <div class="treatments__item">
                        <?php if(!empty($listImageUrl)): ?>
                            <img src="<?= $listImageUrl; ?>" alt="List image">
                        <?php endif; ?>
                        <div class="treatments__item__content">
                            <h2 class="treatments__item__title">
                                <?= $listTitle; ?>
                            </h2>
                            <p class="treatments__item__text">
                                <?php the_field('list_text', $item->ID); ?>
                            </p>
                            <div class="treatments__item__links">
                                <a
                                    class="treatments__item__link"
                                    href=<?= get_permalink($item->ID); ?>
                                ><?= __('Read more'); ?></a>
                                <?php if(!empty($bookLink)): ?>
                                    <a
                                        class="treatments__item__link"
                                        href=<?= $bookLink['url']; ?>
                                    ><?= __('Book'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
