<?php get_header(); ?>

<div id="content">


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php if ( has_post_thumbnail() ): ?>
				<div class="hero-section" data-interchange="[<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>, small], [<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>, medium]">
					<div class="dimmer"></div>
					<div class="title-content">
						<h1 class="title"><?php the_title(); ?></h1>
					</div>
				</div>
				<?php else: ?>
				<div class="hero-section no-img">
					<div class="title-content">
						<h1 class="title"><?php the_title(); ?></h1>
					</div>
				</div>
			<?php endif; ?>

			<?php if (get_field('members_only')): ?>
				<?php if ( is_user_logged_in() ): ?>
					<?php get_template_part( 'parts/pagebuilder' ); ?>
					<?php else: ?>
					<div class='message-container'>

						<?php the_field('not_logged_in', 'option'); ?>
						<?php wp_login_form(); ?>
						<p id="loginnav">
							<?php wp_register( '', ' | ' ); ?>
							<a href="';
								bloginfo( 'wpurl' );
								echo '/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a></p>
					</div>
				<?php endif; ?>
				<?php else: ?>
				<?php get_template_part( 'parts/pagebuilder' ); ?>
			<?php endif; ?>



		<?php endwhile; else : ?>

		<?php get_template_part( 'parts/content', 'missing' ); ?>

	<?php endif; ?>


</div> <!-- end #content -->

<?php get_footer(); ?>