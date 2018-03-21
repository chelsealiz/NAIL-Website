<?php
/*
Template Name: Members Only
*/
?>

<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="hero-section no-img">
				<div class="title-content">
					<h1 class="title"><?php the_title(); ?></h1>
				</div>
			</div>

			<?php if ( is_user_logged_in() ): ?>
				<div class="user-logged-in">

				</div>
				<?php else: ?>
				<div class="user-logged-out">
					<div class="message-container">
						<?php the_field('not_logged_in', 'option'); ?>
					</div>
					</div>
			<?php endif; ?>


		<?php endwhile; endif; ?>

</div> <!-- end #content -->

<?php get_footer(); ?>