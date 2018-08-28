<?php
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
 
 <?php if ( is_page( 'About Us')) : ?>
 	<style type="text/css"> #main { width: 100%; float: none; } aside#sidebar {display:none;}</style>
 <?php endif; ?>	 

 
 <?php if ( is_page( array('North America', 'Central America', 'Caribbean Islands', 'South America', 'Antarctica', 'Europe', 'Europe: The Mediterranean', 'Africa', 'South & Western Asia', 'East Asia', 'Southeast Asia', 'Australia', 'Pacific Ocean Islands', 'Atlantic Ocean', 'Arctic Regions', 'New Zealand') )) : ?>
 	<style type="text/css"> header.page-header.title-wrapper { display: none; } </style>
 <?php endif; ?>	 
 
 <?php if ( is_page( 'North America' ) ) : ?>
    <div id="hero" class="northAmerica">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
 <?php if ( is_page( 'Central America' ) ) : ?>
    <div id="hero" class="centralAmerica">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'Caribbean Islands' ) ) : ?>
    <div id="hero" class="caribbeanIslands">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'South America' ) ) : ?>
    <div id="hero" class="southAmerica">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'Antarctica' ) ) : ?>
    <div id="hero" class="antarctica">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'Europe' ) ) : ?>
    <div id="hero" class="europe">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'Europe: The Mediterranean' ) ) : ?>
    <div id="hero" class="mediterranean">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'Africa' ) ) : ?>
    <div id="hero" class="africa">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'South & Western Asia' ) ) : ?>
    <div id="hero" class="southwestAsia">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'East Asia' ) ) : ?>
    <div id="hero" class="eastAsia">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
 <?php if ( is_page( 'Southeast Asia' ) ) : ?>
    <div id="hero" class="southeastAsia">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'Australia' ) ) : ?>
    <div id="hero" class="australia">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
  <?php if ( is_page( 'Pacific Ocean Islands' ) ) : ?>
    <div id="hero" class="pacificIslands">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
 <?php if ( is_page( 'Atlantic Ocean' ) ) : ?>
    <div id="hero" class="atlanticOcean">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
 <?php if ( is_page( 'Arctic Regions' ) ) : ?>
    <div id="hero" class="arcticRegions">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
 <?php if ( is_page( 'New Zealand' ) ) : ?>
    <div id="hero" class="newZealand">
	    <h1><?php the_title(); ?></h1>
	 </div>
 <?php endif; ?>
 
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
