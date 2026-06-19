<section
  class="real-story real-story-art"
  aria-labelledby="real-story-title"
  style="
    --story-aspect: 1331 / 630;
    --story-pattern-opacity: 0.28;
    --story-copy-z: 4;
    --story-visual-z: 1;
    --story-kicker-x: 10.52%;
    --story-kicker-y: 14.92%;
    --story-kicker-size: clamp(12px, 1.18vw, 16px);
    --story-kicker-weight: 500;
    --story-title-x: 10.52%;
    --story-title-y: 24.6%;
    --story-title-width: 60%;
    --story-title-size: 56px;
    --story-title-weight: 700;
    --story-title-line-height: 1.02;
    --story-body-x: 10.52%;
    --story-body-y: 45.4%;
    --story-body-width: 28.17%;
    --story-body-size: clamp(10px, 1.18vw, 16px);
    --story-body-weight: 400;
    --story-promise-y: 63.8%;
    --story-promise-weight: 900;
    --story-button-x: 10.52%;
    --story-button-y: 72.22%;
    --story-button-width: 20.81%;
    --story-button-height: 7.62%;
    --story-button-size: clamp(11px, 1.2vw, 16px);
    --story-button-weight: 500;
    --story-image-x: -0.9%;
    --story-image-y: -1.75%;
    --story-image-scale: 101.43%;
    --story-image-z: 5;
    --story-lead-slash-x: 46.36%;
    --story-lead-slash-y: -3.33%;
    --story-lead-slash-width: 12.47%;
    --story-lead-slash-height: 46.35%;
    --story-edge-slash-x: 78.96%;
    --story-edge-slash-y: -20.16%;
    --story-edge-slash-width: 26.45%;
    --story-edge-slash-height: 111.9%;
    --story-slash-z: 2;
  "
>
  <div class="story-art__copy">
    <p class="story-art__kicker">Our Story</p>
    <h2 id="real-story-title">
      <span>Driven by purpose.</span>
      <span class="story-art__title-red">Built on trust.</span>
    </h2>
    <p class="story-art__body">
      ARKOS, a brand of APPL, SINGAPORE, delivers world-class, technically advanced mobility solutions that power every journey. From engines to tyres, lubricants to batteries &mdash; every product is engineered for performance, reliability and Indian roads.
    </p>
    <p class="story-art__promise">Reliable products. Real performance. Always.</p>
    <a class="story-art__button" href="<?php echo arkos_url('about-us/company-introduction/'); ?>">
      <span>Know more about us</span>
      <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
    </a>
  </div>

  <div class="story-art__visual" aria-hidden="true">
    <picture>
      <source srcset="<?php echo esc_url(get_template_directory_uri() . '/assets/our-story/rider-road.webp?v=story-speed-20260618-1'); ?>" type="image/webp" />
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/our-story/rider-road.png?v=story-speed-20260618-1'); ?>" alt="" loading="lazy" decoding="async" />
    </picture>
    <span class="story-art__slash story-art__slash--lead"></span>
    <span class="story-art__slash story-art__slash--edge"></span>
  </div>
</section>

<?php
$range_assets_uri = get_template_directory_uri() . '/assets/product-range-cards';
$range_assets_version = 'range-speed-20260618-1';
$range_cards = [
  [
    'class' => 'range-showcase-card--lubricants',
    'label' => 'Premium Performance',
    'title' => ['Arkos', 'Lubricants'],
    'copy' => 'High-performance engine oils and lubricants engineered for superior protection, efficiency and longer engine life.',
    'href' => arkos_url('motorcycle-oils/'),
    'bg' => 'lubricants-bg.webp',
    'product' => 'product-lubricants.webp',
    'alt' => 'ARKOS Blitz engine oil',
  ],
  [
    'class' => 'range-showcase-card--batteries',
    'label' => 'Dependable Power',
    'title' => ['Bolt', 'Batteries'],
    'copy' => 'Reliable starting power with long life, high cranking performance and low maintenance.',
    'href' => arkos_url('2-wheeler-batteries/'),
    'bg' => 'batteries-bg.webp',
    'product' => 'product-batteries.webp',
    'alt' => 'Bolt premium battery',
  ],
  [
    'class' => 'range-showcase-card--tyres',
    'label' => 'Built To Grip',
    'title' => ['Arkos Gripp', 'Tyre'],
    'copy' => 'Advanced tyre technology for unmatched grip, safety and all-road confidence.',
    'href' => arkos_url('tyre-product-finder/'),
    'bg' => 'tyres-bg.webp',
    'product' => 'product-tyres.webp',
    'alt' => 'ARKOS Gripp tyre',
  ],
  [
    'class' => 'range-showcase-card--auto-care',
    'label' => 'Clean. Protect. Perform.',
    'title' => ['Vetek', 'Auto Care'],
    'copy' => 'Next-gen car care range for cleaning, protection and peak vehicle performance.',
    'href' => arkos_url('vetek/'),
    'bg' => 'auto-care-bg.webp',
    'product' => 'product-auto-care.webp',
    'alt' => 'Vetek auto care range',
  ],
];
?>

