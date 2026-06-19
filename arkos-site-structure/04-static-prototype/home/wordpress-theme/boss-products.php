<?php
/**
 * Template Name: Boss Page
 *
 * Mirrors the production Boss content while using the staged
 * product page layout system.
 */

get_header();

while (have_posts()) {
    the_post();

    $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full')
        ?: 'https://arkos.in/wp-content/uploads/2023/08/Arkos_boss_banner.jpg';
    $page_logo = function_exists('get_field') ? get_field('page_logo') : '';
    $boss_logo = ! empty($page_logo)
        ? $page_logo
        : 'https://arkos.in/wp-content/uploads/2022/11/boss.png';
?>

<article class="vetek-product-page legacy-lubricant-page">
  <section class="legacy-lubricant-intro legacy-lubricant-intro--image legacy-lubricant-intro--no-overlay" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
    <div class="real-section__inner">
      <h1><?php the_title(); ?></h1>
    </div>
  </section>

  <section class="legacy-lubricant-summary go-range-summary">
    <div class="real-section__inner go-range-summary__grid">
      <figure class="go-range-summary__logo">
        <img src="<?php echo esc_url($boss_logo); ?>" alt="<?php esc_attr_e('Arkos Boss', 'arkos-staging'); ?>" />
      </figure>
      <div>
      <?php the_content(); ?>
      </div>
    </div>
  </section>
</article>

<?php
}

get_footer();
