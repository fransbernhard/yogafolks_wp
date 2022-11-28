<?php
    $socialList = get_field('social', 'option');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >
        <title><?= get_bloginfo("name"); ?></title>
        <link rel="stylesheet" href="https://use.typekit.net/kih0qpu.css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class("name"); ?>>

        <header class="header">
            <div class="header__mobile">
                <a class="header__logo" href="<?= get_site_url(); ?>">
                    <img class="header__logo-image" src="<?= get_template_directory_uri() . "/dist/img/logo.png"; ?>"/>
                </a>

                <div class="menu__hamburger js-toggle-menu">
                    <span class="menu__bar"></span>
                    <span class="menu__bar"></span>
                    <span class="menu__bar"></span>
                </div>
            </div>

            <?php
                $arguments = [
                    'menu' => 'primary-menu',
                    'theme_location' => 'primary-menu',
                    'container' => 'nav',
                    'container_class' => 'menu menu--desktop',
                    'container_id' => 'menu_desktop',
                    'menu_class' => 'menu__list'
                ];
                $menuItems = wp_nav_menu($arguments);
            ?>
            <div>
                <?php
                    $arguments = [
                        'menu' => 'primary-menu',
                        'theme_location' => 'primary-menu',
                        'container' => 'nav',
                        'container_class' => 'menu menu--mobile',
                        'container_id' => 'menu_mobile',
                        'menu_class' => 'menu__list'
                    ];
                    $menuItems = wp_nav_menu($arguments);
                ?>

                <?php if($socialList): ?>
                    <div class="social">
                        <?php foreach($socialList as $item): ?>
                            <a
                                href="<?= $item["url"]; ?>"
                                class="social__item social__item--<?= $item["media"]; ?>"
                                target="_blank">
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>