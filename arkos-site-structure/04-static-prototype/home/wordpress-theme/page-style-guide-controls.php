<?php
/*
Template Name: Arkos Style Guide Controls
*/
get_header();

$button_groups = [
    'Slanted action buttons' => [
        ['label' => 'Know more about us', 'class' => 'arkos-ui-btn arkos-ui-btn--primary', 'icon' => 'fa-solid fa-chevron-right'],
        ['label' => 'Download brochure', 'class' => 'arkos-ui-btn arkos-ui-btn--dark', 'icon' => 'fa-solid fa-chevron-right'],
        ['label' => 'Contact us', 'class' => 'arkos-ui-btn arkos-ui-btn--yellow', 'icon' => 'fa-solid fa-chevron-right'],
    ],
    'Secondary action buttons' => [
        ['label' => 'View details', 'class' => 'arkos-ui-btn arkos-ui-btn--outline', 'icon' => 'fa-solid fa-chevron-right'],
        ['label' => 'Explore range', 'class' => 'arkos-ui-btn arkos-ui-btn--ghost', 'icon' => 'fa-solid fa-chevron-right'],
        ['label' => 'Disabled', 'class' => 'arkos-ui-btn arkos-ui-btn--disabled', 'icon' => 'fa-solid fa-lock'],
    ],
];

$table_rows = [
    ['Component', 'Primary Button', 'Marketing, enquiry and download actions', 'Yellow fill, black text'],
    ['Component', 'Secondary Button', 'High priority alternate action', 'Red fill, white text'],
    ['Component', 'Form Input', 'Contact, filters and calculators', '48px minimum height'],
    ['Component', 'Data Table', 'Specifications and comparison data', 'Dense, ruled rows'],
];

$type_specimens = [
    [
        'label' => 'H1',
        'tag' => 'h1',
        'text' => 'Performance-led mobility solutions',
        'size' => 'clamp(36px, 5.8vw, 72px)',
        'edit_size' => 56,
        'weight' => 600,
        'line_height' => 1.05,
        'style' => 'italic',
        'transform' => 'uppercase',
    ],
    [
        'label' => 'H2',
        'tag' => 'h2',
        'text' => 'Products engineered for Indian roads',
        'size' => 'clamp(30px, 4.4vw, 56px)',
        'edit_size' => 48,
        'weight' => 600,
        'line_height' => 1.05,
        'style' => 'italic',
        'transform' => 'uppercase',
    ],
    [
        'label' => 'H3',
        'tag' => 'h3',
        'text' => 'Lubricants, batteries, tyres and auto care',
        'size' => 'clamp(24px, 3vw, 36px)',
        'edit_size' => 36,
        'weight' => 600,
        'line_height' => 1.05,
        'style' => 'normal',
        'transform' => 'uppercase',
    ],
    [
        'label' => 'H4',
        'tag' => 'h4',
        'text' => 'Technical specifications',
        'size' => 'clamp(20px, 2.1vw, 26px)',
        'edit_size' => 26,
        'weight' => 900,
        'line_height' => 1.05,
        'style' => 'normal',
        'transform' => 'uppercase',
    ],
    [
        'label' => 'H5',
        'tag' => 'h5',
        'text' => 'Product support',
        'size' => '18px',
        'edit_size' => 18,
        'weight' => 900,
        'line_height' => 1.05,
        'style' => 'normal',
        'transform' => 'uppercase',
    ],
    [
        'label' => 'H6',
        'tag' => 'h6',
        'text' => 'Documentation',
        'size' => '14px',
        'edit_size' => 14,
        'weight' => 900,
        'line_height' => 1.05,
        'style' => 'normal',
        'transform' => 'uppercase',
    ],
    [
        'label' => 'Lead',
        'tag' => 'p',
        'class' => 'arkos-lead',
        'text' => 'ARKOS offers technically advanced, innovative and affordable mobility solutions across lubricants, batteries, tyres and vehicle care products.',
        'size' => 'clamp(19px, 1.8vw, 26px)',
        'edit_size' => 26,
        'weight' => 600,
        'line_height' => 1.35,
        'style' => 'normal',
        'transform' => 'none',
    ],
    [
        'label' => 'P',
        'tag' => 'p',
        'text' => 'Use this paragraph style for product descriptions, page introductions and supporting copy.',
        'size' => '16px',
        'edit_size' => 16,
        'weight' => 400,
        'line_height' => 1.6,
        'style' => 'normal',
        'transform' => 'none',
    ],
];
?>