<section class="range-showcase" aria-labelledby="range-showcase-title">
  <div class="range-showcase__inner">
    <div class="range-showcase__head">
      <p class="range-showcase__eyebrow">Product Range</p>
      <h2 id="range-showcase-title">
        <span>Everything your</span>
        <span>vehicle needs</span>
      </h2>
      <p>Engineered for performance. Trusted by professionals. Powered by innovation. Backed by Arkos.</p>
    </div>

    <div class="range-showcase__grid">
      <?php foreach ($range_cards as $card) : ?>
        <article
          class="range-showcase-card <?php echo esc_attr($card['class']); ?>"
          style="--range-card-bg: url('<?php echo esc_url($range_assets_uri . '/' . $card['bg'] . '?v=' . $range_assets_version); ?>');"
        >
          <div class="range-showcase-card__copy">
            <p class="range-showcase-card__label"><?php echo esc_html($card['label']); ?></p>
            <h3>
              <?php foreach ($card['title'] as $index => $title_line) : ?>
                <span<?php echo $index === 1 ? ' class="range-showcase-card__title-red"' : ''; ?>><?php echo esc_html($title_line); ?></span>
              <?php endforeach; ?>
            </h3>
            <span class="range-showcase-card__rule" aria-hidden="true"></span>
            <p class="range-showcase-card__text"><?php echo esc_html($card['copy']); ?></p>
            <a class="range-showcase-card__button" href="<?php echo esc_url($card['href']); ?>">
              <span>Explore</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>

          <img
            class="range-showcase-card__product"
            src="<?php echo esc_url($range_assets_uri . '/' . $card['product'] . '?v=' . $range_assets_version); ?>"
            alt="<?php echo esc_attr($card['alt']); ?>"
            loading="lazy"
            decoding="async"
          />

          <?php if (!empty($card['features'])) : ?>
            <ul class="range-showcase-card__features" aria-label="<?php echo esc_attr($card['title'][0] . ' highlights'); ?>">
              <?php foreach ($card['features'] as $feature) : ?>
                <li>
                  <i class="<?php echo esc_attr($feature['icon']); ?>" aria-hidden="true"></i>
                  <span><?php echo esc_html($feature['text']); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
$why_reasons = [
  [
    'number' => '01',
    'theme' => 'red',
    'icon' => 'fa-solid fa-oil-can',
    'accent_icon' => 'fa-solid fa-shield-halved',
    'title' => ['Engineered', 'For', 'Performance'],
    'copy' => 'Advanced formulations designed for optimal engine protection, efficiency and longer life.',
  ],
  [
    'number' => '02',
    'theme' => 'dark',
    'icon' => 'fa-solid fa-road',
    'title' => ['Built For', 'Indian', 'Roads'],
    'copy' => 'Products developed to withstand India\'s diverse weather, road conditions and riding habits.',
  ],
  [
    'number' => '03',
    'theme' => 'red',
    'icon' => 'fa-solid fa-award',
    'accent_icon' => 'fa-solid fa-check',
    'title' => ['Trusted', 'Product', 'Quality'],
    'copy' => 'Manufactured with precision and tested to meet the highest industry standards.',
  ],
  [
    'number' => '04',
    'theme' => 'dark',
    'icon' => 'fa-solid fa-gears',
    'accent_icon' => 'fa-solid fa-bottle-droplet',
    'title' => ['Complete', 'Product', 'Ecosystem'],
    'copy' => 'Lubricants, batteries, tyres and auto care all working together for complete vehicle care.',
  ],
  [
    'number' => '05',
    'theme' => 'red',
    'icon' => 'fa-solid fa-location-dot',
    'title' => ['Pan-India', 'Reach'],
    'copy' => 'Strong distribution network ensuring availability across 2 and 3 wheelers, cars, trucks and more.',
  ],
];
?>

