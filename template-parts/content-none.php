<section class="no-results not-found">
	<header class="page-header">
		<h1><?php esc_html_e( 'Nothing Found', 'halcyon-wp' ); ?></h1>
	</header>
	<div class="post-entry">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<?php
				$allowed_html_array = array(
		      'a' => array(
		        'href' => array()
		      )
		    );
			 ?>
			<p><?php printf(wp_kses(__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'halcyon-wp' ), $allowed_html_array), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'halcyon-wp' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'halcyon-wp' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</section>
