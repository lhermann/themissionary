<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Missionary
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'themissionary' ); ?></a>


    <nav class="c-mobile-nav">
        <div class="u-pb u-text-center">
            <button class="c-btn c-btn--small c-btn--ghost c-btn--white jsToggle"
                data-target="html" data-class="is-mobile-nav-open">
                <span class="fa fa-times u-icon--large"></span>
            </button>
        </div>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-primary',
            'menu_id'        => 'primary-menu',
            'container'      => false,
            'menu_class'     => 'c-nav-list c-nav-list--block',
            'walker'         => new Walker_Primary_Menu()
        ) );
        ?>
    </nav>

    <header class="c-site-cover <?= !is_front_page() ? 'c-site-cover--compact' : '' ?>" style="background-image:url(<?= get_template_directory_uri() ?>/img/header.jpg);">

        <nav id="navigation" class="c-site-nav">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'c-site-nav__list c-nav-list c-nav-list--wide u-hidden@until-tablet',
                'walker'         => new Walker_Primary_Menu(),
                'first_element'  => sprintf('<a class="%s" href="/"><img class="%s" src="%s" alt="LMP Logo"></a>',
                                            'c-nav-list__link',
                                            'c-site-nav__logo',
                                            get_template_directory_uri() . '/img/logo-white.svg'
                                    )
            ) );
            ?>
            <div class="u-text-center  u-hidden@from-tablet">
                <button class="c-btn c-btn--small c-btn--ghost c-btn--white jsToggle" data-target="html" data-class="is-mobile-nav-open">
                    <span class="fa fa-bars u-ic--large"></span>
                </button>
            </div>
        </nav>

        <?php if(is_front_page()): ?>
        <div class="c-site-cover__inner u-orient-middle">
            <div class="o-wrapper u-text-center">
                <h1 class="c-site-cover__title">
                    <a class="c-site-cover__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
                <h3 class="c-site-cover__subtitle"><?php bloginfo( 'description', 'display' ) ?></h3>

            </div>
        </div>
    <?php endif; ?>

    </header>


    <div id="content" class="o-wrapper <?= is_front_page() ? 'o-wrapper--wide' : '' ?> site-content u-mt">