<section
  class="why-arkos"
  aria-labelledby="why-arkos-title"
  style="--why-bg: url('<?php echo esc_url(get_template_directory_uri() . '/assets/our-story/rider-road.webp?v=story-speed-20260618-1'); ?>');"
>
  <div class="why-arkos__frame">
    <div class="why-arkos__intro">
      <div class="why-arkos__intro-copy">
        <h2 id="why-arkos-title">
          <span>Why Choose</span>
          <span>Arkos</span>
        </h2>
        <span class="why-arkos__red-rule" aria-hidden="true"></span>
        <p class="why-arkos__promise">
          <strong>Powering Performance.</strong>
          <em>Delivering Trust.</em>
        </p>
        <p class="why-arkos__intro-text">
          From advanced formulations to extensive availability, ARKOS is engineered to keep your vehicle running at its best &mdash; every day, every mile.
        </p>
        <a class="why-arkos__button" href="<?php echo arkos_products_url(); ?>">
          <span>Explore Our Range</span>
          <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
      </div>
    </div>

    <div class="why-arkos__cards" aria-label="<?php esc_attr_e('Why choose ARKOS reasons', 'arkos-staging'); ?>">
      <?php foreach ($why_reasons as $reason) : ?>
        <article class="why-arkos-card why-arkos-card--<?php echo esc_attr($reason['theme']); ?>">
          <span class="why-arkos-card__number"><?php echo esc_html($reason['number']); ?></span>
          <span class="why-arkos-card__icon" aria-hidden="true">
            <i class="<?php echo esc_attr($reason['icon']); ?>"></i>
            <?php if (!empty($reason['accent_icon'])) : ?>
              <i class="<?php echo esc_attr($reason['accent_icon']); ?>"></i>
            <?php endif; ?>
          </span>
          <h3>
            <?php foreach ($reason['title'] as $line) : ?>
              <span><?php echo esc_html($line); ?></span>
            <?php endforeach; ?>
          </h3>
          <span class="why-arkos-card__rule" aria-hidden="true"></span>
          <p><?php echo esc_html($reason['copy']); ?></p>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php
$home_resources = [
  [
    'icon' => 'fa-solid fa-download',
    'title' => 'Downloads Overview',
    'copy' => 'One place for ARKOS brochures, certificates, approvals and other key documents.',
    'href' => arkos_url('downloads/'),
    'label' => 'Open downloads',
  ],
  [
    'icon' => 'fa-solid fa-book-open',
    'title' => 'Product Brochures',
    'copy' => 'Download lubricant catalogues, battery leaflets and tyre range brochures.',
    'href' => arkos_url('brochure/'),
    'label' => 'View brochures',
  ],
  [
    'icon' => 'fa-solid fa-table-list',
    'title' => 'Product Data Sheets',
    'copy' => 'Access product data sheets for specifications, grades and technical support.',
    'href' => arkos_url('product-data-sheets-2/'),
    'label' => 'View data sheets',
  ],
  [
    'icon' => 'fa-solid fa-certificate',
    'title' => 'Test Certificates',
    'copy' => 'Find test certificates and supporting quality documents for product compliance.',
    'href' => arkos_url('test-certificates/'),
    'label' => 'Open certificates',
  ],
  [
    'icon' => 'fa-solid fa-shield-halved',
    'title' => 'Approvals',
    'copy' => 'Review approval documents and validation references for ARKOS product lines.',
    'href' => arkos_url('approvals/'),
    'label' => 'View approvals',
  ],
  [
    'icon' => 'fa-solid fa-photo-film',
    'title' => 'Product Films',
    'copy' => 'Watch product films and visual resources for teams, partners and customers.',
    'href' => arkos_url('product-films/'),
    'label' => 'Watch films',
  ],
];
?>

