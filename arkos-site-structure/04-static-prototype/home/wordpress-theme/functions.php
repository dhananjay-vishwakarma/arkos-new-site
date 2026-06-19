<?php
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'arkos-staging'),
        'footer' => __('Footer Menu', 'arkos-staging'),
    ]);
});

add_action('init', function () {
    register_post_type('arkos_products', [
        'labels' => [
            'name' => __('ARKOS Products', 'arkos-staging'),
            'singular_name' => __('ARKOS Product', 'arkos-staging'),
        ],
        'public' => true,
        'has_archive' => 'arkos-products',
        'menu_icon' => 'dashicons-products',
        'rewrite' => ['slug' => 'arkos_products'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'taxonomies' => ['category'],
        'show_in_rest' => true,
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('global-styles');

    if (is_front_page()) {
        wp_dequeue_style('contact-form-7');
        wp_dequeue_script('contact-form-7');
        wp_dequeue_script('swv');
        wp_dequeue_script('wp-hooks');
        wp_dequeue_script('wp-i18n');
    }
}, 20);

add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
});

add_action('wp_head', function () {
    if (function_exists('has_site_icon') && has_site_icon()) {
        return;
    }

    $assets_uri = get_template_directory_uri() . '/assets';
    ?>
    <link rel="icon" href="<?php echo esc_url($assets_uri . '/favicon.ico'); ?>" sizes="any" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url($assets_uri . '/favicon-32.png'); ?>" />
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url($assets_uri . '/favicon-192.png'); ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($assets_uri . '/favicon-180.png'); ?>" />
    <?php
}, 5);

add_action('after_switch_theme', function () {
    $locations = get_theme_mod('nav_menu_locations', []);
    $primary = wp_get_nav_menu_object('primary');

    if ($primary && empty($locations['primary'])) {
        $locations['primary'] = (int) $primary->term_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
});

add_action('template_redirect', function () {
    if (is_page('vello')) {
        wp_safe_redirect(home_url('/go/'), 301);
        exit;
    }
});

function arkos_url($path = '') {
    return esc_url(home_url('/' . ltrim($path, '/')));
}

function arkos_products_url() {
    return get_post_type_archive_link('arkos_products') ?: arkos_url('arkos-products/');
}

function arkos_get_page_by_slug($slug) {
    $page = get_page_by_path($slug);
    return $page instanceof WP_Post ? $page : null;
}

function arkos_page_excerpt($slug, $fallback, $words = 34) {
    $page = arkos_get_page_by_slug($slug);

    if (!$page) {
        return $fallback;
    }

    $text = $page->post_excerpt ?: $page->post_content;
    $text = trim(wp_strip_all_tags(strip_shortcodes($text)));

    return $text ? wp_trim_words($text, $words) : $fallback;
}

function arkos_product_gallery_ids($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $ids = [];
    $raw = get_post_meta($post_id, 'product_images', true);

    if ($raw) {
        $ids = array_filter(array_map('absint', preg_split('/\s*,\s*/', (string) $raw)));
    }

    $thumbnail_id = get_post_thumbnail_id($post_id);
    if ($thumbnail_id) {
        array_unshift($ids, $thumbnail_id);
    }

    return array_values(array_unique($ids));
}

function arkos_attachment_url($attachment_id, $size = 'large') {
    $attachment_id = absint($attachment_id);

    if (!$attachment_id) {
        return '';
    }

    $url = wp_get_attachment_image_url($attachment_id, $size);
    $file = get_attached_file($attachment_id);

    if ($url && (!$file || file_exists($file))) {
        return $url;
    }

    $guid = get_post_field('guid', $attachment_id);
    if ($guid && preg_match('#^https?://#i', $guid)) {
        return esc_url_raw($guid);
    }

    return $url ?: '';
}

function arkos_product_image_url($post_id = null, $size = 'large') {
    $post_id = $post_id ?: get_the_ID();
    $gallery = arkos_product_gallery_ids($post_id);

    if ($gallery) {
        $url = arkos_attachment_url($gallery[0], $size);
        if ($url) {
            return $url;
        }
    }

    $thumb = get_the_post_thumbnail_url($post_id, $size);
    if ($thumb) {
        return $thumb;
    }

    return get_template_directory_uri() . '/assets/products-section/arkos-logo-shield.png';
}

function arkos_product_group_label($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $terms = get_the_terms($post_id, 'category');

    if (!is_wp_error($terms) && $terms) {
        foreach ($terms as $term) {
            if ($term->slug === 'vetek') {
                return 'VETEK Auto Care';
            }
            if ($term->slug !== 'uncategorized') {
                return $term->name;
            }
        }
    }

    return stripos(get_the_title($post_id), 'gripp') !== false ? 'Arkos Gripp Tyres' : 'ARKOS Products';
}

function arkos_vetek_product_profile($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $slug = get_post_field('post_name', $post_id);

    $suitable = [
        'chain-cleaner-spray' => [
            ['icon' => 'fa-solid fa-link', 'label' => 'Drive Chains'],
            ['icon' => 'fa-solid fa-gears', 'label' => 'Open Gears'],
            ['icon' => 'fa-solid fa-screwdriver-wrench', 'label' => 'Hoists & Winches'],
            ['icon' => 'fa-regular fa-circle', 'label' => 'Pulleys & Rollers'],
            ['icon' => 'fa-solid fa-bicycle', 'label' => 'Bicycle Chains'],
            ['icon' => 'fa-solid fa-motorcycle', 'label' => 'Motorcycle Chains'],
        ],
        'chain-lube' => [
            ['icon' => 'fa-solid fa-link', 'label' => 'Drive Chains'],
            ['icon' => 'fa-solid fa-gears', 'label' => 'Open Gears'],
            ['icon' => 'fa-solid fa-screwdriver-wrench', 'label' => 'Hoists & Winches'],
            ['icon' => 'fa-regular fa-circle', 'label' => 'Pulleys & Rollers'],
            ['icon' => 'fa-solid fa-truck-ramp-box', 'label' => 'Forklifts'],
            ['icon' => 'fa-solid fa-warehouse', 'label' => 'Garage Doors'],
            ['icon' => 'fa-solid fa-circle-nodes', 'label' => 'Bushings & Wire Ropes'],
        ],
        'rust-off' => [
            ['icon' => 'fa-solid fa-screwdriver', 'label' => 'Nuts & Bolts'],
            ['icon' => 'fa-solid fa-door-open', 'label' => 'Hinges & Locks'],
            ['icon' => 'fa-solid fa-screwdriver-wrench', 'label' => 'Hand Tools'],
            ['icon' => 'fa-solid fa-gears', 'label' => 'Mechanical Joints'],
            ['icon' => 'fa-solid fa-warehouse', 'label' => 'Garage Doors & Panels'],
            ['icon' => 'fa-solid fa-car-side', 'label' => 'Auto Parts & Exhausts'],
        ],
        'throttle-body-cleaner' => [
            ['icon' => 'fa-solid fa-fan', 'label' => 'Throttle Plates & Linkages'],
            ['icon' => 'fa-solid fa-filter', 'label' => 'PCV Valves'],
            ['icon' => 'fa-solid fa-car-burst', 'label' => 'Automatic Intakes'],
            ['icon' => 'fa-solid fa-gas-pump', 'label' => 'Carburetors & Choke Assemblies'],
        ],
        'screen-wash' => [
            ['icon' => 'fa-solid fa-eye', 'label' => 'Windshield Glass'],
            ['icon' => 'fa-solid fa-truck', 'label' => 'Truck Cabin Glass'],
            ['icon' => 'fa-solid fa-car-side', 'label' => 'SUV/MUV Screens'],
            ['icon' => 'fa-solid fa-bus', 'label' => 'Bus Front/Rear Glass'],
            ['icon' => 'fa-solid fa-taxi', 'label' => 'Taxi & Fleet Vehicles'],
            ['icon' => 'fa-solid fa-motorcycle', 'label' => 'Two-Wheeler Windshields'],
        ],
        'insta-polish' => [
            ['icon' => 'fa-solid fa-gauge', 'label' => 'Car & bike dashboards'],
            ['icon' => 'fa-solid fa-border-all', 'label' => 'Interior trims'],
            ['icon' => 'fa-solid fa-cubes', 'label' => 'Exterior plastic panels'],
            ['icon' => 'fa-solid fa-fill-drip', 'label' => 'Painted body parts'],
        ],
    ];

    return [
        'intro' => arkos_vetek_intro_from_content($post_id),
        'suitable' => $suitable[$slug] ?? [],
        'benefits' => arkos_vetek_key_features_from_content($post_id),
    ];
}

function arkos_vetek_intro_from_content($post_id = null) {
    $content = (string) get_post_field('post_content', $post_id ?: get_the_ID());

    if (preg_match_all('/<p[^>]*>(.*?)<\/p>/is', $content, $matches)) {
        foreach ($matches[1] as $paragraph) {
            $text = trim(wp_strip_all_tags($paragraph));
            if ($text && !preg_match('/^(Product Description|Key Features|Available in pack sizes)/i', $text)) {
                return $text;
            }
        }
    }

    return trim(wp_strip_all_tags(get_the_excerpt($post_id) ?: $content));
}

function arkos_vetek_key_features_from_content($post_id = null) {
    $content = (string) get_post_field('post_content', $post_id ?: get_the_ID());
    $features = [];

    if (preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $content, $matches)) {
        foreach ($matches[1] as $item) {
            $text = trim(wp_strip_all_tags($item));
            if ($text !== '') {
                $features[] = [
                    'icon' => 'fa-solid fa-circle-check',
                    'text' => $text,
                ];
            }
        }
    }

    return $features;
}

function arkos_vetek_pack_sizes_from_content($post_id = null) {
    $content = (string) get_post_field('post_content', $post_id ?: get_the_ID());
    $text = trim(wp_strip_all_tags($content));

    if (preg_match('/Available\s+in\s+pack\s+sizes:\s*([^\r\n]+)/i', $text, $match)) {
        return trim($match[1]);
    }

    return '';
}

function arkos_vetek_packshot_url($post_id = null) {
    $slug = get_post_field('post_name', $post_id ?: get_the_ID());
    $files = [
        'chain-cleaner-spray' => 'Chain Cleaner Final.webp',
        'chain-lube' => 'Chain Lube Final.webp',
        'rust-off' => 'Rust-Off Final.webp',
        'throttle-body-cleaner' => 'Throttle Body Final.webp',
        'screen-wash' => 'Screen Wash Final.webp',
        'insta-polish' => 'Insta Polish Final.webp',
    ];

    if (empty($files[$slug])) {
        return '';
    }

    return get_template_directory_uri() . '/assets/vetek-packshots/' . rawurlencode($files[$slug]);
}

function arkos_clean_legacy_text($html) {
    $text = html_entity_decode(wp_strip_all_tags((string) $html), ENT_QUOTES, get_bloginfo('charset'));
    $text = preg_replace('/\s+/u', ' ', $text);
    return trim($text);
}

function arkos_bolt_battery_slugs() {
    return ['ab-mf-2-5', 'ab-mf-5', 'ab-mf-7', 'ab-mf-9', 'ab-mf-z4', 'ab-mf-z5'];
}

function arkos_is_bolt_battery_page($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $post = get_post($post_id);

    return $post instanceof WP_Post
        && $post->post_type === 'page'
        && in_array($post->post_name, arkos_bolt_battery_slugs(), true);
}

function arkos_normalize_legacy_upload_url($url) {
    $url = trim((string) $url);

    if ($url === '') {
        return '';
    }

    if (strpos($url, '/~arkosin/wp-content/uploads/') === 0) {
        return content_url('uploads/' . ltrim(substr($url, strlen('/~arkosin/wp-content/uploads/')), '/'));
    }

    if (strpos($url, 'http') !== 0) {
        return home_url($url);
    }

    return $url;
}

function arkos_bolt_battery_profile($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $slug = (string) get_post_field('post_name', $post_id);
    $content = (string) get_post_field('post_content', $post_id);
    $intro = '';
    $subtitle = '';
    $image = '';
    $specs = [];

    if (preg_match('/<p[^>]*class="[^"]*lead[^"]*"[^>]*>(.*?)<\/p>/is', $content, $match)) {
        $intro = arkos_clean_legacy_text($match[1]);
    }

    if (preg_match('/<div[^>]*class="[^"]*in-pdtab-info[^"]*"[^>]*>.*?<h2[^>]*>(.*?)<\/h2>/is', $content, $match)) {
        if (preg_match('/<small[^>]*>(.*?)<\/small>/is', $match[1], $small)) {
            $subtitle = arkos_clean_legacy_text($small[1]);
        }
    }

    if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/is', $content, $match)) {
        $image = arkos_normalize_legacy_upload_url($match[1]);
    }

    $transparent_battery_images = [
        'ab-mf-2-5' => 'ab-mf-2-5.png',
        'ab-mf-5' => 'ab-mf-5.png',
        'ab-mf-7' => 'ab-mf-7.png',
        'ab-mf-9' => 'ab-mf-9.png',
        'ab-mf-z4' => 'ab-mf-z4.png',
        'ab-mf-z5' => 'ab-mf-z5.png',
    ];

    if (isset($transparent_battery_images[$slug])) {
        $image = get_template_directory_uri() . '/assets/battery-products/' . $transparent_battery_images[$slug];
    }

    if (preg_match_all('/<tr[^>]*>\s*<td[^>]*>(.*?)<\/td>\s*<td[^>]*>(.*?)<\/td>\s*<\/tr>/is', $content, $rows, PREG_SET_ORDER)) {
        foreach ($rows as $row) {
            $label = arkos_clean_legacy_text($row[1]);
            $value = arkos_clean_legacy_text($row[2]);

            if ($label !== '' && $value !== '') {
                $specs[$label] = $value;
            }
        }
    }

    return [
        'intro' => $intro ?: 'ARKOS redefines your relationship with energy. Take control of your power costs today.',
        'subtitle' => $subtitle,
        'image' => $image ?: get_template_directory_uri() . '/assets/products-section/arkos-bolt-premium-batteries.png',
        'specs' => $specs,
    ];
}

