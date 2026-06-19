<?php
get_header();
$is_product_finder = is_page(['product-finder', 'tyre-product-finder']);
$is_tyre_product_finder = is_page('tyre-product-finder');
$is_manufacturing_facility = is_page('manufacturing-facility');
$is_company_introduction = is_page('company-introduction');
$is_logo_description = is_page('logo-description');
$is_mission_vision = is_page('mission-vision');
$is_executive_team = is_page('executive-team');
$is_product_data_sheets = is_page('product-data-sheets-2');
$is_contact_us = is_page('contact-us');
$is_bolt_battery_product = arkos_is_bolt_battery_page();
$product_data_sheets_hero_image = 'https://arkos.in/wp-content/uploads/2024/01/Arkos-Website-Banner-Final.jpg';
$content_classes = ['wp-content-section'];

if ($is_product_finder) {
    $content_classes[] = 'wp-content-section--product-finder';
}

if ($is_tyre_product_finder) {
    $content_classes[] = 'wp-content-section--tyre-product-finder';
}

if ($is_company_introduction) {
    $content_classes[] = 'wp-content-section--company-introduction';
}

if ($is_logo_description) {
    $content_classes[] = 'wp-content-section--logo-description';
}

if ($is_mission_vision) {
    $content_classes[] = 'wp-content-section--mission-vision';
}

if ($is_executive_team) {
    $content_classes[] = 'wp-content-section--executive-team';
}

if ($is_product_data_sheets) {
    $content_classes[] = 'wp-content-section--product-data-sheets';
}

if ($is_contact_us) {
    $content_classes[] = 'wp-content-section--contact-us';
}

if ($is_manufacturing_facility) {
    $facility_cards = [
        [
            'title' => 'Rabale Plant',
            'image' => content_url('uploads/2020/09/plant-pic1.jpg'),
        ],
        [
            'title' => 'Rabale Office',
            'image' => content_url('uploads/2020/09/plant-pic2.jpg'),
        ],
        [
            'title' => 'Oil Storage Tanks',
            'image' => content_url('uploads/2020/09/plant-pic3.jpg'),
        ],
        [
            'title' => 'Oil Blenders',
            'image' => content_url('uploads/2020/09/plant-pic4.jpg'),
        ],
    ];

    $capability_cards = [
        [
            'number' => '01',
            'title' => 'Quality Accredited',
            'icon' => 'fa-solid fa-award',
            'content' => 'Plant is accredited with <span class="manufacturing-text-emphasis">ISO 9001-2008</span> and <span class="manufacturing-text-emphasis">ISO 14001-2004</span> Quality Management Systems.',
        ],
        [
            'number' => '02',
            'title' => 'Lab & Process Excellence',
            'icon' => 'fa-solid fa-flask',
            'content' => '<span class="manufacturing-text-emphasis">NABL</span> accredited lab and Six Sigma accreditation.',
        ],
        [
            'number' => '03',
            'title' => 'Advanced Automation',
            'icon' => 'fa-solid fa-gears',
            'content' => 'The plant has Automated Blending with <span class="manufacturing-text-emphasis">SCADA, PLC, Load Cells</span> and Automated Drumming, Dry Air & Nitrogen Blanketing, Internal Service Measurements.',
        ],
        [
            'number' => '04',
            'title' => 'Flexible & Efficient Operations',
            'icon' => 'fa-solid fa-vials',
            'content' => 'The plant also has best fill Rates for <span class="manufacturing-text-emphasis">Timely Delivery Cost, Quality Measurements, Flexible Manufacturing:</span> Multiple grades manufacturing & filling simultaneously.',
        ],
    ];
    ?>

<section class="manufacturing-page">
  <div class="real-section__inner manufacturing-page__inner">
    <div class="manufacturing-page__intro">
      <p class="manufacturing-page__kicker">ARKOS Manufacturing Facility</p>
      <h1>Built for Scale. <span>Engineered for Precision.</span></h1>
      <p>Our advanced manufacturing ecosystem in Rabale is designed for quality, consistency and performance at every step.</p>
      <div class="manufacturing-page__rule" aria-hidden="true"><span></span></div>
    </div>

    <div class="manufacturing-facility-grid" aria-label="Manufacturing facility areas">
      <?php foreach ($facility_cards as $card) : ?>
        <article class="manufacturing-facility-card">
          <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['title']); ?>" />
          <div class="manufacturing-facility-card__body">
            <span class="manufacturing-facility-card__title"><?php echo esc_html($card['title']); ?></span>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="manufacturing-capability-grid" aria-label="Manufacturing capability highlights">
      <?php foreach ($capability_cards as $card) : ?>
        <article class="manufacturing-capability-card">
          <div class="manufacturing-capability-card__top">
            <span class="manufacturing-capability-card__icon"><i class="<?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i></span>
            <span class="manufacturing-capability-card__number"><?php echo esc_html($card['number']); ?></span>
          </div>
          <span class="manufacturing-capability-card__accent" aria-hidden="true"></span>
          <h2><?php echo esc_html($card['title']); ?></h2>
          <p><?php echo wp_kses($card['content'], ['span' => ['class' => []]]); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
    get_footer();
    return;
}

