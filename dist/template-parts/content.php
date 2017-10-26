<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Missionary
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('c-article'); ?>>

    <header class="c-article__header">

        <div class="u-hidden@from-tablet u-mt">
            <a class="c-btn c-btn--small c-btn--secondary" href="<?= $_SERVER['HTTP_REFERER'] ?>">&lsaquo; Back</a>
        </div>

        <h1 class="c-article__title u-mt u-mt0@tablet"><?php the_title(); ?></h1>

        <div class="c-article__meta u-mt-">
            <address><?php the_author(); ?></address>
            <br><time pubdate datetime="<?= get_the_date('Y-m-d') ?>"
                title="<?= get_the_date() ?>">
                <?= get_the_date() ?>
            </time>
        </div>

    </header>

    <section class="c-article__body">

        <?php the_content(); ?>

        <div class="c-article__meta">
            <?php if($tags = get_the_tags()): ?>
            Tags:
            <ul class="c-category-list">
                <?php foreach ($tags as $tag): ?>
                <li class="c-category-list__item">
                    <a class="c-category-list__link" href="<?= get_term_link($tag->term_id) ?>"><?= $tag->name ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </div>

    </section>

    <footer class="c-article__footer">
        <div class="o-flag">
            <div class="o-flag__img">
                <?= get_avatar( get_the_author_meta('ID'), 64, null, null, array('class'=>'c-article__author-image') ) ?>
            </div>
            <div class="o-flag__body">
                <p style="max-width: 400px">
                    <strong><?php the_author() ?></strong><br>
                    <span class="u-muted"><?php the_author_meta('description') ?></span>
                </p>
            </div>
        </div>
    </footer>



</article>
