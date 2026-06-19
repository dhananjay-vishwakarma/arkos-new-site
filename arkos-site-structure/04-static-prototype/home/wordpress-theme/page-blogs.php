<?php
get_header();

if (!function_exists('arkos_blog_card_image_url')) {
    function arkos_blog_card_image_url($post_id) {
        $thumbnail = get_the_post_thumbnail_url($post_id, 'large');

        if ($thumbnail) {
            return $thumbnail;
        }

        $content = get_post_field('post_content', $post_id);

        if ($content && class_exists('WP_HTML_Tag_Processor')) {
            $processor = new WP_HTML_Tag_Processor($content);

            if ($processor->next_tag('img')) {
                $src = $processor->get_attribute('src');

                if ($src) {
                    return $src;
                }
            }
        }

        return get_template_directory_uri() . '/assets/vetek-decor/bg-decorative-image-vettek-related-products.png';
    }
}

if (!function_exists('arkos_blog_excerpt')) {
    function arkos_blog_excerpt($post_id, $words = 24) {
        $excerpt = get_the_excerpt($post_id);

        if (!$excerpt) {
            $excerpt = get_post_field('post_content', $post_id);
        }

        $excerpt = trim(wp_strip_all_tags(strip_shortcodes($excerpt)));

        return $excerpt ? wp_trim_words($excerpt, $words) : '';
    }
}

$paged = max(1, (int) (get_query_var('paged') ?: get_query_var('page')));
$blog_search = isset($_GET['blog_search']) ? sanitize_text_field(wp_unslash($_GET['blog_search'])) : '';
$blog_category = isset($_GET['blog_category']) ? absint(wp_unslash($_GET['blog_category'])) : 0;
$blog_categories = get_categories([
    'hide_empty' => true,
]);

$blog_args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 7,
    'paged' => $paged,
];

if ($blog_search) {
    $blog_args['s'] = $blog_search;
}

if ($blog_category) {
    $blog_args['cat'] = $blog_category;
}

$blog_query = new WP_Query($blog_args);
?>

<article class="arkos-blogs-page arkos-blogs-page--minimal">
  <section class="arkos-blogs-hero">
    <div class="real-section__inner arkos-blogs-hero__minimal">
      <div class="arkos-blogs-hero__copy">
        <p class="arkos-blogs-eyebrow">ARKOS Insights</p>
        <h1><?php the_title(); ?></h1>
        <p>Product care notes, workshop guidance and mobility updates.</p>
      </div>
      <form class="arkos-blog-filters" method="get" action="<?php echo esc_url(get_permalink()); ?>">
        <label>
          <span class="screen-reader-text"><?php esc_html_e('Search blogs', 'arkos-staging'); ?></span>
          <input type="search" name="blog_search" value="<?php echo esc_attr($blog_search); ?>" placeholder="<?php esc_attr_e('Search articles', 'arkos-staging'); ?>" />
        </label>
        <label>
          <span class="screen-reader-text"><?php esc_html_e('Filter by category', 'arkos-staging'); ?></span>
          <select name="blog_category">
            <option value="0"><?php esc_html_e('All Topics', 'arkos-staging'); ?></option>
            <?php foreach ($blog_categories as $category) : ?>
              <option value="<?php echo esc_attr((string) $category->term_id); ?>"<?php selected($blog_category, (int) $category->term_id); ?>>
                <?php echo esc_html($category->name); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </label>
        <button type="submit"><?php esc_html_e('Apply', 'arkos-staging'); ?></button>
      </form>
    </div>
  </section>

  <section class="arkos-blog-library" aria-labelledby="arkos-blog-library-title">
    <div class="real-section__inner">
      <h2 id="arkos-blog-library-title" class="screen-reader-text"><?php esc_html_e('Latest blog articles', 'arkos-staging'); ?></h2>

      <?php if ($blog_query->have_posts()) : ?>
        <div class="arkos-blog-grid">
          <?php foreach ($blog_query->posts as $blog_post) : ?>
            <?php
            setup_postdata($blog_post);
            $post_id = $blog_post->ID;
            $post_categories = get_the_category($post_id);
            ?>
            <article class="arkos-blog-card">
              <div class="arkos-blog-card__body">
                <div class="arkos-blog-meta">
                  <span><?php echo esc_html(get_the_date('d M Y', $post_id)); ?></span>
                  <?php if (!empty($post_categories)) : ?>
                    <span><?php echo esc_html($post_categories[0]->name); ?></span>
                  <?php endif; ?>
                </div>
                <h3><a href="<?php the_permalink($post_id); ?>"><?php echo esc_html(get_the_title($post_id)); ?></a></h3>
                <?php if (arkos_blog_excerpt($post_id)) : ?>
                  <p><?php echo esc_html(arkos_blog_excerpt($post_id)); ?></p>
                <?php endif; ?>
                <a class="arkos-blog-link" href="<?php the_permalink($post_id); ?>">Read Article <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          <?php endforeach; wp_reset_postdata(); ?>
        </div>

        <?php
        $pagination = paginate_links([
            'total' => $blog_query->max_num_pages,
            'current' => $paged,
            'type' => 'list',
            'add_args' => array_filter([
                'blog_search' => $blog_search,
                'blog_category' => $blog_category ?: null,
            ]),
        ]);
        ?>

        <?php if ($pagination) : ?>
          <nav class="arkos-blog-pagination" aria-label="<?php esc_attr_e('Blog pagination', 'arkos-staging'); ?>">
            <?php echo wp_kses_post($pagination); ?>
          </nav>
        <?php endif; ?>
      <?php else : ?>
        <div class="arkos-blog-empty">
          <h2><?php esc_html_e('No articles found', 'arkos-staging'); ?></h2>
          <p><?php esc_html_e('Try a different search term or category filter.', 'arkos-staging'); ?></p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</article>

<?php get_footer(); ?>
