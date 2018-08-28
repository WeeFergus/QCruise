<?php
  $slider_category = get_theme_mod( 'halcyon_slider_category' );
  $slider_exlude_category_toggle = get_theme_mod( 'halcyon_slider_exclude_category_toggle', 0 );
  $slider_item_count = get_theme_mod( 'halcyon_slider_item_count', 5 );
  $slider_author_toggle = get_theme_mod( 'halcyon_slider_author_toggle', 0 );
  $slider_category_toggle = get_theme_mod( 'halcyon_slider_category_toggle', 0 );
  $slider_date_toggle = get_theme_mod( 'halcyon_slider_date_toggle', 1 );
  $slider_button_toggle = get_theme_mod( 'halcyon_slider_button_toggle', 1 );
?>

<div class="featured full-width">
  <div class="featured-wrapper">
    <?php $featured_posts = new WP_Query( array('cat' => $slider_category, 'posts_per_page' => $slider_item_count) ); ?>
    <?php if( $featured_posts->have_posts() ) : ?>
      <?php while( $featured_posts->have_posts() ) : $featured_posts->the_post(); ?>

        <?php $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>

        <div class="featured-item" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);">
          <div class="featured-item-box">
            <div class="featured-item-box-inner">
              <?php if ( $slider_author_toggle == 1 || $slider_date_toggle == 1 || $slider_category_toggle == 1 )  : ?>
                <div class="meta-wrapper">
                  <div class="featured-item-meta">
                    <?php if ( $slider_author_toggle == 1 ) : ?>
                      <div class="featured-item-meta-author">
                        <i class="material-icons">&#xE7FD;</i>
                        <?php the_author_link(); ?>
                      </div>
                    <?php endif; ?>
                    <?php if ( $slider_date_toggle == 1 ) : ?>
                      <div class="featured-item-meta-date">
                        <i class="material-icons">&#xE8B5;</i>
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
                      </div>
                    <?php endif; ?>
                    <?php if ( $slider_category_toggle == 1 ) : ?>
                      <div class="featured-item-meta-category">
                        <i class="material-icons">&#xE2C8;</i>
                        <?php if ($slider_exlude_category_toggle == 1) : ?>
                          <?php halcyon_exclude_post_categories($slider_category); ?>
                        <?php else : ?>
                          <?php the_category(', '); ?>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endif; ?>
              <div class="title-wrapper">
                <div class="featured-item-title">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
              </div>
              <?php if ( $slider_button_toggle == 1 ) : ?>
                <div class="featured-item-more-link">
                  <div class="button-wrapper">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod( 'halcyon_slider_button_text', esc_html__('Read More', 'halcyon-wp') ) ); ?></a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</div>
