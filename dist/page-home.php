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

                <?php if( $boxes = get_field('boxes') ): ?>

                    <div class="o-layout o-layout--stretch u-mt+">

                        <?php foreach($boxes as $key => $box): global $box; ?>

                            <?php $box['width'] = ($key == count($boxes)-1 && $key%2 == 0 ? 'u-1/1' : 'u-1/2') ?>

                            <?php print_r($key); print_r(count($boxes)); ?>

                            <?php get_template_part( 'template-parts/content', 'box' ); ?>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>


            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
