<?php
get_header();

$featured_products = arkos_query_products([
    'posts_per_page' => 3,
]);
?>

<section class="wp-page-hero">
  <div class="real-section__inner">
    <p class="real-kicker"><?php esc_html_e('Page not found', 'arkos-staging'); ?></p>
    <h1><?php esc_html_e('This ARKOS page is not available', 'arkos-staging'); ?></h1>
    <p><?php esc_html_e('Use search, return to a main section, or continue with the ARKOS product range.', 'arkos-staging'); ?></p>
  </div>
</section>

<section class="wp-content-section">
  <div class="real-section__inner wp-content-grid">
    <article class="wp-content-card">
      <h2><?php esc_html_e('Search ARKOS', 'arkos-staging'); ?></h2>
      <form action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
        <label for="arkos-404-search-input"><?php esc_html_e('Search keyword', 'arkos-staging'); ?></label>
        <input id="arkos-404-search-input" name="s" type="search" />
        <button class="real-button real-button--primary" type="submit"><?php esc_html_e('Search', 'arkos-staging'); ?></button>
      </form>
    </article>

    <aside class="wp-related-panel" aria-label="<?php esc_attr_e('Helpful sections', 'arkos-staging'); ?>">
      <h2><?php esc_html_e('Helpful Sections', 'arkos-staging'); ?></h2>
      <a href="<?php echo esc_url(arkos_url()); ?>"><?php esc_html_e('Home', 'arkos-staging'); ?></a>
      <a href="<?php echo esc_url(arkos_products_url()); ?>"><?php esc_html_e('Products', 'arkos-staging'); ?></a>
      <a href="<?php echo esc_url(arkos_url('downloads/')); ?>"><?php esc_html_e('Downloads', 'arkos-staging'); ?></a>
      <a href="<?php echo esc_url(arkos_url('contact-us/')); ?>"><?php esc_html_e('Contact Us', 'arkos-staging'); ?></a>
    </aside>
  </div>
</section>

<?php if ($featured_products->have_posts()) : ?>
  <section class="wp-content-section">
    <div class="real-section__inner">
      <div class="wp-product-toolbar">
        <span><?php esc_html_e('Suggested products', 'arkos-staging'); ?></span>
        <a href="<?php echo esc_url(arkos_products_url()); ?>"><?php esc_html_e('All Products', 'arkos-staging'); ?></a>
      </div>

      <div class="real-product-grid real-product-grid--archive">
        <?php while ($featured_products->have_posts()) : $featured_products->the_post(); ?>
          <article class="real-product-card">
            <a class="real-product-card__image" href="<?php the_permalink(); ?>">
              <img src="<?php echo esc_url(arkos_product_image_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
            </a>
            <div class="real-product-card__body">
              <span><?php echo esc_html(arkos_product_group_label(get_the_ID())); ?></span>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p><?php echo esc_html(wp_trim_words(wp_strip_all_tags(get_the_excerpt() ?: get_the_content()), 24)); ?></p>
              <?php $specs = arkos_product_specs(get_the_ID()); ?>
              <?php if ($specs) : ?>
                <dl class="wp-mini-specs">
                  <?php foreach (array_slice($specs, 0, 2) as $label => $value) : ?>
                    <div><dt><?php echo esc_html($label); ?></dt><dd><?php echo esc_html($value); ?></dd></div>
                  <?php endforeach; ?>
                </dl>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php
wp_reset_postdata();
get_footer();
