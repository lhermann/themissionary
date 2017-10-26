<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Missionary
 */
global $box;
?>

<section class="o-layout__item <?= $box['width'] ?> u-mb">
    <div class="o-box o-box--flush o-box--round u-1/1" style="background-color: <?= $box['color'] ?>">
        <?php if($box['image']): ?>
            <?= wp_get_attachment_image( $box['image'], '360p', false, array( "class" => "u-1/1" ) ); ?>
        <?php endif; ?>
        <div class="o-box u-white">
            <h2><?= $box['title'] ?></h2>
            <div>
                <?= $box['content'] ?>
            </div>
        </div>
    </div>
</section>
