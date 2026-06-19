<?php
get_header();
?>

    <div id="hero-slider-mount">
      <?php
      $hero_slider = get_template_directory() . '/hero-slider.html';
      if (file_exists($hero_slider)) {
          $content = file_get_contents($hero_slider);
          $theme_assets_uri = esc_url(get_template_directory_uri() . '/assets/');
          $content = str_replace(
              ['src="assets/', 'srcset="assets/'],
              ['src="' . $theme_assets_uri, 'srcset="' . $theme_assets_uri],
              $content
          );
          echo $content;
      }
      ?>
    </div>

    <?php get_template_part('template-parts/home-sections'); ?>

<?php
get_footer();
