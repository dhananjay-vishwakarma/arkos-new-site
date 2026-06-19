<?php
get_header();

while (have_posts()) {
    the_post();

    $go_intro = [
        'Two wheelers are crafted in the principles of speed. With a similar thought, Go Range of 2 wheeler tyres from Arkos Gripp are being introduced.',
        'The word \'Go\' is inspired from Velocity which stands for swiftness and speed.',
        'Go Range of 2 Wheeler tyres, are exclusively designed in order to enhance fuel efficiency, riding performance and ensure safety with high grip and cornering stability.',
    ];
    ?>

    <article class="vetek-product-page legacy-lubricant-page go-range-page">
      <section class="legacy-lubricant-intro legacy-lubricant-intro--image legacy-lubricant-intro--no-overlay go-range-hero" style="background-image: url('https://arkos.in/wp-content/uploads/2023/07/Arkos-Gripp-1.jpg');">
        <div class="real-section__inner"></div>
      </section>

      <section class="legacy-lubricant-summary go-range-summary">
        <div class="real-section__inner go-range-summary__grid">
          <figure class="go-range-summary__logo">
            <img src="https://arkos.in/wp-content/uploads/2023/08/Arkos-Gripp-GO-logo.jpg" alt="<?php esc_attr_e('Arkos Gripp Go', 'arkos-staging'); ?>" />
          </figure>
          <div>
            <h2>Segment: Motor Bikes &amp; Scooters</h2>
            <?php foreach ($go_intro as $paragraph) : ?>
              <p><?php echo esc_html($paragraph); ?></p>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="vetek-product-hero legacy-lubricant-product go-tube-section" id="genuine-butyl-tube">
        <div class="real-section__inner vetek-product-hero__grid">
          <div class="vetek-product-media">
            <figure class="vetek-product-main">
              <img class="vetek-product-main__image" src="https://arkos.in/wp-content/uploads/2022/11/GRIPP-TUBE-POUCH-Front.png" alt="<?php esc_attr_e('Arkos Gripp Genuine Butyl Tube', 'arkos-staging'); ?>" loading="eager" />
            </figure>
            <div class="vetek-product-thumbs" aria-label="<?php esc_attr_e('Product gallery', 'arkos-staging'); ?>">
              <button class="vetek-product-thumb is-active" type="button" data-image="https://arkos.in/wp-content/uploads/2022/11/GRIPP-TUBE-POUCH-Front.png" aria-label="<?php esc_attr_e('Show front pouch image', 'arkos-staging'); ?>">
                <img src="https://arkos.in/wp-content/uploads/2022/11/GRIPP-TUBE-POUCH-Front.png" alt="" loading="eager" />
              </button>
              <button class="vetek-product-thumb" type="button" data-image="https://arkos.in/wp-content/uploads/2022/11/GRIPP-TUBE-POUCH-Rev.png" aria-label="<?php esc_attr_e('Show reverse pouch image', 'arkos-staging'); ?>">
                <img src="https://arkos.in/wp-content/uploads/2022/11/GRIPP-TUBE-POUCH-Rev.png" alt="" loading="lazy" />
              </button>
            </div>
          </div>

          <div class="vetek-product-copy">
            <h1>Arkos Gripp Genuine Butyl Tube</h1>
            <div class="vetek-features">
              <h2>Fitment</h2>
              <ul>
                <li>Suitable for Arkos Gripp Go D22, Go F22, Go R22, Go R-23, EVA AL 22, etc.</li>
              </ul>
            </div>

            <div class="vetek-features go-tube-fitment">
              <h2>Universal Tyre Brands &amp; Sizes</h2>
              <ul>
                <li>Motorcycle, Scooter, 3 Wheeler, E-Rickshaw</li>
              </ul>
              <div class="go-tube-table-wrap">
                <table class="go-tube-table">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>RIM Size</th>
                      <th>Tyre Size</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td>Motorcycle</td><td>19</td><td>3.25/3.50-19</td></tr>
                    <tr><td>Motorcycle</td><td>18</td><td>2.75-18, 300-18, 2.75/3.00-18, 80/100-18, 100/90-18</td></tr>
                    <tr><td>Motorcycle</td><td>17</td><td>2.75-17, 3.00-17, 2.75/3.00-17, 100/90-17</td></tr>
                    <tr><td>Moped</td><td>16</td><td>2.50-16</td></tr>
                    <tr><td>Scooter</td><td>10</td><td>3.50-10, 3.00-10, 100/90-10, 90/100-10, 3.50-10/90/100-10</td></tr>
                    <tr><td>Scooter</td><td>12</td><td>90/90-12</td></tr>
                    <tr><td>3 Wheeler</td><td>10</td><td>4.50/5.00-10</td></tr>
                    <tr><td>3 Wheeler</td><td>8</td><td>4.00-8</td></tr>
                    <tr><td>E-Rickshaw</td><td>12</td><td>3.75-12</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </article>

    <script src="<?php echo esc_url(get_template_directory_uri() . '/vetek-gallery.js?v=20260617'); ?>"></script>
    <?php
}

get_footer();
