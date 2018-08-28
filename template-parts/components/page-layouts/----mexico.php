<?php
// Template Name: Mexico

 
 

  $author_id = $post->post_author;
  $excerpt = $post->post_excerpt;
  $page_layout_class = " ". get_theme_mod( 'halcyon_page_layout', 'classic' ) . "-layout";
  $page_sidebar_toggle = get_theme_mod( 'halcyon_page_sidebar_toggle', 1 );
  if ( ! is_active_sidebar( 'sidebar-1' ) || $page_sidebar_toggle == 0 ) {
    $full_width_class = " full-width";
  } else {
    $full_width_class = null;
  }
?>

<div id="content">
  <div class="container">
    <main id="main" role="main" class="main<?php echo esc_attr($full_width_class . $page_layout_class); ?>">
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php if( has_post_thumbnail() ) : ?>
            <div class="page-thumbnail">
              <?php if ( ! is_active_sidebar( 'sidebar-1' ) || $page_sidebar_toggle == 0  ) : ?>
                <?php the_post_thumbnail(); ?>
              <?php else : ?>
                <?php the_post_thumbnail('halcyon-classic-image'); ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <div class="post-content">
            <header class="page-header title-wrapper">
              <h1 class="page-title"><?php the_title(); ?></h1>
            </header><!-- .page-header -->
            <div class="post-entry">
              <?php the_content(); ?>
              <?php
                wp_link_pages( array (
                  'before'      => '<div class="page-links">',
                  'after'       => '</div>',
                  'link_before' => '<span class="page-link-item">',
                  'link_after'  => '</span>',
                ) );
              ?>
            </div><!-- .post-entry -->
          </div><!-- .post-content -->

          <?php if ( comments_open() || get_comments_number() ) : ?>
            <?php comments_template( '', true ); ?>
          <?php endif; ?>

        <?php endwhile; ?>
      </div><!-- .post -->
    </main>

    <?php if ( $page_sidebar_toggle == 1 ) : ?>
      <?php get_sidebar(); ?>
    <?php endif; ?>

  </div>
</div>
