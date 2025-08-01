<?php

$hero_title = '';
$background_image_url = '';
$posts_page_id = get_option('page_for_posts');

// KONDISI: Jika ini halaman pencarian
if (is_search()) {
  $hero_title = sprintf(
    '%s %s',
    __('Search Results for:'),
    '"' . get_search_query() . '"'
  );
  $background_image_url = get_field('hero_background_image', $posts_page_id);
}
// KONDISI: Jika ini halaman arsip (kategori, tag, dll.)
else if (is_archive()) {
  $queried_object = get_queried_object();
  $hero_title = $queried_object->name;

  if ($queried_object instanceof WP_Term) {
    $taxonomy_id_string = $queried_object->taxonomy . '_' . $queried_object->term_id;
    $background_image_url = get_field('hero_background_image', $taxonomy_id_string);
  }
}
// KONDISI: Jika ini halaman Blog atau postingan tunggal
else if (is_home() || is_singular('post')) {
  if ($posts_page_id) {
    $hero_title = get_the_title($posts_page_id);
    $background_image_url = get_field('hero_background_image', $posts_page_id);
  }
}
// KONDISI: Untuk semua halaman lainnya
else {
  $hero_title = get_the_title();
  $background_image_url = get_field('hero_background_image', get_the_ID());
}

// Siapkan inline style untuk background
$inline_style = $background_image_url ? "style=\"background-image: url('" . esc_url($background_image_url) . "');\"" : '';

?>
<section class="hero" <?php echo $inline_style; ?>>
  <div class="container-fluid">
    <div class="hero__wrapper">
      <h2 class="hero__title" id="pageTitle">
        <?php echo esc_html($hero_title); ?>
      </h2>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb hero__bcrumb" id="breadcrumb">

          <li class="breadcrumb-item hero__bcrumb-item">
            <a class="hero__bcrumb-link" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
          </li>

          <?php if (is_singular('post') && $posts_page_id): ?>
            <li class="breadcrumb-item hero__bcrumb-item">
              <a class="hero__bcrumb-link" href="<?php echo esc_url(get_permalink($posts_page_id)); ?>">
                <?php echo esc_html(get_the_title($posts_page_id)); ?>
              </a>
            </li>
          <?php endif; ?>

          <li class="breadcrumb-item hero__bcrumb-item active" aria-current="page">
            <?php
            if (is_search()) {
              // Untuk halaman pencarian
              echo sprintf('Search for: "%s"', get_search_query());
            } else if (is_archive()) {
              // Untuk halaman Kategori/Tag
              echo esc_html(get_queried_object()->name);
            } else if (is_home()) {
              // Untuk halaman Blog utama
              echo esc_html(get_the_title(get_option('page_for_posts')));
            } else {
              // Untuk halaman dan postingan lainnya
              the_title();
            }
            ?>
          </li>

        </ol>
      </nav>
    </div>
  </div>
</section>