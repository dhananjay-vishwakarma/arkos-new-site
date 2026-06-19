<?php $arkos_theme_uri = get_template_directory_uri(); ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <?php if (is_front_page()) : ?>
    <link rel="preload" as="image" href="<?php echo esc_url($arkos_theme_uri . '/assets/hero-banners/pp-final.webp?v=hero-speed-20260618-1'); ?>" type="image/webp" fetchpriority="high" />
  <?php endif; ?>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo esc_url($arkos_theme_uri . '/editable.css?v=search-icon-20260618-1'); ?>" />
  <link rel="stylesheet" href="<?php echo esc_url($arkos_theme_uri . '/hero-slider.css?v=hero-images-20260618-1'); ?>" />
  <link rel="stylesheet" href="<?php echo esc_url($arkos_theme_uri . '/section-options.css?v=real-sections-20260616'); ?>" />
  <link rel="stylesheet" href="<?php echo esc_url($arkos_theme_uri . '/wp-theme.css?v=why-lines-20260619-5'); ?>" />
  <link rel="stylesheet" href="<?php echo esc_url($arkos_theme_uri . '/footer.css?v=footer-bg-20260618-1'); ?>" />
  <?php wp_head(); ?>
</head>
<body <?php body_class('arkos-wp'); ?>>
  <main class="option-screen">
    <header class="arkos-header arkos-header--wp" aria-label="ARKOS website header">
      <span class="header-bg" aria-hidden="true"></span>
      <span class="header-tail-bg" aria-hidden="true"></span>
      <span class="accent-line red top-left"></span>
      <span class="accent-line red bottom-left"></span>
      <span class="accent-line yellow top-right"></span>
      <span class="accent-line yellow bottom-right"></span>

      <nav class="main-nav nav-left" aria-label="Primary navigation left">
        <div class="nav-item">
          <a href="<?php echo arkos_url(); ?>" class="nav-link home-link" aria-label="Home">
            <img class="nav-icon" src="<?php echo esc_url($arkos_theme_uri . '/assets/nav-icons/home.svg'); ?>" alt="" aria-hidden="true" />
            <span class="mini-line red"></span>
            <span>Home</span>
          </a>
        </div>
        <div class="nav-item has-dropdown">
          <a href="<?php echo arkos_url('about-us/'); ?>" class="nav-link" aria-haspopup="true" aria-expanded="false">
            <img class="nav-icon" src="<?php echo esc_url($arkos_theme_uri . '/assets/nav-icons/about-us.svg'); ?>" alt="" aria-hidden="true" />
            <span class="mini-line red"></span>
            <span class="nav-label">About Us <i class="dropdown-caret fa-solid fa-chevron-down" aria-hidden="true"></i></span>
          </a>
          <div class="nav-dropdown" role="menu" aria-label="About us submenu">
            <a href="<?php echo arkos_url('about-us/company-introduction/'); ?>" role="menuitem">Company Introduction</a>
            <a href="<?php echo arkos_url('about-us/logo-description/'); ?>" role="menuitem">Logo Description</a>
            <a href="<?php echo arkos_url('about-us/mission-vision/'); ?>" role="menuitem">Mission - Vision</a>
            <a href="<?php echo arkos_url('about-us/executive-team/'); ?>" role="menuitem">Executive Team</a>
          </div>
        </div>
        <div class="nav-item">
          <a href="<?php echo arkos_url('manufacturing-facility/'); ?>" class="nav-link nav-wide">
            <img class="nav-icon" src="<?php echo esc_url($arkos_theme_uri . '/assets/nav-icons/manufacturing-facility.svg'); ?>" alt="" aria-hidden="true" />
            <span class="mini-line red"></span>
            <span>Manufacturing Facility</span>
          </a>
        </div>
        <div class="nav-item has-dropdown">
          <a href="<?php echo arkos_url('business-divisions/'); ?>" class="nav-link nav-medium" aria-haspopup="true" aria-expanded="false">
            <img class="nav-icon" src="<?php echo esc_url($arkos_theme_uri . '/assets/nav-icons/business-divisions.svg'); ?>" alt="" aria-hidden="true" />
            <span class="mini-line red"></span>
            <span class="nav-label">Business Divisions <i class="dropdown-caret fa-solid fa-chevron-down" aria-hidden="true"></i></span>
          </a>
          <div class="nav-dropdown nav-dropdown--mega" role="menu" aria-label="Business divisions submenu">
            <section class="dropdown-group" aria-label="ARKOS Lubricants">
              <h3>ARKOS Lubricants</h3>
              <a href="<?php echo arkos_url('motorcycle-oils/'); ?>" role="menuitem">Motorcycle Oils</a>
              <a href="<?php echo arkos_url('3-wheeler-engine-oils/'); ?>" role="menuitem">3 Wheeler Engine Oils</a>
              <a href="<?php echo arkos_url('passenger-car-motor-oils/'); ?>" role="menuitem">Passenger Car Motor Oils</a>
              <a href="<?php echo arkos_url('diesel-engine-oils/'); ?>" role="menuitem">Diesel Engine Oils</a>
              <a href="<?php echo arkos_url('tractor-engine-oils/'); ?>" role="menuitem">Tractor Engine Oils</a>
              <a href="<?php echo arkos_url('gear-transmission-oils/'); ?>" role="menuitem">Gear &amp; Transmission Oils</a>
              <a href="<?php echo arkos_url('grease-pumpset-oils/'); ?>" role="menuitem">Grease &amp; Pumpset Oils</a>
              <a href="<?php echo arkos_url('gas-engine-oils/'); ?>" role="menuitem">Gas Engine Oils</a>
              <a href="<?php echo arkos_url('industrial-oils/'); ?>" role="menuitem">Industrial Oils</a>
            </section>
            <section class="dropdown-group" aria-label="BOLT Batteries">
              <h3>BOLT Batteries</h3>
              <a href="<?php echo arkos_url('product-finder/'); ?>" role="menuitem">Product Finder</a>
              <a href="<?php echo arkos_url('2-wheeler-batteries/'); ?>" role="menuitem">2 Wheeler Batteries</a>
              <a href="https://wms.arkos.in/login" role="menuitem">Bolt Warranty System</a>
            </section>
            <section class="dropdown-group" aria-label="Arkos Gripp Tyre">
              <h3>Arkos Gripp Tyre</h3>
              <a href="<?php echo arkos_url('tyre-product-finder/'); ?>" role="menuitem">Tyre Product Finder</a>
              <a href="<?php echo arkos_url('go/'); ?>" role="menuitem">Arkos Gripp Go</a>
              <a href="<?php echo arkos_url('eva/'); ?>" role="menuitem">Arkos Gripp Eva</a>
              <a href="<?php echo arkos_url('boss/'); ?>" role="menuitem">Arkos Gripp Boss</a>
            </section>
            <section class="dropdown-group" aria-label="VETEK">
              <h3>VETEK</h3>
              <a href="<?php echo arkos_url('vetek/'); ?>" role="menuitem">VETEK Range</a>
              <a href="<?php echo arkos_url('arkos_products/chain-cleaner-spray/'); ?>" role="menuitem">Chain Cleaner Spray</a>
              <a href="<?php echo arkos_url('arkos_products/chain-lube/'); ?>" role="menuitem">Chain Lube</a>
              <a href="<?php echo arkos_url('arkos_products/rust-off/'); ?>" role="menuitem">Rust Off</a>
              <a href="<?php echo arkos_url('arkos_products/throttle-body-cleaner/'); ?>" role="menuitem">Throttle Body Cleaner</a>
              <a href="<?php echo arkos_url('arkos_products/screen-wash/'); ?>" role="menuitem">Screen Wash</a>
              <a href="<?php echo arkos_url('arkos_products/insta-polish/'); ?>" role="menuitem">Insta Polish</a>
            </section>
          </div>
        </div>
      </nav>

      <a href="<?php echo arkos_url(); ?>" class="brand-panel" aria-label="ARKOS home">
        <img src="<?php echo esc_url($arkos_theme_uri . '/assets/arkos-center-panel.png'); ?>" alt="ARKOS" />
      </a>

      <nav class="main-nav nav-right" aria-label="Primary navigation right">
        <div class="nav-item has-dropdown">
          <a href="<?php echo arkos_url('downloads/'); ?>" class="nav-link" aria-haspopup="true" aria-expanded="false">
            <img class="nav-icon" src="<?php echo esc_url($arkos_theme_uri . '/assets/nav-icons/downloads.svg'); ?>" alt="" aria-hidden="true" />
            <span class="mini-line yellow"></span>
            <span class="nav-label">Downloads <i class="dropdown-caret fa-solid fa-chevron-down" aria-hidden="true"></i></span>
          </a>
          <div class="nav-dropdown nav-dropdown--right" role="menu" aria-label="Downloads submenu">
            <a href="<?php echo arkos_url('downloads/'); ?>" role="menuitem">Downloads Overview</a>
            <a href="<?php echo arkos_url('brochure/'); ?>" role="menuitem">Brochure</a>
            <a href="<?php echo arkos_url('product-films/'); ?>" role="menuitem">Product Films</a>
            <a href="<?php echo arkos_url('test-certificates/'); ?>" role="menuitem">Test Certificates</a>
            <a href="<?php echo arkos_url('product-data-sheets-2/'); ?>" role="menuitem">Product Data Sheets</a>
            <a href="<?php echo arkos_url('approvals/'); ?>" role="menuitem">Approvals</a>
            <a href="<?php echo arkos_url('marcom-materials/'); ?>" role="menuitem">Marcom Materials</a>
          </div>
        </div>
        <div class="nav-item"><a href="<?php echo arkos_url('careers/'); ?>" class="nav-link"><img class="nav-icon" src="<?php echo esc_url($arkos_theme_uri . '/assets/nav-icons/careers.svg'); ?>" alt="" aria-hidden="true" /><span class="mini-line yellow"></span><span>Careers</span></a></div>
        <div class="nav-item"><a href="<?php echo arkos_url('blogs/'); ?>" class="nav-link"><img class="nav-icon" src="<?php echo esc_url($arkos_theme_uri . '/assets/nav-icons/blogs.svg'); ?>" alt="" aria-hidden="true" /><span class="mini-line yellow"></span><span>Blogs</span></a></div>
        <div class="nav-item"><a href="<?php echo arkos_url('contact-us/'); ?>" class="nav-link"><img class="nav-icon" src="<?php echo esc_url($arkos_theme_uri . '/assets/nav-icons/contact-us.svg'); ?>" alt="" aria-hidden="true" /><span class="mini-line yellow"></span><span>Contact Us</span></a></div>
      </nav>

      <div class="header-search" id="header-search" aria-hidden="true">
        <form class="header-search__form" action="<?php echo arkos_url(); ?>" method="get" role="search">
          <label class="sr-only" for="site-search-input">Search ARKOS</label>
          <button class="header-search__submit" type="submit" aria-label="Submit search" tabindex="-1"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
          <input id="site-search-input" name="s" type="search" placeholder="Search ARKOS" autocomplete="off" tabindex="-1" />
          <button class="header-search__close" type="button" aria-label="Close search" tabindex="-1"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
        </form>
      </div>

      <div class="utility">
        <button class="search-button" type="button" aria-label="Search" aria-controls="header-search" aria-expanded="false"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
        <button class="theme-button" type="button" aria-label="Switch to light menu" aria-pressed="false"><i class="fa-solid fa-circle-half-stroke" aria-hidden="true"></i></button>
      </div>
    </header>
