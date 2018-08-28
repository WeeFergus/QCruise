<?php
  $author_id = $post->post_author;
  $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
  $excerpt = $post->post_excerpt;
  $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
  $single_layout_class = " ". get_theme_mod( 'halcyon_single_post_layout', 'classic' ) . "-layout";
  $slider_category = get_theme_mod( 'halcyon_slider_category' );
  $single_exclude_slider_category_toggle = get_theme_mod( 'halcyon_single_exclude_slider_category_toggle', 0 );
  $single_author_toggle = get_theme_mod( 'halcyon_single_author_toggle', 1 );
  $single_date_toggle = get_theme_mod( 'halcyon_single_date_toggle', 1 );
  $single_category_toggle = get_theme_mod( 'halcyon_single_category_toggle', 1 );
  $single_tags_toggle = get_theme_mod( 'halcyon_single_tags_toggle', 1 );
  $single_share_toggle = get_theme_mod( 'halcyon_single_share_toggle', 1 );
  $single_author_bio_toggle = get_theme_mod( 'halcyon_single_author_bio_toggle', 0 );
  $single_author_avatar_toggle = get_theme_mod( 'halcyon_single_author_avatar_toggle', 1 );
  $single_related_posts_toggle = get_theme_mod( 'halcyon_single_related_posts_toggle', 1 );
  $single_comments_toggle = get_theme_mod( 'halcyon_single_comments_toggle', 1 );
  $single_sidebar_toggle = get_theme_mod( 'halcyon_single_sidebar_toggle', 1 );
  if ( ! is_active_sidebar( 'sidebar-1' ) || $single_sidebar_toggle == 0 ) {
    $full_width_class = " full-width";
  } else {
    $full_width_class = null;
  }
?>

<style type="text/css">a {text-decoration:none;}</style>

<?php if( has_post_thumbnail() ) : ?>
  <div class="post-banner" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);">
    <div class="post-banner-inner">
      <?php if ($single_author_toggle == 1 || $single_date_toggle == 1 || $single_category_toggle == 1) : ?>
        <div class="meta-wrapper">
          <div class="post-banner-meta">
            <?php if ($single_author_toggle == 1) : ?>
              <div class="post-banner-meta-author">
                <i class="material-icons">&#xE7FD;</i>
                <a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
              </div>
            <?php endif; ?>
            <?php if ($single_date_toggle == 1) : ?>
              <div class="post-banner-meta-date">
                <i class="material-icons">&#xE8B5;</i>
                <?php echo get_the_date(); ?>
              </div>
            <?php endif; ?>
          
          </div>
        </div>
      <?php endif; ?>
      <div class="post-banner-title">
        <div class="title-wrapper">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </div><!-- .post-banner -->
<?php endif; ?>

<div id="content">
  <div class="container">
    <main id="main" role="main" class="main<?php echo esc_attr($full_width_class . $single_layout_class); ?>">
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="post-content">
            <?php if( !has_post_thumbnail() ) : ?>
              <header class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <?php if ($single_author_toggle == 1 || $single_date_toggle == 1 || $single_category_toggle == 1) : ?>
                  <div class="meta-wrapper">
                    <div class="post-meta">
                      <?php if ($post_author_toggle == 1) : ?>
                        <div class="post-author">
                          <i class="material-icons">&#xE7FD;</i>
                          <a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
                        </div>
                      <?php endif; ?>
                      <?php if ($post_date_toggle == 1) : ?>
                        <div class="post-date">
                          <i class="material-icons">&#xE8B5;</i>
                          <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
                        </div>
                      <?php endif; ?>
                      <?php if ($post_category_toggle == 1) : ?>
                        <div class="post-category">
                          <i class="material-icons">&#xE2C8;</i>
                          <?php if($post_exclude_slider_category_toggle == 1) : ?>
                            <?php halcyon_exclude_post_categories($slider_category); ?>
                          <?php else : ?>
                            <?php the_category(', '); ?>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>
              </header><!-- .single-header -->
            <?php endif; ?>
            <?php if ($excerpt) : ?>
              <div class="post-excerpt">
                <p><?php echo $excerpt; ?></p>
              </div>
            <?php endif; ?>
            <div class="post-entry">
              <?php the_content(); ?>
              <?php
                wp_link_pages( array (
                'before' => '<div class="page-links">',
                'after' => '</div>',
                'link_before' => '<span class="page-link-item">',
                'link_after' => '</span>',
                ) );
              ?>
            </div>
            <?php if (has_tag() && $single_tags_toggle == 1) : ?>
              <?php the_tags( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>' ); ?>
            <?php endif; ?>
            
            
             <?php if ($single_category_toggle == 1) : ?>
              <p><strong>Posted In:</strong></p>
              <div class="post-banner-meta-category">
                <i class="material-icons">&#xE2C8;</i>
                <?php if( has_category($slider_category) && $single_exclude_slider_category_toggle == 1) : ?>
                  <?php halcyon_exclude_post_categories($slider_category); ?>
                <?php else : ?>
                  <?php the_category(', '); ?>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <br /><br />
            
          </div><!-- .post-content -->

          <?php if ($single_share_toggle == 1) : ?>
            <footer class="post-footer">
              <div class="comments-number">
                <i class="material-icons">&#xE0CB;</i>
                <a href="<?php the_permalink(); ?>/#respond"><?php comments_number( '0 ' . esc_html( 'Comments', 'halcyon-wp' ), '1 ' . esc_html( 'Comment', 'halcyon-wp' ), '% ' . esc_html( 'Comments', 'halcyon-wp' ) ); ?></a>
              </div>
              <ul class="share">
                <li class="share-twitter">
                  <a href="https://twitter.com/home?status=Check%20out%20this%20article:<?php echo get_permalink(); ?>" target="_blank">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="share-facebook">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="share-pinterest">
                  <a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&amp;media=<?php echo esc_url($thumbnail_url); ?>">
                    <i class="fa fa-pinterest"></i>
                  </a>
                </li>
                <li class="share-googleplus">
                  <a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </li>
              </ul>
            </footer><!-- .post-footer -->
          <?php endif; ?>

          <?php if ($single_author_bio_toggle == 1) : ?>
            <div class="author-bio">
              <div class="author-bio-inner">
                <?php if ($single_author_avatar_toggle == 1) : ?>
                  <div class="author-avatar">
                    <?php echo get_avatar($author_id); ?>
                  </div>
                <?php endif; ?>
                <div class="author-info">
                  <div class="title-wrapper">
                    <div class="author-info-link">
                      <?php the_author_posts_link(); ?>
                    </div>
                  </div>
                  <div class="author-info-desc">
                    <p><?php the_author_meta('description'); ?></p>
                  </div>
                </div>
              </div>
            </div><!-- .author-bio -->
          <?php endif;?>

          <?php if ($single_related_posts_toggle == 1) : ?>
            <?php halcyon_related_posts(); ?>
          <?php endif;?>

          <?php if ( (comments_open() || get_comments_number()) && $single_comments_toggle == 1 ) : ?>
            <?php comments_template( '', true ); ?>
          <?php endif; ?>

        <?php endwhile; ?>
      </div><!-- .post -->
      </main><!-- #main -->

      <?php if ( $single_sidebar_toggle == 1 ) : ?>
        <?php get_sidebar(); ?>
      <?php endif; ?>

  </div><!-- .container -->
</div><!-- #content -->

<?php get_footer(); ?>
