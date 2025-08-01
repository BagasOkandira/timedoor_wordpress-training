<?php get_header(); ?>
<?php
$portfolioQuery = new WP_Query(array(
  'post_type' => 'portfolio',
  'posts_per_page' => 4,
  'orderby' => 'date',
  'order' => 'DESC',
));
$articleQuery = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => 6,
  'orderby' => 'date',
  'order' => 'DESC',
));
?>


<!-- Banner Section -->
<section class="banner swiper">
  <div class="swiper-wrapper">
    <?php
    // Memulai loop Repeater dari ACF
    if (have_rows('banner_swiper')):
      while (have_rows('banner_swiper')):
        the_row();

        // Mengambil nilai dari setiap sub-field dan menyimpannya di variabel
        $img_url = get_sub_field('banner_image');
        $title = get_sub_field('banner_title');
        $description = get_sub_field('banner_description');
        ?>

        <div class="swiper-slide banner__slide" style="background-image: url('<?php echo esc_url($img_url); ?>');">
          <div class="container-fluid banner__text">
            <h1 class="banner__title"><?php echo esc_html($title); ?></h1>
            <p class="banner__description"><?php echo esc_html($description); ?></p>


            <a href="javascript:void(0)" class="button button--primary banner__button">
              <span class="button__text">learn more</span>
            </a>

          </div>
        </div>

        <?php
      endwhile;
    endif;
    ?>

  </div>

  <!-- Pagination -->
  <div class="swiper-pagination">
    <div class="swiper-pagination-bullet swiper-pagination-bullet"></div>
    <div class="swiper-pagination-bullet"></div>
  </div>

  <!-- Nav Arrows -->
  <div class="swiper-button-next">
    <svg width="36" height="30" viewBox="0 0 36 30" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M21.4673 15.0063L7.99977 3.78293C7.62894 3.47463 7.42494 3.06244 7.42494 2.62293C7.42494 2.18317 7.62894 1.77122 7.99977 1.46244L9.17987 0.479512C9.55011 0.170244 10.045 0 10.5725 0C11.0999 0 11.5942 0.170244 11.9647 0.479512L28 13.842C28.372 14.1517 28.5757 14.5656 28.5742 15.0056C28.5757 15.4476 28.3723 15.861 28 16.171L11.9797 29.5205C11.6091 29.8298 11.1148 30 10.5871 30C10.0597 30 9.56533 29.8298 9.1945 29.5205L8.0147 28.5376C7.24699 27.8978 7.24699 26.8563 8.0147 26.2168L21.4673 15.0063Z"
        fill="white" />
    </svg>
  </div>
  <div class="swiper-button-prev">
    <svg width="36" height="30" viewBox="0 0 36 30" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M14.5327 15.0063L28.0002 3.78293C28.3711 3.47463 28.5751 3.06244 28.5751 2.62293C28.5751 2.18317 28.3711 1.77122 28.0002 1.46244L26.8201 0.479512C26.4499 0.170244 25.955 0 25.4275 0C24.9001 0 24.4058 0.170244 24.0353 0.479512L8.00003 13.842C7.62803 14.1517 7.42433 14.5656 7.42579 15.0056C7.42433 15.4476 7.62774 15.861 8.00003 16.171L24.0203 29.5205C24.3909 29.8298 24.8852 30 25.4129 30C25.9403 30 26.4347 29.8298 26.8055 29.5205L27.9853 28.5376C28.753 27.8978 28.753 26.8563 27.9853 26.2168L14.5327 15.0063Z"
        fill="white" />
    </svg>
  </div>

</section>
<!-- Banner End -->

