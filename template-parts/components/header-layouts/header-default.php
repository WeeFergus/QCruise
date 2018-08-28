<?php
  $header_social_toggle = get_theme_mod( 'halcyon_header_social_toggle', 1 );
  $header_search_toggle = get_theme_mod( 'halcyon_header_search_toggle', 1 );
  if( get_theme_mod( 'halcyon_primary_logo' ) ) {
    $primary_logo = get_theme_mod( 'halcyon_primary_logo' );
    $primary_logo_size = getimagesize($primary_logo);
    $primary_logo_width = $primary_logo_size[0];
    $primary_logo_height = $primary_logo_size[1];
  }
  if( get_theme_mod( 'halcyon_mobile_logo' ) ) {
    $mobile_logo = get_theme_mod( 'halcyon_mobile_logo' );
    $mobile_logo_size = getimagesize($mobile_logo);
    $mobile_logo_width = $mobile_logo_size[0];
    $mobile_logo_height = $mobile_logo_size[1];
  }
?>

<header class="header header-default">

  <div class="container">

    <div class="logo-wrapper">
      <div class="title-wrapper">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php if( get_theme_mod( 'halcyon_primary_logo' ) ) : ?>
            <img class="logo" src="<?php echo esc_url(get_theme_mod('halcyon_primary_logo')); ?>" alt="<?php bloginfo('name')?>" />
          <?php endif; ?>
          <?php if( get_theme_mod( 'halcyon_primary_retina_logo' ) ) : ?>
            <img class="logo logo-2x" src="<?php echo get_theme_mod('halcyon_primary_retina_logo'); ?>" srcset="<?php echo get_theme_mod('halcyon_primary_retina_logo'); ?> 1x, <?php echo get_theme_mod('halcyon_primary_retina_logo'); ?> 2x" alt="<?php bloginfo('name')?>">
          <?php endif; ?>
          <?php if( get_theme_mod( 'halcyon_mobile_logo' ) ) : ?>
            <img class="logo-mobile" src="<?php echo esc_url(get_theme_mod('halcyon_mobile_logo')); ?>" alt="<?php bloginfo('name')?>" />
          <?php endif; ?>
          <?php if( get_theme_mod( 'halcyon_mobile_retina_logo' ) ) : ?>
            <img class="logo-mobile logo-mobile-2x" src="<?php echo get_theme_mod('halcyon_mobile_retina_logo'); ?>" srcset="<?php echo get_theme_mod('halcyon_mobile_retina_logo'); ?> 1x, <?php echo get_theme_mod('halcyon_mobile_retina_logo'); ?> 2x" alt="<?php bloginfo('name')?>">
          <?php endif; ?>
          <?php if( !get_theme_mod( 'halcyon_primary_logo' ) && !get_theme_mod( 'halcyon_mobile_logo' )  ) : ?>
            <?php bloginfo('name')?>
          <?php endif; ?>
        </a>
      </div>
    </div><!-- .logo-wrapper -->

    <?php if ( has_nav_menu( 'header_menu' ) ) : ?>
      <div class="header-menu">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'header_menu',
            'container' => ''
          ) );
        ?>
      </div><!-- .header-menu -->
    <?php endif; ?>

    <?php if ( $header_social_toggle == 1 || $header_search_toggle == 1 ) : ?>
      <div class="header-items">
        <?php if ( $header_social_toggle == 1 ) : ?>
          <div class="header-items-social">
            <?php halcyon_social_menu(); ?>
          </div><!-- .header-items-social -->
        <?php endif; ?>

        <?php if ( $header_search_toggle == 1 ) : ?>
          <div class="header-items-search">
            <div class="header-items-search-inner">
              <a href="#">
                <i class="fa fa-search"></i>
              </a>
              <div class="header-search">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div><!-- .header-items-search -->
        <?php endif; ?>
      </div><!-- .header-items -->
    <?php endif; ?>

    <div class="toggle-button">
      <div class="toggle-button-inner">
        <div class="toggle-button-bars">
          <i></i>
          <i></i>
          <i></i>
        </div><!-- .toggle-button-bars -->
      </div><!-- .toggle-button-inner -->
    </div><!-- .toggle-button -->

    <div class="toggle-menu">
      <?php
        if ( has_nav_menu( 'header_menu' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'header_menu',
            'container' => ''
          ) );
        }
      ?>
    </div><!-- .toggle-menu -->

  </div><!-- .container -->
</header><!-- .header -->