function arkos_bolt_battery_pages($exclude_id = 0) {
    $pages = [];

    foreach (arkos_bolt_battery_slugs() as $slug) {
        $page = get_page_by_path('2-wheeler-batteries/' . $slug) ?: get_page_by_path($slug);

        if (!$page instanceof WP_Post || (int) $page->ID === (int) $exclude_id) {
            continue;
        }

        $profile = arkos_bolt_battery_profile($page->ID);
        $pages[] = [
            'title' => get_the_title($page),
            'url' => get_permalink($page),
            'image' => $profile['image'],
            'subtitle' => $profile['subtitle'],
        ];
    }

    return $pages;
}

function arkos_legacy_lubricant_products_from_content($post_id = null) {
    $content = (string) get_post_field('post_content', $post_id ?: get_the_ID());
    $products = [];

    if (!preg_match_all('/<section[^>]*class="[^"]*introcontent-wrap[^"]*"[^>]*>(.*?)<\/section>/is', $content, $sections)) {
        return [];
    }

    foreach ($sections[1] as $section) {
        if (!preg_match('/<h2[^>]*>(.*?)<\/h2>/is', $section, $title_match)) {
            continue;
        }

        $title = arkos_clean_legacy_text($title_match[1]);
        if ($title === '') {
            continue;
        }

        preg_match('/<img[^>]+src=["\']([^"\']+)["\']/is', $section, $image_match);
        $image = !empty($image_match[1]) ? esc_url_raw($image_match[1]) : '';

        $text_source = preg_replace('/<div[^>]*class="[^"]*col-md-5[^"]*"[^>]*>.*?<\/div>\s*<\/div>/is', '', $section);
        $text_source = preg_replace('/<div[^>]*class="[^"]*bnfts-infwpsoc[^"]*"[^>]*>.*?<\/div>/is', '', $text_source);
        $plain = arkos_clean_legacy_text($text_source);
        $plain = preg_replace('/^' . preg_quote($title, '/') . '\s*/i', '', $plain);

        $description = trim(preg_split('/\b(Highlights:|RECOMMENDED|Specifications:|Available|Availability in pack sizes:|BENEFITS:)\b/i', $plain)[0] ?? '');

        $features = [];
        if (preg_match('/Highlights:\s*(.*?)(RECOMMENDED|Specifications:|Available|Availability in pack sizes:|BENEFITS:|$)/is', $plain, $highlight_match)) {
            foreach (preg_split('/\.\s+/', trim($highlight_match[1])) as $item) {
                $item = trim($item, " \t\n\r\0\x0B.-");
                if ($item !== '') {
                    $features[] = $item . '.';
                }
            }
        }

        if (preg_match_all('/<p[^>]*class="[^"]*high-textinfp[^"]*"[^>]*>(.*?)<\/p>/is', $section, $detail_matches)) {
            foreach ($detail_matches[1] as $detail) {
                $detail = arkos_clean_legacy_text($detail);
                if ($detail !== '') {
                    $features[] = $detail;
                }
            }
        }

        $benefits = [];
        if (preg_match('/<div[^>]*class="[^"]*bnfts-infwpsoc[^"]*"[^>]*>(.*?)<\/div>/is', $section, $benefits_block)) {
            if (preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $benefits_block[1], $benefit_matches)) {
                foreach ($benefit_matches[1] as $benefit) {
                    $benefit = arkos_clean_legacy_text($benefit);
                    if ($benefit !== '') {
                        $benefits[] = $benefit;
                    }
                }
            }
        }

        $pack_size = '';
        if (preg_match('/Availab(?:le|ility)\s+in\s+pack\s+sizes:\s*-?\s*([^\r\n.]+)/i', $plain, $pack_match)) {
            $pack_size = trim($pack_match[1]);
        }

        $products[] = [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'features' => array_values(array_unique($features)),
            'benefits' => array_values(array_unique($benefits)),
            'pack_size' => $pack_size,
        ];
    }

    return $products;
}

