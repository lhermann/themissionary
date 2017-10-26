<?php
/**
 * The Missionary functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Missionary
 */

define('VERSION', '1.0.0-beta');

if ( ! function_exists( 'themissionary_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function themissionary_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on The Missionary, use a find and replace
         * to change 'themissionary' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'themissionary', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-primary' => esc_html__( 'Primary', 'themissionary' ),
            'menu-footer' => esc_html__( 'Footer', 'themissionary' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'themissionary_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        add_editor_style( 'https://fonts.googleapis.com/css?family=Kalam:700|Raleway:300,600' );
        add_editor_style( 'css/editor-style.css' );

        add_image_size( '90p', 160, 90, true );
        add_image_size( '180p', 320, 180, true );
        add_image_size( '360p', 640, 360, true );
        add_image_size( '720p', 1280, 720, true );
    }
endif;
add_action( 'after_setup_theme', 'themissionary_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themissionary_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'themissionary_content_width', 640 );
}
add_action( 'after_setup_theme', 'themissionary_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themissionary_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'themissionary' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'themissionary' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'themissionary_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function themissionary_scripts() {
    wp_enqueue_style(
        'themissionary-style',
        get_template_directory_uri() . '/css/main.css',
        array(), VERSION.rand() );

    wp_enqueue_style(
        'themissionary-fonts',
        'https://fonts.googleapis.com/css?family=Kalam:700|Raleway:300,600' );

    wp_enqueue_style(
        'themissionary-icons',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

    wp_enqueue_script(
        'themissionary-bundlejs',
        get_template_directory_uri() . '/js/bundle.js',
        array('jquery'), VERSION.rand(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'themissionary_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}



class Walker_Primary_Menu extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        if( isset($args->first_element) && empty($output) ) {
            $output .= sprintf('<li class="%s">%s</li>',
                'c-nav-list__item',
                $args->first_element
            );
        }
        $output .= sprintf('<li class="%s"><a class="%s" href="%s">%s</a></li>',
            'c-nav-list__item' . ($item->current ? ' is-active' : ''),
            'c-nav-list__link',
            $item->url,
            $item->title
        );
        // parent::start_el($output, $item, $depth, $args, $id);
    }

    function end_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        parent::end_el($output, $item, $depth, $args, $id);
    }

}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );