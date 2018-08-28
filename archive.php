<?php
  $archive_page_layout = get_theme_mod( 'halcyon_archive_page_layout', 'classic' );
  $archive_page_layout_class = " " . $archive_page_layout . "-layout";
  $archive_page_pagination_display = get_theme_mod( 'halcyon_pagination_display', 'numbered' );
  $archive_page_sidebar_toggle = get_theme_mod( 'halcyon_archive_page_sidebar_toggle', 1 );
  if ( ! is_active_sidebar( 'sidebar-1' ) || $archive_page_sidebar_toggle == 0 ) {
    $full_width_class = " full-width";
  } else {
    $full_width_class = null;
  }
?>
<?php get_header(); ?>
<div id="content">
  <div class="container">
    <main id="main" role="main" class="main<?php echo esc_attr($full_width_class . $archive_page_layout_class); ?>">
      <div class="title-wrapper">
        <header class="page-header page-header-archive">
         <!-- <i class="material-icons">&#xE2C8;</i>-->
          <h1><?php the_archive_title(); ?></h1>
        </header>
      </div>
      <?php
        if( have_posts() ) {
          get_template_part( 'template-parts/components/archive-layouts/content', $archive_page_layout );
        } else {
          get_template_part( 'content','none' );
        }
        if( $archive_page_pagination_display == 'newer-older' ) {
          if( get_previous_posts_link() || get_next_posts_link()  ) {
            echo '<div class="posts-nav">';
            if( get_previous_posts_link() ) {
              echo '<div class="prev-posts">&laquo;';
              previous_posts_link( esc_html__('Newer Entries', 'halcyon-wp' ) );
              echo '</div>';
            }
            if( get_next_posts_link() ) {
            echo '<div class="next-posts">';
              next_posts_link( esc_html__('Older Entries', 'halcyon-wp' ));
            echo '&raquo;</div>';
            }
            echo '</div>';
          }
        } else {
          the_posts_pagination( array(
            'prev_text' => esc_html__( 'Previous page', 'halcyon-wp' ),
            'next_text' => esc_html__( 'Next page', 'halcyon-wp' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'halcyon-wp' ) . ' </span>',
          ) );
        }
      ?>
    </main>
    <?php if ( $archive_page_sidebar_toggle == 1 ) : ?>
      <?php get_sidebar(); ?>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
