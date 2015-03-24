<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Page description goes here">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
    <?php wp_head(); ?>
  </head>
  <body class="<?php echo $body_class; ?>">
  <?php
  	$header_image = get_field('header_image');
  	$header_video_id = get_field('header_video_id');
  	$header_text = get_field('header_text');
  	$title = get_the_title($post->ID);
  ?>
  <header
    class="<?php echo get_field('hide_top_bar') ? 'hide-top-bar' : 'show-top-bar'; ?>"
    data-height="<?php the_field('top_bar_height_percentage'); ?>"
  >
    <div class="sticky row">
      <nav class="top-bar large-12 columns" data-topbar>
        <ul class="title-area">
          <li class="name">
            <?php $logo = get_field('logo', 'options'); ?>
            <a href="<?php bloginfo('url'); ?>"><img id="logo" src="<?php echo $logo['url']; ?>"/></a>
          </li>
          <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <?php wp_nav_menu( array(
            'theme_location' => 'main-menu',
            'menu_class' => 'right',
            'container' => false)
          ); ?>
        </section>
      </nav>
    </div><!-- .sticky -->
  </header>
  <?php get_template_part('parts/header', 'slideshow'); ?>
