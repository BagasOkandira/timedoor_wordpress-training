<?php
/*
Template Name: Portfolio
*/
get_header();
get_template_part('template-parts/hero');

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$portfolioQuery = new WP_Query([
  'post_type' => 'portfolio',
  'post_status' => 'publish',
  'posts_per_page' => 8,
  'order_by' => 'date',
  'order' => 'DESC',
  'paged' => $paged,
])
  ?>



<section class="portfolio">
  <div class="container">
    <div class="row g-0 project__item">
      <?php if ($portfolioQuery->have_posts()): ?>
        <?php while ($portfolioQuery->have_posts()):
          $portfolioQuery->the_post(); ?>
          <div class="col-lg-3">
            <div class="project__card">
              <img class="project__image" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>"
                alt="">
              <div class="project__overlay">
                <h5 class="project__title"><?php the_title() ?></h5>
                <span class="project__icon" data-bs-toggle="modal" data-bs-target="#projectModal">
                  <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M13.1996 22.8001C18.5015 22.8001 22.7996 18.502 22.7996 13.2001C22.7996 7.89816 18.5015 3.6001 13.1996 3.6001C7.89768 3.6001 3.59961 7.89816 3.59961 13.2001C3.59961 18.502 7.89768 22.8001 13.1996 22.8001Z"
                      stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M25.2005 25.2L19.9805 19.98" stroke="white" stroke-width="3" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </span>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
    <nav class="pagination portfolio__pagination">
      <?php
      echo paginate_links([
        'total' => $portfolioQuery->max_num_pages,
        'current' => $paged,
        'mid_size' => 2,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
      ]);
      ?>
    </nav>
  </div>
  <!-- modal -->
  <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal__dialog">
      <div class="modal-content modal__content">
        <div class="modal-body modal__body">
          <img src="assets/images/laptop.png" alt="" class="modal__image" id="modalImage">
          <button type="button" class="modal__close" data-bs-dismiss="modal" aria-label="Close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19.2754 15.7248C20.2504 16.6998 20.2504 18.2748 19.2754 19.2498C18.7754 19.7498 18.1504 19.9748 17.5004 19.9748C16.8504 19.9748 16.2254 19.7248 15.7254 19.2498L10.0004 13.5248L4.27539 19.2498C3.77539 19.7498 3.15039 19.9748 2.50039 19.9748C1.85039 19.9748 1.22539 19.7248 0.725391 19.2498C-0.249609 18.2748 -0.249609 16.6998 0.725391 15.7248L6.45039 9.99981L0.725391 4.2748C-0.249609 3.2998 -0.249609 1.7248 0.725391 0.749805C1.70039 -0.225195 3.27539 -0.225195 4.25039 0.749805L9.97539 6.47481L15.7004 0.749805C16.6754 -0.225195 18.2504 -0.225195 19.2254 0.749805C20.2004 1.7248 20.2004 3.2998 19.2254 4.2748L13.5004 9.99981L19.2254 15.7248H19.2754Z"
                fill="#6A6A6A" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
get_footer();
?>