<?php
get_header();

$search_term = trim(get_search_query(false));
$paged = max(1, get_query_var('paged'), get_query_var('page'));
$search_query = new WP_Query([
    'post_type' => ['page', 'post', 'arkos_products'],
    'post_status' => 'publish',
    's' => $search_term,
    'posts_per_page' => 12,
    'paged' => $paged,
    'post__in' => $search_term ? [] : [0],
]);
?>

<section class="wp-page-hero">
  <div class="real-section__inner">
    <p class="real-kicker"><?php esc_html_e('Search', 'arkos-staging'); ?></p>
    <h1>
      <?php
      if ($search_term) {
          printf(
              esc_html__('Search results for "%s"', 'arkos-staging'),
              esc_html($search_term)
          );
      } else {
          esc_html_e('Search ARKOS', 'arkos-staging');
      }
      ?>
    </h1>
    <p><?php esc_html_e('Find ARKOS products, product information, pages, and updates from the staging website.', 'arkos-staging'); ?></p>
  </div>
</section>

<section class="wp-content-section">
  <div class="real-section__inner">
    <article class="wp-content-card">
      <form action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
        <label for="arkos-search-page-input"><?php esc_html_e('Search keyword', 'arkos-staging'); ?></label>
        <input id="arkos-search-page-input" name="s" type="search" value="<?php echo esc_attr($search_term); ?>" />
        <button class="real-button real-button--primary" type="submit"><?php esc_html_e('Search', 'arkos-staging'); ?></button>
      </form>
    </article>

    <?php if ($search_term && $search_query->have_posts()) : ?>
      <div class="wp-product-toolbar">
        <span>
          <?php
          printf(
              esc_html(_n('%s result', '%s results', $search_query->found_posts, 'arkos-staging')),
              esc_html(number_format_i18n($search_query->found_posts))
          );
          ?>
        </span>
        <a href="<?php echo esc_url(arkos_products_url()); ?>"><?php esc_html_e('Browse Products', 'arkos-staging'); ?></a>
      </div>

      <div class="real-product-grid real-product-grid--archive">
        <?php while ($search_query->have_posts()) : $search_query->the_post(); ?>
          <?php
          $post_type = get_post_type();
          $post_type_object = get_post_type_object($post_type);
          $result_label = $post_type_object && isset($post_type_object->labels->singular_name)
              ? $post_type_object->labels->singular_name
              : __('Result', 'arkos-staging');

          if ($post_type === 'arkos_products') {
              $result_label = arkos_product_group_label(get_the_ID());
          }

          $summary = wp_trim_words(wp_strip_all_tags(get_the_excerpt() ?: get_the_content()), 24);
          $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
          ?>
          <article class="real-product-card">
            <?php if ($post_type === 'arkos_products' || $thumbnail) : ?>
              <a class="real-product-card__image" href="<?php the_permalink(); ?>">
                <img
                  src="<?php echo esc_url($post_type === 'arkos_products' ? arkos_product_image_url(get_the_ID(), 'medium_large') : $thumbnail); ?>"
                  alt="<?php the_title_attribute(); ?>"
                  loading="lazy"
                />
              </a>
            <?php endif; ?>
            <div class="real-product-card__body">
              <span><?php echo esc_html($result_label); ?></span>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <?php if ($summary) : ?>
                <p><?php echo esc_html($summary); ?></p>
              <?php endif; ?>

              <?php if ($post_type === 'arkos_products') : ?>
                <?php $specs = arkos_product_specs(get_the_ID()); ?>
                <?php if ($specs) : ?>
                  <dl class="wp-mini-specs">
                    <?php foreach (array_slice($specs, 0, 2) as $label => $value) : ?>
                      <div><dt><?php echo esc_html($label); ?></dt><dd><?php echo esc_html($value); ?></dd></div>
                    <?php endforeach; ?>
                  </dl>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

      <?php
      $pagination = paginate_links([
          'current' => $paged,
          'total' => $search_query->max_num_pages,
          'mid_size' => 1,
          'prev_text' => __('Previous', 'arkos-staging'),
          'next_text' => __('Next', 'arkos-staging'),
      ]);
      ?>
      <?php if ($pagination) : ?>
        <div class="wp-pagination"><?php echo wp_kses_post($pagination); ?></div>
      <?php endif; ?>
    <?php else : ?>
      <div class="wp-empty-state">
        <h2><?php esc_html_e('No matching results found', 'arkos-staging'); ?></h2>
        <p><?php esc_html_e('Try a different keyword, browse the product range, or contact the ARKOS team for product support.', 'arkos-staging'); ?></p>
        <div class="real-actions">
          <a class="real-button real-button--primary" href="<?php echo esc_url(arkos_products_url()); ?>"><?php esc_html_e('Browse Products', 'arkos-staging'); ?></a>
          <a class="real-button" href="<?php echo esc_url(arkos_url('contact-us/')); ?>"><?php esc_html_e('Contact Us', 'arkos-staging'); ?></a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php
wp_reset_postdata();
get_footer();
