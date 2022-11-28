<?php
    // Include style + js files
    function get_my_scripts(){
        wp_enqueue_style(
            "style",
            get_stylesheet_directory_uri() . "/dist/style.min.css"
        );

        wp_enqueue_script(
            "script",
            get_template_directory_uri() . "/dist/script.min.js",
            ["jquery"],
            false,
            true
        );
    }
    add_action("wp_enqueue_scripts", "get_my_scripts");

     // Register multiple menus
     function register_all_my_menus(){
        register_nav_menus([
            "primary-menu" => "Primary Menu"
        ]);
    }
    add_action("init", "register_all_my_menus");

    // Add featured image to posts
    add_theme_support( "post-thumbnails" );

    // Enable shortcodes in text widgets
    add_filter("widget_text", "do_shortcode");

    /**
     * Save and load ACF Json in theme root.
     */
    add_filter('acf/settings/save_json', function ($path) {
        return get_template_directory() .'/acf-json/';
    });

    add_filter('acf/settings/load_json', function ($path) {
        return [get_template_directory() .'/acf-json/'];
    });

    // Add translation
    function add_translations() {
        load_child_theme_textdomain( 'yogafolks', get_stylesheet_directory() . '/lang' );
    }
    add_action( 'after_setup_theme', 'add_translations' );

    // Removes from admin menu
    function my_remove_admin_menus() {
        remove_menu_page( 'edit-comments.php' );
    }
    add_action( 'admin_menu', 'my_remove_admin_menus' );

    // Removes from post and pages
    function remove_comment_support() {
        remove_post_type_support( 'post', 'comments' );
        remove_post_type_support( 'page', 'comments' );
        remove_post_type_support( 'post', 'excerpt' );
        remove_post_type_support( 'page', 'excerpt' );
    }
    add_action('init', 'remove_comment_support', 100);

    // Removes from admin bar
    function mytheme_admin_bar_render() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
    add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

    /*
    * Limit gutenberg blocks
    */
    function restrict_blocks( $allowed_blocks, $post ) {
        $allowed_blocks = [
            'core/block',
            'core/image',
            'core/paragraph',
            'core/heading',
            'core/list',
            'core/separator',
            'core/columns',
            'core/video',
            'core/html'
        ];
        return $allowed_blocks;
    }
    add_filter( 'allowed_block_types', 'restrict_blocks', 10, 2);

    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page();
    }

    foreach (glob(__DIR__.'/src/posttypes/*') as $file) {
        require_once $file;
    }

    foreach (glob(__DIR__.'/src/taxonomies/*') as $file) {
        require_once $file;
    }

    foreach (glob(__DIR__.'/src/walkers/*') as $file) {
        require_once $file;
    }

    // Hide ACF Custom Fields from sidemenu on live site
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        add_filter('acf/settings/show_admin', '__return_false');
    }
    
