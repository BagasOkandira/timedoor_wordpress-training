<div class="article-card__item--blog">
  <div class="article-card__media">
    <?php if (has_post_thumbnail()): ?>
      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="article-card__image">
    <?php else: ?>
      <img src="<?php echo get_template_directory_uri(); ?> /assets/images/laptop.png"
        alt="<?php the_title_attribute(); ?>" class="article-card__image">
    <?php endif; ?>
    <div class="article-card__date"><?php echo get_the_date(); ?></div>
  </div>
  <div class="article-card__blog">
    <?php
    $categories = get_the_category();
    if (!empty($categories)): ?>
      <ul class="article-card__categories">
        <?php foreach ($categories as $cat): ?>
          <li class="article-card__category category--<?php echo esc_attr($cat->slug); ?>">
            <?php echo esc_html($cat->name); ?>
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