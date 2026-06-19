<?php
get_header();

while (have_posts()) {
    the_post();

    $battery_pages = arkos_bolt_battery_pages();
    $hero_image = 'https://arkos.in/~arkosin/wp-content/uploads/2023/07/Arkos-Bolt-Battery-Banner.jpg';
    ?>

    <article class="bolt-range-page">
      <section class="bolt-range-hero" aria-label="<?php esc_attr_e('ARKOS 2 Wheeler Batteries', 'arkos-staging'); ?>">
        <img
          src="<?php echo esc_url($hero_image); ?>"
          alt="<?php esc_attr_e('ARKOS 2 Wheeler Batteries', 'arkos-staging'); ?>"
          width="1920"
          height="500"
        />
      </section>

      <section class="bolt-range-intro">
        <div class="real-section__inner">
          <div class="bolt-range-intro__copy">
            <h1>ARKOS 2 Wheeler Batteries</h1>
            <p>ARKOS redefines your relationship with energy. Minimize your carbon footprint.</p>
            <p>Take control of your power costs today.</p>
            <a class="bolt-range-cta" href="https://wms.arkos.in/login" target="_blank" rel="noopener">Bolt Warranty Management System <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
          </div>
        </div>
      </section>

      <section class="vetek-related-products vetek-range-products bolt-range-products">
        <div class="real-section__inner">
          <h2>Battery Range</h2>

          <?php if ($battery_pages) : ?>
            <div class="vetek-related-grid">
              <?php foreach ($battery_pages as $battery) : ?>
                <article class="vetek-related-card">
                  <a class="vetek-related-card__image" href="<?php echo esc_url($battery['url']); ?>">
                    <img src="<?php echo esc_url($battery['image']); ?>" alt="<?php echo esc_attr($battery['title']); ?>" loading="lazy" />
                  </a>
                  <div class="vetek-related-card__body">
                    <h3><a href="<?php echo esc_url($battery['url']); ?>"><?php echo esc_html($battery['title']); ?></a></h3>
                    <?php if ($battery['subtitle']) : ?>
                      <p><?php echo esc_html($battery['subtitle']); ?></p>
                    <?php endif; ?>
                    <a class="vetek-related-card__link" href="<?php echo esc_url($battery['url']); ?>">View Details <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          <?php else : ?>
            <div class="wp-empty-state">
              <h2>No battery products assigned yet</h2>
              <p>Add the BOLT battery detail pages under this range to populate the battery cards.</p>
            </div>
          <?php endif; ?>
        </div>
      </section>

      <section class="bolt-care-section">
        <div class="real-section__inner bolt-care-grid">
          <div class="bolt-care-card bolt-care-card--installation">
            <p class="bolt-care-card__eyebrow">Battery Installation</p>
            <h2>Steps for Battery Installation</h2>
            <ol>
              <li><span>01</span>Turn OFF the engine.</li>
              <li><span>02</span>Disconnect the negative cable followed by the positive one.</li>
              <li><span>03</span>Loosen the clamps and dismantle the battery. Avoid using a hammer on the cable terminals as it may result in damaging the lid, internal post connections or post lid insert connections.</li>
              <li><span>04</span>Place the new battery firmly in the cradle and check if the starter, alternator and voltage regulation are operating correctly.</li>
              <li><span>05</span>Connect the positive cable and then the negative cable.</li>
            </ol>
          </div>

          <div class="bolt-care-card">
            <p class="bolt-care-card__eyebrow">Care Guidance</p>
            <h2>Dos and Don&rsquo;ts</h2>
            <div class="bolt-care-split">
              <section>
                <h3>Dos</h3>
                <p>When cleaning your battery, use a moist cotton cloth and disconnect the negative cable before the positive one. Next, tighten your clamps and apply petroleum jelly. Check the output of the voltage regulator as both overcharging and undercharging can reduce the life of the battery. Recharge your battery only at the recommended current.</p>
              </section>
              <section>
                <h3>Don&rsquo;ts</h3>
                <p>Avoid storing the battery sideways. Do not install a lower capacity battery than recommended or interfere with the current charging setting in order to quickly charge the battery as this will seriously affect the battery&rsquo;s life. While charging, do not connect or remove the battery from the charging circuit while the charger is on; wait till the display shows charge finish.</p>
              </section>
            </div>
          </div>
        </div>
      </section>
    </article>
    <?php
}

get_footer();
