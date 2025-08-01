<div class="blog__search-wrapper">
  <h5 class="blog__title">Search</h5>
  <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="blog__form">
    <input type="text" name="s" placeholder="Search" class="blog__search-input" id="searchInput"
      value="<?php echo get_search_query(); ?>">
  </form>
</div>

<div class="blog__category-wrapper">
  <h5 class="blog__title">blog categories</h5>
  <ul class="blog__list">
    <?php
    $categories = get_categories();
    foreach ($categories as $category): ?>
      <li class="blog__list-item">
        <a class="blog__list-link" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
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
    if ($tags) {
      foreach ($tags as $tag): ?>
        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="blog__tags-btn">
          <span class="blog__tags-btntxt"><?php echo esc_html($tag->name); ?></span>
        </a>
        <?php
      endforeach;
    }
    ?>
  </div>
</div>