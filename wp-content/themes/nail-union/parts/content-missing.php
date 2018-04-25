<div id="post-not-found" class="hentry">

	<?php if ( is_search() ) : ?>
		<h1><?php _e( 'Sorry, No Results.', 'jointswp' );?></h1>

		<p><?php _e( 'Try your search again.', 'jointswp' );?></p>
		<p><?php get_search_form(); ?></p>


		<?php else: ?>

		<h1><?php _e( 'Sorry, Post Not Found', 'jointswp' );?></h1>

		<p><?php _e( 'Search for something else', 'jointswp' );?></p>
		<p><?php get_search_form(); ?></p>

	<?php endif; ?>

</div>