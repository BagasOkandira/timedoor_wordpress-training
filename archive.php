<?php
get_header();
get_template_part('template-parts/hero');
?>

<section class="blog">
  <div class="container">
    <div class="row">

      <div class="col-lg-8">
        <div class="article-card__content">
          <?php if (have_posts()): ?>
            <?php
            // The Loop untuk menampilkan setiap kartu artikel
            while (have_posts()):
              the_post();
              // Memanggil komponen kartu artikel dari file terpisah
              get_template_part('template-parts/content-blog');
            endwhile;
            ?>
          <?php else: ?>
            <div id="noResultMessage" style="margin-top: 20px; color: gray; text-align: center;">
              No articles found.
            </div>
          <?php endif; ?>
        </div>

        <nav class="pagination blog__pagination">
          <?php
          global $wp_query;
          echo paginate_links([
            'total' => $wp_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'mid_size' => 2,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
          ]);
          ?>
        </nav>
      </div>

      <aside class="col-lg-4 blog__side">
        <?php get_sidebar(); ?>
      </aside>

    </div>
  </div>
</section>

<?php
get_footer();
?>