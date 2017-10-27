<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Missionary
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="o-ratio o-ratio--16:9 u-box-center u-mt" style="max-width: 800px;">
                        <iframe src="https://www.youtube.com/embed/jOHcXb-X-vs" frameborder="0" gesture="media" allowfullscreen></iframe>
                    </div>

                    <div class="entry-content">
                        <?php
                            the_content();

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'themissionary' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                    </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->

                <hr>

                <?php if( $modules = get_terms( array('taxonomy' => 'modules') ) ): ?>

                    <div class="o-layout o-layout--stretch u-mt+">

                        <?php foreach($modules as $key => $module): global $module; ?>

                            <?php //$box['width'] = ($key == count($boxes)-1 && $key%2 == 0 ? 'u-1/1' : 'u-1/2') ?>

                            <?php get_template_part( 'template-parts/content', 'module' ); ?>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>


            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
