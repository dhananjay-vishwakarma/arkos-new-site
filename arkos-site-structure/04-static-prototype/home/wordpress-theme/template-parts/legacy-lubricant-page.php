<?php
$products = arkos_legacy_lubricant_products_from_content(get_the_ID());
$intro = arkos_legacy_lubricant_intro_from_content(get_the_ID());
$page_slug = get_post_field('post_name', get_the_ID());
$is_three_wheeler_oil = $page_slug === '3-wheeler-engine-oils';
$page_permalink = trailingslashit(get_permalink());
$hero_images = [
    'motorcycle-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2025/04/motorcycle-oils.webp',
    '3-wheeler-engine-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2023/07/Arkos-3-WHEELER-ENGINE-OILS.jpg',
    'passenger-car-motor-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2025/05/Website-Banner1-car-061-scaled.webp',
    'diesel-engine-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2023/07/Lubes-the-Hero.jpg',
    'tractor-engine-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2023/07/KUSHIYON-KI-KHETI.jpg',
    'gear-transmission-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2023/08/Gear-%26-Transmission-Oil-Website-Page.jpg',
    'grease-pumpset-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2023/08/Gear-%26-Transmission-Oil-Website-Page.jpg',
    'gas-engine-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2025/05/Website-Banner-GEO-08-scaled.webp',
    'industrial-oils' => 'https://arkos.in/~arkosin/wp-content/uploads/2023/08/Gear-%26-Transmission-Oil-Website-Page.jpg',
];
$hero_image = $hero_images[$page_slug] ?? '';
$product_logos = [
    'trinity-500' => 'https://arkos.in/~arkosin/wp-content/uploads/2020/09/trinity-logo.png',
];
$three_wheeler_intro = 'Auto-rickshaw and goods carrier are used widely as last minute passenger and goods transport in India. Navigating through narrow lanes, congested market places and carrying additional people and goods are also integral part of daily routine for the drivers. ARKOS 3 wheeler engine oil TRINITY offers excellent drive feel, smooth gear shifting and better mileage in diesel auto-rickshaw and goods carriers.';
?>

<article class="vetek-product-page legacy-lubricant-page">
  <section class="legacy-lubricant-intro<?php echo $hero_image ? ' legacy-lubricant-intro--image legacy-lubricant-intro--no-overlay' : ''; ?>"<?php echo $hero_image ? ' style="background-image: url(' . esc_url($hero_image) . ');"' : ''; ?>>
    <div class="real-section__inner">
      <?php if (!$hero_image) : ?>
        <h1><?php the_title(); ?></h1>
      <?php endif; ?>
      <?php if ($intro && !$hero_image) : ?>
        <p><?php echo esc_html($intro); ?></p>
      <?php endif; ?>
    </div>
  </section>

  <?php if ($hero_image) : ?>
    <section class="legacy-lubricant-summary">
      <div class="real-section__inner">
        <h2><?php the_title(); ?></h2>
        <?php if ($is_three_wheeler_oil) : ?>
          <p><?php echo esc_html($three_wheeler_intro); ?></p>
        <?php elseif ($intro) : ?>
          <p><?php echo esc_html($intro); ?></p>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($products) : ?>
    <?php if (count($products) > 1) : ?>
      <div class="legacy-product-tabs-shell">
        <nav class="legacy-product-tabs" data-legacy-product-tabs aria-label="<?php echo esc_attr(sprintf(__('%s products', 'arkos-staging'), get_the_title())); ?>">
          <div class="real-section__inner legacy-product-tabs__inner">
            <?php foreach ($products as $product) : ?>
              <?php $product_anchor = sanitize_title($product['title']); ?>
              <a href="<?php echo esc_url($page_permalink . '#' . $product_anchor); ?>" data-product-anchor="<?php echo esc_attr($product_anchor); ?>"><?php echo esc_html($product['title']); ?></a>
            <?php endforeach; ?>
          </div>
        </nav>
      </div>
    <?php endif; ?>

    <?php foreach ($products as $index => $product) : ?>
      <section class="vetek-product-hero legacy-lubricant-product" id="<?php echo esc_attr(sanitize_title($product['title'])); ?>">
        <div class="real-section__inner vetek-product-hero__grid">
          <div class="vetek-product-media">
            <?php if (!empty($product['image'])) : ?>
              <figure class="vetek-product-main">
                <img class="vetek-product-main__image" src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['title']); ?>" loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>" />
              </figure>
            <?php endif; ?>
          </div>

          <div class="vetek-product-copy">
            <?php $product_logo = $product_logos[sanitize_title($product['title'])] ?? ''; ?>
            <?php if ($product_logo) : ?>
              <img class="legacy-lubricant-product-logo" src="<?php echo esc_url($product_logo); ?>" alt="<?php echo esc_attr($product['title']); ?>" loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>" />
            <?php endif; ?>
            <h1><?php echo esc_html($product['title']); ?></h1>
            <?php if (!empty($product['description'])) : ?>
              <p><?php echo esc_html($product['description']); ?></p>
            <?php endif; ?>

            <?php if (!empty($product['features'])) : ?>
              <div class="vetek-features">
                <h2>Key Features</h2>
                <ul>
                  <?php foreach ($product['features'] as $feature) : ?>
                    <li><?php echo esc_html($feature); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <?php if (!empty($product['benefits'])) : ?>
              <div class="vetek-features">
                <h2>Benefits</h2>
                <ul>
                  <?php foreach ($product['benefits'] as $benefit) : ?>
                    <li><?php echo esc_html($benefit); ?></li>
                  <?php endforeach; ?>
                </ul>
                <?php if (!empty($product['pack_size'])) : ?>
                  <p class="vetek-pack-size">Available in pack sizes: <span><?php echo esc_html($product['pack_size']); ?></span></p>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </section>
    <?php endforeach; ?>

  <?php else : ?>
    <?php the_content(); ?>
  <?php endif; ?>
