<?php

define('THEME_URL', get_stylesheet_directory());
define('TEMPLATE_URI', get_template_directory_uri());
define('HOME_URL', get_home_url());

if (!function_exists('sample_setup')) {
    function sample_setup()
    {
        load_theme_textdomain('sample', THEME_URL . '/languages');

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-background', ['default-color' => 'ffffff']);
        add_theme_support('custom-logo', [
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => ['site-title', 'site-description'],
        ]);
        add_theme_support('menus');

        function mytheme_register_menus()
        {
            register_nav_menus([
                'main_menu' => __('Main Menu', 'yourtheme'),
            ]);
        }
        add_action('after_setup_theme', 'mytheme_register_menus');

    }
    add_action('after_setup_theme', 'sample_setup');
}

function register_acf_options_pages()
{

    // Pastikan fungsi ACF ada sebelum digunakan.
    if (function_exists('acf_add_options_page')) {

        // Daftarkan Halaman Opsi Induk (Parent)
        acf_add_options_page(array(
            'page_title' => 'General Settings',
            'menu_title' => 'General Settings',
            'menu_slug' => 'general_setting',
            'capability' => 'edit_posts',
            'redirect' => true,
            'icon_url' => 'dashicons-admin-generic',
            'position' => '25',
        ));

        // Daftarkan Halaman Opsi Anak (Sub-page)
        acf_add_options_sub_page(array(
            'page_title' => 'Social Media Settings',
            'menu_title' => 'Social Media',
            'parent_slug' => 'general_setting',
            'menu_slug' => 'social_media_settings',
            'post_id' => 'social_media',
        ));

        acf_add_options_sub_page(array(
            'page_title' => 'Page Link Settings',
            'menu_title' => 'Page Link',
            'parent_slug' => 'general_setting',
            'menu_slug' => 'page_link_setting',
            'post_id' => 'page_link',
        ));

    }
}

// Jalankan fungsi di atas pada hook acf/init.
add_action('acf/init', 'register_acf_options_pages');


// Enqueue Styles and Scripts
function tmdr_enqueue_assets()
{
    // ✅ Fonts (best practice: inline preload)
    $google_fonts_url = 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@400;600&display=swap';

    wp_enqueue_style('google-fonts', $google_fonts_url, [], null);

    // ✅ Bootstrap
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3',
    );
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true,
    );

    // ✅ Fancybox
    wp_enqueue_style(
        'fancybox-css',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css',
        [],
        null,
    );
    wp_enqueue_script(
        'fancybox-js',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js',
        [],
        null,
        true,
    );

    // ✅ Swiper
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css',
        [],
        '10.0.0',
    );
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js',
        [],
        '10.0.0',
        true,
    );

    // ✅ Theme Styles
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/layout.css',
        ['bootstrap-css'],
        filemtime(get_template_directory() . '/assets/css/layout.css'),
        'all',
    );

    // ✅ Main JS (depends on Bootstrap & Swiper)
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        ['bootstrap-js', 'swiper-js'],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true,
    );
}
add_action('wp_enqueue_scripts', 'tmdr_enqueue_assets');

// Custom Logo Class
function tmdr_change_logo_class($html)
{
    return str_replace('class="custom-logo-link"', 'class="custom-logo-link navbar-brand img-responsive"', $html);
}
add_filter('get_custom_logo', 'tmdr_change_logo_class');