<!-- About Section -->
<section class="about reveal">
  <div class="container">
    <div class="row about__wrapper">

      <div class="col-lg-5">
        <div class="about__image-container">
          <img src="<?php echo esc_url(get_field('about_image')); ?>" />
        </div>
      </div>
      <div class="col-lg-7 ">
        <div class="about__content">
          <h2 class="about__title"><?php echo esc_html(get_field('about_title')); ?></h2>
          <div class="about__description">
            <?php echo wp_kses_post(get_field('about_description')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About End -->

<!-- Project Section -->
<section class="project reveal">
  <div class="container">
    <div class="project__text text-center">
      <h2 class="project__header"><?php echo esc_html(get_field('project_title')); ?></h2>
      <p class="project__description"><?php echo esc_html(get_field('project_description')); ?></p>
    </div>
    <div class="row g-0 project__item">
      <?php if ($portfolioQuery->have_posts()): ?>
        <?php while ($portfolioQuery->have_posts()):
          $portfolioQuery->the_post(); ?>
          <div class="col-lg-3">
            <div class="project__card">
              <img class="project__image" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), '')); ?>" alt="">
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
  </div>
  <!-- modal -->
  <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal__dialog">
      <div class="modal-content modal__content">
        <div class="modal-body modal__body">
          <img src="" alt="" class="modal__image" id="modalImage">
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
<!-- Project End -->

<!-- Article Section -->
<section class="article reveal">
  <div class="container">
    <div class="article__text text-center">
      <h2 class="article__header"><?php echo get_field('article_title'); ?></h2>
      <p class="article__subtitle"><?php echo get_field('article_description'); ?></p>
    </div>
    <div class="article-card__content">
      <div class="row gx-5">
        <?php if ($articleQuery->have_posts()): ?>
          <?php while ($articleQuery->have_posts()):
            $articleQuery->the_post(); ?>
            <div class="col-lg-4 article-card__item">
              <div class="article-card__media">
                <?php if (has_post_thumbnail()): ?>
                  <img src="<?php the_post_thumbnail_url(''); ?>" alt="<?php the_title(); ?>"
                    class="article-card__image--home">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?> /assets/images/laptop.png"
                    alt="<?php the_title_attribute(); ?>" class="article-card__image--home">
                <?php endif; ?>
                <div class="article-card__date"><?php echo get_the_date(); ?></div>
              </div>
              <div class="article-card__blog">
                <?php
                $categories = get_the_category();
                if (!empty($categories)): ?>
                  <ul class="article-card__categories">
                    <?php foreach ($categories as $cat): ?>
                      <li class="article-card__category category--<?= strtolower($cat->slug); ?>">
                        <?= esc_html($cat->name); ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>

                <h3 class="article-card__title">
                  <a class="article-card__title-link" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>

                <p class="article-card__description"><?php echo get_the_excerpt(); ?></p>

                <a href="<?php the_permalink(); ?>" class="button article-card__button button--outlined">
                  <span class="article-card__button button__text">continue reading</span>
                  <svg class="button__icon-svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" stroke="currentColor" fill="currentColor" clip-rule="evenodd"
                      d="M17.9592 9.3585C18.3124 9.71174 18.3124 10.2883 17.9592 10.6415L11.04 17.5605C10.6862 17.9143 10.1107 17.9143 9.75692 17.5605L9.36989 17.1735C9.01579 16.8194 9.01571 16.2442 9.36985 15.89L14.6187 10.6417C14.9729 10.2876 14.9729 9.71229 14.6187 9.35819L9.36989 4.10983C9.01571 3.75569 9.01575 3.18053 9.36993 2.82639L9.75696 2.43936C10.1102 2.08612 10.6868 2.08612 11.04 2.43936L17.9592 9.3585ZM3.71145 2.43928C3.35786 2.08565 2.78181 2.08569 2.42821 2.43928L2.04118 2.82631C1.68774 3.17975 1.6877 3.75631 2.04118 4.10979L7.28973 9.35819C7.64388 9.71233 7.64388 10.2876 7.28973 10.6417L2.04114 15.8901C1.68755 16.2436 1.68759 16.82 2.04114 17.1735L2.42817 17.5606C2.78192 17.9143 3.35766 17.9144 3.71141 17.5606L10.016 11.2558C11.7845 13.0225 11.3372 12.5745 10.0173 11.2545L10.6302 10.6415C10.9837 10.2881 10.9836 9.71194 10.6302 9.35846L3.71145 2.43928Z" />
                  </svg>
                </a>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>
<!-- Article End -->

<?php get_footer(); ?>