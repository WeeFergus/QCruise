<?php
  $footer_instagram_toggle = get_theme_mod( 'halcyon_footer_instagram_toggle', 0 );
  if( get_theme_mod( 'halcyon_footer_logo' ) ) {
    $footer_logo = get_theme_mod( 'halcyon_footer_logo' );
    $footer_logo_size = getimagesize($footer_logo);
    $footer_logo_width = $footer_logo_size[0];
    $footer_logo_height = $footer_logo_size[1];
  }
  if( get_theme_mod( 'halcyon_footer_mobile_logo' ) ) {
    $footer_mobile_logo = get_theme_mod( 'halcyon_footer_mobile_logo' );
    $footer_mobile_logo_size = getimagesize($footer_mobile_logo);
    $footer_mobile_logo_width = $footer_mobile_logo_size[0];
    $footer_mobile_logo_height = $footer_mobile_logo_size[1];
  }
?>
  <footer class="footer">
	  
	  <? echo do_shortcode('[instagram-feed]'); ?>
	  
    <?php
      if ( $footer_instagram_toggle == 1 ) {
        include( get_template_directory() . '/includes/instagram-feed.php' );
      }
    ?>
    <div class="footer-main">
      <div class="container">
        <?php if( get_theme_mod( 'halcyon_footer_logo' ) ) : ?>
          <div class="footer-logo-wrapper">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <img class="footer-logo" src="<?php echo esc_url(get_theme_mod('halcyon_footer_logo')); ?>" width="<?php echo esc_attr($footer_logo_width); ?>" height="<?php echo esc_attr($footer_logo_height); ?>" alt="<?php bloginfo('name'); ?>" />
              <?php if( get_theme_mod( 'halcyon_footer_retina_logo' ) ) : ?>
                <img class="footer-logo footer-logo-2x" src="<?php echo esc_url(get_theme_mod('halcyon_footer_retina_logo')); ?>" width="<?php echo esc_attr($footer_logo_width); ?>" height="<?php echo esc_attr($footer_logo_height); ?>" alt="<?php bloginfo('name'); ?>" />
              <?php endif; ?>
              <?php if( get_theme_mod( 'halcyon_footer_mobile_logo' ) ) : ?>
                <img class="footer-logo-mobile" src="<?php echo esc_url(get_theme_mod('halcyon_footer_mobile_logo')); ?>" width="<?php echo esc_attr($footer_mobile_logo_width); ?>" height="<?php echo esc_attr($footer_mobile_logo_height); ?>" alt="<?php bloginfo('name')?>" />
              <?php endif; ?>
              <?php if( get_theme_mod( 'halcyon_footer_mobile_retina_logo' ) ) : ?>
                <img class="footer-logo-mobile footer-logo-mobile-2x" src="<?php echo esc_url(get_theme_mod('halcyon_footer_mobile_retina_logo')); ?>" width="<?php echo esc_attr($footer_mobile_logo_width); ?>" height="<?php echo esc_attr($footer_mobile_logo_height); ?>" alt="<?php bloginfo('name')?>" />
              <?php endif; ?>
            </a>
          </div>
        <?php endif; ?>
        <?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
          <div class="footer-menu">
            <?php
              wp_nav_menu( array(
              'theme_location' => 'footer_menu',
              'container' => ''
              ) );
            ?>
          </div>
        <?php endif; ?>
        
        <div class="widget-row">
        <div id="footer-sidebar" class="clearfix secondary">
	<div id="footer-sidebar1">
		<?php
		if(is_active_sidebar('footer-sidebar-1')){
		dynamic_sidebar('footer-sidebar-1');
		}
		?>
	</div><!--footer-sidebar1-->
	<div id="footer-sidebar2">
		<?php
		if(is_active_sidebar('footer-sidebar-2')){
		dynamic_sidebar('footer-sidebar-2');
		}
		?>
	</div><!--footer-sidebar2-->
	<div id="footer-sidebar3">
		<?php
		if(is_active_sidebar('footer-sidebar-3')){
		dynamic_sidebar('footer-sidebar-3');
		}
		?>
	</div><!--footer-sidebar3-->
	<div id="footer-sidebar4">
		<?php
		if(is_active_sidebar('footer-sidebar-4')){
		dynamic_sidebar('footer-sidebar-4');
		}?> 
		<div class="footer-social">
            <?php halcyon_social_menu(); ?>
          </div>
		
	</div><!--footer-sidebar4-->
</div><!--footer-sidebar-->
</div>


        
        <?php  if ( get_theme_mod( 'halcyon_footer_social_toggle', 0 ) == 1 ) :?>
          
        <?php endif; ?>
        <?php  if ( get_theme_mod( 'halcyon_footer_copyright_toggle', 1 ) == 1 ) :?>
          <div class="footer-copyright">
            <?php if ( get_theme_mod( 'halcyon_footer_copyright_text' ) ) : ?>
              <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod( 'halcyon_footer_copyright_text' )); ?></p>
            <?php else : ?>
              <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name')?>. <?php esc_html_e( 'All Rights Reserved.', 'halcyon-wp' ); ?></p>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </footer>
</div>
<?php wp_footer(); ?>




</body>
</html>
