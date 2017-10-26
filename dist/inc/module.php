<?php

function register_modulos_taxonomy() {

    // Add new taxonomy 'video_sprecher' (NOT hierarchical)
    $labels = array(
        'name' => 'Módulos',
        'singular_name' => 'Módulo',
        'menu_name' => 'Módulos',
        'add_new' => 'Add new',
        'add_new_item' => 'Add new module',
    );

    register_taxonomy('modules','post',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'rewrite' => array( 'slug' => 'modulos' ),
    ));
}

// hook into the init action and call the functions
add_action( 'init', 'register_modulos_taxonomy' );



/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'filter_posts_by_modules');
function filter_posts_by_modules() {
    global $typenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'modules'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
    global $pagenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'modules'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}
