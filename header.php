<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Training Wordpress</title>
  <?php wp_head(); ?>
</head>

<body>
  <?php wp_body_open() ?>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top nav">
      <div class="container nav__container">
        <a class="navbar-brand nav__logo" href="<?php echo esc_url(home_url('/')); ?>">
          <?php
          if (function_exists('the_custom_logo')) {
            the_custom_logo();
          }
          ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Timedoor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <?php
            wp_nav_menu([
              'theme_location' => 'main_menu',
              'container' => false,
              'menu_class' => 'navbar-nav justify-content-end flex-grow-1 nav__list',
              'menu_id' => 'main-menu',
              'fallback_cb' => false,
              'depth' => 2,
            ]);
            ?>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>