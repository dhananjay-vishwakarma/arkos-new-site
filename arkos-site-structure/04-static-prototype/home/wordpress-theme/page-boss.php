<?php
/**
 * Backward-compatible fallback for slug-based Boss page resolution.
 */
$boss_template = get_stylesheet_directory() . '/boss-products.php';

if (file_exists($boss_template)) {
    include $boss_template;
    return;
}

get_header();
while (have_posts()) {
    the_post();
    the_title('<h1>', '</h1>');
    the_content();
}
get_footer();