function arkos_legacy_lubricant_intro_from_content($post_id = null) {
    $content = (string) get_post_field('post_content', $post_id ?: get_the_ID());

    if (preg_match('/<section[^>]*class="[^"]*intro-pdinfwpsec[^"]*"[^>]*>(.*?)<\/section>/is', $content, $intro_match)) {
        $intro = preg_replace('/<h2[^>]*>.*?<\/h2>/is', '', $intro_match[1]);
        $intro = arkos_clean_legacy_text($intro);
        if ($intro !== '') {
            return $intro;
        }
    }

    return arkos_clean_legacy_text(get_the_excerpt($post_id) ?: $content);
}

function arkos_product_specs($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $specs = [];

    foreach ([
        'products_subtitle' => 'Range',
        'tyre_size' => 'Tyre Size',
        'tyre' => 'Type',
        'fitment' => 'Fitment',
    ] as $key => $label) {
        $value = trim(wp_strip_all_tags((string) get_post_meta($post_id, $key, true)));
        if ($value !== '') {
            $specs[$label] = $value;
        }
    }

    return $specs;
}

function arkos_product_ecommerce_links($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $raw = get_post_meta($post_id, 'arkos_ecommerce_links', true);

    if (!$raw) {
        return [];
    }

    $links = is_string($raw) ? json_decode($raw, true) : $raw;

    if (!is_array($links)) {
        return [];
    }

    $clean = [];
    foreach ($links as $link) {
        if (!is_array($link) || empty($link['url'])) {
            continue;
        }

        $url = esc_url_raw((string) $link['url']);
        if (!$url) {
            continue;
        }

        $clean[] = [
            'platform' => sanitize_text_field($link['platform'] ?? 'Amazon'),
            'label' => sanitize_text_field($link['label'] ?? 'Buy on Amazon'),
            'sku' => sanitize_text_field($link['sku'] ?? ''),
            'url' => $url,
        ];
    }

    return $clean;
}