<section class="home-resources" aria-labelledby="home-resources-title">
  <div class="home-resources__inner">
    <div class="home-resources__head">
      <p class="home-resources__kicker">Resource Centre</p>
      <h2 id="home-resources-title">
        <span>Download links and</span>
        <span>product resources</span>
      </h2>
      <p>Quick access to the most used ARKOS resource pages for brochures, technical files, approvals, certificates and visual material.</p>
    </div>

    <div class="home-resources__grid" aria-label="<?php esc_attr_e('ARKOS resource links', 'arkos-staging'); ?>">
      <?php foreach ($home_resources as $resource) : ?>
        <a class="home-resource-card" href="<?php echo esc_url($resource['href']); ?>">
          <span class="home-resource-card__icon" aria-hidden="true">
            <i class="<?php echo esc_attr($resource['icon']); ?>"></i>
          </span>
          <span class="home-resource-card__body">
            <strong><?php echo esc_html($resource['title']); ?></strong>
            <span><?php echo esc_html($resource['copy']); ?></span>
          </span>
          <span class="home-resource-card__action">
            <?php echo esc_html($resource['label']); ?>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </span>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="home-resources__footer">
      <a href="<?php echo esc_url(arkos_url('marcom-materials/')); ?>">Marcom Materials</a>
      <a href="<?php echo esc_url(arkos_url('product-finder/')); ?>">Product Finder</a>
      <a href="<?php echo esc_url(arkos_url('tyre-product-finder/')); ?>">Tyre Product Finder</a>
      <a href="<?php echo esc_url(arkos_url('contact-us/')); ?>">Request Support</a>
    </div>
  </div>
</section>

