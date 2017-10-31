<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Missionary
 */
global $module;
?>

<section class="o-layout__item <?= 'u-1/3' ?> u-mb">

    <div class="o-box o-box--flush c-module <?= $module->count ? 'c-module--active' : 'c-module--inactive' ?> u-1/1" style="background-color: <?= get_field('color', $module) ?>">
        <div class="o-box u-pb-">
            <h2>
                <?php if($icon = get_field('icon', $module)): ?>
                    <span class="fa <?= $icon ?>" aria-hidden="true"></span>
                <?php endif; ?>
                <?= $module->name ?>
            </h2>
        </div>
        <?php if($img = get_field('image', $module)): ?>
            <?= wp_get_attachment_image( $img, '360p', false, array( "class" => "u-1/1" ) ); ?>
        <?php endif; ?>
        <div class="o-box u-pt-">
            <div>
                <?= $module->description ?>
            </div>
        </div>
        <?php if($module->count): ?>
            <a class="c-module__link" href="<?= get_term_link($module) ?>"></a>
        <?php endif; ?>
    </div>

</section>