<article class="arkos-style-guide-page">
  <section class="arkos-style-hero">
    <div class="real-section__inner arkos-style-hero__inner">
      <p class="arkos-style-kicker">ARKOS UI Foundation</p>
      <h1>Reusable Site Styles</h1>
      <p>Buttons, typography, forms, tables, tabs and common content elements for future Arkos staging pages.</p>
    </div>
  </section>

  <nav class="arkos-style-anchorbar" aria-label="Style guide sections">
    <div class="real-section__inner arkos-style-anchorbar__inner">
      <a href="#typography">Typography</a>
      <a href="#buttons">Buttons</a>
      <a href="#forms">Inputs</a>
      <a href="#tables">Tables</a>
      <a href="#tabs">Tabs</a>
      <a href="#elements">Elements</a>
    </div>
  </nav>

  <section id="typography" class="arkos-style-section">
    <div class="real-section__inner">
      <div class="arkos-style-section__head">
        <p class="arkos-style-kicker">Type Scale</p>
        <h2>Headings, paragraph and text treatments</h2>
      </div>

      <div class="arkos-type-stack" aria-label="Editable typography examples">
        <?php foreach ($type_specimens as $index => $specimen) : ?>
          <?php
          $tag = tag_escape($specimen['tag']);
          $class = trim('arkos-type-preview ' . ($specimen['class'] ?? ''));
          ?>
          <div class="arkos-type-row" data-type-row>
            <div class="arkos-type-row__label">
              <span><?php echo esc_html($specimen['label']); ?></span>
              <small>Existing: <?php echo esc_html($specimen['size']); ?> / weight <?php echo esc_html((string) $specimen['weight']); ?> / line <?php echo esc_html((string) $specimen['line_height']); ?></small>
              <small>Current: <output data-type-current>Reading...</output></small>
            </div>
            <div class="arkos-type-row__preview">
              <<?php echo $tag; ?> class="<?php echo esc_attr($class); ?>" data-type-preview>
                <?php echo esc_html($specimen['text']); ?>
              </<?php echo $tag; ?>>
            </div>
            <div class="arkos-type-controls" aria-label="<?php echo esc_attr($specimen['label'] . ' editable controls'); ?>">
              <label for="type-size-<?php echo esc_attr((string) $index); ?>">
                <span>Size px</span>
                <input id="type-size-<?php echo esc_attr((string) $index); ?>" type="number" min="10" max="110" step="1" value="<?php echo esc_attr((string) $specimen['edit_size']); ?>" data-type-control="fontSize" />
              </label>
              <label for="type-weight-<?php echo esc_attr((string) $index); ?>">
                <span>Weight</span>
                <select id="type-weight-<?php echo esc_attr((string) $index); ?>" data-type-control="fontWeight">
                  <?php foreach ([400, 500, 600, 700, 800, 900] as $weight) : ?>
                    <option value="<?php echo esc_attr((string) $weight); ?>" <?php selected($specimen['weight'], $weight); ?>><?php echo esc_html((string) $weight); ?></option>
                  <?php endforeach; ?>
                </select>
              </label>
              <label for="type-line-<?php echo esc_attr((string) $index); ?>">
                <span>Line</span>
                <input id="type-line-<?php echo esc_attr((string) $index); ?>" type="number" min="0.8" max="2" step="0.05" value="<?php echo esc_attr((string) $specimen['line_height']); ?>" data-type-control="lineHeight" />
              </label>
              <label for="type-style-<?php echo esc_attr((string) $index); ?>">
                <span>Style</span>
                <select id="type-style-<?php echo esc_attr((string) $index); ?>" data-type-control="fontStyle">
                  <option value="normal" <?php selected($specimen['style'], 'normal'); ?>>Normal</option>
                  <option value="italic" <?php selected($specimen['style'], 'italic'); ?>>Italic</option>
                </select>
              </label>
              <label for="type-transform-<?php echo esc_attr((string) $index); ?>">
                <span>Case</span>
                <select id="type-transform-<?php echo esc_attr((string) $index); ?>" data-type-control="textTransform">
                  <option value="none" <?php selected($specimen['transform'], 'none'); ?>>None</option>
                  <option value="uppercase" <?php selected($specimen['transform'], 'uppercase'); ?>>Uppercase</option>
                  <option value="capitalize" <?php selected($specimen['transform'], 'capitalize'); ?>>Capitalize</option>
                </select>
              </label>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="buttons" class="arkos-style-section arkos-style-section--soft">
    <div class="real-section__inner">
      <div class="arkos-style-section__head">
        <p class="arkos-style-kicker">Action System</p>
        <h2>Button styles</h2>
      </div>

      <div class="arkos-button-grid">
        <?php foreach ($button_groups as $group_label => $buttons) : ?>
          <section class="arkos-style-panel" aria-label="<?php echo esc_attr($group_label); ?>">
            <h3><?php echo esc_html($group_label); ?></h3>
            <div class="arkos-button-row">
              <?php foreach ($buttons as $button) : ?>
                <a class="<?php echo esc_attr($button['class']); ?>" href="#">
                  <span><?php echo esc_html($button['label']); ?></span>
                  <i class="<?php echo esc_attr($button['icon']); ?>" aria-hidden="true"></i>
                </a>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endforeach; ?>

        <section class="arkos-style-panel" aria-label="Button sizes">
          <h3>Button sizes</h3>
          <div class="arkos-button-row">
            <a class="arkos-ui-btn arkos-ui-btn--primary arkos-ui-btn--xs" href="#"><span>XS</span><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
            <a class="arkos-ui-btn arkos-ui-btn--primary arkos-ui-btn--sm" href="#"><span>Small</span><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
            <a class="arkos-ui-btn arkos-ui-btn--primary" href="#"><span>Default</span><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
            <a class="arkos-ui-btn arkos-ui-btn--primary arkos-ui-btn--lg" href="#"><span>Large</span><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
            <a class="arkos-ui-btn arkos-ui-btn--primary arkos-ui-btn--xl" href="#"><span>Extra Large</span><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
          </div>
        </section>

        <section class="arkos-style-panel" aria-label="Button hover styles">
          <h3>Hover styles</h3>
          <div class="arkos-button-row">
            <a class="arkos-ui-btn arkos-ui-btn--primary" href="#"><span>Default</span><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
            <a class="arkos-ui-btn arkos-ui-btn--primary is-hover-preview" href="#"><span>Hover lift</span><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
            <a class="arkos-ui-btn arkos-ui-btn--primary is-hover-dark" href="#"><span>Hover dark</span><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
          </div>
        </section>

        <section class="arkos-style-panel" aria-label="Icon buttons">
          <h3>Icon buttons</h3>
          <div class="arkos-icon-button-row">
            <button class="arkos-icon-btn" type="button" aria-label="Search"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
            <button class="arkos-icon-btn arkos-icon-btn--dark" type="button" aria-label="Download"><i class="fa-solid fa-download" aria-hidden="true"></i></button>
            <button class="arkos-icon-btn arkos-icon-btn--red" type="button" aria-label="Call"><i class="fa-solid fa-phone" aria-hidden="true"></i></button>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section id="forms" class="arkos-style-section">
    <div class="real-section__inner">
      <div class="arkos-style-section__head">
        <p class="arkos-style-kicker">Input System</p>
        <h2>Forms, filters and selectors</h2>
      </div>

      <form class="arkos-form-demo" action="#" method="get">
        <div class="arkos-field">
          <label for="guide-name">Full Name</label>
          <input id="guide-name" name="guide-name" type="text" placeholder="Enter name" />
        </div>
        <div class="arkos-field">
          <label for="guide-email">Email</label>
          <input id="guide-email" name="guide-email" type="email" placeholder="name@example.com" />
        </div>
        <div class="arkos-field">
          <label for="guide-category">Category</label>
          <select id="guide-category" name="guide-category">
            <option>Lubricants</option>
            <option>Batteries</option>
            <option>Tyres</option>
            <option>VETEK Auto Care</option>
          </select>
        </div>
        <div class="arkos-field">
          <label for="guide-search">Search Input</label>
          <input id="guide-search" name="guide-search" type="search" placeholder="Search products" />
        </div>
        <div class="arkos-field arkos-field--wide">
          <label for="guide-message">Message</label>
          <textarea id="guide-message" name="guide-message" rows="5" placeholder="Write enquiry details"></textarea>
        </div>
        <fieldset class="arkos-choice-group">
          <legend>Choice Controls</legend>
          <label><input type="checkbox" checked /> Send product brochure</label>
          <label><input type="radio" name="guide-priority" checked /> General enquiry</label>
          <label><input type="radio" name="guide-priority" /> Urgent support</label>
        </fieldset>
        <div class="arkos-field">
          <label for="guide-range">Range</label>
          <input id="guide-range" name="guide-range" type="range" min="0" max="100" value="65" />
        </div>
        <div class="arkos-toggle-row">
          <span>Availability</span>
          <button class="arkos-toggle is-on" type="button" aria-pressed="true"><span></span></button>
        </div>
      </form>
    </div>
  </section>

  <section id="tables" class="arkos-style-section arkos-style-section--dark">
    <div class="real-section__inner">
      <div class="arkos-style-section__head">
        <p class="arkos-style-kicker">Data Display</p>
        <h2>Table style</h2>
      </div>

      <div class="arkos-table-wrap">
        <table class="arkos-ui-table">
          <thead>
            <tr>
              <th scope="col">Type</th>
              <th scope="col">Name</th>
              <th scope="col">Usage</th>
              <th scope="col">Rule</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($table_rows as $row) : ?>
              <tr>
                <?php foreach ($row as $cell) : ?>
                  <td><?php echo esc_html($cell); ?></td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section id="tabs" class="arkos-style-section">
    <div class="real-section__inner">
      <div class="arkos-style-section__head">
        <p class="arkos-style-kicker">Navigation States</p>
        <h2>Tabs and segmented controls</h2>
      </div>

      <div class="arkos-tab-grid">
        <section class="arkos-style-panel">
          <h3>Underline tabs</h3>
          <div class="arkos-tabs" role="tablist" aria-label="Product categories">
            <button class="is-active" type="button" role="tab" aria-selected="true">Overview</button>
            <button type="button" role="tab" aria-selected="false">Specifications</button>
            <button type="button" role="tab" aria-selected="false">Downloads</button>
          </div>
        </section>
        <section class="arkos-style-panel">
          <h3>Segmented control</h3>
          <div class="arkos-segmented" role="tablist" aria-label="View mode">
            <button class="is-active" type="button" role="tab" aria-selected="true">List</button>
            <button type="button" role="tab" aria-selected="false">Grid</button>
            <button type="button" role="tab" aria-selected="false">Compare</button>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section id="elements" class="arkos-style-section arkos-style-section--soft">
    <div class="real-section__inner">
      <div class="arkos-style-section__head">
        <p class="arkos-style-kicker">Supporting Elements</p>
        <h2>Badges, alerts, cards and pagination</h2>
      </div>

      <div class="arkos-element-grid">
        <section class="arkos-style-panel">
          <h3>Badges</h3>
          <div class="arkos-badge-row">
            <span class="arkos-badge">New</span>
            <span class="arkos-badge arkos-badge--red">Required</span>
            <span class="arkos-badge arkos-badge--dark">Updated</span>
          </div>
        </section>
        <section class="arkos-style-panel">
          <h3>Alerts</h3>
          <p class="arkos-alert arkos-alert--success"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Product data saved successfully.</p>
          <p class="arkos-alert arkos-alert--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i> Check pack size details before publishing.</p>
        </section>
        <section class="arkos-style-panel">
          <h3>Content card</h3>
          <p class="arkos-style-kicker">Product highlight</p>
          <h4>Built for daily performance</h4>
          <p>Use compact cards for repeated products, resources and feature highlights.</p>
          <a class="arkos-ui-btn arkos-ui-btn--outline arkos-ui-btn--sm" href="#"><span>View Details</span><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </section>
        <section class="arkos-style-panel">
          <h3>Pagination</h3>
          <nav class="arkos-pagination" aria-label="Pagination example">
            <a href="#">Prev</a>
            <a class="is-active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">Next</a>
          </nav>
        </section>
      </div>
    </div>
  </section>
</article>

<script>
(function () {
  const rows = document.querySelectorAll('[data-type-row]');

  rows.forEach((row) => {
    const preview = row.querySelector('[data-type-preview]');
    const current = row.querySelector('[data-type-current]');
    const controls = row.querySelectorAll('[data-type-control]');

    function updateCurrent() {
      const style = window.getComputedStyle(preview);
      const parsedLineHeight = Number.parseFloat(style.lineHeight);
      current.value = [
        Math.round(parseFloat(style.fontSize)) + 'px',
        'weight ' + style.fontWeight,
        'line ' + (Number.isFinite(parsedLineHeight) ? parsedLineHeight.toFixed(1) + 'px' : style.lineHeight)
      ].join(' / ');
    }

    controls.forEach((control) => {
      const property = control.dataset.typeControl;

      function applyControl() {
        if (property === 'fontSize') {
          preview.style.fontSize = control.value + 'px';
        } else if (property === 'lineHeight') {
          preview.style.lineHeight = control.value;
        } else {
          preview.style[property] = control.value;
        }

        updateCurrent();
      }

      control.addEventListener('input', applyControl);
      control.addEventListener('change', applyControl);
    });

    updateCurrent();
  });
})();
</script>

<?php get_footer(); ?>