if ($is_bolt_battery_product) {
    while (have_posts()) :
        the_post();
        $battery_profile = arkos_bolt_battery_profile(get_the_ID());
        $battery_specs = $battery_profile['specs'];
        $battery_related = arkos_bolt_battery_pages(get_the_ID());
        ?>

<article class="vetek-product-page bolt-product-page">
  <section class="vetek-product-hero">
    <div class="real-section__inner vetek-product-hero__grid">
      <div class="vetek-product-media">
        <figure class="vetek-product-main bolt-product-main">
          <img class="vetek-product-main__image" src="<?php echo esc_url($battery_profile['image']); ?>" alt="<?php the_title_attribute(); ?>" />
        </figure>
      </div>

      <div class="vetek-product-copy">
        <h1><?php the_title(); ?></h1>
        <p><?php echo esc_html($battery_profile['intro']); ?></p>

        <?php if ($battery_profile['subtitle']) : ?>
          <p class="vetek-pack-size bolt-product-rating">Rating: <span><?php echo esc_html($battery_profile['subtitle']); ?></span></p>
        <?php endif; ?>

        <?php if ($battery_specs) : ?>
          <div class="vetek-suitable bolt-product-details">
            <h2>Product Details</h2>
            <ul>
              <?php
              $detail_icons = [
                  'Dimensions in MM' => 'fa-solid fa-ruler-combined',
                  'Filled Weight' => 'fa-solid fa-weight-hanging',
                  'Rated Capacity' => 'fa-solid fa-bolt',
              ];
              foreach ($battery_specs as $label => $value) :
                  $icon = $detail_icons[$label] ?? 'fa-solid fa-circle-check';
                  ?>
                <li>
                  <i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
                  <span><?php echo esc_html($label . ': ' . $value); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="vetek-features vetek-specifications">
            <h2>Specifications</h2>
            <ul>
              <?php foreach ($battery_specs as $label => $value) : ?>
                <li><?php echo esc_html($label . ': ' . $value); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php if ($battery_related) : ?>
    <section class="vetek-related-products bolt-related-products">
      <div class="real-section__inner">
        <h2>Related Batteries</h2>
        <div class="vetek-related-grid">
          <?php foreach ($battery_related as $related) : ?>
            <article class="vetek-related-card">
              <a class="vetek-related-card__image" href="<?php echo esc_url($related['url']); ?>">
                <img src="<?php echo esc_url($related['image']); ?>" alt="<?php echo esc_attr($related['title']); ?>" loading="lazy" />
              </a>
              <div class="vetek-related-card__body">
                <h3><a href="<?php echo esc_url($related['url']); ?>"><?php echo esc_html($related['title']); ?></a></h3>
                <?php if ($related['subtitle']) : ?>
                  <p><?php echo esc_html($related['subtitle']); ?></p>
                <?php endif; ?>
                <a class="vetek-related-card__link" href="<?php echo esc_url($related['url']); ?>">View Details <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
</article>

<?php
    endwhile;
    get_footer();
    return;
}
?>

<?php if ($is_product_data_sheets) : ?>
<article class="vetek-range-page">
<section class="vetek-range-hero" aria-label="Product Data Sheets hero image">
    <img
      src="<?php echo esc_url($product_data_sheets_hero_image); ?>"
      alt="Product Data Sheets"
      width="1920"
      height="500"
    />
  </section>
</article>
<?php endif; ?>

<section class="<?php echo esc_attr(implode(' ', $content_classes)); ?>">
    <div class="real-section__inner wp-content-grid<?php echo ($is_product_finder || $is_company_introduction || $is_logo_description || $is_mission_vision || $is_executive_team || $is_product_data_sheets || $is_contact_us) ? ' wp-content-grid--full' : ''; ?>">
    <article class="wp-content-card">
      <?php
      while (have_posts()) :
          the_post();
          if (trim(get_the_content())) {
              if ($is_executive_team) {
                  remove_filter('the_content', 'wpautop');
                  the_content();
                  add_filter('the_content', 'wpautop');
              } elseif ($is_product_data_sheets) {
                  ob_start();
                  the_content();
                  $content = ob_get_clean();
                  $content = preg_replace(
                      [
                          '/<h1[^>]*>\s*Downloads\s*&ndash;\s*Product Data Sheets\s*<\/h1>\s*/i',
                          '/<h1[^>]*>\s*Downloads\s*–\s*Product Data Sheets\s*<\/h1>\s*/iu',
                      ],
                      '',
                      $content
                  );
                  echo $content;
              } else {
                  the_content();
              }
          } else {
              echo '<p>' . esc_html__('Content for this page is being prepared in WordPress.', 'arkos-staging') . '</p>';
          }
      endwhile;
      ?>
    </article>
    <?php if (!$is_company_introduction && !$is_logo_description && !$is_mission_vision && !$is_product_finder && !$is_executive_team && !$is_product_data_sheets && !$is_contact_us) : ?>
      <aside class="wp-related-panel" aria-label="Related sections">
        <h2>Explore ARKOS</h2>
        <a href="<?php echo arkos_products_url(); ?>">Products</a>
        <a href="<?php echo arkos_url('manufacturing-facility/'); ?>">Manufacturing Facility</a>
        <a href="<?php echo arkos_url('downloads/'); ?>">Downloads</a>
        <a href="<?php echo arkos_url('contact-us/'); ?>">Contact Us</a>
      </aside>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