<aside class="story-control-panel" aria-label="Our Story section controls" hidden>
  <div class="story-control-panel__head">
    <h2>Our Story Controls</h2>
    <button type="button" data-story-panel-toggle aria-expanded="true">Hide</button>
  </div>
  <div class="story-control-panel__body">
    <fieldset>
      <legend>Layer Order</legend>
      <label>Copy z <input type="number" min="0" max="20" step="1" value="4" data-story-control="--story-copy-z" /></label>
      <label>Image z <input type="number" min="0" max="20" step="1" value="5" data-story-control="--story-image-z" /></label>
      <label>Slash z <input type="number" min="0" max="20" step="1" value="2" data-story-control="--story-slash-z" /></label>
    </fieldset>

    <fieldset>
      <legend>Image</legend>
      <label>X % <input type="range" min="-20" max="20" step="0.05" value="-0.9" data-story-control="--story-image-x" data-unit="%" /></label>
      <label>Y % <input type="range" min="-25" max="20" step="0.05" value="-1.75" data-story-control="--story-image-y" data-unit="%" /></label>
      <label>Scale % <input type="range" min="70" max="140" step="0.05" value="101.43" data-story-control="--story-image-scale" data-unit="%" /></label>
    </fieldset>

    <fieldset>
      <legend>Title</legend>
      <label>X % <input type="range" min="0" max="60" step="0.05" value="10.52" data-story-control="--story-title-x" data-unit="%" /></label>
      <label>Y % <input type="range" min="0" max="60" step="0.05" value="24.6" data-story-control="--story-title-y" data-unit="%" /></label>
      <label>Width % <input type="range" min="20" max="60" step="0.05" value="60" data-story-control="--story-title-width" data-unit="%" /></label>
      <label>Size px <input type="range" min="24" max="72" step="1" value="56" data-story-control="--story-title-size" data-unit="px" /></label>
      <label>Weight <input type="number" min="100" max="1000" step="100" value="700" data-story-control="--story-title-weight" /></label>
    </fieldset>

    <fieldset>
      <legend>Body Copy</legend>
      <label>X % <input type="range" min="0" max="60" step="0.05" value="10.52" data-story-control="--story-body-x" data-unit="%" /></label>
      <label>Y % <input type="range" min="20" max="75" step="0.05" value="45.4" data-story-control="--story-body-y" data-unit="%" /></label>
      <label>Width % <input type="range" min="15" max="50" step="0.05" value="28.17" data-story-control="--story-body-width" data-unit="%" /></label>
      <label>Size vw <input type="range" min="0.7" max="2.2" step="0.01" value="1.18" data-story-control="--story-body-size" data-unit="vw" /></label>
      <label>Weight <input type="number" min="100" max="1000" step="100" value="400" data-story-control="--story-body-weight" /></label>
      <label>Promise Y % <input type="range" min="45" max="85" step="0.05" value="63.8" data-story-control="--story-promise-y" data-unit="%" /></label>
      <label>Promise Weight <input type="number" min="100" max="1000" step="100" value="900" data-story-control="--story-promise-weight" /></label>
    </fieldset>

    <fieldset>
      <legend>Button</legend>
      <label>X % <input type="range" min="0" max="60" step="0.05" value="10.52" data-story-control="--story-button-x" data-unit="%" /></label>
      <label>Y % <input type="range" min="50" max="90" step="0.05" value="72.22" data-story-control="--story-button-y" data-unit="%" /></label>
      <label>Width % <input type="range" min="10" max="40" step="0.05" value="20.81" data-story-control="--story-button-width" data-unit="%" /></label>
      <label>Height % <input type="range" min="4" max="14" step="0.05" value="7.62" data-story-control="--story-button-height" data-unit="%" /></label>
      <label>Size vw <input type="range" min="0.7" max="2.2" step="0.01" value="1.2" data-story-control="--story-button-size" data-unit="vw" /></label>
      <label>Weight <input type="number" min="100" max="1000" step="100" value="500" data-story-control="--story-button-weight" /></label>
    </fieldset>

    <fieldset>
      <legend>Red Slashes</legend>
      <label>Lead X % <input type="range" min="20" max="80" step="0.05" value="46.36" data-story-control="--story-lead-slash-x" data-unit="%" /></label>
      <label>Lead Y % <input type="range" min="-30" max="40" step="0.05" value="-3.33" data-story-control="--story-lead-slash-y" data-unit="%" /></label>
      <label>Edge X % <input type="range" min="50" max="110" step="0.05" value="78.96" data-story-control="--story-edge-slash-x" data-unit="%" /></label>
      <label>Edge Y % <input type="range" min="-40" max="20" step="0.05" value="-20.16" data-story-control="--story-edge-slash-y" data-unit="%" /></label>
    </fieldset>

    <fieldset>
      <legend>Kicker</legend>
      <label>X % <input type="range" min="0" max="60" step="0.05" value="10.52" data-story-control="--story-kicker-x" data-unit="%" /></label>
      <label>Y % <input type="range" min="0" max="40" step="0.05" value="14.92" data-story-control="--story-kicker-y" data-unit="%" /></label>
      <label>Size vw <input type="range" min="0.7" max="2" step="0.01" value="1.18" data-story-control="--story-kicker-size" data-unit="vw" /></label>
      <label>Weight <input type="number" min="100" max="1000" step="100" value="500" data-story-control="--story-kicker-weight" /></label>
    </fieldset>

    <div class="story-control-panel__actions">
      <button type="button" data-story-copy-config>Copy Config</button>
      <button type="button" data-story-reset-config>Reset</button>
    </div>
    <textarea data-story-config-output readonly rows="10" aria-label="Our Story config output"></textarea>
  </div>
</aside>

