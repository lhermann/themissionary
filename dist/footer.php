<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Missionary
 */

?>

    </div><!-- #content -->

    <footer class="c-site-footer">
        <div class="o-wrapper">

            <nav class="c-site-footer__nav u-ml">
                <?php
                wp_nav_menu( array(
                        'theme_location' => 'menu-footer',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                        'menu_class'     => 'c-nav-list c-nav-list--middot',
                        'walker'         => new Walker_Primary_Menu(),
                        'first_element'  => sprintf('&copy; %s <a class="%s" href="/">%s</a>',
                                                    date('Y'),
                                                    'c-nav-list__link',
                                                    get_bloginfo( 'name', 'display' )
                                            )
                    ) );
                ?>
            </nav>

            <nav class="c-site-footer__social u-ml u-float-right">
                <ul class="c-nav-list c-nav-list--middot">
                    <li class="c-nav-list__item">
                        <a class="c-nav-list__link" href="https://www.youtube.com/channel/UC_qyQeEURLE9ER2ZLLWH0Ig" title="YouTube Channel" target="_blank">
                            <span class="fa fa-youtube-play" aria-hidden="true"></span> Youtube
                        </a>
                    </li>
                    <li class="c-nav-list__item">
                        <a class="c-nav-list__link" href="/feed.xml" title="RSS Feed">
                            <span class="fa fa-rss"></span> RSS-Feed
                        </a>
                    </li>
                    <li class="c-nav-list__item">
                        <a class="c-nav-list__link" href="<?= admin_url() ?>" title="RSS Feed">Admin</a>
                    </li>
                </ul>
            </nav>


        </div>
    </footer>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
