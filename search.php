<?php
/**
 * Template untuk menampilkan hasil pencarian.
 */

get_header();

// Panggil komponen hero universal kita (yang sekarang sudah bisa menangani halaman pencarian)
get_template_part('template-parts/hero');
?>

<section class="blog">
  <div class="container">
    <div class="row">

      <div class="col-lg-8">
        <div class="article-card__content">
          <?php if (have_posts()): ?>
            <?php
            // The Loop untuk menampilkan setiap hasil pencarian
            while (have_posts()):
              the_post();
              // Menggunakan kembali komponen kartu artikel yang sama
              get_template_part('template-parts/content-blog');
            endwhile;
            ?>
          <?php else: ?>
            <div id="noResultMessage" style="margin-top: 20px; color: gray; text-align: center;">
              <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
              <?php get_search_form(); ?>
            </div>
          <?php endif; ?>
        </div>

        <nav class="pagination blog__pagination">
          <?php
          the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('&laquo;'),
            'next_text' => __('&raquo;'),
          ));
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