<?php
  $author_id = $post->post_author;
  $image_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
  $slider_category = get_theme_mod( 'halcyon_slider_category' );
  $post_exclude_slider_category_toggle = get_theme_mod( 'halcyon_post_exclude_slider_category_toggle', 0 );
  $post_author_toggle = get_theme_mod( 'halcyon_post_author_toggle', 1 );
  $post_date_toggle = get_theme_mod( 'halcyon_post_date_toggle', 1 );
  $post_category_toggle = get_theme_mod( 'halcyon_post_category_toggle', 1 );
  $post_excerpt_toggle = get_theme_mod( 'halcyon_post_excerpt_toggle', 1 );
?>

<style type="text/css"> .meta-wrapper { display: none; } </style>


<div class="grid-posts masonry">
  <?php while( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-grid-item'); ?>>
      <?php if( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('halcyon-grid-image'); ?>
          </a>
        </div>
      <?php endif; ?>
      <div class="post-content">
        <header class="post-header">
          <div class="title-wrapper">
            <h2 class="post-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
          </div>
          <?php if ($post_author_toggle == 1 || $post_date_toggle == 1 || $post_category_toggle == 1) : ?>
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
                    <?php if( has_category($slider_category) && $post_exclude_slider_category_toggle == 1) : ?>
                      <?php halcyon_exclude_post_categories($slider_category); ?>
                    <?php else : ?>
                      <?php the_category(', '); ?>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        </header>
        <?php if ($post_excerpt_toggle == 1) : ?>
          <div class="post-entry">
            <?php the_excerpt(); ?>
          </div>
        <?php endif; ?>
      </div>
    </article>
  <?php endwhile; ?>
</div>
