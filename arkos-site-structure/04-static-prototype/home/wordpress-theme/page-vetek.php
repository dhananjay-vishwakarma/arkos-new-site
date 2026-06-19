<?php
get_header();

while (have_posts()) {
    the_post();

    $products = arkos_query_range_products(['vetek'], '', 16);
    ?>

    <article class="vetek-range-page">
      <section class="vetek-range-hero" aria-label="<?php esc_attr_e('VETEK range hero', 'arkos-staging'); ?>">
        <img
          src="https://arkos.in/wp-content/uploads/2025/07/website-banner-vetek-02-02-e1752756674903.webp"
          alt="<?php esc_attr_e('VETEK Auto Care Expert', 'arkos-staging'); ?>"
          width="1920"
          height="500"
        />
      </section>

      <section class="vetek-range-intro">
        <div class="real-section__inner vetek-range-intro__grid vetek-range-intro__grid--simple">
          <div class="vetek-range-intro__copy">
            <p>VETEK is a next-generation auto care brand from the house of Arkos, backed by the trusted legacy of Apar Industries.</p>
            <p>Crafted for discerning car and bike owners, our products are engineered to deliver showroom-level vehicle maintenance and superior protection with every use.</p>
            <p>Rooted in innovation and built on decades of automotive expertise, VETEK simplifies vehicle care without compromising on performance or quality. Whether you&rsquo;re a daily commuter or an automotive enthusiast, VETEK ensures your ride always looks its best &mdash; and performs even better.</p>
          </div>
        </div>
      </section>

      <section class="vetek-related-products vetek-range-products">
        <div class="real-section__inner">
          <h2>Products</h2>

          <?php if ($products->have_posts()) : ?>
            <div class="vetek-related-grid">
              <?php while ($products->have_posts()) : $products->the_post(); ?>
                <?php
                $product_id = get_the_ID();
                $product_image = arkos_vetek_packshot_url($product_id) ?: arkos_product_image_url($product_id, 'medium_large');
                $product_intro = arkos_vetek_intro_from_content($product_id);
                ?>
                <article class="vetek-related-card">
                  <a class="vetek-related-card__image" href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($product_image); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                  </a>
                  <div class="vetek-related-card__body">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo esc_html(wp_trim_words($product_intro, 18)); ?></p>
                    <a class="vetek-related-card__link" href="<?php the_permalink(); ?>">View Details <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                  </div>
                </article>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>
          <?php else : ?>
            <div class="wp-empty-state">
              <h2>No products assigned yet</h2>
              <p>Assign VETEK products to the matching WordPress category to populate this range automatically.</p>
            </div>
          <?php endif; ?>
        </div>
      </section>
    </article>
    <?php
}

get_footer();
