<?php
$range = wp_parse_args($args ?? [], [
    'kicker' => 'Product Range',
    'title' => get_the_title(),
    'intro' => '',
    'category_slugs' => [],
    'title_contains' => '',
    'finder_url' => arkos_products_url(),
    'accent' => 'red',
    'support' => [],
]);

$products = arkos_query_range_products($range['category_slugs'], $range['title_contains'], 16);
$intro = $range['intro'] ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 54);
?>

<section class="wp-range-hero wp-range-hero--<?php echo esc_attr($range['accent']); ?>">
  <div class="real-section__inner wp-range-hero__grid">
    <div>
      <p class="real-kicker"><?php echo esc_html($range['kicker']); ?></p>
      <h1><?php echo esc_html($range['title']); ?></h1>
      <?php if ($intro) : ?>
        <p><?php echo esc_html($intro); ?></p>
      <?php endif; ?>
      <div class="real-actions">
        <a class="real-button real-button--primary" href="<?php echo esc_url($range['finder_url']); ?>">Product Finder</a>
        <a class="real-button" href="<?php echo esc_url(arkos_url('contact-us/')); ?>">Enquire Now</a>
      </div>
    </div>
    <dl class="wp-range-diagnostics" aria-label="Range highlights">
      <div><dt><?php echo esc_html((string) $products->found_posts); ?></dt><dd>Products connected from WordPress</dd></div>
      <div><dt>Meta</dt><dd>Fitment, size and application fields are surfaced from product records</dd></div>
      <div><dt>Media</dt><dd>Gallery images, thumbnails and remote attachment fallbacks are supported</dd></div>
    </dl>
  </div>
</section>

<section class="wp-product-archive wp-range-products">
  <div class="real-section__inner">
    <div class="wp-product-toolbar">
      <span><?php echo esc_html($range['title']); ?></span>
      <a href="<?php echo esc_url(arkos_products_url()); ?>">All Products</a>
    </div>

    <?php if ($products->have_posts()) : ?>
      <div class="real-product-grid real-product-grid--archive">
        <?php while ($products->have_posts()) : $products->the_post(); ?>
          <?php
          $product_group = arkos_product_group_label(get_the_ID());
          $product_intro = $product_group === 'VETEK Auto Care'
              ? arkos_vetek_intro_from_content(get_the_ID())
              : wp_trim_words(wp_strip_all_tags(get_the_excerpt() ?: get_the_content()), 22);
          ?>
          <article class="real-product-card">
            <a class="real-product-card__image" href="<?php the_permalink(); ?>">
              <img src="<?php echo esc_url(arkos_product_image_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
            </a>
            <div class="real-product-card__body">
              <span><?php echo esc_html($product_group); ?></span>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p><?php echo esc_html(wp_trim_words($product_intro, 22)); ?></p>
              <?php $specs = arkos_product_specs(get_the_ID()); ?>
              <?php if ($specs) : ?>
                <dl class="wp-mini-specs">
                  <?php foreach (array_slice($specs, 0, 3) as $label => $value) : ?>
                    <div><dt><?php echo esc_html($label); ?></dt><dd><?php echo esc_html($value); ?></dd></div>
                  <?php endforeach; ?>
                </dl>
              <?php endif; ?>
              <?php $amazon_links = arkos_product_amazon_links(get_the_ID()); ?>
              <?php if ($amazon_links) : ?>
                <a class="wp-card-commerce-link" href="<?php echo esc_url($amazon_links[0]['url']); ?>" target="_blank" rel="noopener sponsored">
                  <i class="fa-brands fa-amazon" aria-hidden="true"></i>
                  <span>Buy on Amazon</span>
                </a>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    <?php else : ?>
      <div class="wp-empty-state">
        <h2>No products assigned yet</h2>
        <p>Assign imported products to the matching WordPress category to populate this range automatically.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php if (!empty($range['support'])) : ?>
  <section class="wp-range-support">
    <div class="real-section__inner">
      <div class="real-section__head">
        <p class="real-kicker">Application Support</p>
        <h2>Usage guidance from the product range.</h2>
      </div>
      <ol class="range-note-list">
        <?php foreach ($range['support'] as $item) : ?>
          <li>
            <i class="<?php echo esc_attr($item['icon'] ?? 'fa-solid fa-circle-check'); ?>" aria-hidden="true"></i>
            <div>
              <strong><?php echo esc_html($item['title'] ?? 'Support'); ?></strong>
              <span><?php echo esc_html($item['text'] ?? ''); ?></span>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>
<?php endif; ?>