function arkos_product_amazon_links($post_id = null) {
    return array_values(array_filter(arkos_product_ecommerce_links($post_id), function ($link) {
        return strtolower($link['platform']) === 'amazon';
    }));
}

function arkos_query_products($args = []) {
    return new WP_Query(array_merge([
        'post_type' => 'arkos_products',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'orderby' => 'title',
        'order' => 'ASC',
    ], $args));
}

function arkos_query_range_products($category_slugs = [], $title_contains = '', $limit = 12) {
    $category_slugs = array_values(array_filter((array) $category_slugs));

    foreach ($category_slugs as $slug) {
        $query = arkos_query_products([
            'posts_per_page' => $limit,
            'category_name' => $slug,
        ]);

        if ($query->have_posts()) {
            return $query;
        }
    }

    $all = arkos_query_products(['posts_per_page' => -1]);

    if (!$title_contains || !$all->have_posts()) {
        return $all;
    }

    $matched_ids = [];
    foreach ($all->posts as $product) {
        if (stripos($product->post_title, $title_contains) !== false) {
            $matched_ids[] = $product->ID;
        }
    }

    wp_reset_postdata();

    if (!$matched_ids) {
        return arkos_query_products(['posts_per_page' => $limit, 'post__in' => [0]]);
    }

    return arkos_query_products([
        'posts_per_page' => $limit,
        'post__in' => $matched_ids,
        'orderby' => 'post__in',
    ]);
}
