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

    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//analytics.codethink.de/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '10']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//analytics.codethink.de/piwik.php?idsite=10&rec=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->
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

    <header class="c-site-cover <?= themissionary_header_class() ?>" style="background-image:url(<?= themissionary_header_image() ?>);">

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

        <div class="c-site-cover__inner u-orient-middle">
            <div class="o-wrapper u-text-center">
                <?= themissionary_header_text() ?>
            </div>
        </div>

    </header>


    <div id="content" class="o-wrapper <?= is_front_page() ? 'o-wrapper--wide' : '' ?> site-content u-mt">
