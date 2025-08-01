<?php
get_header();
get_template_part('template-parts/hero');
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$articleQuery = new WP_Query([
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 5,
  'paged' => $paged,
]);
?>

<section class="blog">
  <div class="container">

    <div class="row">
      <!-- Blog -->
      <div class="col-lg-8">
        <div class="article-card__content">
          <?php if ($articleQuery->have_posts()): ?>
            <?php
            while ($articleQuery->have_posts()):
              $articleQuery->the_post();

              get_template_part('template-parts/content-blog');

            endwhile;
            ?>
          <?php else: ?>
            <div id="noResultMessage" style="margin-top: 20px; color: gray; text-align: center;">
              No articles found.
            </div>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
          <nav class="pagination portfolio__pagination">
            <?php
            echo paginate_links([
              'total' => $articleQuery->max_num_pages,
              'current' => $paged,
              'mid_size' => 2,
              'prev_text' => '&laquo;',
              'next_text' => '&raquo;',
            ]);
            ?>
          </nav>
        </div>


      </div>
      <aside class="col-lg-4 blog__side">
        <div class="blog__search-wrapper">
          <h5 class="blog__title">Search</h5>
          <form action="/" method="get" class="blog__form">
            <input type="text" name="s" placeholder="Search" class="blog__search-input" id="searchInput">
          </form>
        </div>

        <div class="blog__category-wrapper">
          <h5 class="blog__title">blog categories</h5>
          <ul class="blog__list">
            <?php
            $categories = get_categories();
            foreach ($categories as $category): ?>
              <li class="blog__list-item">
                <a class="blog__list-link" href="<?php echo get_category_link($category->term_id); ?>">
                  <?php echo esc_html($category->name); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>


        <div class="blog__tags-wrapper">
          <h5 class="blog__title">Popular tags</h5>
          <div class="blog__tags-area">
            <?php
            $tags = get_tags();
            foreach ($tags as $tag): ?>
              <a href="<?php echo get_tag_link($tag->term_id); ?>" class="blog__tags-btn">
                <span class="blog__tags-btntxt"><?php echo esc_html($tag->name); ?></span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </aside>
    </div>
</section>

<?php
get_footer();
?>