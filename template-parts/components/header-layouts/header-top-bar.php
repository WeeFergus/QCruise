<?php
  $header_social_toggle = get_theme_mod( 'halcyon_header_social_toggle', 1 );
  $header_search_toggle = get_theme_mod( 'halcyon_header_search_toggle', 1 );
?>

<div class="top-bar">
  <div class="container">
    <?php if ( has_nav_menu( 'top_menu' ) ) : ?>
      <nav class="top-bar-menu">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'top_menu',
            'container' => ''
          ) );
        ?>
      </nav>
    <?php endif; ?>
   <!-- <?php if ( $header_social_toggle == 1 || $header_search_toggle == 1 ) : ?>
      <div class="top-bar-items">
        <?php if ( $header_social_toggle == 1 ) : ?>
          <nav class="top-bar-items-social">
            <?php halcyon_social_menu(); ?>
          </nav>
        <?php endif; ?>
        <?php if ( $header_search_toggle == 1 ) : ?>
          <div class="top-bar-items-search">
            <a href="#">
              <i class="fa fa-search"></i>
            </a>
            <?php if ( $header_search_toggle == 1 ) : ?>
              <div class="top-bar-search">
                <?php get_search_form(); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>-->
  </div>
</div><!-- .top-bar -->

<header class="header header-top-bar">

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

	 
     <!-- <div id="reviewCount">67</div>-->
    </div><!-- .logo-wrapper -->

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
        if ( has_nav_menu( 'top_menu' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'top_menu',
            'container' => ''
          ) );
        }
      ?>
    </div><!-- .toggle-menu -->
    
    

  </div><!-- .container -->
  <div id="counting"><?php the_field('review_total', 'option'); ?> Small Ship Cruise Lines Covered and Counting...</div>
</header><!-- .header -->
