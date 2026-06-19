<?php get_header(); ?>

<section class="wp-page-hero wp-page-hero--products">
  <div class="real-section__inner">
    <p class="real-kicker">Products</p>
    <h1>ARKOS product range</h1>
    <p>Browse imported Arkos Gripp tyre and VETEK auto care products from WordPress.</p>
  </div>
</section>

<section class="wp-product-archive">
  <div class="real-section__inner">
    <?php if (have_posts()) : ?>
      <div class="wp-product-toolbar">
        <span><?php echo esc_html($wp_query->found_posts); ?> products</span>
        <a href="<?php echo arkos_url('product-finder/'); ?>">Product Finder</a>
      </div>
      <div class="real-product-grid real-product-grid--archive">
        <?php while (have_posts()) : the_post(); ?>
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
              <?php $amazon_links = arkos_product_amazon_links(get_the_ID()); ?>
              <?php if ($amazon_links) : ?>
                <a class="wp-card-commerce-link" href="<?php echo esc_url($amazon_links[0]['url']); ?>" target="_blank" rel="noopener sponsored">
                  <i class="fa-brands fa-amazon" aria-hidden="true"></i>
                  <span>Buy on Amazon</span>
                </a>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
      <div class="wp-pagination"><?php the_posts_pagination(['mid_size' => 1]); ?></div>
    <?php else : ?>
      <div class="wp-empty-state">
        <h2>No products found</h2>
        <p>The product template is ready. Import or switch to the staging content prefix to show products here.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
