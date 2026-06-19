<?php
get_header();

$brochures = [
    [
        'number' => '01',
        'label' => 'Lubricants Catalogue',
        'title' => 'ARKOS Lubricants',
        'summary' => 'A complete product catalogue for motorcycle oils, passenger car motor oils, diesel engine oils, gear and transmission oils, grease, hydraulic oils and related lubricant ranges.',
        'download' => 'https://arkos.in/~arkosin/wp-content/uploads/2023/12/Arkos-Drivz-Luricant-Product-Broucher-updated.pdf',
        'accent' => 'red',
        'pages' => [
            'https://arkos.in/~arkosin/wp-content/uploads/2023/12/arkos_lubricants_brocer-01.png',
            'https://arkos.in/~arkosin/wp-content/uploads/2023/12/arkos_lubricants_brocer-02.png',
            'https://arkos.in/~arkosin/wp-content/uploads/2023/12/arkos_lubricants_brocer-03.png',
        ],
        'notes' => ['Automotive lubricants', 'Multiple pack sizes', 'Product range reference'],
    ],
    [
        'number' => '02',
        'label' => 'Battery Leaflet',
        'title' => 'BOLT Battery',
        'summary' => 'Focused brochure material for the BOLT VRLA battery range, including product positioning, warranty messaging and two-wheeler battery customer-facing communication.',
        'download' => 'https://arkos.in/~arkosin/wp-content/uploads/2024/04/Arkos-Bolt_Battery_Leaflet_compressed.pdf',
        'accent' => 'yellow',
        'pages' => [
            'https://arkos.in/~arkosin/wp-content/uploads/2020/09/bolt-leaflet-1.jpg',
            'https://arkos.in/~arkosin/wp-content/uploads/2020/09/bolt-leaflet-2.jpg',
        ],
        'notes' => ['Two-wheeler batteries', 'Warranty communication', 'Dealer-ready leaflet'],
    ],
    [
        'number' => '03',
        'label' => 'Tyre Catalogue',
        'title' => 'ARKOS Gripp',
        'summary' => 'Product catalogue for Arkos Gripp tyres covering two-wheeler, EV and three-wheeler range communication with brochure spreads built for distributor and customer reference.',
        'download' => 'https://arkos.in/~arkosin/wp-content/uploads/2023/12/Arkos-Gripp-Product-Catalogue-A3_revised.pdf',
        'accent' => 'steel',
        'pages' => [
            'https://arkos.in/~arkosin/wp-content/uploads/2023/12/Arkos-grip-brocers_02.png',
            'https://arkos.in/~arkosin/wp-content/uploads/2023/12/Arkos-grip-brocers_03.png',
            'https://arkos.in/~arkosin/wp-content/uploads/2023/12/Arkos-grip-brocers_04.png',
        ],
        'notes' => ['Tyre range overview', 'Fitment context', 'Sales catalogue'],
    ],
];
?>

<section class="brochure-hero" aria-labelledby="brochure-title">
  <div class="real-section__inner brochure-hero__grid">
    <div class="brochure-hero__copy">
      <p class="real-kicker">Downloads / Brochure</p>
      <h1 id="brochure-title">Printed range material for sales, service and product selection.</h1>
      <p>Choose the correct ARKOS brochure by business division. Each file opens as the original brochure PDF, with preview spreads shown as product reference instead of generic document cards.</p>
      <nav class="brochure-index" aria-label="Brochure sections">
        <?php foreach ($brochures as $brochure) : ?>
          <a href="#brochure-<?php echo esc_attr($brochure['number']); ?>">
            <span><?php echo esc_html($brochure['number']); ?></span>
            <?php echo esc_html($brochure['title']); ?>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>
    <div class="brochure-hero__stack" aria-hidden="true">
      <?php foreach (array_slice($brochures, 0, 3) as $brochure) : ?>
        <img src="<?php echo esc_url($brochure['pages'][0]); ?>" alt="" loading="eager" />
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="brochure-library" aria-label="Available brochure downloads">
  <div class="real-section__inner">
    <?php foreach ($brochures as $brochure) : ?>
      <article id="brochure-<?php echo esc_attr($brochure['number']); ?>" class="brochure-row brochure-row--<?php echo esc_attr($brochure['accent']); ?>">
        <div class="brochure-row__marker" aria-hidden="true">
          <span><?php echo esc_html($brochure['number']); ?></span>
        </div>

        <div class="brochure-row__copy">
          <p class="brochure-row__label"><?php echo esc_html($brochure['label']); ?></p>
          <h2><?php echo esc_html($brochure['title']); ?></h2>
          <p><?php echo esc_html($brochure['summary']); ?></p>
          <ul class="brochure-row__notes">
            <?php foreach ($brochure['notes'] as $note) : ?>
              <li><?php echo esc_html($note); ?></li>
            <?php endforeach; ?>
          </ul>
          <a class="brochure-download" href="<?php echo esc_url($brochure['download']); ?>" target="_blank" rel="noopener noreferrer">
            Download PDF
            <span><?php echo esc_html($brochure['title']); ?></span>
          </a>
        </div>

        <div class="brochure-row__preview" aria-label="<?php echo esc_attr($brochure['title']); ?> brochure preview pages">
          <?php foreach ($brochure['pages'] as $index => $page) : ?>
            <figure>
              <img src="<?php echo esc_url($page); ?>" alt="<?php echo esc_attr($brochure['title'] . ' brochure page ' . ($index + 1)); ?>" loading="lazy" />
            </figure>
          <?php endforeach; ?>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="brochure-support" aria-labelledby="brochure-support-title">
  <div class="real-section__inner brochure-support__grid">
    <div>
      <p class="real-kicker">Resource Desk</p>
      <h2 id="brochure-support-title">Need product documents beyond brochures?</h2>
    </div>
    <nav class="brochure-support__links" aria-label="Related downloads">
      <a href="<?php echo esc_url(arkos_url('product-data-sheets-2/')); ?>">Product Data Sheets</a>
      <a href="<?php echo esc_url(arkos_url('test-certificates/')); ?>">Test Certificates</a>
      <a href="<?php echo esc_url(arkos_url('product-films/')); ?>">Product Films</a>
      <a href="<?php echo esc_url(arkos_url('contact-us/')); ?>">Contact ARKOS</a>
    </nav>
  </div>
</section>

<?php get_footer(); ?>
