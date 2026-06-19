<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
  <?php
  $post_id = get_the_ID();
  $gallery = arkos_product_gallery_ids($post_id);
  $specs = arkos_product_specs($post_id);
  $amazon_links = arkos_product_amazon_links($post_id);
  $is_vetek = arkos_product_group_label($post_id) === 'VETEK Auto Care';
  $product_profile = $is_vetek
      ? arkos_vetek_product_profile($post_id)
      : [
          'intro' => arkos_vetek_intro_from_content($post_id),
          'suitable' => [],
          'benefits' => arkos_vetek_key_features_from_content($post_id),
      ];
  $main_image = ($is_vetek ? arkos_vetek_packshot_url($post_id) : '') ?: arkos_product_image_url($post_id, 'large');
  $gallery_urls = [$main_image];
  foreach ($gallery as $image_id) {
      $gallery_url = arkos_attachment_url($image_id, 'medium_large');
      if ($gallery_url && !in_array($gallery_url, $gallery_urls, true)) {
          $gallery_urls[] = $gallery_url;
      }
  }
  $pack_sizes = arkos_vetek_pack_sizes_from_content($post_id);
  $category_ids = [];
  $terms = get_the_terms($post_id, 'category');
  if (!is_wp_error($terms) && $terms) {
      foreach ($terms as $term) {
          if ($term->slug !== 'uncategorized') {
              $category_ids[] = (int) $term->term_id;
          }
      }
  }
  $related_args = [
      'posts_per_page' => 5,
      'post__not_in' => [$post_id],
  ];
  if ($category_ids) {
      $related_args['category__in'] = $category_ids;
  }
  $related_products = arkos_query_products($related_args);
  ?>

  <article class="vetek-product-page">
    <section class="vetek-product-hero">
      <div class="real-section__inner vetek-product-hero__grid">
        <div class="vetek-product-media">
          <figure class="vetek-product-main">
            <img class="vetek-product-main__image" src="<?php echo esc_url($main_image); ?>" alt="<?php the_title_attribute(); ?>" />
          </figure>
          <?php if (count($gallery_urls) > 1) : ?>
            <div class="vetek-product-thumbs" aria-label="<?php esc_attr_e('Product gallery', 'arkos-staging'); ?>">
              <?php foreach (array_slice($gallery_urls, 0, 5) as $index => $gallery_url) : ?>
                <button class="vetek-product-thumb<?php echo $index === 0 ? ' is-active' : ''; ?>" type="button" data-image="<?php echo esc_url($gallery_url); ?>" aria-label="<?php echo esc_attr(sprintf(__('Show product image %d', 'arkos-staging'), $index + 1)); ?>">
                  <img src="<?php echo esc_url($gallery_url); ?>" alt="" loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>" />
                </button>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="vetek-product-copy">
          <h1><?php the_title(); ?></h1>
          <?php if (!empty($product_profile['intro'])) : ?>
            <p><?php echo esc_html($product_profile['intro']); ?></p>
          <?php endif; ?>

          <?php if (!empty($product_profile['suitable'])) : ?>
            <div class="vetek-suitable">
              <h2>Suitable For</h2>
              <ul>
                <?php foreach ($product_profile['suitable'] as $item) : ?>
                  <li>
                    <i class="<?php echo esc_attr($item['icon']); ?>" aria-hidden="true"></i>
                    <span><?php echo esc_html($item['label']); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <?php if (!empty($product_profile['benefits'])) : ?>
            <div class="vetek-features">
              <h2>Key Features</h2>
              <ul>
                <?php foreach ($product_profile['benefits'] as $item) : ?>
                  <li><?php echo esc_html($item['text']); ?></li>
                <?php endforeach; ?>
              </ul>
              <?php if ($pack_sizes) : ?>
                <p class="vetek-pack-size">Available in pack sizes: <span><?php echo esc_html($pack_sizes); ?></span></p>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <?php if ($specs) : ?>
            <div class="vetek-features vetek-specifications">
              <h2>Specifications</h2>
              <ul>
                <?php foreach ($specs as $label => $value) : ?>
                  <li><?php echo esc_html($label . ': ' . $value); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <?php if ($amazon_links) : ?>
            <div class="vetek-commerce">
              <?php foreach ($amazon_links as $link) : ?>
                <a class="vetek-commerce-link" href="<?php echo esc_url($link['url']); ?>" target="_blank" rel="noopener sponsored">
                  <i class="fa-brands fa-amazon" aria-hidden="true"></i>
                  <span><?php echo esc_html($link['label']); ?></span>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <?php if ($related_products->have_posts()) : ?>
      <section class="vetek-related-products">
        <div class="real-section__inner">
          <h2>Related Products</h2>
          <div class="vetek-related-grid">
            <?php while ($related_products->have_posts()) : $related_products->the_post(); ?>
              <?php
              $related_id = get_the_ID();
              $related_is_vetek = arkos_product_group_label($related_id) === 'VETEK Auto Care';
              $related_image = ($related_is_vetek ? arkos_vetek_packshot_url($related_id) : '') ?: arkos_product_image_url($related_id, 'medium_large');
              $related_intro = arkos_vetek_intro_from_content($related_id);
              ?>
              <article class="vetek-related-card">
                <a class="vetek-related-card__image" href="<?php the_permalink(); ?>">
                  <img src="<?php echo esc_url($related_image); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                </a>
                <div class="vetek-related-card__body">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p><?php echo esc_html(wp_trim_words($related_intro, 18)); ?></p>
                  <a class="vetek-related-card__link" href="<?php the_permalink(); ?>">View Details <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
              </article>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      </section>
    <?php endif; ?>
  </article>
  <script src="<?php echo esc_url(get_template_directory_uri() . '/vetek-gallery.js?v=20260617'); ?>"></script>
<?php endwhile; ?>

<?php get_footer(); ?>
