</main>

<footer>
  <div class="container-fluid text-center footer__wrapper">
    <button class="footer__totop" id="scrollToTopBtn" aria-label="Scroll to top">
      <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M12.2683 2.60101C11.8758 2.20852 11.2352 2.20852 10.8427 2.60101L3.15491 10.289C2.76181 10.6821 2.76181 11.3216 3.15491 11.7146L3.58495 12.1447C3.97839 12.5381 4.6175 12.5382 5.01103 12.1447L10.8425 6.31268C11.2359 5.91915 11.8752 5.91915 12.2686 6.31268L18.1001 12.1447C18.4936 12.5382 19.1327 12.5382 19.5262 12.1446L19.9562 11.7146C20.3487 11.3221 20.3487 10.6815 19.9562 10.289L12.2683 2.60101ZM19.9563 18.4318C20.3492 18.8247 20.3492 19.4648 19.9563 19.8576L19.5263 20.2877C19.1336 20.6804 18.4929 20.6804 18.1002 20.2877L12.2686 14.456C11.8751 14.0625 11.236 14.0625 10.8425 14.456L5.01099 20.2877C4.61815 20.6806 3.97774 20.6806 3.5849 20.2877L3.15487 19.8577C2.76181 19.4646 2.76177 18.8249 3.15487 18.4319L10.1602 11.4267C8.19714 9.46173 8.69497 9.95878 10.1616 11.4253L10.8427 10.7443C11.2354 10.3516 11.8756 10.3516 12.2683 10.7443L19.9563 18.4318Z"
          fill="#6A6A6A" />
      </svg>
    </button>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo-wrapper">
      <img class="footer__logo" src="<?php echo esc_url(get_field('footer_image', 'page_link')); ?>" alt="Timedoor">
    </a>

    <div class="footer__socmed-wrapper">
      <?php
      if (have_rows('footer_social_media', 'social_media')):
        while (have_rows('footer_social_media', 'social_media')):
          the_row();

          $social_link = get_sub_field('social_link');
          $social_icon = get_sub_field('social_icon');

          if ($social_link && $social_icon):
            ?>
            <a href="<?php echo esc_url($social_link); ?>" target="_blank" rel="noopener noreferrer"
              class="footer__socmed-icon">
              <?php echo $social_icon; ?>
            </a>
            <?php
          endif;
        endwhile;
      endif;
      ?>
    </div>

    <p class="footer__copyright">© Copyright <?php echo date('Y'); ?> Timedoor.</p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>