<?php 
    /* Template Name: Trainings */ 

    global $post;  
  
    $startDate = date("Ymd");

	$items = get_posts([
		'post_type' => 'training',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => [
            [
                'key' => 'start_date', 
                'value' => $startDate, 
                'compare' => '>='
            ]
        ],
        'orderby' => 'meta_value',
        'order' => 'ASC'
    ]);    
?>

<?php get_header(); ?>

<main class="trainings">
    <div class="trainings__wrapper">
        <h1 class="trainings__title"><?= get_the_title($post->ID); ?></h1>
        <div class="trainings__text">
            <?= get_the_content($post->ID); ?>
        </div>      
        <?php if(!empty($items)): ?>
            <div class="trainings__list">
                <?php foreach($items as $item):
                    $link = get_field('external_link', $item->ID) ?: get_permalink($item->ID);
                    $start_date = get_field('start_date', $item->ID);
                    $itemDate = strtotime($start_date);
                    $date = date("j/n", $itemDate);
                    $teacher = get_field('teacher', $item->ID);
                ?>
                    <a class="trainings__item" href=<?= $link; ?> >
                        <div class="trainings__item__image-container">
                            <div 
                                style="background-image: url(<?= get_the_post_thumbnail_url($item->ID, "large"); ?>);"
                                class="trainings__item__image"
                            ></div>
                        </div>
                        <div class="trainings__item__content">
                            <div class="trainings__item__labels">
                                <span class="trainings__item__label">
                                    <?= $teacher; ?>
                                </span>
                                <span class="trainings__item__date">
                                    <?= $date; ?>
                                </span>
                            </div>
                            <h2 class="trainings__item__title">
                                <?= get_the_title($item->ID); ?>
                            </h2>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>