<?php
    global $post;

    get_header();

    $links = get_field('links');

    $about = get_field("about");
    $aboutSlug = $about['hash_id'];
    $aboutTitle = $about['about_title'];
    $aboutText = $about['about_text'];
    $contactImage = $about['contact_image'];
    $contactImageLink = $about['contact_image_link'];
    $contactInfo = $about['contact_info'];
    $iframe = $about['maps_iframe'];

    $cta = get_field('our_app');
    $ctaSlug = $cta['hash_id'] ?? '';
    $ctaTitle = $cta['title'] ?? '';
    $ctaText = $cta['beskrivning'] ?? '';
    $ctaImage = $cta['image'] ?? '';
    $ctaLabel = $cta['label'] ?? '';
    $ctaLinks = $cta['download_buttons'] ?? '';
?>

<main class="main">
    <section class="introduction">
        <div class="introduction__wrapper">
            <div class="introduction__border">
                <img
                    class="introduction__image"
                    src="<?= get_the_post_thumbnail_url($post->ID, "large"); ?>"
                />
                <div class="introduction__description">
                    <?= get_the_content($post->ID); ?>
                </div>
                <?php if($links): ?>
                    <div class="introduction__links">
                        <?php foreach($links as $link): ?>
                            <a
                                class="introduction__link"
                                href="<?= $link['link']['url']; ?>"
                            >
                                <?= $link['link']['title']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if($ctaSlug): ?>
        <section class="cta" id="<?= $ctaSlug; ?>">
            <div class="cta__wrapper">
                <?php if($ctaImage): ?>
                    <img 
                        class="cta__image" 
                        src="<?= $ctaImage['sizes']['medium_large']; ?>"
                    />
                <?php endif; ?>
                <div>
                    <p class="cta__label">
                        <strong>
                            <?= $ctaLabel; ?>
                        </strong>
                    </p>
                    <h2 class="cta__title"><?= $ctaTitle; ?></h2>
                    <p class="cta__text"><?= $ctaText; ?></p>
                    
                    <?php if($ctaLinks): ?>
                        <div class="cta__btn">
                            <?php foreach($ctaLinks as $item): ?>
                                <a href="<?= $item['app_link']['url']; ?>">
                                    <img 
                                        class="cta__btn_image" 
                                        src="<?= $item['app_image']['url']; ?>" 
                                        alt=""
                                    />
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <section class="slideshow_wrapper">
        <div>
            <?= do_shortcode('[metaslider id="1039"]'); ?>
        </div>
    </section>
    <section class="about" id="<?= $aboutSlug; ?>">
        <div class="about__wrapper">
            <div class="about__border">
                <h2 class="about__title"><?= $aboutTitle; ?></h2>
                <div class="about__text wysiwyg">
                    <?= $aboutText; ?>
                </div>

                <div class="about__contact">
                    <?php if($contactImageLink): ?>
                        <?= $iframe; ?>
                    <?php else: ?>
                        <a
                            class="about__contact__map-link"
                            target="_blank"
                            href="<?php $contactImageLink; ?>"
                        >
                            <img
                                class="about__contact__map"
                                src="<?= $contactImage['url']; ?>"
                            />
                        </a>
                    <?php endif; ?>
                    <a
                        class="about__contact__map-link"
                        target="_blank"
                        href="<?= $contactImageLink; ?>"
                    >
                        <p class="about__contact__information">
                            <?= $contactInfo; ?>
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
