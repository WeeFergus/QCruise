<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	  <meta name="google-site-verification" content="YIJYahrxG9CkUyfvjcjZg8ikoIxpViNugLPZWfx0aJU" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
    <?php if(is_single()) : ?>
      <?php
        global $post;
        $img_src = wp_get_attachment_image_url(get_post_thumbnail_id( $post->ID ), 'halcyon-classic-image');
      ?>
      <meta property="description" content="The best online guide to small ship cruises under 300 passengers, from river cruises to sailing, expedition and oceangoing ships all over the world."/>
      <meta property="og:title" content="<?php echo the_title(); ?>"/>
      <meta property="og:type" content="article"/>
      <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
      <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
      <meta property="og:image" content="<?php echo $img_src; ?>"/>
    <?php endif; ?>
    
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    
  </head>
  <?php
    $header_style = get_theme_mod( 'halcyon_header_style', 'default' );
  ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-98660135-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-98660135-1');
</script>

  <body <?php body_class(); ?>>
	  	  
    <div id="wrapper">
      <?php
        if ( $header_style == 'default' ) {
          get_template_part('template-parts/components/header-layouts/header', 'default');
        } elseif ( $header_style == 'top-bar' ) {
          get_template_part('template-parts/components/header-layouts/header', 'top-bar');
        } else {
          get_template_part('template-parts/components/header-layouts/header', 'default');
        }
      ?>