<script>
(() => {
  const section = document.querySelector(".real-story-art");
  const panel = document.querySelector(".story-control-panel");
  if (!section || !panel) return;

  const shouldShowPanel = new URLSearchParams(window.location.search).get("story-controls") === "1";
  if (shouldShowPanel) {
    panel.hidden = false;
  }

  const storageKey = "arkos-story-controls-v1";
  const positionKey = "arkos-story-controls-position-v1";
  const controls = Array.from(panel.querySelectorAll("[data-story-control]"));
  const output = panel.querySelector("[data-story-config-output]");
  const panelHead = panel.querySelector(".story-control-panel__head");
  const toggle = panel.querySelector("[data-story-panel-toggle]");
  const copyButton = panel.querySelector("[data-story-copy-config]");
  const resetButton = panel.querySelector("[data-story-reset-config]");
  const defaults = Object.fromEntries(controls.map((control) => [control.dataset.storyControl, control.value]));

  function valueFor(control) {
    return `${control.value}${control.dataset.unit || ""}`;
  }

  function writeOutput() {
    const lines = controls.map((control) => `    ${control.dataset.storyControl}: ${valueFor(control)};`);
    output.value = lines.join("\n");
  }

  function applyControl(control) {
    section.style.setProperty(control.dataset.storyControl, valueFor(control));
  }

  function save() {
    const values = Object.fromEntries(controls.map((control) => [control.dataset.storyControl, control.value]));
    localStorage.setItem(storageKey, JSON.stringify(values));
  }

  controls.forEach((control) => {
    control.dataset.defaultValue = control.value;
    control.addEventListener("input", () => {
      applyControl(control);
      writeOutput();
      save();
    });
  });

  try {
    const stored = JSON.parse(localStorage.getItem(storageKey) || "{}");
    controls.forEach((control) => {
      if (stored[control.dataset.storyControl] !== undefined) {
        control.value = stored[control.dataset.storyControl];
      }
      applyControl(control);
    });
  } catch (error) {
    controls.forEach(applyControl);
  }

  toggle?.addEventListener("click", () => {
    const collapsed = panel.classList.toggle("is-collapsed");
    toggle.textContent = collapsed ? "Show" : "Hide";
    toggle.setAttribute("aria-expanded", String(!collapsed));
  });

  function clampPanelPosition(x, y) {
    const rect = panel.getBoundingClientRect();
    const maxX = Math.max(0, window.innerWidth - rect.width);
    const maxY = Math.max(0, window.innerHeight - rect.height);
    return {
      x: Math.min(Math.max(0, x), maxX),
      y: Math.min(Math.max(0, y), maxY),
    };
  }

  function setPanelPosition(x, y) {
    const next = clampPanelPosition(x, y);
    panel.style.left = `${next.x}px`;
    panel.style.top = `${next.y}px`;
    panel.style.right = "auto";
    localStorage.setItem(positionKey, JSON.stringify(next));
  }

  try {
    const savedPosition = JSON.parse(localStorage.getItem(positionKey) || "null");
    if (savedPosition && Number.isFinite(savedPosition.x) && Number.isFinite(savedPosition.y)) {
      setPanelPosition(savedPosition.x, savedPosition.y);
    }
  } catch (error) {}

  panelHead?.addEventListener("pointerdown", (event) => {
    if (event.target.closest("button")) return;
    const rect = panel.getBoundingClientRect();
    const offsetX = event.clientX - rect.left;
    const offsetY = event.clientY - rect.top;
    panelHead.setPointerCapture?.(event.pointerId);

    function move(moveEvent) {
      setPanelPosition(moveEvent.clientX - offsetX, moveEvent.clientY - offsetY);
    }

    function stop() {
      panelHead.removeEventListener("pointermove", move);
      panelHead.removeEventListener("pointerup", stop);
      panelHead.removeEventListener("pointercancel", stop);
    }

    panelHead.addEventListener("pointermove", move);
    panelHead.addEventListener("pointerup", stop);
    panelHead.addEventListener("pointercancel", stop);
  });

  window.addEventListener("resize", () => {
    const rect = panel.getBoundingClientRect();
    if (panel.style.left) {
      setPanelPosition(rect.left, rect.top);
    }
  });

  copyButton?.addEventListener("click", async () => {
    writeOutput();
    output.select();
    try {
      await navigator.clipboard.writeText(output.value);
    } catch (error) {
      document.execCommand("copy");
    }
  });

  resetButton?.addEventListener("click", () => {
    controls.forEach((control) => {
      control.value = defaults[control.dataset.storyControl];
      applyControl(control);
    });
    localStorage.removeItem(storageKey);
    writeOutput();
  });

  writeOutput();
})();
</script>