</article>

<?php if (count($products) > 1) : ?>
  <script>
    (function () {
      var shell = document.querySelector('.legacy-product-tabs-shell');
      var tabs = document.querySelector('[data-legacy-product-tabs]');
      var page = document.querySelector('.legacy-lubricant-page');
      var links = Array.prototype.slice.call(tabs ? tabs.querySelectorAll('a[data-product-anchor]') : []);

      if (!shell || !tabs || !page) {
        return;
      }

      function getHash(link) {
        var anchor = link ? link.getAttribute('data-product-anchor') : '';

        return anchor ? '#' + anchor : '';
      }

      function getId(link) {
        return getHash(link).replace(/^#/, '');
      }

      function offsetTop() {
        return window.matchMedia('(max-width: 700px)').matches ? 37 : 82;
      }

      function updateActiveTab() {
        var marker = offsetTop() + tabs.offsetHeight + 42;
        var activeId = '';

        links.forEach(function (link) {
          var id = getId(link);
          var target = document.getElementById(id);

          if (target && target.getBoundingClientRect().top <= marker) {
            activeId = id;
          }
        });

        if (!activeId) {
          links.some(function (link) {
            var id = getId(link);
            var target = document.getElementById(id);

            if (target && target.getBoundingClientRect().bottom > marker) {
              activeId = id;
              return true;
            }

            return false;
          });
        }

        links.forEach(function (link) {
          var isActive = getHash(link) === '#' + activeId;

          link.classList.toggle('is-active', isActive);

          if (isActive) {
            link.setAttribute('aria-current', 'true');
          } else {
            link.removeAttribute('aria-current');
          }
        });
      }

      function updateTabs() {
        var top = offsetTop();
        var height = tabs.offsetHeight;
        var shellRect = shell.getBoundingClientRect();
        var pageRect = page.getBoundingClientRect();
        var shouldFix = shellRect.top <= top && pageRect.bottom > top + height;

        shell.style.minHeight = height + 'px';
        tabs.style.setProperty('--legacy-tabs-top', top + 'px');
        tabs.classList.toggle('is-fixed', shouldFix);
        updateActiveTab();
      }

      function scrollToProduct(hash) {
        var id = hash ? hash.replace(/^#/, '') : '';
        var target = id ? document.getElementById(id) : null;

        if (!target) {
          return;
        }

        updateTabs();
        window.scrollTo({
          top: target.getBoundingClientRect().top + window.pageYOffset - offsetTop() - tabs.offsetHeight - 18,
          behavior: 'smooth'
        });
      }

      links.forEach(function (link) {
        link.addEventListener('click', function (event) {
          var hash = getHash(link);

          event.preventDefault();
          history.pushState(null, '', link.href);
          scrollToProduct(hash);
        });
      });

      updateTabs();
      window.addEventListener('scroll', updateTabs, { passive: true });
      window.addEventListener('resize', updateTabs);
      window.addEventListener('load', function () {
        updateTabs();

        if (window.location.hash) {
          window.setTimeout(function () {
            scrollToProduct(window.location.hash);
          }, 120);
        }
      });

      if (window.location.hash) {
        window.setTimeout(function () {
          scrollToProduct(window.location.hash);
        }, 120);
      }
    })();
  </script>
<?php endif; ?>
