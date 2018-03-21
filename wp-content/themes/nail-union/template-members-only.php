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
					<?php if( have_rows('members_only') ): ?>
						<div class="dashboard-container">
							<?php while( have_rows('members_only') ): the_row(); ?>
								<?php if ( get_row_layout('text_field') ): ?>
									<div class="dash-text-field">
										<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
										<?php the_sub_field('text'); ?>
									</div>
								<?php elseif ( get_row_layout('list_of_links') ): ?>
									<div class="dash-links">
										<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
										<?php if( have_rows('member_links') ): ?>
											<div class="dash-links-list">
												<?php while ( have_rows('member_links') ) : the_row(); ?>
													<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('text'); ?></a>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
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