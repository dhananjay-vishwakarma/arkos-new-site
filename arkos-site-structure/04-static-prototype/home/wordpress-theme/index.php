<?php
if (is_front_page()) {
    require __DIR__ . '/front-page.php';
    return;
}

get_header();
?>

    <section class="wp-page-hero">
      <div class="real-section__inner">
        <p class="real-kicker"><?php esc_html_e('ARKOS', 'arkos-staging'); ?></p>
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
      </div>
    </section>

<?php
get_footer();
