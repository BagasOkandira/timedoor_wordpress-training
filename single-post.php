<?php
get_header();
get_template_part('template-parts/hero');
?>


<section class="blog blog-detailed">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php if (have_posts()):
          while (have_posts()):
            the_post(); ?>
            <article class="article-card__item--detailed">
              <div class="article-card__media">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('large', ['class' => 'article-card__image']); ?>
                <?php else: ?>
                  <img src="/assets/images/laptop.png" alt="" class="article-card__image">
                <?php endif; ?>
                <div class="article-card__date"><?php echo get_the_date('F d, Y'); ?></div>
              </div>
              <div class="article-card__blog">
                <h3 class="article-card__title">
                  <a class="article-card__title-link" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>
                <div class="article-card__description">
                  <?php the_content(); ?>
                </div>
              </div>
            </article>
          <?php endwhile; endif; ?>

      </div>
      <aside class="col-lg-4 blog__side">
        <div class="blog__search-wrapper">
          <h5 class="blog__title">Search</h5>
          <form action="/" method="get" class="blog__form">
            <input type="text" name="s" placeholder="Search" class="blog__search-input" id="searchInput">
          </form>
        </div>

        <div class="blog__latest-wrapper">
          <h5 class="blog__title">latest news</h5>
          <?php
          $latestPosts = new WP_Query([
            'posts_per_page' => 3,
            'post_status' => 'publish',
          ]);
          ?>
          <?php while ($latestPosts->have_posts()):
            $latestPosts->the_post(); ?>
            <div class="blog__latest-card">
              <?php if (has_post_thumbnail()): ?>
                <img class="blog__latest-img" src="<?php the_post_thumbnail_url(''); ?>" alt="">
              <?php else: ?>
                <img class="blog__latest-img" src="<?php echo get_template_directory_uri(); ?> /assets/images/laptop.png"
                  alt="">
              <?php endif; ?>
              <div class="blog__latest-content">
                <h6 class="blog__latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                <div class="blog__latest-date-wrapper">
                  <span class="blog__latest-date"><?php echo get_the_date(); ?></span>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata(); ?>

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
  </div>
</section>

<?php
get_footer();
?>