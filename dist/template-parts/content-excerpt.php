<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Missionary
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('o-flag o-flag--responsive c-excerpt'); ?>>
    <a class="c-excerpt__link" href="<?= esc_url(get_permalink()) ?>" rel="bookmark"></a>
    <div class="o-flag__img c-excerpt__image <?= !has_post_thumbnail() ? 'u-pr0' : '' ?>">
        <?php if(has_post_thumbnail()): ?>
            <a href="<?= esc_url( get_permalink() ) ?>" rel="bookmark">
                <?php the_post_thumbnail('90p') ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="o-flag__body">

        <header class="c-excerpt__header entry-header">
            <?php the_title( '<h2 class="c-excerpt__title u-mb0 entry-title">', '</h2>' ); ?>
        </header><!-- .entry-header -->

        <div class="c-excerpt__body">
            <?php the_excerpt() ?>
        </div>

        <footer class="c-excerpt__footer">
            <?php themissionary_posted_on(); ?>
        </footer>
    </div>
</article>
